<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title><?= isset($page_title) ? $page_title : lang('backend_section') ?> | Gravitykey</title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/trumbowyg/ui/trumbowyg.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/select2/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/notiflix-2.7.0.min.css') ?>">
     <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/backend.css') ?>">


    <script>
        // Global JavaScript Variables - Used in all backend pages.
        var availableLanguages = <?= json_encode(config('available_languages')) ?>;
        var EALang = <?= json_encode($this->lang->language) ?>;
            var GlobalVariables = {  
        
        image: <?= json_encode($image) ?>,
        Org: <?= json_encode($org_name) ?>,
   
        
    };
    var img=GlobalVariables['image'][0]['image_name'];
    var organ=GlobalVariables['Org'][0]['organization_name'];
  
    </script>

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/popper/popper.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/tippy/tippy-bundle.umd.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/moment/moment.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/moment/moment-timezone-with-data.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/trumbowyg/trumbowyg.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/select2/select2.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/notiflix-2.7.0.min.js') ?>"></script>
    

  
    
</head>

<body>
<nav id="header" class="navbar navbar-expand-md navbar-dark">
    <div id="header-logo" class="navbar-brand">
        <img style="border-radius: 20px;" id="im" src="<?= asset_url('assets/img/user.jpg') ?>">
        <h6 id='cname'><?php echo $company_name; ?></h6>
        <small>Appointment Booking</small>
    </div>

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#header-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="header-menu" class="collapse navbar-collapse flex-row-reverse">
        <ul class="navbar-nav">
       
        <?php $hidden = ($privileges[PRIV_USERS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($this->uri->segment(2)=='dashboard') ? 'active' : '' ?>
             <li style="display:none;"  class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/dashboard') ?>"  class="nav-link"
                   data-tippy-content="<?php echo 'Dashboard'; ?>">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
            </li>

            <?php $hidden = ($privileges[PRIV_APPOINTMENTS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($active_menu == PRIV_APPOINTMENTS) ? 'active' : '' ?>
            <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend') ?>" class="nav-link"
                   data-tippy-content="<?= lang('manage_appointment_record_hint') ?>">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <?= lang('calendar') ?>
                </a>
            </li>
           
            
            <?php   if($this->session->userdata('role_slug')=="provider"){  ?>
              <li class="nav-item">
                <a target="_blank" href=" <?php echo site_url('Appointments'); ?>" class="nav-link"
                   data-tippy-content="<?php echo 'Book Appointment'; ?>">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Book Appointment 
                </a>
            </li>
            <?php } ?>

            <?php $hidden = ($privileges[PRIV_CUSTOMERS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($active_menu == PRIV_CUSTOMERS) ? 'active' : '' ?>
            <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/customers') ?>" class="nav-link"
                   data-tippy-content="<?= lang('manage_customers_hint') ?>">
                    <i class="fas fa-user-friends mr-2"></i>
                    <?php echo "Patients"; ?>
                </a>
            </li>

            <?php $hidden = ($privileges[PRIV_SERVICES]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($active_menu == PRIV_SERVICES) ? 'active' : '' ?>
            <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/services') ?>" class="nav-link"
                   data-tippy-content="<?= lang('manage_services_hint') ?>">
                    <i class="fas fa-business-time mr-2"></i>
                    <?= lang('services') ?>
                </a>
            </li>

            <?php $hidden = ($privileges[PRIV_USERS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($active_menu == PRIV_USERS) ? 'active' : '' ?>
            <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/users') ?>" class="nav-link"
                   data-tippy-content="<?= lang('manage_users_hint') ?>">
                    <i class="fas fa-users-cog mr-2"></i>
                    <?= lang('users') ?>
                </a>
            </li>

            <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE
                || $privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($active_menu == PRIV_SYSTEM_SETTINGS) ? 'active' : '' ?>
            <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/settings') ?>" class="nav-link"
                   data-tippy-content="<?= lang('settings_hint') ?>">
                    <i class="fas fa-cogs mr-2"></i>
                    <?= lang('settings') ?>
                </a>
            </li>
            
            <?php 
            if($this->session->userdata('role_slug')=="admin" && $this->session->userdata('Organization')=='1' || $this->session->userdata('Organization')=='8'){
              // print_r($this->session->userdata('user_id')); 
            ?>
            <?php $hidden = ($privileges[PRIV_USERS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($this->uri->segment(2)=='organization') ? 'active' : '' ?>
             <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/organization') ?>"  class="nav-link"
                   data-tippy-content="<?php echo 'Organizations'; ?>">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Organizations
                </a>
            </li>
          <?php  } ?>    
          
           
              <?php 
            if(($this->session->userdata('role_slug')=="admin") && ($this->session->userdata('Organization') =='1')){
              // print_r($this->session->userdata('user_id')); 
            ?>
            <?php $hidden = ($privileges[PRIV_USERS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($this->uri->segment(2)=='billing') ? 'active' : '' ?>
             <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/billing') ?>"  class="nav-link"
                   data-tippy-content="<?php echo 'Billing'; ?>">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Billing
                </a>
            </li> <?php } ?>
            
             
              <?php 
            if(($this->session->userdata('role_slug')=="admin")){
              // print_r($this->session->userdata('user_id')); 
            ?>
            <?php $hidden = ($privileges[PRIV_USERS]['view'] == TRUE) ? '' : 'd-none' ?>
            <?php $active = ($this->uri->segment(2)=='reports') ? 'active' : '' ?>
             <li class="nav-item <?= $active . $hidden ?>">
                <a href="<?= site_url('backend/reports') ?>"  class="nav-link"
                   data-tippy-content="<?php echo 'Reports'; ?>">
                    <i class="fas fa-file mr-2"></i>
                    Reports
                </a>
            </li> <?php } ?>
        
            <li class="nav-item">
                <a href="<?= site_url('user/logout') ?>" class="nav-link"
                   data-tippy-content="<?= lang('log_out_hint') ?>">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <?= lang('log_out') ?>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div id="notification" style="display: none;"></div>

<div id="loading" style="display: none;">
    <div class="any-element animation is-loading">
        &nbsp;
    </div>
</div>






<script>
 var img=GlobalVariables['image'][0]['image_name'];
    var organ=GlobalVariables['Org'][0]['organization_name'];
   if(GlobalVariables['image']=="user.jpg"){
       document.getElementById('im').src="<?php echo base_url('assets/img/upload_img/') ?>"+ GlobalVariables['image'];
   }else{
         document.getElementById('im').src="<?php echo base_url('assets/img/upload_img/') ?>"+img;
   }
  
//  document.getElementById('im').src="<?php echo base_url('assets/img/upload_img/') ?>"+img;
 document.getElementById('cname').innerHTML=organ;          
   
       
</script>




