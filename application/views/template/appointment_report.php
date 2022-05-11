<!-- body[data-sidebar=dark] .mm-active>a {
    color: #4e49d6!important;
    background: #f1f1fc;
    border-right: 3px solid #4e49d6;
} -->
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

            <!-- <div class="col-lg-12">
                <div class="card" style="background: #f1f1fc;">
                    <div class="card-body table-light">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Search by name or phone number" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-12" id="list-view">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="data-table" class="table table-straped datatable dt-responsive nowrap" data-bs-page-length="5"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>

                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Provider Name</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <!--
0--start
1--cancel
2---cancel
3 complete
4 no show 

 -->


                                    <?php  foreach($reports as $row){
                                       
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


                                        <td><?php  echo date('h:i:s',strtotime($row['start_datetime'])); ?></td>
                                        <td><?php  echo date('d-m-Y',strtotime($row['start_datetime'])); ?></td>
                                        <td><?php  echo empty($row['customers'][0]['first_name']) ? 'NA':$row['customers'][0]['first_name']; ?>
                                        </td>
                                        <td><?php echo empty($row['customers'][0]['phone_number']) ? 'NA':$row['customers'][0]['phone_number']; ?>
                                        </td>
                                        <td><?php echo empty($row['providers'][0]) ? 'NA':$row['providers'][0]; ?></td>
                                        <td><?php echo "General Medicine"; ?></td>
                                        <td><span style="<?php echo $color; ?>"
                                                class="badge  font-size-11"><?php echo $text; ?></span></td>
                                                
                                        <td id="tooltip-container1">
                                        <?php  if( date('Y-m-d',strtotime($row['start_datetime'])) > date('Y-m-d') ) { ?>
                                            <a style="color:#000000d1;" href="javascript:void(0);" class="me-3 "
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil-outline font-size-18"></i></a>
                                                    <?php } ?>  
                                                    <?php  if($row['Status']==0){ ?>                  
                                            <a style="color:#000000d1;" href="javascript:void(0);" onclick="delete_appointment('<?php echo $row['id']; ?>')" 
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can-outline font-size-18"></i></a> <?php } ?>
                                        </td>
                                    </tr> <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="grid-view" style="display:none">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($available_services as $row){ ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-truncate font-size-14 mb-2"><?php echo $row['name']; ?>
                                                </p>
                                                <h4 class="mb-0"><?php echo $row['price']; ?></h4>
                                            </div>
                                            <div class="text-primary ms-auto">
                                                <?php echo $row['availabilities_type']; ?>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="card-body border-top py-3">
                                        <div class="text-truncate">
                                            <span class="text-muted ms-2"> <?php echo "Ortho"; ?></span>
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

<!-- <script defer src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script defer  src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script defer src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script defer src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script> -->
<script>
    $(document).ready(function() {
        
   
    $('#data-table thead th').each( function (i) {
       var title = $(this).text();
     if(title=="Date"){
     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
       }
       if(title=="Customer Name"){
     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
       }   
    });

    var table = $('#data-table').DataTable({
        "lengthMenu": [[10, 25,], [10, 25]],
        "ordering": false,
        "bSortClasses": false,
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
   
});

function delete_appointment(id){
    var tok=GlobalVariables['csrfToken'];
    var url ='<?php echo base_url("index.php/backend_api/ajax_delete_appointment") ?>';

    Swal.fire({  
  title: 'Are you sure you want to Delete?',  
  showDenyButton: true,  
  confirmButtonText: 'Delete',  
  denyButtonText: `Cancel`,
}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {
        $.post(url,{ "csrfToken": tok,"appointment_id":id},function(data){
        Notiflix.Notify.Success('Deleted Success');
        setTimeout(() => {
                window.location.reload();
            }, 1000);
})
    } else if (result.isDenied) {}
});



}
</script>