<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customermodel extends EA_Model {
    /**
     * Appointments_Model constructor.
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('data_validation');
    }
    
    public function Registerdata($post){
           $fname=htmlspecialchars($this->input->post('fname'));
            $email=htmlspecialchars($this->input->post('email'));
            $googleid=htmlspecialchars($this->input->post('googleid'));
            $passwd=hash('sha256', $this->input->post('passwd'));
            @$org=htmlspecialchars($this->input->post('organization'));
            //$passwd=password_hash($this->input->post('passwd'),PASSWORD_BCRYPT);
            $mobile=htmlspecialchars($this->input->post('mobile'));
          
            $mob=$this->db->get_where('register', ['Mobile' => $mobile,"Organization"=>$org])->num_rows();
            if($mob > 0){
                return 1;
            }
            else{
                
            
                $timestamp = date("Y-m-d H:i:s");
                $sql="Insert into ea_register values(NULL,?,?,?,?,?,?,?,?)"; 
                $this->db->query($sql,array($fname,$email,$passwd,$mobile,$org,3,$timestamp,$timestamp));
                $userid=$this->db->get_where('register', ['Mobile' => $mobile,"Organization"=>$org])->row_array();
                   
            
                $customer=array( 
                "first_name" => $fname,
                "MRN" => '',
                "email" => $email,
                "password" => $passwd,
                "mobile_number"=>empty($googleid) ? "" : $googleid,
                "phone_number" => $mobile,
                "address" =>'',
                "city" =>'',
                "zip_code" =>'',
                "notes" =>'',
                "timezone" => "UTC",
                "Organization" => $org,
                "language" => "english",
                "id_roles" => 3,
                "userid" =>  $userid['userid'],
                "Create_date"=>$timestamp,
                "Modified_date"=>$timestamp,
                "Created_by"=>null,
                "Modified_by"=>null

            );
                $this->db->insert('users', $customer);
                return 0;
            }

       
        
    }
        public function get_salt($username)
    {
        $user = $this->db->get_where('user_settings', ['username' => $username])->row_array();
        return ($user) ? $user['salt'] : '';
    }
    public function Login($username, $password,$org){

        $username=htmlspecialchars($this->input->post('uname'));
        $passwd=hash('sha256',$this->input->post('pwd'));
         
          

        $user_settings = $this->db->get_where('ea_register', [
            'Mobile' => $username,
            'Passwd' => $passwd,
            'Organization' => $org
            
        ])->row_array();


        $user_register = $this->db->get_where('ea_users',  ['userid' => $user_settings['userid']])->row_array();
        
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
            'role_slug' => $role['slug'],
            'Address' => $user_register['address'],
            'City' => $user_register['city'],
            'Pincode' => $user_register['zip_code'],
            'Notes' => $user_register['notes']

        ];
        
        
    }   
    
    
    public function check_user($id){
        
        return $this->db->query("select * from ea_image where user_id='$id'")->num_rows();
        //return $this->db->get_where('image', ['user_id' => $id])->num_rows();
    }
    
    public function upload_img($uid,$role,$organ,$name){
        $timestmp= date("Y-m-d H:i:s");
        $this->db->query("Insert into ea_image values(NULL,'$name','$uid','$role','$organ','$timestmp','$timestmp')");
    }
    public function update_img($uid,$name){
        $timestmp= date("Y-m-d H:i:s");
        $this->db->query("update ea_image set image_name='$name',Modified_date='$timestmp' where user_id='$uid'");
    
    }
    
    
    public function checkmail($mobile){
      
        $sql="select * from ea_register where Mobile='$mobile'";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        if($row == true){
            echo "1";
        }else{
            echo "0";
        }
       
    }
     public function checkusermail($email){
        
        $sql="select * from ea_register where Email='$email'";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        if($row == true){
            echo "1";
        }else{
            echo "0";
        }
       
    }
    
    
        public function mobile($mbl){
            
        $sql="select * from ea_register where Mobile='$mbl'";
        $query=$this->db->query($sql);
        $row=$query->row_array();
        if($row == true){
            echo "1";
        }else{
            echo "0";
        }
       
    }
    
            public function chk_mobile($mbl,$passwd){
                $oid=$this->session->userdata('Organization');
                $passwd=hash('sha256',$passwd);
        $sql="select r.Fname,r.Email,r.Mobile,u.address,u.city,u.zip_code,u.notes from ea_register as r LEFT JOIN ea_users as u ON u.userid=r.userid where r.Mobile='$mbl' and r.Passwd='$passwd' and r.Organization='$oid'";
     
     
        $query=$this->db->query($sql);
        $cnt=$query->num_rows();
        if($cnt==1){
            return $query->row_array();
        }else{
            return 0;
        }
       
        
       
    }
    
    
    public function check_booking($id){
        
         $sql="SELECT id FROM `ea_users` where userid='$id'";
        $query=$this->db->query($sql)->row_array();
        $uid=$query['id'];
         $sql="SELECT hash FROM `ea_appointments` WHERE id_users_customer='$uid'";
        $row=$this->db->query($sql)->row_array();
        return $row;
        
    }
    
    public function get_organization(){
        $sql="SELECT * FROM `ea_orgnization` WHERE Status='1' and Delete_flag='0'";
        return $query=$this->db->query($sql)->result_array();
    }
    public function add_organization($org,$status,$country,$code){
       
        
              // Check if Organization exists.
        if (isset($org))
        {
            
            if ( ! $this->validate_org($org))
            {
                throw new Exception ('Organization already exists. Please select a different '
                    . 'Organization for this record.');
            }
        }
        
        $organ=htmlspecialchars($org);
        $id=$this->session->userdata('user_id') ? $this->session->userdata('user_id') : '1';

//        $id=$this->session->userdata('user_id');
        
        if (!$this->validate_org1($org)){
             $sql="update ea_orgnization set Delete_flag='0' where organization_name='$organ'"; 
             $this->db->query($sql);
        }
        else{
             $date=date('d-m-Y h:i:s');
            //$date='';
             $sql="Insert into ea_orgnization values(NULL,'$organ','$id','0','$status','$country','$code','$date','$date')"; 

             $this->db->query($sql);
            // $this->db->query($sql,array($organ,$id,'0',$status,$country,$code));
        }
       
      //  echo "1";
        
        
        
    }
    
         public function validate_org($username)
    {
       

         $this->db->where('organization_name', $username);
         
         $this->db->where('Delete_flag!=', 1);

        return $this->db->get('orgnization')->num_rows() === 0;
    }
    
        public function validate_org1($username)
    {
       

         $this->db->where('organization_name', $username);
         
         $this->db->where('Delete_flag=', 1);

        return $this->db->get('orgnization')->num_rows() === 0;
    }
    
    
}