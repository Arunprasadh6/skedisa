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
    firstWeekday: <?= json_encode($first_weekday); ?>,
    editAppointment: <?= json_encode($edit_appointment) ?>,
    customers: <?= json_encode($customers) ?>,
    secretaryProviders: <?= json_encode($secretary_providers) ?>,
    calendarView: <?= json_encode($calendar_view) ?>,
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
    BackendUsers.initialize(true);
});


if (GlobalVariables.editAppointment == null) {

} else {
    console.log(GlobalVariables.editAppointment['hash']);
}
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});

var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
var day = GlobalVariables['days'][0]['value'];
var cnt = GlobalVariables['count'][0]['value'];
</script>



<script src="<?= asset_url('assets/js/backend_users_providers.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users_secretaries.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?= asset_url('assets/js/intlTelInput.js') ?>"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div style="float: right;" class="page-title-box d-sm-flex align-items-center justify-content-between">


                        <div class="page-title-right">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                onclick="show_modal()" >Add New +</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
<!-- 
            <div class="col-lg-12">
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
            <?php // echo "<pre>";print_r($providers);echo "</pre>"; ?>
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
                            <table id="data-table" class="table table-straped datatable dt-responsive nowrap"
                                data-bs-page-length="5"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                       
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Provider</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">

                                    <?php foreach($secretaries as $row){?>
                                    <tr>

                                      
                                        <td><a href="javascript: void(0);"
                                                class=" fw-bold"><?php echo $row['first_name']; ?></a> </td>
                                       
                                        <td><?php echo $row['mobile_number'].$row['phone_number']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo empty($row['providers_name'][0]) ? 'NA' : $row['providers_name'][0]; ?>
                                        </td>
                                        <td><span class="badge badge-soft-success font-size-11">Active</span></td>

                                        <td id="tooltip-container1">
                                            <a style="color:#000000d1;" onclick="edit_secretary('<?php echo $row['id']; ?>')"
                                                href="javascript:void(0);" class="me-3 "
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil-outline font-size-18"></i></a>
                                            <a style="color:#000000d1;" href="javascript:void(0);" onclick="delete_secretary('<?php echo $row['id']; ?>')" 
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can-outline font-size-18"></i></a>
                                        </td>
                                    </tr> <?php } ?>

                                </tbody>
                            </table>
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
                    <h5 class="modal-title" id="myLargeModalLabel">Add Secretary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
           <form id="secretary-form">    
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card" style="background: #f1f1fc;">
                            <div class="card-body table-light">
                                <div class="row">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Secretary Details</span>
                                            </a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Password & Access</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" onclick="cancel_form()" class="btn cancel">Cancel</button>&nbsp;
                                        </li>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <li>
                                            <button type="submit" id="save-secretary"
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
                                                            Secretary Information

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

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input type="hidden" id="secretary-id"
                                                                                class="record-id" value="">
                                                                            <label>First Name <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="fname" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"  id="secretary-first-name"
                                                                                class="form-control"
                                                                                placeholder="First Name" />

                                                                            <span style="display:none"
                                                                                id="secretary-org"><?php  echo $this->session->userdata('Organization'); ?></span>
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
                                                                                    <input name="mobile" id="secretary-phone-number"
                                                                                        class="form-control required"
                                                                                        maxlength="10"                                                                                        
                                                                                        placeholder="Primary Mobile"
                                                                                        onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">
                                                                              
                                                                              
                                                                            </div><br>
                                                                       

                                                                        <div class="form-group">
                                                                            <label for="secretary-city">
                                                                                <?= lang('city') ?>
                                                                            </label>
                                                                            <input id="secretary-city"
                                                                                onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                class="form-control" placeholder="City" maxlength="256">
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="secretary-city">
                                                                                Address
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Address"
                                                                                id="secretary-address" />
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Last Name <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="lname" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" id="secretary-last-name"
                                                                                class="form-control"
                                                                                placeholder="Last Name"  />
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="secretary-email">
                                                                                <?= lang('email') ?>
                                                                            </label>
                                                                            <input id="secretary-email"
                                                                                class="form-control " >
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="secretary-state">
                                                                                <?= lang('state') ?>
                                                                            </label>
                                                                            <input id="secretary-state"
                                                                                onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                class="form-control" placeholder="State" >
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                            <label for="secretary-city">
                                                                                Postal Code
                                                                            </label>
                                                                            <input type="text" id="secretary-zip-code"
                                                                                class="form-control"
                                                                                placeholder="Postal Code" />
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="secretary-notifications">
                                                                                <label class="custom-control-label"
                                                                                    for="secretary-notifications">
                                                                                    <?= lang('receive_notifications') ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="secretary-notes">
                                                                                    <?= lang('notes') ?>
                                                                                </label>
                                                                                <textarea id="secretary-notes"
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
                                                            Providers
                                                            <i class=" float-end  ri-arrow-down-s-line"></i>
                                                        </h6>
                                                    </div>
                                                </a>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-bs-parent="#accordion">
                                                    <div class="card-body">
                                                        <h5 id='sid'><?= lang('providers') ?>  <span class="text-danger">*</span></h5>
                                                        <input type="hidden" id="secretary-org1" name="providers" value=""/>
                                                        <input type="hidden" id="service-org" value="" />                                                        
                                                        <div id="secretary-providers" class="card card-body bg-light border-light"></div>
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
                                                    <label>User Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="uname" id="secretary-username" class="form-control"
                                                        placeholder="Name" />
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <input type="password" name="pwd" id="secretary-password" class="form-control"
                                                    placeholder="Password" />
                                            </div>
                                        </div><br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Confirm Password<span class="text-danger">*</span></label>
                                                <input type="password" id="secretary-password-confirm"
                                                    class="form-control" name="cpwd" placeholder="Confirm Password" />
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                                    </form>    
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
// document.getElementById('display-color').value = color;
// document.getElementById('color1').style.background = color;
// document.getElementById('color1').innerHTML = color;

// if (GlobalVariables['image'] == "user.jpg") {
//     document.getElementById('get-img').src = "<?php //echo base_url('assets/img/upload_img/') ?>" +
//         GlobalVariables['image'];
// } else {
//     document.getElementById('get-img').src = "<?php //echo base_url('assets/img/upload_img/') ?>" + img;
// }




</script>
<script>

$("#secretary-form").validate({
    ignore: [],
rules:{	
	fname:{required : true,minlength:3},
    lname:{required:true,minlength:3},
    mobile:{required:true,minlength:10},
    // countrycode:{
    //         required: true,
    //     },
    uname:{required:true,minlength:3},
    pwd:{required:true,minlength:8},
    cpwd:{required:true,minlength:8,equalTo:"#secretary-password"},
   
   

},
messages: {
	fname:{
        minlength:"Minimum  3 Characters.",
		required:"Please enter Firstname"
		},
    lname:{
        minlength:"Minimum  3 Characters.",
		required:"Please enter Lastname"
		},
        // countrycode:{
        //     required: "Code"
        // },
    mobile:{
        minlength:"Minimum  10 Numbers.",
		required:"Please enter Mobile Number"
		},
      
    uname:{
        minlength:"Minimum  3 Characters.",
		required:"Please enter Username"
		},
      
    pwd:{
        minlength:"Minimum  8 Characters.",
		required:"Please enter Password"
		},
    cpwd:{
        minlength:"Minimum  8 Characters.",
		required:"Please enter Confirm Password",
       
		}, 
   

},
submitHandler: function(form){

  
    var url ='<?php  echo base_url("index.php/backend_api/ajax_save_secretary") ?>';
    var secretary = {
                first_name: $('#secretary-first-name').val(),
                MRN: $('#secretary-last-name').val(),
                email: $('#secretary-email').val(),
             //   mobile_number: $('#phone-country').val(),
                phone_number: $('#secretary-phone-number').val(),
                address: $('#secretary-address').val(),
                city: $('#secretary-city').val(),
                state: $('#secretary-state').val(),
                zip_code: $('#secretary-zip-code').val(),
                notes: $('#secretary-notes').val(),
                timezone: $('#secretary-timezone').val(),
                Organization:$('#secretary-org').text(),
                settings: {
                    username: $('#secretary-username').val(),
                    notifications: $('#secretary-notifications').prop('checked'),
                    calendar_view: $('#secretary-calendar-view').val()
                }
            };

            var s1,s2=0;
            // Include secretary services.
            secretary.providers = [];
             var cbox;
            $('#secretary-providers input:checkbox').each(function (index, checkbox) {
                if ($(checkbox).prop('checked')) {
                    secretary.providers.push($(checkbox).attr('data-id'));
                    cbox=$(checkbox).attr('data-id');
                   $('#secretary-org1').val(cbox);
                    s1=1;
                }else{
                     s2=1;
                }
            });

                 var ser=$('#secretary-org1').val();
                    if(ser.length==0){
                        Notiflix.Notify.Warning("Provider Required");
                     return;
                    }
            
                 if(s1 != 1 && s2 == 1){
                $('#secretary-org1').val('');
            }

            if ($('#secretary-password').val() !== '') {
                secretary.settings.password = $('#secretary-password').val();
            }

            // Include ID if changed.
            if ($('#secretary-id').val() !== '') {
                secretary.id = $('#secretary-id').val();
            }

           
            var data = {
    csrfToken: '<?php echo $this->security->get_csrf_hash(); ?>',
    secretary: JSON.stringify(secretary)
};

$.post(url, data)
            .done(function (response) {
                Notiflix.Notify.Success("secretary Save Success");
                $('.bs-example-modal-lg').modal('hide');
                 setTimeout(() => {
                window.location.reload();
            }, 1000);
            }).fail(function(){
                $('.bs-example-modal-lg').modal('hide');      
            });;
}
});




function delete_secretary(id){
    var url ='<?php echo base_url("index.php/backend_api/ajax_delete_secretary") ?>';

    Swal.fire({  
  title: 'Are you sure you want to Delete?',  
  showDenyButton: true,  
  confirmButtonText: 'Delete',  
  denyButtonText: `Cancel`,
}).then((result) => {  
	/* Read more about isConfirmed, isDenied below */  
    if (result.isConfirmed) {
        $.post(url,{ "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',"secretary_id":id},function(data){
        Notiflix.Notify.Success("Delete  Success");
        setTimeout(() => {
                window.location.reload();
            }, 1000);
            })       
    } else if (result.isDenied) {}
});



// if(confirm("Are you sure you want to delete..?")===true){
//     $.post(url,{ "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',"secretary_id":id},function(data){
//         Notiflix.Notify.Success("Delete  Success");
//         setTimeout(() => {
//                 window.location.reload();
//             }, 1000);
// })
// }
}

function show_modal(){
    $('#secretary-form')[0].reset();

    $('.bs-example-modal-lg').modal('show');
    setTimeout(() => {
   var validator = $("#secretary-form").validate();
    validator.resetForm();
    }, 600);
    $('#secretary-password').rules( 'remove', { required: true} );
    $('#secretary-password-confirm').rules( 'remove',{ required: true} );
}

function cancel_form(){
    $('#secretary-form')[0].reset();
    $('.bs-example-modal-lg').modal('hide');
}

$('#pro-img').click(function() {
    $('#img-profile').trigger('click');
    //     setTimeout(() => {
    //     $('#imnm').text($('#img-profile').val());
    //  }, 2000);
});

function edit_secretary(id) {
    var validator = $( "#secretary-form" ).validate();
    validator.resetForm();
    var url = GlobalVariables.baseUrl + '/index.php/backend/get_secretary_data';
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
            $('#secretary-first-name').val(rows[0].first_name);
            $('#secretary-last-name').val(rows[0].MRN);
            $('#secretary-email').val(rows[0].email);
            //$('#phone-country').val(rows[0].mobile_number);
            $('#secretary-phone-number').val(rows[0].phone_number);
            $('#secretary-address').val(rows[0].address);
            $('#secretary-city').val(rows[0].city);
            $('#secretary-state').val(rows[0].state);
            $('#secretary-zip-code').val(rows[0].zipcode);
            $('#secretary-notes').val(rows[0].notes);
            $('#secretary-timezone').val(rows[0].timezone);
            $('#secretary-org').text();
            $('#secretary-id').val(rows[0].id);
           
            $('#secretary-username').val(rows[0].settings.username);

            $('#secretary-notifications').val(rows[0].settings.calendar_view.notifications);
            $('#secretary-calendar-view').val(rows[0].settings.calendar_view);
          
            rows[0].providers.forEach(function(sid) {
                var $checkbox = $('#secretary-providers input[data-id="' + sid + '"]');
                if (!$checkbox.length) {
                    return;
                }
                $checkbox.prop('checked', true);

            });
        });
        $('#secretary-password').rules( 'remove', 'required' );
    $('#secretary-password-confirm').rules( 'remove', 'required' );
}



$('#img-profile').change(function() {
    var url = GlobalVariables.baseUrl + '/index.php/backend_api/upload_provider_pic';
    var formdata = new FormData();
    var pid = $('#secretary-id').val();
    if (pid.length > 0) {
        var file = this.files[0];
        var tok = $('#tok').val();
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
    });

    // $('.iti__flag-container').click(function() { 
    //       var countryCode = $('.iti__selected-flag').attr('title');
    //       var countryCode = countryCode.replace(/[^0-9]/g,'')
    //       $('#phone-country').val("");
    //       $('#phone-country').val("+"+countryCode);
    //    });
});
</script>