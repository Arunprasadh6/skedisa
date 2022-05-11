<?php defined('BASEPATH') or exit('No direct script access allowed');


class Backend extends EA_Controller {
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('services_model');
        $this->load->model('customers_model');
        $this->load->model('settings_model');
        $this->load->model('roles_model');
        $this->load->model('user_model');
        $this->load->model('secretaries_model');
        $this->load->model('admins_model');
        $this->load->model('customermodel');
        $this->load->library('timezones');
        $this->load->library('notifications');
        $this->load->library('migration');
    }

    /**
     * Display the main backend page.
     *
     * This method displays the main backend page. All users login permission can view this page which displays a
     * calendar with the events of the selected provider or service. If a user has more privileges he will see more
     * menus at the top of the page.
     *
     * @param string $appointment_hash Appointment edit dialog will appear when the page loads (default '').
     *
     * @throws Exception
     */
    public function index($appointment_hash = '')
    {
        $this->session->set_userdata('dest_url', site_url('backend/index' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));

        if ( ! $this->has_privileges(PRIV_APPOINTMENTS))
        {
            return;
        }

        $calendar_view_query_param = $this->input->get('view');

        $user_id = $this->session->userdata('user_id');

        $user = $this->user_model->get_user($user_id);

        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('calendar');
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_APPOINTMENTS;
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $view['available_services'] = $this->services_model->get_available_services();
        $view['customers'] = $this->customers_model->get_batch();
        $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        
        $view['timezones'] = $this->timezones->to_array();
        $this->set_user_data($view);

        if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
        {
            $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
            $view['secretary_providers'] = $secretary['providers'];
        }
        else
        {
            $view['secretary_providers'] = [];
        }

        $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
        
        if ($appointment_hash !== '' && count($results) > 0)
        {
          
            $appointment = $results[0];
            $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
            $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
       
        }
        else
        {
            $view['edit_appointment'] = NULL;
        }
        $this->load->view('backend/header', $view);
        $this->load->view('backend/calendar', $view);
        $this->load->view('backend/footer', $view);
    }


     public function index_admin($appointment_hash=''){
        $this->session->set_userdata('dest_url', site_url('backend/index' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));

        if ( ! $this->has_privileges(PRIV_APPOINTMENTS))
        {
            return;
        }

        $calendar_view_query_param = $this->input->get('view');
        $user_id = $this->session->userdata('user_id');
        $user = $this->user_model->get_user($user_id);
        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('services');
        $view['user_display_name'] =
         $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_SERVICES;
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $view['available_services'] = $this->services_model->get_available_services();
        $view['color_code'] = $this->settings_model->get_color();
        $view['customers'] = $this->customers_model->get_batch();
        $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        $view['user_details']=$user;
        
       
        $view['services'] = $this->services_model->get_batch();        
        $view['categories'] = $this->services_model->get_all_categories();
        $view['timezones'] = $this->timezones->to_array();         
        $this->set_user_data($view);

        if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
        {
            $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
            $view['secretary_providers'] = $secretary['providers'];
        }
        else
        {
            $view['secretary_providers'] = [];
        }

        $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
        
        if ($appointment_hash !== '' && count($results) > 0)
        {
          
            $appointment = $results[0];
            $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
            $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
       
        }
        else
        {
            $view['edit_appointment'] = NULL;
        }
        $this->load->view('template/header', $view);
        $this->load->view('template/services', $view);
        $this->load->view('template/footer', $view);
    }


    public function profile($appointment_hash=''){
        $this->session->set_userdata('dest_url', site_url('template/settings'));
        if ( ! $this->has_privileges(PRIV_SYSTEM_SETTINGS, FALSE)
            && ! $this->has_privileges(PRIV_USER_SETTINGS))
        {
            return;
        }
    
        $user_id = $this->session->userdata('user_id');
        $user = $this->user_model->get_user($user_id);
        $view['user_details']=$user;
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $calendar_view_query_param = $this->input->get('view');
        $view['available_services'] = $this->services_model->get_available_services();
        $view['customers'] = $this->customers_model->get_batch();
        $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
       
        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('settings');
        $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
        $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['role_slug'] = $this->session->userdata('role_slug');
        $view['system_settings'] = $this->settings_model->get_settings();
        $view['user_settings'] = $this->user_model->get_user($user_id);
        $view['timezones'] = $this->timezones->to_array();
        $view['providers'] = $this->providers_model->get_batch();
        $view['secretaries'] = $this->secretaries_model->get_batch();
        $view['services'] = $this->services_model->get_batch();
        $view['color_code'] = $this->settings_model->get_color();
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
        $view['user_details']=$user;
        // book_advance_timeout preview
        $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
        $hours = floor($book_advance_timeout / 60);
        $minutes = $book_advance_timeout % 60;
        $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
        $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
        $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));
    
        $this->set_user_data($view);
        $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
         if ($appointment_hash !== '' && count($results) > 0)
        {
          
            $appointment = $results[0];
            $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
            $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
       
        }
        else
        {
            $view['edit_appointment'] = NULL;
        }
       
       
        $this->load->view('template/header', $view);
        $this->load->view('template/profile', $view);
        $this->load->view('template/footer', $view);
    }

    /**
     * Check whether current user is logged in and has the required privileges to view a page.
     *
     * The backend page requires different privileges from the users to display pages. Not all pages are available to
     * all users. For example secretaries should not be able to edit the system users.
     *
     * @param string $page This argument must match the roles field names of each section (eg "appointments", "users"
     * ...).
     * @param bool $redirect If the user has not the required privileges (either not logged in or insufficient role
     * privileges) then the user will be redirected to another page. Set this argument to FALSE when using ajax (default
     * true).
     *
     * @return bool Returns whether the user has the required privileges to view the page or not. If the user is not
     * logged in then he will be prompted to log in. If he hasn't the required privileges then an info message will be
     * displayed.
     */
    protected function has_privileges($page, $redirect = TRUE)
    {
        // Check if user is logged in.
        $user_id = $this->session->userdata('user_id');

        if ($user_id == FALSE)
        {
            // User not logged in, display the login view.
            if ($redirect)
            {
                header('Location: ' . site_url('admin'));
            }
            return FALSE;
        }

        // Check if the user has the required privileges for viewing the selected page.
        $role_slug = $this->session->userdata('role_slug');

        $role_privileges = $this->db->get_where('roles', ['slug' => $role_slug])->row_array();

        if ($role_privileges[$page] < PRIV_VIEW)
        {
            // User does not have the permission to view the page.
            if ($redirect)
            {
                header('Location: ' . site_url('user/no_privileges'));
            }
            return FALSE;
        }

        return TRUE;
    }

    /**
     * Set the user data in order to be available at the view and js code.
     *
     * @param array $view Contains the view data.
     */
    protected function set_user_data(&$view)
    {
        $view['user_id'] = $this->session->userdata('user_id');
        $view['user_email'] = $this->session->userdata('user_email');
        $view['timezone'] = $this->session->userdata('timezone');
        $view['role_slug'] = $this->session->userdata('role_slug');
        $view['privileges'] = $this->roles_model->get_privileges($this->session->userdata('role_slug'));
    }

   public function organization(){
        $this->session->set_userdata('dest_url', site_url('backend/services'));

        if ( ! $this->has_privileges(PRIV_SERVICES))
        {
            return;
        }
        $user_id = $this->session->userdata('user_id');
        $view['base_url'] = config('base_url');
        $view['page_title'] = "Organization";
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_ORGANIZATION;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['services'] = $this->services_model->get_batch();
        $view['categories'] = $this->services_model->get_all_categories();
        $view['timezones'] = $this->timezones->to_array();
          $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
          $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
          $view['user_details']=$user;
          $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/organization', $view);
        $this->load->view('backend/footer', $view);
   }


   public function add_organization($appointment_hash=''){
    $this->session->set_userdata('dest_url', site_url('backend/services'));

    if ( ! $this->has_privileges(PRIV_SERVICES))
    {
        return;
    }
    $user_id = $this->session->userdata('user_id');
    $user = $this->user_model->get_user($user_id);
   
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $calendar_view_query_param = $this->input->get('view');
    $view['available_services'] = $this->services_model->get_available_services();
    $view['customers'] = $this->customers_model->get_batch();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['base_url'] = config('base_url');
    $view['page_title'] = "Organization";
    $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
    $view['active_menu'] = PRIV_ORGANIZATION;
    $view['company_name'] = $this->settings_model->get_setting('company_name');
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['services'] = $this->services_model->get_batch();
    $view['categories'] = $this->services_model->get_all_categories();
    $view['timezones'] = $this->timezones->to_array();
    $view['color_code'] = $this->settings_model->get_color();
      $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
      $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $this->set_user_data($view);
    $sql="SELECT * FROM `ea_orgnization` where Status='1' and Delete_flag='0' ORDER BY organization_id DESC";
    $view['organization']=$this->db->query($sql)->result_array();
    $view['user_details']=$user;
    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
    $this->load->view('template/header', $view);
    $this->load->view('template/organization', $view);
    $this->load->view('template/footer', $view);
}

   public function billing(){
        $this->session->set_userdata('dest_url', site_url('backend/services'));

        if ( ! $this->has_privileges(PRIV_SERVICES))
        {
            return;
        }
        $user_id = $this->session->userdata('user_id');
        $view['base_url'] = config('base_url');
        $view['page_title'] = "Organization";
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_ORGANIZATION;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['services'] = $this->services_model->get_batch();
        $view['categories'] = $this->services_model->get_all_categories();
        $view['timezones'] = $this->timezones->to_array();
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        $view['response']=$this->settings_model->get_result($this->session->userdata('Organization'));
        $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/billing', $view);
        $this->load->view('backend/footer', $view);
   }
   
   
     public function reports(){
        $this->session->set_userdata('dest_url', site_url('backend/services'));

        if ( ! $this->has_privileges(PRIV_SERVICES))
        {
            return;
        }
        $user_id = $this->session->userdata('user_id');
        $view['base_url'] = config('base_url');
        $view['page_title'] = "Organization";
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_ORGANIZATION;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['services'] = $this->services_model->get_batch();
        $view['categories'] = $this->services_model->get_all_categories();
        $view['timezones'] = $this->timezones->to_array();
          $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
          $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        $this->set_user_data($view);
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $this->load->view('backend/header', $view);
        $this->load->view('backend/reports', $view);
        $this->load->view('backend/footer', $view);
   }



   public function dashboard(){
    $this->session->set_userdata('dest_url', site_url('backend/dashboard'));

    if ( ! $this->has_privileges(PRIV_SERVICES))
    {
        return;
    }
    $user_id = $this->session->userdata('user_id');
    $view['base_url'] = config('base_url');
    $view['page_title'] = "Dashboard";
    $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
    $view['active_menu'] = PRIV_ORGANIZATION;
    $view['company_name'] = $this->settings_model->get_setting('company_name');
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['services'] = $this->services_model->get_batch();
    $view['categories'] = $this->services_model->get_all_categories();
    $view['timezones'] = $this->timezones->to_array();
    $view['appointment_cnt']=$this->admins_model->get_appointment_count();
    $view['user_cnt']=$this->admins_model->get_user_count();
   
    $view['service_cnt']=$this->admins_model->get_service_count();
    $view['chart_cnt']=$this->admins_model->get_chart_count();
      $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
      $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $this->set_user_data($view);
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $this->load->view('backend/header', $view);
    $this->load->view('backend/dashboard', $view);
    $this->load->view('backend/footer', $view);
}

    /**
     * Display the backend customers page.
     *
     * In this page the user can manage all the customer records of the system.
     */
    public function customers()
    {
        $this->session->set_userdata('dest_url', site_url('backend/customers'));

        if ( ! $this->has_privileges(PRIV_CUSTOMERS))
        {
            return;
        }
        
         $user_id = $this->session->userdata('user_id');

        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('customers');
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_CUSTOMERS;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
        $view['customers'] = $this->customers_model->get_batch();
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $view['available_services'] = $this->services_model->get_available_services();
        $view['timezones'] = $this->timezones->to_array();
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
        {
            $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
            $view['secretary_providers'] = $secretary['providers'];
        }
        else
        {
            $view['secretary_providers'] = [];
        }

        $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/customers', $view);
        $this->load->view('backend/footer', $view);
    }

    /**
     * Displays the backend services page.
     *
     * Here the admin user will be able to organize and create the services that the user will be able to book
     * appointments in frontend.
     *
     * NOTICE: The services that each provider is able to service is managed from the backend services page.
     */
    public function services()
    {
        $this->session->set_userdata('dest_url', site_url('backend/services'));

        if ( ! $this->has_privileges(PRIV_SERVICES))
        {
            return;
        }
        $user_id = $this->session->userdata('user_id');
        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('services');
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_SERVICES;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['services'] = $this->services_model->get_available_services();
        //$view['services'] = $this->services_model->get_batch();
        $view['categories'] = $this->services_model->get_all_categories();
        $view['timezones'] = $this->timezones->to_array();
          $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
          $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/services', $view);
        $this->load->view('backend/footer', $view);
    }

    public function manage_service($appointment_hash='')
    {
        $this->session->set_userdata('dest_url', site_url('backend/services' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));

        if ( ! $this->has_privileges(PRIV_SERVICES))
        {
            return;
        }

        $calendar_view_query_param = $this->input->get('view');
        $user_id = $this->session->userdata('user_id');
        $user = $this->user_model->get_user($user_id);
        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('services');
        $view['user_display_name'] =
         $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_SERVICES;
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $view['available_services'] = $this->services_model->get_available_services();
        $view['customers'] = $this->customers_model->get_batch();
        $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        $view['user_details']=$user;
        $view['color_code'] = $this->settings_model->get_color();
        
        $order="id DESC";
        $view['services'] = $this->services_model->get_batch(null,null,null,$order,1);        
        $view['categories'] = $this->services_model->get_all_categories();
        $view['timezones'] = $this->timezones->to_array();         
        $this->set_user_data($view);

    if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
    {
        $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
        $view['secretary_providers'] = $secretary['providers'];
    }
    else
    {
        $view['secretary_providers'] = [];
    }

    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }

        $this->load->view('template/header', $view);
        $this->load->view('template/manage_service', $view);
        $this->load->view('template/footer', $view);
    }

    


    public function general_settings($appointment_hash=''){
       
        if ( ! $this->has_privileges(PRIV_SYSTEM_SETTINGS, FALSE)
            && ! $this->has_privileges(PRIV_USER_SETTINGS))
        {
            return;
        }
        $user_id = $this->session->userdata('user_id');

        $user = $this->user_model->get_user($user_id);

        $calendar_view_query_param = $this->input->get('view');
        $this->session->set_userdata('dest_url', site_url('template/settings' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));
    
        $user_id = $this->session->userdata('user_id');
        $view['user_details']=$user;
        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('settings');
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $view['customers'] = $this->customers_model->get_batch();
        $view['available_services'] = $this->services_model->get_available_services();
        $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
        $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['role_slug'] = $this->session->userdata('role_slug');
        $view['system_settings'] = $this->settings_model->get_settings();
        $view['user_settings'] = $this->user_model->get_user($user_id);
        $view['timezones'] = $this->timezones->to_array();
        $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
        $view['providers'] = $this->providers_model->get_batch();
        $view['secretaries'] = $this->secretaries_model->get_batch();
        $view['services'] = $this->services_model->get_batch();
        $view['color_code'] = $this->settings_model->get_color();
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
        
        // book_advance_timeout preview
        $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
        $hours = floor($book_advance_timeout / 60);
        $minutes = $book_advance_timeout % 60;
        $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
        $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
        $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));
    
        $this->set_user_data($view);

        $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
        if ($appointment_hash !== '' && count($results) > 0)
        {
          
            $appointment = $results[0];
            $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
            $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
       
        }
        else
        {
            $view['edit_appointment'] = NULL;
        }
       
       
        $this->load->view('template/header', $view);
        $this->load->view('template/general_settings', $view);
        $this->load->view('template/footer', $view);

    }


    public function get_provider_data(){
        $id=$this->input->post('id');
        $data=$this->providers_model->get_batch('id = ' . $id);
        echo json_encode($data);
    }

    public function get_admin_data(){
        $id=$this->input->post('id');
        $data=$this->admins_model->get_batch('id = ' . $id);
        echo json_encode($data);
    }

    public function get_secretary_data(){
        $id=$this->input->post('id');
        $data=$this->secretaries_model->get_batch('id = ' . $id);
        echo json_encode($data);
    }

    public function get_customer_data(){
        $id=$this->input->post('id');
        $data=$this->customers_model->get_batch('id = ' . $id);
        echo json_encode($data);
    }

    /**
     * Display the backend users page.
     *
     * In this page the admin user will be able to manage the system users. By this, we mean the provider, secretary and
     * admin users. This is also the page where the admin defines which service can each provider provide.
     */
    public function users()
    {
        $this->session->set_userdata('dest_url', site_url('backend/users'));

        if ( ! $this->has_privileges(PRIV_USERS))
        {
            return;
        }
          $user_id = $this->session->userdata('user_id');
        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('users');
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_USERS;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['admins'] = $this->admins_model->get_batch();
        $view['providers'] = $this->providers_model->get_batch();
        $view['secretaries'] = $this->secretaries_model->get_batch();
        $view['services'] = $this->services_model->get_batch();
        $view['working_plan'] = $this->settings_model->get_setting('company_working_plan');
        $view['timezones'] = $this->timezones->to_array();
        $view['working_plan_exceptions'] = '{}';
      $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
      $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
        $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/users', $view);
        $this->load->view('backend/footer', $view);
    }

    public function provider($appointment_hash=''){
        $this->session->set_userdata('dest_url', site_url('backend/users'));
    
        if ( ! $this->has_privileges(PRIV_USERS))
        {
            return;
        }
    
        $calendar_view_query_param = $this->input->get('view');
        $user_id = $this->session->userdata('user_id');
        $user = $this->user_model->get_user($user_id);
         
          $view['base_url'] = config('base_url');
          $view['page_title'] = lang('settings');
          $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
          $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
          $view['date_format'] = $this->settings_model->get_setting('date_format');
          $view['time_format'] = $this->settings_model->get_setting('time_format');
          $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
          $view['company_name'] = $this->settings_model->get_setting('company_name');
          $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
          $view['available_providers'] = $this->providers_model->get_available_providers();
          $view['available_services'] = $this->services_model->get_available_services();
          $view['customers'] = $this->customers_model->get_batch();
          $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
          $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
          $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
          $view['timezones'] = $this->timezones->to_array();
          $view['user_details']=$user;
          $view['role_slug'] = $this->session->userdata('role_slug');
          $view['system_settings'] = $this->settings_model->get_settings();
          $view['user_settings'] = $this->user_model->get_user($user_id);      
          $view['providers'] = $this->providers_model->get_available_providers();
         // $view['providers'] = $this->providers_model->get_batch();
          $view['secretaries'] = $this->secretaries_model->get_batch();
          $view['services'] = $this->services_model->get_batch();
          $view['color_code'] = $this->settings_model->get_color();
             
          
          // book_advance_timeout preview
          $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
          $hours = floor($book_advance_timeout / 60);
          $minutes = $book_advance_timeout % 60;
          $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
          $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
          $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));
      
          $this->set_user_data($view);
    
          if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
        {
            $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
            $view['secretary_providers'] = $secretary['providers'];
        }
        else
        {
            $view['secretary_providers'] = [];
        }
        if ($appointment_hash !== '' && count($results) > 0)
        {
          
            $appointment = $results[0];
            $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
            $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
       
        }
        else
        {
            $view['edit_appointment'] = NULL;
        }
         
    
        $this->load->view('template/header', $view);
        $this->load->view('template/provider', $view);
        $this->load->view('template/footer', $view);
     }


 public function manage_provider($appointment_hash=''){
    $this->session->set_userdata('dest_url', site_url('backend/users'));

    if ( ! $this->has_privileges(PRIV_USERS))
    {
        return;
    }
      $calendar_view_query_param = $this->input->get('view');
      $user_id = $this->session->userdata('user_id');
      $user = $this->user_model->get_user($user_id);
      $view['base_url'] = config('base_url');
      $view['page_title'] = lang('settings');
      $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
      $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
      $view['company_name'] = $this->settings_model->get_setting('company_name');
      $view['date_format'] = $this->settings_model->get_setting('date_format');
      $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
      $view['time_format'] = $this->settings_model->get_setting('time_format');
      $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
      $view['available_providers'] = $this->providers_model->get_available_providers();
      $view['available_services'] = $this->services_model->get_available_services();
      $view['customers'] = $this->customers_model->get_batch();
      $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
      $view['user_details']=$user;
      $view['role_slug'] = $this->session->userdata('role_slug');
      $view['system_settings'] = $this->settings_model->get_settings();
      $view['user_settings'] = $this->user_model->get_user($user_id);
      $view['timezones'] = $this->timezones->to_array();
      $view['providers'] = $this->providers_model->get_batch();
      $view['secretaries'] = $this->secretaries_model->get_batch();
      $view['services'] = $this->services_model->get_batch();
      $view['color_code'] = $this->settings_model->get_color();
      $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
      $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
      
      // book_advance_timeout preview
      $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
      $hours = floor($book_advance_timeout / 60);
      $minutes = $book_advance_timeout % 60;
      $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
      $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
      $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));
      $view['timezones'] = $this->timezones->to_array();
      $this->set_user_data($view);

      if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
    {
        $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
        $view['secretary_providers'] = $secretary['providers'];
    }
    else
    {
        $view['secretary_providers'] = [];
    }

    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
     

    $this->load->view('template/header', $view);
    $this->load->view('template/manage_providers', $view);
    $this->load->view('template/footer', $view);
 }

 public function admin_add($appointment_hash=''){
    $this->session->set_userdata('dest_url', site_url('backend/users'));

    if ( ! $this->has_privileges(PRIV_USERS))
    {
        return;
    }
    $user_id = $this->session->userdata('user_id');
    $user = $this->user_model->get_user($user_id);
    $view['user_details']=$user;
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $calendar_view_query_param = $this->input->get('view');
    $view['available_services'] = $this->services_model->get_available_services();
    $view['customers'] = $this->customers_model->get_batch();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
      $view['base_url'] = config('base_url');
      $view['page_title'] = lang('settings');
      $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
      $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
      $view['company_name'] = $this->settings_model->get_setting('company_name');
      $view['date_format'] = $this->settings_model->get_setting('date_format');
      $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
      $view['time_format'] = $this->settings_model->get_setting('time_format');
      $view['role_slug'] = $this->session->userdata('role_slug');
      $view['system_settings'] = $this->settings_model->get_settings();
      $view['user_settings'] = $this->user_model->get_user($user_id);
      $view['timezones'] = $this->timezones->to_array();
      $view['admins'] = $this->admins_model->get_batch();
      
      $view['providers'] = $this->providers_model->get_batch();
      $view['secretaries'] = $this->secretaries_model->get_batch();
      $view['services'] = $this->services_model->get_batch();
      $view['color_code'] = $this->settings_model->get_color();
      $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
      $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
      
      // book_advance_timeout preview
      $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
      $hours = floor($book_advance_timeout / 60);
      $minutes = $book_advance_timeout % 60;
      $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
      $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
      $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));
  
      $this->set_user_data($view);
      $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
      if ($appointment_hash !== '' && count($results) > 0)
      {
        
          $appointment = $results[0];
          $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
          $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
     
      }
      else
      {
          $view['edit_appointment'] = NULL;
      }
    $this->load->view('template/header', $view);
    $this->load->view('template/admin', $view);
    $this->load->view('template/footer', $view);
 }


 public function secretary_add($appointment_hash=''){
    $this->session->set_userdata('dest_url', site_url('backend/users'));

    if ( ! $this->has_privileges(PRIV_USERS))
    {
        return;
    }

    $calendar_view_query_param = $this->input->get('view');
    $user_id = $this->session->userdata('user_id');
    $user = $this->user_model->get_user($user_id);
    $view['base_url'] = config('base_url');
    $view['page_title'] = lang('settings');
    $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
    $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['company_name'] = $this->settings_model->get_setting('company_name');
    $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $view['available_services'] = $this->services_model->get_available_services();
    $view['customers'] = $this->customers_model->get_batch();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $view['timezones'] = $this->timezones->to_array(); 
    $view['user_details']=$user;    
          
           
      $view['role_slug'] = $this->session->userdata('role_slug');
      $view['system_settings'] = $this->settings_model->get_settings();
      $view['user_settings'] = $this->user_model->get_user($user_id);     
      $view['admins'] = $this->admins_model->get_batch();
      $view['providers'] = $this->providers_model->get_batch();
      $order="id desc";     
      $view['secretaries'] = $this->secretaries_model->get_batch( null,null,null,$order,1);
      $view['services'] = $this->services_model->get_batch();
      $view['color_code'] = $this->settings_model->get_color();
      $this->set_user_data($view);
          
      
      // book_advance_timeout preview
      $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
      $hours = floor($book_advance_timeout / 60);
      $minutes = $book_advance_timeout % 60;
      $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
      $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
      $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));


    if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
    {
        $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
        $view['secretary_providers'] = $secretary['providers'];
    }
    else
    {
        $view['secretary_providers'] = [];
    }

    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
  
      
    $this->load->view('template/header', $view);
    $this->load->view('template/secretary', $view);
    $this->load->view('template/footer', $view);  
 }

 


 public function orginfo($appointment_hash=''){
    $user_id = $this->session->userdata('user_id');
    $user = $this->user_model->get_user($user_id);
    $view['user_details']=$user;
    $view['base_url'] = config('base_url');
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $calendar_view_query_param = $this->input->get('view');
    $view['available_services'] = $this->services_model->get_available_services();
    $view['customers'] = $this->customers_model->get_batch();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $view['color_code'] = $this->settings_model->get_color();
    $this->set_user_data($view);
    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
    $this->load->view('template/header', $view);
    $this->load->view('template/org_info', $view);
    $this->load->view('template/footer', $view);
 }

 public function calendar_admin($appointment_hash=''){
    $this->session->set_userdata('dest_url', site_url('backend/calendar_admin' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));

    if ( ! $this->has_privileges(PRIV_APPOINTMENTS))
    {
        return;
    }

    $calendar_view_query_param = $this->input->get('view');

    $user_id = $this->session->userdata('user_id');

    $user = $this->user_model->get_user($user_id);

    $view['base_url'] = config('base_url');
    $view['page_title'] = lang('calendar');
    $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
    $view['active_menu'] = PRIV_APPOINTMENTS;
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['company_name'] = $this->settings_model->get_setting('company_name');
    $view['require_phone_number'] = $this->settings_model->get_setting('require_phone_number');
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $view['available_services'] = $this->services_model->get_available_services();
    $view['customers'] = $this->customers_model->get_batch();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['user_details']=$user;
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $view['color_code'] = $this->settings_model->get_color();
    $view['timezones'] = $this->timezones->to_array();
    $this->set_user_data($view);

    if ($this->session->userdata('role_slug') === DB_SLUG_SECRETARY)
    {
        $secretary = $this->secretaries_model->get_row($this->session->userdata('user_id'));
        $view['secretary_providers'] = $secretary['providers'];
    }
    else
    {
        $view['secretary_providers'] = [];
    }

    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
    $this->load->view('template/header', $view);
    $this->load->view('template/calendar', $view);
    $this->load->view('template/footer', $view);
 }

public function appointment_report($appointment_hash=''){
   
    
    $calendar_view_query_param = $this->input->get('view');
    $this->session->set_userdata('dest_url', site_url('backend/dashboard_admin' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));
    $user_id = $this->session->userdata('user_id');
    $user = $this->user_model->get_user($user_id);
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $view['reports'] = $this->customers_model->report($this->session->userdata('Organization'));
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $view['customers'] = $this->customers_model->get_batch();
    $view['available_services'] = $this->services_model->get_available_services();
    $view['user_cnt']=$this->admins_model->get_user_count();
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['timezones'] = $this->timezones->to_array();
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['appointment_cnt']=$this->admins_model->get_appointment_count();
    $view['service_cnt']=$this->admins_model->get_service_count();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['base_url'] = config('base_url');
    $view['chart_cnt']=$this->admins_model->get_chart_count();
    $view['cancel_count']=$this->admins_model->get_cancel_count();
    $view['daily_count']=$this->admins_model->get_daily_count();
    $view['user_details']=$user;
    $view['color_code'] = $this->settings_model->get_color();
    $this->set_user_data($view);
    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }

    
    
    $this->load->view('template/header', $view);
    $this->load->view('template/appointment_report', $view);
    $this->load->view('template/footer', $view);
}

public function dashboard_admin($appointment_hash=''){
    $calendar_view_query_param = $this->input->get('view');
    $this->session->set_userdata('dest_url', site_url('dashboard_admin' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));
    $user_id = $this->session->userdata('user_id');
    $user = $this->user_model->get_user($user_id);
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));
    $view['reports'] = $this->customers_model->report($this->session->userdata('Organization'));
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $view['customers'] = $this->customers_model->get_batch();
    $view['available_services'] = $this->services_model->get_available_services();
    $view['user_cnt']=$this->admins_model->get_user_count();
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['timezones'] = $this->timezones->to_array();
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['appointment_cnt']=$this->admins_model->get_appointment_count();
    $view['service_cnt']=$this->admins_model->get_service_count();
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['base_url'] = config('base_url');
    $view['chart_cnt']=$this->admins_model->get_chart_count();
    $view['cancel_count']=$this->admins_model->get_cancel_count();
    $view['daily_count']=$this->admins_model->get_daily_count();
    $view['user_details']=$user;
    $view['color_code'] = $this->settings_model->get_color();
    $date=date('Y-m-d');
    $where='(start_datetime LIKE "%' . $date . '%")';
    $whre="Status IN(1,2)";
    $order="start_datetime desc";
    $view['today_app']=$this->appointments_model->get_batch($where,null,null,$order,1);
    $view['cancel_app']=$this->appointments_model->get_batch_app($whre,null,50,$order,1);
    $this->set_user_data($view);
    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
    $this->load->view('template/header', $view);
    $this->load->view('template/dashboard', $view);
    $this->load->view('template/footer', $view);
}

public function dashboard_settings(){
    $this->session->set_userdata('dest_url', site_url('template/settings'));
    if ( ! $this->has_privileges(PRIV_SYSTEM_SETTINGS, FALSE)
        && ! $this->has_privileges(PRIV_USER_SETTINGS))
    {
        return;
    }

    $user_id = $this->session->userdata('user_id');

    $view['base_url'] = config('base_url');
    $view['page_title'] = lang('settings');
    $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
    $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
    $view['company_name'] = $this->settings_model->get_setting('company_name');
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['role_slug'] = $this->session->userdata('role_slug');
    $view['system_settings'] = $this->settings_model->get_settings();
    $view['user_settings'] = $this->user_model->get_user($user_id);
    $view['timezones'] = $this->timezones->to_array();
    $view['providers'] = $this->providers_model->get_batch();
    $view['secretaries'] = $this->secretaries_model->get_batch();
    $view['services'] = $this->services_model->get_batch();
    $view['color_code'] = $this->settings_model->get_color();
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
    
    // book_advance_timeout preview
    $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
    $hours = floor($book_advance_timeout / 60);
    $minutes = $book_advance_timeout % 60;
    $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
    $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
    $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));

    $this->set_user_data($view);
   
   
    $this->load->view('template/header', $view);
    $this->load->view('template/settings', $view);
    $this->load->view('template/footer', $view);
}



public function customer_add($appointment_hash=''){

  

    $calendar_view_query_param = $this->input->get('view');
    $this->session->set_userdata('dest_url', site_url('template/customer' . (! empty($appointment_hash) ? '' . $appointment_hash : '')));
    
   

    $user_id = $this->session->userdata('user_id');

    $user = $this->user_model->get_user($user_id);

    $view['base_url'] = config('base_url');
    $view['page_title'] = lang('settings');
    $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
   // $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
    $view['company_name'] = $this->settings_model->get_setting('company_name');
    $view['date_format'] = $this->settings_model->get_setting('date_format');
    $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
    $view['time_format'] = $this->settings_model->get_setting('time_format');
    $view['role_slug'] = $this->session->userdata('role_slug');
    $view['system_settings'] = $this->settings_model->get_settings();
    $view['user_settings'] = $this->user_model->get_user($user_id);
    $view['timezones'] = $this->timezones->to_array();
    $view['available_providers'] = $this->providers_model->get_available_providers();
    $order="id desc";
   
    $view['customers'] = $this->customers_model->get_batch(null,null,null,$order,1);
    $view['calendar_view'] = ! empty($calendar_view_query_param) ? $calendar_view_query_param : $user['settings']['calendar_view'];
    $view['available_services'] = $this->services_model->get_available_services();
    $view['user_details']=$user;
    $view['color_code'] = $this->settings_model->get_color();
    $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
    $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
    
    // book_advance_timeout preview
    // $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
    // $hours = floor($book_advance_timeout / 60);
    // $minutes = $book_advance_timeout % 60;
    // $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
    // $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
    // $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));

    $this->set_user_data($view);
    $results = $this->appointments_model->get_batch(['hash' => $appointment_hash]);
    
    if ($appointment_hash !== '' && count($results) > 0)
    {
      
        $appointment = $results[0];
        $appointment['customer'] = $this->customers_model->get_row($appointment['id_users_customer']);
        $view['edit_appointment'] = $appointment; // This will display the appointment edit dialog on page load.
   
    }
    else
    {
        $view['edit_appointment'] = NULL;
    }
   
   
    $this->load->view('template/header', $view);
    $this->load->view('template/customer', $view);
    $this->load->view('template/footer', $view);
}

    /**
     * Display the user/system settings.
     *
     * This page will display the user settings (name, password etc). If current user is an administrator, then he will
     * be able to make change to the current Easy!Appointment installation (core settings like company name, book
     * timeout etc).
     */
     
    public function settings1()
    {
       $this->session->set_userdata('dest_url', site_url('backend/settings1'));
        if ( ! $this->has_privileges(PRIV_SYSTEM_SETTINGS, FALSE)
            && ! $this->has_privileges(PRIV_USER_SETTINGS))
        {
            return;
        }

        $user_id = $this->session->userdata('user_id');

        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('settings');
        $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
        $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['role_slug'] = $this->session->userdata('role_slug');
        
        $view['system_settings'] = $this->settings_model->get_settings();
        $view['color_code'] = $this->settings_model->get_color();

        $view['user_settings'] = $this->user_model->get_user($user_id);
        $view['timezones'] = $this->timezones->to_array();

        // book_advance_timeout preview
        $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
        $hours = floor($book_advance_timeout / 60);
        $minutes = $book_advance_timeout % 60;
        $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);

        $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/settings1', $view);
        $this->load->view('backend/footer', $view);
    } 
    public function add_color(){
        $color=$this->input->post('color');
        $data=$this->settings_model->set_color($color);
        echo $data;
    }
    public function get_color(){
        
        $view['color_code'] = $this->settings_model->get_color();
        echo json_encode($view);
    }
    public function settings()
    {
        $this->session->set_userdata('dest_url', site_url('backend/settings'));
        if ( ! $this->has_privileges(PRIV_SYSTEM_SETTINGS, FALSE)
            && ! $this->has_privileges(PRIV_USER_SETTINGS))
        {
            return;
        }

        $user_id = $this->session->userdata('user_id');

        $view['base_url'] = config('base_url');
        $view['page_title'] = lang('settings');
        $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
        $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['first_weekday'] = $this->settings_model->get_setting('first_weekday');
        $view['time_format'] = $this->settings_model->get_setting('time_format');
        $view['role_slug'] = $this->session->userdata('role_slug');
        $view['system_settings'] = $this->settings_model->get_settings();
        $view['user_settings'] = $this->user_model->get_user($user_id);
        $view['timezones'] = $this->timezones->to_array();
        $view['color_code'] = $this->settings_model->get_color();
        $view['image'] = $this->settings_model->get_image($this->session->userdata('Organization'));
        $view['org_name'] = $this->settings_model->get_orgname($this->session->userdata('Organization'));    
        
        // book_advance_timeout preview
        $book_advance_timeout = $this->settings_model->get_setting('book_advance_timeout');
        $hours = floor($book_advance_timeout / 60);
        $minutes = $book_advance_timeout % 60;
        $view['book_advance_timeout_preview'] = sprintf('%02d:%02d', $hours, $minutes);
        $view['get_days'] = $this->settings_model->get_days($this->session->userdata('Organization'));
        $view['get_count'] = $this->settings_model->get_count($this->session->userdata('Organization'));

        $this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('backend/settings', $view);
        $this->load->view('backend/footer', $view);
    }

    public function insert_organization(){
        
         try
        {
        $organ=$this->input->post('organ');
        $status=$this->input->post('Status');
        $country=$this->input->post('Country');
        $code=$this->input->post('Code');
        $this->customermodel->add_organization($organ,$status,$country,$code);        
        
        $query=$this->db->query("select * from ea_settings where Organization='1'")->result_array();
       $qry=$this->db->query("select * from ea_orgnization order by organization_id desc limit 0,1 ")->result_array();
       
        $lastid=$qry[0]['organization_id'];
        $orgname=$qry[0]['organization_name'];
        $cnt=count($query);
        for($i=0;$i<$cnt;$i++){
            $name=$query[$i]['name'];
            $value=$query[$i]['value'];
            $timestamp=date('Y-md-d h:i:s');
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
        $response = AJAX_SUCCESS;
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


  


   

    
    public function provider_checkmno(){
        $mno=$this->input->post('Mobile');
        $id=$this->input->post('id');
        $oid=$this->session->userdata('Organization');
        
       $mob=$this->providers_model->checkmno($mno,$id,$oid);
         echo $mob;    
    }
    
    public function admin_checkmno(){
        $mno=$this->input->post('Mobile');
        $id=$this->input->post('id');
        $oid=$this->session->userdata('Organization');
        
       $mob=$this->admins_model->checkmno($mno,$id,$oid);
    echo $mob;    
    }
    public function secretary_checkmno(){
        $mno=$this->input->post('Mobile');
        $id=$this->input->post('id');
        $oid=$this->session->userdata('Organization');
        
       $mob=$this->secretaries_model->checkmno($mno,$id,$oid);
    echo $mob;    
    }

  
    public function  upload_image(){
                  $data=$this->session->userdata('data');
                  $uid=$this->session->userdata('user_id');
                  $role=$this->session->userdata('role_slug');
                  $organ=$this->session->userdata('Organization');
                  $cnt=$this->customermodel->check_user($uid);
                   $name = $_FILES['files']['name'];
                $config['encrypt_name'] = TRUE;
      	        $config['upload_path'] = 'assets/img/upload_img/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                   if($cnt=="1"){
                       //update images
                         if ($this->upload->do_upload('files')) {
                        $filedata=$this->upload->data();
                        $filename = $filedata['file_name']; 
                    $this->customermodel->update_img($uid,$filename);
                    echo "Image Updated successfully";
                     }else{
                           echo $this->upload->display_errors(); die();
                          
                     }
                   }else{
                       //insert image
                       
                         if ($this->upload->do_upload('files')) {
                    $filedata=$this->upload->data();
                     $filename = $filedata['file_name']; 
                    echo "Image Uploaded successfully";
                       $this->customermodel->upload_img($uid,$role,$organ,$filename);
                     }else{
                           echo $this->upload->display_errors(); die();
                          
                     }
                   }
                 
			
    }
    
  
   public function getorgan(){
        $sql="SELECT * FROM `ea_orgnization` where Status='1' and Delete_flag='0'";
        $query=$this->db->query($sql)->result_array();
        echo json_encode($query);
   }
     public function get_date(){
        $view['date'] = $this->appointments_model->get_date();
        echo json_encode($view);
    }
    
   public function del_organ(){
       $id=$this->input->post('Id');
       $this->db->query("update `ea_orgnization` set Delete_flag='1' where  organization_id='$id'");
   }
   
   public function update_organ(){
       $id=$this->input->post('Id');
        $st=$this->input->post('status');
        $status=($st==1) ? 0 : 1 ;
       $this->db->query("update `ea_orgnization` set Status='$status' where  organization_id='$id'");
       
   
   }
   
   public function register_customer(){
        if($this->input->post('submit')){
            //$this->notifications->send_register($email);
          $this->customermodel->Registerdata($this->input->post());
          redirect('backend/services');
        }
   }

    /**
     * This method will update the installation to the latest available version in the server.
     *
     * IMPORTANT: The code files must exist in the server, this method will not fetch any new files but will update
     * the database schema.
     *
     * This method can be used either by loading the page in the browser or by an ajax request. But it will answer with
     * JSON encoded data.
     */
    public function update()
    {
        try
        {
            if ( ! $this->has_privileges(PRIV_SYSTEM_SETTINGS, TRUE))
            {
                throw new Exception('You do not have the required privileges for this task!');
            }

            if ( ! $this->migration->current())
            {
                throw new Exception($this->migration->error_string());
            }

            $view = ['success' => TRUE];
        }
        catch (Exception $exception)
        {
            $view = ['success' => FALSE, 'exception' => $exception->getMessage()];
        }

        $this->load->view('general/update', $view);
    }

    public function send_email_customer(){
        ini_set('max_execution_time', '300');
       $subject=$this->input->post('Subject');
       $oid=$this->session->userdata('Organization');
       $sql="select DISTINCT(email) as Email from ea_users where Email NOT IN('') and Organization='$oid' LIMIT 1,10";
       $result=$this->db->query($sql)->result_array();
       $cnt=count($result);
       for($i=0;$i<$cnt;$i++){
          // echo $result[$i]['Email']."\n";
           $to = $result[$i]['Email'];

$subject = 'Skedisa Message';

$headers = "From: Skedisa\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = $subject;


mail($to, $subject, $message, $headers);
       }
// $email=array();
//        foreach($result as $row){
// array_push($email,$row['Email']);
   
//        }
     
//     $bulkemail=implode(',',$email);

     
       // $this->notifications->send_customers($result,'Mackenzie',$oid,$subject);
    }

}
