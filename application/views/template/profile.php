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

#before span {
    text-align: center;
    font-weight: 600;
    font-size: 18px;
    color: #000000cf;
}
</style>
<style>
input,
textarea {

    padding: 8px 0px 8px 0px !important;
    width: 100%;
    border-radius: 0 !important;
    box-sizing: border-box;
    border: none !important;
    border-bottom: 1px solid #F3E5F5 !important;
    font-size: 18px !important;
    color: #000 !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border-bottom: 1px solid #D32F2F !important;
    outline-width: 0;
    font-weight: 400
}


.form-group {
    position: relative;
    margin-bottom: 1.5rem
}

.form-control-placeholder {
    position: absolute;
    top: 5px;
    padding: 7px 0 0 0;
    transition: all 300ms;
    opacity: 0.5
}

.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder {
    font-size: 80%;
    transform: translate3d(0, -100%, 0);
    opacity: 1
}

.form-control {
    background-color: #f1f5f7;
}
</style>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_system.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/backend_settings_user.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
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
    // BackendUsers.initialize(true);
});


var color = GlobalVariables['color'][0]['color_code'];
var img = GlobalVariables['image'][0]['image_name'];
var day = GlobalVariables['days'][0]['value'];
var cnt = GlobalVariables['count'][0]['value'];
</script>
<div class="main-content" style="background-color: #f1f5f7;">

    <div class="page-content">
        <div class="container-fluid">




            <div style="background:#f1f5f7" class="tab-content text-muted" id="before">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-3" style="text-align:center;float:right">
                            <h4 style="text-align:center"><b>My Account</b></h4><BR><BR><BR>
                        </div>
                        <div class="col-md-2" style="text-align:center">
                            <?php 
                      
                          
                      
                      function facebook_time_ago($timestamp)  
                      {  
                           $time_ago = strtotime($timestamp);  
                           $current_time = time();  
                           $time_difference = $current_time - $time_ago;  
                           $seconds = $time_difference;  
                           $minutes      = round($seconds / 60 );           // value 60 is seconds  
                           $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
                           $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
                           $weeks          = round($seconds / 604800);          // 7*24*60*60;  
                           $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
                           $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
                           if($seconds <= 60)  
                           {  
                          return "Just Now";  
                        }  
                           else if($minutes <=60)  
                           {  
                          if($minutes==1)  
                                {  
                            return "one minute ago";  
                          }  
                          else  
                                {  
                            return "$minutes minutes ago";  
                          }  
                        }  
                           else if($hours <=24)  
                           {  
                          if($hours==1)  
                                {  
                            return "an hour ago";  
                          }  
                                else  
                                {  
                            return "$hours hrs ago";  
                          }  
                        }  
                           else if($days <= 7)  
                           {  
                          if($days==1)  
                                {  
                            return "yesterday";  
                          }  
                                else  
                                {  
                            return "$days days ago";  
                          }  
                        }  
                           else if($weeks <= 4.3) //4.3 == 52/12  
                           {  
                          if($weeks==1)  
                                {  
                            return "a week ago";  
                          }  
                                else  
                                {  
                            return "$weeks weeks ago";  
                          }  
                        }  
                            else if($months <=12)  
                           {  
                          if($months >=6)  
                                {  
                            return '
                            <div class="  waves-effect waves-light membership" style="background: #7C624A;border-color: #7C624A;border-radius: 5px;padding: 2px;cursor: unset;">
                               <span style="font-size: 14px;color:white">Wood Member</span>
                           </div>
                            ';  
                          }
                          else if($months >= 12){
                            return "$months monthy ago";
                          }  
                                else  
                                {  
                            return "$months monthss ago";  
                          }  
                        }  
                           else  
                           {  
                          if($years==1)  
                                {  
                            return  '
                            <div class="  waves-effect waves-light membership" style="background: #CD7F32;border-color: #CD7F32;border-radius: 5px;padding: 2px;cursor: unset;">
                               <span style="font-size: 14px;color:white">Bronze Member</span>
                           </div>
                            ';    
                          }
                          elseif($years==2){
                           return  '
                           <div class="  waves-effect waves-light membership" style="background: #C5C5C5;border-color: #C5C5C5;border-radius: 5px;padding: 2px;cursor: unset;">
                              <span style="font-size: 14px;color:white">Silver Member</span>
                          </div>
                           '; 
                          }  
                          elseif($years==3){
                           return  '
                           <div class="  waves-effect waves-light membership" style="background: gold;border-color: gold;border-radius: 5px;padding: 2px;cursor: unset;">
                              <span style="font-size: 14px;color:white">Gold Member</span>
                          </div>
                           '; 
                          } 
                          elseif($years==4){
                           return  '
                           <div class=" waves-effect waves-light membership" style="background: #E5E4E2;border-color: #E5E4E2;border-radius: 5px;padding: 2px;cursor: unset;">
                              <span style="font-size: 14px;color:white">Platinum Member</span>
                          </div>
                           '; 
                          } 
                               
                        }  
                      }
                     
                   
                    ?>
                        </div>


                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3" style="text-align:center">
                            <div class="form-group">
                                <img src="../assets/img/upload_img/<?php echo empty($user_details['Images']) ? 'user.jpg':$user_details['Images']; ?>"
                                    style="width:100px;height:100px;border-radius:50px">
                            </div>

                            <div class="form-group" style="margin-bottom: 10px;">
                                <span id="first-name-label"></span>
                                <span id="last-name-label" style="font-size:18px;font-weight :600"></span>
                            </div>
                            <div class="form-group">
                                <?php echo "<strong>Member Since: ".date('M-Y',strtotime($user_details['Create_date']))."</strong>";   ?>
                            </div><BR>
                            <div class="form-group">
                                <?php echo facebook_time_ago($user_details['Create_date']);   ?>
                            </div>
                            <br>

                        </div>
                        <div class="col-md-3"><BR>

                            <div class="form-group">
                                <label for="username"><?= lang('username') ?></label><BR>
                                <span id="username-label"></span>
                            </div><BR>

                            <div class="form-group">
                                <label for="email"><?= lang('email') ?> </label><BR>
                                <span id="email-label"></span>
                            </div><BR>
                            <!-- <div class="form-group">
                                <label for="notes"><?//= lang('notes') ?></label><BR>
                                <span id="notes-label"></span>
                            </div><BR> -->

                            <div class="form-group">
                                <label for="phone-number"><?= lang('phone_number') ?> </label><BR>
                                <span id="phone-number-label"></span>
                            </div><BR>






                        </div>
                        <div class="col-md-3"><BR>
                            <div class="form-group">
                                <label for="address"><?= lang('address') ?></label><BR>
                                <span id="address-label"></span>
                            </div><BR>
                            <div class="form-group">
                                <label for="city"><?= lang('city') ?></label><BR>
                                <span id="city-label"></span>&nbsp;-&nbsp;<span id="zip-code-label"></span>
                            </div><BR>
                            <div class="form-group">
                                <label for="state"><?= lang('state') ?></label><BR>
                                <span id="state-label"></span>
                            </div><BR>



                        </div>

                        <div class="col-md-3"><BR>
                            <div class="btn btn-primary  waves-effect waves-light membership" style="background: #4e49d6;
    border-color: #4e49d6;"><span id="editclick" style="font-size: 14px;color: white;">Edit Profile</span></div>



                        </div>


                    </div>
                </div>
            </div>








            <script>
            $('#editclick').on("click", function() {
                $('#before').css("display", "none");
                $('#after').css("display", "block");
            })
            </script>








            <div style="background:#f1f5f7;display:none" class="tab-content p-3 text-muted" id="after">
                <div class="col-md-12">
                    <form id="gen-user" enctype="multipart/form-data">
                    <div class="row">
                        <div class="row">

                            <fieldset class="col-12 col-sm-6 personal-info-wrapper">
                                <legend class="border-bottom mb-4">
                                    <?= lang('personal_information') ?>
                                </legend>

                                <input type="hidden" id="user-id">

                                <div class="form-group mt-5">
                                    <input id="first-name" name="fname" readonly
                                        onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')"
                                        style="background-color: #f1f5f7;" class="form-control "><label
                                        class="form-control-placeholder" style=" top: -20px;" for="first-name"
                                        style="top:26px"><?= lang('first_name') ?>
                                        <span class="text-danger">*</span></label>
                                </div>


                                <div class="form-group mt-5">
                                    <input id="last-name" readonly name="lname" style="background-color: #f1f5f7;"
                                        onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" class="form-control"
                                        >
                                    <label class="form-control-placeholder" style=" top: -20px;" readonly for="last-name"><?= lang('last_name') ?>
                                        <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" id="username"
                                        class="form-control ">
                                    <label class="form-control-placeholder" name="username" for="username"><?= lang('username') ?>
                                        <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" type="password" name="pwd" id="password"
                                        class="form-control" autocomplete="new-password">
                                    <label class="form-control-placeholder"
                                        for="password"><?= lang('password') ?></label>
                                </div>

                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" type="password" 
                                        id="retype-password" class="form-control" name="cpwd" autocomplete="new-password">
                                    <label class="form-control-placeholder"
                                        for="retype-password"><?= lang('retype_password') ?></label>
                                </div>
                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" readonly id="email" class="form-control" >
                                    <label class="form-control-placeholder" for="email"><?= lang('email') ?> </label>
                                </div>                               
                            </fieldset>

                            <fieldset class="col-12 col-sm-6 miscellaneous-wrapper">
                                <legend class="border-bottom mb-4">
                                    <!--<?= lang('system_login') ?>-->
                                    <?php if ($privileges[PRIV_USER_SETTINGS]['edit'] == TRUE): ?>
                                    <button type="submit" style="float: right;font-size: 14px;"
                                        class="save-settings-user btn btn-primary btn-sm mb-2"
                                        data-tippy-content="<?= lang('save') ?>">
                                        <i class="fas fa-check-square mr-2"></i>
                                        <?= lang('save') ?>
                                    </button>
                                    <?php endif ?>
                                </legend>



                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" name="mobile" readonly id="phone-number-cnt" maxlength="13"
                                        onkeyup="this.value=this.value.replace(/[^+0-9]/g,'')" class="form-control"
                                        >
                                    <label for="phone-number-cnt"
                                        class="form-control-placeholder" style=" top: -20px;"><?= "Phone Number ";?> <span
                                            class="text-danger">*</span></label>

                                           
                                </div>

                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" disabled id="address" class="form-control"
                                        autocomplete="address">
                                    <label class="form-control-placeholder" style="top:-15px;"
                                        for="address"><?= lang('address') ?></label>
                                </div>
                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" id="city" class="form-control">
                                    <label class="form-control-placeholder" for="city"><?= lang('city') ?></label>

                                </div>
                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" id="state"
                                        onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" class="form-control">
                                    <label class="form-control-placeholder" for="state"><?= lang('state') ?></label>
                                </div>

                                <div class="form-group mt-5">
                                    <input style="background-color: #f1f5f7;" id="zip-code" maxlength="6"
                                        onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control">
                                    <label class="form-control-placeholder" for="zip-code">
                                        <?php echo "Pincode"; ?></label>
                                </div>

                                <div class="form-group mt-5">
                                    
                                <img src="../assets/img/upload_img/<?php echo empty($user_details['Images']) ? 'user.jpg':$user_details['Images']; ?>"
                                      id="pro-img" for="img-profiless" /><br>
                                 <label id="imnm">upload picture</label>
                                <input type="file" name="image"  style="display:none" id="propic" />
                                </div>

                                


                                <div class="form-group" style="display:none">
                                    <label for="calendar-view"><?= lang('calendar') ?> <span
                                            class="text-danger">*</span></label>
                                    <select id="calendar-view" class="form-control ">
                                        <option value="default">Default</option>
                                        <option value="table">Table</option>
                                    </select>
                                </div>

                                <div class="form-group" style="display:none">
                                    <label for="timezone"><?= lang('timezone') ?></label>
                                    <?= render_timezone_dropdown('id="timezone" class="form-control"') ?>
                                </div>

                                <div class="custom-control custom-switch" style="display:none">
                                    <input type="checkbox" class="custom-control-input" id="user-notifications">
                                    <label class="custom-control-label" for="user-notifications">
                                        <?= lang('receive_notifications') ?>
                                    </label>
                                </div>
                            </fieldset>




                        </div>

                    </div>
                                    </form>
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

$("#gen-user").validate({
    rules: {
        // fname: {
        //     required: true            
        // },
        // lname: {
        //     required: true          
        // },
        // mobile: {
        //     required : true, 
        //     minlength: 10         
        // },
        cpwd:{equalTo:"#password"},
        username: {
            required : true          
        }
    },
    messages: {
        // fname: {           
        //     required  : "Please enter Firstname"
        // },
        // lname: {           
        //     required  : "Please enter Lastname"
        // },
        // mobile: {           
        //     required  : "Please enter Mobile",
        //     minlength: "Minimum  10 Characters.",
        // },
        username: {           
            required : "Please enter Usermame"
        },
       
    },
    submitHandler: function(form) {
        var user = {
        id: $('#user-id').val(),
        first_name: $('#first-name').val(),
        MRN: $('#last-name').val(),
        email: $('#email').val(),
        mobile_number: $('#mobile-number').val(),
        phone_number: $('#phone-number-cnt').val(),
        address: $('#address').val(),
        city: $('#city').val(),
        state: $('#state').val(),
        zip_code: $('#zip-code').val(),
        notes: $('#notes').val(),
        timezone: $('#timezone').val(),
        settings: {
            username: $('#username').val(),
            notifications: $('#user-notifications').prop('checked'),
            calendar_view: $('#calendar-view').val()
        }
    };

    if ($('#password').val()) {
        user.settings.password = $('#password').val();
    }
    var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_save_settings';

    var data = {
        csrfToken: GlobalVariables.csrfToken,
        type: 'SETTINGS_USER',
        settings: JSON.stringify(user)
    };
  
    $.post(url, data)
        .done(function(response) {
            Notiflix.Notify.Success('Successfully Saved');
            setTimeout(() => {
                window.location.reload();
            }, 1000);

        });

    }
});


// $('.save-settings-user').on('click', function() {

  

// });

$('#pro-img').click(function() {
    $('#propic').trigger('click');
    //     setTimeout(() => {
    //     $('#imnm').text($('#propic').val());
    //  }, 2000);
});

function edit_provider(id) {
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
            $('#provider-mobile-number').val();
            $('#provider-phone-number').val(rows[0].phone_number);
            $('#provider-address').val(rows[0].address);
            $('#provider-city').val(rows[0].city);
            $('#provider-state').val(rows[0].state);
            $('#provider-zip-code').val(rows[0].zipcode);
            $('#provider-notes').val(rows[0].notes);
            $('#provider-timezone').val(rows[0].timezone);
            $('#provider-org').text();
            $('#provider-id').val(rows[0].id);
            if (rows[0].Images.length > 0) {
                document.getElementById('pro-img').src = "<?php echo base_url('assets/img/upload_img/') ?>" + rows[
                    0].Images;
            } else {
                document.getElementById('pro-img').src = "<?php echo base_url('assets/img/upload_img/user.jpg') ?>";
            }


            $('#pro-img').src = img;
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
        });
}

$('#propic').change(function() {
    var url = GlobalVariables.baseUrl + '/index.php/backend_api/upload_provider_pic';
    var formdata = new FormData();
    var pid = $('#user-id').val();
    if (pid.length > 0) {
        var file = this.files[0];
        var tok = "<?php echo $this->security->get_csrf_hash(); ?>";
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
$(document).ready(function() {
    $('#first-name-label').text($('#first-name').val());
    $('#last-name-label').text($('#last-name').val());
    $('#email-label').text($('#email').val());
    $('#phone-number-label').text($('#phone-number-cnt').val());
    $('#username-label').text($('#username').val());
    $('#address-label').text($('#address').val());
    $('#city-label').text($('#city').val());
    $('#state-label').text($('#state').val());
    $('#zip-code-label').text($('#zip-code').val());
    $('#notes-label').text($('#notes').val());
    $('#data-table').DataTable({

    });
});
</script>