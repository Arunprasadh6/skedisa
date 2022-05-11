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
    </style>
</head>

<body>
    <div id="main" class="container">
        <div class="row wrapper">
            <div id="book-appointment-wizard" class="col-12 col-lg-10 col-xl-10">

                <!-- FRAME TOP BAR -->

                <div id="header">
                    <span style="float:left" id="company-name"><?= $company_name ?></span>


                    <div id="steps">

                        <div id="step-1" class="book-step active-step"
                            data-tippy-content="<?= lang('service_and_provider') ?>">
                            <strong><?= lang('service_and_provider') ?></strong>
                        </div>

                        <div id="step-2" class="book-step" data-toggle="tooltip"
                            data-tippy-content="<?= lang('appointment_date_and_time') ?>">
                            <strong><?= lang('appointment_date_and_time') ?></strong>
                        </div>
                        <div id="step-3" class="book-step" data-toggle="tooltip"
                            data-tippy-content="<?php echo "Patient Information"; ?>">
                            <strong><?php echo "Patient Information";  ?></strong>
                        </div>
                        <div id="step-4" class="book-step" data-toggle="tooltip"
                            data-tippy-content="<?= lang('appointment_confirmation') ?>">
                            <strong><?= lang('appointment_confirmation') ?></strong>
                        </div>
                    </div>
                </div>

                <?php if ($manage_mode): ?>
                <div id="cancel-appointment-frame" class="row booking-header-bar">
                    <div class="col-12 col-md-10">
                        <small><?= lang('cancel_appointment_hint') ?></small>
                    </div>
                    <div class="col-12 col-md-2">
                        <form id="cancel-appointment-form" method="post"
                            action="<?= site_url('appointments/cancel/' . $appointment_data['hash']) ?>">

                            <input type="hidden" name="csrfToken" value="<?= $this->security->get_csrf_hash() ?>" />

                            <textarea name="cancel_reason" style="display:none"></textarea>

                            <button id="cancel-appointment" class="btn btn-warning btn-sm">
                                <?= lang('cancel') ?>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="booking-header-bar row">
                    <div class="col-12 col-md-10">
                        <small><?= lang('delete_personal_information_hint') ?></small>
                    </div>
                    <div class="col-12 col-md-2">
                        <button id="delete-personal-information"
                            class="btn btn-danger btn-sm"><?= lang('delete') ?></button>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (isset($exceptions)): ?>
                <div style="margin: 10px">
                    <h4><?= lang('unexpected_issues') ?></h4>

                    <?php foreach ($exceptions as $exception): ?>
                    <?= exceptionToHtml($exception) ?>
                    <?php endforeach ?>
                </div>
                <?php endif ?>


                <!-- SELECT SERVICE AND PROVIDER -->

                <div id="wizard-frame-1" class="wizard-frame">

                    <?php 
               
                 
                     
                  if($this->session->userdata('Fname') != 'Guest'){ 
                      
                        
                 if($a){ ?> <a onclick="logout_app()" href='javascript:void(0)' class="btn btn-primary"
                        style="float:right">Logout</a>
                    <?php } ?>
                    <a class="btn btn-primary" href="<?php echo site_url('Appointments/history') ?>"
                        style="margin-right: 1em;">View Booking</a>
                    <?php
                  }
                ?>
                    <div class="frame-container">

                        <h3 class="frame-title"><?php echo "Please Choose your Service and Provider"; ?></h3>

                        <span><?php $data=$this->session->userdata('data'); ?></span>

                        <div class="row frame-content">
                            <div class="col">
                                <div class="form-group">
                                    <label for="select-service">
                                        <strong><?= lang('service') ?></strong>
                                    </label>
                                    <input type="hidden" id="country-check"
                                        value="<?php echo @$Country[0]['Country'];  ?>" />
                                    <select id="select-service"
                                        <?php echo $this->session->userdata('status') == 'reschedule' ? 'readonly' :'' ?>
                                        class="form-control">
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

                                <div class="form-group">
                                    <label for="select-provider">
                                        <strong><?= lang('provider') ?></strong>
                                    </label>

                                    <select id="select-provider"
                                        <?php echo $this->session->userdata('status') == 'reschedule' ? 'readonly' :'' ?>
                                        class="form-control">
                                    </select>




                                </div>

                                <div>



                                </div>

                                <div id="service-description"></div>
                            </div>
                        </div>
                    </div>

                    <div class="command-buttons">

                        <span>&nbsp;</span>


                        <button type="button" id="button-next-1" class="btn button-next btn-dark" data-step_index="1">
                            <?= lang('next') ?>
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- SELECT APPOINTMENT DATE -->

                <div id="wizard-frame-2" class="wizard-frame" style="display:none;">
                    <?php 
                  
                  if($this->session->userdata('Fname') != 'Guest'){ 
                        
                        
                 if($a){ ?> <a onclick="logout_app();" href='javascript:void(0)' class="btn btn-primary"
                        style="float:right">Logout</a>
                    <?php } ?>
                    <a class="btn btn-primary" href="<?php echo site_url('Appointments/history') ?>"
                        style="margin-right: 1em;">View Booking</a>
                    <?php
                  }
                ?>
                    <div class="frame-container">

                        <h3 class="frame-title"><?php echo "Select your Appointment date and Time";  ?></h3>

                        <div class="row frame-content">
                            <div class="col-12 col-md-6">
                                <div id="select-date"></div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div id="select-time">
                                    <div class="form-group" style="display:none">
                                        <label for="select-timezone"><?= lang('timezone') ?></label>
                                        <?= render_timezone_dropdown('id="select-timezone" class="form-control" value="UTC"'); ?>
                                    </div>

                                    <div id="available-hours"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-back-2" class="btn button-back btn-outline-secondary"
                            data-step_index="2">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <?= lang('back') ?>
                        </button>
                        <button type="button" id="button-next-2" class="btn button-next btn-dark" data-step_index="2">
                            <?= lang('next') ?>
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- ENTER CUSTOMER DATA -->

                <div id="wizard-frame-3" class="wizard-frame" style="display:none;">
                    <?php 
                  
                  if($this->session->userdata('Fname') != 'Guest'){ 
                        
                        
                 if($a){ ?> <a onclick="logout_app()" href='javascript:void(0)' class="btn btn-primary"
                        style="float:right">Logout</a>
                    <?php } ?>
                    <a class="btn btn-primary" href="<?php echo site_url('Appointments/history') ?>"
                        style="margin-right: 1em;">View Booking</a>
                    <?php
                  }
                ?>
                    <div class="frame-container">

                        <h3 class="frame-title"><?php echo "Patient Information"; ?></h3>
                        <h4 style="display:none" class="text-center">Filter MRN Number</h4>

                        <div style="display:none" class="row frame-content">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" id="mrn-search" placeholder="Search MRN Number"
                                        class=" form-control" maxlength="100" />

                                    <input type="hidden" id="ajax-token"
                                        value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input type="button" value="search" id="search"
                                        onclick="get_data('<?php echo $this->security->get_csrf_hash(); ?>')"
                                        class="btn btn-info" />
                                </div>
                            </div>
                        </div>




                        <div class="row frame-content">


                            <!--   <div class="form-group">-->
                            <!--    <label for="last-name" class="control-label">-->
                            <!--        <?php //echo "MRN Number"; ?>-->
                            <!--        <span class="text-danger">*</span>-->
                            <!--    </label>-->
                            <!--    <input type="text" id="last-name"  class="required form-control" maxlength="10"/>-->
                            <!--</div>-->
                            <?php if($this->session->userdata('Fname')=='Guest'){ ?>
                            <div class="col-12 col-md-12">
                                <div class="loginselect">
                                    <div class="form-group">
                                        <input type="radio" id="account" value="account" name="account" class="required"
                                            checked /> Already have an account ?
                                        <input type="radio" id="noaccount" value="noaccount" name="account"
                                            class="required " /> I don't have an account
                                        <a id="sign-out" style="display:none" href="javascript:void(0)"
                                            onclick="signOut();">Sign out</a>
                                        <a id="sign-out-fb" style="display:none" href="javascript:void(0)"
                                            onclick="fbLogout();">Sign out</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="logincheck">
                                    <div id="notification" style="display: none;">
                                        <div style="background:#ffc3c5;" class="notification alert"><button
                                                type="button" class="close"
                                                data-dismiss="alert"><span>×</span></button><strong>Username or Password
                                                is Incorrect!</strong></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone-number" class="control-label">
                                            <?php echo "Mobile Number"; ?>

                                        </label>
                                        <input type="text" id="phone-numbercheck" placeholder="Enter your mobile number"
                                            maxlength="10" class=" form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="pwd" class="control-label">
                                            <?php echo "Password"; ?>
                                        </label>
                                        <input type="password" id="passwdcheck" onkeyup="validate_pwd(this)"
                                            placeholder="Enter your password" value="" class=" form-control"
                                            maxlength="50" />
                                    </div>
                                    <div class="form-group" style="display:flex">
                                        <input style="margin-right:20px" type="button" id="logincheckbtn" name="Login"
                                            value="Login" class=" btn btn-info" />
                                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                        <a href="javascript:void(0);" style="margin-left: 21px;" onclick="fbLogin();"
                                            class="fb btn" id="fbLink"><i class="fab fa-facebook-f"></i>Fb Login</a>
                                    </div>



                                    <a href="javascript:void(0)" id="fget" class="forgot-password">
                                        <?= lang('forgot_your_password') ?></a>
                                    <!-- Display Google sign-in button -->


                                </div>
                            </div>

                            <?php 
                          $col="none";  
                          $disabled="";
                        }else{
                             $col="block";   
                            
                             $disabled="disabled";
                        } 
                            
                            ?>

                            <div class="account col-md-12" style="display:<?php echo $col; ?>;">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="phone-number" class="control-label">
                                                <?php echo "Mobile Number"; ?>
                                                <?= $require_phone_number === '1' ? '<span class="text-danger">*</span>' : '' ?>
                                            </label>
                                            <input type="text" id="phone-number"
                                                value="<?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('Mobile') : '';   ?>"
                                                maxlength="10"
                                                class="<?= $require_phone_number === '1' ? 'required' : '' ?> form-control"
                                                <?php echo $disabled; ?> />
                                        </div>
                                        <label id="pno-error" style="display:none;color:red">Mobile Number is Already
                                            Exist</label>


                                        <div class="form-group">
                                            <label for="first-name" class="control-label">
                                                <?php echo "Name"; ?>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" id="first-name"
                                                value="<?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('Fname') : '' ; ?>"
                                                <?php echo $disabled; ?> class="required form-control" maxlength="20" />
                                            <input type="hidden" id="user-id" />
                                            <input type="hidden" id="google-id" />
                                        </div>
                                        <?php if($this->session->userdata('Fname')=='Guest'){ ?>
                                        <div class="form-group">
                                            <label for="pwd" class="control-label">
                                                <?php echo "Password"; ?>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="password" id="passwd" value="" class=" form-control required"
                                                maxlength="50" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">
                                                <?php echo "Confirm Password"; ?>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="password" id="cpasswd" value="" class=" form-control required"
                                                maxlength="50" />
                                            <label id="cpwd-error" style="color:red;display:none"></label>
                                        </div>

                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="email" class="control-label">
                                                <?= lang('email') ?>
                                            </label>
                                            <input type="text" id="email"
                                                value="<?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('user_email') : '';   ?>"
                                                class=" form-control" <?php echo $disabled; ?> maxlength="50" />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="control-label">
                                                <?= lang('address') ?>
                                            </label>
                                            <input type="text" id="address"
                                                value="<?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('Address') : '';   ?>"
                                                <?php echo $disabled; ?> class="form-control" maxlength="120" />

                                            <input type="hidden" name="org" id="organization"
                                                value="<?php echo $this->session->userdata('Organization'); ?>" />
                                            <input type="hidden" id="userid"
                                                value="<?php echo $this->session->userdata('user_id'); ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="control-label">
                                                <?= lang('city') ?>
                                            </label>
                                            <input type="text" id="city"
                                                value="<?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('City') : '';   ?>"
                                                <?php echo $disabled; ?>
                                                onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                class="form-control" maxlength="15" />
                                        </div>
                                        <div class="form-group">
                                            <label for="zip-code" class="control-label">
                                                <?php echo "Pincode"; ?>
                                            </label>
                                            <input type="text" id="zip-code"
                                                value="<?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('Pincode') : '';   ?>"
                                                <?php echo $disabled; ?>
                                                onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                                                class="form-control" maxlength="6" />
                                        </div>
                                        <div class="form-group">
                                            <label for="notes" class="control-label">
                                                <?= lang('notes') ?>
                                            </label>
                                            <textarea id="notes" maxlength="500" class="form-control" rows="1"
                                                <?php echo $disabled; ?>><?php echo ($this->session->userdata('role_slug')=='customer') ? ($this->session->userdata('Fname') == 'Guest') ? '' : $this->session->userdata('Notes') : '';   ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($display_terms_and_conditions): ?>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="required form-check-input" id="accept-to-terms-and-conditions">
                        <label class="form-check-label" for="accept-to-terms-and-conditions">
                            <?= strtr(lang('read_and_agree_to_terms_and_conditions'),
                                [
                                    '{$link}' => '<a href="#" data-toggle="modal" data-target="#terms-and-conditions-modal">',
                                    '{/$link}' => '</a>'
                                ])
                            ?>
                        </label>
                    </div>
                    <?php endif ?>

                    <?php if ($display_privacy_policy): ?>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="required form-check-input" id="accept-to-privacy-policy">
                        <label class="form-check-label" for="accept-to-privacy-policy">
                            <?= strtr(lang('read_and_agree_to_privacy_policy'),
                                [
                                    '{$link}' => '<a href="#" data-toggle="modal" data-target="#privacy-policy-modal">',
                                    '{/$link}' => '</a>'
                                ])
                            ?>
                        </label>
                    </div>
                    <?php endif ?>

                    <div class="command-buttons">
                        <button type="button" id="button-back-3" class="btn button-back btn-outline-secondary"
                            data-step_index="3">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <?= lang('back') ?>
                        </button>
                        <button type="button" id="button-next-3" class="btn button-next btn-dark" data-step_index="3">
                            <?= lang('next') ?>
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <!-- APPOINTMENT DATA CONFIRMATION -->


                <div id="wizard-frame-4" class="wizard-frame" style="display:none;">
                    <?php 
                  
                 
                        
                        
                 if($a){ ?> <a onclick="logout_app()" href='javascript:void();' class="btn btn-primary"
                        style="float:right">Logout</a>
                    <?php } ?>
                    <a class="btn btn-primary" href="<?php echo site_url('Appointments/history') ?>"
                        style="margin-right: 1em;">View Booking</a>
                    <?php
                  
                ?>
                    <div class="frame-container">
                        <h3 class="frame-title"><?= lang('appointment_confirmation') ?></h3>
                        <div class="row frame-content">
                            <div id="appointment-details" class="col-12 col-md-6"></div>
                            <div id="customer-details" class="col-12 col-md-6"></div>


                            <div class="col-md-4">
                                <input type="checkbox" id="coupon-check" /> If you Have Coupon Code Enter

                            </div>



                            <div class="mv">
                                <select id="select-payment" class="form-control">
                                    <option value="">Select Payment Gateway</option>
                                    <option value="pay">Paytm</option>
                                    <option value="strp">Stripe</option>
                                </select>
                            </div>
                        </div>
                        <?php if ($this->settings_model->get_setting('require_captcha') === '1'): ?>
                        <div class="row frame-content">
                            <div class="col-12 col-md-6">
                                <h4 class="captcha-title">
                                    CAPTCHA
                                    <button class="btn btn-link text-dark text-decoration-none py-0">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </h4>
                                <img class="captcha-image" src="<?= site_url('captcha') ?>">
                                <input class="captcha-text form-control" type="text" value="" />
                                <span id="captcha-hint" class="help-block" style="opacity:0">&nbsp;</span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="command-buttons">
                        <button type="button" id="button-back-4" class="btn button-back btn-outline-secondary"
                            data-step_index="4">
                            <i class="fas fa-chevron-left mr-2"></i>
                            <?= lang('back') ?>
                        </button>
                        <?php
                    if($this->session->userdata('status') == 'reschedule'){
                    ?>
                        <input type="hidden" id="schedule" name="schedule"
                            value="<?php echo $this->session->userdata('hash').','.$this->session->userdata('oid').','.$this->session->userdata('status'); ?>">

                        <button id="book-reschedule-submit" type="button" class="btn btn-success" style="width:auto;">
                            <i class="fas fa-check-square mr-2"></i>
                            <?php echo "Confirmation"; //! $manage_mode ? lang("confirm") : lang("update") ?>
                        </button>
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


                            <span>I have read and agree to the <a href='javascript:void(0)' id="policy">Terms and Condtions</a></span>
                            <input type="checkbox" value="1" id="privacy" style="margin-right: 1em;">


                            <button style="display:none" disabled="true" id="book-appointment-submit" type="button"
                                class="btn btn-success" style="width:auto;">
                                <i class="fas fa-check-square mr-2"></i>
                                <?php echo "Proceed to Payment"; //! $manage_mode ? lang("confirm") : lang("update") ?>
                            </button>

                            <button disabled="true" style="display:none" id="book-appointment-submit-stripe"
                                type="button" class="btn btn-success" style="width:auto;">
                                <i class="fas fa-check-square mr-2"></i>
                                <?php echo "Proceed to Payment"; //! $manage_mode ? lang("confirm") : lang("update") ?>
                            </button>

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
                </div>

                <!-- FRAME FOOTER -->

                <div id="frame-footer">
                    <small>
                        <span class="footer-powered-by">
                            Powered By

                            <a href="https://gravitykey.com" target="_blank">Gravitykey</a>
                        </span>

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
                    </small>
                </div>
            </div>
        </div>
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
    document.getElementById('ORDER_ID').value = (parseInt(id) + 1);
    var EALang = <?= json_encode($this->lang->language) ?>;
    var availableLanguages = <?= json_encode(config('available_languages')) ?>;
    </script>
    <script>
    // Render Google Sign-in button
    function onSignIn(googleUser) {
        document.getElementById('noaccount').checked = true;
        var profile = googleUser.getBasicProfile();
        // console.log(profile);
        document.getElementById('first-name').value = profile.getName();
        document.getElementById('email').value = profile.getEmail();
        document.getElementById('google-id').value = profile.getId();
        document.getElementById('sign-out').style.display = "block";
        document.getElementsByClassName('account')[0].style.display = "block";
        document.getElementsByClassName('logincheck')[0].style.display = "none";


        //   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        //   console.log('Name: ' + profile.getName());
        //   console.log('Image URL: ' + profile.getImageUrl());
        //   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        check_google_user(profile.getId());
    }

    function check_google_user(id) {
        var token = $('#ajax-token').val();
        $.post("index.php/customers/check_google", {
            'google_id': id,
            'csrfToken': token,
        }, function(data) {
            if (data == 0) {

            } else {
                var res = JSON.parse(data);

                Notiflix.Notify.Success('Login Successfully');
                $(".logincheck").css("display", "none");
                $(".loginselect").css("display", "none");
                $(".account").css("display", "block");
                document.getElementById('sign-out').style.display = "block";
                $('#notification').css('display', 'none');
                $('#phone-number').val(res[0].phone_number);

                $('#email').val(res[0].email);
                $('#first-name').val(res[0].first_name);
                $('#address').val(res[0].address);
                $('#city').val(res[0].city);
                $('#zip-code').val(res[0].zip_code);
                $('#notes').val(res[0].notes);

                document.getElementById("phone-number").disabled = true;
                document.getElementById("email").disabled = true;
                document.getElementById("first-name").disabled = true;
                document.getElementById("address").disabled = true;
                document.getElementById("city").disabled = true;
                document.getElementById("zip-code").disabled = true;
                document.getElementById("notes").disabled = true;
                $('#passwd').removeClass('required');
                $('#cpasswd').removeClass('required');
                $('#passwd').parent().css('display', 'none');
                $('#cpasswd').parent().css('display', 'none');
            }


        });

    }


    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function() {
            //console.log('User signed out.');
            document.getElementById('sign-out').style.display = "none";
            document.getElementById('first-name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('google-id').value = '';
            document.getElementsByClassName('account')[0].style.display = "none";
            document.getElementsByClassName('logincheck')[0].style.display = "block";
            document.getElementById('account').checked = true;

        });
    }


    window.fbAsyncInit = function() {
        // FB JavaScript SDK configuration and setup
        FB.init({
            appId: '551138646119611', // FB App ID
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true, // parse social plugins on this page
            version: 'v3.2' // use graph api version 2.8
        });

        // Check whether the user already logged in
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                //display user data
                getFbUserData();
            }
        });
    };

    // Load the JavaScript SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Facebook login with JavaScript SDK
    function fbLogin() {
        FB.login(function(response) {
            if (response.authResponse) {
                // Get and display the user profile data
                getFbUserData();
            } else {
                // document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
            }
        }, {
            scope: 'email'
        });
    }

    // Fetch the user profile data from facebook
    function getFbUserData() {
        FB.api('/me', {
                locale: 'en_US',
                fields: 'id,first_name,last_name,email,link,gender,locale,picture'
            },
            function(response) {
                // console.log(response);

                document.getElementById('noaccount').checked = true;
                document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
                document.getElementById('first-name').value = response.first_name;
                document.getElementById('email').value = response.email;
                document.getElementById('google-id').value = response.id;
                document.getElementById('sign-out-fb').style.display = "block";
                document.getElementsByClassName('account')[0].style.display = "block";
                document.getElementsByClassName('logincheck')[0].style.display = "none";
                check_fb_user(response.id);
                document.getElementById('fbLink').setAttribute("onclick", "fbLogout()");

            });
    }

    function check_fb_user(id) {
        var token = $('#ajax-token').val();
        $.post("index.php/customers/check_google", {
            'google_id': id,
            'csrfToken': token,
        }, function(data) {
            if (data == 0) {

            } else {
                var res = JSON.parse(data);

                Notiflix.Notify.Success('Login Successfully');
                $(".logincheck").css("display", "none");
                $(".loginselect").css("display", "none");
                $(".account").css("display", "block");

                document.getElementById('sign-out-fb').style.display = "block"
                $('#notification').css('display', 'none');
                $('#phone-number').val(res[0].phone_number);

                $('#email').val(res[0].email);
                $('#first-name').val(res[0].first_name);
                $('#address').val(res[0].address);
                $('#city').val(res[0].city);
                $('#zip-code').val(res[0].zip_code);
                $('#notes').val(res[0].notes);

                document.getElementById("phone-number").disabled = true;
                document.getElementById("email").disabled = true;
                document.getElementById("first-name").disabled = true;
                document.getElementById("address").disabled = true;
                document.getElementById("city").disabled = true;
                document.getElementById("zip-code").disabled = true;
                document.getElementById("notes").disabled = true;
                $('#passwd').removeClass('required');
                $('#cpasswd').removeClass('required');
                $('#passwd').parent().css('display', 'none');
                $('#cpasswd').parent().css('display', 'none');
            }


        });

    }

    // Logout from facebook
    function fbLogout() {
        FB.logout(function() {
            document.getElementById('fbLink').setAttribute("onclick", "fbLogin()");
            document.getElementById('fbLink').innerHTML = 'Facebook';
            document.getElementById('sign-out-fb').style.display = "none"
            document.getElementById('first-name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('google-id').value = '';
            document.getElementsByClassName('account')[0].style.display = "none";
            document.getElementsByClassName('logincheck')[0].style.display = "block";
            document.getElementById('account').checked = true;
            //  document.getElementById('userData').innerHTML = '';
            //document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
        });
    }

   // $(this).find("option:selected").parent().attr("Asia")

    function logout_app() {
        // var auth2 = gapi.auth2.getAuthInstance();
        //auth2.signOut().then(function () {
        var win = open('https://mail.google.com/mail/u/0/?logout&hl=en', 'Signout', 'width=1,height=1,left=5,top=3');
        setTimeout(function() {
            win.close();
        }, 2000);
        // });
        setTimeout(() => {
            window.location = "customers/logout";
        }, 1000);
        win.close();
        FB.logout(function() {});


    }
    </script>


    <div id="coupon-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Coupon Code</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-7">                        
                        <div id="form-group">
                            <input type="text" class="form-control" placeholder="Enter Coupon code" id="coupon" /><br>
                            <label class="btn btn-info" id="apply-coupon">Apply</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-cou"  class="btn btn-outline-secondary" data-dismiss="modal">
                        <?= lang('close') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div id="forget-pwd" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Forgot Password</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">

                    <div id="mobf">
                        <div class="form-group">
                            <input type="text" id="fget-email" maxlength="10"
                                onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Enter Mobile Number"
                                class="form-control" />
                            <input type="hidden" id="token" value="<?php   echo $this->security->get_csrf_hash(); ?>" />
                        </div>
                        <span id="error-forget" style="color:red;display:none"></span>
                        <div>
                            <button id="send-otp" disabled class="btn btn-primary">Send OTP</button>
                        </div>
                    </div>
                    <div id="otpf" style="display:none;">
                        <div id="notification" style="display: block;">
                            <div style="background:#c3ffc5;" class="notification alert"><button type="button"
                                    class="close" data-dismiss="alert"><span>×</span></button><strong>An OTP has been
                                    sent to your registered mobile number !</strong></div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="otp" maxlength="10"
                                onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Enter OTP"
                                class="form-control" />
                            <input type="hidden" id="validotp" />
                        </div>
                        <span id="error-otp" style="color:red;display:none"></span>
                        <div>
                            <label id="submit-otp" class="btn btn-primary">Submit</label>
                        </div>
                    </div>
                    <div id="chf" style="display:none;">
                        <div class="form-group">
                            <input type="hidden" name="org" id="select-organ-fget"
                                value="<?php echo $this->session->userdata('Organization'); ?>" />
                            <input type="password" id="fget-passwd" placeholder="Enter new password" disabled="true"
                                class="form-control" />
                            <label id="pwd-error" style="color:red;display:none"></label>
                        </div>
                        <div class="form-group">

                            <input type="password" id="fget-cpasswd" placeholder="Enter confirm password" value=""
                                class=" form-control" maxlength="50" />
                            <label id="cpwd-error" style="color:red;display:none"></label>
                        </div>
                        <div>
                            <button id="change-pwd" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        close
                    </button>
                </div>
            </div>
        </div>
    </div>





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

    <?php google_analytics_script();  } ?>
</body>

</html>