<?php defined('BASEPATH') or exit('No direct script access allowed');


class Appointments extends EA_Controller {
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('installation');
        $this->load->helper('google_analytics');
        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('admins_model');
        $this->load->model('secretaries_model');
        $this->load->model('services_model');
        $this->load->model('customers_model');
        $this->load->model('paytm_refund_model');
        $this->load->model('stripe_refund_model');
        $this->load->model('settings_model');
        $this->load->library('timezones');
        $this->load->library('synchronization');
        $this->load->library('notifications');
        $this->load->library('availability');
        $this->load->driver('cache', ['adapter' => 'file']);
    }

    /**
     * Default callback method of the application.
     *
     * This method creates the appointment book wizard. If an appointment hash is provided then it means that the
     * customer followed the appointment manage link that was send with the book success email.
     *
     * @param string $appointment_hash The appointment hash identifier.
     */
    public function index($appointment_hash = '')
    { 
        try
        {
            if ( ! is_app_installed())
            {
                redirect('installation/index');
                return;
            }
         
            $oid=$this->session->userdata('Organization');
            $replaceamt= $this->db->query("SELECT * FROM `ea_settings` where name IN('refund_hour','refund_percentage') and Organization='$oid' ")->result_array();
            
            $available_services = $this->services_model->get_available_services();
            $available_providers = $this->providers_model->get_available_providers();
            $company_name = $this->settings_model->get_cname('company_name');
            $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
            $date_format = $this->settings_model->get_setting('date_format');
            $time_format = $this->settings_model->get_setting('time_format');
            $first_weekday = $this->settings_model->get_setting('first_weekday');
            $require_phone_number = $this->settings_model->get_setting('require_phone_number');
            $display_cookie_notice = $this->settings_model->get_setting('display_cookie_notice');
            $cookie_notice_content = $this->settings_model->get_setting('cookie_notice_content');
            $display_terms_and_conditions = $this->settings_model->get_setting('display_terms_and_conditions');
            $terms_and_conditions_content = $this->settings_model->get_setting('terms_and_conditions_content');
            $display_privacy_policy = $this->settings_model->get_setting('display_privacy_policy');
            $privacy_policy_content = $this->settings_model->get_setting('privacy_policy_content');
            $display_any_provider = $this->settings_model->get_setting('display_any_provider');
            $timezones = $this->timezones->to_array();
            $orderid=$this->appointments_model->get_orderid();
            $country=$this->appointments_model->get_country($oid);
            

            // Remove the data that are not needed inside the $available_providers array.
            foreach ($available_providers as $index => $provider)
            {
                $stripped_data = [
                    'id' => $provider['id'],
                    'first_name' => $provider['first_name'],
                    'MRN' => $provider['MRN'],
                    'services' => $provider['services'],
                    'timezone' => $provider['timezone']
                ];
                $available_providers[$index] = $stripped_data;
            }

            // If an appointment hash is provided then it means that the customer is trying to edit a registered
            // appointment record.
            if ($appointment_hash !== '')
            {
                // Load the appointments data and enable the manage mode of the page.
                $manage_mode = TRUE;

                $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
                 

                if (empty($results))
                {
                    // The requested appointment doesn't exist in the database. Display a message to the customer.
                    $variables = [
                        'message_title' => lang('appointment_not_found'),
                        'message_text' => lang('appointment_does_not_exist_in_db'),
                        'message_icon' => base_url('assets/img/error.png')
                    ];

                    $this->load->view('appointments/message', $variables);

                    return;
                }

                // If the requested appointment begin date is lower than book_advance_timeout. Display a message to the
                // customer.
                $startDate = strtotime($results[0]['start_datetime']);
                $limit = strtotime('+' . $book_advance_timeout . ' minutes', strtotime('now'));

                if ($startDate < $limit)
                {
                    $hours = floor($book_advance_timeout / 60);
                    $minutes = ($book_advance_timeout % 60);

                    $view = [
                        'message_title' => lang('appointment_locked'),
                        'message_text' => strtr(lang('appointment_locked_message'), [
                            '{$limit}' => sprintf('%02d:%02d', $hours, $minutes)
                        ]),
                        'message_icon' => base_url('assets/img/error.png')
                    ];
                    $this->load->view('appointments/message', $view);
                    return;
                }

                $appointment = $results[0];
                $provider = $this->providers_model->get_row($appointment['id_users_provider']);
                $customer = $this->customers_model->get_row($appointment['id_users_customer']);
               
                

                $customer_token = md5(uniqid(mt_rand(), TRUE));

                // Save the token for 10 minutes.
                $this->cache->save('customer-token-' . $customer_token, $customer['id'], 600);
            }
            else
            {
                // The customer is going to book a new appointment so there is no need for the manage functionality to
                // be initialized.
                $manage_mode = FALSE;
                $customer_token = FALSE;
                $appointment = [];
                $provider = [];
                $customer = [];
            }

            // Load the book appointment view.
            $variables = [
                'available_services' => $available_services,
                'available_providers' => $available_providers,
                'company_name' => $company_name,
                'manage_mode' => $manage_mode,
                'customer_token' => $customer_token,
                'date_format' => $date_format,
                'time_format' => $time_format,
                'first_weekday' => $first_weekday,
                'require_phone_number' => $require_phone_number,
                'appointment_data' => $appointment,
                'provider_data' => $provider,
                'customer_data' => $customer,
                'display_cookie_notice' => $display_cookie_notice,
                'cookie_notice_content' => $cookie_notice_content,
                'display_terms_and_conditions' => $display_terms_and_conditions,
                'terms_and_conditions_content' => $terms_and_conditions_content,
                'display_privacy_policy' => $display_privacy_policy,
                'privacy_policy_content' => $privacy_policy_content,
                'timezones' => $timezones,
                'orderid'=>$orderid,
                'cancelamt'=>$replaceamt,
                'display_any_provider' => $display_any_provider,
                'Country'=>$country
                
            ];
        }
        catch (Exception $exception)
        {
            $variables['exceptions'][] = $exception;
        }

        $this->load->view('appointments/book', $variables);
    }


    public function index_book($appointment_hash = '')
    { 
        try
        {
            if ( ! is_app_installed())
            {
                redirect('installation/index');
                return;
            }
         
            $oid=$this->session->userdata('Organization');
            $replaceamt= $this->db->query("SELECT * FROM `ea_settings` where name IN('refund_hour','refund_percentage') and Organization='$oid' ")->result_array();
            
            $available_services = $this->services_model->get_available_services();
            $available_providers = $this->providers_model->get_available_providers();
            $company_name = $this->settings_model->get_cname('company_name');
            $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
            $date_format = $this->settings_model->get_setting('date_format');
            $time_format = $this->settings_model->get_setting('time_format');
            $first_weekday = $this->settings_model->get_setting('first_weekday');
            $require_phone_number = $this->settings_model->get_setting('require_phone_number');
            $display_cookie_notice = $this->settings_model->get_setting('display_cookie_notice');
            $cookie_notice_content = $this->settings_model->get_setting('cookie_notice_content');
            $display_terms_and_conditions = $this->settings_model->get_setting('display_terms_and_conditions');
            $terms_and_conditions_content = $this->settings_model->get_setting('terms_and_conditions_content');
            $display_privacy_policy = $this->settings_model->get_setting('display_privacy_policy');
            $privacy_policy_content = $this->settings_model->get_setting('privacy_policy_content');
            $display_any_provider = $this->settings_model->get_setting('display_any_provider');
            $timezones = $this->timezones->to_array();
            $orderid=$this->appointments_model->get_orderid();
            $country=$this->appointments_model->get_country($oid);
            

            // Remove the data that are not needed inside the $available_providers array.
            foreach ($available_providers as $index => $provider)
            {
                $stripped_data = [
                    'id' => $provider['id'],
                    'first_name' => $provider['first_name'],
                    'MRN' => $provider['MRN'],
                    'services' => $provider['services'],
                    'timezone' => $provider['timezone']
                ];
                $available_providers[$index] = $stripped_data;
            }

            // If an appointment hash is provided then it means that the customer is trying to edit a registered
            // appointment record.
            if ($appointment_hash !== '')
            {
                // Load the appointments data and enable the manage mode of the page.
                $manage_mode = TRUE;

                $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
                 

                if (empty($results))
                {
                    // The requested appointment doesn't exist in the database. Display a message to the customer.
                    $variables = [
                        'message_title' => lang('appointment_not_found'),
                        'message_text' => lang('appointment_does_not_exist_in_db'),
                        'message_icon' => base_url('assets/img/error.png')
                    ];

                    $this->load->view('appointments/message', $variables);

                    return;
                }

                // If the requested appointment begin date is lower than book_advance_timeout. Display a message to the
                // customer.
                $startDate = strtotime($results[0]['start_datetime']);
                $limit = strtotime('+' . $book_advance_timeout . ' minutes', strtotime('now'));

                if ($startDate < $limit)
                {
                    $hours = floor($book_advance_timeout / 60);
                    $minutes = ($book_advance_timeout % 60);

                    $view = [
                        'message_title' => lang('appointment_locked'),
                        'message_text' => strtr(lang('appointment_locked_message'), [
                            '{$limit}' => sprintf('%02d:%02d', $hours, $minutes)
                        ]),
                        'message_icon' => base_url('assets/img/error.png')
                    ];
                    $this->load->view('appointments/message', $view);
                    return;
                }

                $appointment = $results[0];
                $provider = $this->providers_model->get_row($appointment['id_users_provider']);
                $customer = $this->customers_model->get_row($appointment['id_users_customer']);
               
                

                $customer_token = md5(uniqid(mt_rand(), TRUE));

                // Save the token for 10 minutes.
                $this->cache->save('customer-token-' . $customer_token, $customer['id'], 600);
            }
            else
            {
                // The customer is going to book a new appointment so there is no need for the manage functionality to
                // be initialized.
                $manage_mode = FALSE;
                $customer_token = FALSE;
                $appointment = [];
                $provider = [];
                $customer = [];
            }

            // Load the book appointment view.
            $variables = [
                'available_services' => $available_services,
                'available_providers' => $available_providers,
                'company_name' => $company_name,
                'manage_mode' => $manage_mode,
                'customer_token' => $customer_token,
                'date_format' => $date_format,
                'time_format' => $time_format,
                'first_weekday' => $first_weekday,
                'require_phone_number' => $require_phone_number,
                'appointment_data' => $appointment,
                'provider_data' => $provider,
                'customer_data' => $customer,
                'display_cookie_notice' => $display_cookie_notice,
                'cookie_notice_content' => $cookie_notice_content,
                'display_terms_and_conditions' => $display_terms_and_conditions,
                'terms_and_conditions_content' => $terms_and_conditions_content,
                'display_privacy_policy' => $display_privacy_policy,
                'privacy_policy_content' => $privacy_policy_content,
                'timezones' => $timezones,
                'orderid'=>$orderid,
                'cancelamt'=>$replaceamt,
                'display_any_provider' => $display_any_provider,
                'Country'=>$country
                
            ];
        }
        catch (Exception $exception)
        {
            $variables['exceptions'][] = $exception;
        }

        $this->load->view('appointments/book_template', $variables);
    }

    public function demo($appointment_hash = '')
    { 
        try
        {
            if ( ! is_app_installed())
            {
                redirect('installation/index');
                return;
            }

            $available_services = $this->services_model->get_available_services();
            $available_providers = $this->providers_model->get_available_providers();
            $company_name = $this->settings_model->get_setting('company_name');
            $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
            $date_format = $this->settings_model->get_setting('date_format');
            $time_format = $this->settings_model->get_setting('time_format');
            $first_weekday = $this->settings_model->get_setting('first_weekday');
            $require_phone_number = $this->settings_model->get_setting('require_phone_number');
            $display_cookie_notice = $this->settings_model->get_setting('display_cookie_notice');
            $cookie_notice_content = $this->settings_model->get_setting('cookie_notice_content');
            $display_terms_and_conditions = $this->settings_model->get_setting('display_terms_and_conditions');
            $terms_and_conditions_content = $this->settings_model->get_setting('terms_and_conditions_content');
            $display_privacy_policy = $this->settings_model->get_setting('display_privacy_policy');
            $privacy_policy_content = $this->settings_model->get_setting('privacy_policy_content');
            $display_any_provider = $this->settings_model->get_setting('display_any_provider');
            $timezones = $this->timezones->to_array();

            // Remove the data that are not needed inside the $available_providers array.
            foreach ($available_providers as $index => $provider)
            {
                $stripped_data = [
                    'id' => $provider['id'],
                    'first_name' => $provider['first_name'],
                    'MRN' => $provider['MRN'],
                    'services' => $provider['services'],
                    'timezone' => $provider['timezone']
                ];
                $available_providers[$index] = $stripped_data;
            }

            // If an appointment hash is provided then it means that the customer is trying to edit a registered
            // appointment record.
            if ($appointment_hash !== '')
            {
                // Load the appointments data and enable the manage mode of the page.
                $manage_mode = TRUE;

                $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);

                if (empty($results))
                {
                    // The requested appointment doesn't exist in the database. Display a message to the customer.
                    $variables = [
                        'message_title' => lang('appointment_not_found'),
                        'message_text' => lang('appointment_does_not_exist_in_db'),
                        'message_icon' => base_url('assets/img/error.png')
                    ];

                    $this->load->view('appointments/message', $variables);

                    return;
                }

                // If the requested appointment begin date is lower than book_advance_timeout. Display a message to the
                // customer.
                $startDate = strtotime($results[0]['start_datetime']);
                $limit = strtotime('+' . $book_advance_timeout . ' minutes', strtotime('now'));

                if ($startDate < $limit)
                {
                    $hours = floor($book_advance_timeout / 60);
                    $minutes = ($book_advance_timeout % 60);

                    $view = [
                        'message_title' => lang('appointment_locked'),
                        'message_text' => strtr(lang('appointment_locked_message'), [
                            '{$limit}' => sprintf('%02d:%02d', $hours, $minutes)
                        ]),
                        'message_icon' => base_url('assets/img/error.png')
                    ];
                    $this->load->view('appointments/message', $view);
                    return;
                }

                $appointment = $results[0];
                $provider = $this->providers_model->get_row($appointment['id_users_provider']);
                $customer = $this->customers_model->get_row($appointment['id_users_customer']);

                $customer_token = md5(uniqid(mt_rand(), TRUE));

                // Save the token for 10 minutes.
                $this->cache->save('customer-token-' . $customer_token, $customer['id'], 600);
            }
            else
            {
                // The customer is going to book a new appointment so there is no need for the manage functionality to
                // be initialized.
                $manage_mode = FALSE;
                $customer_token = FALSE;
                $appointment = [];
                $provider = [];
                $customer = [];
            }

            // Load the book appointment view.
            $variables = [
                'available_services' => $available_services,
                'available_providers' => $available_providers,
                'company_name' => $company_name,
                'manage_mode' => $manage_mode,
                'customer_token' => $customer_token,
                'date_format' => $date_format,
                'time_format' => $time_format,
                'first_weekday' => $first_weekday,
                'require_phone_number' => $require_phone_number,
                'appointment_data' => $appointment,
                'provider_data' => $provider,
                'customer_data' => $customer,
                'display_cookie_notice' => $display_cookie_notice,
                'cookie_notice_content' => $cookie_notice_content,
                'display_terms_and_conditions' => $display_terms_and_conditions,
                'terms_and_conditions_content' => $terms_and_conditions_content,
                'display_privacy_policy' => $display_privacy_policy,
                'privacy_policy_content' => $privacy_policy_content,
                'timezones' => $timezones,
                'display_any_provider' => $display_any_provider,
            ];
        }
        catch (Exception $exception)
        {
            $variables['exceptions'][] = $exception;
        }

        $this->load->view('appointments/book1', $variables);
    }


    /**
     * Cancel an existing appointment.
     *
     * This method removes an appointment from the company's schedule. In order for the appointment to be deleted, the
     * hash string must be provided. The customer can only cancel the appointment if the edit time period is not over
     * yet.
     *
     * @param string $appointment_hash This appointment hash identifier.
     */
    public function cancel($appointment_hash)
    {
        try
        {
            // Check whether the appointment hash exists in the database.
            $appointments = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
            

            if (empty($appointments))
            {
                throw new Exception('No record matches the provided hash.');
            }

            $appointment = $appointments[0];
            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $customer = $this->customers_model->get_row($appointment['id_users_customer']);
            $service = $this->services_model->get_row($appointment['id_services']);
            $orid=$appointment['Order_id'];
            $payment=$this->db->query("select Order_id,Amount,TXNDate,Payment_mode,Status,Bank_name from ea_Payment where Order_id='$orid'")->result_array();
            
           
            
             $from=$appointment['start_datetime'];
            $to=$appointment['end_datetime'];
            $mobile=$customer['phone_number'];
              $msg='Dear Provider, request for our appointment  has been cancelled SkedisA scheduled appointment time From ='.$from.' and  To ='.$to;

            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];

            // Remove the appointment record from the data.
            if ( ! $this->appointments_model->delete($appointment['id']))
            {
                throw new Exception('Appointment could not be deleted from the database.');
            }

            $this->synchronization->sync_appointment_deleted($appointment, $provider);
            $this->notifications->notify_appointment_deleted($appointment, $service, $provider, $customer, $settings);
            $this->sms($mobile,$msg);
        }
        catch (Exception $exception)
        {
            // Display the error message to the customer.
            $exceptions[] = $exception;
        }
        // $view['services']=$service;

        $view = [
            'message_title' => lang('appointment_cancelled_title'),
            'message_text' => lang('appointment_cancelled'),
            'message_icon' => base_url('assets/img/success.png'),
            'appoint'=>$appointment,
            'service'=>$service,
            'provider'=>$provider,
            'customer'=>$customer,
            'payment'=>$payment
        ];

        if (isset($exceptions))
        {
            $view['exceptions'] = $exceptions;
        }

        $this->load->view('appointments/message', $view);
    }
    
    public function appointment_reschedule($hash,$oid,$proname,$service,$id,$pid)
    {
        $data=[
            'hash'=>$hash,
            'oid'=>$oid,
            'status'=>'reschedule',
            'pname'=>$proname,
            'service'=>$service,
            'sid'=>$id,
            'pid'=>$pid
        ];
        $this->session->set_userdata($data);

        redirect('/Appointments');
    }

    public function change_appointment(){
        $post_data = $this->input->post('post_data');
           
            $appointment = $post_data['appointment'];
            
            $mno = $post_data['customer']['phone_number']; 
            $from=$post_data['appointment']['start_datetime'];
            $to=$post_data['appointment']['end_datetime'];
            $org=$post_data['appointment']['Organization'];

        $hash=$this->session->userdata('hash');
        $orderid=$this->session->userdata('oid');


        $data=$this->db->query("SELECT organization_name as org  FROM `ea_orgnization` WHERE organization_id='".$org."'")->result_array();
        $ogan=$data[0]['org'];
        
        

        $this->db->query("update ea_appointments set start_datetime='".$from."',end_datetime='".$to."' where hash='".$hash."' and Order_id='".$orderid."'");
       
        $from=date('d-m-Y g:i A',strtotime($from));
        $msg='Dear Customer, your appointment with '.$ogan.' is confirmed at '.$from.'  - SKEDIS';
        $this->sms($mno,$msg);
        $this->session->unset_userdata(['hash','oid','status']);
    }
    public function cancel_refund($hash,$oid,$amountstatus)
    {
      $s=0;
        try
        {
            // Check whether the appointment hash exists in the database.
            $appointments = $this->appointments_model->get_batch(['hash' => $hash]);
            

            if (empty($appointments))
            {
                throw new Exception('No record matches the provided hash.');
            }

            $appointment = $appointments[0];
            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $customer = $this->customers_model->get_row($appointment['id_users_customer']);
            $service = $this->services_model->get_row($appointment['id_services']);
            $orid=$appointment['Order_id'];
          
            $payment=$this->db->query("select Order_id,TXNid,Amount,TXNDate,Payment_mode,Status,Bank_name from ea_Payment where Order_id='$orid'")->result_array();
         
            $data=$this->db->query("SELECT organization_name as org  FROM `ea_orgnization` WHERE organization_id='".$customer['Organization']."'")->result_array();
            $ogan=$data[0]['org'];

            if($amountstatus == "refundfull"){
                $refundamount=$payment[0]['Amount'];                
            }
            else if($amountstatus == "refundoff"){
                $replaceamt= $this->db->query("SELECT * FROM `ea_settings` where name IN('refund_percentage') and Organization='".$customer['Organization']."'")->result_array();
                $percent=trim($replaceamt[0]['value'],'%');               
                $refnd=number_format($percent/100,2);

                $refundamount=$payment[0]['Amount']-($payment[0]['Amount']*$refnd); 
             $refamt=$payment[0]['Amount']*$refnd;
                $refundamount=$payment[0]['Amount']-$refamt;                
            }
         
           @$response_data=$this->paytm_refund_model->refund_customer($payment[0]['Order_id'],$payment[0]['TXNid'],$refundamount);
           
            if($response_data == "Your Refund Transaction Declined"){
            //redirect('Appointments/history'); 
             throw new Exception('Your Refund Transaction Declined');
            }
            else{
                $s=1;
             $from=$appointment['start_datetime'];
            $to=$appointment['end_datetime'];
            $mobile=$customer['phone_number'];
            $msg='Your appointment is cancelled by clinic due to '.$ogan.'. Apologies for the inconvenience. Appreciate your patience! - SKEDIS';

            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];

            // Remove the appointment record from the data.
            if ( ! $this->appointments_model->delete($appointment['id']))
            {
                throw new Exception('Appointment could not be deleted from the database.');
            }

            $this->synchronization->sync_appointment_deleted($appointment, $provider);
            $this->notifications->notify_appointment_deleted($appointment, $service, $provider, $customer, $settings);
            $this->sms($mobile,$msg);
           
            $this->notifications->send_refund($customer['email'],$oid,$ogan);
            
            }
        }
        catch (Exception $exception)
        {
            // Display the error message to the customer.
            $exceptions[] = $exception;
        }
        // $view['services']=$service; 
    if($s==1){
        $view = [
            'message_title' => lang('appointment_cancelled_title'),
            'message_text' => lang('appointment_cancelled'),
            'message_icon' => base_url('assets/img/success.png'),
            'appoint'=>$appointment,
            'service'=>$service,
            'provider'=>$provider,
            'customer'=>$customer,
            'payment'=>$payment,
            'response'=>$response_data
        ];
}
        if (isset($exceptions))
        {
            $view['exceptions'] = $exceptions;
        }

       $this->load->view('appointments/message', $view);
    }


    public function cancel_refund_stripe($hash,$oid,$refid,$amountstatus)
    {
      $s=0;
        try
        {
            // Check whether the appointment hash exists in the database.
            $appointments = $this->appointments_model->get_batch(['hash' => $hash]);
            

            if (empty($appointments))
            {
                throw new Exception('No record matches the provided hash.');
            }

            $appointment = $appointments[0];
            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $customer = $this->customers_model->get_row($appointment['id_users_customer']);
            $service = $this->services_model->get_row($appointment['id_services']);
            $orid=$appointment['Order_id'];
          
            $payment=$this->db->query("select Order_id,TXNid,Amount,TXNDate,Payment_mode,Status,Bank_name from ea_Payment where Order_id='$oid'")->result_array();
         
            $data=$this->db->query("SELECT organization_name as org  FROM `ea_orgnization` WHERE organization_id='".$customer['Organization']."'")->result_array();
            $ogan=$data[0]['org'];

            if($amountstatus == "refundfull"){
                $refundamount=$payment[0]['Amount'];                
            }
            else if($amountstatus == "refundoff"){
                $replaceamt= $this->db->query("SELECT * FROM `ea_settings` where name IN('refund_percentage') and Organization='".$customer['Organization']."'")->result_array();
                $percent=trim($replaceamt[0]['value'],'%');               
                $refnd=number_format($percent/100,2);
             
                $refamt=$payment[0]['Amount']*$refnd;
                $refundamount=$payment[0]['Amount']-$refamt;                    
            }
         
           @$response_data=$this->stripe_refund_model->refund_customer_stripe($payment[0]['Order_id'],$payment[0]['TXNid'],$refid,$refundamount);
           
            if($response_data == "Your Refund Transaction Declined"){
            //redirect('Appointments/history'); 
             throw new Exception('Your Refund Transaction Declined');
            }
            else{
                $s=1;
             $from=$appointment['start_datetime'];
            $to=$appointment['end_datetime'];
            $mobile=$customer['phone_number'];
            $msg='Your appointment is cancelled by clinic due to '.$ogan.'. Apologies for the inconvenience. Appreciate your patience! - SKEDIS';

            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];

            // Remove the appointment record from the data.
            if ( ! $this->appointments_model->delete($appointment['id']))
            {
                throw new Exception('Appointment could not be deleted from the database.');
            }

            $this->synchronization->sync_appointment_deleted($appointment, $provider);
            $this->notifications->notify_appointment_deleted($appointment, $service, $provider, $customer, $settings);
            $this->sms($mobile,$msg);
           
            $this->notifications->send_refund($customer['email'],$oid,$ogan);
            
            }
        }
        catch (Exception $exception)
        {
            // Display the error message to the customer.
            $exceptions[] = $exception;
        }
        // $view['services']=$service; 
    if($s==1){
        $view = [
            'message_title' => lang('appointment_cancelled_title'),
            'message_text' => lang('appointment_cancelled'),
            'message_icon' => base_url('assets/img/success.png'),
            'appoint'=>$appointment,
            'service'=>$service,
            'provider'=>$provider,
            'customer'=>$customer,
            'payment'=>$payment,
            'response'=>$response_data
        ];
}
        if (isset($exceptions))
        {
            $view['exceptions'] = $exceptions;
        }

$this->load->view('appointments/message', $view);
    }



    /**
     * GET an specific appointment book and redirect to the success screen.
     *
     * @param string $appointment_hash The appointment hash identifier.
     *
     * @throws Exception
     */
    public function book_success($appointment_hash)
    {
        $appointments = $this->appointments_model->get_batch(['hash' => $appointment_hash]);

        if (empty($appointments))
        {
            redirect('appointments'); // The appointment does not exist.
            return;
        }

        $appointment = $appointments[0];
        unset($appointment['notes']);

        $customer = $this->customers_model->get_row($appointment['id_users_customer']);

        $provider = $this->providers_model->get_row($appointment['id_users_provider']);

        $service = $this->services_model->get_row($appointment['id_services']);

        $company_name = $this->settings_model->get_setting('company_name');

        // Get any pending exceptions.
        $exceptions = $this->session->flashdata('book_success');

        $view = [
            'appointment_data' => $appointment,
            'provider_data' => [
                'id' => $provider['id'],
                'first_name' => $provider['first_name'],
                'MRN' => $provider['MRN'],
                'email' => $provider['email'],
                'timezone' => $provider['timezone'],
            ],
            'customer_data' => [
                'id' => $customer['id'],
                'first_name' => $customer['first_name'],
                'MRN' => $customer['MRN'],
                'email' => $customer['email'],
                'timezone' => $customer['timezone'],
            ],
            'service_data' => $service,
            'company_name' => $company_name,
        ];

        if ($exceptions)
        {
            $view['exceptions'] = $exceptions;
        }

        $this->load->view('appointments/book_success', $view);
    }

    /**
     * Get the available appointment hours for the given date.
     *
     * This method answers to an AJAX request. It calculates the available hours for the given service, provider and
     * date.
     *
     * Outputs a JSON string with the availabilities.
     */
    public function ajax_get_available_hours()
    {
        try
        {
            $provider_id = $this->input->post('provider_id');
            $service_id = $this->input->post('service_id');
            $selected_date = $this->input->post('selected_date');
            $curdate=date('Y-m-d');
            
            if($selected_date == $curdate){
             $selected_date=date('Y-m-d',strtotime('+1 days'));    
            }
            else{
             $selected_date=$selected_date;    
            }
            
            // Do not continue if there was no provider selected (more likely there is no provider in the system).
            if (empty($provider_id))
            {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([]));

                return;
            }

            // If manage mode is TRUE then the following we should not consider the selected appointment when
            // calculating the available time periods of the provider.
            $exclude_appointment_id = $this->input->post('manage_mode') === 'true' ? $this->input->post('appointment_id') : NULL;

            // If the user has selected the "any-provider" option then we will need to search for an available provider
            // that will provide the requested service.
            if ($provider_id === ANY_PROVIDER)
            {
                $provider_id = $this->search_any_provider($selected_date, $service_id);

                if ($provider_id === NULL)
                {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode([]));

                    return;
                }
            }

            $service = $this->services_model->get_row($service_id);

            $provider = $this->providers_model->get_row($provider_id);

            $response = $this->availability->get_available_hours($selected_date, $service, $provider, $exclude_appointment_id);
            
        }
        catch (Exception $exception)
        {
            $this->output->set_status_header(500);

            $response = [
                'message' => $exception->getMessage(),
                'trace' => config('debug') ? $exception->getTrace() : []
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    /**
     * Search for any provider that can handle the requested service.
     *
     * This method will return the database ID of the provider with the most available periods.
     *
     * @param string $date The date to be searched (Y-m-d).
     * @param int $service_id The requested service ID.
     *
     * @return int Returns the ID of the provider that can provide the service at the selected date.
     *
     * @throws Exception
     */
    protected function search_any_provider($date, $service_id)
    {
        $available_providers = $this->providers_model->get_available_providers();

        $service = $this->services_model->get_row($service_id);

        $provider_id = NULL;

        $max_hours_count = 0;

        foreach ($available_providers as $provider)
        {
            foreach ($provider['services'] as $provider_service_id)
            {
                if ($provider_service_id == $service_id)
                {
                    // Check if the provider is available for the requested date.
                    $available_hours = $this->availability->get_available_hours($date, $service, $provider);

                    if (count($available_hours) > $max_hours_count)
                    {
                        $provider_id = $provider['id'];
                        $max_hours_count = count($available_hours);
                    }
                }
            }
        }

        return $provider_id;
    }


/**

Register Appontment with duplicate


**/


    public function ajax_register_duplicate_appointment()
    {
        try
        {
            $post_data = $this->input->post('post_data');
            
          
            
            $captcha = $this->input->post('captcha');
            $manage_mode = filter_var($post_data['manage_mode'], FILTER_VALIDATE_BOOLEAN);
            $appointment = $post_data['appointment'];
            $customer = $post_data['customer'];
            
          //  $oid=$post_data['customer']['MRN'];
            $mno=$post_data['customer']['phone_number'];
            $from=$post_data['appointment']['start_datetime'];
            $to=$post_data['appointment']['end_datetime'];
            $msg='Dear Provider, request for our appointment  has been confirmed SkedisA scheduled appointment time From ='.$from.' and  To ='.$to;
            $this->services_model->insert_consents($post_data);
            
              
	  
            

            // Check appointment availability before registering it to the database.
            $appointment['id_users_provider'] = $this->check_datetime_availability();

            if ( ! $appointment['id_users_provider'])
            {
                throw new Exception(lang('requested_hour_is_unavailable'));
            }

            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $service = $this->services_model->get_row($appointment['id_services']);

            $require_captcha = $this->settings_model->get_setting('require_captcha');
            $captcha_phrase = $this->session->userdata('captcha_phrase');

            // Validate the CAPTCHA string.
            if ($require_captcha === '1' && $captcha_phrase !== $captcha)
            {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'captcha_verification' => FALSE
                    ]));

                return;
            }

            // if ($this->customers_model->exists($customer))
            // {
            //     $customer['id'] = $this->customers_model->find_record_id($customer);
            // }

            if (empty($appointment['location']) && ! empty($service['location']))
            {
                $appointment['location'] = $service['location'];
            }
           
               
             if (!$this->customers_model->cexists($customer))
            {
                $customer['userid'] = $this->customers_model->cregister($customer);
                $data=$this->db->query("SELECT organization_name as org  FROM `ea_orgnization` WHERE organization_id='".$customer['Organization']."'")->result_array();
                $ogan=$data[0]['org'];
                $this->notifications->send_register($customer['email'],$customer['first_name'],$ogan);
            }
             else{
                $customer['userid'] = $this->customers_model->cuser($customer);
                $customer['password'] = $this->customers_model->cpasswd($customer);
            
     
            }
            // Save customer language (the language which is used to render the booking page).
            $customer['language'] = config('language');
            $customer_id = $this->customers_model->duplicate_add($customer);

            $appointment['id_users_customer'] = $customer_id;
            $appointment['is_unavailable'] = (int)$appointment['is_unavailable']; // needs to be type casted
            $appointment['id'] = $this->appointments_model->duplicate_add($appointment);
            $appointment['hash'] = $this->appointments_model->duplicate_get_value('hash', $appointment['id']);

            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];

         //   $this->synchronization->sync_appointment_saved($appointment, $service, $provider, $customer, $settings, $manage_mode);
          //  $this->notifications->notify_appointment_saved($appointment, $service, $provider, $customer, $settings, $manage_mode);
            //$this->sms($mno,$msg);

            @$response = [
                'appointment_id' => $appointment['id'],
                'appointment_hash' => $appointment['hash']
            ];
        }
        catch (Exception $exception)
        {
            $this->output->set_status_header(500);

            $response = [
                'message' => $exception->getMessage(),
                'trace' => config('debug') ? $exception->getTrace() : []
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }



    /**
     * Register the appointment to the database.
     *
     * Outputs a JSON string with the appointment ID.
     */
    public function ajax_register_appointment()
    {
        try
        {
            $post_data = $this->input->post('post_data');
            
          
            
            $captcha = $this->input->post('captcha');
            $manage_mode = filter_var($post_data['manage_mode'], FILTER_VALIDATE_BOOLEAN);
            $appointment = $post_data['appointment'];
            $customer = $post_data['customer'];
            
          //  $oid=$post_data['customer']['MRN'];
            $mno=$post_data['customer']['phone_number'];
            $from=$post_data['appointment']['start_datetime'];
            $to=$post_data['appointment']['end_datetime'];
             $msg='Dear Provider, request for our appointment  has been confirmed SkedisA scheduled appointment time From ='.$from.' and  To ='.$to;
     
            
              
	  
            // print_r($appointment);

            // Check appointment availability before registering it to the database.
            $appointment['id_users_provider'] = $this->check_datetime_availability();

            if ( ! $appointment['id_users_provider'])
            {
                throw new Exception(lang('requested_hour_is_unavailable'));
            }
            

            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $service = $this->services_model->get_row($appointment['id_services']);

            $require_captcha = $this->settings_model->get_setting('require_captcha');
            $captcha_phrase = $this->session->userdata('captcha_phrase');

            // Validate the CAPTCHA string.
            if ($require_captcha === '1' && $captcha_phrase !== $captcha)
            {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'captcha_verification' => FALSE
                    ]));

                return;
            }

            if ($this->customers_model->exists($customer))
            {
                $customer['id'] = $this->customers_model->find_record_id($customer);
            }

            if (empty($appointment['location']) && ! empty($service['location']))
            {
                $appointment['location'] = $service['location'];
            }

            // Save customer language (the language which is used to render the booking page).
            $customer['language'] = config('language');
            $customer_id = $this->customers_model->add($customer);

            $appointment['id_users_customer'] = $customer_id;
            $appointment['is_unavailable'] = (int)$appointment['is_unavailable']; // needs to be type casted
            $appointment['id'] = $this->appointments_model->add($appointment);
            $appointment['hash'] = $this->appointments_model->get_value('hash', $appointment['id']);

            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];

            $this->synchronization->sync_appointment_saved($appointment, $service, $provider, $customer, $settings, $manage_mode);
            $this->notifications->notify_appointment_saved($appointment, $service, $provider, $customer, $settings, $manage_mode);
            $this->sms($mno,$msg);

            $response = [
                'appointment_id' => $appointment['id'],
                'appointment_hash' => $appointment['hash']
            ];
        }
        catch (Exception $exception)
        {
            $this->output->set_status_header(500);

            $response = [
                'message' => $exception->getMessage(),
                'trace' => config('debug') ? $exception->getTrace() : []
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    /**
     * Check whether the provider is still available in the selected appointment date.
     *
     * It might be times where two or more customers select the same appointment date and time. This shouldn't be
     * allowed to happen, so one of the two customers will eventually get the preferred date and the other one will have
     * to choose for another date. Use this method just before the customer confirms the appointment details. If the
     * selected date was taken in the mean time, the customer must be prompted to select another time for his
     * appointment.
     *
     * @return int Returns the ID of the provider that is available for the appointment.
     *
     * @throws Exception
     */
    protected function check_datetime_availability()
    {
        $post_data = $this->input->post('post_data');

        $appointment = $post_data['appointment'];

        $date = date('Y-m-d', strtotime($appointment['start_datetime']));

        if ($appointment['id_users_provider'] === ANY_PROVIDER)
        {

            $appointment['id_users_provider'] = $this->search_any_provider($date, $appointment['id_services']);

            return $appointment['id_users_provider'];
        }

        $service = $this->services_model->get_row($appointment['id_services']);

        $exclude_appointment_id = isset($appointment['id']) ? $appointment['id'] : NULL;

        $provider = $this->providers_model->get_row($appointment['id_users_provider']);

        $available_hours = $this->availability->get_available_hours($date, $service, $provider, $exclude_appointment_id);

        $is_still_available = FALSE;

        $appointment_hour = date('H:i', strtotime($appointment['start_datetime']));

        foreach ($available_hours as $available_hour)
        {
            if ($appointment_hour === $available_hour)
            {
                $is_still_available = TRUE;
                break;
            }
        }

        return $is_still_available ? $appointment['id_users_provider'] : NULL;
    }

    /**
     * Get Unavailable Dates
     *
     * Get an array with the available dates of a specific provider, service and month of the year. Provide the
     * "provider_id", "service_id" and "selected_date" as GET parameters to the request. The "selected_date" parameter
     * must have the Y-m-d format.
     *
     * Outputs a JSON string with the unavailable dates. that are unavailable.
     */
    public function ajax_get_unavailable_dates()
    {
        try
        {
            $provider_id = $this->input->get('provider_id');
            $service_id = $this->input->get('service_id');
            $appointment_id = $this->input->get_post('appointment_id');
            $manage_mode = $this->input->get_post('manage_mode');
            $selected_date_string = $this->input->get('selected_date');
            $selected_date = new DateTime($selected_date_string);
            $number_of_days_in_month = (int)$selected_date->format('t');
            $unavailable_dates = [];

            $provider_ids = $provider_id === ANY_PROVIDER
                ? $this->search_providers_by_service($service_id)
                : [$provider_id];

            $exclude_appointment_id = $manage_mode ? $appointment_id : NULL;

            // Get the service record.
            $service = $this->services_model->get_row($service_id);

            for ($i = 1; $i <= $number_of_days_in_month; $i++)
            {
                $current_date = new DateTime($selected_date->format('Y-m') . '-' . $i);

                if ($current_date < new DateTime(date('Y-m-d 00:00:00')))
                {
                    // Past dates become immediately unavailable.
                    $unavailable_dates[] = $current_date->format('Y-m-d');
                    continue;
                }

                // Finding at least one slot of availability.
                foreach ($provider_ids as $current_provider_id)
                {
                    $provider = $this->providers_model->get_row($current_provider_id);

                    $available_hours = $this->availability->get_available_hours(
                        $current_date->format('Y-m-d'),
                        $service,
                        $provider,
                        $exclude_appointment_id
                    );

                    if ( ! empty($available_hours))
                    {
                        break;
                    }
                }

                // No availability amongst all the provider.
                if (empty($available_hours))
                {
                    $unavailable_dates[] = $current_date->format('Y-m-d');
                }
            }

            $response = $unavailable_dates;
        }
        catch (Exception $exception)
        {
            $this->output->set_status_header(500);

            $response = [
                'message' => $exception->getMessage(),
                'trace' => config('debug') ? $exception->getTrace() : []
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    /**
     * Search for any provider that can handle the requested service.
     *
     * This method will return the database ID of the providers affected to the requested service.
     *
     * @param int $service_id The requested service ID.
     *
     * @return array Returns the ID of the provider that can provide the requested service.
     */
    protected function search_providers_by_service($service_id)
    {
        $available_providers = $this->providers_model->get_available_providers();
        $provider_list = [];

        foreach ($available_providers as $provider)
        {
            foreach ($provider['services'] as $provider_service_id)
            {
                if ($provider_service_id === $service_id)
                {
                    // Check if the provider is affected to the selected service.
                    $provider_list[] = $provider['id'];
                }
            }
        }

        return $provider_list;
    }
    
    
public function sms($mobile,$msg){
	    
	$mobileno='91'.$mobile;    	
    $message = urlencode($msg);
    $sender = 'SKEDIS';
    $apikey = '3933232g02l37672h82fb79pcp8h68943f8';
    $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

     $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
   
    curl_close($ch);
   
    // Use file get contents when CURL is not installed on server.
    if(!$response){
        $response = file_get_contents($url);
    }	    
	    
	}
	
	 public function filter_mrn(){
        $mrn=$this->input->post('MRN');
        $data=$this->appointments_model->get_mrndata($mrn);
         echo json_encode($data);
    }
    public function get_color(){
        $view['color_code'] = $this->settings_model->get_color();
        echo json_encode($view);
    }
   
    public function history(){
         $userid=$this->session->userdata('user_id');
       
        $qry=$this->db->query("select id,Order_id from ea_users where userid='$userid' ORDER by id desc")->result_array();
       
         @$id=$qry[0]['id'];
         //$ordid=$qry[0]['Order_id'];
        
         $view['history']=$this->db->query("select id_users_provider,Order_id,book_datetime,start_datetime,end_datetime,hash,Organization from ea_appointments where id_users_customer='$id' and Status='0' ORDER by id desc ")->result_array();
        
         $cnt=$this->db->query("select id_users_provider,Order_id,book_datetime,start_datetime,end_datetime,hash,Organization from ea_appointments where id_users_customer='$id' and Status='0' ORDER by id desc ")->num_rows();
        
       
            $provider_name=array();
            $Price=array();
            $service_name=array();
         for($i=0;$i<$cnt;$i++){
            @$proid=$view['history'][$i]['id_users_provider'];            
            @$ord_id=$view['history'][$i]['Order_id'];

             $sql="SELECT id_services FROM `ea_services_providers` where id_users='$proid'";
            $qry=$this->db->query($sql)->result_array();
           
           $serviceid=$qry[0]['id_services'];
            array_push($service_name,$this->db->query("SELECT id,name FROM `ea_services` where id='$serviceid'")->result_array());
            array_push($provider_name,$this->db->query("select id,first_name,MRN from ea_users where id='$proid'")->result_array());
            array_push($Price,$this->db->query("select Amount,Status,Banktxnid from ea_Payment where Order_id='$ord_id'")->result_array());
         }
         $oid=$this->session->userdata('Organization');
         $replaceamt= $this->db->query("SELECT * FROM `ea_settings` where name IN('refund_hour') and Organization='". $oid."'")->result_array();
         $refundhours=$replaceamt[0]['value'];
         $view['refund_hour']=['hour'=>$refundhours];
       

         $view['provider_name']=$provider_name;
         $view['Price']=$Price;
         $view['service']=$service_name;


        //$view['history']=$this->db->query("SELECT * FROM `ea_appointments` WHERE id_users_customer in (SELECT id FROM `ea_users` WHERE userid='$userid')")->result_array();
        $this->load->view('appointments/payment_history',$view);
        
    }


    public function stripe(){
        $view['data']=$this->input->post('post_data');
        $this->load->view('appointments/stripe_form',$view);
    }



}
