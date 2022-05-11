<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH."libraries/config_paytm.php");
require_once(APPPATH."libraries/PaytmChecksum.php");
error_reporting(0);
class Paytm_refund_model extends EA_Model {
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
    
    public function refund_customer($oid,$txnid,$amount){
        
  //   echo $oid." "  .$txnid." ".$amount;
     $paytmParams = array();
$refundid="REFUNDID_".rand(0000,9999);
$paytmParams["body"] = array(
    "mid"          => PAYTM_MERCHANT_MID,
    "txnType"      => "REFUND",
    "orderId"      => $oid,
    "txnId"        => $txnid,
    "refId"        => $refundid,
    "refundAmount" => $amount,
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), PAYTM_MERCHANT_KEY);

$paytmParams["head"] = array(
    "signature"	  => $checksum
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/refund/apply";

/* for Production */
// $url = "https://securegw.paytm.in/refund/apply";

$ch = curl_init(PAYTM_REFUND_URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
//print_r($response);
$res=json_decode($response,true);

@$store=array($res['body']['orderId'],$res['body']['refundAmount'],$res['body']['refId'],$res['body']['txnId'],$res['body']['resultInfo']['resultStatus'],$res['body']['refundId'],$res['body']['txnTimestamp']);

@$sql="Insert into ea_refund values(NULL,?,?,?,?,?,?,?)";
@$this->db->query($sql,$store);

return $response;
    

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
   

    public function subscription(){
      
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/


$paytmParams = array();

$orderid="SUB_".rand(0000,9999);
$cid="CUS_".rand(0000,9999);
$paytmParams["body"] = array(
    "requestType"               => "NATIVE_SUBSCRIPTION",
    "mid"                       => PAYTM_MERCHANT_MID,
    "websiteName"               => "WEBSTAGING",
    "orderId"                   => $orderid,
    "subscriptionAmountType"    => "FIX",
    "subscriptionFrequency"     => "2",
    "subscriptionFrequencyUnit" => "YEAR",
    "subscriptionExpiryDate"    => "2022-16-10",
    "subscriptionEnableRetry"   => "1",
    "txnAmount"                 => array(
        "value"                 => "10.00",
        "currency"              => "INR",
    ),
    "userInfo"                  => array(
        "custId"                => $cid
    )
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/

$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), PAYTM_MERCHANT_KEY);

$paytmParams["head"] = array(
    "signature"	              => $checksum
);

$mid=PAYTM_MERCHANT_MID;
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);


/* for Staging */
 $url = "https://securegw-stage.paytm.in/subscription/create?mid=$mid&orderId=$orderid";

/* for Production */
// $url = "https://securegw.paytm.in/subscription/create?mid=YOUR_MID_HERE&orderId=ORDERID_98765";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);      
print_r($response);        


    }

    
    
}