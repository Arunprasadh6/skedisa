<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH."libraries/config_paytm.php");
require_once(APPPATH."libraries/PaytmChecksum.php");
class Paytm_refund extends EA_Controller {
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
    
    
 
    
    public function refund(){
    $this->load->view('paytm/refund');    
    }
    
     public function refund_request(){
         
     }
    
    
    
  
    
    
    
    
    
    
}
?>