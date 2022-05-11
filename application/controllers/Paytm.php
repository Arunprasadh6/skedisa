<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH."libraries/config_paytm.php");
require_once(APPPATH."libraries/encdec_paytm.php");
//require_once(APPPATH."libraries/PaytmChecksum.php");
class Paytm extends EA_Controller {
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
        $this->load->model('settings_model');
        $this->load->model('Paytm_model');
        $this->load->library('timezones');
        $this->load->library('synchronization');
        $this->load->library('notifications');
       // $this->load->library('encdec_paytm');
        $this->load->library('availability');
        $this->load->driver('cache', ['adapter' => 'file']);
    }
    
    
    public function send_request(){
        
                header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        
        
        
        
        
                $checkSum = "";
        $paramList = array();
        //$token=$this->security->get_csrf_hash();
        $ORDER_ID = $_POST["ORDER_ID"];
        $CUST_ID ='CUID1';
        $INDUSTRY_TYPE_ID =$_POST["INDUSTRY_TYPE_ID"];
        $CHANNEL_ID =$_POST["CHANNEL_ID"];
        $TXN_AMOUNT = $_POST["PRICE"];
        
       
        
        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
    
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        
        
        //$paramList["resultInfo"] = $token;
        $paramList["CALLBACK_URL"] = site_url('Paytm/get_response');
        
        /*
        $paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
        $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
        $paramList["EMAIL"] = $EMAIL; //Email ID of customer
        $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
        
        */
      
        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum; ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
     <?php   
    }
    
   
 
    
    
    
    public function get_response(){
     
        $paytmChecksum = "";
    $paramList = array();
    $isValidChecksum = "FALSE";
    
    $paramList = $_POST;
  
    $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
   
    //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
    $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
    
    @$data=array(
        "Order_id"=>$paramList['ORDERID'],
        "TXNid"=>$paramList['TXNID'],
        "Amount"=>$paramList['TXNAMOUNT'],
        "Payment_mode"=>$paramList['PAYMENTMODE'],
        "Currency"=>$paramList['CURRENCY'],
        "TXNDate"=>$paramList['TXNDATE'],
        "Status"=>$paramList['STATUS'],
        "Respcode"=>$paramList['RESPCODE'],
        "Respmsg"=>$paramList['RESPMSG'],
        "Gatway_name"=>$paramList['GATEWAYNAME'],
        "Banktxnid"=>$paramList['BANKTXNID'],
        "Bank_name"=>$paramList['BANKNAME']
        );
    

    
    if($isValidChecksum == "TRUE") {
    
    	if ($_POST["STATUS"] == "TXN_SUCCESS") {
    	    
    	    
    	    $oid=$paramList['ORDERID'];
    	    
    	    $cnt=$this->db->query("select * from ea_Payment where Order_id='$oid'")->num_rows();
    	    
    	    if($cnt==0){
    	       	$data1=$this->Paytm_model->Store_payment($data); 
    	       	$this->session->set_userdata($data1);
    	    }
    	
            $oid=$paramList['ORDERID'];
    		$view['data']=$this->db->query("select * from ea_Payment where Order_id='$oid'")->result_array();
    		$view['users']=$this->db->query("select * from ea_users where Order_id='$oid'")->result_array();
    		$view['appoint']=$this->db->query("SELECT app.book_datetime,app.start_datetime,app.end_datetime,ser.id,ser.name,ser.price FROM `ea_appointments` as app,`ea_services` as ser where ser.id=app.id_services and app.Order_id='$oid'")->result_array();
    		
            $query=$this->db->query("select id_users_provider from ea_appointments where Order_id='$oid'")->row_array();
            $pid=$query['id_users_provider'];

    		$qry=$this->db->query("SELECT app.book_datetime,ser.id,ser.name FROM `ea_appointments` as app,`ea_services` as ser where ser.id=app.id_services and app.Order_id='$oid'")->row_array();
    	    $sid=$qry['id'];
    	    $pro=$this->db->query("SELECT id_users FROM `ea_services_providers` where id_services='$sid'")->row_array();
    	    $proid=$pro['id_users'];
    	    
    	    $view['provider']=$this->db->query("SELECT * FROM `ea_users` WHERE id='$pid'")->result_array();
    	    
    
    		
    // 		$view['appoint']=$this->db->query("SELECT * FROM `ea_appointments` as app,`ea_services` as ser where ser.id=app.id_services and app.Order_id='$oid'")->result_array();
    	
    		$this->load->view('paytm/success',$view);
    		//Process your transaction here as success transaction.
    		//Verify amount & order id received from Payment gateway with your application's order id and amount.
    	}
    	else {
    	
    	
    	$view['data']=$_POST;
    	if(empty($_POST['BANKNAME']) and empty($_POST['TXNDATE']) and empty($_POST['PAYMENTMODE'])){
    	    $id=$_POST['ORDERID'];
         $this->db->query("update Order_table set Orderid='$id'");
    	}
    	else{
    	    
    	 $oid=$_POST['ORDERID'];
    	    
    	    
    	    
    	    
    	    $cnt=$this->db->query("select * from ea_Payment where Order_id='$oid'")->num_rows();
    	    
    	    if($cnt==0){
    	       	$data1=$this->Paytm_model->Store_failed_payment($data); 
    	       	$this->session->set_userdata($data1);
    	    }    
    	    
    	    
    	    
    	}
    
    	
    	$this->load->view('paytm/cancel',$view);
    // 	if (isset($_POST) && count($_POST)>0 )
    // 	{ 
    // 		foreach($_POST as $paramName => $paramValue) {
    // 				echo "<br/>" . $paramName . " = " . $paramValue;
    // 		}
    // 	}
    			
    	}
    
    // 	if (isset($_POST) && count($_POST)>0 )
    // 	{ 
    // 		foreach($_POST as $paramName => $paramValue) {
    // 				echo "<br/>" . $paramName . " = " . $paramValue;
    // 		}
    // 	}
    	
    
    }
    else {
    	echo "<b>Checksum mismatched.</b>";
    	//Process transaction as suspicious.
    }
    }
    
    
    public function subscription_back(){
        
    }
    
    
    
}
?>