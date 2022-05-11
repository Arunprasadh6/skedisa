<!DOCTYPE html>
<?php
$a=$this->session->userdata('role_slug'); 
?> 
<html lang="en"> 
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">

    <title><?= lang('page_title') . ' ' . $company_name ?></title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/cookieconsent/cookieconsent.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/notiflix-2.7.0.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/material-design-iconic-font.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/style-form.css') ?>">
   

    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>


</head>

<body>

    <div class="main">

        <div class="container" id="book-appointment-wizard">
            <h2>Appoinment Booking</h2> 
            <a class="btn btn-primary" target="_blank" href="<?php echo site_url('Appointments/history') ?>">View Booking</a>
            <?php  if($a){ ?>  <a href='<?php echo site_url('customers/logout'); ?>' class="btn btn-info" style="float:right">Logout</a><?php } ?>

            <?php if ($manage_mode): ?>
            <div id="cancel-appointment-frame" class="row booking-header-bar">
                    <div class="col-12 col-md-10">
                        <small><?= lang('cancel_appointment_hint') ?></small>
                    </div>
                    <div class="col-12 col-md-2">
                        <form id="cancel-appointment-form" method="post"
                              action="<?= site_url('appointments/cancel/' . @$appointment_data['hash']) ?>">

                            <input type="hidden" name="csrfToken" value="<?= $this->security->get_csrf_hash() ?>"/>

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
          <?php endif ?>

            <?php if (isset($exceptions)): ?>
                <div style="margin: 10px">
                    <h4><?= lang('unexpected_issues') ?></h4>

                    <?php foreach ($exceptions as $exception): ?>
                        <?= exceptionToHtml($exception) ?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <form method="POST" id="signup-form" class="signup-form">
                <h3>
                    <span class="title_text" title="<?= lang('service_and_provider') ?>"  data-tippy-content="<?= lang('service_and_provider') ?>"><?= lang('service_and_provider') ?></span>
                </h3>
                
               
              
                <fieldset>
                    
                    <div class="fieldset-content">
                        
                   <div class="form-select">
                                <label for="select-service">
                                    <strong><?= lang('service') ?></strong>
                                </label>

                                <select id="select-service" class="select">
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
                                            echo '<option value="' . $service['id'] . '">' . $service['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-select">
                                <label for="select-provider">
                                    <strong><?= lang('provider') ?></strong>
                                </label>

                                <select id="select-provider" class="select"></select>
                              
                             
                            </div>
                            <div class="form-group">
                                   <div id="service-description"></div>
                                </div>
                            
                    </div>
                    <div class="fieldset-footer">
                        <span>Step 1 of 4</span>
                    </div>
                </fieldset>

                <h3>
                    <span class="title_text" title="<?= lang('appointment_date_and_time') ?>"  data-toggle="tooltip"
                         data-tippy-content="<?= lang('appointment_date_and_time') ?>"><?= lang('appointment_date_and_time') ?></span>
                </h3>
                <fieldset>
                    

                    <div class="fieldset-content">
                        
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

                    <div class="fieldset-footer">
                        <span>Step 2 of 4</span>
                    </div>

                </fieldset>

                <h3>
                    <span class="title_text" title="<?= lang('customer_information') ?>" data-toggle="tooltip"
                         data-tippy-content="<?= lang('customer_information') ?>"><?= lang('customer_information') ?></span>
                </h3>
                <fieldset>
                <div class="fieldset-content" style="padding-right:0px;">

                    <h4 style="display:none" class="text-center">Filter MRN Number</h4>
                    
                       <div style="display:none" class="row frame-content">
                               <div class="col-12 col-md-6">
                                     <div class="form-group">
                                <input type="text" id="mrn-search" placeholder="Search MRN Number"   maxlength="100"/>
                               
                                <input type="hidden" id="ajax-token" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                     </div>
                               </div>
                               <div class="col-12 col-md-6">
                                     <div class="form-group">
                                        <input type="button" value="search" id="search" onclick="get_data('<?php echo $this->security->get_csrf_hash(); ?>')" class="btn btn-info" />
                                     </div>
                               </div>
                       </div>
                  
                      
                    <div class="row  frame-content">
                        <div class="col-12 col-md-6">
                            
                            <!--   <div class="form-group">-->
                            <!--    <label for="last-name" class="control-label">-->
                            <!--        <? //echo "MRN Number"; ?>-->
                            <!--        <span class="text-danger">*</span>-->
                            <!--    </label>-->
                            <!--    <input type="text" id="last-name"  class="required" maxlength="10"/>-->
                            <!--</div>-->
                            
                            <div class="form-group">
                                <label for="first-name" class="control-label">
                                    <? echo "Name"; ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="first-name" required value="<? echo ($this->session->userdata('role_slug')=='customer') ? $this->session->userdata('Fname'):'';   ?>"   class="required " maxlength="20"/>
                                <input type="hidden" id="user-id" />
                            </div>
                            
                         
                            <div class="form-group">
                                <label for="email" class="control-label">
                                    <?= lang('email') ?>
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="email" required  value="<? echo ($this->session->userdata('role_slug')=='customer') ? $this->session->userdata('user_email'):'';   ?>"  class="required" maxlength="50"/>
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="control-label">
                                    <?= lang('phone_number') ?>
                                    <?= $require_phone_number === '1' ? '<span class="text-danger">*</span>' : '' ?>
                                </label>
                                <input type="text" id="phone-number" required value="<? echo ($this->session->userdata('role_slug')=='customer') ? $this->session->userdata('Mobile'):'';   ?>"   maxlength="10"
                                       class="<?= $require_phone_number === '1' ? 'required' : '' ?> "/>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="address" class="control-label">
                                    <?= lang('address') ?>
                                </label>
                                <input type="text" id="address" class="" maxlength="120"/>
                                <input  type="hidden" name="org" id="organization" value="<? echo $this->session->userdata('Organization'); ?>" />
                            </div>
                            <div class="form-group">
                                <label for="city" class="control-label">
                                    <?= lang('city') ?>
                                </label>
                                <input type="text" id="city" class="" maxlength="15"/>
                            </div>
                            <div class="form-group">
                                <label for="zip-code" class="control-label">
                                    <? echo "Pincode"; ?>
                                </label>
                                <input type="text" id="zip-code" class="" maxlength="9"/>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="control-label">
                                    <?= lang('notes') ?>
                                </label>
                                <textarea id="notes" maxlength="500" class="textarea" rows="1"></textarea>
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
                    </div>

                    <div class="fieldset-footer">
                        <span>Step 2 of 4</span>
                    </div>

                </fieldset>


                <h3>
                    <span class="title_text" title="<?= lang('appointment_confirmation') ?>" data-toggle="tooltip"
                         data-tippy-content="<?= lang('appointment_confirmation') ?>"><?= lang('appointment_confirmation') ?></span>
                </h3>
                <fieldset style="padding-top: 0;">
                    <div class="fieldset-content" style="padding-right:0">
                       <div class="frame-container">
                    <h2 class="frame-title"><?= lang('appointment_confirmation') ?></h2>
                    <div class="row frame-content">
                        <div id="appointment-details" class="col-12 col-md-6"></div>
                        <div id="customer-details" class="col-12 col-md-6"></div>
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
                                <input class="captcha-text form-control" type="text" value=""/>
                                <span id="captcha-hint" class="help-block" style="opacity:0">&nbsp;</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
  
                      <form action="<? echo site_url('Paytm/send_request'); ?>" id="book-appointment-form" style="display:inline-block" method="post">
                        <span >I have read and agree to the <a href='#' id="policy">Terms and Condtions</a></span>
                        <input type="checkbox" value="1" id="privacy"  style="width:auto;">
                        <button disabled="true" id="book-appointment-submit" type="submit" class="btn btn-success" style="display:none;">
                            <i class="fas fa-check-square mr-2"></i>
                            <? echo "Registration Fee"; //! $manage_mode ? lang('confirm') : lang('update') ?>
                        </button>
                        <input type="hidden" name="csrfToken"/>
                        <input type="hidden" name="post_data"/>
                         <input type="hidden" id="CUST_ID" name="CUST_ID" value="CUST001"> 
                        <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
                        <input type="hidden"  id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                        <input type="hidden" id="service_prive" name="PRICE" value="" />
                        <div class="form-group">
                           <input type="hidden" class="form-control" id="ORDER_ID" name="ORDER_ID" size="20" maxlength="20" autocomplete="off" tabindex="1" value="">
                           <input type="hidden" name="csrfToken" value="<?  echo $this->security->get_csrf_hash(); ?>" />
                           <div class="form-group">
                               <input type="hidden" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" autocomplete="off" tabindex="5" 

                               value="50">
                           </div>
                    </form>
                    </div>
                    </div>

                    <div class="fieldset-footer">
                        <span>Step 3 of 4</span>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>


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
        displayAnyProvider: <?= json_encode($display_any_provider) ?>,
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>
    };

    var EALang = <?= json_encode($this->lang->language) ?>;
    var availableLanguages = <?= json_encode(config('available_languages')) ?>;
</script>

<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
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
<script src="<?= asset_url('assets/js/notiflix-2.7.0.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/validate.js') ?>"></script>
<script src="<?= asset_url('assets/js/color.js') ?>"></script>
<script src="<?= asset_url('assets/js/jquery.validate.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/jquery.steps.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/main-form.js') ?>"></script>


<script>
    $(function () {
        FrontendBook.initialize(true, GlobalVariables.manageMode);
        GeneralFunctions.enableLanguageSelection($('#select-language'));
    });
</script>

<?php google_analytics_script();  ?>
</body>
</html>
     
