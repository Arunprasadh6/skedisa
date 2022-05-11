<?php defined('BASEPATH') or exit('No direct script access allowed');



/**
 * Settings Model
 * 
 * @package Models
 */
class Settings_model extends EA_Model {
    /**
     * Get setting value from database.
     *
     * This method returns a system setting from the database.
     *
     * @param string $name The database setting name.
     *
     * @return string Returns the database value for the selected setting.
     *
     * @throws Exception If the $name argument is invalid.
     * @throws Exception If the requested $name setting does not exist in the database.
     */
    public function get_setting($name)
    {
        if ( ! is_string($name))
        {
            // Check argument type.
            throw new Exception('$name argument is not a string: ' . $name);
        }
        $oid=empty($this->session->userdata('Organization')) ? 0 : $this->session->userdata('Organization');
        // if ($this->db->get_where('settings', ['name' => $name,'Organization'=>$oid])->num_rows() != 0)
        // {
        //     // Check if setting exists in db.
        //     throw new Exception('$name setting does not exist in database: ' . $name);
        // }

        $query = $this->db->get_where('settings', ['name' => $name]);
        $setting = $query->num_rows() > 0 ? $query->row() : '';
        return $setting->value;
        
    }
    
    public function get_onlineavailablity(){
        $oid=empty($this->session->userdata('Organization')) ? 1 : $this->session->userdata('Organization');
    }

    public function get_result($id){
        $sql="SELECT * FROM `ea_subscription` where Organization='$id'";
        $cnt=$this->db->query($sql)->num_rows();
        if($cnt > 0){
            return $this->db->query($sql)->result_array();
        }
       
    }
    
     public function get_cname($name)
    {
        if ( ! is_string($name))
        {
            // Check argument type.
            throw new Exception('$name argument is not a string: ' . $name);
        }
        $oid=empty($this->session->userdata('Organization')) ? 1 : $this->session->userdata('Organization');
       

        $query = $this->db->get_where('settings', ['name' => $name,'Organization'=>$oid]);
        $setting = $query->num_rows() > 0 ? $query->row() : '';
        return $setting->value;
        
    }


    public function add_coupon($data){
        $this->db->insert('ea_coupon',$data);
    }

    

    /**
     * This method sets the value for a specific setting on the database.
     *
     * If the setting doesn't exist, it is going to be created, otherwise updated.
     *
     * @param string $name The setting name.
     * @param string $value The setting value.
     *
     * @return int Returns the setting database id.
     *
     * @throws Exception If $name argument is invalid.
     * @throws Exception If the save operation fails.
     */
    public function set_setting($name, $value)
    {
        if ( ! is_string($name))
        {
            throw new Exception('$name argument is not a string: ' . $name);
        }
        $oid=$this->session->userdata('Organization');
        $query = $this->db->get_where('settings', ['name' => $name,'Organization'=>$oid]);
 
        if ($query->num_rows() > 0)
        {
            // Update setting
            if ( ! $this->db->update('settings', ['value' => $value], ['name' => $name]))
            {
                throw new Exception('Could not update database setting.');
            }
            $setting_id = (int)$this->db->get_where('settings', ['name' => $name,'Organization'=>$oid])->row()->id;
        }
        else
        {
            // Insert setting
            $insert_data = [
                'name' => $name,
                'value' => $value
            ];

            if ( ! $this->db->insert('settings', $insert_data))
            {
                throw new Exception('Could not insert database setting');
            }

            $setting_id = (int)$this->db->insert_id();
        }

        return $setting_id;
    }

    /**
     * Remove a setting from the database.
     *
     * @param string $name The setting name to be removed.
     *
     * @return bool Returns the delete operation result.
     *
     * @throws Exception If the $name argument is invalid.
     */
    public function remove_setting($name)
    {
        if ( ! is_string($name))
        {
            throw new Exception('$name is not a string: ' . $name);
        }
$oid=$this->session->userdata('Organization');
        if ($this->db->get_where('settings', ['name' => $name,'Organization'=>$oid])->num_rows() == 0)
        {
            return FALSE; // There is no such setting.
        }

        return $this->db->delete('settings', ['name' => $name,'Organization'=>$oid]);
    }

    /**
     * Saves all the system settings into the database.
     *
     * This method is useful when trying to save all the system settings at once instead of
     * saving them one by one.
     *
     * @param array $settings Contains all the system settings.
     *
     * @return bool Returns the save operation result.
     *
     * @throws Exception When the update operation won't work for a specific setting.
     */
    public function save_settings($settings)
    {
        if ( ! is_array($settings))
        {
            throw new Exception('$settings argument is invalid: ' . print_r($settings, TRUE));
        }
        $oid=$this->session->userdata('Organization');

        foreach ($settings as $setting)
        {
         
       //@$this->db->get_where('settings', ['name' => $setting['name'],'Organization'=>$oid]);
            @$this->db->where(['name'=> $setting['name'],'Organization'=>$oid]);
           
            if ( ! $this->db->update('settings', ['value' => $setting['value']]))
            {
                throw new Exception('Could not save setting (' . $setting['name']
                    . ' - ' . $setting['value'] . ')');
            }
            if(@$setting['name'] == 'company_name'){
              //  @$this->db->where(['organization_id'=>$oid]);
                //@$this->db->update('orgnization', ['organization_name' =>  $setting['value']]);
            $this->db->query("update ea_orgnization set organization_name='".$setting['value']."' where organization_id='".$oid."'");
        }
        }
       
        

        return TRUE;
    }

    /**
     * Returns all the system settings at once.
     *
     * @return array Array of all the system settings stored in the 'settings' table.
     */
    public function get_settings()
    {
        // return $this->db->get('settings')
        // ->getw
        // ->result_array();
        $oid=$this->session->userdata('Organization');
        return $this->db->get_where('settings', ['Organization' => $oid])->result_array();
    }
      public function get_color()
    {
          $oid=$this->session->userdata('Organization');
        return $this->db->get_where('color', ['Organization' => $oid])->result_array();
    }
    
    public function get_image($id){
        if($this->db->get_where('image', ['Organization' => $id])->num_rows() > 0){
            return $this->db->get_where('image', ['Organization' => $id])->result_array();
        }else{
            return "user.jpg";
        }
        
    }
    
     public function get_orgname($id){
      return  $this->db->get_where('orgnization', ['Organization_id' => $id])->result_array();
    }
    
    public function get_days($oid){
        $id=$this->session->userdata('Organization');
         return  $this->db->get_where('settings', ['Organization' => $id,'name'=>'availability'])->result_array();
    }
     public function get_count($oid){
         return  $this->db->get_where('settings', ['Organization' => $oid,'name'=>'Company_count'])->result_array();
    }
    
    public function get_order(){
        return $this->db->query("select Orderid from Order_table")->result_array();
    }

    public function set_color($color){
       
        $userid=$this->session->userdata('user_id');
        $oid=$this->session->userdata('Organization');
        $timestmp= date("Y-m-d H:i:s");
        $this->db->where('Organization',$oid);    
        $query = $this->db->get('color');
       
        if($query->num_rows() > 0){
        $this->db->where('Organization',$oid);    
        $data=$this->db->query("select id from ea_users where Organization='$oid'")->result_array();
        $modifyby=$data[0]['id'];
        $sql=$this->db->update('color', ['color_code' => $color,'Modified_by'=>$modifyby,'Modified_date'=>$timestmp]);    
        return 'Updated'; 
        }
        else{
            $sql="Insert into ea_color values(NULL,?,?,?,?,?,?)"; 
            $this->db->query($sql,array($color,$userid,$oid,'',$timestmp,$timestmp));
           return 'Added';
        }
        
    }
}
