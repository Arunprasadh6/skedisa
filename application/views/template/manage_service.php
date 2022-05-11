
<style>
    .form-group.has-error{
        border-color:red;
    }
    span#list {
    text-align: center;
    font-size: 17px;
}
span#grid {
    font-size: 17px;
    display: inline-flex;
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
    services: <?= json_encode($services) ?>,
    categories: <?= json_encode($categories) ?>,
    timezones: <?= json_encode($timezones) ?>,
    color: <?= json_encode($color_code) ?>,
    user: {
        id: <?= $user_id ?>,
        email: <?= json_encode($user_email) ?>,
        timezone: <?= json_encode($timezone) ?>,
        role_slug: <?= json_encode($role_slug) ?>,
        privileges: <?= json_encode($privileges) ?>
    }
};

$(function() {
    BackendServices.initialize(true);
});

if (GlobalVariables.editAppointment == null) {

} else {
    console.log(GlobalVariables.editAppointment['hash']);
}
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});
</script>
<script src="<?= asset_url('assets/js/backend_services_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_categories_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_services.js') ?>"></script>
<script src="<?= asset_url('assets/js/jquery.validate.min.js') ?>"></script>
<style>
.modal-header {
    background: #d9d8f5;
}

button.btn.cancel {
    background: #C9C8D6;
    border: 1px #BEBEBE;
    color: white;
}

button.btn.save {
    background: #4E49D6;
    border: 1px #BEBEBE;
    color: white;
}
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div style="float: right;" class="page-title-box d-sm-flex align-items-center justify-content-between">


                        <div class="page-title-right">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                   onclick="show_modal()">Add New +</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- <div class="col-lg-12">
                <div class="card" style="background: #f1f5f7;box-shadow: 1px 0px 8px 2px rgb(0 0 0 / 8%);">
                    <div class="card-body table-light">
                        <div class="row">
                            <div class="col-md-2">
                                <span id="list">
                                    <a href='javascript:void(0)'> <i class="ri-menu-line"> List View</i></a>
                                </span>&nbsp;&nbsp;
                            </div>
                            <div class="col-md-2">
                                <span id="grid">
                                    <a href='javascript:void(0)'> <i class="ri-grid-line"> Grid View</i></a>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search by Name" />
                                </div>
                            </div>
                            <div class="col-md-4 text-center">

                               
                                
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

                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Duration</th>
                                        <th>Charges</th>
                                        <th>Currency</th>
                                        <th>Availability Type</th>
                                        <th>Attendees</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">

                                    <?php 
                                 
                                    foreach($services as $row){?>
                                    <tr>


                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo empty($row['department']) ? 'NA':$row['department']; ?></td>
                                        <td><?php echo $row['duration']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo $row['currency']; ?></td>
                                        <td><?php echo $row['availabilities_type']; ?></td>
                                        <td><?php echo $row['attendants_number']; ?></td>
                                        <td id="tooltip-container1">
                                            <a style="color:#000000d1;" href="javascript:void(0);" class="edit"
                                                data-id="<?php echo $row['id']; ?>" 
                                                class="me-3 "
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                onclick="edit_service('<?php echo $row['id']; ?>','<?php echo $row['name']; ?>','<?php echo $row['duration']; ?>','<?php echo $row['price']; ?>', '<?php echo $row['currency']; ?>', '<?php echo $row['availabilities_type']; ?>','<?php echo $row['attendants_number']; ?>','<?php echo $row['department']; ?>')" class="mdi mdi-pencil-outline font-size-18"></i></a>
                                                
                                            <a style="color:#000000d1;" href="javascript:void(0);" onclick="delete_service('<?php echo $row['id']; ?>')" 
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can-outline font-size-18"></i></a>
                                        </td>
                                    </tr> <?php  } ?>

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
    <!--  Modal content for the above example -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5  class="modal-title" id="myLargeModalLabel">Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
             <form id="service-form">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="services">
                                <div class="row">
                                <div class="form-message alert" style="display:none;"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">                                            
                                            <label>Name <b style="color:red">*</b></label>
                                            <input type="text"  maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" id="service-name" name="service_name" class="form-control "
                                                placeholder="Name" />
                                                <span id="service-org"
                                                style="display:none"><?php echo $this->session->userdata('Organization'); ?></span>
                                                <input type="hidden" id="service-id" value="" >
                                        </div><br>
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <input type="text" value="INR" id="service-currency" class="form-control"
                                                placeholder="Name" />
                                        </div><br>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" id="service-location" class="form-control"
                                                placeholder="Location" />
                                        </div> <br>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Duration (Minutes)<b style="color:red">*</b></label>
                                            <input type="text" maxlength="2" name="ser_duration" id="service-duration" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control "
                                                placeholder="Duration" />
                                        </div><br>
                                        <div class="form-group">
                                            <label>Availabilities Type</label>
                                            <select id="service-availabilities-type" class="form-control ">
                                                <option value="fixed">fixed</option>
                                                <option value="flexible">flexible</option>
                                            </select>
                                        </div><br>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select id="department" class="form-control ">
                                                <option value="medicine">medicine</option>
                                                <option value="surgery">surgery</option>
                                                <option value="skin">skin</option>
                                                <option value="dental">dental</option>
                                                <option value="eye">eye</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>price<b style="color:red">*</b></label>
                                            <input type="text" name="price" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" id="service-price" class="form-control"
                                                placeholder="price" />
                                        </div><br>
                                        <div class="form-group">
                                            <label>Attendants Number <b style="color:red">*</b></label>
                                            <input id="service-attendants-number" name="attendees" maxlength="1" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" type="text" class="form-control required"
                                                placeholder="Attendants" />
                                        </div>
                                    </div><br>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="service-description" class="form-control"></textarea>
                                        </div><br>
                                    </div>
                                </div>
                                <div class="col-md-3" style="float:right">
                                    <button type="button" onclick="cancel_form()" class="btn cancel">Cancel</button>
                                    <button type="submit"  class="btn save">Save</button>
                                </div>
                            </div>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
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

$("#service-form").validate({
rules:{	
	service_name:{required : true,minlength:3},
    ser_duration:{required:true},
    price:{required:true},
    attendees:{required:true},
},
messages: {
	service_name:{
        minlength:"Please enter 3 Characters.",
		required:"Please enter service"
		},
      ser_duration:{required:"Please Enter Duration."},
      price:{required:"Please Enter price."},
      attendees:{required:"Please Enter Attendees."}
},
submitHandler: function(form){
   
    var url ='<?php echo base_url("index.php/backend_api/ajax_save_service") ?>';
    var service = {
                name: $('#service-name').val(),
                duration: $('#service-duration').val(),
                price: $('#service-price').val(),
                currency: $('#service-currency').val(),
                description: $('#service-description').val(),
                location: $('#service-location').val(),
                availabilities_type: $('#service-availabilities-type').val(),
                attendants_number: $('#service-attendants-number').val(),
                department: $('#department').val(),
                Organization:$('#service-org').text()
            };
            if($('#service-id').val() !== '') {
                service.id = $('#service-id').val();
            }

           
            var data = {
    csrfToken: '<?php echo $this->security->get_csrf_hash(); ?>',
    service: JSON.stringify(service)
};

$.post(url, data)
            .done(function (response) {
                $('.bs-example-modal-lg').modal('hide'); 
                Notiflix.Notify.Success("Service Save Success");                         
                 setTimeout(() => {
                window.location.reload();
            }, 1000);
            }).fail(function(){
                $('.bs-example-modal-lg').modal('hide');      
            });
}
});

function show_modal(){
    $('#service-form')[0].reset();
    $('.bs-example-modal-lg').modal('show');
    setTimeout(() => {
        var validator = $("#service-form").validate();
    validator.resetForm();
    }, 500);
}

function delete_service(id){
    var url ='<?php echo base_url("index.php/backend_api/ajax_delete_service") ?>';

    Swal.fire({  
  title: 'Are you sure you want to Delete?',  
  showDenyButton: true,  
  confirmButtonText: 'Delete',  
  denyButtonText: `Cancel`,
}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {
        $.post(url,{ "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',"service_id":id},function(data){
        Notiflix.Notify.Success("Deleted  Success");
        setTimeout(() => {
                window.location.reload();
            }, 1000);
})
    } else if (result.isDenied) {}
});


// if(confirm("Are you sure you want to delete..?")===true){
//     $.post(url,{ "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',"service_id":id},function(data){
//         Notiflix.Notify.Success("Deleted  Success");
//         setTimeout(() => {
//                 window.location.reload();
//             }, 1000);
// })
// }else{

// }    
   
}

function edit_service(id,name,dur,price,cur,type,attend,dept){
    setTimeout(() => {
        var validator = $("#service-form").validate();
    validator.resetForm();
    }, 500);
   
                 $('#service-id').val(id);
                 $('#service-name').val(name);
                 $('#service-duration').val(dur);
                 $('#service-price').val(price);
                 $('#service-currency').val(cur);
                 $('#service-availabilities-type').val(type);
                $('#service-attendants-number').val(attend);
                $('#department').val(dept);
                $('#service-org').text();
                 $('.form-message').css("display","none");   
                 $('.bs-example-modal-lg').modal('show');
}
     

    //  $('#save-service').on('click', function () {

 
    //  });

 
function cancel_form(){
    $('#service-form')[0].reset();
    $('.bs-example-modal-lg').modal('hide');
}
</script>
<script>
    $(document).ready(function() {
    $('#data-table').DataTable({
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [[10, 25,], [10, 25]]
    });
});
</script>