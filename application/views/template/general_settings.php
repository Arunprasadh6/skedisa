<style>
.nav-tabs .nav-link.active {
    background-color: #f1f1fc;
}

.nav-tabs-custom .nav-item .nav-link::after {
    border-bottom: 5px solid #5664d2;
}

.custom-accordion .card-header {
    border-radius: 5px;
    height: 70px;
    padding: 27px;
}

.error {
    color: red;
}

.m-0 {
    margin: 0 !important;
    color: #4e49d6;
    font-size: 15px;
    /* font-weight: 500; */
}

.text-dark .collapse {
    border-left: 4px solid #AFE2C8;
}

.text-dark {
    border-left: 4px solid #E2AFC1;
}

button.btn.cancel {
    background: #f1f5f7;
    color: #4e49d6;
    float: right;
    border: 1px solid #4e49d6;
}

button.btn.save {
    background: #4E49D6;
    border: 1px #BEBEBE;
    color: white;
    float: right;
}

.nav-tabs-custom {
    width: 850px;
}

#pro-img {
    width: 100px;
    border-radius: 12px;
}
</style>




<script>
var GlobalVariables = {
    csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
    availableProviders: <?= json_encode($available_providers) ?>,
        availableServices: <?= json_encode($available_services) ?>,
    baseUrl: <?= json_encode($base_url) ?>,
    dateFormat: <?= json_encode($date_format) ?>,
    firstWeekday: <?= json_encode($first_weekday); ?>,
    timeFormat: <?= json_encode($time_format) ?>,
    editAppointment: <?= json_encode($edit_appointment) ?>,       
        calendarView: <?= json_encode($calendar_view) ?>,
        customers: <?= json_encode($customers) ?>,
        timezones: <?= json_encode($timezones) ?>,
    userSlug: <?= json_encode($role_slug) ?>,
   
    color: <?= json_encode($color_code) ?>,
    image: <?= json_encode($image) ?>,
    days: <?= json_encode($get_days) ?>,
    count: <?= json_encode($get_count) ?>,
    settings: {
        system: <?= json_encode($system_settings) ?>,
        user: <?= json_encode($user_settings) ?>
    },
    user: {
        id: <?= $user_id ?>,
        email: <?= json_encode($user_email) ?>,
        timezone: <?= json_encode($timezone) ?>,
        role_slug: <?= json_encode($role_slug) ?>,
        privileges: <?= json_encode($privileges) ?>
    },
    providers: <?= json_encode($providers) ?>,
    services: <?= json_encode($services) ?>,

};

$(function() {
    BackendSettings.initialize(true);
   // BackendUsers.initialize(true);
});
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});


var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
var day = GlobalVariables['days'][0]['value'];
var cnt = GlobalVariables['count'][0]['value'];
</script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-fullcalendar/fullcalendar.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan_exceptions_modal.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar_default_view.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar_table_view.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar_google_sync.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar_appointments_modal.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar_unavailability_events_modal.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_calendar_api.js') ?>"></script>
<script src="<?= asset_url('assets/js/intlTelInput.js') ?>"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">


                        <div class="page-title-right">
                           
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="col-lg-12">
                <div class="card" style="background: #f1f1fc;">
                    <div class="card-body table-light">
                        <div class="row">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">General</span>
                                    </a>
                                </li>
                                <?php endif ?>
                                <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#business-logic" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Business Logic</span>
                                    </a>
                                </li>
                                <?php endif ?>
                                <?php if ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE): ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#current-user" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Current User</span>
                                    </a>
                                </li>
                                <?php endif ?>
                                <!-- <li>
                                    <button type="button" class="btn cancel">Cancel</button>&nbsp;
                                </li>&nbsp;&nbsp;&nbsp;&nbsp;
                                <li>
                                
                                    <button type="button" id="save-settings" class="save-settings btn btn-primary">Save</button>
                                </li> -->



                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div style="background:#f1f1fc" class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="general" role="tabpanel">
                    <div class="col-md-12">
                        <div id="accordion" class="custom-accordion">
                            <div class="card mb-1 shadow-none">
                                <a href="#collapseOne" class="text-dark" data-bs-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <div class="card-header" id="headingOne">
                                        <h6 class="m-0">
                                            General Settings&nbsp;&nbsp;
                                            <i class=" float-end  ri-arrow-down-s-line"></i>
                                            <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                                data-tippy-content="<?= lang('save') ?>">
                                                <i class="fas fa-check-square mr-2"></i>
                                                <?= lang('save') ?>
                                            </button>
                                        </h6>

                                    </div>

                                </a>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="company-name">
                                                                <? echo "Organization Name"; ?>
                                                            </label>
                                                            <input readonly id="company-name" data-field="company_name"
                                                                class="required form-control">
                                                            <span class="form-text text-muted">
                                                                <?= lang('company_name_hint') ?>
                                                            </span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="company-email">
                                                                <? echo "Organization Email"; ?>
                                                            </label>
                                                            <input id="company-email" data-field="company_email"
                                                                class=" form-control">
                                                            <span class="form-text text-muted">
                                                                <?= lang('company_email_hint') ?>
                                                            </span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="company-link">
                                                                <? echo "Organization Link"; ?>
                                                            </label>
                                                            <input id="company-link" data-field="company_link"
                                                                class=" form-control">
                                                            <span class="form-text text-muted">
                                                                <?= lang('company_link_hint') ?>
                                                            </span>
                                                        </div>
                                                        <div style="display:none" class="form-group">
                                                            <label for="date-format">
                                                                <?= lang('date_format') ?>
                                                            </label>
                                                            <select class="form-control" id="date-format"
                                                                data-field="date_format">
                                                                <option value="DMY">DMY</option>
                                                                <option value="MDY">MDY</option>
                                                                <option value="YMD">YMD</option>
                                                            </select>
                                                            <span class="form-text text-muted">
                                                                <?= lang('date_format_hint') ?>
                                                            </span>
                                                        </div>
                                                        <div style="display:none" class="form-group">
                                                            <label for="time-format">
                                                                <?= lang('time_format') ?>
                                                            </label>
                                                            <select class="form-control" id="time-format"
                                                                data-field="time_format">
                                                                <option value="<?= TIME_FORMAT_REGULAR ?>">H:MM AM/PM
                                                                </option>
                                                                <option value="<?= TIME_FORMAT_MILITARY ?>">HH:MM
                                                                </option>
                                                            </select>
                                                            <span class="form-text text-muted">
                                                                <?= lang('time_format_hint') ?>
                                                            </span>
                                                        </div>
                                                        <div style="display:none" class="form-group">
                                                            <label for="first-weekday">
                                                                <?= lang('first_weekday') ?>
                                                            </label>
                                                            <select class="form-control" id="first-weekday"
                                                                data-field="first_weekday">
                                                                <option value="sunday"><?= lang('sunday') ?></option>
                                                                <option value="monday"><?= lang('monday') ?></option>
                                                                <option value="tuesday"><?= lang('tuesday') ?></option>
                                                                <option value="wednesday"><?= lang('wednesday') ?>
                                                                </option>
                                                                <option value="thursday"><?= lang('thursday') ?>
                                                                </option>
                                                                <option value="friday"><?= lang('friday') ?></option>
                                                                <option value="saturday"><?= lang('saturday') ?>
                                                                </option>
                                                            </select>
                                                            <span class="help-block">
                                                                <?= lang('first_weekday_hint') ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <!--<div class="form-group">-->
                                                        <!--    <label for="google-analytics-code">-->
                                                        <!--        Google Analytics ID</label>-->
                                                        <!--    <input id="google-analytics-code" placeholder="UA-XXXXXXXX-XX"-->
                                                        <!--           data-field="google_analytics_code" class="form-control">-->
                                                        <!--    <span class="help-block">-->
                                                        <? # lang('google_analytics_code_hint') ?>
                                                        <!--    </span>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group">-->
                                                        <!--    <label for="api-token">API Token</label>-->
                                                        <!--    <input id="api-token" data-field="api_token" class="form-control">-->
                                                        <!--    <span class="help-block">-->
                                                        <!--        <? //lang('api_token_hint') ?>
                               </span>-->
                                                        <!--</div>-->

                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customer-notifications">
                                                                <label class="custom-control-label"
                                                                    for="customer-notifications">
                                                                    <?= lang('customer_notifications') ?>
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">
                                                                <?= lang('customer_notifications_hint') ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="require-captcha">
                                                                <label class="custom-control-label"
                                                                    for="require-captcha">
                                                                    CAPTCHA
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">
                                                                <?= lang('require_captcha_hint') ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="require-phone-number">
                                                                <label class="custom-control-label"
                                                                    for="require-phone-number">
                                                                    <?= lang('phone_number') ?>
                                                                </label>
                                                            </div>
                                                            <span class="help-block">
                                                                <?= lang('require_phone_number_hint') ?>
                                                            </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="display-any-provider">
                                                                <label class="custom-control-label"
                                                                    for="display-any-provider">
                                                                    <?= lang('any_provider') ?>
                                                                </label>
                                                            </div>
                                                            <span class="help-block">
                                                                <?= lang('display_any_provider_hint') ?>
                                                            </span>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
                <div class="tab-pane" id="business-logic" role="tabpanel">
                    <div id="accordion" class="custom-accordion">
                        <div class="card mb-1 shadow-none">
                            <a href="#schedule-service" class="text-dark collapsed" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="m-0">
                                        Standard Hours
                                        <i class=" float-end  ri-arrow-down-s-line"></i>

                                    </h6>
                                </div>
                            </a>
                            <div id="schedule-service" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                    <fieldset>

                                        <div class="row">
                                            <div class="col-12 col-sm-7 working-plan-wrapper">
                                                <h4><?= lang('working_plan') ?></h4>
                                                <button type="button"
                                                        class="save-settings btn btn-primary btn-sm mb-2"
                                                        data-tippy-content="<?= lang('save') ?>">
                                                        <i class="fas fa-check-square mr-2"></i>
                                                        <?= lang('save') ?>
                                                    </button><br>
                                                <span class="form-text text-muted mb-4">
                                                    <?= lang('edit_working_plan_hint') ?>
                                                </span>

                                                <table class="working-plan table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><?= lang('day') ?></th>
                                                            <th><?= lang('start') ?></th>
                                                            <th><?= lang('end') ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Dynamic Content -->
                                                    </tbody>
                                                </table>

                                                <div class="text-right">
                                                    <button class="btn btn-outline-secondary"
                                                        id="apply-global-working-plan" type="button">
                                                        <i class="fas fa-check"></i>
                                                        <?= lang('apply_to_all_providers') ?>
                                                    </button>
                                                </div>
                                                


                                                <br>

                                            </div>

                                            <div class="col-12 col-sm-5 breaks-wrapper">
                                                <h4><?= lang('breaks') ?></h4>

                                                <span class="form-text text-muted">
                                                    <?= lang('edit_breaks_hint') ?>
                                                </span>

                                                <div class="mt-2">
                                                    <button type="button" class="add-break btn btn-primary">
                                                        <i class="fas fa-plus-square"></i>
                                                        <?= lang('add_break'); ?>
                                                    </button>
                                                </div>

                                                <br>

                                                <table class="breaks table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><?= lang('day') ?></th>
                                                            <th><?= lang('start') ?></th>
                                                            <th><?= lang('end') ?></th>
                                                            <th><?= lang('actions') ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Dynamic Content -->
                                                    </tbody>
                                                </table>


                                            </div>

                                        </div>

                                    </fieldset>
                                </div>
                            </div>
                        </div>



                        <div class="card mb-1 shadow-none">
                            <a href="#business" class="text-dark collapsed" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="m-0">
                                        Business Logic &nbsp;&nbsp;
                                        <i class=" float-end  ri-arrow-down-s-line"></i>
                                        <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                            data-tippy-content="<?= lang('save') ?>">
                                            <i class="fas fa-check-square mr-2"></i>
                                            <?= lang('save') ?>
                                        </button>
                                    </h6>

                                </div>
                            </a>
                            <div id="business" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?= lang('book_advance_timeout') ?></h4>
                                                <div class="form-group">
                                                    <label for="book-advance-timeout"
                                                        class="control-label"><?= lang('timeout_minutes') ?></label>
                                                    <input id="book-advance-timeout" data-field="book_advance_timeout"
                                                        class="form-control" type="number" min="15">
                                                    <p class="form-text text-muted">
                                                        <?= lang('book_advance_timeout_hint') ?>
                                                    </p>
                                                </div>
                                                <h4>Online Availablity</h4>
                                                <div class="form-group">
                                                    <select name="availablity" id="availablity" data-field="availablity"
                                                        class="form-control">
                                                        <option>Select Availablity</option>
                                                        <option value="1">All</option>
                                                        <option value="2">Partial</option>
                                                        <option value="1hr">Every 1 Hour</option>
                                                    </select>
                                                    <input type="hidden" class="form-control" data-field="company_date"
                                                        name="company_date" id="comp_date" />
                                                </div> <br>
                                                <h4>Refund Percentage</h4>
                                                <div class="form-group">
                                                    <input id="refund_per" data-field="refund_percentage" type="text"
                                                        maxlength="3"
                                                        onkeyup="this.value=this.value.replace((/[^0-9%]/g),'')"
                                                        class="form-control"
                                                        placeholder="Enter Hours in Number (50%)" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="btn btn-info" for="img-upload">Upload
                                                        Image</label>
                                                    <input type="hidden"
                                                        value="<?php echo $this->security->get_csrf_hash(); ?>"
                                                        id="tok" />
                                                    <input type="file" name="images" style="display:none"
                                                        id="img-upload" />
                                                    <img src="" style="border-radius:10px;" id="get-img" alt="image"
                                                        height="100px" width="100px" />
                                                </div>

                                            </div>
                                            </form>
                                            <div class="col-md-6">
                                                <h4>Booking days</h4>
                                                <div class="form-group">
                                                    <label>Enter No of days</label>
                                                    <input type="text" maxlength="3" data-field="company_date"
                                                        onkeyup="this.value=this.value.replace((/[^0-9]/g),'')"
                                                        class="form-control" name="company_date" id="comp_num"
                                                        placeholder="Enter Number of Days" />
                                                </div> <br>
                                                <h4>Refund Hours</h4>
                                                <div class="form-group">
                                                    <input id="refund_hour" data-field="refund_hour" type="text"
                                                        maxlength="2"
                                                        onkeyup="this.value=this.value.replace((/[^0-9]/g),'')"
                                                        class="form-control" placeholder="Enter Hours in Number (24)" />
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <label for="display-color">
                                                            Change Color
                                                        </label>
                                                    </div>
                                                    <span class="help-block">
                                                        <input type="color" id="display-color"
                                                            onchange="changecolor(this.value);">
                                                        <span id="color1" style="padding:1%;color:#fff;"></span>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="tab-pane" id="current-user" role="tabpanel">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="row">

                                <fieldset class="col-12 col-sm-6 personal-info-wrapper">
                                    <legend class="border-bottom mb-4">
                                        <?= lang('personal_information') ?>
                                        <?php if ($privileges[PRIV_USER_SETTINGS]['edit'] == TRUE): ?>
                                        <button type="button" class="save-settings-user btn btn-primary btn-sm mb-2"
                                            data-tippy-content="<?= lang('save') ?>">
                                            <i class="fas fa-check-square mr-2"></i>
                                            <?= lang('save') ?>
                                        </button>
                                        <?php endif ?>
                                    </legend>

                                    <input type="hidden" id="user-id">

                                    <div class="form-group">
                                        <label for="first-name"><?= lang('first_name') ?> <span
                                                class="text-danger">*</span></label>
                                        <input id="first-name" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                            class="form-control required">
                                    </div>

                                    <div class="form-group">
                                        <label for="last-name"><?= lang('last_name') ?> <span
                                                class="text-danger">*</span></label>
                                        <input id="last-name" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                            class="form-control required">
                                    </div>

                                    <div class="form-group">
                                        <label for="email"><?= lang('email') ?> </label>
                                        <input id="email" class="form-control ">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone-number"><?= lang('phone_number') ?> <span
                                                class="text-danger">*</span></label>
                                        <input id="phone-number-cnt" maxlength="13"
                                            onkeyup="this.value=this.value.replace(/[^+0-9]/g,'')"
                                            class="form-control required">
                                    </div>

                                    <!-- <div class="form-group">
                            <label for="mobile-number"><? // lang('mobile_number') ?></label>
                            <input id="mobile-number" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control">
                        </div> -->

                                    <div class="form-group">
                                        <label for="address"><?= lang('address') ?></label>
                                        <input id="address" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="city"><?= lang('city') ?></label>
                                        <input id="city" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="state"><?= lang('state') ?></label>
                                        <input id="state" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="zip-code">
                                            <?php echo "Pincode"; ?>
                                        </label>
                                        <input id="zip-code" maxlength="6"
                                            onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="notes"><?= lang('notes') ?></label>
                                        <textarea id="notes" class="form-control" rows="3"></textarea>
                                    </div>
                                </fieldset>

                                <fieldset class="col-12 col-sm-6 miscellaneous-wrapper">
                                    <legend class="border-bottom mb-4"><?= lang('system_login') ?></legend>

                                    <div class="form-group">
                                        <label for="username"><?= lang('username') ?> <span
                                                class="text-danger">*</span></label>
                                        <input id="username" class="form-control required">
                                    </div>

                                    <div class="form-group">
                                        <label for="password"><?= lang('password') ?></label>
                                        <input type="password" id="password" class="form-control"
                                            autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <label for="retype-password"><?= lang('retype_password') ?></label>
                                        <input type="password" id="retype-password" class="form-control"
                                            autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <label for="calendar-view"><?= lang('calendar') ?> <span
                                                class="text-danger">*</span></label>
                                        <select id="calendar-view" class="form-control required">
                                            <option value="default">Default</option>
                                            <option value="table">Table</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="timezone"><?= lang('timezone') ?></label>
                                        <?= render_timezone_dropdown('id="timezone" class="form-control"') ?>
                                    </div>

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="user-notifications">
                                        <label class="custom-control-label" for="user-notifications">
                                            <?= lang('receive_notifications') ?>
                                        </label>
                                    </div>
                                </fieldset>




                            </div>

                        </div>
                    </div>
                </div>

            </div>




            <!-- end row -->


            <!-- end row -->


            <!-- end row -->
        </div>

    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © Gravitykey
                </div>
                <!-- <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Cr with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                </div>
            </div> -->
            </div>
        </div>
    </footer>

</div>

<script>
document.getElementById('display-color').value = color;
document.getElementById('color1').style.background = color;
document.getElementById('color1').innerHTML = color;

if (GlobalVariables['image'] == "user.jpg") {
    document.getElementById('get-img').src = "<?php echo base_url('assets/img/upload_img/') ?>" +
        GlobalVariables['image'];
} else {
    document.getElementById('get-img').src = "<?php echo base_url('assets/img/upload_img/') ?>" + img;
}






function changecolor(e) {
    document.getElementById('color1').style.background = e;
    document.getElementById('color1').innerHTML = e;
    var token = GlobalVariables['csrfToken'];

    $.post('add_color', {
        color: e,
        'csrfToken': token
    }, function(data) {

        Notiflix.Notify.Success(data + ' Successfully');
        window.location.reload();
        //console.log(data);
    })
}



$('.save-settings-user').on('click', function() {


    

    var user = {
            id: $('#user-id').val(),
            first_name: $('#first-name').val(),
            MRN: $('#last-name').val(),
            email: $('#email').val(),
            mobile_number: $('#mobile-number').val(),
            phone_number: $('#phone-number-cnt').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            zip_code: $('#zip-code').val(),
            notes: $('#notes').val(),
            timezone: $('#timezone').val(),
            settings: {
                username: $('#username').val(),
                notifications: $('#user-notifications').prop('checked'),
                calendar_view: $('#calendar-view').val()
            }
        };

        if ($('#password').val()) {
            user.settings.password = $('#password').val();
        }
    var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_save_settings';

var data = {
    csrfToken: GlobalVariables.csrfToken,
    type: 'SETTINGS_USER',
    settings: JSON.stringify(user)
};
  $.post(url, data)
        .done(function(response) {
            Notiflix.Notify.Success('Successfully Saved');
            // setTimeout(() => {
            //     window.location.reload();
            // }, 1000);

        });

});

$('#pro-img').click(function() {
    $('#img-profile').trigger('click');
    //     setTimeout(() => {
    //     $('#imnm').text($('#img-profile').val());
    //  }, 2000);
});

function edit_provider(id) {
    var url = GlobalVariables.baseUrl + '/index.php/backend/get_provider_data';
    $('#img').css("display", "block");
    var data = {
        csrfToken: GlobalVariables.csrfToken,
        id: id
    };
    $.post(url, data)
        .done(function(response) {
            var rows = JSON.parse(response);
            //   console.log(rows);
            $('.bs-example-modal-lg').modal('show');
            $('#provider-first-name').val(rows[0].first_name);
            $('#provider-last-name').val(rows[0].MRN);
            $('#provider-email').val(rows[0].email);
            $('#provider-mobile-number').val();
            $('#provider-phone-number').val(rows[0].phone_number);
            $('#provider-address').val(rows[0].address);
            $('#provider-city').val(rows[0].city);
            $('#provider-state').val(rows[0].state);
            $('#provider-zip-code').val(rows[0].zipcode);
            $('#provider-notes').val(rows[0].notes);
            $('#provider-timezone').val(rows[0].timezone);
            $('#provider-org').text();
            $('#provider-id').val(rows[0].id);
            if (rows[0].Images.length > 0) {
                document.getElementById('pro-img').src = "<?php echo base_url('assets/img/upload_img/') ?>" + rows[
                    0].Images;
            } else {
                document.getElementById('pro-img').src = "<?php echo base_url('assets/img/upload_img/user.jpg') ?>";
            }


            $('#pro-img').src = img;
            $('#provider-username').val(rows[0].settings.username);

            $('#provider-notifications').val(rows[0].settings.calendar_view.notifications);
            $('#provider-calendar-view').val(rows[0].settings.calendar_view);
            var workingPlan = $.parseJSON(rows[0].settings.working_plan);
            BackendUsers.wp.setup(workingPlan);
            rows[0].services.forEach(function(sid) {
                var $checkbox = $('#provider-services input[data-id="' + sid + '"]');
                if (!$checkbox.length) {
                    return;
                }
                $checkbox.prop('checked', true);

            });
        });
}


</script>
<script>
    var input = document.querySelector("#phone-number-cnt");
    window.intlTelInput(input,({
      // options here
    }));
$(document).ready(function() {
    // $('#data-table').DataTable({
    //     "lengthMenu": [[10, 25,], [10, 25]]
    // });

    $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
         // $('#phone-number-cnt').val("");
          $('#phone-number-cnt').val("+"+countryCode+" "+ $('#phone-number-cnt').val());
       });
});
</script>