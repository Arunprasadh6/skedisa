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

img#grid-img {
    width: 34%;
    border-radius: 13px;
    height: 65px;
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

span#lst {
    font-size: 17px;
    position: relative;
    top: 4px;
}

span#grd {
    font-size: 17px;
    position: relative;
    top: 4px;
}
</style>
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
<script>
var GlobalVariables = {
    csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
    baseUrl: <?= json_encode($base_url) ?>,
    availableProviders: <?= json_encode($available_providers) ?>,
    availableServices: <?= json_encode($available_services) ?>,
    dateFormat: <?= json_encode($date_format) ?>,
    firstWeekday: <?= json_encode($first_weekday); ?>,
    timeFormat: <?= json_encode($time_format) ?>,
    userSlug: <?= json_encode($role_slug) ?>,
    editAppointment: <?= json_encode($edit_appointment) ?>,
    customers: <?= json_encode($customers) ?>,
    secretaryProviders: <?= json_encode($secretary_providers) ?>,
    calendarView: <?= json_encode($calendar_view) ?>,
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


if (GlobalVariables.editAppointment == null) {

} else {
    console.log(GlobalVariables.editAppointment['hash']);
}
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});
$(function() {
    BackendSettings.initialize(true);
    BackendUsers.initialize(true);
});


var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
var day = GlobalVariables['days'][0]['value'];
var cnt = GlobalVariables['count'][0]['value'];
</script>
<script src="<?= asset_url('assets/js/backend_users_providers.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users_secretaries.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>
<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings.js') ?>"></script>
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
                <div class="card" style="background: #f1f5f7;box-shadow: 1px 0px 8px 2px rgb(0 0 0 / 8%);">
                    <div class="card-body table-light">
                        <div class="row">

                            <div class="col-md-2">
                                <span id="lst">
                                    <a onclick="list()" href='javascript:void(0)'> <i class="ri-menu-line"> List
                                            View</i></a>
                                </span>&nbsp;&nbsp;

                            </div>
                            <div class="col-md-2">
                                <span id="grd">
                                    <a onclick="grid()" href='javascript:void(0)'> <i class="ri-grid-line"> Grid
                                            View</i></a>
                                </span>
                            </div>
                            <div class="col-md-8 text-center">
                                <button style="float: right;" type="button"
                                    class="btn btn-primary waves-effect waves-light" onclick="show_modal()">Add New
                                    +</button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <?php // echo "<pre>";print_r($providers);echo "</pre>"; ?>
            <div class="col-lg-12" id="listview">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="data-table" class="table table-straped datatable dt-responsive nowrap"
                                data-bs-page-length="5"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Service</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Secretary</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">

                                    <?php foreach($providers as $row){?>
                                    <tr>

                                        <?php $sernm=$row['services_name']; ?>
                                        <td><a href="javascript: void(0);"
                                                class=" fw-bold"><?php echo $row['first_name']; ?></a> </td>
                                        <td>Dept</td>
                                        <td><?php echo $row['services_name'][0] ?></td>
                                        <td><?php echo $row['phone_number']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo empty($row['secretry_name'][0]) ? 'NA' : $row['secretry_name'][0]; ?>
                                        </td>
                                        <td><span class="badge badge-soft-success font-size-11">Active</span></td>

                                        <td id="tooltip-container1">
                                            <a style="color:#000000d1;" onclick="edit_provider('<?php echo $row['id']; ?>')"
                                                href="javascript:void(0);" class="me-3 "
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil-outline font-size-18"></i></a>
                                            <a style="color:#000000d1;" href="javascript:void(0);"
                                                onclick="delete_provider('<?php echo $row['id']; ?>')"
                                                 data-bs-container="#tooltip-container1"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can-outline font-size-18"></i></a>
                                        </td>
                                    </tr> <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="gridview" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($providers as $row){ ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <img id="grid-img"
                                                src="<?php echo empty($row['Images']) ? base_url('assets/img/upload_img/user.jpg'):base_url('assets/img/upload_img/'.$row['Images']); ?>" />
                                            <div class="flex-1 overflow-hidden" style="text-align: center;">
                                                <p class="text-truncate font-size-14 mb-2">
                                                    <?php echo $row['first_name']; ?></p>
                                                <label id="grid-txt">General Medicine</label><br>
                                                <b>Secretary :</b> <label
                                                    id="grid-txt"><?php echo empty($row['secretry_name'][0]) ? 'NA' : $row['secretry_name'][0]; ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="text-muted ms-2"><?php echo $row['services_name'][0] ?></span>
                                            <div class="text-primary ms-auto" style="float:right">
                                                <a style="color:#000000d1;" onclick="edit_provider('<?php echo $row['id']; ?>')"
                                                    href="javascript:void(0);" class="me-3 "
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="mdi mdi-pencil-outline font-size-18"></i></a>
                                                <a style="color:#000000d1;" href="javascript:void(0);"
                                                    onclick="delete_provider('<?php echo $row['id']; ?>')"
                                                     data-bs-container="#tooltip-container1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="mdi mdi-trash-can-outline font-size-18"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
    <!--  Modal content for the above example -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="provider-form">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card" style="background: #f1f1fc;">
                                <div class="card-body table-light">
                                    <div class="row">
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home1"
                                                    role="tab">
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
                                                    <span class="d-block d-sm-none"><i
                                                            class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Password & Access</span>
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" onclick="cancel_form()"
                                                    class="btn cancel">Cancel</button>&nbsp;
                                            </li>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <li>
                                                <button type="submit" id="save-provider"
                                                    class="btn btn-primary">Save</button>
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

                                                    <div id="collapseOne" class="collapse show"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <form enctype="multipart/form-data">
                                                                                <div id="img" style="display:none">
                                                                                    <img src="<?php echo base_url('assets/img/user.jpg'); ?>"
                                                                                        id="pro-img"
                                                                                        for="img-profiless" /><br>
                                                                                    <label id="imnm">upload
                                                                                        picture</label>
                                                                                    <input type="file" name="image"
                                                                                        style="display:none"
                                                                                        id="img-profiless" />
                                                                                </div>


                                                                                <div
                                                                                    class="custom-control custom-switch">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="provider-notifications">
                                                                                    <label class="custom-control-label"
                                                                                        for="provider-notifications">
                                                                                        <?= lang('receive_notifications') ?>
                                                                                    </label>
                                                                                </div>


                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="hidden" id="provider-id"
                                                                                    class="record-id" value="">
                                                                                <label>First Name <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input name="fname" required type="text"
                                                                                    maxlength="20"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    id="provider-first-name"
                                                                                    class="form-control"
                                                                                    placeholder="First Name" />

                                                                                <span style="display:none"
                                                                                    id="provider-org"><?php  echo $this->session->userdata('Organization'); ?></span>
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="phone-number">Primary
                                                                                    Mobile<span
                                                                                        class="text-danger">*</span>
                                                                                </label>
                                                                                <!-- <div class="col-md-4" style="padding-right: 2px;">
                                                                                    <input name="countrycode"
                                                                                        id="phone-country"
                                                                                        class="form-control required"
                                                                                        maxlength="3"
                                                                                        onkeyup="this.value=this.value.replace(/[^+0-9]/g,'')"
                                                                                        placeholder="+91">
                                                                                </div>
                                                                                <div class="col-md-8" style="padding-left: 0px;"> -->
                                                                                    <input name="mobile" id="provider-phone-number"
                                                                                        class="form-control required"
                                                                                        maxlength="10"
                                                                                        placeholder="Primary Mobile"
                                                                                        onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                               
                                                                               
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="provider-city">
                                                                                    <?= lang('city') ?>
                                                                                </label>
                                                                                <input id="provider-city"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    class="form-control"
                                                                                    placeholder="City">
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="provider-city">
                                                                                    Address
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Address"
                                                                                    id="provider-address" />
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Last Name <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="lname"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    id="provider-last-name"
                                                                                    class="form-control"
                                                                                    placeholder="Last Name" id="" />
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="provider-email">
                                                                                    <?= lang('email') ?>
                                                                                </label>
                                                                                <input id="provider-email"
                                                                                    class="form-control "
                                                                                    placeholder="Email">
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="provider-state">
                                                                                    <?= lang('state') ?>
                                                                                </label>
                                                                                <input id="provider-state"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    class="form-control"
                                                                                    placeholder="State">
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="provider-city">
                                                                                    Postal Code
                                                                                </label>
                                                                                <input type="text"
                                                                                    id="provider-zip-code"
                                                                                    class="form-control"
                                                                                    placeholder="Postal Code" />
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
                                                                                        class="form-control"
                                                                                        rows="3"></textarea>
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
                                                    <a href="#collapseTwo" class="text-dark collapsed"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        aria-controls="collapseTwo">
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
                                                            <input type="hidden" id="service-org" name="service"
                                                                value="" />
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
                                                <a href="#schedule-service" class="text-dark collapsed"
                                                    data-bs-toggle="collapse" aria-expanded="false"
                                                    aria-controls="collapseTwo">
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


                                                                <div class="row">
                                                                    <div class="col-12 col-sm-7 working-plan-wrapper"
                                                                        id="working-plan">
                                                                        <h4>Standard Hours</h4>
                                                                        <button id="reset-working-plan"
                                                                            class="btn btn-primary"
                                                                            data-tippy-content="<?= lang('reset_working_plan') ?>">
                                                                            <i class="fas fa-redo-alt mr-2"></i>
                                                                            <?= lang('reset_plan') ?></button>
                                                                        <table
                                                                            class="working-plan table table-striped mt-2">
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
                                                        <div class="col-12 col-sm-7 working-plan-wrapper">
                                                            <h3><?= lang('breaks') ?></h3>

                                                            <p>
                                                                <?= lang('add_breaks_during_each_day') ?>
                                                            </p>

                                                            <div>
                                                                <button type="button" class="add-break btn btn-primary">
                                                                    <i class="fas fa-plus-square mr-2"></i>
                                                                    <?= lang('add_break') ?>
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
                                                <a href="#exception" class="text-dark collapsed"
                                                    data-bs-toggle="collapse" aria-expanded="false"
                                                    aria-controls="collapseTwo">
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
                                                        <h3><?= lang('working_plan_exceptions') ?></h3>

                                                        <p>
                                                            <?= lang('add_working_plan_exceptions_during_each_day') ?>
                                                        </p>

                                                        <div>
                                                            <button type="button"
                                                                class="add-working-plan-exception btn btn-primary mr-2">
                                                                <i class="fas fa-plus-square"></i>
                                                                <?= lang('add_working_plan_exception') ?>
                                                            </button>
                                                        </div>

                                                        <br>

                                                        <table class="working-plan-exceptions table table-striped">
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
                </form>

            </div>





        </div>
        <div class="tab-pane" id="messages1" role="tabpanel">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>User Name<span class="text-danger">*</span></label>
                        <input type="text" name="uname" id="provider-username" class="form-control"
                            placeholder="UserName" />
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password" name="pwd" id="provider-password" class="form-control"
                        placeholder="Password" />
                </div>

                <div class="form-group">
                    <label>Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" name="cpwd" id="provider-password-confirm" class="form-control"
                        placeholder="Confirm Password" />
                </div>
            </div>



        </div>
    </div>

</div>
</div>
</div>
</div>
</div><!-- /.modal-content -->
</form>
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
// document.getElementById('display-color').value = color;
// document.getElementById('color1').style.background = color;
// document.getElementById('color1').innerHTML = color;

// if (GlobalVariables['image'] == "user.jpg") {
//     document.getElementById('get-img').src = "<?php //echo base_url('assets/img/upload_img/') ?>" +
//         GlobalVariables['image'];
// } else {
//     document.getElementById('get-img').src = "<?php //echo base_url('assets/img/upload_img/') ?>" + img;
// }






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

// $('.form-check-input input:checkbox').click(function(){
//     console.log('work');
// })


$("#provider-form").validate({
    ignore: [],

    rules: {
        fname: {
            required: true,
            minlength: 3
        },
        lname: {
            required: true,
            minlength: 3
        },
        mobile: {
            required: true,
            minlength: 10
        },
        // countrycode:{
        //     required: true
        //         },    
        uname: {
            required: true,
            minlength: 3
        },
        pwd: {
            required: true,
            minlength: 8
        },
        cpwd: {
            required: true,
            minlength: 8,
            equalTo: "#provider-password"
        },



    },
    messages: {
        fname: {
            minlength: "Minimum  3 Characters.",
            required: "Please enter Firstname"
        },
        lname: {
            minlength: "Minimum  3 Characters.",
            required: "Please enter Lastname"
        },
        mobile: {
            minlength: "Minimum  10 Numbers.",
            required: "Please enter Mobile Number"
        },
        // countrycode:{
        //     required: "Code"
        // },

        uname: {
            minlength: "Minimum  3 Characters.",
            required: "Please enter Username"
        },

        pwd: {
            minlength: "Minimum  8 Characters.",
            required: "Please enter Password"
        },
        cpwd: {
            minlength: "Minimum  8 Characters.",
            required: "Please enter Confirm Password",

        },


    },
    submitHandler: function(form) {

        var url = '<?php  echo base_url("index.php/backend_api/ajax_save_provider") ?>';
        var provider = {
            first_name: $('#provider-first-name').val(),
            MRN: $('#provider-last-name').val(),
            email: $('#provider-email').val(),
            //mobile_number: $('#phone-country').val(),
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
                console.log(cbox);
                s1 = 1;
            } else {
                s2 = 1;
            }

        });

        var ser = $('#service-org').val();
        if (ser.length == 0) {
            Notiflix.Notify.Warning("Service Required");
            return;
        }

        if (s1 != 1 && s2 == 1) {
            $('#service-org').val('');
        }



        // Include password if changed.
        if ($('#provider-password').val() !== '') {
            provider.settings.password = $('#provider-password').val();
        }

        // Include id if changed.
        if ($('#provider-id').val() !== '') {
            provider.id = $('#provider-id').val();
        }


        var data = {
            csrfToken: '<?php echo $this->security->get_csrf_hash(); ?>',
            provider: JSON.stringify(provider)
        };

        $.post(url, data)
            .done(function(response) {
                Notiflix.Notify.Success("Provider Save Success");
                $('.bs-example-modal-lg').modal('hide');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }).fail(function() {
                $('.bs-example-modal-lg').modal('hide');
            });;
    }
});






$('#pro-img').click(function() {
    $('#img-profiless').trigger('click');
    //     setTimeout(() => {
    //     $('#imnm').text($('#img-profiless').val());
    //  }, 2000);
});

function delete_provider(id) {
    var url = '<?php echo base_url("index.php/backend_api/ajax_delete_provider") ?>';

    Swal.fire({  
  title: 'Are you sure you want to Delete?',  
  showDenyButton: true,  
  confirmButtonText: 'Delete',  
  denyButtonText: `Cancel`,
}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {
        $.post(url, {
            "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',
            "provider_id": id
        }, function(data) {
            Notiflix.Notify.Success("Deleted  Success");
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
    } else if (result.isDenied) {}
})


    // if (confirm("Are you sure you want to delete..?") === true) {
    //     $.post(url, {
    //         "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',
    //         "provider_id": id
    //     }, function(data) {
    //         Notiflix.Notify.Success("Deleted  Success");
    //         setTimeout(() => {
    //             window.location.reload();
    //         }, 1000);
    //     })
    // }
}

function edit_provider(id) {
    var validator = $("#provider-form").validate();
    validator.resetForm();
    $('#provider-password').rules('remove', 'required');
    $('#provider-password-confirm').rules('remove', 'required');
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
            //$('#phone-country').val(rows[0].mobile_number);
            $('#provider-phone-number').val(rows[0].phone_number);
            $('#provider-address').val(rows[0].address);
            $('#provider-city').val(rows[0].city);
            $('#provider-state').val(rows[0].state);
            $('#provider-zip-code').val(rows[0].zipcode);
            $('#provider-notes').val(rows[0].notes);
            $('#provider-timezone').val(rows[0].timezone);
            $('#provider-org').text();
            $('#provider-id').val(rows[0].id);
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
            if (rows[0].Images.length > 0) {
                document.getElementById('pro-img').src = "<?php echo base_url('assets/img/upload_img/') ?>" + rows[
                    0].Images;
            } else {
                document.getElementById('pro-img').src = "<?php echo base_url('assets/img/upload_img/user.jpg') ?>";
            }

            $('#pro-img').src = img;


            // $('#provider-password').css("display","none");
            //$('#provider-password-confirm').css("display","none");

        });

}

function show_modal() {
    $('#provider-form')[0].reset();
    $('.bs-example-modal-lg').modal('show');
    setTimeout(() => {
        var validator = $("#provider-form").validate();
        validator.resetForm();
    }, 600);
    $('#provider-password').rules('remove', {
        required: true
    });
    $('#provider-password-confirm').rules('remove', {
        required: true
    });
    document.getElementById('img').style.display = 'none'
}

function cancel_form() {
    $('#provider-form')[0].reset();
    $('.bs-example-modal-lg').modal('hide');
}

$('#img-profiless').change(function() {
    var url = GlobalVariables.baseUrl + '/index.php/backend_api/upload_provider_pic';
    var formdata = new FormData();
    var pid = $('#provider-id').val();
    if (pid.length > 0) {
        var file = this.files[0];
        var tok = GlobalVariables.csrfToken;
        formdata.append("files", file);
        formdata.append("csrfToken", tok);
        formdata.append("Pid", pid)
        var type = file.type;
        if (type == "image/jpg" || type == "image/png" || type == "image/jpeg") {
            $.ajax({
                url: url,
                type: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        Notiflix.Notify.Success(data);
                        window.location.reload();
                    } else {
                        Notiflix.Notify.Warning(data);
                    }
                },
            });

        } else {
            Notiflix.Notify.Warning('Support Only PNG,JPEG Images');
        }
    }


});

function list() {
    $('#listview').css("display", "block");
    $('#gridview').css("display", "none");
}

function grid() {
    $('#listview').css("display", "none");
    $('#gridview').css("display", "block");
}
</script>
<script>
    //  var input = document.querySelector("#phone-country");
    // window.intlTelInput(input,({
    //   // options here
    // }));
$(document).ready(function() {
    $('#data-table').DataTable({
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [[10, 25,], [10, 25]]
    // });
    // $('.iti__flag-container').click(function() { 
    //       var countryCode = $('.iti__selected-flag').attr('title');
    //       var countryCode = countryCode.replace(/[^0-9]/g,'')
    //       $('#phone-country').val("");
    //       $('#phone-country').val("+"+countryCode);
    //    });
});
</script>