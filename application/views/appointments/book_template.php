<!DOCTYPE html>
<?php $a=$this->session->userdata('role_slug'); 
if(empty($a)){
    redirect(site_url());
}else{
    

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="google-signin-client_id"
        content="936252272370-mrrp6icjbajlne88e6lqjhjm6ak1knti.apps.googleusercontent.com">
    <title><?= lang('page_title') . ' ' . $company_name ?></title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/notiflix-2.7.0.min.css') ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
    <style>
    .mv {
        margin-left: 600px;
    }

    #coupon-box {
        disply: none;
    }

    a#fbLink>i {
        margin-right: 11px;
    }

    a#fbLink:hover {
        color: white;
    }

    .fb {
        background-color: #3B5998;
        color: white;
    }

    .content {
        margin-top: 55px;
    }
    .inpt{
        border-radius:10px;
    }
    .appointment-details {
    background: #4E49D6;
    width: 100%;
    height: 100vh;
}
.details {
    background: #5a56d9;
    height: 20vh;
    position: relative;
    top: 40px;
    width: 90%;
    left: 17px;
    border-radius: 13px;
}
ul.appointment-list > li {
    color: white;
    font-size: 14px;
    line-height: 2;
    padding: 4px;
}
.fee {
    background: #5a56d9;
    color: white;
    height: 10vh;
    margin: 60px 20px 0px 20px;
    border-radius: 10px;
}
.fee > p {
    padding: 20px;
    margin-left: 19px;
    font-size: 14px;
}
.physicianList ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.physicianList ul li {
    display: inline-block;
    width: 58px;
    float: left;
    /* background: rgb(240, 240, 240);
    color: rgb(90, 81, 81); */
    text-align: center;   
    padding: 10px;
    border: 1px solid #999999;
    margin-right: 25px;
    height: 12vh;
    border-radius: 10px;
}

.actives {
    background: #e9e9fa;
    color: #8885e3;
   
    width: 58px;
    float: left;
   
    text-align: center;   
    padding: 10px;
    border: 1px solid #999999;
    margin-right: 25px;
    height: 12vh;
    border-radius: 10px;
}

.physicianBox {
    border: 1px solid #ddd;
    color: #333;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 20px;
    background-color: #f5f5f5;

}

.physicianBox .physicianPic {
    padding: 15px 0;
    background-color: #fff;
    text-align: center;
}

.physicianBox .physicianPic img {
    border: 6px solid #f8f8f8;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    transition: all 0.3s ease 0s;
    margin: 0 auto;
    height: 120px;
    width: 120px;
}

.physicianInfo {
    padding: 10px;
    text-align: center;
    border-top: 1px solid #eee;
}

.physicianInfo h6 {
    font-size: 16px;
    margin: 0;
}

.physicianBox strong {
    color: #444;
}

.physicianBox p {
    font-size: 13px;
    margin: 0;
    line-height: 22px;
}

.physicianBio {
    position: absolute;
    right: 0;
    bottom: 3px;
}

.physicianModal {
    text-align: center;
}

.physicianModal .physicianPic img {
    border: 6px solid #f8f8f8;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    transition: all 0.3s ease 0s;
    margin: 0 auto;
    height: 180px;
    width: 180px;
}

.physicianModal .info p,
.physicianModal .info .text-info {
    margin: 0;
}

.showBioBtn {
    background-color: #337ab7;
    padding: 5px 10px;
    color: #fff;
    font-size: 12px;
}

/*Pagination CSS*/
#page_navigation {
    clear: both;
    margin: 20px 0;
}

#page_navigation a {
    padding: 3px 6px;
    border: 1px solid #2e6da4;
    margin: 2px;
    color: black;
    text-decoration: none
}

    </style>
</head>

<body>
    <div class="container">
       
            <div class="row">
                <div class="col-md-8">
                    <div class="content">
                        <h4 style="color: #4E49D6;">Make your appointment with APPON!</h4><br>
                        <p>Provide the details</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="select-service">
                                        <?= lang('service') ?>
                                    </label>
                                    <input type="hidden" id="country-check"
                                        value="<?php echo @$Country[0]['Country'];  ?>" />
                                    <select id="select-service"
                                        <?php echo $this->session->userdata('status') == 'reschedule' ? 'readonly' :'' ?>
                                        class="form-control inpt">
                                        <?php
                                    // Group services by category, only if there is at least one service with a parent category.
                                    $has_category = FALSE;
                                    foreach ($available_services as $service)
                                    {
                                        if ($service['category_id'] != NULL)
                                        {
                                            $has_category = TRUE;
                                            break;
                                        }
                                    }

                                    if ($has_category)
                                    {
                                        $grouped_services = [];

                                        foreach ($available_services as $service)
                                        {
                                            if ($service['category_id'] != NULL)
                                            {
                                                if ( ! isset($grouped_services[$service['category_name']]))
                                                {
                                                    $grouped_services[$service['category_name']] = [];
                                                }

                                                $grouped_services[$service['category_name']][] = $service;
                                            }
                                        }

                                        // We need the uncategorized services at the end of the list so we will use
                                        // another iteration only for the uncategorized services.
                                        $grouped_services['uncategorized'] = [];
                                        foreach ($available_services as $service)
                                        {
                                            if ($service['category_id'] == NULL)
                                            {
                                                $grouped_services['uncategorized'][] = $service;
                                            }
                                        }

                                        foreach ($grouped_services as $key => $group)
                                        {
                                            $group_label = ($key != 'uncategorized')
                                                ? $group[0]['category_name'] : 'Uncategorized';

                                            if (count($group) > 0)
                                            {
                                                echo '<optgroup label="' . $group_label . '">';
                                                foreach ($group as $service)
                                                {
                                                    echo '<option value="' . $service['id'] . '">'
                                                        . $service['name'] . '</option>';
                                                }
                                                echo '</optgroup>';
                                            }
                                        }
                                    }
                                    else
                                    {
                                        foreach ($available_services as $service)
                                        {
                                            if($this->session->userdata('status') == 'reschedule'){
                                                echo '<option value="'.$this->session->userdata('sid').'">' . str_replace('%20',' ',$this->session->userdata('service')) . '</option>';
                                            }else{
                                                echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                                            }
                                           
                                        }
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="select-provider">
                                       <?= lang('provider') ?>
                                    </label>

                                    <select id="select-provider"
                                        <?php echo $this->session->userdata('status') == 'reschedule' ? 'readonly' :'' ?>
                                        class="form-control inpt">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                     <label>date</label>
                                    <input type="text" class="form-control inpt" placeholder="Apr 27,Wednesday" />
                                </div>
                            </div>

                        </div>
                    </div>

                    <table>
                        <tr>
                            <td><a class="previous_link" href="javascript:previous();">
                            <i class=" ri-arrow-left-circle-line"></i>
                            </a>
                            </td>
                            <td>
                                <div class="physicianList">
                                    <input type='hidden' id='current_page' />
                                    <input type='hidden' id='show_per_page' />
                                    <ul id="pagingBox" class="date_inline">
                                        <li  onclick="get_date('<?php echo date('Y-m-d'); ?>','<?php echo date('F'); ?>','<?php echo date('Y'); ?>')">
                                            <a href='javascript:void(0)'
                                                ><?php echo date('D'); ?></a>
                                            <BR>
                                            <a href='javascript:void(0)'><b ><?php echo date('d'); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+1 days")); ?>','<?php echo date('F',strtotime("+1 days")); ?>','<?php echo date('Y',strtotime("+1 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+1 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+1 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+2 days")); ?>','<?php echo date('F',strtotime("+2 days")); ?>','<?php echo date('Y',strtotime("+2 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+2 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+2 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+3 days")); ?>','<?php echo date('F',strtotime("+3 days")); ?>','<?php echo date('Y',strtotime("+3 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+3 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+3 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+4 days")); ?>','<?php echo date('F',strtotime("+4 days")); ?>','<?php echo date('Y',strtotime("+4 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+4 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+4 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+5 days")); ?>','<?php echo date('F',strtotime("+5 days")); ?>','<?php echo date('Y',strtotime("+5 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+5 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+5 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+6 days")); ?>','<?php echo date('F',strtotime("+6 days")); ?>','<?php echo date('Y',strtotime("+6 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+6 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+6 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+7 days")); ?>','<?php echo date('F',strtotime("+7 days")); ?>','<?php echo date('Y',strtotime("+7 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+7 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+7 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+8 days")); ?>','<?php echo date('F',strtotime("+8 days")); ?>','<?php echo date('Y',strtotime("+8 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+8 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+8 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+9 days")); ?>','<?php echo date('F',strtotime("+9 days")); ?>','<?php echo date('Y',strtotime("+9 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+9 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+9 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+10 days")); ?>','<?php echo date('F',strtotime("+10 days")); ?>','<?php echo date('Y',strtotime("+10 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+10 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+10 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+11 days")); ?>','<?php echo date('F',strtotime("+11 days")); ?>','<?php echo date('Y',strtotime("+11 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+11 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+11 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+12 days")); ?>','<?php echo date('F',strtotime("+12 days")); ?>','<?php echo date('Y',strtotime("+12 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+12 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+12 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+13 days")); ?>','<?php echo date('F',strtotime("+13 days")); ?>','<?php echo date('Y',strtotime("+13 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo date('D',strtotime("+13 days")); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+13 days")); ?></b></a>
                                        </li>

                                      

                                    </ul>
                                </div>
                            </td>
                            <td><a class="next_link" href="javascript:next();">
                            <i class="ri-arrow-right-circle-line"></i>
                            </a></td>
                        </tr>
                    </table>

                    <div id='page_navigation'></div>

                    <br>
                    <div class="col-md-12">
                        <div class="" id="available-hours">

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                     <div class="appointment-details">
                         <div class="details">
                             <ul type="none" class="appointment-list">
                                 <li>Dr Arun ( Cardiologist)</li>
                                 <li>Appointment Date : 20 Apr 2022, 9.30 AM</li>
                                 <li>Location : Trichy</li>
                             </ul>
                         </div>

                         <div class="fee">
                              <p>Fee ; 100 Rs per hour</p>          
                         </div>

                     </div>   
                               

                 </div>
                        <span style="display:none" class="footer-options">
                            <span id="select-language" class="badge badge-secondary">
                                <i class="fas fa-language mr-2"></i>
                                <?= ucfirst(config('language')) ?>
                            </span>

                            <!--<a class="backend-link badge badge-primary" href="<?= site_url('backend'); ?>">-->
                            <!--    <i class="fas fa-sign-in-alt mr-2"></i>-->
                            <!--    <?php // $this->session->user_id ? lang('backend_section') : lang('login') ?>-->
                            <!--</a>-->
                        </span>
            </div>
           <?php  if($this->session->userdata('status') == 'reschedule'){
                    ?>
                        
                        <!--<input type="hidden" name="csrfToken"/>-->
                        <input type="hidden" name="post_data" />
                        <input type="hidden" id="CUST_ID" name="CUST_ID" value="CUST001">
                        <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail109">
                        <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                        <input type="hidden" id="service_prive" name="PRICE" value="" />
                        <input type="hidden" class="form-control" id="ORDER_ID" name="ORDER_ID" size="20" maxlength="20"
                            autocomplete="off" tabindex="1" value="">
                        <input type="hidden" name="csrfToken"
                            value="<?php  echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" autocomplete="off"
                            tabindex="5" value="50">


                        <?php
                    }
                    else
                    {

                    ?>
                        <form action="<?php echo site_url('/Paytm/send_request'); ?>" id="book-appointment-form"
                            style="display:inline-block" method="post">


                           


                            <!-- <button style="display:none" disabled="true" id="book-appointment-submit" type="button"
                                class="btn btn-success" style="width:auto;">
                                <i class="fas fa-check-square mr-2"></i>
                                <?php echo "Proceed to Payment"; //! $manage_mode ? lang("confirm") : lang("update") ?>
                            </button>

                            <button disabled="true" style="display:none" id="book-appointment-submit-stripe"
                                type="button" class="btn btn-success" style="width:auto;">
                                <i class="fas fa-check-square mr-2"></i>
                                <?php echo "Proceed to Payment"; //! $manage_mode ? lang("confirm") : lang("update") ?>
                            </button> -->

                            <!--<input type="hidden" name="csrfToken"/>-->
                            <input type="hidden" name="post_data" />
                            <input type="hidden" id="CUST_ID" name="CUST_ID" value="CUST001">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail109">
                            <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                            <input type="hidden" id="service_prive" name="PRICE" value="" />
                            <input type="hidden" class="form-control" id="ORDER_ID" name="ORDER_ID" size="20"
                                maxlength="20" autocomplete="off" tabindex="1" value="">
                            <input type="hidden" name="csrfToken"
                                value="<?php  echo $this->security->get_csrf_hash(); ?>" />
                            <input type="hidden" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT"
                                autocomplete="off" tabindex="5" value="50">


                        </form>
                        <?php
                    }
                       ?>

       

    </div>




    <?php require 'terms_and_conditions_modal.php' ?>


    <?php if ($display_cookie_notice === '1'): ?>
    <?php require 'cookie_notice_modal.php' ?>
    <?php endif ?>

    <?php if ($display_terms_and_conditions === '1'): ?>
    <?php require 'terms_and_conditions_modal.php' ?>
    <?php endif ?>

    <?php if ($display_privacy_policy === '1'): ?>
    <?php require 'privacy_policy_modal.php' ?>
    <?php endif ?>

    <script>
    var GlobalVariables = {
        availableServices: <?= json_encode($available_services) ?>,
        availableProviders: <?= json_encode($available_providers) ?>,
        baseUrl: <?= json_encode(config('base_url')) ?>,
        manageMode: <?= $manage_mode ? 'true' : 'false' ?>,
        customerToken: <?= json_encode($customer_token) ?>,
        dateFormat: <?= json_encode($date_format) ?>,
        timeFormat: <?= json_encode($time_format) ?>,
        firstWeekday: <?= json_encode($first_weekday) ?>,
        displayCookieNotice: <?= json_encode($display_cookie_notice === '1') ?>,
        appointmentData: <?= json_encode($appointment_data) ?>,
        providerData: <?= json_encode($provider_data) ?>,
        customerData: <?= json_encode($customer_data) ?>,
        orderid: <?= json_encode($orderid) ?>,
        displayAnyProvider: <?= json_encode($display_any_provider) ?>,
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>
    };
    var oid = GlobalVariables['orderid'][0]['Orderid'];


    var id = (oid == null) ? 0 : oid;
  //  document.getElementById('ORDER_ID').value = (parseInt(id) + 1);
    var EALang = <?= json_encode($this->lang->language) ?>;
    var availableLanguages = <?= json_encode(config('available_languages')) ?>;
    </script>
   








    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/popper/popper.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/tippy/tippy-bundle.umd.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/moment/moment.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/moment/moment-timezone-with-data.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/frontend_book_api.js') ?>"></script>
    <script src="<?= asset_url('assets/js/frontend_book.js') ?>"></script>
    <script src="<?= asset_url('assets/js/validate.js') ?>"></script>
    <script src="<?= asset_url('assets/js/color.js') ?>"></script>
    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
    <script src="<?= asset_url('assets/js/notiflix-2.7.0.min.js') ?>"></script>

    <script>
    $(function() {
        FrontendBook.initialize(true, GlobalVariables.manageMode);
        GeneralFunctions.enableLanguageSelection($('#select-language'));
    });

    // $('#select-date').datepicker({minDate:"+1", changeMonth: true});
    //id="select-provider"
    <?php if($this->session->userdata('status') == 'reschedule'){?>

    setTimeout(() => {
        var option =
            "<option selected value='<?php echo $this->session->userdata('pid'); ?>'><?php echo str_replace('%20',' ',$this->session->userdata('pname')); ?></option>";
        $('#select-provider').html(option);
    }, 1000);

    <?php } ?>
    </script>
<script>
   // $.noConflict();
jQuery(document).ready(function() {

    
   var d="<?php echo date('Y-m-d'); ?>";
   var m= "<?php echo date('F'); ?>";
    var y="<?php echo date('Y'); ?>";
    get_date(d,m,y)
    //Pagination JS
    //how much items per page to show
    var show_per_page = 7;
    //getting the amount of elements inside pagingBox div
    var number_of_items = $('#pagingBox').children().size();
    //calculate the number of pages we are going to have
    var number_of_pages = Math.ceil(number_of_items / show_per_page);

    //set the value of our hidden input fields
    $('#current_page').val(0);
    $('#show_per_page').val(show_per_page);

    //now when we got all we need for the navigation let's make it '

    /* 
    what are we going to have in the navigation?
        - link to previous page
        - links to specific pages
        - link to next page
    */
    var navigation_html =
    '<a class="previous_link" style="display:none" href="javascript:previous();">Prev</a>';
    var current_link = 0;
    while (number_of_pages > current_link) {
        navigation_html += '<a class="page_link" style="display:none" href="javascript:go_to_page(' +
            current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
        current_link++;
    }
    navigation_html += '<a class="next_link" style="display:none" href="javascript:next();">Next</a>';

    $('#page_navigation').html(navigation_html);

    //add active_page class to the first page link
    $('#page_navigation .page_link:first').addClass('active_page');

    //hide all the elements inside pagingBox div
    $('#pagingBox').children().css('display', 'none');

    //and show the first n (show_per_page) elements
    $('#pagingBox').children().slice(0, show_per_page).css('display', 'block');

});



//Pagination JS

function previous() {

    new_page = parseInt($('#current_page').val()) - 1;
    //if there is an item before the current active link run the function
    if ($('.active_page').prev('.page_link').length == true) {
        go_to_page(new_page);
    }

}

function next() {
    new_page = parseInt($('#current_page').val()) + 1;
    //if there is an item after the current active link run the function
    if ($('.active_page').next('.page_link').length == true) {
        go_to_page(new_page);
    }

}

function go_to_page(page_num) {
    //get the number of items shown per page
    var show_per_page = parseInt($('#show_per_page').val());

    //get the element number where to start the slice from
    start_from = page_num * show_per_page;

    //get the element number where to end the slice
    end_on = start_from + show_per_page;

    //hide all children elements of pagingBox div, get specific items and show them
    $('#pagingBox').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

    /*get the page link that has longdesc attribute of the current page and add active_page class to it
    and remove that class from previously active page link*/
    $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass(
        'active_page');

    //update the current page input field
    $('#current_page').val(page_num);
}

function get_date(d,m,y){
    FrontendBookApi.getAvailableHours(d);
//     var tok = GlobalVariables['csrfToken'];


// var url = '<?php echo base_url("index.php/backend_api/get_day") ?>';
// console.log(d);
// $.post(url, {
//     "csrfToken": tok,
//     "date": d
// }, function(data) {
//     $('.schedule').html(data);
// })
}
$('.date_inline > li').click(function() {
    $('li').removeClass();
    $(this).addClass('actives');
});
</script>
<script src="<?= asset_url('assets/js/jquery-migrate-3.4.0.js') ?>"> </script>

    <?php google_analytics_script();  } ?>
</body>

</html>