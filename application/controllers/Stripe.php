<?php defined('BASEPATH') or exit('No direct script access allowed');
//require_once(APPPATH."libraries/stripe/Stripe_lib.php");
require_once(APPPATH."libraries/stripe/init.php");

class Stripe extends EA_Controller {
    /** 
     * Class Constructor
     */
    var $CI; 
    public function __construct()
    {

        parent::__construct();
        
        $this->CI =& get_instance(); 
        $this->CI->load->config('stripe'); 

        $this->load->helper('installation');
        $this->load->helper('google_analytics');
        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('admins_model');
        $this->load->model('secretaries_model');
        $this->load->model('Stripe_model');
        $this->load->model('services_model');
        $this->load->model('customers_model');
        $this->load->model('settings_model');
        $this->load->model('Paytm_model');
        $this->load->library('timezones');
        $this->load->library('synchronization');
        $this->load->library('notifications');
       // $this->load->library('encdec_paytm');
        $this->load->library('availability');
        $this->load->driver('cache', ['adapter' => 'file']);
         // Set API key 
        \Stripe\Stripe::setApiKey($this->CI->config->item('stripe_api_key'));
    }
 
         
   
    
    
    public function send_stripe_payment(){
         $token  = $this->input->post('stripeToken'); 
         $data=$this->input->post('appoint_data');
         $app_data=json_decode($data,true);
         $customers=$app_data['customer']; 
         $appointment=$app_data['appointment']; 
         $name=$customers['first_name'];
         $email=$customers['email'];
         $sid=$appointment['id_services'];
         $org=$appointment['Organization'];
      
       
       // Add customer to stripe 
       $customer = $this->addCustomer($email,$name,$token);  
      $data=$this->db->query("SELECT * FROM `ea_services` WHERE Organization='$org' and id='$sid'")->result_array();     
       $service=$data[0]['name'];
       $price=$data[0]['price'];
         
       
         
           
           // Charge a credit or a debit card 
           $charge = $this->createCharge($customer['id'],$service ,$price);
           $view['data']=$charge;

           if($charge['status']=="succeeded"){
            $this->Stripe_model->Save_success($customers,$appointment,$service,$price,$charge);
            $this->load->view('stripe/success',$view); 
           }else{
            $this->Stripe_model->Save_Failure($customers,$appointment,$service,$price,$charge);
            $this->load->view('stripe/success',$view); 
           }
          
           
    }


    public function send_subscription(){
       $data=$this->input->post();
     
        $token=$this->input->post('stripeToken');        
        $email=$this->input->post('email');
        $name=$this->input->post('name');

        $plan=$this->input->post('subscr_plan');
        $planname='';
        $planprice='';
        $planint='';
        if($plan==1){
            $planname="week plan";
            $planprice=30;
            $planint='week';
        }elseif($plan==2){
            $planname='month plan';
            $planprice=900;
            $planint='month';
        }elseif($plan==3){
            $planname='year plan';
            $planprice=7000;
            $planint='year';
        }

        
        $customer = $this->addCustomer($email,$name,$token);

       $plan = $this->createPlan($planname, $planprice, $planint);
        $pid=$plan['id'];
        $cid=$customer['id'];
        $subscr=$this->createSubscription($cid, $pid);
        $data=array(
            'id'=>NULL,
            'subid'=>$subscr['id'],
            'created'=>$subscr['created'],
            'start'=>$subscr['current_period_start'],
            'end'=>$subscr['current_period_end'],
            'planid'=>$subscr['plan']['id'],
            'plan_status'=>$subscr['plan']['active'],
            'plan_amount'=>$subscr['plan']['amount'],
            'currency'=>$subscr['plan']['currency'],
            'plan_interval'=>$subscr['plan']['interval']
        );
    
        $res=json_encode($subscr);
        $this->Stripe_model->store_subscription($res,$name,$email);       
        $this->db->insert('ea_subscription_bkup',$data);
       
        redirect('backend/billing');
         
       
       

      
    }



   


public function addCustomer($email,$name, $token){ 
    try { 
        // Add customer to stripe 
        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'name' => $name,
            'address' => [
                'line1'       => '510 Townsend St',
                'postal_code' => '98140',
                'city'        => 'San Francisco',
                'state'       => 'CA',
                'country'     => 'US',
            ],
            'source'  => $token 
        )); 
        return $customer; 
       
    }catch(Exception $e) { 
        $this->api_error = $e->getMessage(); 
        return false; 
    } 
} 
 
public function createCharge($customerId, $itemName, $itemPrice){ 
    // Convert price to cents 
    $itemPriceCents = ($itemPrice*100); 
    $currency = $this->CI->config->item('stripe_currency'); 
     
    try { 
        // Charge a credit or a debit card 
        $charge = \Stripe\Charge::create(array( 
            'customer' => $customerId, 
            'amount'   => $itemPriceCents, 
            'currency' => $currency, 
            'description' => $itemName 
        )); 
         
        // Retrieve charge details 
        $chargeJson = $charge->jsonSerialize(); 
        return $chargeJson; 
       // print_r($chargeJson);
    }catch(Exception $e) { 
        $this->api_error = $e->getMessage(); 
        return false; 
        print_r($e->getMessage());
    } 
}

function createPlan($planName, $planPrice, $planInterval){ 
    // Convert price to cents 
    $priceCents = ($planPrice*100); 
    $currency = $this->CI->config->item('stripe_currency'); 
     
    try { 
        // Create a plan 
        $plan = \Stripe\Plan::create(array( 
            "product" => [ 
                "name" => $planName 
            ], 
            "amount" => $priceCents, 
            "currency" => $currency, 
            "interval" => $planInterval, 
            "interval_count" => 1 
        )); 
        return $plan; 
    }catch(Exception $e) { 
        $this->api_error = $e->getMessage(); 
        return false; 
    } 
} 

function createSubscription($customerID, $planID){ 
    try { 
        // Creates a new subscription 
        $subscription = \Stripe\Subscription::create(array( 
            "customer" => $customerID, 
            "items" => array( 
                array( 
                    "plan" => $planID 
                ), 
            ), 
        )); 
         
        // Retrieve charge details 
        $subsData = $subscription->jsonSerialize(); 
        return $subsData; 
    }catch(Exception $e) { 
        $this->api_error = $e->getMessage(); 
        return false; 
    } 
}
    
    
    
}
?>