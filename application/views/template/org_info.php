<style>
button.btn.edit {
    background: #4E49D6;
    border: 1px #BEBEBE;
    color: white;
}
</style>
<script>
var GlobalVariables = {
    csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
    availableProviders: <?= json_encode($available_providers) ?>,
    availableServices: <?= json_encode($available_services) ?>,
    editAppointment: <?= json_encode($edit_appointment) ?>,
    calendarView: <?= json_encode($calendar_view) ?>,
    customers: <?= json_encode($customers) ?>,
    baseUrl: <?= json_encode($base_url) ?>,
    dateFormat: <?= json_encode($date_format) ?>,
    firstWeekday: <?= json_encode($first_weekday); ?>,
    timeFormat: <?= json_encode($time_format) ?>,
    userSlug: <?= json_encode($role_slug) ?>,
    color: <?= json_encode($color_code) ?>,
   
  
    user: {
        id: <?= $user_id ?>,
        email: <?= json_encode($user_email) ?>,
        timezone: <?= json_encode($timezone) ?>,
        role_slug: <?= json_encode($role_slug) ?>,
        privileges: <?= json_encode($privileges) ?>
    },
   

};


if (GlobalVariables.editAppointment == null) {

} else {
    console.log(GlobalVariables.editAppointment['hash']);
}
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});
</script>
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



            <div class="col-lg-12" id="list-view">


                <div class="container">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Organization Name</label>
                                    <input type="text" class="form-control" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <label>Industry</label>
                                    <input type="text" class="form-control" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <label>Org Email</label>
                                    <input type="text" class="form-control" placeholder="Name" />
                                </div>

                                <div class="form-group">
                                    <label>Org LinkURL</label>
                                    <input type="text" class="form-control" placeholder="Name" />
                                    <br>
                                    <button type="button" class="btn edit">Edit</button>
                                    <br>
                                </div>
                            </div>
                            
                            <div class="col-md-1"></div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Services</label>
                                    <button style="float:right;margin-bottom: 6px;" type="button" class="btn btn-primary waves-effect waves-light"
                                    >Add New +</button> 
                                    &nbsp;   
                                    <textarea style="resize:none;height:230px" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>


            </div>





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