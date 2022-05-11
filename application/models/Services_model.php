<?php defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Services Model
 *
 * @package Models
 */
class Services_model extends EA_Model {
    /**
     * Services_Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('data_validation');
    }

    /**
     * Add (insert or update) a service record on the database
     *
     * @param array $service Contains the service data. If an 'id' value is provided then the record will be updated.
     *
     * @return int Returns the record id.
     * @throws Exception
     */
    public function add($service)
    {
        $this->validate($service);

        if ( ! isset($service['id']))
        {
              $name=$service['name'];
        if (isset($name)){
                    if ( ! $this->validate_service($name))
            {
                throw new Exception ('Service already exists. Please Change a different '
                    . 'Service for this record.');
            }            
        }
            $service['id'] = $this->insert($service);
        }
        else
        {
            $this->update($service);
        }

        return (int)$service['id'];
    }

    /**
     * Validate a service record data.
     *
     * @param array $service Contains the service data.
     *
     * @return bool Returns the validation result.
     *
     * @throws Exception If service validation fails.
     */
    public function validate($service)
    {
        // If record id is provided we need to check whether the record exists in the database.
        if (isset($service['id']))
        {
            $num_rows = $this->db->get_where('services', ['id' => $service['id']])->num_rows();

            if ($num_rows == 0)
            {
                throw new Exception('Provided service id does not exist in the database.');
            }
        }

        // Check if service category id is valid (only when present).
        if ( ! empty($service['id_service_categories']))
        {
            $num_rows = $this->db->get_where('service_categories',
                ['id' => $service['id_service_categories']])->num_rows();
            if ($num_rows == 0)
            {
                throw new Exception('Provided service category id does not exist in database.');
            }
        }

        // Check for required fields
        if ($service['name'] == '')
        {
            throw new Exception('Not all required service fields where provided: '
                . print_r($service, TRUE));
        }

        // Duration must be int
        if ($service['duration'] !== NULL)
        {
            if ( ! is_numeric($service['duration']))
            {
                throw new Exception('Service duration is not numeric.');
            }
        }

        if ($service['price'] !== NULL)
        {
            if ( ! is_numeric($service['price']))
            {
                throw new Exception('Service price is not numeric.');
            }
        }
        
        
        

        
        

        // Availabilities type must have the correct value.
        if ($service['availabilities_type'] !== NULL && $service['availabilities_type'] !== AVAILABILITIES_TYPE_FLEXIBLE
            && $service['availabilities_type'] !== AVAILABILITIES_TYPE_FIXED)
        {
            throw new Exception('Service availabilities type must be either ' . AVAILABILITIES_TYPE_FLEXIBLE
                . ' or ' . AVAILABILITIES_TYPE_FIXED . ' (given ' . $service['availabilities_type'] . ')');
        }

        if ($service['attendants_number'] !== NULL && ( ! is_numeric($service['attendants_number'])
                || $service['attendants_number'] < 1))
        {
            throw new Exception('Service attendants number must be numeric and greater or equal to one: '
                . $service['attendants_number']);
        }

        return TRUE;
    }

    /**
     * Insert service record into database.
     *
     * @param array $service Contains the service record data.
     *
     * @return int Returns the new service record id.
     *
     * @throws Exception If service record could not be inserted.
     */
    protected function insert($service)
    {
        $da=date("Y-m-d H:i:s");
        $service['Create_date'] = $da;
        $service['Modified_date'] = $da;
        $oid=$this->session->userdata('Organization');
        $service['Created_by']=$this->session->userdata('user_id');
              
        if ( ! $this->db->insert('services', $service))
        {
            throw new Exception('Could not insert service record.');
        }
        return (int)$this->db->insert_id();
    }
    
    
          public function validate_service($name)
    {
       
        $oid=$this->session->userdata('Organization');
         $this->db->where('name', $name);
         $this->db->where('Organization', $oid);

        return $this->db->get('services')->num_rows() === 0;
    }
    
           public function validate_cat($name)
    {
       

         $this->db->where('name', $name);

        return $this->db->get('service_categories')->num_rows() === 0;
    }
    

    /**
     * Update service record.
     *
     * @param array $service Contains the service data. The record id needs to be included in the array.
     *
     * @throws Exception If service record could not be updated.
     */
    protected function update($service)
    {
        $service['Modified_date'] = date("Y-m-d H:i:s");
        $oid=$this->session->userdata('Organization');
         $service['Modified_by']=$this->session->userdata('user_id');

        $this->db->where('id', $service['id']);
        if ( ! $this->db->update('services', $service))
        {
            throw new Exception('Could not update service record');
        }
    }

    /**
     * Checks whether an service record already exists in the database.
     *
     * @param array $service Contains the service data. Name, duration and price values are mandatory in order to
     * perform the checks.
     *
     * @return bool Returns whether the service record exists.
     *
     * @throws Exception If required fields are missing.
     */
    public function exists($service)
    {
        if ( ! isset(
            $service['name'],
            $service['duration'],
            $service['price']
        ))
        {
            throw new Exception('Not all service fields are provided in order to check whether '
                . 'a service record already exists: ' . print_r($service, TRUE));
        }

        $num_rows = $this->db->get_where('services', [
            'name' => $service['name'],
            'duration' => $service['duration'],
            'price' => $service['price']
        ])->num_rows();

        return $num_rows > 0;
    }

    /**
     * Get the record id of an existing record.
     *
     * Notice: The record must exist, otherwise an exception will be raised.
     *
     * @param array $service Contains the service record data. Name, duration and price values are mandatory for this
     * method to complete.
     *
     * @return int
     *
     * @throws Exception If required fields are missing.
     * @throws Exception If requested service was not found.
     */
    public function find_record_id($service)
    {
        if ( ! isset($service['name'])
            || ! isset($service['duration'])
            || ! isset($service['price']))
        {
            throw new Exception('Not all required fields where provided in order to find the '
                . 'service record id.');
        }

        $result = $this->db->get_where('services', [
            'name' => $service['name'],
            'duration' => $service['duration'],
            'price' => $service['price']
        ]);

        if ($result->num_rows() == 0)
        {
            throw new Exception('Could not find service record id');
        }

        return $result->row()->id;
    }

    /**
     * Delete a service record from database.
     *
     * @param int $service_id Record id to be deleted.
     *
     * @return bool Returns the delete operation result.
     *
     * @throws Exception If $service_id argument is invalid.
     */
    public function delete($service_id)
    {
        if ( ! is_numeric($service_id))
        {
            throw new Exception('Invalid argument type $service_id (value:"' . $service_id . '"');
        }

        $num_rows = $this->db->get_where('services', ['id' => $service_id])->num_rows();
        if ($num_rows == 0)
        {
            return FALSE; // Record does not exist
        }

        return $this->db->delete('services', ['id' => $service_id]);
    }

    /**
     * Get a specific row from the services db table.
     *
     * @param int $service_id The record's id to be returned.
     *
     * @return array Returns an associative array with the selected record's data. Each key has the same name as the
     * database field names.
     *
     * @throws Exception If $service_id argument is not valid.
     */
    public function get_row($service_id)
    {
        if ( ! is_numeric($service_id))
        {
            throw new Exception('$service_id argument is not an numeric (value: "' . $service_id . '")');
        }
        return $this->db->get_where('services', ['id' => $service_id])->row_array();
    }

    /**
     * Get a specific field value from the database.
     *
     * @param string $field_name The field name of the value to be
     * returned.
     * @param int $service_id The selected record's id.
     *
     * @return string Returns the records value from the database.
     *
     * @throws Exception If $service_id argument is invalid.
     * @throws Exception If $field_name argument is invalid.
     * @throws Exception if requested service does not exist in the database.
     * @throws Exception If requested field name does not exist in the database.
     */
    public function get_value($field_name, $service_id)
    {
        if ( ! is_numeric($service_id))
        {
            throw new Exception('Invalid argument provided as $service_id: ' . $service_id);
        }

        if ( ! is_string($field_name))
        {
            throw new Exception('$field_name argument is not a string: ' . $field_name);
        }

        if ($this->db->get_where('services', ['id' => $service_id])->num_rows() == 0)
        {
            throw new Exception('The record with the $service_id argument does not exist in the database: ' . $service_id);
        }

        $row_data = $this->db->get_where('services', ['id' => $service_id])->row_array();

        if ( ! array_key_exists($field_name, $row_data))
        {
            throw new Exception('The given $field_name argument does not exist in the database: '
                . $field_name);
        }

        return $row_data[$field_name];
    }

    /**
     * Get all, or specific records from service's table.
     *
     * Example:
     *
     * $this->services_model->get_batch(['id' => $record_id]);
     *
     * @param mixed $where
     * @param int|null $limit
     * @param int|null $offset
     * @param mixed $order_by
     *
     * @return array Returns the rows from the database.
     */
    public function get_batch($where = NULL, $limit = NULL, $offset = NULL, $order_by = NULL)
    {
        if ($where !== NULL)
        {
            $this->db->where($where);
            
        }

        if ($order_by !== NULL)
        {
            $this->db->order_by($order_by);
        }
        if($this->session->userdata('Organization')==1){

        }else{
            $this->db->where('Organization',$this->session->userdata('Organization'));
        }
         

        return $this->db->get('services', $limit, $offset)->result_array();
    }

    /**
     * This method returns all the services from the database.
     *
     * @return array Returns an object array with all the database services.
     */
    public function get_available_services()
    {
        $this->db->distinct();
        return $this->db
            ->select('services.*, service_categories.name AS category_name, '
                . 'service_categories.id AS category_id')
            ->from('services')
            
            ->join('services_providers',
                'services_providers.id_services = services.id', 'inner')
            ->join('service_categories',
                'service_categories.id = services.id_service_categories', 'left')
            ->where('services.Organization',$this->session->userdata('Organization'))    
            ->order_by('id DESC')
            ->get()->result_array();
            
    }
    
    public function get_duration($id){
        $oid=$this->session->userdata('Organization');
        if($this->db->query("SELECT * FROM `ea_services_providers` where id_users='$id'")->num_rows()==1){
            $service=$this->db->query("SELECT * FROM `ea_services_providers` where id_users='$id'")->result_array();
            $sid=$service[0]['id_services'];
            $duration=$this->db->query("SELECT duration FROM `ea_services` where id='$sid'")->result_array();
            return $duration[0]['duration'];
            
        }else{
            return "30";
        }
    }
    public function min_time($day){
        $id=$this->session->userdata('Organization');
         $sql="SELECT value FROM `ea_settings` where name='company_working_plan' and Organization='$id'";
         $cnt=$this->db->query($sql)->num_rows();
         if($cnt > 0){
            $query=$this->db->query($sql)->result_array();
            $mintime=json_decode($query[0]['value'],true);
         
            return $mintime[$day]['start'];
         }else{
            return "09:00";    
         }
       
    }
    
     public function max_time($day){
        $id=$this->session->userdata('Organization');
        $sql="SELECT value FROM `ea_settings` where name='company_working_plan' and Organization='$id'";
        $cnt=$this->db->query($sql)->num_rows();
        if($cnt > 0){
            $query=$this->db->query($sql)->result_array();
            $mintime=json_decode($query[0]['value'],true);
            return $mintime[$day]['end'];
         }else{
            return "18:00";    
         }
    }

    /**
     * Add (insert or update) a service category record into database.
     *
     * @param array $category Contains the service category data.
     *
     * @return int Returns the record ID.
     *
     * @throws Exception If service category data are invalid.
     */
    public function add_category($category)
    {
        if ( ! $this->validate_category($category))
        {
            throw new Exception('Service category data are invalid.');
        }

        if ( ! isset($category['id']))
        {
         $name=$category['name'];
        if (isset($name)){
                    if ( ! $this->validate_cat($name))
            {
                throw new Exception ('Category already exists. Please Change a different '
                    . 'Category for this record.');
            }            
        }
            
            
            $this->db->insert('service_categories', $category);
            $category['id'] = $this->db->insert_id();
        }
        else
        {
            $this->db->where('id', $category['id']);
            $this->db->update('service_categories', $category);
        }

        return (int)$category['id'];
    }

    /**
     * Validate a service category record data. This method must be used before adding
     * a service category record into database in order to secure the record integrity.
     *
     * @param array $category Contains the service category data.
     *
     * @return bool Returns the validation result.
     *
     * @throws Exception If required fields are missing.
     */
    public function validate_category($category)
    {
        try
        {
            // Required Fields
            if ( ! isset($category['name']))
            {
                throw new Exception('Not all required fields where provided ');
            }

            if ($category['name'] == '' || $category['name'] == NULL)
            {
                throw new Exception('Required fields cannot be empty or null ($category: '
                    . print_r($category, TRUE) . ')');
            }

            return TRUE;
        }
        catch (Exception $exception)
        {
            return FALSE;
        }
    }

    /**
     * Delete a service category record from the database.
     *
     * @param int $category_id Record id to be deleted.
     *
     * @return bool Returns the delete operation result.
     *
     * @throws Exception if Service category record was not found.
     */
    public function delete_category($category_id)
    {
        if ( ! is_numeric($category_id))
        {
            throw new Exception('Invalid argument given for $category_id: ' . $category_id);
        }

        $num_rows = $this->db->get_where('service_categories', ['id' => $category_id])
            ->num_rows();
        if ($num_rows == 0)
        {
            throw new Exception('Service category record not found in database.');
        }

        $this->db->where('id', $category_id);
        return $this->db->delete('service_categories');
    }

    /**
     * Get a service category record data.
     *
     * @param int $category_id Record id to be retrieved.
     *
     * @return array Returns the record data from the database.
     *
     * @throws Exception If $category_id argument is invalid.
     * @throws Exception If service category record does not exist.
     */
    public function get_category($category_id)
    {
        if ( ! is_numeric($category_id))
        {
            throw new Exception('Invalid argument type given $category_id: ' . $category_id);
        }

        $result = $this->db->get_where('service_categories', ['id' => $category_id]);

        if ($result->num_rows() == 0)
        {
            throw new Exception('Service category record does not exist.');
        }

        return $result->row_array();
    }

    /**
     * Get all service category records from database.
     *
     * @param mixed $where
     * @param int|null $limit
     * @param int|null $offset
     * @param mixed $order_by
     *
     * @return array Returns an array that contains all the service category records.
     */
    public function get_all_categories($where = NULL, $limit = NULL, $offset = NULL, $order_by = NULL)
    {
        if ($where !== NULL)
        {
            $this->db->where($where);
        }

        if ($order_by !== NULL)
        {
            $this->db->order_by($order_by);
        }

        return $this->db->get('service_categories', $limit, $offset)->result_array();
    }
    public function insert_consents($data){
        $timestmp=date('Y-m-d h:i:s');    
        $customer = $data['customer'];
        $name=$customer['first_name'];
        $phone=$customer['phone_number'];
        $email=$customer['email'];
        $oid=$this->session->userdata('Organization');
        $ip=$this->input->ip_address();

        $this->db->query("INSERT INTO `ea_consents` (`id`, `created`, `modified`, `first_name`, `last_name`, `email`, `ip`, `type`, `Organization`) VALUES (NULL, '$timestmp', '$timestmp', '$name', '$phone', '$email', '$ip', '', '$oid')");

    }
}
