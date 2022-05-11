<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <title><?= lang('login') ?> | Gravitykey </title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">
	
	
	
	
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <style>

@font-face {
  font-family: 'cfont';
  src: url('<?php echo asset_url('assets/fonts/HelveticaNeue.ttf'); ?>') format('ttf');
} 
.alert
{
    display: none;
}

.requirements
{
    list-style-type: none;
}

.wrong .fa-check
{
    display: none;
}

.good .fa-times
{
    display: none;
}
  </style>
  <style>
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
  </style>
  <style>
  .required:after {
    content:" *";
    color: red;
  }
</style>



    <script src="<?php echo asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <style>
	form .error {
  color: #ff0000;
}
    .login {
        padding: 25px;
        margin: 41px 0px 0px 20%;
    }

    input.btn-login {
        color: white;
        background-color: #4e49d6;
        border: none;
        border-radius: 8px;
        width: 100%;
        padding: 7px;
        margin-top: 15px;

    }

    .btn-sig {

        color: #8a8b8b;
        background-color: #f6f8fa;
        border: none;
        border-radius: 8px;
        width: 100%;
        padding: 7px;
        margin-top: 15px;
        text-align: center;
    }

    .inpt {
        border-radius: 10px;
    }
    </style>
    <script>
    var GlobalVariables = {
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        baseUrl: <?= json_encode($base_url) ?>,
        destUrl: <?= json_encode($dest_url) ?>,
        AJAX_SUCCESS: 'SUCCESS',
        AJAX_FAILURE: 'FAILURE'
    };

    var EALang = <?= json_encode($this->lang->language) ?>;

    var availableLanguages = <?= json_encode(config('available_languages')) ?>;

    $(function() {
        GeneralFunctions.enableLanguageSelection($('#select-language'));
    });
    </script>
    <style>
    .left-d {
        background-color: #4e49d6;
        height: 100%;
        padding: 25%;
        padding-top: 2%;

    }

    .h-100 {
        height: 100%;
    }

    .left-d-text2 {
        font-size: 2.5em;
        text-align: left !important;

        color: #fff;
        font-weight: 700;
        margin-top: -15px;
    }

    .left-d-text {
        color: #fff;
        padding-top: 15%;
        /* font-size: 1.6em; */
    }

    .left-d-white {
        background-color: #fff !important;
        padding: 10% !important;
    }

    .left-num {
        /* UI Properties */
        background: #FFFFFF 0% 0% no-repeat padding-box;
        border: 1px solid #707070;
        border-radius: 13px;
        opacity: 0.51;
        width: 82px;
        text-align: center;
        height: 77px;
    }

    .left-t {
        /* UI Properties */
        text-align: left;
        font: normal normal 300 18px/35px Helvetica Neue;
        letter-spacing: 0px;
        color: #FFFFFF;
        opacity: 1;
    }

    .left-num label {

        /* UI Properties */
        text-align: center;
        font: normal normal bold 72px/75px Helvetica Neue;
        letter-spacing: 0px;
        color: #4E49D6;
        opacity: 1;
        font-family: sans-serif;
    }

    .left-p {
        width: 200px;
        height: 21px;
        padding-top: 13%;
        /* UI Properties */
        text-align: left;
        /* font: normal normal 300 18px/35px Helvetica Neue; */
        letter-spacing: 0px;
        color: #FFFFFF;
        opacity: 1;
    }

    .mb-10 {
        margin-bottom: 10%;
    }

    .plan1 {
        /* background-color: #EFF5FD; */
        height: 115px;
        width: 100%;
        line-height: .5;
        /* padding: 10px; */
        background: #EFF5FD 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000010;
        border-radius: 24px;
        opacity: 1;
        margin-bottom: 35px;
    }

    input[type="radio"] {
        display: none;
    }

    #radio1>label {
        display: inline-block;
        background-color: #ddd;
        padding: 4px 11px;
        font-family: Arial;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="radio"]:checked+label {
        background-color: #4E49D6;
        color: white;
    }

    label.plan-radio {
        background-color: #E4E4F4;
        color: white;
        width: 100%;
        height: 100%;
        border-radius: 0px 18px 18px 0px;
        text-align: center;
        padding-left: 3em;
        display:flex;
        align-items:center;
        margin-left: 25px;
        cursor: pointer;
    }
    .pt-10{
        padding-top:20px;
    }
    
    span.lg-price {
    font-size: 50px;
}
.mt-20{
    margin-top:20%;
}

.im{
    background-image:url("<?php echo asset_url('assets/img/bg.svg'); ?>");
    background-repeat:no-repeat;
    background-position: center;
}
    </style>

</head>

<body>
<form id="register-form">

    <div class="col-md-12 h-100" id="plan-form-1">
        <div class="row">
            <div class="col-md-6">
                <div class="left-d im">
                    <h5 class="left-d-text ">Manage your appointments in</h5>
                    <p class="left-d-text2 "> 3 steps</p>

                    <div class="col-md-12 mb-10 mt-20">
                        <div class="row">
                            <div class="left-num col-md-3 form-1" >
                                <label>1</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">Basic Information</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 mb-10" style="    opacity: .3;">
                        <div class="row">
                            <div class="left-num col-md-3 form-2" >
                                <label>2</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">View/Select Plan</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 mb-10" style="    opacity: .3;">
                        <div class="row">
                            <div class="left-num col-md-3 form-3" >
                                <label>3</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">Create Admin & Password</p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- <img class="img-responsive" width="100%"
                        src="<?php// echo asset_url('assets/img/login_page.jpeg'); ?>" /> -->
            </div>
            <div class="col-md-6">
                <div class="left-d left-d-white">
                    <div class="">
                        <h4 class="text-left" style="color:#4e49d6">Please provide your information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="required">first name</label>
                                    <input type="text" name="firstname" placeholder="Name" class="form-control inpt" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="required">last name</label>
                                    <input type="text" name="lastname" placeholder="Name" class="form-control inpt"
									required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="required">E-mail</label>
                                    <input type="text" name="email" placeholder="Name@Domain.com"
                                        class="form-control inpt" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Organisation Name</label>
                                    <input type="text" name="organisation" placeholder="organisation name"
                                        class="form-control inpt"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Organisation Type</label>
                                    <select class="form-control inpt">
                                        <option value=''>Type</option>
                                        <option>Spa</option>
                                        <option>Saloon</option>
                                        <option>Hospitals</option>
                                        <option>Hotels</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="button" id="next1" value="Next" class="btn-login" />
                                </div>
                            </div>

                        </div>



                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- -->
    <div class="col-md-12 h-100" id="plan-form-2" style="display:none">
        <div class="row">
            <div class="col-md-6">
                <div class="left-d">
                    <h5 class="left-d-text ">Manage your appointments in</h5>
                    <p class="left-d-text2 "> 3 steps</p>

                    <div class="col-md-12 mb-10 mt-20" style="opacity: .3;">
                        <div class="row">
                            <div class="left-num col-md-3 form-1"  >
                                <label>1</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">Basic Information</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 mb-10">
                        <div class="row">
                            <div class="left-num col-md-3 form-2" >
                                <label>2</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">View/Select Plan</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 mb-10" style="opacity: .3;">
                        <div class="row">
                            <div class="left-num col-md-3 form-3" >
                                <label>3</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">Create Admin & Password</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="plan-div left-d left-d-white">
                    <h4 style="color:#4e49d6">Please Select Plan</h4>
                    <div class="row">


                            <div class="col-md-12 selectplan" >
                                <div class="row plan1">
                                    <div class="col-md-4 pt-10">
                                        <p>Free Trial</p>
                                        <p>$<span class="lg-price">0</span></p>
                                        <p>6 month</p>
                                    </div>

                                    <div class="col-md-4 pt-10">
                                        <p>Benefit 1 Text</p>
                                        <p>Benefit 1 Text</p>
                                        <p>Benefit 1 Text</p>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" id="radio1" name="plans" value="free">
                                        <label class="plan-radio" for="radio1">Select</label>
                                    </div>
                                </div>

                                <div class="row plan1">
                                    <div class="col-md-4 pt-10">
                                        <p>Free Trial</p>
                                        <p>$<span class="lg-price">10</span></p>
                                        <p>6 month</p>
                                    </div>

                                    <div class="col-md-4 pt-10" >
                                        <p>Benefit 1 Text</p>
                                        <p>Benefit 1 Text</p>
                                        <p>Benefit 1 Text</p>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" id="radio2" name="plans" value="Monthly">
                                        <label class="plan-radio" for="radio2">Select</label>
                                    </div>
                                </div>

                                <div class="row plan1">
                                    <div class="col-md-4 pt-10">
                                        <p>Free Trial</p>
                                        <p>$<span class="lg-price">20</span></p>
                                        <p>6 month</p>
                                    </div>

                                    <div class="col-md-4 pt-10">
                                        <p>Benefit 1 Text</p>
                                        <p>Benefit 1 Text</p>
                                        <p>Benefit 1 Text</p>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" id="radio3" name="plans" value="Yearly">
                                        <label class="plan-radio" for="radio3">Select</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="button" id="next2" value="Next" class="btn-login" />
                                    </div>
                                </div>

                            </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <div class="col-md-12 h-100" id="plan-form-3" style="display:none">
        <div class="row">
            <div class="col-md-6">
                <div class="left-d">
                    <h5 class="left-d-text ">Manage your appointments in</h5>
                    <p class="left-d-text2 "> 3 steps</p>

                    <div class="col-md-12 mb-10 mt-20" style="opacity: .3;">
                        <div class="row">
                            <div class="left-num col-md-3 form-1" >
                                <label>1</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">Basic Information</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 mb-10" style="opacity: .3;">
                        <div class="row">
                            <div class="left-num col-md-3 form-2" >
                                <label>2</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">View/Select Plan</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 mb-10" >
                        <div class="row">
                            <div class="left-num col-md-3 form-3">
                                <label>3</label>
                            </div>
                            <div class="col-md-6">
                                <p class="left-p">Create Admin & Password</p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- <img class="img-responsive" width="100%"
                        src="<?php// echo asset_url('assets/img/login_page.jpeg'); ?>" /> -->
            </div>
            <div class="col-md-6">
                <div class="left-d left-d-white">
                    <div class="">
                        <h4 class="text-left" style="color:#4e49d6">Please set your admin password</h4>
                        <div class="row">
                           

                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" placeholder="Name@Domain.com"
                                        class="form-control inpt" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="required">Password</label>
                                    <input type="password" name="password" id="pwd" placeholder="Password" class="form-control inpt" />
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
									
		<div class="alert alert-warning password-alert" role="alert">
          <ul>
            <li class="requirements leng"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 8 chars.</li>
            <li class="requirements big-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 big letter.</li>
            <li class="requirements num"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 number.</li>
            <li class="requirements special-char"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 special char.</li>
          </ul>
        </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="required">Confirm Password</label>
                                    <input type="password" name="cpwd" placeholder="Confirm Password"
                                        class="form-control inpt" />
										
                                </div>
                            </div>                          

                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" id="register" value="Start Now" class="btn-login" />
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


    </div>

    </div>

    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
    <script src="<?= asset_url('assets/js/login.js') ?>"></script>
    <script>


$('#next1').on("click",function(){
$('#plan-form-1').css("display","none");
$('#plan-form-2').css("display","block");
$('#plan-form-3').css("display","none");
})

$('#next2').on("click",function(){
$('#plan-form-1').css("display","none");
$('#plan-form-2').css("display","none");
$('#plan-form-3').css("display","block");
})


$(".form-1").on("click",function(){
$('#plan-form-1').css("display","block");
$('#plan-form-2').css("display","none");
$('#plan-form-3').css("display","none"); 
})

$(".form-2").on("click",function(){
$('#plan-form-1').css("display","none");
$('#plan-form-2').css("display","block");
$('#plan-form-3').css("display","none"); 
})

$(".form-3").on("click",function(){
$('#plan-form-1').css("display","none");
$('#plan-form-2').css("display","none");
$('#plan-form-3').css("display","block"); 
})

var selectedDiv = "";
var x = document.getElementsByClassName('plan1')
for (var i = 0; i < x.length; i++) {
    x[i].addEventListener("click", function(){
        
    var selectedEl = document.querySelector(".selected");
    if(selectedEl){
        selectedEl.classList.remove("selected");
    }
    this.classList.add("selected");
        
    }, false);;
}

document.getElementById('next2').addEventListener('click',function(){
    
    var selectedEl = document.querySelector(".selected");
    if(selectedEl) {
$('#plan-form-1').css("display","none");
$('#plan-form-2').css("display","none");
$('#plan-form-3').css("display","block"); }
    else
	{
        alert('please choose Any Plan');
$('#plan-form-1').css("display","none");
$('#plan-form-2').css("display","block");
$('#plan-form-3').css("display","none");
	}
		
	
})
    </script>
	
	<script>
	$("#register-form").validate({
		  ignore: [],
    rules: {
        firstname: {
            required: true,
            minlength: 3
        },
        lastname: {
            required: true,
            minlength: 3
        },
		 email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
	  cpwd:{required:true,minlength:8,equalTo:"#pwd"}

    },
    messages: {
        firstname: {
            minlength: "Minimum  3 Characters.",
            required: "Please enter Firstname"
        },
        lastname: {
            minlength: "Minimum  3 Characters.",
            required: "Please enter Lastname"
        },
		email: {
            minlength: "Enter Valid Email ID",
            required: "Please enter Your Email"
        }
		

    }   
});
</script>
<script src="<?= asset_url('assets/js/validate.min.js') ?>"></script>



<script>
$(function () {
    var $password = $(".form-control[id='pwd']");
    var $passwordAlert = $(".password-alert");
    var $requirements = $(".requirements");
    var leng, bigLetter, num, specialChar;
    var $leng = $(".leng");
    var $bigLetter = $(".big-letter");
    var $num = $(".num");
    var $specialChar = $(".special-char");
    var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
    var numbers = "0123456789";

    $requirements.addClass("wrong");
    $password.on("focus", function(){$passwordAlert.show();});

    $password.on("input blur", function (e) {
        var el = $(this);
        var val = el.val();
        $passwordAlert.show();

        if (val.length < 8) {
            leng = false;
        }
        else if (val.length > 7) {
            leng=true;
        }
        

        if(val.toLowerCase()==val){
            bigLetter = false;
        }
        else{bigLetter=true;}
        
        num = false;
        for(var i=0; i<val.length;i++){
            for(var j=0; j<numbers.length; j++){
                if(val[i]==numbers[j]){
                    num = true;
                }
            }
        }
        
        specialChar=false;
        for(var i=0; i<val.length;i++){
            for(var j=0; j<specialChars.length; j++){
                if(val[i]==specialChars[j]){
                    specialChar = true;
                }
            }
        }

        console.log(leng, bigLetter, num, specialChar);
        
        if(leng==true&&bigLetter==true&&num==true&&specialChar==true){
            $(this).addClass("valid").removeClass("invalid");
            $requirements.removeClass("wrong").addClass("good");
            $passwordAlert.removeClass("alert-warning").addClass("alert-success");
        }
        else
        {
            $(this).addClass("invalid").removeClass("valid");
            $passwordAlert.removeClass("alert-success").addClass("alert-warning");

            if(leng==false){$leng.addClass("wrong").removeClass("good");}
            else{$leng.addClass("good").removeClass("wrong");}

            if(bigLetter==false){$bigLetter.addClass("wrong").removeClass("good");}
            else{$bigLetter.addClass("good").removeClass("wrong");}

            if(num==false){$num.addClass("wrong").removeClass("good");}
            else{$num.addClass("good").removeClass("wrong");}

            if(specialChar==false){$specialChar.addClass("wrong").removeClass("good");}
            else{$specialChar.addClass("good").removeClass("wrong");}
        }
        
        
        if(e.type == "blur"){
                $passwordAlert.hide();
            }
    });
});

function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
  <script type="text/javascript" src="js/script.js"></script>





</body>

</html>

                                            