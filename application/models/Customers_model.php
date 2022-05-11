<?php defined('BASEPATH') or exit('No direct script access allowed');

 

/**
 * Customers Model
 *
 * @package Models
 */
class Customers_model extends EA_Model {
    /**
     * Customers_Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('data_validation');
        
        $data=$this->session->userdata('records');
    }

    /**
     * Add a customer record to the database.
     *
     * This method adds a customer to the database. If the customer doesn't exists it is going to be inserted, otherwise
     * the record is going to be updated.
     *
     * @param array $customer Associative array with the customer's data. Each key has the same name with the database
     * fields.
     *
     * @return int Returns the customer id.
     * @throws Exception
     */
    public function add($customer)
    {
        // Validate the customer data before doing anything.
        $this->validate($customer);

        // Check if a customer already exists (by email).
        if ($this->exists($customer) && ! isset($customer['id']))
        {
            // Find the customer id from the database.
            $customer['id'] = $this->find_record_id($customer);
        }

        // Insert or update the customer record.
        if ( ! isset($customer['id']))
        {
           
           $customer['id'] = $this->insert($customer);
            
            
        }
        else
        {
            $this->update($customer);
        }

        return $customer['id'];
    }
    
    
        public function duplicate_add($customer)
    {
        // Validate the customer data before doing anything.
    //    $this->validate($customer);

    

        $customer['id'] = $this->duplicate_insert($customer);
         // Insert or update the customer record.
    //     if ( ! isset($customer['id']))
    //     {
        
    // }
    //     else
    //     {
    //         $this->duplicate_update($customer);
    //     }

        return $customer['id'];
    }

    /**
     * Validate customer data before the insert or update operation is executed.
     *
     * @param array $customer Contains the customer data.
     *
     * @return bool Returns the validation result.
     *
     * @throws Exception If customer validation fails.
     */
    public function validate($customer)
    {
        // If a customer id is provided, check whether the record exist in the database.
        if (isset($customer['id']))
        {
            $num_rows = $this->db->get_where('users', ['id' => $customer['id']])->num_rows();

            if ($num_rows === 0)
            {
                throw new Exception('Provided customer id does not '
                    . 'exist in the database.');
            }
        }

        $phone_number_required = $this->db->get_where('settings', ['name' => 'require_phone_number'])->row()->value === '1';

        // Validate required fields
        if ( ! isset(
                $customer['first_name'],
                $customer['MRN']
            )
            || ( ! isset($customer['phone_number']) && $phone_number_required))
        {
            throw new Exception('Not all required fields are provided: ' . print_r($customer, TRUE));
        }

        // Validate email address
        // if ( ! filter_var($customer['email'], FILTER_VALIDATE_EMAIL))
        // {
        //     throw new Exception('Invalid email address provided: ' . $customer['email']);
        // }
        $oid=$this->session->userdata('Organization');    
        // When inserting a record the email address must be unique.
        $customer_id = isset($customer['id']) ? $customer['id'] : '';
        if(!empty($customer['phone_number'])){
              $num_rows = $this->db
            ->select('*')
            ->from('users')
            ->join('roles', 'roles.id = users.id_roles', 'inner')
            ->where('roles.slug', DB_SLUG_CUSTOMER)
            ->where('users.phone_number', $customer['phone_number'])
            ->where('users.id !=', $customer_id)
            ->where('users.Organization =', $oid)
            ->get()
            ->num_rows();
            if ($num_rows > 0)
        {
            throw new Exception('Given phone_number belongs to another customer record. '
                . 'Please use a different phone_number.');
                
        }
        }
            
   

        

        return TRUE;
    }

    /**
     * Check if a particular customer record already exists.
     *
     * This method checks whether the given customer already exists in the database. It doesn't search with the id, but
     * with the following fields: "email"
     *
     * @param array $customer Associative array with the customer's data. Each key has the same name with the database
     * fields.
     *
     * @return bool Returns whether the record exists or not.
     *
     * @throws Exception If customer email property is missing.
     */
    public function exists($customer)
    {
        // if (empty($customer['email']))
        // {
        //     throw new Exception('Customer\'s email is not provided.');
        // }
        $oid=$this->session->userdata('Organization');    
        // This method shouldn't depend on another method of this class.
        $num_rows = $this->db
            ->select('*')
            ->from('users')
            ->join('roles', 'roles.id = users.id_roles', 'inner')
            ->where('users.phone_number', $customer['phone_number'])
            ->where('users.Organization', $oid)
            ->where('roles.slug', DB_SLUG_CUSTOMER)
            ->get()->num_rows();

        return $num_rows > 0;
    }
    
     public function cexists($customer)
    {
        // if (empty($customer['email']))
        // {
        //     throw new Exception('Customer\'s email is not provided.');
        // }
        $oid=$this->session->userdata('Organization');    
        // This method shouldn't depend on another method of this class.
        $num_rows = $this->db
            ->select('*')
            ->from('register')
            ->where('register.Mobile', $customer['phone_number'])
            ->where('register.Organization', $oid)
            ->get()->num_rows();

        return $num_rows > 0;
    }
    

 public function cregister($customer)
    {
        // Before inserting the customer we need to get the customer's role id
        // from the database and assign it to the new record as a foreign key.
        $customer_role_id = $this->db
            ->select('id')
            ->from('roles')
            ->where('slug', DB_SLUG_CUSTOMER)
            ->get()->row()->id;

            $customer['id_roles'] = $customer_role_id;
        
            $fname=$customer['first_name'];
            
            $email=$customer['email'];
            @$passwd=hash('sha256', $customer['password']);
            @$org=$customer['Organization'];
            //$passwd=password_hash($this->input->post('passwd'),PASSWORD_BCRYPT);
            $mobile=$customer['phone_number'];
            $timestamp = date("Y-m-d H:i:s");
            $sql="Insert into ea_register values(NULL,?,?,?,?,?,?,?,?)"; 
            $this->db->query($sql,array($fname,$email,$passwd,$mobile,$org,3,$timestamp,$timestamp));

            $userid=$this->db->get_where('register', ['Mobile' => $mobile,'Organization'=>$org])->row_array();
           
            // $customer['password']=$passwd;
            // $customer['userid']=$userid['userid'];
            
            
      

        return $userid['userid'];
    }
    

 public function cuser($customer)
    {
        // Before inserting the customer we need to get the customer's role id
        // from the database and assign it to the new record as a foreign key.
        $oid=$this->session->userdata('Organization');    
            $userid=$this->db->get_where('register', ['Mobile' => $customer['phone_number'],'Organization'=>$oid])->row_array();
           
            // $customer['password']=$passwd;
            // $customer['userid']=$userid['userid'];
            
            
      

        return $userid['userid'];
    }
    
    public function get_day_report($day,$pro){

        $oid=$this->session->userdata('Organization');
       

    
            $qry=$this->db->query("select Organization from ea_users where id='$pro'")->result_array();
        
        

        $org=$qry[0]['Organization'];
       
        $cnt=$this->db->query("SELECT book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE start_datetime Like '%".$day."%'  and id_users_provider='$pro' and Organization='$org' ")->num_rows();
        
        if($cnt==0){
           return 'Data not available. Please select Another';
        }else{
        $app=$this->db->query("SELECT Status,book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE start_datetime Like '%".$day."%'  and id_users_provider='$pro'  and Organization='$org' ")->result_array();
        $useri=array();
        for($i=0;$i<$cnt;$i++){
        array_push($useri,$this->db->query("SELECT * FROM `ea_users` WHERE id='".$app[$i]['id_users_customer']."'")->result_array());    
        }
        $payment=array();
        for($i=0;$i<$cnt;$i++){
        array_push($payment,$this->db->query("SELECT * FROM `ea_Payment` WHERE Order_id='".$app[$i]['Order_id']."'")->result_array());    
        }
        
        
        
        $data=array(
            "appointment"=>$app,
            "user"=>$useri,
            "payment"=>$payment
            );
             return $data; 
            
        }
        
    }
    
    
      public function get_week_report($sday,$eday,$pro){
        $qry=$this->db->query("select Organization from ea_users where id='$pro'")->result_array();
        $org=$qry[0]['Organization'];
       
       
    //   echo $sql="SELECT book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE start_datetime between '$sday' and  '$eday'   and Organization='$org'";
        $cnt=$this->db->query("SELECT book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE start_datetime between '$sday' and  '$eday'   and id_users_provider='$pro' and Organization='$org' ")->num_rows();
        
        if($cnt==0){
           return 'Data not available. Please select Another';
        }else{
            
             
        $app=$this->db->query("SELECT Status,book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE start_datetime between '$sday' and  '$eday'  and id_users_provider='$pro'  and Organization='$org' ")->result_array();
        $useri=array();
        for($i=0;$i<$cnt;$i++){
        array_push($useri,$this->db->query("SELECT * FROM `ea_users` WHERE id='".$app[$i]['id_users_customer']."'")->result_array());    
        }
        $payment=array();
        for($i=0;$i<$cnt;$i++){
        array_push($payment,$this->db->query("SELECT * FROM `ea_Payment` WHERE Order_id='".$app[$i]['Order_id']."'")->result_array());    
        }
        
        
        
        $data=array(
            "appointment"=>$app,
            "user"=>$useri,
            "payment"=>$payment
            );
             return $data; 
             
             
            
        }
        
    }
    
          public function get_monthly_report($sday,$pro){
        $qry=$this->db->query("select Organization from ea_users where id='$pro'")->result_array();
        $org=$qry[0]['Organization'];
       
       
      
        $cnt=$this->db->query("SELECT book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE MONTH(start_datetime)='$sday'  and id_users_provider='$pro' and Organization='$org'")->num_rows();
        
        if($cnt==0){
           return 'Data not available. Please select Another';
        }else{
           
             
        $app=$this->db->query("SELECT Status,book_datetime,start_datetime,id_users_customer,Order_id FROM `ea_appointments` WHERE MONTH(start_datetime)='$sday'  and id_users_provider='$pro' and Organization='$org' ")->result_array();
        $useri=array();
        for($i=0;$i<$cnt;$i++){
        array_push($useri,$this->db->query("SELECT * FROM `ea_users` WHERE id='".$app[$i]['id_users_customer']."'")->result_array());    
        }
        $payment=array();
        for($i=0;$i<$cnt;$i++){
        array_push($payment,$this->db->query("SELECT * FROM `ea_Payment` WHERE Order_id='".$app[$i]['Order_id']."'")->result_array());    
        }
        
        
        
        $data=array(
            "appointment"=>$app,
            "user"=>$useri,
            "payment"=>$payment
            );
             return $data; 
            
        }
        
    }
    
    public function get_appointment($status){
        $cnt=$this->db->query("select id,hash from ea_appointments where Status='$status'")->num_rows();
        if($cnt > 0){

        $data1=$this->db->query("select * from ea_appointments where Status='$status'")->result_array();
     
        $useri=array();
        for($i=0;$i<$cnt;$i++){
        array_push($useri,$this->db->query("SELECT * FROM `ea_users` WHERE id='".$data1[$i]['id_users_customer']."'")->result_array());    
        }
     
        $data=array('appointment'=>$data1,'user'=>$useri);
        return $data;   
    }else{
        return "Data not Available";
        }
    }

    public function report($oid){
        $sql="select id,hash,start_datetime,id_users_provider,id_users_customer,id_services,Status from ea_appointments where Organization='$oid' order by start_datetime desc";
        $data=$this->db->query($sql)->result_array();        
        foreach($data as &$row){
            $row['customers']=[];
            $customers=$this->db->query("select first_name,phone_number from ea_users where Organization='$oid' and id='".$row['id_users_customer']."'")->result_array();    
            foreach($customers as $customer){
                $row['customers'][]=$customer;
                $providers=$this->db->query("select first_name from ea_users where Organization='$oid' and id='".$row['id_users_provider']."'")->result_array();         
                $row['providers']=[];
                foreach($providers as $pro){
                    $row['providers'][]=$pro['first_name'];
                }
            }
        }
        return $data;

    }
    
    
public function cpasswd($customer)
    {
        // Before inserting the customer we need to get the customer's role id
        // from the database and assign it to the new record as a foreign key.
        $oid=$this->session->userdata('Organization');    
            $userid=$this->db->get_where('register', ['Mobile' => $customer['phone_number'],'Organization'=>$oid])->row_array();
           
            // $customer['password']=$passwd;
            // $customer['userid']=$userid['userid'];
            
            
      

        return $userid['Passwd'];
    }    
    

    /**
     * Find the database id of a customer record.
     *
     * The customer data should include the following fields in order to get the unique id from the database: "email"
     *
     * IMPORTANT: The record must already exists in the database, otherwise an exception is raised.
     *
     * @param array $customer Array with the customer data. The keys of the array should have the same names as the
     * database fields.
     *
     * @return int Returns the ID.
     *
     * @throws Exception If customer record does not exist.
     */
    public function find_record_id($customer)
    {
        // if (empty($customer['email']))
        // {
        //     throw new Exception('Customer\'s email was not provided: '
        //         . print_r($customer, TRUE));
        // }
        $oid=$this->session->userdata('Organization');    
        // Get customer's role id
        $result = $this->db
            ->select('users.id')
            ->from('users')
            ->join('roles', 'roles.id = users.id_roles', 'inner')
            ->where('users.phone_number', $customer['phone_number'])
            ->where('users.Organization', $oid)
            ->where('roles.slug', DB_SLUG_CUSTOMER)
            ->get();

        if ($result->num_rows() == 0)
        {
            throw new Exception('Could not find customer record id.');
        }

        return $result->row()->id;
    }

    /**
     * Insert a new customer record to the database.
     *
     * @param array $customer Associative array with the customer's data. Each key has the same name with the database
     * fields.
     *
     * @return int Returns the id of the new record.
     *
     * @throws Exception If customer record could not be inserted.
     */
    protected function insert($customer)
    {
        // Before inserting the customer we need to get the customer's role id
        // from the database and assign it to the new record as a foreign key.
        $customer_role_id = $this->db
            ->select('id')
            ->from('roles')
            ->where('slug', DB_SLUG_CUSTOMER)
            ->get()->row()->id;

        $customer['id_roles'] = $customer_role_id;
        
            $fname=$customer['first_name'];
            $timestamp = date("Y-m-d H:i:s");
            $email=$customer['email'];
            @$passwd=hash('sha256', $customer['password']);
            @$org=$customer['Organization'];
            //$passwd=password_hash($this->input->post('passwd'),PASSWORD_BCRYPT);
            $mobile=$customer['phone_number'];
            $creuserid=$this->session->userdata('user_id');
       
            $sql="Insert into ea_register values(NULL,?,?,?,?,?,?,?,?)"; 
            $this->db->query($sql,array($fname,$email,$passwd,$mobile,$org,3,null,null));

            $userid=$this->db->get_where('register', ['Mobile' => $mobile,'Organization'=>$org])->row_array();
          
                        
            $customer['password']=$passwd;
            $customer['userid']=$userid['userid'];
            $customer['Create_date']=$timestamp;
            $customer['Modified_date']=$timestamp;
            $customer['Created_by']=$creuserid;
            
            
            
        if ( ! $this->db->insert('users', $customer))
        {
            throw new Exception('Could not insert customer to the database.');
        }
        // $this->db->where('phone_number', $mobile);
        // $this->db->update('users', ['userid',$customer['userid']]);

        return (int)$this->db->insert_id();
    }
    
    
    
    public function duplicate_insert($customer)
    {
       
        // Before inserting the customer we need to get the customer's role id
        // from the database and assign it to the new record as a foreign key.
        $customer_role_id = $this->db
            ->select('id')
            ->from('roles')
            ->where('slug', DB_SLUG_CUSTOMER)
            ->get()->row()->id;

        $customer['id_roles'] = $customer_role_id;
        @$customer['password']= hash('sha256', $customer['password']);

        if ( ! $this->db->insert('duplicate_user', $customer))
        {
            throw new Exception('Could not insert customer to the database.');
        }

        return (int)$this->db->insert_id();
    }

    /**
     * Update an existing customer record in the database.
     *
     * The customer data argument should already include the record ID in order to process the update operation.
     *
     * @param array $customer Associative array with the customer's data. Each key has the same name with the database
     * fields.
     *
     * @return int Returns the updated record ID.
     *
     * @throws Exception If customer record could not be updated.
     */
    protected function update($customer)
    {
        
        $userid=$this->db->get_where('users', ['id' => $customer['id']])->row_array();

        
        $this->db->where('userid', $userid['userid']);
        $timestamp = date("Y-m-d H:i:s");

        $creuserid=$this->session->userdata('user_id');

            if(@$customer['password'] != ''){
            @$passwd=hash('sha256', $customer['password']);
            $customer['password']=$passwd;
           

             $customer1=array( 
        "Fname" => $customer['first_name'],
        "Email" => $customer['email'],
        "Passwd" => $passwd,
        "Mobile" => $customer['phone_number'],
       "Modified_date" =>$timestamp
);
}
else{
             $customer1=array( 
        "Fname" => $customer['first_name'],
        "Email" => $customer['email'],
        "Mobile" => $customer['phone_number'],
        "Modified_date" =>$timestamp
        
);
}

$customer["Modified_by"]=$creuserid;

            $this->db->update('register', $customer1);
            $this->db->where('id', $customer['id']);
        if ( ! $this->db->update('users', $customer))
        {
            throw new Exception('Could not update customer to the database.');
        }

        return (int)$customer['id'];
    }
    
      protected function duplicate_update($customer)
    {
        $this->db->where('id', $customer['id']);

        if ( ! $this->db->insert('duplicate_user', $customer))
        {
            throw new Exception('Could not update customer to the database.');
        }

        return (int)$customer['id'];
    }

    /**
     * Delete an existing customer record from the database.
     *
     * @param int $customer_id The record id to be deleted.
     *
     * @return bool Returns the delete operation result.
     *
     * @throws Exception If $customer_id argument is invalid.
     */
    public function delete($customer_id)
    {
        if ( ! is_numeric($customer_id))
        {
            throw new Exception('Invalid argument type $customer_id: ' . $customer_id);
        }

        $num_rows = $this->db->get_where('users', ['id' => $customer_id])->num_rows();
        if ($num_rows == 0)
        {
            return FALSE;
        }
        $userid=$this->db->get_where('users', ['id' => $customer_id])->row_array();
        $this->db->delete('register', ['userid' => $userid['userid']]);
        
        return $this->db->delete('users', ['id' => $customer_id]);
    }

    /**
     * Get a specific row from the appointments table.
     *
     * @param int $customer_id The record's id to be returned.
     *
     * @return array Returns an associative array with the selected record's data. Each key has the same name as the
     * database field names.
     *
     * @throws Exception If $customer_id argumnet is invalid.
     */
    public function get_row($customer_id)
    {
       $customer_id = (int)$customer_id; 
       
        if ( ! is_numeric($customer_id))
        {
            throw new Exception('Invalid argument provided as $customer_id : ' . $customer_id);
        }
        return $this->db->get_where('users', ['id' => $customer_id])->row_array();
    }

    /**
     * Get a specific field value from the database.
     *
     * @param string $field_name The field name of the value to be returned.
     * @param int $customer_id The selected record's id.
     *
     * @return string Returns the records value from the database.
     *
     * @throws Exception If $customer_id argument is invalid.
     * @throws Exception If $field_name argument is invalid.
     * @throws Exception If requested customer record does not exist in the database.
     * @throws Exception If requested field name does not exist in the database.
     */
    public function get_value($field_name, $customer_id)
    {
        if ( ! is_numeric($customer_id))
        {
            throw new Exception('Invalid argument provided as $customer_id: '
                . $customer_id);
        }

        if ( ! is_string($field_name))
        {
            throw new Exception('$field_name argument is not a string: '
                . $field_name);
        }

        if ($this->db->get_where('users', ['id' => $customer_id])->num_rows() == 0)
        {
            throw new Exception('The record with the $customer_id argument '
                . 'does not exist in the database: ' . $customer_id);
        }

        $row_data = $this->db->get_where('users', ['id' => $customer_id])->row_array();

        if ( ! array_key_exists($field_name, $row_data))
        {
            throw new Exception('The given $field_name argument does not exist in the database: '
                . $field_name);
        }

        $customer = $this->db->get_where('users', ['id' => $customer_id])->row_array();

        return $customer[$field_name];
    }

    /**
     * Get all, or specific records from appointment's table.
     *
     * Example:
     *
     * $this->appointments_model->get_batch([$id => $record_id]);
     *
     * @param mixed|null $where
     * @param int|null $limit
     * @param int|null $offset
     * @param mixed|null $order_by
     *
     * @return array Returns the rows from the database.
     */
    public function get_batch($where = NULL, $limit = NULL, $offset = NULL, $order_by = NULL)
    {
        $role_id = $this->get_customers_role_id();

        if ($where !== NULL)
        {
            $this->db->where($where);
        }

        if ($order_by !== NULL)
        {
            $this->db->order_by($order_by);
        }
       
        $oid=$this->session->userdata('Organization');
         $roleslug=$this->session->userdata('role_slug');
        
if($roleslug == 'admin' and ($oid == 1 or $oid == 8)){
        
        return $this->db->get_where('users', ['id_roles' => $role_id], $limit, $offset)->result_array();
    
}
else{
        return $this->db->get_where('users', ['id_roles' => $role_id,'Organization'=>$oid], $limit, $offset)->result_array();
    
}
    }

    /**
     * Get the customers role id from the database.
     *
     * @return int Returns the role id for the customer records.
     */
    public function get_customers_role_id()
    {
        return $this->db->get_where('roles', ['slug' => DB_SLUG_CUSTOMER])->row()->id;
    }
}
