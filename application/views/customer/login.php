<?php 
$data=$this->session->userdata('records');
if(!empty($data)){
    redirect(site_url('Appointments/'));
}else{
   
    header('Expires: Sun, 01 Jan 2021 00:00:00 GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="google-signin-client_id" content="936252272370-mrrp6icjbajlne88e6lqjhjm6ak1knti.apps.googleusercontent.com">
    <title><?= lang('login') ?> | Gravitykey </title>
    <style>
        .contact-form input[type=text], .contact-form input[type=email], textarea {
    margin: 0.5em 0;
    padding: 0.7em 1em;
    font-size: .9em;
    width: 100%;
    background: 0 0;
    border:1px solid #4a4a4a;
    color: #fff;
    letter-spacing: 2px;
}
.contact-form {
    padding: 4em  3em;
    background: #f1f6ff;
    
}
        .error{
            /*display:none;*/
            color:red;
        }
       
        .mv {
    margin-left: 600px;
}
a#fbLink > i {
    margin-right: 11px;
}
a#fbLink:hover {
    color: white;
}
a#fbLink  {
    background-color: #3B5998;
    color: white;
}
   .btn1  {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    </style>
<link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    
  <link rel="stylesheet" href="<?php echo asset_url('assets/build/main.569ee873.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
     <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/notiflix-2.7.0.min.css') ?>">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    
    <style>

 .header--settings-block {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 10;
    background: #f1f6ff;
}
 .header--settings-block .header--settings-container {
    height: 65px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -webkit-transition: all 1s ease;
    -o-transition: all 1s ease;
    transition: all 1s ease;
}
.header--user-block {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-left: auto;
    margin-right: 0;
}
.header--user-block .btn.btn--login {
    padding: 0 5px;
}
.header--user-block .btn {
    margin: 4px 10px;
    font-weight: 600;
    min-height: 40px;
}

.header--togg-menu .hamburger-box {
    display: inline-block;
    position: relative;
    width: 30px;
    height: 28px;
    -webkit-transition: .4s ease-in-out;
    -o-transition: .4s ease-in-out;
    transition: .4s ease-in-out;
    margin-right: 15px;
    z-index: 1;
}
.header--togg-menu .txt-box {
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 1px;
    line-height: 1;
}

@media only screen and (max-width:767px){
    .header--settings-block {
    width: 100%;
    border-bottom: none;
    position: relative;
    padding-bottom: 25px;
    padding-top: 10px;
    background: rgba(0,0,0,0);
}
 .header--settings-container {
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    height: auto;
}
 .header--togg-menu {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    margin-right: 15px;
    top: 0;
}
.header--togg-menu .txt-box {
    display: block;
}
}
        </style>
  

    <!--<script>-->
    <!--    var GlobalVariables = {-->
    <!--        csrfToken:  //json_encode($this->security->get_csrf_hash()) ?>,-->
    <!--        baseUrl:  //json_encode($base_url) ?>,-->
    <!--        destUrl:  //json_encode($dest_url) ?>,-->
    <!--        AJAX_SUCCESS: 'SUCCESS',-->
    <!--        AJAX_FAILURE: 'FAILURE'-->
    <!--    };-->

    <!--    var EALang = < json_encode($this->lang->language) ?>;-->

    <!--    var availableLanguages =  json_encode(config('available_languages')) ?>;-->

    <!--    $(function () {-->
    <!--        GeneralFunctions.enableLanguageSelection($('#select-language'));-->
    <!--    });-->
    <!--</script>-->
</head> 
<section class="header--settings-block">
        <div class="container header--settings-container">
                <!-- <button class="header--togg-menu" aria-label="Menu">
                        <span class="hamburger-box">
                        <span></span>
                        <span></span>
                        <span></span>
                        </span>
                        <span class="txt-box">Menu</span>
                    </button> -->
                
            <a href="<?php echo base_url('/customers/customer_login'); ?>" class="header--logo" title="SkedisA">
               
                    
                    <title>SkedisA</title>
                    <img src="<?= asset_url('assets/img/skedis.png'); ?>" class="hdr-img" style="height:50px;width:auto" />
               
                            </a>

            <div class="header--user-block">
            <a class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" href="<?php echo base_url('/customers/customer_login'); ?>" >Home</a>
            <a class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" href="<?php echo base_url('/customers/plan'); ?>" >Plan</a>
            <a href="<?php echo base_url('/customers/customer_feature'); ?>" class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" >Features</a>
                                <a href="javascript:void(0)" id="log-btn" class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" >Log in</a>
                <a href="javascript:void(0)" class="btn btn-info" id="sign-btn" style="background: #ff3259;border-radius: 23px;border:none" aria-label="Sign in">Sign up</a>
                                <button class="btn open-sub-menu-login-bar" aria-label="Profile" data-toggle="modal" data-target="#client-account-card">
                   
                </button>
            </div>
        </div>      
    </section>
        <section class="header--navigation-block">
        <div class="container header--navigation-menu-container">
            <nav class="header--main-nav header--main-nav-mobile"> <!-- header--main-nav-desk -->
                <div class="header--main-nav-header">
                    <button class=" header--mob-togg-menu open" aria-label="Close">
                        X
                    </button>
                    <span class="mob--menu-name">Menu</span>
                </div>

                <ul class='main-nav--menu'>
    <li class="phantom-block"></li>
   
    <li class="menu--link-has-dropdown" data-submenu="m-features">
        <a class="menu--link" href="#">
            <span class="main-menu-icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="toolbox" class="svg-inline--fa ico fa-toolbox fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.63 214.63l-45.25-45.26c-6-6-14.14-9.37-22.63-9.37H384V80c0-26.47-21.53-48-48-48H176c-26.47 0-48 21.53-48 48v80H77.25c-8.49 0-16.62 3.37-22.63 9.37L9.37 214.63c-6 6-9.37 14.14-9.37 22.63V448c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32V237.25c0-8.48-3.37-16.62-9.37-22.62zM160 80c0-8.83 7.19-16 16-16h160c8.81 0 16 7.17 16 16v80H160V80zm320 368H32v-96h96v24c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-24h192v24c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-24h96v96zm-96-128v-24c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v24H160v-24c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v24H32v-82.75L77.25 192h357.49L480 237.25V320h-96z"></path></svg>
            </span>
            <span class="menu-link--text">Features</span>
            <span class="ico-sub-menu">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="angle-right" class="svg-inline--fa icon fa-angle-right fa-w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z"></path></svg>
            </span>
        </a>     
    </li>
 
</ul>
            </nav>
                      
                    </div>
    </section>

    <body>

    <br>
<br>
<div  style="display: none;" id="signup-frame" class="frame-container register">
    <!-- <h2>User Registration </h2>
    <hr> -->
    <div class="alert d-none"></div>
   
    <form id="register-form" method="post" action="<?php echo base_url('index.php/customers/register'); ?>">
      
      
        <div class="form-group">
              <label for="username">Mobile Number</label>
               <span class="text-danger">*</span>
             <input type="text" id="mobile" name="mobile" maxlength="10" onchange="" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');check_mobile(this,'<?php echo $this->security->get_csrf_hash(); ?>');" placeholder="Enter your mobile number"  class="form-control"/>
             <span class="error" id="mno-error"></span>
             <input type="hidden" id="google-id" name="googleid" />
        </div>
        
      
        <div class="form-group">
              <label for="username">Name</label>
               <span class="text-danger">*</span>
             <input type="text" id="fname" name="fname" maxlength="15" onkeyup="checkletter(this)"  placeholder="Enter your name"  class="form-control"/>
             <input type="hidden" id="sub-token" value="<?php echo $this->security->get_csrf_hash(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" />
        </div>
      
       
        
      
        
         <div class="form-group">
              <label for="username">Password</label>
               <span class="text-danger">*</span>
             <input type="password" id="passwd" onkeyup="validate_pwd(this)" name="passwd" placeholder="Enter your password"  class="form-control"/>
             <span class="error" id="pass"></span>
        </div>
        
          <div class="form-group">
              <label for="username">Email</label>
             
    <input type="email" id="mail" name="email"  placeholder="Enter your email"  class="form-control"/>
   
            <span class="error" id="mail-error"></span>
        </div>
        
          <div  class="form-group">
              <label for="username">Select Organization</label>
               <span class="text-danger">*</span>
              <select id="organization" name="organization" class="form-control">
                  <option value="">Select Organization</option>
                  <?php  foreach($records as $row){ ?>
                  <option value="<?php echo $row['organization_id']; ?>"><?php echo $row['organization_name']; ?></option>
                  <?php  } ?>
              </select>
             <span class="error" id="mno1-error"></span>
        </div>
        
        

        <div class="form-group">
            <input type="submit" onclick="validate_register()" id="subreg" name="submit" value="Register" class="btn btn-primary" />
               
            <a id="sign-out" style="display:none" href="javascript:void(0)" onclick="signOut();">Sign out</a>
                                 <a id="sign-out-fb" style="display:none" href="javascript:void(0)" onclick="fbLogout();">Sign out</a>
            <a href="./" style="display:block" id="signup" style="float:right" >Already have an account ?</a>
        </div>

       

        <div class="mt-4">
            <small>
                Powered by
                <a href="https://gravitykey.com">Gravitykey</a>
                
            </small>
        </div>
    </form>
</div>

<div id="login-frame" style="display: block;" class="frame-container">
    <!-- <h2> Appointment Login </h2> -->
    <p><?php  //"Welcome to Bone and Joint Hospital Trichy. You  need to login to view or book appointments "; ?></p>
   
    <div class="alert d-none"></div>
     <?php if($this->session->flashdata('error')){ ?>
    <div id="notification" style="display: block;"><div style="background:#ffc3c5;" class="notification alert"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><strong><?php echo $this->session->flashdata('error'); ?></strong></div></div>
    <?php } //onkeyup="check_email(this,'<?php echo $this->security->get_csrf_hash() ')" ?>
    
         <?php if($this->session->flashdata('success')){ ?>
    <div id="notification" style="display: block;"><div style="background:#c3ffc5;" class="notification alert"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><strong><?php echo $this->session->flashdata('success'); ?></strong></div></div>
    <?php } //onkeyup="check_email(this,'<?php echo $this->security->get_csrf_hash() ')" ?>
    <form id="login-form" action="<?php echo base_url('index.php/customers/login'); ?>" method="post">
        <div class="form-group">
            <label for="username"><?php echo "Mobile Number"; ?></label>
            <input type="hidden" id="log_token" value="<?php echo $this->security->get_csrf_hash(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" />
            <input type="text"  id="username" name="uname" placeholder="<?php echo 'Enter your mobile number'; ?>" maxlength="10" class="form-control"/>
            <span id="uname" class="error"></span>
        </div>
        <div id="organ-div" class="form-group" style="display:none">
        <div ><div  class="notification alert alert-warning"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><strong>
        Your phone number is associated with multiple Clinics. Please select the Clinic for which you wish to book appointment now.
        </strong></div></div>
        <label>Select Organization</label>
        <select class="form-control" name="login-organ" id="select-organ">
        <option>Select Organization</option>
        </select>
        </div>
        <div class="form-group">
            <label for="password"><?= lang('password') ?></label>
            <input type="password"  id="password" name="pwd" placeholder="<?php echo 'Enter your password'; ?>" class="form-control"/>
            <span id="pwd" class="error"></span>
        </div>

        <div class="form-group">
            <input type="submit" id="sublog" onclick="validate()" name="login"  value="Login" class="btn1 btn-primary" />
           
              <a href="javascript:void(0)" style="display:block" id="log" onclick="hidelog()" style="float:right" >I don't have an account ?</a>
        </div>
                <div class="form-group" style="display:flex">
                                        
                                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                        <a href="javascript:void(0);" style="margin-left: 21px;" onclick="fbLogin();" class="fb btn1" id="fbLink"><i class="fab fa-facebook-f"></i> Login</a>
                </div>

        <a href="javascript:void(0)" id="fget" class="forgot-password">
            <?= lang('forgot_your_password') ?></a>
        |
        <span id="select-language" class="badge badge-success">
              <?= ucfirst(config('language')) ?>
            </span>

        <div class="mt-4">
            <small>
                Powered by
                <a href="https://gravitykey.com">Gravitykey</a>
            </small>
        </div>
    </form>
</div>

<div id="forget-pwd" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Forgot Password</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
               
                  <div id="mobf">
                   <div class="form-group">
                       <input type="text" id="fget-email"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Enter Mobile Number"  class="form-control"/>
                       <input type="hidden" id="token" value="<?php   echo $this->security->get_csrf_hash(); ?>" />
                      
                       <div id="organ-fget" class="form-group" style="display:none">
        <div ><div  class="notification alert alert-warning"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><strong>
        Your phone number is associated with multiple Clinics. Please select the Clinic for which you wish to book appointment now.
        </strong></div></div>
        <label>Select Organization</label>
        <select class="form-control" name="login-organ-fget" id="select-organ-fget">
        <option>Select Organization</option>
        </select>
        </div>
                    </div>
                   <span id="error-forget" style="color:red;display:none"></span>
                  <div>
                       <button id="send-otp" disabled class="btn btn-primary">Send OTP</button>
                   </div>  
                  </div>
                   <div id="otpf" style="display:none;">
                     <div id="notification" style="display: block;"><div style="background:#c3ffc5;" class="notification alert"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><strong>An OTP has been sent to your registered mobile number !</strong></div></div>   
                   <div class="form-group">
                       <input type="text" id="otp"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Enter OTP"  class="form-control"/>
                       <input type="hidden" id="validotp"  />
                   </div>
                   <span id="error-otp" style="color:red;display:none"></span>
                  <div>
                       <label id="submit-otp" class="btn btn-primary">Submit</label>
                   </div>  
                  </div>
                  <div id="chf" style="display:none;">
                  <div class="form-group">
                       <input type="password" id="fget-passwd" placeholder="Enter new password" disabled="true" class="form-control"/>
                       <label id="pwd-error" style="color:red;display:none"></label>
                    </div>
                    <div class="form-group">
                                
                                <input type="password" id="fget-cpasswd"  placeholder="Enter confirm password" value=""  class=" form-control" maxlength="50"/>
                                <label id="cpwd-error" style="color:red;display:none"></label>
                            </div>
                   <div>
                       <button id="change-pwd" class="btn btn-primary">Change Password</button>
                   </div>    
                  </div> 
                  
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    close
                </button>
            </div>
        </div>
    </div>
</div>
<style>
      .ftr > li {
    float: left;
    margin-left: 108px;
}
.ftr > li > a {
    color:#06adef;
}
ol, ul {
    list-style: none;
}
.navigation {
    padding: 30px 0 0;
    background-color:#f1f6ff;
}
  </style> 
    <section class="navigation">

        <div class="container">
           
                <div class="row">
                    <ul class="ftr">
                        <li><a href="#" data-toggle="modal" data-target="#about-popup" title="About us">About us</a><li>
                        <li><a href="#" data-toggle="modal" data-target="#contact-popup"   title="Contacts">Contact us</a><li>
                        <li><a href="#" class="" data-toggle="modal" data-target="#demo--card-popup" >Privacy Policy</a><li>
                        <li> <a href="#" class="" data-toggle="modal" data-target="#demo--card-popup1"  >Terms and Conditions</a><li>           
                    </ul>                  
                  
              
                </div>
            
        </div>
   


<div id="demo--card-popup1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title text-center">Terms and Condition</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <ul style="margin-bottom: 10px; color: rgb(102, 102, 102);"><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><p class="MsoNormal" style="text-align: center; margin: 15pt 0in 7.5pt 0.5in; line-height: normal;"><span style="font-size: 16pt; font-family: inherit, serif;"><b>PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY!</b><o:p></o:p></span></p>

<p class="MsoNormal" style="margin-top:0in;margin-right:0in;margin-bottom:7.5pt;
margin-left:.5in;line-height:normal"><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Welcome to Gravitykey Technologies Private Limited
(together with its affiliates, “Gravitykey”, "We", “Us", or the
"Company"). We are excited to have you as a user/provider and as a
customer. We’d like you to know that the following terms and conditions
(collectively, these "Terms of Service") apply to your use of
https://SkedisA (the “Site”), including all related web sites, downloadable
software, mobile applications (including tablet applications), and other
services provided by us, or any digital media on which a link to this Privacy
Policy is displayed, and all other communications with individuals though
written or oral means (such as email or phone) directed at accessing or using
any service we offer (together with the Site, the “Service”).The Terms of
Service also include our Privacy Policy, which you can review here: </span><a href="https://skedis.in/index.php?route=information/information&amp;information_id=3"><span style="font-size: 11.5pt;">https://skedis.in/index.php?route=information/information&amp;information_id=3</span></a><span style="font-size: 11.5pt; color: rgb(102, 102, 102);"><o:p></o:p></span></p>

<p class="MsoNormal" style="margin-top:0in;margin-right:0in;margin-bottom:7.5pt;
margin-left:.5in;line-height:normal"><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">We want to keep our relationship with you as lean and
informal as possible, but please read the Terms of Service carefully before you
start using Skedis, because by using the Site you accept and agree to be bound
and abide by these Terms of Service. Should you disagree with some of the
provisions herein, you can either leave the Site (although we will be sad to
see you go!) or contact us at </span><a href="file:///C:/GravityKey/Admin/support@skedis.in"><span style="font-size: 11.5pt;">support@skedis.in</span></a><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">. Please keep in mind
that this document is a legally binding agreement between you as the user and
provider of the Service (referred to as “you”, “your” or “User” hereinafter)
and the Company. <o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Terms of Service for
Skedis<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Application and Acceptance of the Terms:<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Your use of the Service, software and products is
     subject to these Terms of Service as well as the Privacy Policy and any
     other rules and policies of the Site that We may publish from time to
     time. This document and such other rules and policies of the Site are
     collectively referred to below as the “Terms”. By accessing the Site or
     using the Service, you agree to accept and be bound by the Terms. Please
     do not use the Service or the Site if you do not accept all the Terms.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You may not use the Service and may not accept the
     Terms if (a) you are not of legal age to form a binding contract with Us,
     or (b) you are not permitted to receive any Service under the laws of the
     Chennai, Tamilnadu, India and/or any other jurisdictions whose laws may
     apply to your use of the Service.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You acknowledge and agree that We may amend any
     Terms at any time by posting the relevant amended and restated Terms on
     the Site. By continuing to use the Service or the Site, you agree that the
     amended Terms will apply to you.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">If Skedis has posted or provided a translation of
     the English language version of the Terms, you agree that the translation
     is provided for convenience only and that the English language version
     will govern your uses of the Service or the Site<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You may be required to enter into a separate
     agreement, whether online or offline, with Gravitykey Technologies Private
     Limited or our affiliate for any Service (“Additional Agreements”). If
     SkedisA has any conflict or inconsistency between the Terms and an
     Additional Agreement, the Additional Agreement shall take precedence over
     the Terms only in relation to that Service concerned. Specifically, if you
     or your clients are in the European Economic Area or Switzerland, you are
     required to enter into Gravitykey Technologies Private Limited’s
     International Data Transfer Agreement, which implements model contractual
     language promulgated by the European Commission and designed to, among
     other things, protect the data privacy rights of European citizens.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">The Terms may not otherwise be modified except in
     writing by an authorized officer of Gravitykey Technologies Private
     Limited.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Provision of Service<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You must register as a member on the Site to access
     and use some Service. Further, Gravitykey Technologies Private Limited
     reserves the right, without prior notice, to restrict access to or use of
     certain Service (or any features within the Service) to paying Users or
     subject to other conditions that Gravitykey Technologies Private Limited
     may impose in our discretion.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Service (or any features within the Service) may
     vary for different regions and countries. No warranty or representation is
     given that a particular Service or feature or function thereof or the same
     type and extent of the Service or features and functions thereof will be available
     for Users. Gravitykey Technologies Private Limited may in our sole
     discretion limit, deny or create different level of access to and use of
     any Service (or any features within the Service) with respect to different
     Users.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited may launch,
     change, upgrade, impose conditions to, suspend, or stop any Service (or
     any features within the Service) without prior notice except that in case
     of a fee-based Service, Users shall be notified no less than fourteen (14)
     days prior to any change in such Service.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Some Service may be provided by Gravitykey
     Technologies Private Limited’s affiliates on behalf of Gravitykey
     Technologies Private Limited.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Users in general<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">As a condition of your access to and use of the Site
     or Service, you agree that you will comply with all applicable laws and
     regulations when using the Site or Service.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You agree to use the Site or Service solely for your
     own private and internal purposes as a licensee of the Site and Service.
     Use of any content or materials on the Site for any purpose not expressly
     permitted in the Terms is prohibited. In addition, you agree that:<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">you will not copy, reproduce, download, re-publish,
     sell, distribute or resell any Service or any information, text, images,
     graphics, video clips, sound, directories, files, databases or listings,
     etc., available on or through the Site (the “Site Content”).<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">you will not copy, reproduce, download, compile or
     otherwise use any Site Content for the purposes of operating a business
     that competes with Gravitykey Technologies Private Limited, or otherwise
     commercially exploit the Site Content; and<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">you will not engage in any systematic retrieval of
     Site Content from the Site to create or compile, directly or indirectly, a
     collection, compilation, database or directory (whether through robots,
     spiders, automatic devices or manual processes) without written permission
     from Gravitykey Technologies Private Limited is prohibited<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You must read Gravitykey Technologies Private
     Limited’s Privacy Policy that governs the protection and use of personal
     information about Users in the possession of Gravitykey Technologies
     Private Limited and our affiliates. You accept the terms of the Privacy
     Policy and agree to the use of the personal information about you in accordance
     with the Privacy Policy.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited may allow
     Users to access to content, products or services offered by third parties
     through hyperlinks (in the form of word link, banners, channels or
     otherwise), API or otherwise to such third parties' website. You should
     read such websites’ terms and conditions and/or privacy policies before
     using the Site. You acknowledge that Gravitykey Technologies Private
     Limited has no control over such third parties' websites, does not monitor
     such websites, and shall not be responsible or liable to anyone for such
     websites, or any content, products or services made available on such
     websites.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You agree not to undertake any action to undermine
     the integrity of the computer systems or networks of Gravitykey
     Technologies Private Limited and/or any other User nor to gain
     unauthorized access to such computer systems or networks.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You agree not to undertake any action which may
     undermine the integrity of Gravitykey Technologies Private Limited’s
     feedback system, such as leaving positive feedback for yourself using
     secondary Member IDs or through third parties or by leaving
     unsubstantiated negative feedback for another User.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You agree not to post any libelous, tortious,
     infringing, or otherwise illegal content, information, or material on the
     Site or through the Service. You further agree that posting such content,
     information, or material may cause irreparable harm to Gravitykey
     Technologies Private Limited or other Users of the Site, and you shall
     indemnify Gravitykey Technologies Private Limited, its affiliates,
     directors, employees, agents and representatives against any loss or
     damages (including but not limited to loss of profits) resulting there from<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Member Accounts<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">A User who registers on the Site may also be
     referred to as a “Member” herein. Upon registration, Gravitykey
     Technologies Private Limited shall assign an account and issue a member ID
     and password (the latter shall be chosen by a Member during registration)
     to each Member.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">A set of Member ID and password is unique to a
     single account. Each Member shall be solely responsible for maintaining
     the confidentiality and security of such Member’s Member ID and password
     and for all activities that occur under such Member’s account. No Member
     may share, assign, or permit the use of his or her Member account, ID or
     password by another person outside of the Member’s own business entity.
     Each Member agrees to notify Gravitykey Technologies Private Limited
     immediately if such Member becomes aware of any unauthorized use of his or
     her password, her or his account, or any other breach of security of such
     Member’s account.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member agrees that all activities that occur under
     such Member’s account (including without limitation, posting any company
     or product information, clicking to accept any Additional Agreements or
     rules, subscribing to or making any payment for any services, sending
     emails using the email account or sending SMS) will be deemed to have been
     authorized by the Member.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member acknowledges that sharing of Member’s account
     with other persons or allowing multiple users outside of Member’s business
     entity to use Member’s account (collectively, "multiple use"),
     may cause irreparable harm to Gravitykey Technologies Private Limited or
     other Users of the Site. Member shall indemnify Gravitykey Technologies
     Private Limited, our affiliates, directors, employees, agents and
     representatives against any loss or damages (including but not limited to
     loss of profits) suffered because of the multiple use of Member’s account.
     Member also agrees that in case of the multiple use of Member’s account or
     Member’s failure to maintain the security of Member’s account, Gravitykey
     Technologies Private Limited shall not be liable for any loss or damages
     arising therefrom and shall have the right to suspend or terminate
     Member’s account without liability to Member.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Member’s Responsibilities<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each Member represents, warrants, and agrees that
     (a) you have full power and authority to accept the Terms, to grant the
     license and authorization and to perform the obligations hereunder; (b)
     you use the Site and Service for business purposes only; and (c) the Gravitykey
     address you provide when registering is the principal place of business of
     your business entity. For purposes of this provision, a branch or liaison
     office will not be considered a separate entity and your principal place
     of business will be deemed to be that of your head office.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member will be required to provide information or
     material about your entity, business or products/services as part of the
     registration process on the Site or your use of any Service or the member
     account. Each Member represents, warrants and agrees that (a) such
     information and material whether submitted during the registration process
     or thereafter throughout the continuation of the use of the Site or
     Service is true, accurate, current and complete, and (b) you will maintain
     and promptly amend all information and material to keep it true, accurate,
     current and complete.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Upon becoming a Member, you consent to the inclusion
     of the contact information about you in our Buyer Database and authorize
     Gravitykey Technologies Private Limited and our affiliates to share the
     contact information with other Users or otherwise use your personal
     information in accordance with the Privacy Policy.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each Member represents, warrants, and agrees that
     Member shall:<o:p></o:p></span></li>
 <ul style="margin-top:0in" type="circle">
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">carry on Member’s activities on
      the Site in compliance with any applicable laws and regulations;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">conduct Member’s business
      transactions with other users of the Site in good faith;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">carry on Member’s activities in
      accordance with the Terms and any applicable Additional Agreements;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not use the Service or Site to
      defraud any person or entity (including without limitation sale of stolen
      items, use of stolen credit/debit cards);<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not impersonate any person or
      entity, misrepresent Member or Member’s affiliation with any person or
      entity<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not engage in spamming or
      phishing<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not engage in any other unlawful
      activities (including without limitation those which would constitute a
      criminal offence, give rise to civil liability, etc.) or encourage or
      abet any unlawful activities.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not involve attempts to copy,
      reproduce, exploit, or expropriate Gravitykey Technologies Private
      Limited’s various proprietary directories, databases, and listings.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not involve any computer viruses
      or other destructive devices and codes that have the effect of damaging,
      interfering with, intercepting, or expropriating any software or hardware
      system, data, or personal information<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not involve any scheme to
      undermine the integrity of the data, systems or networks used by
      Gravitykey Technologies Private Limited and/or any user of the Site or
      gain unauthorized access to such data, systems or networks.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not engage in any activities that
      would otherwise create any liability for Gravitykey Technologies Private
      Limited.<o:p></o:p></span></li>
 </ul>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member may not use the Service and member account to
     engage in activities which are identical or similar to Gravitykey
     Technologies Private Limited’s scheduling and calendaring business. This
     does not include virtual assistant services and similar services that use
     Gravitykey Technologies Private Limited to manage scheduling for their own
     clients.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member agrees to provide all necessary information, materials,
     and approval, and render all reasonable assistance and cooperation
     necessary for Gravitykey Technologies Private Limited’s provision of the
     Service, evaluating whether Member has breached the Terms and/or handling
     any complaint against the Member. If Member’s failure to do so results in
     delay in, or suspension or termination of, the provision of any Service,
     Gravitykey Technologies Private Limited shall not be obliged to extend the
     relevant service period nor shall be liable for any loss or damages
     arising from such delay, suspension, or termination.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member acknowledges and agrees that Gravitykey
     Technologies Private Limited shall not be required to actively monitor nor
     exercise any editorial control whatsoever over the content of any message
     or material or information created, obtained or accessible through the
     Service or Site. Gravitykey Technologies Private Limited does not endorse,
     verify, or otherwise certify the contents of any comments or other
     material or information made by any Member. Each Member is solely
     responsible for the contents of their communications and may be held
     legally liable or accountable for the content of their comments or other
     material or information.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member acknowledges and agrees that the Service may
     only be used by businesses and their representatives for business use and
     not for individual consumers or for non-business use.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Member acknowledges and agrees that each Member is
     solely responsible for observing applicable laws and regulations in its
     respective jurisdictions to ensure that all use of the Site and Service follow
     the same.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Breaches by Members<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited reserves the
     right in our sole discretion to remove, modify or reject any information,
     content or material on the Site you post or display (when posted or
     displayed by a User, “User Content”). User Content that you submit to,
     post or display on the Site which we reasonably believe is unlawful,
     violates the Terms, could subject Gravitykey Technologies Private Limited
     or our affiliates to liability, or is otherwise found inappropriate in
     Gravitykey Technologies Private Limited’s opinion.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">If any Member breaches any Terms or if Gravitykey
     Technologies Private Limited has reasonable grounds to believe that any
     Member is in breach of any the Terms, Gravitykey Technologies Private
     Limited shall have the right to impose a penalty against the Member, or
     suspend or terminate the Member’s account or subscription of any Service
     without any liability to the Member. Gravitykey Technologies Private
     Limited shall also have the right to restrict, refuse or ban all current
     or future use of any other Service that may be provided by Gravitykey
     Technologies Private Limited. The penalties that Gravitykey Technologies
     Private Limited may impose include, among others, warning, removing any
     product listing or other User Content that the Member has submitted,
     posted or displayed, imposing restrictions on the number of product
     listings that the Member may post or display, or imposing restrictions on
     the Member’s use of any features or functions of any Service for such
     period as Gravitykey Technologies Private Limited may consider appropriate
     in our sole discretion.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Without limiting the generality of the provisions of
     the Terms, a Member would be considered as being in breach of the Terms in
     any of the following circumstances.<o:p></o:p></span></li>
 <ul style="margin-top:0in" type="circle">
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">upon complaint or claim from any
      third party, if Gravitykey Technologies Private Limited has reasonable
      grounds to believe that such Member has willfully or materially failed to
      perform your contract with such third party including without limitation
      where the Member has failed to deliver any items ordered by such third
      party after receipt of the purchase price, or where the items Member has delivered
      materially fail to meet the terms and descriptions outlined in your
      contract with such third party<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private
      Limited has reasonable grounds to suspect that such Member has used a
      stolen credit card or other false or misleading information in any
      transaction with a counter party,<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private
      Limited has reasonable grounds to suspect that any information provided
      by the Member is not current or complete or is untrue, inaccurate, or
      misleading, or<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private
      Limited believes that the Member’s actions may cause financial loss or
      legal liability to Gravitykey Technologies Private Limited or our
      affiliates or any other Users.<o:p></o:p></span></li>
 </ul>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited reserves the
     right to cooperate fully with governmental authorities, private
     investigators and/or injured third parties in the investigation of any
     suspected criminal or civil wrongdoing. Further, and as described in our
     Privacy Policy, Gravitykey Technologies Private Limited may disclose the
     Member's identity and contact information, if requested by a government or
     law enforcement body, an injured third party, or as a result of a warrant
     or other legal action. Gravitykey Technologies Private Limited shall not
     be liable for damages or results arising from such disclosure, and Member
     agrees not to bring any action or claim against Gravitykey Technologies
     Private Limited for such disclosure.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">If a Member is in breach of the Terms, Gravitykey
     Technologies Private Limited also reserves the right to publish the
     records of such breach on the Site. If such breach involves or is
     reasonably suspected of involving dishonest or fraudulent activities,
     Gravitykey Technologies Private Limited also reserves the right to
     disclose the records of such breach to our affiliates. Such Gravitykey
     Technologies Private Limited affiliates may impose limitation on, suspend
     or terminate the Member’s use of all or part of the services provided by
     such affiliates to the Member, take other remedial actions, and publish
     the records about the Member’s breach of the Terms on the websites
     operated by or controlled by such Gravitykey Technologies Private Limited
     affiliates.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited may, at any
     time and in our reasonable discretion, impose limitations on, suspend or
     terminate the Member’s use of any Service or the Site without being liable
     to the Member if Gravitykey Technologies Private Limited has received
     notice that the Member is in breach of any agreement or undertaking with
     any affiliate of Gravitykey Technologies Private Limited and such breach
     involves or is reasonably suspected of involving dishonest or fraudulent
     activities. Gravitykey Technologies Private Limited shall have the right
     to publish the records of such breach on the Site. Gravitykey Technologies
     Private Limited shall not be required to investigate such breach or
     request confirmation from the Member.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each Member agrees to indemnify Gravitykey
     Technologies Private Limited, our affiliates, directors, employees, agents,
     and representatives and to hold them harmless, from any and all damages,
     losses, claims and liabilities (including legal costs on a full indemnity
     basis) which may arise from such Member’s submission, posting or display
     of any User Content, from Member’s use of the Site or Service, or from
     Member’s breach of the Terms.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each Member further agrees that Gravitykey
     Technologies Private Limited is not responsible and shall have no
     liability to such Member or anyone else, including Member’s customers or
     clients, for any User Content or other material transmitted over the Site,
     including fraudulent, untrue, misleading, inaccurate, defamatory, offensive,
     or illicit material and that the risk of damage from such material rests
     entirely with each Member. Gravitykey Technologies Private Limited
     reserves the right, at our own expense, to assume the exclusive defense
     and control of any matter otherwise subject to indemnification by the
     Member, in which event the Member shall cooperate with Gravitykey
     Technologies Private Limited in asserting any available defenses<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Transactions Made Through
the Site <a href="https://skedis.in/">https://skedis.in</a><o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited provides
     electronic web-based platforms for exchanging information between buyers
     and sellers of products and services. Gravitykey Technologies Private
     Limited additionally provides electronic web-based transaction platforms
     for Members to place, accept, conclude, manage, and fulfill orders for the
     provision of products and services online within the Site. However, for
     any Service, Gravitykey Technologies Private Limited does not represent
     either the seller or the buyer in specific transactions. Gravitykey
     Technologies Private Limited does not control and is not liable to or
     responsible for the quality, safety, lawfulness or availability of the
     products or services offered for sale on the Site or the ability of the
     sellers to complete a sale or the ability of buyers to complete a purchase.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Users are hereby made aware that there may be risks
     of dealing with people acting under false pretenses. Gravitykey
     Technologies Private Limited uses several techniques to verify the
     accuracy of certain information our paying Users provide us when they
     register for a paying membership service on the Site. However, because
     user verification on the Internet is difficult, Gravitykey Technologies
     Private Limited cannot and does not confirm each User's purported identity
     (including, without limitation, paying Members). We encourage you to use
     various means, as well as common sense, to evaluate with whom you are
     dealing.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each User acknowledges that it is fully assuming the
     risks of conducting any purchase and sale transactions in connection with
     using the Site or Service, and that it is fully assuming the risks of
     liability or harm of any kind in connection with subsequent activity of
     any kind relating to products or services that are the subject of
     transactions using the Site. Such risks shall include, but are not limited
     to, misrepresentation of products and services, fraudulent schemes,
     unsatisfactory quality, failure to meet specifications, defective or
     dangerous products, unlawful products, delay or default in delivery or
     payment, cost miscalculations, breach of warranty, breach of contract and
     transportation accidents. Such risks also include the risks that the
     manufacture, importation, export, distribution, offer, display, purchase,
     sale and/or use of products or services offered or displayed on the Site
     may violate or may be asserted to violate any rights of third parties, and
     the risk that User may incur costs of defense or other costs in connection
     with third parties’ assertion of rights, or in connection with any claims
     by any party that they are entitled to defense or indemnification in
     relation to assertions of rights, demands or claims by third parties. Such
     risks also include the risks that consumers, other purchasers, end-users
     of products or others claiming to have suffered injuries or harms relating
     to products originally obtained by Users of the Site as a result of
     purchase and sale transactions in connection with using the Site may
     suffer harms and/or assert claims arising from their use of such products.
     All of the foregoing risks are hereafter referred to as "Transaction
     Risks". Each User agrees that Gravitykey Technologies Private Limited
     shall not be liable or responsible for any damages, claims, liabilities,
     costs, harms, inconveniences, business disruptions or expenditures of any
     kind that may arise a result of or in connection with any Transaction
     Risks.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Users are solely responsible for all of the terms
     and conditions of the transactions conducted on, through or as a result of
     use of the Site or Service, including, without limitation, terms regarding
     payment, returns, warranties, shipping, insurance, fees, taxes, title,
     licenses, fines, permits, handling, transportation and storage.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">User agrees to provide all information and materials
     as may be reasonably required by Gravitykey Technologies Private Limited
     in connection with such User’s transactions conducted on, through or as a
     result of use of the Site or Service. Gravitykey Technologies Private
     Limited has the right to suspend or terminate any User’s account if the
     User fails to provide the required information and materials.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">If any User has a dispute with any party to a transaction,
     such User agrees to release and indemnify Gravitykey Technologies Private
     Limited (and our agents, affiliates, directors, officers and employees)
     from all claims, demands, actions, proceedings, costs, expenses and
     damages (including without limitation any actual, special, incidental or
     consequential damages) arising out of or in connection with such transaction.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Limitation of Liability<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">TO THE MAXIMUM EXTENT PERMITTED BY LAW, THE SERVICES
     PROVIDED BY GRAVITYKEY TECHNOLOGIES PRIVATE LIMITED ON OR THROUGH THE SITE
     ARE PROVIDED "AS IS", "AS AVAILABLE" AND “WITH ALL
     FAULTS”, AND GRAVITYKEY TECHNOLOGIES PRIVATE LIMITED HEREBY EXPRESSLY
     DISCLAIMS ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING BUT NOT
     LIMITED TO, ANY WARRANTIES OF CONDITION, QUALITY, DURABILITY, PERFORMANCE,
     ACCURACY, RELIABILITY, MERCHANTABILITY OR FITNESS FOR A PARTICULAR
     PURPOSE. ALL SUCH WARRANTIES, REPRESENTATIONS, CONDITIONS, AND
     UNDERTAKINGS ARE HEREBY EXCLUDED<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">TO THE MAXIMUM EXTENT PERMITTED BY LAW, GRAVITYKEY
     TECHNOLOGIES PRIVATE LIMITED MAKES NO REPRESENTATIONS OR WARRANTIES ABOUT
     THE VALIDITY, ACCURACY, CORRECTNESS, RELIABILITY, QUALITY, STABILITY,
     COMPLETENESS OR CURRENTNESS OF ANY INFORMATION PROVIDED ON OR THROUGH THE
     SITE; GRAVITYKEY TECHNOLOGIES PRIVATE LIMITED DOES NOT REPRESENT OR
     WARRANT THAT THE MANUFACTURE, IMPORTATION, EXPORT, DISTRIBUTION, OFFER,
     DISPLAY, PURCHASE, SALE AND/OR USE OF PRODUCTS OR SERVICES OFFERED OR
     DISPLAYED ON THE SITE DOES NOT VIOLATE ANY THIRD PARTY RIGHTS; AND
     GRAVITYKEY TECHNOLOGIES PRIVATE LIMITED MAKES NO REPRESENTATIONS OR
     WARRANTIES OF ANY KIND CONCERNING ANY PRODUCT OR SERVICE OFFERED OR
     DISPLAYED ON THE SITE<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Any material downloaded or otherwise obtained
     through the Site is done at each User's sole discretion and risk and each
     User is solely responsible for any damage to Gravitykey Technologies
     Private Limited’s computer system or loss of data that may result from the
     download of any such material. No advice or information, whether oral or
     written, obtained by any User from Gravitykey Technologies Private Limited
     or through or from the Site shall create any warranty not expressly stated
     herein<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">The Site may make available to User services or
     products provided by independent third parties. No warranty or
     representation is made with regard to such services or products. In no
     event shall Gravitykey Technologies Private Limited and our affiliates be
     held liable for any such services or products<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each User hereby agrees to indemnify and hold
     Gravitykey Technologies Private Limited, our affiliates, directors, officers,
     and employees harmless, from any and all losses, claims, liabilities
     (including legal costs on a full indemnity basis) which may arise from
     such User's use of the Site or Service (including but not limited to the
     display of such User's information on the Site) or from your breach of any
     of the terms and conditions of the Terms. Each User hereby further agrees
     to indemnify and hold Gravitykey Technologies Private Limited, our
     affiliates, directors, officers, and employees harmless, from any and all
     losses, damages, claims, liabilities (including legal costs on a full
     indemnity basis) which may arise from User's breach of any representations
     and warranties made by User to Gravitykey Technologies Private Limited,
     including but not limited to those set forth hereunder.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each User hereby further agrees to indemnify and
     hold Gravitykey Technologies Private Limited, our affiliates, directors, officers,
     and employees harmless, from any and all losses, damages, claims,
     liabilities (including legal costs on a full indemnity basis) which may
     arise, directly or indirectly, as a result of any claims asserted by third
     parties relating to products offered or displayed on the Site. Each User
     hereby further agrees that Gravitykey Technologies Private Limited is not
     responsible and shall have no liability, for any material posted by
     others, including defamatory, offensive, or illicit material and that the
     risk of damages from such material rests entirely with each User.
     Gravitykey Technologies Private Limited reserves the right, at our own
     expense, to assume the exclusive defense and control of any matter
     otherwise subject to indemnification by you, in which event you shall
     cooperate with Gravitykey Technologies Private Limited in asserting any available
     defenses.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited&nbsp;shall
     not be liable for any special, direct, indirect, punitive, incidental, or
     consequential damages or any damages whatsoever (including but not limited
     to damages for loss of profits or savings, business interruption, loss of
     information), whether in contract, negligence, tort, equity or otherwise
     or any other damages resulting from any of the following<o:p></o:p></span></li>
 <ul style="margin-top:0in" type="circle">
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">the use or the inability to use
      the Site or Service, including loss of data or downtime;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">any malfunction on the Site or
      with the Service, including failure to deliver notifications to Users and
      Members;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">any defect in goods, samples,
      data, information or services purchased or obtained from a User or any
      other third party through the Site;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">violation of rights of third
      parties or claims or demands that User's manufacture, importation,
      export, distribution, offer, display, purchase, sale and/or use of
      products or services offered or displayed on the Site may violate or may
      be asserted to violate the rights of any third parties; or claims by any
      party that they are entitled to defense or indemnification in relation to
      assertions of rights, demands or claims by third parties<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">unauthorized access by third
      parties to data or private information of any User;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">statements or conduct of any User
      of the Site, including misleading, malicious, or criminal use of the
      Service by a User; and<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">any matters relating to Service
      however arising, including negligence<o:p></o:p></span></li>
 </ul>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Notwithstanding any of the foregoing provisions, the
     aggregate liability of Gravitykey Technologies Private Limited, our
     employees, agents, affiliates, representatives or anyone acting on our
     behalf with respect to each User for all claims arising from the use of
     the Site or Service during any calendar year shall be limited to the
     greater of (a) the amount of fees the User has paid to Gravitykey
     Technologies Private Limited or our affiliates during the calendar year
     and (b) US$100.00. The preceding sentence shall not preclude the
     requirement by the User to prove actual damages. All claims arising from
     the use of the Site or Service must be filed within one (1) year from the
     date the cause of action arose.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Users — not Gravitykey Technologies Private Limited
     — are solely responsible for compliance with any and all privacy laws in
     such User’s jurisdiction, including HIPAA and HITECH compliance. Any
     storage of Personally Identifying Information (PII), Personal Data (as
     defined in the Privacy Policy), and Personal Health Information (PHI) may
     only be stored on the Site after the User agrees to the Terms and
     Conditions of using this site.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">The limitations and exclusions of liability to you
     under the Terms shall apply to the maximum extent permitted by law and
     shall apply whether or not Gravitykey Technologies Private Limited has
     been advised of or should have been aware of the possibility of any such
     losses arising<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Force Majeure Under no circumstances shall
     Gravitykey Technologies Private Limited be held liable for any delay or
     failure or disruption of the content or services delivered through the
     Site resulting directly or indirectly from acts of nature, forces or
     causes beyond our reasonable control, including without limitation,
     Internet failures, computer, telecommunications or any other equipment
     failures, electrical power failures, strikes, labor disputes, riots,
     insurrections, civil disturbances, shortages of labor or materials, fires,
     flood, storms, explosions, acts of God, war, governmental actions, orders
     of domestic or foreign courts or tribunals or non-performance of third
     parties.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Intellectual Property
Rights<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">The Site and its original content, features and
     functionality (including look!) are owned by Gravitykey Technologies
     Private Limited and are protected by Indian States and international
     copyright, trademark, patent, trade secret and other intellectual property
     or proprietary rights laws. You agree to not copy, modify, create
     derivative works of, publicly display, publicly perform, republish, any of
     our copyrighted material, except to the extent permitted by the Site
     itself. If you have doubts about whether and how to use of material on the
     Site, please send your questions/concerns to: <a href="file:///C:/GravityKey/Admin/support@skedis.in">support@skedis.in</a><o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">For purposes of these Terms of Service, the term
     “Content” includes, without limitation, information, data, text, photographs,
     videos, audio clips, written posts and comments, software, scripts,
     graphics, and interactive features generated, provided, or otherwise made
     accessible on or through the Site. For the purposes of these Terms of
     Service, “Content” also includes all User Content.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each Member represents, warrants and agrees that (a)
     you shall be solely responsible for obtaining all necessary third party
     licenses and permissions regarding any User Content that you submit, post
     or display; (b) any User Content that you submit, post or display does not
     infringe or violate any of the copyright, patent, trademark, trade name,
     trade secrets or any other personal or proprietary rights of any third
     party (“Third Party Rights”); and (c) you have the right and authority to
     sell, trade, distribute or export or offer to sell, trade, distribute or
     export the products or services described in the User Content and such
     sale, trade, distribution or export or offer does not violate any Third
     Party Rights.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Each Member further represents, warrants, and agrees
     that the User Content that you submit, post or display shall:<o:p></o:p></span></li>
 <ul style="margin-top:0in" type="circle">
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">be true, accurate, complete, and
      lawful; not be false, misleading or deceptive.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not contain any material which is
      defamatory, obscene, indecent, abusive, offensive, harassing, violent,
      hateful, inflammatory, or otherwise objectionable<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not promote sexually explicit or
      pornographic material, violence, or discrimination based on race, sex,
      religion, nationality, disability, sexual orientation or age.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not violate other Terms or any applicable
      Additional Agreements<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not violate any applicable laws
      and regulations (including without limitation those governing export
      control, consumer protection, unfair competition, or false advertising)
      or promote any activities which may violate any applicable laws and regulations.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not infringe any patent,
      trademark, trade secret, copyright, or other intellectual property rights
      of any other person.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not violate the legal rights
      (including the rights of publicity and privacy) of others or contain any
      material that could give rise to any civil or criminal liability under
      applicable laws or regulations or that otherwise may conflict with these
      Terms of Service.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not promote any illegal activity,
      or advocate, promote or assist any unlawful act.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">not contain any link directly or
      indirectly to any other web Site which includes any content that may
      violate the Terms.<o:p></o:p></span></li>
 </ul>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">All User Content, whether publicly posted or
     privately transmitted, is the sole responsibility of the person who
     originated such User Content. You represent that all User Content provided
     by you is accurate, complete, up-to-date, and in compliance with all
     applicable laws, rules and regulations. You acknowledge that all Content,
     including User Content, accessed by you using the Site is at your own risk
     and you will be solely responsible for any damage or loss to you or any
     other party resulting therefrom. We do not guarantee that any Content you
     access on or through the Site is or will continue to be accurate.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You hereby grant Gravitykey Technologies Private
     Limited a worldwide, non-exclusive, perpetual, royalty-free, fully paid,
     sublicensable and transferable license to use, edit, modify, reproduce,
     distribute, prepare derivative works of, display, perform, and otherwise
     fully exploit any User Content you post, display or provide to Gravitykey
     Technologies Private Limited or our representative(s) in connection with
     the Site and our (and our successors’ and assigns’) businesses, including
     without limitation for promoting and redistributing part or all of the
     Site (and derivative works thereof) in any media formats and through any
     media channels (including, without limitation, third party websites and
     feeds). You also hereby do and shall grant each user of the Site a
     non-exclusive, perpetual license to access your User Content through the
     Site, and to use, edit, modify, reproduce, distribute, prepare derivative
     works of, display and perform such User Content. For clarity, the
     foregoing license grants to us and our users does not affect your other
     ownership or license rights in your User Content, including the right to
     grant additional licenses to your User Content, unless otherwise agreed in
     writing. You represent and warrant that you have all rights to grant such
     licenses to us without infringement or violation of any third-party
     rights, including without limitation, any privacy rights, publicity
     rights, copyrights, trademarks, contract rights, or any other intellectual
     property or proprietary rights.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">We do not guarantee that any Content will be made
     available on the Site. We reserve the right to, but do not have any
     obligation to, (i) remove, edit or modify any Content in our sole
     discretion, at any time, without notice to you and for any reason
     (including, but not limited to, upon receipt of claims or allegations from
     third parties or authorities relating to such Content or if we are
     concerned that you may have violated these Terms of Service), or for no
     reason at all and (ii) to remove or block any Content from the Site.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You are permitted to use the Site for your personal,
     non-commercial use, or legitimate business purposes, provided that your
     activities are lawful and in accordance with these Terms of Service.
     Prohibited uses include violation of laws and regulations, hacking the
     Site in any manner, or violating the Content Standards set below. No
     right, title or interest in or to the Site or any content on the site is
     transferred to you, and all rights not expressly granted are reserved. Any
     use of the Site not expressly permitted by these Terms of Service is a
     breach of these Terms of Service and can lead to account termination.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited may have
     independent third parties involved in the provision of the Service (e.g.,
     the authentication and verification service providers). You may not use
     any trademark, service mark or logo of such independent third parties
     without prior written approval from such parties.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Notices<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">All legal notices or demands to or upon Gravitykey
     Technologies Private Limited shall be made in writing and sent to
     Gravitykey Technologies Private Limited by courier, certified mail, or
     facsimile to the following Gravitykey address: Gravitykey Technologies
     Private Limited, No. 33, Vidhya Lakshmi Street, Lakshmi Nagar, Mudichur,
     Tambaram, Chennai – 600048. The notices shall be effective when they are
     received by Gravitykey Technologies Private Limited in any of the
     above-mentioned manner.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">All legal notices or demands to or upon a User shall
     be effective if either delivered personally, sent by courier, certified mail,
     by facsimile or email to the last-known correspondence, fax or email
     address provided by the User to Gravitykey Technologies Private Limited,
     or by posting such notice or demand on an area of the Site that is
     publicly accessible without a charge. Notice to a User shall be deemed to
     be received by such User when: (a) Gravitykey Technologies Private Limited
     is able to demonstrate that communication, whether in physical or
     electronic form, has been sent to such User, or (b) immediately upon
     Gravitykey Technologies Private Limited posting such notice on an area of
     the Site that is publicly accessible without charge.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">You agree that all agreements, notices, demands,
     disclosures and other communications that Gravitykey Technologies Private
     Limited sends to you electronically satisfy the legal requirement that
     such communication should be in writing.<o:p></o:p></span></li>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Specific Copyright
Infringement Notices<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">We do not undertake to review all material before it
     is posted on the Site and cannot ensure prompt removal of objectionable
     material after it has been posted. Accordingly, we assume no liability for
     any action or inaction regarding transmissions, communications or content
     provided by any user or third party. In the unlikely event we receive a
     disclosure request from an authorized party, we reserve the right to
     disclose user identities when required to do so by the law, including in
     response to a law enforcement request supported by a valid court order.
     You waive and hold harmless the Company from any claims resulting from any
     action taken by the Company during or as a result of its investigations
     and from any actions taken as a consequence of investigations by either
     the Company or law enforcement authorities.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">If you believe that any User Content violates your
     copyright, please provide us a written takedown notice including the
     following information:<o:p></o:p></span></li>
 <ul style="margin-top:0in" type="circle">
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">A physical or electronic
      signature of a person authorized to act on behalf of the owner of an
      exclusive right that is allegedly infringed.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Identification of the copyrighted
      work claimed to have been infringed, or, if multiple copyrighted works at
      a single online site are covered by a single notification, a
      representative list of such works at that site.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Identification of the material
      that is claimed to be infringing or to be the subject of infringing
      activity and that is to be removed or access to which is to be disabled,
      and information reasonably sufficient to permit us to locate the material.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Information reasonably sufficient
      for us to contact you, such as email, GravityKey address, telephone number.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">A statement that you a good faith
      belief that use of the material in the manner complained of is not
      authorized by the copyright owner, its agent, or the law.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">A statement that the information
      in the notification is accurate, and under penalty of perjury, that you are
      authorized to act on behalf of the owner of an exclusive right that is
      allegedly infringed.<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">The notice should be addressed
      via Certified Mail to, c/o Gravitykey Technologies Private Limited, Gravitykey
      Technologies Private Limited, No 33 Vidhya Lakshmi Street Lakshmi Nagar,
      Mudichur Tambaram Chennai 600048.<o:p></o:p></span></li>
 </ul>
</ul>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:0in;
margin-bottom:7.5pt;margin-left:.5in;text-align:center;line-height:normal"><b><span style="font-size: 11.5pt; color: rgb(102, 102, 102);">Dispute Resolution and
Arbitration Agreement<o:p></o:p></span></b></p>

<ul style="margin-top:0in" type="disc">
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">This Dispute Resolution and Arbitration Agreement
     shall apply if your (i) Country of Residence is in India; or (ii) your
     Country of Residence is not in the India, but you bring any claim against
     Gravitykey Technologies Private Limited in India:<o:p></o:p></span></li>
 <ul style="margin-top:0in" type="circle">
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Arbitrators must be neutral, and
      no party may unilaterally select an arbitrator;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Arbitrators must disclose any
      bias, interest in the result of the arbitration, or relationship with any
      party;<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">Parties retain the right to seek
      relief in small claims court for certain claims, at their option<o:p></o:p></span></li>
  <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:
      normal;mso-list:l0 level2 lfo1;tab-stops:list 1.0in"><span style="font-size: 11.5pt;">The arbitrator can grant any
      remedy that the parties could have received in court to resolve the
      party’s individual claim.<o:p></o:p></span></li>
 </ul>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Agreement to Arbitrate. You and Gravitykey
     Technologies Private Limited mutually agree that any dispute, claim, or
     controversy arising out of or relating to these Terms or the breach,
     termination, enforcement, or interpretation thereof, or to the use of the
     Service or Site (collectively, “Disputes”) will be settled by binding
     arbitration (the “Arbitration Agreement”). If SkedisA dispute about whether
     this Arbitration Agreement can be enforced or applies to our Dispute, you
     and Gravitykey Technologies Private Limited agree that the arbitrator will
     decide that issue.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Exceptions to Arbitration Agreement. You and
     Gravitykey Technologies Private Limited each agree that the following
     claims are exceptions to the Arbitration Agreement and will be brought in
     a judicial proceeding in a court of competent jurisdiction: (i) Any claim
     related to actual or threatened infringement, misappropriation or
     violation of a party’s copyrights, trademarks, trade secrets, patents, or
     other intellectual property rights; (ii) Any claim seeking emergency
     injunctive relief based on exigent circumstances (e.g., imminent danger or
     commission of a crime, hacking, cyber-attack).<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Arbitration Rules and Governing Law. This
     Arbitration Agreement evidences a transaction in interstate commerce and
     thus the Federal Arbitration Act governs the interpretation and
     enforcement of this provision.&nbsp;<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Arbitrator’s Decision. The arbitrator’s decision
     will include the essential findings and conclusions upon which the
     arbitrator based the award. Judgment on the arbitration award may be
     entered in any court with proper jurisdiction. The arbitrator may award
     declaratory or injunctive relief only on an individual basis and only to
     the extent necessary to provide relief warranted by the claimant’s
     individual claim.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">No Class Actions or Representative Proceedings. You
     and Gravitykey Technologies Private Limited acknowledge and agree that we
     are each waiving the right to participate as a plaintiff or class member
     in any purported class action lawsuit, class-wide arbitration, private
     attorney-general action, or any other representative proceeding as to all
     Disputes. Further, unless you and Gravitykey Technologies Private Limited
     both otherwise agree in writing, the arbitrator may not consolidate more
     than one party’s claims and may not otherwise preside over any form of any
     class or representative proceeding. If this paragraph is held
     unenforceable with respect to any Dispute, then the entirety of the
     Arbitration Agreement will be deemed void with respect to such Dispute.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited and Providers
     of Service are independent contractors, and no agency, partnership, joint
     venture, employee-employer, or franchiser-franchisee relationship is
     intended or created by the Terms.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">The Terms of Service constitutes the entire
     agreement between you and Gravitykey Technologies Private Limited and
     govern your use of the service, superseding any prior agreements
     (including, but not limited to, any prior versions of the Terms of
     Service). If any provision of these Terms of Service is held by a court of
     competent jurisdiction to be invalid, illegal or unenforceable for any
     reason, such provision shall be eliminated or limited to the minimum
     extent such that the remaining provisions of the Terms of Service will
     continue in full force and effect.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Headings are for reference purposes only and in no
     way define, limit, construe or describe the scope or extent of such section.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited’s failure to
     enforce any right or failure to act with respect to any breach by you
     under the Terms will not constitute a waiver of that right nor a waiver of
     Gravitykey Technologies Private Limited’s right to act with respect to
     subsequent or similar breaches.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">Gravitykey Technologies Private Limited shall have
     the right to assign the Terms (including all our rights, titles, benefits,
     interests, and obligations and duties in the Terms to any person or entity
     (including any affiliates of Gravitykey Technologies Private Limited). You
     may not assign, in whole or part, the Terms to any person or entity.<o:p></o:p></span></li>
 <li class="MsoNormal" style="color:#666666;margin-bottom:7.5pt;line-height:normal;
     mso-list:l0 level1 lfo1;tab-stops:list .5in"><span style="font-size: 11.5pt;">The Terms shall be governed by the laws of Chennai, Tamilnadu,
     India&nbsp;without regard to its conflict of law provisions. The parties
     to the Terms hereby submit to the exclusive jurisdiction of the High court
     of Chennai or any of its branches.</span></li></ul></h3></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="about-popup" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title text-center">About us</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <h4>We grow businesses by creating the right products.</h4>
       <p>At Gravitykey, we all come to work every day because we want to solve the biggest problems that our customers face in their businesses.Everyone is guessing. Throughout the history of business, people use data to make more informed decisions. Our mission at Gravitykey is to provide the most actionable data & insights in the industry. We want to make this data available to as many businesses as possible</p>
       <b>WHO WE ARE</b>
       <p>A team that loves to innovate
We have a lot of energy with top notch talent with great ideas. Our technologies have over 15 years of experience on working with Fortune 100 clients and have played a stellar role in architecting their landscape</p>
       <b>WHAT WE DO</b>
       <p>Keep it simple
We build solutions for you from Apps to Artificial intelligence, on cloud platforms, turning data into insights with out Advanced Analytics solutions.</p>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="contact-popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title text-center">Contact us</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class=" col-md-12 contact-form">
			<h4 class="heading">Get In Touch</h4>
				<form action="" method="post">
						<input type="text" placeholder="Full Name" name="fname" required="">
						<input type="email" placeholder="Your Mail" name="email" required="">
						<input type="text" placeholder="Mobile Number" name="mobile" required="">
						<textarea placeholder="Message" name="address" required=""></textarea>
						
							<input type="submit" class="btn btn-info" value="send" name="send">
						
				</form>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="demo--card-popup" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title text-center">Privacy Policy</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <h3 style="font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><br></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px; color: rgb(102, 102, 102);">Gravitykey Technologies Private Limited and our affiliates (together, “Gravitykey,” "us", "we", or "our") operates a web site at <a href="https://skedis.com">https://skedis.com</a>&nbsp; (the “Site”).By our “Service” we mean all related web sites, downloadable software, mobile applications (including tablet applications), and other services provided by us, or any digital media on which a link to this Privacy Policy is displayed, and all other communications with individuals though written or oral means (such as email or phone) directed at accessing or using any service we offer, together with the Site. We are providing you this Privacy Policy so that you can be informed about our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data. We may use your data to provide and improve the Service or to provide technical support for customers using our Service.By using the Service, you agree to the collection and use of information in accordance with this policy, and our Terms of Service. This Privacy Policy is incorporated into and subject to our Terms of Service.Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms of Service.</p><ul style="margin-bottom: 10px; color: rgb(102, 102, 102);"><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">1. Key Terms Used in this Privacy Policy</span></h3><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Client”</span>&nbsp;means a customer of Gravitykey</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Client Data”</span>&nbsp;means Personal Data a Client provides to use the Service</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Personal Data”</span>&nbsp;means any information relating to an identified or identifiable natural person or considered personally identifiable information by law</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Public Area”</span>&nbsp;means those portions of the Service that can be accessed both by Users and Visitors, without needing to log in</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Restricted Area”</span>&nbsp;means those portions of the Service that can be accessed only by logging in.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“User”&nbsp;</span>means a person or entity that uses the Service</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“User Data”</span>&nbsp;means Personal Data that a User provides to use the Service</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Visitor”</span>&nbsp;means an individual other than a User, who uses the public area, but has no access to the restricted areas of the Site or Service.</p></li></ul><ul style="margin-bottom: 10px; color: rgb(102, 102, 102);"><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">2. Information We Collect</span></h3><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">2.1 Client and User Provided Information</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">We collect information to provide and improve our Service to you.We sometimes collect Personal Data including:</p><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Registration Information”:</span>&nbsp;When you register to use our Service, you will be asked to complete a registration form.This form requires providing information such as name, address, phone/fax number, email address and other Personal Data.This form also requires providing information about your business</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Publishing Information“:</span>&nbsp;We also collect information you submit through our Site or to us for publication on the Site through the publishing tools there.By submitting Publishing Information, you consent to its publication to the extent such information is not Personal Data.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Usage Data“:&nbsp;</span>We may also collect information that your browser sends whenever you visit our Service. This may include information such as your computer's Internet Protocol address (i.e. IP address), browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers, and the like. Usage Data may also include data about your purchasing patterns, your contact details, and your profile information.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Payment Information“:&nbsp;&nbsp;</span>&nbsp;We may collect billing information, credit card numbers and expiration dates, tracking information from checks or money orders, or other payment information particularly if you establish a credit account with us or our providers or if you purchase a product or service from us, other Users of the Service, or other vendors available through the Site</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Account Activities Information“:&nbsp;</span>We record and retain the records of your Account activities when you use the Service. If you make sale and purchase transactions online through Gravitykey’s web-based transaction platform, we also collect information related to such transactions including the types and specifications of the goods, pricing and delivery information, any trade dispute records.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Statistical Information“:&nbsp;</span>In addition, we gather statistical information about our Site and Users, such as IP addresses, browser software, operating system, software and hardware attributes, pages viewed, number of sessions, unique visitors and so forth.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Marketing Information“:&nbsp;</span>From time to time, we gather information about our Users and prospective users during trade shows, marketing events and other functions for follow up marketing purposes</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">“Disclosed Personal Information“:&nbsp;</span>From time to time, our Users may disclose Personal Data deliberately or inadvertently including without limitation to personal identifiers such as name, email addresses, telephone number, facsimile number and IP address of individuals in the course of using the Site</p></li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">2.2 Information Collected by Clients&nbsp; &nbsp;&nbsp;</span>A User may store or upload data into the Service.Gravitykey has no direct relationship with the non Client Users whose Personal Data it may host as part of Client Data.Each Client is responsible for providing notice to Users who are its customers and third persons concerning the purpose for which the Client collects their Personal Data and how this Personal Data is processed in or through the Service as part of Client Data.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">2.3 Information Collected by Cookies&nbsp; &nbsp;</span>We use "cookies" to store specific information about you and track your visits to our Site. It is not uncommon for websites to use cookies to enhance identification of their users. A "cookie" is a small amount of data that is sent to your browser and stored on your computer's hard drive. A cookie can be sent to your computer's hard drive only if you access our Site using the computer. If you do not de-activate or erase the cookie, each time you use the same computer to access our Site, our web servers will be notified of your visit to our Site and in turn we may have knowledge of your visit and the pattern of your usage. We use automatically collected information and other information collected on the Service through cookies and similar technologies to: (i) personalize our Service, such as remembering a User’s or Visitor’s information so that the User or Visitor will not have to re-enter it during a visit or on subsequent visits; (ii) provide customized advertisements, content, and information; (iii) monitor and analyze the effectiveness of Service and third-party marketing activities; (iv) monitor aggregate site usage metrics such as total number of visitors and pages viewed; and (v) track your entries, submissions, and status in any promotions or other activities on the Service. You can learn more about cookies by visiting http://www.allaboutcookies.org</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;">You can determine if and how a cookie will be accepted by configuring your browser, which is installed in the computer you are using to access the Site. If you desire, you can change those configurations in your browser to accept all cookies, to be notified when a cookie is sent, or to reject all cookies. If you reject all cookies you may be required to re-enter your information on our Site more often and certain features of our Site may be unavailable.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Examples of Cookies we may use:</p><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">Session Cookies&nbsp;</span>We may use Session Cookies to operate our Service.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">Preference Cookies</span>&nbsp;We may use Preference Cookies to remember your preferences and various settings.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">Security Cookies</span>&nbsp;We may use Security Cookies for security purposes</p></li><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">2.4 Collected Information</span>&nbsp;By “Collected Information” we mean information collected by cookies, information collected by Clients that is provided to us or collected by us as Client Data, Registration Information, Publishing Information, Usage Data, Payment Information, Account Activities Information, Statistical Information, Marketing Information, Disclosed Personal Information and any information we may collect from you, from our affiliates, or from other parties or through any other means</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">3. How we Use Collected Information</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Gravitykey Technologies Private Limited may use the Collected Information for various purposes</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.1 General:</span>&nbsp;We use your Collected Information to improve our marketing and promotional efforts, to statistically analyze site usage, to improve our content and product offerings and to customize our Site's content, layout and Service specifically for you. We may use your Collected Information to provide technical support to Clients or other services to Clients, including but not limited to investigating problems, resolving disputes and enforcing agreements with us. We may use your Collected Information to facilitate proper operation of our Service and business activities of its Users including without limitation to facilitation of effective communication between buyers and suppliers and marketing activities of Users</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">We do not otherwise sell, rent, trade or exchange any Personal Data of our Clients, Users or Visitors&nbsp; &nbsp;</span>Your Collected Information may be transferred, stored, used and processed outside your home jurisdiction. In case of a merger with or transfer of business to another business entity, we will transfer your Collected Information to the entity which acquires the business (Should such a combination occur, we will require that the new combined entity follow this Privacy Policy with respect to your Collected Information)</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.2 Registration Information</span>&nbsp;We may use your Registration Information to provide services that you request or to contact you regarding additional services about which Gravitykey determines that you might be interested. Specifically, we may use your email address, mailing address, phone number, mobile number or fax number to contact you regarding notices, surveys, product alerts, new service or product offerings and communications relevant to your use of our Site. We may generate reports and analysis based on the Registration Information for internal analysis, monitoring and marketing decisions</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.3 Publishing Information:</span>&nbsp;All of your Publishing Information will be publicly available on the Site and therefore accessible by any internet user. Any Publishing Information that you disclose to Gravitykey becomes public information and you relinquish any proprietary rights (including but not limited to the rights of confidentiality and copyrights) in such information. You should exercise caution when deciding to include personal or proprietary information in the Publishing Information that you submit to us</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.4 Usage Data:</span>&nbsp;We use Usage Data to provide value-added services to our members including without limitation to providing buying pattern and buying behavioral data to our members to facilitate marketing initiatives and decision-making.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.5 Payment Information:</span>&nbsp;Gravitykey will share your Payment Information with banks or vendors relevant to the transaction in order to enable transactions to be completed. In addition, Gravitykey may use Payment Information to determine your credit-worthiness and, in the process of such determination, Gravitykey may make such Payment Information available to banks or credit agencies. While Gravitykey has in place up-to-date technology and internal procedures to guard your Payment Information against intruders, there is no guarantee that such technology or procedure can eliminate all of the risks of theft, loss or misuse. Gravitykey shall not be liable to you or any other person for any damages that might result from unauthorized use, publication, disclosure or any other misuse of Payment Information, including credit card information.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.6 Account Activities Information:</span>&nbsp;We use Account Activities Information to provide the services that you request. We may also generate reports, statistics and analysis based on Account Activities Information to enhance and improve our Site and services. We may also use Account Activities Information to determine your credit-worthiness.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.7 Statistical Information:&nbsp;</span>We use Statistical Information to help diagnose problems with and maintain our computer servers, to manage our Site, and to enhance our Site and services based on the usage pattern data we receive. We may generate reports and analysis based on the Statistical Information for internal analysis, monitoring and marketing decisions. We may provide Statistical Information to third parties, but when we do so, we do not provide personally identifying information without your permission</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">3.8 Disclosed Personal Information:</span>&nbsp;We facilitate electronic commerce between businesses and our services should not be used by individual consumers or for personal use. Should Personal Information be disclosed for business purposes in the course of using our Site and services, such Personal Information may be used to provide value-added services to our members to facilitate including without limitation marketing initiatives and contacts. Uses of any Personal Information by any of our members are subject to privacy laws in the respective jurisdictions of our members. Each of our members is solely responsible for observing applicable laws and regulations in its respective jurisdictions to ensure that all use of the Site and Services are in compliance with the same. Each of our members is expressly prohibited from using any Personal Information for illegal activities including without limitation to spamming</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">3.8 Disclosed Personal Information:</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">4.1 Unrestricted Information.</span>&nbsp;Any information that you voluntarily choose to include in a Public Area of the Service, will be available to any Visitor or User who has access to that content.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">4.2 Disclosure to Service Providers.</span>We may provide your Collected Information to our affiliates and service providers under contract (such as customer care) to support the operation of the Site and Service. We work with third party service providers who provide website, application development, hosting, maintenance, and other services for us. These third parties may have access to, or process Personal Data or Client Data as part of providing those services for us. We limit the information provided to these service providers to that which is reasonably necessary for them to perform their functions, and our contracts with them require them to maintain the confidentiality of such information.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">4.3 Business Transactions</span>If Gravitykey is involved in a merger, acquisition or asset sale, your Personal Data may be transferred as a result of that merger, acquisition, or asset sale. We will provide notice if your Personal Data becomes subject to a different Privacy Policy</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">4.4 Disclosure for Law Enforcement&nbsp; &nbsp;</span>Under certain circumstances, Gravitykey may be required to disclose or make public Collected Information, including your Personal Data. For example, we may disclose Personal Data in the good faith belief that such action is necessary to:</p><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To comply with a legal obligation, for example in response to a subpoena or other judicial order or when we reasonably believe that such disclosure is required by law, regulation or administrative order of any court, governmental or regulatory authority.</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To protect and defend the rights or property of Gravitykey Technologies Private Limited, including to identify, contact or bring legal action against someone who may be infringing or threatening to infringe, or who may otherwise be causing injury to or interference with, the title, rights, interests or property of Gravitykey, our Users, Clients, partners, affiliates, Visitors, or anyone else who could be harmed by such activities</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To prevent or investigate possible wrongdoing in connection with the Service</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To protect the personal safety of users of the Service or the public</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To protect against legal liability</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To pursue a claim or prevent further injury to Gravitykey or others If we have reason to believe that a User is in breach of the Terms of Use or any other agreement with us</p></li><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">5. Retention of Data</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Gravitykey Technologies Private Limited will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy or as reasonably necessary to provide, promote and support the Service. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies. Gravitykey Technologies Private Limited will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of our Service, or we are legally obligated to retain this data for longer time periods</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">6. Transfer Of Data</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction .If you are located outside United States and choose to provide information to us, please note that we transfer the data, including Personal Data, to United States and process it there</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.Gravitykey Technologies Private Limited will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your Personal Data and other personal information</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">7. Co-Branded Relationships</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">We have established relationships with other parties to offer you the benefit of other products and services that we ourselves do not offer. We offer you access to these other parties either through the use of hyperlinks to their sites from our Site, or through offering "co-branded" sites in which both ourselves and these other parties share the same uniform resource locator, domain name or pages within a domain name on the Internet. In some cases, you may be required to submit information for purposes of registering or applying for products or services provided by such third parties or co-branded partners. The privacy policy of such other parties may differ from ours, and we may not have any control over the information that you submit to such third parties or co-branded sites. We therefore encourage you to read that policy before responding to any offers, products or services provided by such other parties.</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">8. Security Of Data</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">If you are a Client or User who has registered with the Service, your Registration Information, Publishing Information and Payment Information (if any) can be viewed and edited through your Account, which is protected by a Password. We recommend that you do not divulge your Password to anyone. Our personnel will never ask you for your Password in an unsolicited phone call or in an unsolicited e-mail. If you share a computer with others, you should not choose to save your login information (e.g., User ID and Password) on the computer. Remember to sign out of your Account and close your browser window when you have finished your session. If you are a User or Visitor, please note that no method of transmission over the Internet, wireless transmission, or method of electronic storage is perfectly secure. The security of your data is important to us, and we strive to use commercially acceptable means to protect your Personal Data. However, we cannot guarantee its security</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">9. Children's Privacy</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Our Service does not address and is not directed towards anyone under the age of 13 ("Children"). We do not knowingly collect personally identifiable information from anyone under the age of 13. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">10. Your Rights</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Gravitykey Technologies Private Limited aims to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Data.</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">10.1 Modifying Personal Data&nbsp; &nbsp;</span>Whenever made possible, if you have registered to use our Service, you can update your Personal Data directly within your account settings section. If you are unable to change your Personal Data, please contact us to make the required changes</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">10.2 Removing Personal Data&nbsp; &nbsp;</span>If you wish to be informed what Personal Data we hold about you and if you want it to be removed from our systems, please contact us.If you are not a Client or User it is extremely unlikely that we would have your Personal Data</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">10.3 Data Portability&nbsp; &nbsp;</span>You have the right to data portability for the information you provide to Gravitykey Technologies Private Limited You can request to obtain a copy of your Personal Data in a commonly used electronic format so that you can manage and move it. Gravitykey’s systems have been set up to allow the Client with whom you shared your Personal Data to provide a copy of your Personal Data in commonly used electronic format, as it may be reasonably available and technologically feasible to obtain or segregate from other data. Therefore, you should make any request for a copy of your Personal Data to such Client</p><p class="pa" style="margin-bottom: 10px; font-size: 15px;"><span style="font-weight: 700;">10.4 Other Data Subject Rights&nbsp; &nbsp;&nbsp;</span>In certain circumstances, you have the right:</p><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To access and receive a copy of the Personal Data we hold about you</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To rectify any Personal Data held about you that is inaccurate</p></li><li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">To request the deletion of Personal Data held about you</p></li><p class="pa" style="margin-bottom: 10px; font-size: 15px;">Please note that our systems are set up so that the Client can respond to requests regarding these rights and you should contact any Client with whom you have shared Personal Data regarding this request. Please further note that you may be asked to verify your identity before receiving a response to such requests</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">11. Changes To This Privacy Policy</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page .We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy. You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p><h3 style="color: rgb(68, 68, 68); margin-top: 20px; margin-bottom: 10px;"><span style="font-weight: 700;">12. Contact Us</span></h3><p class="pa" style="margin-bottom: 10px; font-size: 15px;">If you have any questions about this Privacy Policy, please contact us by email at support@skedis.in</p></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



                        </section>
<script>
// Render Google Sign-in button
function onSignIn(googleUser) {
    
  var profile = googleUser.getBasicProfile();
 // console.log(profile);
 document.getElementById('fname').value=profile.getName();
 document.getElementById('mail').value=profile.getEmail();
 document.getElementById('google-id').value=profile.getId();
 document.getElementById('sign-out').style.display="block";
//  document.getElementsByClassName('account')[0].style.display="block";
//  document.getElementsByClassName('logincheck')[0].style.display="none";

check_google_user(profile.getId());
}

function check_google_user(id){
    var token=$('#token').val();
    $.post("index.php/customers/check_google_user", {
         'google_id': id,
         'csrfToken': token,
    },function(data){
        if(data==0){
           
            Notiflix.Notify.Warning('Please provide Organization,Mobile Details');
            document.getElementById('login-frame').style.display="none";
            document.getElementById('signup-frame').style.display="block";
        }else{
           // var res=JSON.parse(data);           
            
            document.getElementById('login-frame').style.display="block";
            document.getElementById('signup-frame').style.display="none";
            document.getElementById('sign-out').style.display="block"; 
            window.location="Appointments";    
        

     }
       

    });

}


  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      //console.log('User signed out.');
      document.getElementById('sign-out').style.display="none";
      document.getElementById('fname').value='';
 document.getElementById('mail').value='';
 document.getElementById('google-id').value='';
 document.getElementById('signup-frame').style.display="none";
 document.getElementById('login-frame').style.display="block";
 
    });
  }


  window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '551138646119611', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.2' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
           // document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
       
        document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
       
        document.getElementById('fbLink').innerHTML = "<i class='fab fa-facebook-f'></i> Logout";
       document.getElementById('fname').value=response.first_name;
 document.getElementById('mail').value=response.email;
 document.getElementById('google-id').value=response.id;
 document.getElementById('sign-out-fb').style.display="block";
//  document.getElementsByClassName('account')[0].style.display="block";
//  document.getElementsByClassName('logincheck')[0].style.display="none";
 check_fb_user(response.id);
        
    });
}

function check_fb_user(id){
    var token=$('#token').val();
    $.post("index.php/customers/check_google_user", {
         'google_id': id,
         'csrfToken': token,
    },function(data){
        if(data==0){
             Notiflix.Notify.Warning('Please provide Organization,Mobile Details');
            document.getElementById('login-frame').style.display="none";
            document.getElementById('signup-frame').style.display="block";
        }else{
            document.getElementById('login-frame').style.display="block";
            document.getElementById('signup-frame').style.display="none";
            document.getElementById('sign-out').style.display="block"; 
            window.location="Appointments";
        

  }
       

    });

}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = "<i class='fab fa-facebook-f'></i> Login";
        document.getElementById('sign-out-fb').style.display="none"
        document.getElementById('fname').value='';
 document.getElementById('mail').value='';
 document.getElementById('google-id').value='';
//  document.getElementsByClassName('account')[0].style.display="none";
//  document.getElementsByClassName('logincheck')[0].style.display="block";
document.getElementById('login-frame').style.display="block";
document.getElementById('signup-frame').style.display="none";
      //  document.getElementById('userData').innerHTML = '';
        //document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
    });
}





</script>



<script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
<script src="<?= asset_url('assets/js/validate.js') ?>"></script>

<script src="<?= asset_url('assets/js/notiflix-2.7.0.min.js') ?>"></script>
<?php
if(@$_GET['site'] == "BJH"){
    @$_SESSION['orgid']=$_GET['orgid'];
}


?>
<script>
    const qstr = new URL(window.location.href);
    const site = qstr.searchParams.get('site');
     const orgid = qstr.searchParams.get('orgid');
     const sign = qstr.searchParams.get('sign');

     if(sign==1){
             document.getElementById('login-frame').style.display="none";
            document.getElementById('signup-frame').style.display="block";
     
     }else{
        document.getElementById('login-frame').style.display="block";
            document.getElementById('signup-frame').style.display="none";
     }
  
    if(site == "BJH"){
        
   
        document.getElementById('username').value="9677767284";
        document.getElementById('password').value="admin@123;";
       var x= document.getElementById('organization').selectedIndex;
       document.getElementById('organization').selectedIndex=1;
       document.getElementById('organization').disabled=true;
       $('#sublog').click();
     
    }  else{
          document.getElementById('organization').disabled=false;
    }      
        
   $('#log-btn').on("click",function(){
            document.getElementById('login-frame').style.display="block";
            document.getElementById('signup-frame').style.display="none"; 
   })

   $('#sign-btn').on("click",function(){
    document.getElementById('login-frame').style.display="none";
            document.getElementById('signup-frame').style.display="block";
   })

   
    
</script>

</body>
</html>
<?php } ?>
