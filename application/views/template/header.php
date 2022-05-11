<?php //error_reporting(0); ?>
<!doctype html>
<html lang="en">
<?php  
error_reporting(0);
$color=$color_code[0]['color_code']; ?>
<style>
   ::-webkit-scrollbar {
    width: 0px;
    background: transparent; /* make scrollbar transparent */
}

@font-face {
  font-family: 'cfont';
  src: url('<?php echo asset_url('assets/fonts/HelveticaNeue.ttf'); ?>') format('ttf');
} 
body .ui-datepicker th {
    background:<?= $color ?>
}
body .ui-datepicker .ui-widget-header{
    background:<?= $color ?>
}
body .ui-datepicker .ui-slider-handle{
    border-color:<?= $color ?>;
    background-color: <?= $color ?>;
}
html body .ui-datepicker td a.ui-state-active {
    background:<?= $color ?> !important;    
}
body .ui-widget.ui-widget-content{
    border:1px solid <?= $color ?>;
}
body .ui-datepicker .ui-datepicker-prev-hover {   
    background: <?= $color ?>;
    border-color:<?= $color ?>;   
}
body .ui-datepicker .ui-datepicker-next-hover {   
    background: <?= $color ?>;
    border-color: <?= $color ?>;   
}
body .ui-draggable .ui-dialog-titlebar{
    background: <?= $color ?>;
}

</style>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/css/intlTelInput.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/ext/trumbowyg/ui/trumbowyg.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/ext/select2/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/css/backend.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <!-- DataTables -->
    <link href="<?php echo asset_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo asset_url('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css'); ?>"
        rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo asset_url('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>"
        rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <!-- Bootstrap Css -->
    <link href="<?php echo asset_url('assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo asset_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php //echo asset_url('assets/css/icons.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo asset_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/notiflix-2.7.0.min.css') ?>">
    <script src="<?php echo asset_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<script>
        // Global JavaScript Variables - Used in all backend pages.
        var availableLanguages = <?= json_encode(config('available_languages')) ?>;
        var EALang = <?= json_encode($this->lang->language) ?>;
            var GlobalVariables = {  
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        image: <?= json_encode($image) ?>,
        Org: <?= json_encode($org_name) ?>,
   
        
    };
    var img=GlobalVariables['image'][0]['image_name'];
    var organ=GlobalVariables['Org'][0]['organization_name'];
  
    </script>
     <script src="<?php echo asset_url('assets/ext/popper/popper.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/tippy/tippy-bundle.umd.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/moment/moment.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/moment/moment-timezone-with-data.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/trumbowyg/trumbowyg.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/select2/select2.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
    <script src="<?php echo asset_url('assets/js/notiflix-2.7.0.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/color.js') ?>"></script>
    <?php  $uid=$this->session->userdata('user_id');
    $classname=$this->db->query("select Classname,status,Images from ea_users where id='$uid'")->result_array()[0];
    $st=$classname['status'];
    ?>
<body data-sidebar="dark" class="<?php echo ($st==0) ? $classname['Classname']:''; ?>">
<?php  $path=site_url("assets/img/upload_img/"); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="ri-menu-line align-middle"></i>
                        <img class="rounded-circle header-profile-user"
                                src="<?php echo empty($image[0]['image_name']) ? $path.'user.jpg':$path.$image[0]['image_name']; ?>"
                                alt="Header Avatar">
                    </button>
                    <!-- LOGO -->
                    <div class="navbar-brand-box">

                        <a href="index-2.html" class="logo logo-light">
                            <span class="logo-lg">
                                <h4 style="color:white;margin-top:24px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 18px;">
                                    <?php  echo "Appon"; //$org_name[0]['organization_name']; ?></h4>
                            </span>
                            
                        </a>
                       
                    </div>
                   

                   

                </div>

                <div class="d-flex">
                <!-- data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" -->
                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" 
                            class="btn btn-primary waves-effect waves-light" 
                             id="insert-appointment">New Appointment <i
                                class="fas fa-plus-circle"></i></button>
                               
                               
                      
                       
                          
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ms-1"><?php  echo ($user_display_name); ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            <img class="rounded-circle header-profile-user"
                                src="<?php echo empty($classname['Images']) ? $path.'user.jpg':$path.$classname['Images']; ?>"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="<?= site_url('backend/profile') ?>"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"> </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?= site_url('user/logout') ?>"><i
                                    class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout (<?php echo $this->session->userdata('role_slug'); ?>)</a>
                        </div>
                    </div>



                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu" style="overflow-y:scroll">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">


                        <li >
                            <a href="<?php echo base_url('backend/dashboard_admin'); ?>" class="waves-effect">
                                <i class=" ri-home-fill" data-toggle="tooltip" title="Dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li style="display:none">
                            <a href="<?php echo base_url('backend/calendar_admin'); ?>" class=" waves-effect">
                                <i class=" ri-calendar-2-line" data-toggle="tooltip" title="Calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('backend/appointment_report'); ?>" class=" waves-effect">
                                <i class=" ri-time-line" data-toggle="tooltip" title="Appointments"></i>
                                <span>Appointments</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('backend/customer_add'); ?>" class=" waves-effect">
                                <i class="ri-user-line" data-toggle="tooltip" title="Customers"></i>
                                <span>Customers</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('backend/provider'); ?>" class=" waves-effect">
                                <i class="ri-user-settings-line" data-toggle="tooltip" title="Provider"></i>
                                <span>Provider</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('backend/secretary_add'); ?>" class=" waves-effect">
                                <i class="ri-user-settings-line" data-toggle="tooltip" title="Secretary"></i>
                                <span>Secretary</span>
                            </a>
                        </li>

                      

                       

                        <li>
                            <a href="<?php echo base_url('backend/index_admin'); ?>" class=" waves-effect">
                                <i class="ri-award-line" data-toggle="tooltip" title="Services"></i>
                                <span>Services</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" class=" waves-effect">
                                <i class="ri-file-list-line" data-toggle="tooltip" title="Reports"></i>
                                <span>Reports</span>
                            </a>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-settings-2-line" data-toggle="tooltip" title="Settings"></i>
                                <span>Settings</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="<?php echo base_url('backend/add_organization'); ?>">Organization</a></li>
                                <li><a href="<?php echo base_url('backend/orginfo'); ?>">Org Informartion</a></li>
                                <li><a href="<?php echo base_url('backend/general_settings'); ?>">general Settings</a></li>
                                <li><a href="<?php echo base_url('backend/manage_service'); ?>">Manage Services</a></li>
                                <li><a href="<?php echo base_url('backend/manage_provider'); ?>">Manage Providers</a></li>
                                <li><a href="javascript:void(0)">Schedule</a></li>
                                <li><a href="javascript:void(0)">user Management</a></li>
                                <li><a href="javascript:void(0)">Legal</a></li>
                                <li><a href="javascript:void(0)">Coupon</a></li>
                                <li><a href="javascript:void(0)">App Management</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo base_url('backend/admin_add'); ?>" class=" waves-effect">
                                <i class="ri-user-settings-line" data-toggle="tooltip" title="Admin"></i>
                                <span>Admin</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  


});
$("#vertical-menu-btn").click(function(){
  //url,data,
  var url = '<?php echo base_url("index.php/backend_api/apply_collpse") ?>';
  var tok = GlobalVariables['csrfToken'];
    $.post(url,{"csrfToken": tok},function(data){  
    });

    var a=$('.physicianList').children('ul').children('li').width();
    if(a==30){
        $('.physicianList').children('ul').children('li').css("width","38px")
    }else{
        $('.physicianList').children('ul').children('li').css("width","30px")
    }
});

</script>
        <!-- MANAGE APPOINTMENT MODAL -->

