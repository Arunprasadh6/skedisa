<?php defined('BASEPATH') or exit('No direct script access allowed');

class Paytm_model extends EA_Model {
    /**
     * Appointments_Model constructor.
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('data_validation');
         $this->load->model('settings_model');
           $this->load->model('appointments_model');
            $this->load->model('services_model');
        $this->load->model('providers_model');
        $this->load->library('timezones');
        $this->load->library('synchronization');
        $this->load->library('notifications');
        $this->load->library('availability');
    }
    
    public function Store_failed_payment($data){
        $oid=$data['Order_id'];
         $this->db->query("update Order_table set Orderid='$oid'");
         @$this->db->insert('Payment', $data);
         
         //   $row1 = $this->db->order_by('id', 'DESC')->get_where('duplicate_user', ['Order_id' => $oid])->result_array()[0];
            $row1 = $this->db->query("select * from  ea_duplicate_user where  Order_id='".$oid."' order by id DESC")->row_array();

       @$data1=array(
        "id"=>NULL,
        "first_name"=>$row1['first_name'],
        "MRN"=>($row1['MRN']) ? '' : '',
        "email"=>$row1['email'],
        "mobile_number"=>$row1['mobile_number'],
        "phone_number"=>$row1['phone_number'],
        "address"=>$row1['address'],
        "city"=>$row1['city'],
        "state"=>$row1['state'],
        "zip_code"=>$row1['zip_code'],
        "userid"=>$row1['userid'],
        "notes"=>$row1['notes'],
        "timezone"=>$row1['timezone'],
        "Organization"=>$row1['Organization'],
        "Order_id"=>$row1['Order_id'],
        "language"=>$row1['language'],
        "id_roles"=>$row1['id_roles']
        );
        $mrn=$data1['MRN'];
        $email=$data1['email'];
        $pno=$data1['phone_number'];
        $org=$data1['Organization'];
        $oid=$data1['Order_id'];
      $userid=$data1['userid'];
      
        @$this->db->query("Update ea_Payment set MRN='$userid',Email='$email',Phone_number='$pno',Organization='$org' where Order_id='$oid'");
         
         
        
             $user_settings = $this->db->get_where('ea_register', [
            'userid' => $userid
        ])->row_array();
        
     //   print_r($user_settings);
       //  $user = $this->db->get_where('users', ['id' => $user_settings['id_users']])->row_array();
         
        $role = $this->db->get_where('roles', ['id' => $user_settings['Role']])->row_array();

  return [
            'user_id' => $user_settings['userid'],
            'user_email' => $user_settings['Email'],
            'user_phone' => $user_settings['Mobile'],
            'Organization'=>$user_settings['Organization'],
            'Fname'=>$user_settings['Fname'],
            'Mobile'=>$user_settings['Mobile'],
            'role_slug' => $role['slug']
        ]; 
         
         
    }
    
    public function Store_payment($data){
         $oid=$data['Order_id'];
       
         $this->db->query("update Order_table set Orderid='$oid'");
        $this->db->insert('Payment', $data);

     //$sql="select * from  ea_duplicate_user where  Order_id='".$oid."' order by id DESC";
        //$this->db->order_by('id', 'DESC');

        $row1 = $this->db->query("select * from  ea_duplicate_user where  Order_id='".$oid."' order by id DESC")->row_array();
      //  $row1 = $this->db->get_where('duplicate_user', ['Order_id' => ])->result_array();
      //  echo $sql;
      $data1=array(
        "id"=>NULL,
        "first_name"=>$row1['first_name'],
        "MRN"=>($row1['MRN']) ? '' : '',
        "email"=>$row1['email'],
        "password"=>$row1['password'],
        "mobile_number"=>$row1['mobile_number'],
        "phone_number"=>$row1['phone_number'],
        "address"=>$row1['address'],
        "city"=>$row1['city'],
        "state"=>$row1['state'],
        "zip_code"=>$row1['zip_code'],
        "userid"=>$row1['userid'],
        "notes"=>$row1['notes'],
        "timezone"=>$row1['timezone'],
        "Organization"=>$row1['Organization'],
        "Order_id"=>$row1['Order_id'],
        "language"=>$row1['language'],
        "id_roles"=>$row1['id_roles']
        );
       
        $mrn=$data1['MRN'];
        $email=$data1['email'];
        $pno=$data1['phone_number'];
        $org=$data1['Organization'];
      //  $oid=$data1['Order_id'];
      $userid=$data1['userid'];
      
        $this->db->query("Update ea_Payment set MRN='$userid',Email='$email',Phone_number='$pno',Organization='$org' where Order_id='$oid'");
      
       $cnt=$this->db->get_where('users', ['phone_number' => $data1['phone_number'],'Organization'=>$org])->num_rows();
      
       if($cnt > 0){
            $this->db->query("Update ea_users set Order_id='$oid',userid='$userid' where phone_number='$pno' and Organization='$org'");
           
        }
        else{
            $this->db->insert('users', $data1);
       }
      
       
        $row_user = $this->db->get_where('users', ['Order_id' => $oid])->row_array();
       
      //  $row = $this->db->order_by('id', 'DESC')->get_where('duplicate_appointment', ['Order_id' => $oid])->row_array();
       
        $row = $this->db->query("select * from  ea_duplicate_appointment where  Order_id='".$oid."' order by id DESC")->row_array();
    

    $data=array(
        "id"=>NULL,
        "book_datetime"=>$row['book_datetime'],
        "start_datetime"=>$row['start_datetime'],
        "end_datetime"=>$row['end_datetime'],
        "location"=>$row['location'],
        "notes"=>$row['notes'],
        "hash"=>$row['hash'],
        "is_unavailable"=>($row['is_unavailable']) ? $row['is_unavailable'] : $row['is_unavailable'],
        "id_users_provider"=>$row['id_users_provider'],
        "id_users_customer"=>$row_user['id'],
        "id_services"=>$row['id_services'],
        "Organization"=>($row['Organization']) ? $row['Organization'] : $row['Organization'],
        "Order_id"=>($row['Order_id']) ? $row['Order_id'] : $row['Order_id'],
        "id_google_calendar"=>$row['id_google_calendar']
        );
       
       
        $this->db->insert('appointments', $data);
        
        
         $row_appiont = $this->db->get_where('appointments', ['Order_id' => $oid])->row_array();
        
       
         $appointment = $data;
            $customer = $data1;
            
         //  $oid=$post_data['customer']['MRN'];
            $mno=$customer['phone_number'];
            $from=date('d-m-Y g:i A',strtotime($appointment['start_datetime']));
           // $from=$appointment['start_datetime'];
            $to=$appointment['end_datetime'];
           //  $msg='Dear Customer, request for your appointment '.$oid.' has been confirmed - SKEDIS.IN. Please show up at your scheduled appointment time. Welcome to avail the service!';
           
           $data=$this->db->query("SELECT organization_name as org  FROM `ea_orgnization` WHERE organization_id='".$org."'")->result_array();
           $ogan=$data[0]['org'];
//confirmation ID
	    $msg='Dear Customer, your appointment with '.$ogan.' is confirmed at '.$from.'  - SKEDIS';

            

            // Check appointment availability before registering it to the database.
            // $appointment['id_users_provider'] = $this->check_datetime_availability();
 
            // if ( ! $appointment['id_users_provider'])
            // {
            //     throw new Exception(lang('requested_hour_is_unavailable'));
            // }
            $provider = $this->providers_model->get_row($appointment['id_users_provider']);
            $service = $this->services_model->get_row($appointment['id_services']);

           // $require_captcha = $this->settings_model->get_setting('require_captcha');
           // $captcha_phrase = $this->session->userdata('captcha_phrase');

            // Validate the CAPTCHA string.
            // if ($require_captcha === '1' && $captcha_phrase !== $captcha)
            // {
            //     $this->output
            //         ->set_content_type('application/json')
            //         ->set_output(json_encode([
            //             'captcha_verification' => FALSE
            //         ]));

            //     return;
            // }

            // if ($this->customers_model->exists($customer))
            // {
            //     $customer['id'] = $this->customers_model->find_record_id($customer);
            // }

            if (empty($appointment['location']) && ! empty($service['location']))
            {
                $appointment['location'] = $service['location'];
            }

            // Save customer language (the language which is used to render the booking page).
            $customer['language'] = config('language');
          

            $appointment['id_users_customer'] = $row_user['id'];
            $appointment['is_unavailable'] = (int)$appointment['is_unavailable']; // needs to be type casted
         
            $appointment['hash'] = $this->appointments_model->get_value('hash', $row_appiont['id']);

            $settings = [
                'company_name' => $this->settings_model->get_setting('company_name'),
                'company_link' => $this->settings_model->get_setting('company_link'),
                'company_email' => $this->settings_model->get_setting('company_email'),
                'date_format' => $this->settings_model->get_setting('date_format'),
                'time_format' => $this->settings_model->get_setting('time_format')
            ];
        $manage_mode=false;
          $this->synchronization->sync_appointment_saved($appointment, $service, $provider, $customer, $settings, $manage_mode);
            $this->notifications->notify_appointment_saved($appointment, $service, $provider, $customer, $settings, $manage_mode);
            $this->sms($mno,$msg);
        
        
             $user_settings = $this->db->get_where('ea_register', [
            'userid' => $userid
        ])->row_array();
        
     //   print_r($user_settings);
       //  $user = $this->db->get_where('users', ['id' => $user_settings['id_users']])->row_array();
         
        $role = $this->db->get_where('roles', ['id' => $user_settings['Role']])->row_array();

  return [
            'user_id' => $user_settings['userid'],
            'user_email' => $user_settings['Email'],
            'user_phone' => $user_settings['Mobile'],
            'Organization'=>$user_settings['Organization'],
            'Fname'=>$user_settings['Fname'],
            'Mobile'=>$user_settings['Mobile'],
            'role_slug' => $role['slug']
        ];
        
    
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
    // print_r($response);
    curl_close($ch);
   
    // Use file get contents when CURL is not installed on server.
    if(!$response){
        $response = file_get_contents($url);
    }	    
	    
	}
   
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
   

    

    
    
}