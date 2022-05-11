<style>
button.btn.edit {
    background: #4E49D6;
    border: 1px #BEBEBE;
    color: white;
}

div#weekday>li {
    float: left;
    padding: 11px;
    border: 1px solid;
    border-radius: 5px;
    margin-right: 11px;
}
.card-body.bdy > span {
    margin-left: 28%;
}


.activity {
   box-shadow: 0 2px 4px rgb(78 73 214);
    border: 2px solid #4e49d6b8;
}

label.bge {
    background-color: #d6f3ea;
    width: 100%;
    text-align: center;
    border-radius: 5px;
    color: #4ad1a7;
}

.card-body.bdy {
    border: 1px solid #c3b8b866;
}

.day_week {
    float: left;
    padding: 8px;
}

.day_week>span {
    margin-left: 6px;
    font-size: 17px;
}

span#dept {
    font-size: 12px;
    position: relative;
    bottom: 7px;
}

span#usr-mbl {
    position: relative;
    bottom: 4px;
}

div#app-tym>p {
    font-size: 13px;
    margin-top: 6px;
}

.tdy-scdule {
    background: #F1F6F5 0% 0% no-repeat padding-box;
    box-shadow: 0px 3px 6px #00000010;
    border-radius: 7px;

    padding: 5px 0px 0px 16px;
}

ul.date_inline > li {
    position: relative;
    float: left;
    margin: 3px 10px 2px 4px;
    cursor: pointer;
    border-radius: 16px;
    width: 50px;
    
   
}

span>strong {
    margin-left: 25px;
    position: relative;
    top: 15px;
}

.text-truncate {
    overflow: hidden;
    text-align: center;
    font-weight: 800;
    text-overflow: unset;
    white-space: unset;
}

.actives {
    background: #4e49d6;
    color: white;
    border-radius: 11px;
    text-align: center;
    padding:3px;
    height: 25px;
    width: 25px;
}

a {
    text-decoration: none;
    color: black;
}

.text-info {
    color: #31708f;
}

.physicianList ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.physicianList ul li {
    display: inline-block;
    width: 30px;
    f;
    float: left;
    text-align: center;
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

.active_page {
    background: #337ab7;
    color: white !important;
}
.scroll {
    overflow-y: scroll;
    height: 601.766px;
   
    background-color: #fff;
    margin: 0 0 10px 0;
}
.scroll::-webkit-scrollbar {
    width:5px;
}
.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius:5px;
}
.scroll::-webkit-scrollbar-thumb {
    border-radius:5px;
    -webkit-box-shadow: inset 0 0 6px #f1f5f7; 
}

table.dataTable tbody tr {
    background-color: #fff;
    height: 45px;
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
    calendarView: <?= json_encode($calendar_view) ?>,
    customers: <?= json_encode($customers) ?>,
    color: <?= json_encode($color_code) ?>,
    timezones: <?= json_encode($timezones) ?>,
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
    //console.log(GlobalVariables.editAppointment['hash']);
}
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});
</script>

<?php date_default_timezone_set('Asia/Kolkata'); ?> 
   
 
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box  align-items-center justify-content-between">
                        <h4><?php  echo (date('H') < 12) ? "Good Morning ".$user_display_name : "Good Noon ".$user_display_name ?>
                        </h4>
                        <p>Take a look at the latest appointment update for your business</p>


                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="today" class="card activity" style="cursor:pointer;border-radius: 13px;" onclick="today_app()">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-primary ms-auto">
                                            <i class="ri-calendar-event-fill font-size-24"></i>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h4 style="text-align:center" class="mb-0"><?= $daily_count[0]['count']; ?>
                                            </h4>
                                        </div>


                                    </div>
                                </div>
                                <div class="card-body border-top py-3">
                                    <div class="text-truncate">
                                        <span class="text-muted ms-2">Todays<br> Appointments</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="all" class="card" style="cursor:pointer;border-radius: 13px;" onclick="all_app()">
                                <div class="card-body">

                                    <div class="d-flex">
                                        <div class="text-primary ms-auto">
                                            <i class="ri-user-3-fill font-size-24"></i>
                                        </div>

                                        <div class="flex-1 overflow-hidden">
                                            <h4 style="text-align:center" class="mb-0">
                                                <?= $appointment_cnt[0]['total']; ?></h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body border-top py-3">
                                    <div class="text-truncate">
                                        <span class="text-muted ms-2">All<br> Appointments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="cancel" class="card" style="cursor:pointer;border-radius: 13px;" onclick="cancel_app()">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-primary ms-auto">
                                            <i class="ri-briefcase-4-line font-size-24"></i>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h4 style="text-align:center" class="mb-0"><?= $cancel_count[0]['count']; ?>
                                            </h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body border-top py-3">
                                    <div class="text-truncate">
                                        <span class="text-muted ms-2">Cancelled<br> Appointments</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card" id="all-cust" style="border-radius: 13px;">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="text-primary ms-auto">
                                            <i class="ri-user-3-fill font-size-24"></i>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h4 style="text-align:center" class="mb-0"><?= $user_cnt[0]['total']; ?>
                                            </h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body border-top py-3">
                                    <div class="text-truncate">
                                        <span class="text-muted ms-2">All<br>Customers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                   
                    <div class="card" id="tbl-all" style="display:none;height: 636px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-straped datatable dt-responsive nowrap"
                                    data-bs-page-length="5"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Customer Name</th>
                                            <th>Provider Name</th>
                                            <th>Status</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">


                                        <?php 
                                      
                                      
                                        foreach($reports as $row){
                                        $color='';
                                        $text='';
                                      
                                       if($row['Status']==0){
                                           $color="color:white;background:#caacf1fa ";
                                           $text="Start";
                                       }elseif($row['Status']==1){
                                        $color="color:white;background:#9C9CA0";
                                            $text="Cancelled by Hospital";
                                       }elseif($row['Status']==2){
                                        $color="color:white;background:#9C9CA0";
                                             $text="Cancelled by User";
                                        }elseif($row['Status']==3){
                                            $color="color:white;background:#00A352";
                                            $text="Complete";
                                        }elseif($row['Status']==4){
                                            $color="color:white;background:#fb02029e";
                                            $text="No Show";
                                        }
                                    
                                        
                                        ?>
                                        <tr>

                                            <td><?php echo date('d-m-Y',strtotime($row['start_datetime'])); ?></td>
                                            <td><?php  echo date('h:i:s',strtotime($row['start_datetime'])); ?></td>

                                            <td><?php  echo empty($row['customers'][0]['first_name']) ? 'NA':$row['customers'][0]['first_name']; ?>
                                            </td>
                                            <td><?php echo empty($row['providers'][0]) ? 'NA':$row['providers'][0]; ?>
                                            </td>
                                            <td><span style="<?php echo $color; ?>"
                                                    class="badge  font-size-11"><?php echo $text; ?></span></td>

                                            <td id="tooltip-container1">
                                                <?php if($row['Status']==0){?>
                                                <?php  if( date('Y-m-d',strtotime($row['start_datetime'])) > date('Y-m-d') ) { ?>
                                                <a onclick="editAppointment('<?php echo $row['hash']; ?>')" style="color:#000000d1;" href="javascript:void(0);" class="me-3 "
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="mdi mdi-pencil-outline font-size-18"></i></a>
                                                <?php } ?>

                                                <?php  if($row['Status']==0){ ?>
                                                <a style="color:#000000d1;" href="javascript:void(0);" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','1')"
                                                    title="Delete"><i class="mdi mdi-trash-can-outline font-size-18"></i></a>

                                                    <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','3')"
                                                    title="Complete"><i class="mdi mdi-clipboard-check-outline font-size-18"></i></a>

                                                    <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','4')"
                                                    title="No show"><i class="mdi mdi-eye-off-outline font-size-18"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr> <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="tbl-today" style="height: 636px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table1" class="table table-straped datatable dt-responsive nowrap"
                                    data-bs-page-length="5"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>

                                            <th>Time</th>
                                            <th>Customer Name</th>
                                            <th>Provider Name</th>
                                            <th>Status</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">


                                        <?php 
                                        
                                        

                                        foreach($today_app as $row){
                                        $color='';
                                        $text='';
                                        
                                       if($row['Status']==0){
                                           $color="color:white;background:#caacf1fa ";
                                           $text="Start";
                                       }elseif($row['Status']==1){
                                        $color="color:white;background:#9C9CA0";
                                            $text="Cancelled by Hospital";
                                       }elseif($row['Status']==2){
                                        $color="color:white;background:#9C9CA0";
                                             $text="Cancelled by User";
                                        }elseif($row['Status']==3){
                                            $color="color:white;background:#00A352";
                                            $text="Complete";
                                        }elseif($row['Status']==4){
                                            $color="color:white;background:#fb02029e";
                                            $text="No Show";
                                        }
                                    
                                        
                                        ?>
                                        <tr>


                                            <td><?php  echo date('h:i:s',strtotime($row['start_datetime'])); ?>
                                            </td>

                                            <td><?php  echo empty($row['customer']['first_name']) ? 'NA':$row['customer']['first_name']; ?>
                                            </td>
                                            <td><?php echo empty($row['provider']['first_name']) ? 'NA':$row['provider']['first_name']." ".$row['provider']['MRN']; ?>
                                            </td>
                                            <td><span style="<?php echo $color; ?>"
                                                    class="badge  font-size-11"><?php echo $text; ?></span></td>

                                            <td id="tooltip-container1">
                                                <?php if($row['Status']==0){?>
                                                <?php  if( date('Y-m-d',strtotime($row['start_datetime'])) > date('Y-m-d') ) { ?>
                                                <a style="color:#000000d1;" onclick="editAppointment('<?php echo $row['hash']; ?>')" href="javascript:void(0);" class="me-3"
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="mdi mdi-pencil-outline font-size-18"></i></a>
                                                <?php } ?>

                                                <?php  if($row['Status']==0){ ?>
                                                <a href="javascript:void(0);" style="color:#000000d1;"
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','1')"
                                                    title="Delete"><i class="mdi mdi-trash-can-outline font-size-18"></i></a>

                                                    <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','3')"
                                                    title="Complete"><i class="mdi mdi-clipboard-check-outline font-size-18"></i></a>

                                                    <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','4')"
                                                    title="No show"><i class="mdi mdi-eye-off-outline font-size-18"></i></a>

                                                <?php } ?>
                                            </td>
                                        </tr> <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card" id="tbl-cancel" style="display:none;height: 636px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Cancel Appointment -->
                                <table id="data-table2" class="table table-straped datatable dt-responsive nowrap"
                                    data-bs-page-length="5"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>            
                                            <th>Time</th>
                                            <th>Customer Name</th>
                                            <th>Provider Name</th>
                                            <th>Status</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-light">


                                        <?php 
                                        
                                        

                                        foreach($cancel_app as $row){
                                        $color='';
                                        $text='';
                                        
                                       if($row['Status']==0){
                                           $color="color:white;background:#caacf1fa ";
                                           $text="Start";
                                       }elseif($row['Status']==1){
                                        $color="color:white;background:#9C9CA0";
                                            $text="Cancelled by Hospital";
                                       }elseif($row['Status']==2){
                                        $color="color:white;background:#9C9CA0";
                                             $text="Cancelled by User";
                                        }elseif($row['Status']==3){
                                            $color="color:white;background:#00A352";
                                            $text="Complete";
                                        }elseif($row['Status']==4){
                                            $color="color:white;background:#fb02029e";
                                            $text="No Show";
                                        }
                                    
                                        
                                        ?>
                                        <tr>

                                        <td><?php  echo date('d-m-Y',strtotime($row['start_datetime'])); ?>
                                            </td>
                                            <td><?php  echo date('h:i:s',strtotime($row['start_datetime'])); ?>
                                            </td>

                                            <td><?php  echo empty($row['customer']['first_name']) ? 'NA':$row['customer']['first_name']; ?>
                                            </td>
                                            <td><?php echo empty($row['provider']['first_name']) ? 'NA':$row['provider']['first_name']." ".$row['provider']['MRN']; ?>
                                            </td>
                                            <td><span style="<?php echo $color; ?>"
                                                    class="badge  font-size-11"><?php echo $text; ?></span></td>

                                            <td id="tooltip-container1">
                                                <?php if($row['Status']==0){?>
                                                <?php  if( date('Y-m-d',strtotime($row['start_datetime'])) > date('Y-m-d') ) { ?>
                                                <a onclick="editAppointment('<?php echo $row['hash']; ?>')" style="color:#000000d1;" href="javascript:void(0);" class="me-3 "
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="mdi mdi-pencil-outline font-size-18"></i></a>
                                                <?php } ?>

                                                <?php  if($row['Status']==0){ ?>
                                                <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','1')"
                                                    title="Delete"><i class="mdi mdi-trash-can-outline font-size-18"></i></a>

                                                    <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','3')"
                                                    title="Complete"><i class="mdi mdi-clipboard-check-outline font-size-18"></i></a>

                                                    <a href="javascript:void(0);" style="color:#000000d1;" 
                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="delete_appointment('<?php echo $row['id']; ?>','4')"
                                                    title="No show"><i class="mdi mdi-eye-off-outline font-size-18"></i></a>


                                                <?php } ?>
                                            </td>
                                        </tr> <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                </div>

                <div class="col-xl-4 card">
                   &nbsp;
                   &nbsp;
                    <div class="page-title-box  align-items-center justify-content-between">
                        <h4 id="month-cal" style="    margin-left: 33%;"><?php echo date('F')."  ".date('Y'); ?> <i style="float: right;" class=" ri-calendar-2-line" data-toggle="tooltip" title="Calendar"></i></h4>
                        
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
                                        <li onclick="get_date('<?php echo date('Y-m-d'); ?>','<?php echo date('F'); ?>','<?php echo date('Y'); ?>')">
                                            <a href='javascript:void(0)'
                                                style="background-color: white;"><?php echo substr(date('D'),0,1); ?></a>
                                            <BR>
                                            <a href='javascript:void(0)'><b class="actives"><?php echo date('d'); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+1 days")); ?>','<?php echo date('F',strtotime("+1 days")); ?>','<?php echo date('Y',strtotime("+1 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+1 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+1 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+2 days")); ?>','<?php echo date('F',strtotime("+2 days")); ?>','<?php echo date('Y',strtotime("+2 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+2 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+2 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+3 days")); ?>','<?php echo date('F',strtotime("+3 days")); ?>','<?php echo date('Y',strtotime("+3 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+3 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+3 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+4 days")); ?>','<?php echo date('F',strtotime("+4 days")); ?>','<?php echo date('Y',strtotime("+4 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+4 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+4 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+5 days")); ?>','<?php echo date('F',strtotime("+5 days")); ?>','<?php echo date('Y',strtotime("+5 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+5 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+5 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+6 days")); ?>','<?php echo date('F',strtotime("+6 days")); ?>','<?php echo date('Y',strtotime("+6 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+6 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+6 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+7 days")); ?>','<?php echo date('F',strtotime("+7 days")); ?>','<?php echo date('Y',strtotime("+7 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+7 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+7 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+8 days")); ?>','<?php echo date('F',strtotime("+8 days")); ?>','<?php echo date('Y',strtotime("+8 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+8 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+8 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+9 days")); ?>','<?php echo date('F',strtotime("+9 days")); ?>','<?php echo date('Y',strtotime("+9 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+9 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+9 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+10 days")); ?>','<?php echo date('F',strtotime("+10 days")); ?>','<?php echo date('Y',strtotime("+10 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+10 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+10 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+11 days")); ?>','<?php echo date('F',strtotime("+11 days")); ?>','<?php echo date('Y',strtotime("+11 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+11 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+11 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+12 days")); ?>','<?php echo date('F',strtotime("+12 days")); ?>','<?php echo date('Y',strtotime("+12 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+12 days")),0,1); ?></a><BR>
                                            <a
                                                href='javascript:void(0)'><b><?php echo date('d',strtotime("+12 days")); ?></b></a>
                                        </li>

                                        <li onclick="get_date('<?php echo date('Y-m-d',strtotime("+13 days")); ?>','<?php echo date('F',strtotime("+13 days")); ?>','<?php echo date('Y',strtotime("+13 days")); ?>')">
                                            <a
                                                href='javascript:void(0)'><?php echo substr(date('D',strtotime("+13 days")),0,1); ?></a><BR>
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

                    <div class="card scroll" style="height:98%">


                        <div class="card-body bdy">
                            <span>Todays Schedule</span>
                            <div class="col-md-12">
                                <div class="row schedule">
                                    <!-- <div class="col-md-3">
                                                                <div id="app-tym">
                                                                    <p>09:00:00</p>
                                                                    <p>10:00:00</p>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="tdy-scdule">
                                                                    <span>Demo user<span><br><span id='dept'>General
                                                                                Medicine</span><br><span
                                                                                id="usr-mbl">User (phone number)</span>
                                                                            <div class="dropdown float-end" style="position:
                                                                                relative;bottom: 23px;">
                                                                                <a href="#"
                                                                                    class="dropdown-toggle arrow-none card-drop"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <i class="mdi mdi-dots-vertical"></i>
                                                                                </a>
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-end">
                                                                                   
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item">Edit</a>

                                                                                </div>
                                                                            </div>
                                                                     </div>
                                                            </div> -->

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


<script>
function today_app() {
    $('#tbl-today').css("display", "block");
    $('#tbl-cancel').css("display", "none");
    $('#tbl-all').css("display", "none");

    $('#today').addClass('activity');
    $('#cancel').removeClass('activity');
    $('#all').removeClass('activity');
    //alert('sss');
}

function cancel_app() {
    $('#tbl-today').css("display", "none");
    $('#tbl-cancel').css("display", "block");
    $('#tbl-all').css("display", "none");
    $('#today').removeClass('activity');
    $('#cancel').addClass('activity');
    $('#all').removeClass('activity');
}

function all_app() {
    $('#tbl-today').css("display", "none");
    $('#tbl-cancel').css("display", "none");
    $('#tbl-all').css("display", "block");
    $('#today').removeClass('activity');
    $('#cancel').removeClass('activity');
    $('#all').addClass('activity');
}


$(document).ready(function() {
    $('#data-table').DataTable({
        // "order": [
        //     [0, "desc"]
        // ],
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [[10, 25,], [10, 25]]

    });

    $('#data-table1').DataTable({
        // "order": [
        //     [0, "desc"]
        // ],
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [[10, 25,], [10, 25]]

    });
    $('#data-table2').DataTable({
        // "order": [
        //     [0, "desc"]
        // ],
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [[10, 25,], [10, 25]]

    });
});

// echo "<pre>";print_r($cancel_app);echo "</pre>"; ?>
function delete_appointment(id,sts) {
    var tok = GlobalVariables['csrfToken'];
    var url = '<?php echo base_url("index.php/backend_api/ajax_delete_appointment") ?>';

    var sts_txt='';
    var s_txt='';
    if(sts==1){
        sts_txt='Delete?';
    }else{
        sts_txt='change the status?';
    }

    if(sts==1){
        s_txt='Delete';
    }else if(sts==3){
        s_txt='Complete';
    }else if(sts==4){
        s_txt='No Show';
}

    Swal.fire({  
  title: 'Are you sure you want to '+sts_txt,  
  showDenyButton: true,  
  confirmButtonText: s_txt,  
  denyButtonText: `Cancel`,
}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {
        $.post(url, {
            "csrfToken": tok,
            "appointment_id": id,
            "Status":sts
        }, function(data) {   
            Notiflix.Notify.Success("Deleted Success");        
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
    } else if (result.isDenied) {    
    	
 	}
});
 

    // if (confirm("Are you sure you want to"+sts_txt) === true) {
    //     $.post(url, {
    //         "csrfToken": tok,
    //         "appointment_id": id,
    //         "Status":sts
    //     }, function(data) {
    //         Notiflix.Notify.Success('Deleted Success');
    //         setTimeout(() => {
    //             window.location.reload();
    //         }, 1000);
    //     })
    // }
}
function editAppointment(id){

    Swal.fire({  
  title: 'Are you sure you want to Edit?',  
  showDenyButton: true,  
  confirmButtonText: `Save`,  
  denyButtonText: `Don't save`,
}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {
        var url=window.location.href;
            window.location=url+"/"+id; 
    } else if (result.isDenied) {    
    	
 	}
});

    // if(confirm('Are you sure you want to Edit..?')){
    //     var url=window.location.href;
    //         window.location=url+"/"+id;
    // }
         
        }
function get_date(d,m,y) {

    var tok = GlobalVariables['csrfToken'];

    var cal='<i style="float: right;" class=" ri-calendar-2-line" data-toggle="tooltip" title="Calendar"></i>';
   
    $('#month-cal').html(m+" "+y+" "+cal);
    var url = '<?php echo base_url("index.php/backend_api/get_day") ?>';

    $.post(url, {
        "csrfToken": tok,
        "date": d
    }, function(data) {
        $('.schedule').html(data);
    })

}
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
</script>
<script src="<?= asset_url('assets/js/jquery-migrate-3.4.0.js') ?>">    
</script>   


</script>
<script>
$('.date_inline li > a').click(function() {
    $('li > a > b').removeClass();
    $(this).children('b').addClass('actives');
});

$('#all-cust').on("click",function(){
    window.location="<?php echo base_url('backend/customer_add');  ?>";
})

</script>
