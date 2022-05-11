<?php defined('BASEPATH') or exit('No direct script access allowed');
	
   
class Customers extends EA_Controller {
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
        $this->load->model('customermodel');
        $this->load->model('settings_model');
        $this->load->library('timezones');
        $this->load->library('synchronization');
        $this->load->library('notifications');
       
        $this->load->library('availability');
        $this->load->driver('cache', ['adapter' => 'file']);
       
    }
    
    public function index(){  
        $data['records']=$this->customermodel->get_organization();        
        $this->load->view('customer/login',$data);   
            
    }

    public function login_test(){
        $this->load->view('customer/login_test');
    }

    public function customer_login(){
        $this->load->view('customer/header');
        $this->load->view('customer/content');
        $this->load->view('customer/footer'); 
    }

    public function plan(){
        $this->load->view('customer/header');
        $this->load->view('customer/plan');
        $this->load->view('customer/footer'); 
    }

    public function register_admin(){
        $sql="SELECT * FROM `ea_orgnization` where Delete_flag='0' and Status='1'";
        $data['result']=$this->db->query($sql)->result_array();        
        $this->load->view('customer/register',$data);        
    }

    public function admin_register(){
        $data=$this->input->post();  
        $org_chk=$this->input->post('sel-org');
        try
       {
      
       if($org_chk == 0){  
        
     
       $organ=empty($data['organization-empty']) ? $data['organization-full'] : $data['organization-empty'] ;
       $status='1';
       $country=$data['country'];
       $this->customermodel->add_organization($organ,$status,$country);        
       
       $query=$this->db->query("select * from ea_settings where Organization='1'")->result_array();
      $qry=$this->db->query("select * from ea_orgnization order by organization_id desc limit 0,1 ")->result_array();
      
       $lastid=$qry[0]['organization_id'];
       $orgname=$qry[0]['organization_name'];
       $cnt=count($query);
       for($i=0;$i<$cnt;$i++){
           $name=$query[$i]['name'];
           $value=$query[$i]['value'];
           $timestamp=date('Y-m-d h:i:s');
           if($i==17){
             $value= $orgname;  
           }else if($i==18){
               $value='';
           }elseif($i==19){
               $value='';   
           }
           
           $org=$lastid;    
     
           
           $this->db->query("Insert into ea_settings values(NULL,'$name','$value','$org','$timestamp','$timestamp')");       
        }
    }

        $admin = [
            'first_name'=>$data['firstname'],
            'MRN'=>'',
            'email'=>$data['email'],
            'mobile_number'=>'',
            'phone_number'=>$data['phoneno'],
            'address'=>$data['address'],
            'city'=>$data['city'],
            'state'=>$data['state'],
            'zip_code'=>$data['pincode'],
            'notes'=> '',
            'timezone'=> 'UTC',
            'Organization'=>  ($org_chk==1) ? $data['organization']  : $lastid,
            'settings'=>[
                'username'=> $data['admin-username'],
                'notifications'=> '',
                'calendar_view'=> 'default',
                'password'=>$data['admin-password']
            ]
        ];

        $admin_id = $this->admins_model->add($admin);

        $response = [
            'status' => AJAX_SUCCESS,
            'id' => $admin_id
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

    public function customer_feature(){
        $this->load->view('customer/header');
        $this->load->view('customer/feature');
        $this->load->view('customer/footer');
    }

    
    public function register(){

        
        if($this->input->post('submit')){
        
            $name=$this->input->post('fname');
            $email=$this->input->post('email');
            $mobile=$this->input->post('mobile');
            $org=$this->input->post('organization');
            $data=$this->db->query("SELECT organization_name as org  FROM `ea_orgnization` WHERE organization_id='$org'")->result_array();
        $ogan=$data[0]['org'];
        
          $data=$this->customermodel->Registerdata($this->input->post());
           if($data == 1){
            $this->session->set_flashdata('error', 'User Account Already Exists!');

           } 
           else{
            $this->notifications->send_register($email,$name,$ogan);

            $this->session->set_flashdata('success', 'User created successfully! Kindly login with the credentials you just created!');
           
           }
           redirect(base_url());
        }
    }

    public function send_sms(){
        $uname="hussainmohamed@gravitykey.com";
        $key="5104462C-C4DC-532E-8C51-8A3CC31CD0F3";
          
        $url = "https://api-mapper.clicksend.com/http/v2/send.php";        
        $data="method=http&username=".$uname."&key=".$key."&to=9894764234&senderid=example&message=Dear Customer, your appointment with BJH is confirmed at 18-09-2021-SKEDIS";
            
            
        
             
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic YXBpLXVzZXJuYW1lOmFwaS1wYXNzd29yZA=="));
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $response=curl_exec($ch);
        curl_close($ch);
        
        
        
          
            if(!$response){
                $response = file_get_contents($url);
            }else{
                echo "send";
            }	
    }


    public function login(){
        if($this->input->post('login')){
          $data=$this->customermodel->Login($this->input->post('uname'),$this->input->post('pwd'),$this->input->post('login-organ'));
        
        
          if(!empty($data['user_id'])){
             $this->session->set_userdata($data);
            // $this->session->set_userdata('user',$data['role_slug']);
             
            if($data['role_slug'] == 'customer'){
                 redirect('/Appointments');
            }
            
            
          }
         else{
              $this->session->set_flashdata('error', 'Username or Password is Incorrect!');
              redirect(base_url());
          }
        }
    }
    
        public function userlogin(){
       
      
           $org=$this->uri->segment(3);
            
         $data= [
             'Fname'=>'Guest',
            'Organization'=>$org,
            'role_slug' => 'customer'
        ];
              $this->session->set_userdata($data);
            // // $this->session->set_userdata('user',$data['role_slug']);
             
            if($data['role_slug'] == 'customer'){
                 redirect('/Appointments');
            }
            
            
       
        
    }
    
    public function logout_google() 
	{
		unset($_SESSION['access_token']);
		redirect(base_url('customer/login'));
	}
    
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('Organization');
        $this->session->unset_userdata('role_slug');
        $this->session->unset_userdata('pname');
        $this->session->unset_userdata('service');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('sid');
        $this->session->unset_userdata('pid');
        redirect(base_url());
        
    }

    public function check_google(){
        $id=$this->input->post('google_id');
        $cnt=$this->db->query("select * from ea_users where mobile_number='$id'")->num_rows();
        if($cnt > 0){
            $data=$this->db->query("select * from ea_users where mobile_number='$id'")->result_array();
            echo json_encode($data);
        }else{
            echo "0";
        }        
    }


    public function check_google_user(){
        $id=$this->input->post('google_id');
        $cnt=$this->db->query("select * from ea_users where mobile_number='$id'")->num_rows();
        if($cnt > 0){
            $data=$this->db->query("select * from ea_users where mobile_number='$id'")->result_array();
            $record=array(
            'user_id' => $data[0]['userid'],
            'user_email' => $data[0]['email'],
            'user_phone' => $data[0]['phone_number'],
            'Organization'=>$data[0]['Organization'],
            'Fname'=>$data[0]['first_name'],
            'Mobile'=>$data[0]['phone_number'],
            'role_slug' => ($data[0]['id_roles'] == 3) ? "customer" :'provider',
            'Address' => $data[0]['address'],
            'City' => $data[0]['city'],
            'Pincode' => $data[0]['zip_code'],
            'Notes' => $data[0]['notes']
            );           
            $this->session->set_userdata($record);
            
            echo "1";
        }else{
            echo "0";
        }        
    }
    
    public function update_password(){
        $email=$this->input->post('email');
        $fgetorg=$this->input->post('fgetorg');
        $pwd=hash('sha256',$this->input->post('passwd'));
         $cnt=$this->db->query("select * from ea_register where Mobile='$email' and Organization='$fgetorg'")->num_rows();
         if($cnt > 0){
            $sql="update ea_register set Passwd='$pwd' where Mobile='$email' and Organization='$fgetorg'";
            $this->db->query($sql);
            echo "1";
        }
        else{
            echo "0";
        }
    }
    
    public function check_email(){
        $mobile=$this->input->post('Mobile');
        $this->customermodel->checkmail($mobile);
    }
    
     public function check_user_email(){
        $email=$this->input->post('email');
        $this->customermodel->checkusermail($email);
    }
    
     public function check_mobile(){
        $mno=$this->input->post('mobile');
        $this->customermodel->mobile($mno);
    }

    public function get_terms(){
        $org=$this->input->post('Organ');
        $query=$this->db->query("SELECT value FROM `ea_settings` WHERE name='terms_and_conditions_content' and Organization='$org'")->result_array();
        echo $query[0]['value'];
    }
    

    public function check_mobile_org(){
        $mno=$this->input->post('mobile');
        $org=$this->input->post('organization');
        $cnt=$this->db->query("select * from ea_register where Mobile='$mno' and Organization='$org'")->num_rows();
        if($cnt==1){
            echo "1";
        }else if($cnt > 2){
            echo "2";
        }else{
            echo "0";
        }
    }
    


     public function send_otp(){
        $mobile=$this->input->post('Mobile');
        $otp=rand(000000,999999);
         $msg='Dear Customer, Please use '.$otp.' as the OTP to change your password - SKEDIS';
         
         $this->sms($mobile,$msg);
        $this->session->set_userdata('otp',$otp);
        echo  $otp;
        
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
	
    
    
    
      public function check_mob(){
        $mno=$this->input->post('mobile');
        $passwd=$this->input->post('passwd');
        $data=$this->customermodel->chk_mobile($mno,$passwd);
        echo json_encode($data);
    }
    
    public function viewbooking(){
        $record=$this->session->userdata('records');
        $id=$record['userid'];
        $data['result']=$this->customermodel->check_booking($id);
        $this->load->view('customer/view_booking',$data);
    }
    
    public function check_organization(){
        $mno=$this->input->post('mobile');
        $cnt=$this->db->query("select Organization from ea_register where Mobile='$mno'")->num_rows();
         $organ=array();
        if($cnt > 0){
            $qry=$this->db->query("select Organization from ea_register where Mobile='$mno'")->result_array();     
            for($i=0;$i<$cnt;$i++){                
               array_push($organ,$this->db->query("select organization_id,organization_name from ea_orgnization where organization_id='".$qry[$i]['Organization']."'")->result_array());                 
              }
              echo json_encode($organ);
           
        }else{
           echo "1" ;
      } 
    }

    public function check_coupon(){
        $coupon=$this->input->post('coupon');
        $sql="select * from ea_coupon where coupon_code='$coupon'";
        $cnt=$this->db->query($sql)->num_rows();
        if($cnt > 0){
            $data=$this->db->query($sql)->result_array();
             echo json_encode($data);
        }else{
                
        }
        
    }
    
}