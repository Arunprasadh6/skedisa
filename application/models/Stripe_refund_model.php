<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH."libraries/stripe/init.php");
class Stripe_refund_model extends EA_Model {
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
        
        \Stripe\Stripe::setApiKey('sk_test_51JVG8oSAowgPbh4C31pcmHTNwIm74oDsWBfQXOWpKwK7RGnWngUzj2kYNIWIPpqr1mS4BllDmipRCast6pBxDEbW00zzmGTZZC');
    }

    public function refund_customer_stripe($oid,$txnid,$refid,$amount){
        try { 
            // Charge a credit or a debit card 
            $charge = \Stripe\Refund::create(array( 
                'amount'=>$amount,
                'reason'=>'requested_by_customer',                 
                'charge' => $refid 
            )); 
            if($charge['status']=="succeeded"){
                $refundid="REFUNDID_".rand(0000,9999);
                @$sql="Insert into ea_refund values(NULL,?,?,?,?,?,?,?)";
             $store=array($oid,$amount,$refundid,$charge['balance_transaction'],$charge['status'],$charge['id'],gmdate('d-m-Y g:i:s',$charge['created']));   
            @$this->db->query($sql,$store);
            $charge['Order_id']=$oid;
            $charge['refundid']=$refundid;
            }
            
            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize(); 
            return $charge; 
           
        }catch(Exception $e) { 
            $this->api_error = $e->getMessage(); 
            return false; 
            print_r($e->getMessage());
        } 

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