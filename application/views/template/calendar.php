<link rel="stylesheet" type="text/css" href="<?= asset_url('/assets/ext/jquery-fullcalendar/fullcalendar.min.css') ?>">
<style>
    body .popover-body strong {
    min-width: 90px;
}
.popover{
    max-width: none;
}
.d-flex.justify-content-center > button {
    margin: 10px;
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
        availableProviders: <?= json_encode($available_providers) ?>,
        availableServices: <?= json_encode($available_services) ?>,
        baseUrl: <?= json_encode($base_url) ?>,
        dateFormat: <?= json_encode($date_format) ?>,
        timeFormat: <?= json_encode($time_format) ?>,
        firstWeekday: <?= json_encode($first_weekday) ?>,
        editAppointment: <?= json_encode($edit_appointment) ?>,
        customers: <?= json_encode($customers) ?>,
        secretaryProviders: <?= json_encode($secretary_providers) ?>,
        calendarView: <?= json_encode($calendar_view) ?>,
        timezones: <?= json_encode($timezones) ?>,
        color: <?= json_encode($color_code) ?>,
        user: {
            id: <?= $user_id ?>,
            email: <?= json_encode($user_email) ?>,
            timezone: <?= json_encode($timezone) ?>,
            role_slug: <?= json_encode($role_slug) ?>,
            privileges: <?= json_encode($privileges) ?>,
        }
    };
if (GlobalVariables.editAppointment == null) {

} else {
    console.log(GlobalVariables.editAppointment['hash']);
}
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});
</script>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box  align-items-center justify-content-between">


                        <div class="page-title-right">
                            
                        </div>

                        <div class="container-fluid backend-page" id="calendar-page">
                            <div style=" background: #4e49d6; "  class="row" id="calendar-toolbar">
                                <div id="calendar-filter" class="col-12 col-sm-5">
                                    <div class="form-group calendar-filter-items">
                                        <select id="select-filter-item" class="form-control col"
                                            data-tippy-content="<?= lang('select_filter_item_hint') ?>">
                                        </select>
                                    </div>
                                </div>

                                <div style="display:none" id="calendar-actions" class="col-12 col-sm-7">
                                    <?php if (($role_slug == DB_SLUG_ADMIN || $role_slug == DB_SLUG_PROVIDER)
                                     && config('google_sync_feature') == TRUE): ?>
                                    <button id="google-sync" class="btn btn-primary"
                                        data-tippy-content="<?= lang('trigger_google_sync_hint') ?>">
                                        <i class="fas fa-sync-alt"></i>
                                        <span><?= lang('synchronize') ?></span>
                                    </button>

                                    <button id="enable-sync" class="btn btn-light" data-toggle="button"
                                        data-tippy-content="<?= lang('enable_appointment_sync_hint') ?>">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        <span><?= lang('enable_sync') ?></span>
                                    </button>
                                    <?php endif ?>

                                    <?php if ($privileges[PRIV_APPOINTMENTS]['add'] == TRUE): ?>
                                    <div class="btn-group">
                                        <button class="btn btn-light" id="insert-appointment">
                                            <i class="fas fa-plus-square mr-2"></i>
                                            <?= lang('appointment') ?>
                                        </button>

                                        <button class="btn btn-light dropdown-toggle" id="insert-dropdown"
                                            data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" id="insert-unavailable">
                                                <i class="fas fa-plus-square mr-2"></i>
                                                <?= lang('unavailable') ?>
                                            </a>
                                            <a class="dropdown-item" href="#" id="insert-working-plan-exception"
                                                <?= $this->session->userdata('role_slug') !== 'admin' ? 'hidden' : '' ?>>
                                                <i class="fas fa-plus-square mr-2"></i>
                                                <?= lang('working_plan_exception') ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif ?>

                                    <button id="reload-appointments" class="btn btn-light"
                                        data-tippy-content="<?= lang('reload_appointments_hint') ?>">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>

                                    <?php if ($calendar_view === 'default'): ?>
                                    <a class="btn btn-light" href="<?= site_url('backend?view=table') ?>"
                                        data-tippy-content="<?= lang('table') ?>">
                                        <i class="fas fa-table"></i>
                                    </a>
                                    <?php endif ?>

                                    <?php if ($calendar_view === 'table'): ?>
                                    <a class="btn btn-light" href="<?= site_url('backend?view=default') ?>"
                                        data-tippy-content="<?= lang('default') ?>">
                                        <i class="fas fa-calendar-alt"></i>
                                    </a>
                                    <?php endif ?>
                                </div> 
                            </div>

                            <div id="calendar">
                                <!-- Dynamically Generated Content -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


<!-- MANAGE UNAVAILABLE MODAL -->
<div id="delay-model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delay Appointment</h3>
                <button class="close" data-bs-dismiss="modal">&times;</button>
            </div>
           
           
           
            <div class="modal-body">
            <div class="form-group">
                   <label>Please take a minute to write the reason for delay the appointment:</label>
           <textarea class="form-control" id="reason" rows="3"></textarea>
           </div>
           
                <div class="form-group">
                   <label>Hours</label>
                   <select class="form-control" id="dhour">
                   <option value="">Select Hours</option>
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                   <option>5</option>
                   </select>
                   <input type="hidden" id="delay-phone" >
                </div>
                <div class="form-group">
                <button class="btn btn-primary delay">Delay</button>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-ban mr-2"></i>
                    <?= lang('cancel') ?>
                </button>               
            </div>
        </div>
    </div>
</div>


<script>
$('#delay').click(function(){       
    $('#delay-model').modal('show');
});

var block_insert = new Date();
    var blk = block_insert.getDay()
    if (blk == 1) {
        $('#insert-appointment').prop('disabled', true);
       
    } else {
        $('#insert-appointment').prop('disabled', false);
    }

</script>
<!-- WORKING PLAN EXCEPTIONS MODAL -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> Gravitykey
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Created <i class="mdi mdi-heart text-danger"></i> by gravitykey
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- end main content-->