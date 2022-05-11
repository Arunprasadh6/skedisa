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

#profile-img {
    width: 100px;
    border-radius: 12px;
}
</style>
<script src="<?= asset_url('assets/js/backend_users_admins.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users_providers.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users_secretaries.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan_exceptions_modal.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>

<script src="<?php echo asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?php echo asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?php echo asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
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
    },
    providers: <?= json_encode($providers) ?>, 
    services: <?= json_encode($services) ?>,

};

$(function() {
    BackendSettings.initialize(true);
    BackendUsers.initialize(true);
});


var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
var day = GlobalVariables['days'][0]['value'];
var cnt = GlobalVariables['count'][0]['value'];
</script>

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
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Provider Details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Schedule</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Password & Access</span>
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="btn cancel">Cancel</button>&nbsp;
                                </li>&nbsp;&nbsp;&nbsp;&nbsp;
                                <li>
                                    <button type="button" id="save-provider" class="btn btn-primary">Save</button>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="list-view">
                <div class="card">


                    <!-- Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="col-md-12">
                                <div id="accordion" class="custom-accordion">
                                    <div class="card mb-1 shadow-none">
                                        <a href="#collapseOne" class="text-dark" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <div class="card-header" id="headingOne">
                                                <h6 class="m-0">
                                                    Provider Information
                                                                                                      
                                                    <!-- <i id="save_provider" class=" float-end mdi mdi-pencil font-size-18"></i> -->
                                                    <i class=" float-end  ri-arrow-down-s-line"></i>                                                   
                                                </h6> 
                                                
                                            </div>
                                            
                                        </a>
                                       
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="file" name="image" style="display:none"
                                                                    id="img-profile" />
                                                                <img src="<?php echo base_url('assets/img/user.jpg'); ?>"
                                                                    id="profile-img" for="img-profile" /><br>
                                                                <label>upload picture</label>

                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="provider-notifications">
                                                                    <label class="custom-control-label"
                                                                        for="provider-notifications">
                                                                        <?= lang('receive_notifications') ?>
                                                                    </label>
                                                                </div>
                                                               

                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                <input type="hidden" id="provider-id" class="record-id" value="" >
                                                                    <label>First Name <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" id="provider-first-name" class="form-control"
                                                                        placeholder="First Name" />
                                                                        <span style="display:none" id="provider-org"><?php  echo $this->session->userdata('Organization'); ?></span>
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="provider-phone-number">
                                                                        primary Mobile
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input id="provider-phone-number"
                                                                        class="form-control required" maxlength="10">
                                                                    <span id="pro_mno_error"
                                                                        style="display:none;color:red">Number is Already
                                                                        Available Please Change Number</span>
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="provider-city">
                                                                        <?= lang('city') ?>
                                                                    </label>
                                                                    <input id="provider-city"
                                                                        onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                        class="form-control" maxlength="256">
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="provider-city">
                                                                        Address
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Address" />
                                                                </div>
                                                            </div><br>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Last Name <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" id="provider-last-name" class="form-control"
                                                                        placeholder="Last Name" id="" />
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="provider-email">
                                                                        <?= lang('email') ?>
                                                                    </label>
                                                                    <input id="provider-email" class="form-control "
                                                                        max="512">
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="provider-state">
                                                                        <?= lang('state') ?>
                                                                    </label>
                                                                    <input id="provider-state"
                                                                        onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                        class="form-control" maxlength="256">
                                                                </div><br>
                                                                <div class="form-group">
                                                                    <label for="provider-city">
                                                                        Postal Code
                                                                    </label>
                                                                    <input type="text" id="provider-zip-code"
                                                                        class="form-control" placeholder="Address" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="provider-notes">
                                                                            <?= lang('notes') ?>
                                                                        </label>
                                                                        <textarea id="provider-notes"
                                                                            class="form-control" rows="3"></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none">
                                        <a href="#collapseTwo" class="text-dark collapsed" data-bs-toggle="collapse"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <div class="card-header" id="headingTwo">
                                                <h6 class="m-0">
                                                    Services
                                                    <i class=" float-end  ri-arrow-down-s-line"></i>
                                                </h6>
                                            </div>
                                        </a>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-bs-parent="#accordion">
                                            <div class="card-body">
                                            <h5 id='sid'><?= lang('services') ?><span
                                                                        class="text-danger">*</span></h5>
                                                                <input type="hidden" id="service-org" value="" />
                                                                <div id="provider-services"
                                                                    class="card card-body bg-light border-light">
                                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="tab-pane" id="profile1" role="tabpanel">
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
                                                <form>
                                                    <legend class="border-bottom mb-4">

                                                        <?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                                                        <button type="button"
                                                            class="save-settings btn btn-primary btn-sm mb-2"
                                                            data-tippy-content="<?= lang('save') ?>">
                                                            <i class="fas fa-check-square mr-2"></i>
                                                            <?= lang('save') ?>
                                                        </button>
                                                        <?php endif ?>
                                                    </legend>

                                                    <div class="row">
                                                        <div class="col-12 col-sm-7 working-plan-wrapper">
                                                            <h4>Standard Hours</h4>


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

                                                    </div>
                                                </form>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 shadow-none">
                                    <a href="#breaks" class="text-dark collapsed" data-bs-toggle="collapse"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="m-0">
                                                Breaks
                                                <i class=" float-end  ri-arrow-down-s-line"></i>
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="breaks" class="collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
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
                                    </div>
                                </div>
                                <div class="card mb-1 shadow-none">
                                    <a href="#exception" class="text-dark collapsed" data-bs-toggle="collapse"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="m-0">
                                                Exceptions
                                                <i class=" float-end  ri-arrow-down-s-line"></i>
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="exception" class="collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
                                          
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-1 shadow-none">
                                    <a href="#business" class="text-dark collapsed" data-bs-toggle="collapse"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="m-0">
                                                Business Logic
                                                <i class=" float-end  ri-arrow-down-s-line"></i>
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
                                                            <input id="book-advance-timeout"
                                                                data-field="book_advance_timeout" class="form-control"
                                                                type="number" min="15">
                                                            <p class="form-text text-muted">
                                                                <?= lang('book_advance_timeout_hint') ?>
                                                            </p>
                                                        </div>
                                                        <h4>Online Availablity</h4>
                                                        <div class="form-group">
                                                            <select name="availablity" id="availablity"
                                                                data-field="availablity" class="form-control">
                                                                <option>Select Availablity</option>
                                                                <option value="1">All</option>
                                                                <option value="2">Partial</option>
                                                                <option value="1hr">Every 1 Hour</option>
                                                            </select>
                                                            <input type="hidden" class="form-control"
                                                                data-field="company_date" name="company_date"
                                                                id="comp_date" />
                                                        </div> <br>
                                                        <h4>Refund Percentage</h4>
                                                        <div class="form-group">
                                                            <input id="refund_per" data-field="refund_percentage"
                                                                type="text" maxlength="3"
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
                                                            <img src="" style="border-radius:10px;" id="get-img"
                                                                alt="image" height="100px" width="100px" />
                                                        </div>

                                                    </div>

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
                                                                class="form-control"
                                                                placeholder="Enter Hours in Number (24)" />
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
                        <div class="tab-pane" id="messages1" role="tabpanel">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" id="provider-username" class="form-control" placeholder="Name" />
                                        </div>
                                    </div>
                                </div><br>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"  id="provider-password" class="form-control" placeholder="Password" />
                                    </div>
                                </div><br>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" id="provider-password-confirm" class="form-control" placeholder="Confirm Password" />
                                    </div>
                                </div>



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

$('#save-provider').on('click',function() {
            var provider = {
                first_name: $('#provider-first-name').val(),
                MRN: $('#provider-last-name').val(),
                email: $('#provider-email').val(),
                mobile_number: $('#provider-mobile-number').val(),
                phone_number: $('#provider-phone-number').val(),
                address: $('#provider-address').val(),
                city: $('#provider-city').val(),
                state: $('#provider-state').val(),
                zip_code: $('#provider-zip-code').val(),
                notes: $('#provider-notes').val(),
                timezone: $('#provider-timezone').val(),
                Organization: $('#provider-org').text(),
                settings: {
                    username: $('#provider-username').val(),
                    working_plan: JSON.stringify(BackendUsers.wp.get()),
                    working_plan_exceptions: JSON.stringify(BackendUsers.wp.getWorkingPlanExceptions()),
                    notifications: $('#provider-notifications').prop('checked'),
                    calendar_view: $('#provider-calendar-view').val()
                }
            };

            
           
           


            //Include provider services.
            var s1, s2 = 0;
            provider.services = [];
            var cbox;
            $('#provider-services input:checkbox').each(function(index, checkbox) {

                if ($(checkbox).prop('checked')) {
                    provider.services.push($(checkbox).attr('data-id'));
                    cbox = $(checkbox).attr('data-id');
                    $('#service-org').val(cbox);
                    s1 = 1;
                } else {
                    s2 = 1;
                }

             });
            if (s1 != 1 && s2 == 1) {
                $('#service-org').val('');
            }

            console.log(provider);

            // var ser = $('#service-org').val();
            // if (ser.length == 0) {
            //     $('#service-org').addClass('required');
            //     $("#sid").css('color', 'red');
            // } else {
            //     $('#service-org').removeClass('required');
            //     $("#sid").css('color', 'black');
            // }

            // Include password if changed.
            if ($('#provider-password').val() !== '') {
                provider.settings.password = $('#provider-password').val();
            }

            // Include id if changed.
            if ($('#provider-id').val() !== '') {
                provider.id = $('#provider-id').val();
            }

            // if (!this.validate()) {
            //     return;
            // }

    //   var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_save_provider';
    //     var data = {
    //         csrfToken: GlobalVariables.csrfToken,
    //         provider: JSON.stringify(provider)
    //     };

    //     $.post(url, data)
    //         .done(function(response) {               
                
    //         });
    // };


    var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_save_provider';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            provider: JSON.stringify(provider)
        };

        $.post(url, data)
            .done(function(response) {
               console.log(response);
            });

        });

</script>