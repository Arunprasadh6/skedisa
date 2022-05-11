<script src="<?= asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
<script>
var GlobalVariables = {
    csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
    baseUrl: <?= json_encode($base_url) ?>,
    dateFormat: <?= json_encode($date_format) ?>,
    firstWeekday: <?= json_encode($first_weekday); ?>,
    timeFormat: <?= json_encode($time_format) ?>,
    userSlug: <?= json_encode($role_slug) ?>,
    timezones: <?= json_encode($timezones) ?>,
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
    }

};

$(function() {
    BackendSettings.initialize(true);
});


var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
var day = GlobalVariables['days'][0]['value'];
var cnt = GlobalVariables['count'][0]['value'];
</script>

<div id="settings-page" class="container-fluid backend-page">
    <ul class="nav nav-pills">
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
        <li class="nav-item">
            <a class="nav-link" href="#general" data-toggle="tab"><?= lang('general') ?></a>
        </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
        <li class="nav-item">
            <a class="nav-link" href="#business-logic" data-toggle="tab"><?= lang('business_logic') ?></a>
        </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE): ?>
        <li class="nav-item">
            <a class="nav-link" href="#legal-contents" data-toggle="tab"><?= lang('legal_contents') ?></a>
        </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE): ?>
        <li class="nav-item">
            <a class="nav-link" href="#current-user" data-toggle="tab"><?= lang('current_user') ?></a>
        </li>
        <?php endif ?>
        <?php if ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE): ?>
        <li class="nav-item">
            <a class="nav-link" href="#coupon-tab" data-toggle="tab">Coupon</a>
        </li>
        <?php endif ?>

    </ul>

    <div class="tab-content">

        <!-- GENERAL TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane active <?= $hidden ?>" id="general">
            <form enctype="multipart/form-data">
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('general_settings') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                        <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                            data-tippy-content="<?= lang('save') ?>">
                            <i class="fas fa-check-square mr-2"></i>
                            <?= lang('save') ?>
                        </button>
                        <?php endif ?>
                    </legend>

                    <div class="wrapper row">
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
                                <input id="company-email" data-field="company_email" class=" form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_email_hint') ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="company-link">
                                    <? echo "Organization Link"; ?>
                                </label>
                                <input id="company-link" data-field="company_link" class=" form-control">
                                <span class="form-text text-muted">
                                    <?= lang('company_link_hint') ?>
                                </span>
                            </div>
                            <div style="display:none" class="form-group">
                                <label for="date-format">
                                    <?= lang('date_format') ?>
                                </label>
                                <select class="form-control" id="date-format" data-field="date_format">
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
                                <select class="form-control" id="time-format" data-field="time_format">
                                    <option value="<?= TIME_FORMAT_REGULAR ?>">H:MM AM/PM</option>
                                    <option value="<?= TIME_FORMAT_MILITARY ?>">HH:MM</option>
                                </select>
                                <span class="form-text text-muted">
                                    <?= lang('time_format_hint') ?>
                                </span>
                            </div>
                            <div style="display:none" class="form-group">
                                <label for="first-weekday">
                                    <?= lang('first_weekday') ?>
                                </label>
                                <select class="form-control" id="first-weekday" data-field="first_weekday">
                                    <option value="sunday"><?= lang('sunday') ?></option>
                                    <option value="monday"><?= lang('monday') ?></option>
                                    <option value="tuesday"><?= lang('tuesday') ?></option>
                                    <option value="wednesday"><?= lang('wednesday') ?></option>
                                    <option value="thursday"><?= lang('thursday') ?></option>
                                    <option value="friday"><?= lang('friday') ?></option>
                                    <option value="saturday"><?= lang('saturday') ?></option>
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
                                    <input type="checkbox" class="custom-control-input" id="customer-notifications">
                                    <label class="custom-control-label" for="customer-notifications">
                                        <?= lang('customer_notifications') ?>
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('customer_notifications_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="require-captcha">
                                    <label class="custom-control-label" for="require-captcha">
                                        CAPTCHA
                                    </label>
                                </div>
                                <span class="form-text text-muted">
                                    <?= lang('require_captcha_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="require-phone-number">
                                    <label class="custom-control-label" for="require-phone-number">
                                        <?= lang('phone_number') ?>
                                    </label>
                                </div>
                                <span class="help-block">
                                    <?= lang('require_phone_number_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="display-any-provider">
                                    <label class="custom-control-label" for="display-any-provider">
                                        <?= lang('any_provider') ?>
                                    </label>
                                </div>
                                <span class="help-block">
                                    <?= lang('display_any_provider_hint') ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="display-color">
                                        Change Color
                                    </label>
                                </div>
                                <span class="help-block">
                                    <input type="color" id="display-color" onchange="changecolor(this.value);">
                                    <span id="color1" style="padding:1%;color:#fff;"></span>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="btn btn-info" for="img-upload">Upload Image</label>
                                <input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" id="tok" />
                                <input type="file" name="images" style="display:none" id="img-upload" />
                                <img src="" style="border-radius:10px;" id="get-img" alt="image" height="100px"
                                    width="100px" />
                            </div>



                        </div>
                    </div>
                </fieldset>
            </form>
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
        </script>
        <!-- BUSINESS LOGIC TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="business-logic">
            <form>
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('business_logic') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                        <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                            data-tippy-content="<?= lang('save') ?>">
                            <i class="fas fa-check-square mr-2"></i>
                            <?= lang('save') ?>
                        </button>
                        <?php endif ?>
                    </legend>

                    <div class="row">
                        <div class="col-12 col-sm-7 working-plan-wrapper">
                            <h4><?= lang('working_plan') ?></h4>
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
                                <button class="btn btn-outline-secondary" id="apply-global-working-plan" type="button">
                                    <i class="fas fa-check"></i>
                                    <?= lang('apply_to_all_providers') ?>
                                </button>
                            </div>

                            <br>

                            <h4><?= lang('book_advance_timeout') ?></h4>
                            <div class="form-group">
                                <label for="book-advance-timeout"
                                    class="control-label"><?= lang('timeout_minutes') ?></label>
                                <input id="book-advance-timeout" data-field="book_advance_timeout" class="form-control"
                                    type="number" min="15">
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
                                <input type="hidden" class="form-control" data-field="company_date" name="company_date"
                                    id="comp_date" />
                            </div>
                            <h4>Booking days</h4>
                            <div class="form-group">
                                <input type="text" maxlength="3" data-field="company_date"
                                    onkeyup="this.value=this.value.replace((/[^0-9]/g),'')" class="form-control"
                                    name="company_date" id="comp_num" placeholder="Enter Number of Days" />
                            </div>



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

                            <h4>Refund Hours</h4>
                            <div class="form-group">
                                <input id="refund_hour" data-field="refund_hour" type="text" maxlength="2"
                                    onkeyup="this.value=this.value.replace((/[^0-9]/g),'')" class="form-control"
                                    placeholder="Enter Hours in Number (24)" />
                            </div>
                            <h4>Refund Percentage</h4>
                            <div class="form-group">
                                <input id="refund_per" data-field="refund_percentage" type="text" maxlength="3"
                                    onkeyup="this.value=this.value.replace((/[^0-9%]/g),'')" class="form-control"
                                    placeholder="Enter Hours in Number (50%)" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <script>
        // document.getElementById('comp_date').value=day;
        document.getElementById('comp_num').value = cnt;
        var date = new Date();
        date.setDate(date.getDate() + cnt);
        </script>

        <!-- LEGAL CONTENTS TAB -->

        <?php $hidden = ($privileges[PRIV_SYSTEM_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="legal-contents">
            <form>
                <fieldset>
                    <legend class="border-bottom mb-4">
                        <?= lang('legal_contents') ?>
                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                        <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                            data-tippy-content="<?= lang('save') ?>">
                            <i class="fas fa-check-square mr-2"></i>
                            <?= lang('save') ?>
                        </button>
                        <?php endif ?>
                    </legend>

                    <div class="row">
                        <div class="col-12 col-sm-11 col-md-10 col-lg-9">
                            <h4><?= lang('cookie_notice') ?></h4>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="display-cookie-notice">
                                    <label class="custom-control-label" for="display-cookie-notice">
                                        <?= lang('display_cookie_notice') ?>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?= lang('cookie_notice_content') ?></label>
                                <textarea id="cookie-notice-content" cols="30" rows="10" class="form-group"></textarea>
                            </div>

                            <br>

                            <h4><?= lang('terms_and_conditions') ?></h4>

                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                            id="display-terms-and-conditions">
                                        <label class="custom-control-label" for="display-terms-and-conditions">
                                            <?= lang('display_terms_and_conditions') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?= lang('terms_and_conditions_content') ?></label>
                                <textarea id="terms-and-conditions-content" cols="30" rows="10"
                                    class="form-group"></textarea>
                            </div>

                            <h4><?= lang('privacy_policy') ?></h4>

                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="display-privacy-policy">
                                        <label class="custom-control-label" for="display-privacy-policy">
                                            <?= lang('display_privacy_policy') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?= lang('privacy_policy_content') ?></label>
                                <textarea id="privacy-policy-content" cols="30" rows="10" class="form-group"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- CURRENT USER TAB -->

        <?php $hidden = ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="current-user">
            <form>
                <div class="row">
                    <fieldset class="col-12 col-sm-6 personal-info-wrapper">
                        <legend class="border-bottom mb-4">
                            <?= lang('personal_information') ?>
                            <?php if ($privileges[PRIV_USER_SETTINGS]['edit'] == TRUE): ?>
                            <button type="button" class="save-settings btn btn-primary btn-sm mb-2"
                                data-tippy-content="<?= lang('save') ?>">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= lang('save') ?>
                            </button>
                            <?php endif ?>
                        </legend>

                        <input type="hidden" id="user-id">

                        <div class="form-group">
                            <label for="first-name"><?= lang('first_name') ?> <span class="text-danger">*</span></label>
                            <input id="first-name" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="last-name"><?= lang('last_name') ?> <span class="text-danger">*</span></label>
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
                            <input id="phone-number" maxlength="10"
                                onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control required">
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
                                <? echo "Pincode"; ?>
                            </label>
                            <input id="zip-code" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="notes"><?= lang('notes') ?></label>
                            <textarea id="notes" class="form-control" rows="3"></textarea>
                        </div>
                    </fieldset>

                    <fieldset class="col-12 col-sm-6 miscellaneous-wrapper">
                        <legend class="border-bottom mb-4"><?= lang('system_login') ?></legend>

                        <div class="form-group">
                            <label for="username"><?= lang('username') ?> <span class="text-danger">*</span></label>
                            <input id="username" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label for="password"><?= lang('password') ?></label>
                            <input type="password" id="password" class="form-control" autocomplete="new-password">
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
            </form>
        </div>

        <!-- ABOUT TAB -->

        <?php $hidden = ($privileges[PRIV_USER_SETTINGS]['view'] == TRUE) ? '' : 'd-none' ?>
        <div class="tab-pane <?= $hidden ?>" id="coupon-tab">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-5">


                    <h3>Coupon</h3>
                    <div class="results"></div>
                </div>

                <div class="record-details column col-12 col-md-5">
                    <div class="btn-toolbar mb-4">
                        <div class="add-edit-delete-group btn-group">
                            <button id="add-coupon" class="btn btn-primary">
                                <i class="fas fa-plus-square mr-2"></i>
                                <?= lang('add') ?>
                            </button>
                            <button id="edit-coupon" class="btn btn-outline-secondary" disabled="disabled">
                                <i class="fas fa-edit mr-2"></i>
                                <?= lang('edit') ?>
                            </button>
                            <button id="delete-coupon" class="btn btn-outline-secondary" disabled="disabled">
                                <i class="fas fa-trash-alt mr-2"></i>
                                <?= lang('delete') ?>
                            </button>
                        </div>

                        <div class="save-cancel-group btn-group" style="display:none;">
                            <button id="save-service" class="btn btn-primary">
                                <i class="fas fa-check-square mr-2"></i>
                                <?= lang('save') ?>
                            </button>
                            <button id="cancel-service" class="btn btn-outline-secondary">
                                <i class="fas fa-ban mr-2"></i>
                                <?= lang('cancel') ?>
                            </button>
                        </div>
                    </div>

                    <h3><?= lang('details') ?></h3>
                    <span id="service-org"
                        style="display:none"><?php echo $this->session->userdata('Organization'); ?></span>
                    <div class="form-message alert" style="display:none;"></div>

                    <input type="hidden" id="coupon-id">

                    <div class="form-group">
                        <label for="service-name">
                            Coupon name
                            <span class="text-danger">*</span>
                        </label>
                        <input id="coupon-name" placeholder="Enter Coupon Name" class="form-control required"
                            maxlength="128">
                    </div>

                    <div class="form-group">
                        <label for="service-name">
                            Coupon Code
                            <button class="filter btn btn-outline-secondary" id="gen-coupon" type="submit">
                                <i class="fas fa-redo-alt"></i>
                            </button>
                            <span class="text-danger">*</span>
                        </label>
                        <input readonly id="coupon-code" placeholder="Generate Code" class="form-control required"
                            maxlength="128">
                    </div>

                    <div class="form-group">
                        <label for="service-name">
                            Coupon Start Date
                            <span class="text-danger">*</span>
                        </label>
                        <input type="date" id="start" class="form-control required" maxlength="128">
                    </div>

                    <div class="form-group">
                        <label for="service-name">
                            Coupon End Date
                            <span class="text-danger">*</span>
                        </label>
                        <input type="date" id="end" class="form-control required" maxlength="128">
                    </div>

                    <div class="form-group">
                        <label for="service-name">
                            Coupon Uses Count
                            <span class="text-danger">*</span>
                        </label>
                        <input id="coupon-count" placeholder="Enter Coupon Count" class="form-control required"
                            maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="service-name">
                            Coupon Percentage
                            <span class="text-danger">*</span>
                        </label>
                        <input id="coupon-customer" placeholder="Enter Percentage 50" class="form-control required"
                            maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="service-name">
                            Coupon Status
                            <span class="text-danger">*</span>
                        </label>
                        <select name="availablity" id="status" class="form-control">
                            <option>Select Status</option>
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                        </select>
                    </div>



                </div>
            </div>



        </div>



    </div>
</div>
<script>
$('#gen-coupon').on("click", function(data) {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charactersLength = characters.length;

    var randomstring = '';
    //loop to select a new character in each iteration
    for (var i = 0; i < 7; i++) {
        var rnum = Math.floor(Math.random() * characters.length);
        randomstring += characters.substring(rnum, rnum + 1);
    }
    $('#coupon-code').val(randomstring);

})
</script>