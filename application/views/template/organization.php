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
<script src="<?= asset_url('assets/js/backend_users_providers.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users_secretaries.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>


<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?php echo asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
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

var color = GlobalVariables['color'][0]['color_code'];
// var img = GlobalVariables['image'][0]['image_name'];
// var day = GlobalVariables['days'][0]['value'];
// var cnt = GlobalVariables['count'][0]['value'];
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
<script src="<?= asset_url('assets/js/intlTelInput.js') ?>"></script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">


                        <div class="page-title-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                onclick="show_modal()">Add New +</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- <div class="col-lg-12">
                <div class="card" style="background: #f1f1fc;">
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
            <?php // echo "<pre>";print_r($customers);echo "</pre>"; ?>
            <div class="col-lg-12" id="list-view">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="data-table" class="table table-straped datatable dt-responsive nowrap"
                                data-bs-page-length="5"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Organization Name</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">

                                    <?php  foreach($organization as $row){?>
                                    <tr>



                                        <td><?php echo $row['organization_name'] ?></td>
                                        <td>
                                            <?php echo ($row['Status']==1) ? "<span onclick='update(".$row['organization_id'].",1)' style='cursor:pointer;color:white;background:#00A352' class='badge'>active</span>":"<span onclick='update(".$row['organization_id'].",0)'  style='cursor:pointer;color:white;background:#fb02029e' class='badge'>Inactive</span>"; ?>
                                        </td>
                                        <td id="tooltip-container1">
                                            <a style="color:#000000d1;" href="javascript:void(0);"
                                                onclick="del('<?php echo $row['organization_id']; ?>')"
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







        </div>

    </div>
    <!-- End Page-content -->
    <!--  Modal content for the above example -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="org-form">
                    <div class="modal-body">
                        <div class="col-lg-12" id="list-view">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Organization Name<span class="text-danger">*</span></label>
                                            <input id="organization-type" name="orgname"
                                                onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                class="form-control" placeholder="Organization">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Country<span class="text-danger">*</span></label>
                                            <select class="form-control" name="country" id="org-country">
                                                <option value="">Select Country</option>
                                                <option value="IN">IN</option>
                                                <option value="US">US</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input name="countrycode" id="phone-country" class="form-control required"
                                                maxlength="3" onkeyup="this.value=this.value.replace(/[^+0-9]/g,'')"
                                                placeholder="code">
                                        </div><br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Create Organization</button>
                                        </div>
                                        <br>

                                    </div>

                                </div>


                            </div>
                        </div>
                </form>
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
//document.getElementById('display-color').value = "// echo $color_code[0]['color_code']; ";
//document.getElementById('color1').style.background = color;
//document.getElementById('color1').innerHTML = color;

// if (GlobalVariables['image'] == "user.jpg") {
//     document.getElementById('get-img').src = "// echo base_url('assets/img/upload_img/') " +
//         GlobalVariables['image'];
// } else {
//     document.getElementById('get-img').src = " // echo base_url('assets/img/upload_img/')" + img;
// }
</script>



<script>
$("#org-form").validate({
    rules: {
        orgname: {
            required: true,
            minlength: 3
        },
         countrycode:{
            required: true,
        },
        country: {
            required: true,
        }
    },
    messages: {
        orgname: {
            minlength: "Minimum  3 Characters.",
            required: "Please enter Organization"
        },
         countrycode:{
            required: "Code"
        },
        country: {
            required: "Please Select Country"
        },

    },
    submitHandler: function(form) {
        var url = '<?php  echo base_url("index.php/backend/insert_organization") ?>';
        var data = {
            csrfToken: '<?php echo $this->security->get_csrf_hash(); ?>',
            'organ': $('#organization-type').val(),
            'Status': 1,
            'Country': $('#org-country').val(),
            'Code': $('#phone-country').val()
        };
        $.post(url, data)
            .done(function(response) {
                Notiflix.Notify.Success("Organization Save Success");
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }).fail(function() {
                $('.bs-example-modal-lg').modal('hide');
            });

    }
});










function show_modal() {
    $('#org-form')[0].reset();
    setTimeout(() => {
        var validator = $("#org-form").validate();
        validator.resetForm();
    }, 500);
    $('.bs-example-modal-lg').modal('show');
}

function cancel_form() {
    $('#customer-form')[0].reset();
    $('.bs-example-modal-lg').modal('hide');
}
</script>
<script>
$(document).ready(function() {
    $('#data-table').DataTable({
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [
            [10, 25, ],
            [10, 25]
        ]
    });
});


function del(id) {
    var token = GlobalVariables.csrfToken;
    Swal.fire({
        title: 'Are you sure you want to Delete?',
        showDenyButton: true,
        confirmButtonText: 'Delete',
        denyButtonText: `Cancel`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.post('del_organ', {
                csrfToken: token,
                Id: id
            }, function(data) {
                Notiflix.Notify.Success('Organization Deleted Successfully');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            });
        } else if (result.isDenied) {}
    })


}

function update(id, status) {
    var token = GlobalVariables.csrfToken;
    $.post('update_organ', {
        csrfToken: token,
        Id: id,
        status: status
    }, function(data) {
        Notiflix.Notify.Success('Status Changed Successfully');
        setTimeout(() => {
            window.location.reload();
        }, 1000);
    });
}
var input = document.querySelector("#phone-country");
window.intlTelInput(input, ({
     //options here
}));
  $('.iti__flag-container').click(function() {
        var countryCode = $('.iti__selected-flag').attr('title');
        var countryCode = countryCode.replace(/[^0-9]/g, '')
        $('#phone-country').val("");
        $('#phone-country').val("+" + countryCode);
    });
</script>