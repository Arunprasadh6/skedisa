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
    timezones: <?= json_encode($timezones) ?>,
    color: <?= json_encode($color_code) ?>,
    image: <?= json_encode($image) ?>,


    user: {
        id: <?= $user_id ?>,
        email: <?= json_encode($user_email) ?>,
        timezone: <?= json_encode($timezone) ?>,
        role_slug: <?= json_encode($role_slug) ?>,
        privileges: <?= json_encode($privileges) ?>
    },


};

// $(function() {
//     BackendSettings.initialize(true);
//     BackendUsers.initialize(true);
// });
$(function() {
    BackendCalendar.initialize(GlobalVariables.calendarView);
});

var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
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
                    <div style="float: right;"
                        class="page-title-box d-sm-flex align-items-center justify-content-between">


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

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">

                                    <?php
                                 
                                    foreach($customers as $row){
                                       
                                        ?>
                                    <tr>


                                        <td><a href="javascript: void(0);"
                                                class=" fw-bold"><?php echo $row['first_name']; ?></a> </td>

                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['mobile_number'].$row['phone_number']; ?></td>
                                        <td><span class="badge badge-soft-success font-size-11">Active</span></td>

                                        <td id="tooltip-container1">
                                            <a style="color:#000000d1;"
                                                onclick="edit_customer('<?php echo $row['id']; ?>')"
                                                href="javascript:void(0);" class="me-3 "
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil-outline font-size-18"></i></a>
                                            <a style="display:none" style="color:#000000d1;" href="javascript:void(0);"
                                                onclick="delete_customer('<?=  $row['id']; ?>')"
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
                    <h5 class="modal-title" id="myLargeModalLabel">Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="customer-form">
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
                                                    <span class="d-none d-sm-block">Customer Details</span>
                                                </a>
                                            </li>


                                            <li>
                                                <button type="button" onclick="cancel_form()"
                                                    class="btn cancel">Cancel</button>&nbsp;
                                            </li>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <li>
                                                <button type="submit" id="save-admin"
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
                                                                Customer Information

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

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input type="hidden" id="customer-id"
                                                                                    class="record-id" value="">
                                                                                <label>First Name <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="fname"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    id="first-name" class="form-control"
                                                                                    placeholder="First Name" />

                                                                                <span style="display:none"
                                                                                    id="org"><?php  echo $this->session->userdata('Organization'); ?></span>
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
                                                                                </div> -->
                                                                                
                                                                                    <input name="mobile" id="phone-number-cnt"
                                                                                        class="form-control required"
                                                                                        maxlength="10"
                                                                                        placeholder="Primary Mobile"
                                                                                        onkeyup="this.value=this.value.replace(/[^0-9]/g,'')">                                                                              
                                                                               
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="city">
                                                                                    <?= lang('city') ?>
                                                                                </label>
                                                                                <input id="city"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    class="form-control"
                                                                                    placeholder="City" maxlength="256">
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="city">
                                                                                    Address
                                                                                </label>
                                                                                <input type="text" placeholder="Address"
                                                                                    class="form-control"
                                                                                    placeholder="Address"
                                                                                    id="address" />
                                                                            </div>
                                                                            <br>


                                                                        </div><br>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Last Name <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input name="lname" type="text"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    id="last-name" class="form-control"
                                                                                    placeholder="Last Name" />
                                                                            </div><br>
                                                                            <!-- <div class="form-group">
                                                                                <label>Password <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="password" name="pwd"
                                                                                    id="customer-password"
                                                                                    class="form-control"
                                                                                    placeholder="Password" />
                                                                            </div><br> -->
                                                                            <div class="form-group">
                                                                                <label for="email">
                                                                                    <?= lang('email') ?>
                                                                                </label>
                                                                                <input id="email" class="form-control"
                                                                                    placeholder="Email">
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="state">
                                                                                    <?= lang('state') ?>
                                                                                </label>
                                                                                <input id="state"
                                                                                    onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                                                                    class="form-control"
                                                                                    placeholder="State">
                                                                            </div><br>
                                                                            <div class="form-group">
                                                                                <label for="city">
                                                                                    Postal Code
                                                                                </label>
                                                                                <input type="text" maxlength="7"
                                                                                    onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
                                                                                    id="zip-code" class="form-control"
                                                                                    placeholder="Postal Code" />

                                                                            </div>


                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="notes">
                                                                                        <?= lang('notes') ?>
                                                                                    </label>
                                                                                    <textarea id="notes"
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


                                            </div>


                                        </div>
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
$("#customer-form").validate({
    rules: {
        fname: {
            required: true,
            minlength: 3
        },
        lname: {
            required: true,
            minlength: 3
        },
        // countrycode:{
        //     required: true,
        // },
        mobile: {
            required: true,
            minlength: 10
        },

        // pwd: {
        //     required: true,
        //     minlength: 8
        // },



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
        // countrycode:{
        //     required: "Code"
        // },
        mobile: {
            minlength: "Minimum  10 Numbers.",
            required: "Please enter Mobile Number"
        },

        // pwd: {
        //     minlength: "Minimum  8 Characters.",
        //     required: "Please enter Password"
        // }



    },
    submitHandler: function(form) {


        var url = '<?php  echo base_url("index.php/backend_api/ajax_save_customer") ?>';
        var customer = {
            first_name: $('#first-name').val(),
            MRN: $('#last-name').val(),
            email: $('#email').val(),
           // mobile_number:$('#phone-country').val(),
            phone_number: $('#phone-number-cnt').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            zip_code: $('#zip-code').val(),
            notes: $('#notes').val(),
            timezone: $('#timezone').val(),
            Organization: $('#org').text(),

            language: $('#language').val() || 'english'
        };

        if ($('#customer-id').val()) {
            customer.id = $('#customer-id').val();
        }
        // if ($('#customer-id').val()) {
        //  $('#customer-password').removeClass('required');    
        // }


        var data = {
            csrfToken: '<?php echo $this->security->get_csrf_hash(); ?>',
            customer: JSON.stringify(customer)
        };

        $.post(url, data)
            .done(function(response) {
                Notiflix.Notify.Success("customer Save Success");
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            });
    }
});




function delete_customer(id) {
    var url = '<?php echo base_url("index.php/backend_api/ajax_delete_customer") ?>';
    if (confirm("Are you sure you want to delete..?") === true) {
        $.post(url, {
            "csrfToken": '<?php echo $this->security->get_csrf_hash(); ?>',
            "customer_id": id
        }, function(data) {
            Notiflix.Notify.Success('Deleted Success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }).fail(function() {
            $('.bs-example-modal-lg').modal('hide');
        });
    }
}




function edit_customer(id) {

    //  $('#customer-password').rules( 'remove', 'required' );
    var url = GlobalVariables.baseUrl + '/index.php/backend/get_customer_data';
    //$('#img').css("display", "block");
    var data = {
        csrfToken: GlobalVariables.csrfToken,
        id: id
    };


    $.post(url, data)
        .done(function(response) {
            var rows = JSON.parse(response);

            //   console.log(rows);
            $('.bs-example-modal-lg').modal('show');

            $('#first-name').val(rows[0].first_name);
            $('#last-name').val(rows[0].MRN);
            $('#email').val(rows[0].email);
          //  $('#phone-country').val(rows[0].mobile_number)
            $('#phone-number-cnt').val(rows[0].phone_number);
            $('#address').val(rows[0].address);
            $('#city').val(rows[0].city);
            $('#state').val(rows[0].state);
            $('#zip-code').val(rows[0].zipcode);
            $('#notes').val(rows[0].notes);
            $('#timezone').val(rows[0].timezone);
            $('#customer-id').val(rows[0].id);
        });
    setTimeout(() => {
        var validator = $("#customer-form").validate();
        validator.resetForm();
    }, 600);

}

function show_modal() {
    $('#customer-form')[0].reset();
    $('.bs-example-modal-lg').modal('show');
    setTimeout(() => {
        var validator = $("#customer-form").validate();
        validator.resetForm();
    }, 600);

    // $('#customer-password').rules( 'remove', { required: true} );


}

function cancel_form() {
    $('#customer-form')[0].reset();
    $('.bs-example-modal-lg').modal('hide');
}
</script>
<script>
// var input = document.querySelector("#phone-country");
// window.intlTelInput(input, ({
//     // options here
// }));
$(document).ready(function() {
    $('#data-table').DataTable({
        "ordering": false,
        "bSortClasses": false,
        "lengthMenu": [
            [10, 25, ],
            [10, 25]
        ]
    });

    // $('.iti__flag-container').click(function() {
    //     var countryCode = $('.iti__selected-flag').attr('title');
    //     var countryCode = countryCode.replace(/[^0-9]/g, '')
    //     $('#phone-country').val("");
    //     $('#phone-country').val("+" + countryCode);
    // });


});

var tok = GlobalVariables['csrfToken'];
$.post('getorgan', {
    csrfToken: tok
}, function(data) {
    var rows = JSON.parse(data);
    var sel = $("#ogan");
    $('#ogan').addClass('required');
    for (var i = 0; i < rows.length; i++) {
        sel.append('<option value="' + rows[i].organization_id + '">' + rows[i].organization_name +
            '</option>');
    }
});
</script>