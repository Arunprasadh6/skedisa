 function check_email(e, tok) {
     var email = e.value;
     var ide = e.name;
     var token = document.getElementById('log_token').value;
    
     $.post("index.php/customers/check_email", {
         email: email,
         'csrfToken': token
     }, function(data) {
         document.getElementById('log_token').value = tok;
         if (data == "1") {
             document.getElementById('sublog').disabled = false;
             document.getElementById(ide).style.display = "none";

         } else {
             document.getElementById('sublog').disabled = true;
             document.getElementById(ide).style.display = "block";
             document.getElementById(ide).innerHTML = "Email is Not Available";

         }
     });

 }

 $('#username').on('keyup', function() {
     this.value = this.value.replace(/[^0-9]/g, '');

     var mno = $('#username').val();
     var token = document.getElementById('log_token').value;
     if (mno.length > 9) {
        // $.post("check_organization", {
            $.post("index.php/customers/check_organization", {
             mobile: mno,
             'csrfToken': token
         }, function(data) {
             var row = JSON.parse(data);

             if (row.length == 1) {
                 $('#organ-div').css("display", "none");
                 var option = '<option value="">Select Organization</option>';
                 for (var i = 0; i < row.length; i++) {
                     var id = row[i][0]['organization_id'];
                     var ogan = row[i][0]['organization_name'];
                     option += "<option value='" + id + "' selected>" + ogan + "</option>";
                 }
                 $('#select-organ').html(option);
                 $('#select-organ').removeAttr('required');
             } else if (row.length > 1) {
                 var option = '<option value="">Select Organization</option>';
                 for (var i = 0; i < row.length; i++) {
                     var id = row[i][0]['organization_id'];
                     var ogan = row[i][0]['organization_name'];
                     option += "<option value='" + id + "'>" + ogan + "</option>";
                 }
                 $('#organ-div').css("display", "block");

                 $('#select-organ').html(option);
                 $('#select-organ').attr('required');

             } else {

             }
         });
     } else {
         $('#organ-div').css("display", "none");

         $('#select-organ').html('<option value="">Select Organization</option>');
     }
 });

 $('#privacy').click(function() {
     if (this.checked) {
         $('#book-appointment-submit').prop('disabled', false);
         $('#book-appointment-submit-stripe').prop('disabled', false);
     } else {
         $('#book-appointment-submit').prop('disabled', true);
         $('#book-appointment-submit-stripe').prop('disabled', true);
     }
 });
 
 $('#coupon-check').click(function() {
    if (this.checked) {
        $('#coupon-modal').modal('show');
    } else {
        $('#coupon-modal').modal('hide');        
    }
});

$('#apply-coupon').on("click",function(){
    var coupon=$('#coupon').val();

    if(coupon.length > 0){
        $.post("customers/check_coupon",
        {
            'csrfToken': $('#ajax-token').val(),
            'coupon':coupon
    
        },
        function(data){
            if(data.length==0){
                Notiflix.Notify.Warning('Coupon code not Available');
            }else{
                //Discount%=(Original Price - Sale price)/Original price*100
                var rows=JSON.parse(data);
                var offer=rows[0].coupon_percentage;
                var price=$('#service_prive').val();
                discount = offer / 100;
		        total = discount * price;		
		        var amnt = price - total;
                $('#service_prive').val(amnt);
                $('#coupon-modal').modal('hide');
            }
        })
    }else{
        Notiflix.Notify.Warning('Enter Code');
    }
   
})

$('#close-cou').on("click",function(){
    $('#coupon-check').prop('checked',false);
})

 //  $('#policy').click(function() {

 //      $('#term_cond').modal({ backdrop: 'static', keyboard: false }, 'show');
 //  });

  $('#fget').click(function() {

      $('#forget-pwd').modal('show');
  });


 $('#policy').click(function() {
     'use strict';
     $('#terms-and-conditions-modal').modal({ backdrop: 'static', keyboard: false }, 'show');
     var token = $('#token').val();
     var org = $('#organization').val();
     $.post("index.php/customers/get_terms", {
             Organ: org,
             'csrfToken': token
         },
         function(data) {
             $('#terms_content').html(data);
         });

     // $('#term_cond').modal({ backdrop: 'static', keyboard: false }, 'show');
 });

 $('#fget-email').change(function() {
     var token = $('#token').val();
     var mobile = $('#fget-email').val();
     var err = document.getElementById('error-forget');

     $.post("check_email", {

         Mobile: mobile,
         'csrfToken': token
     }, function(data) {
         if (data == "1") {
             document.getElementById('fget-passwd').disabled = false;
             err.style.display = "none";
             document.getElementById('send-otp').disabled = false;

         } else {
             document.getElementById('fget-passwd').disabled = true;
             err.style.display = "block";
             err.innerHTML = "Mobile Number is NOT Available";
             document.getElementById('send-otp').disabled = true;
         }
     });



     var mno = mobile;

     if (mno.length > 9) {
      //$.post("customers/check_organization", {
            $.post("check_organization", {
             mobile: mno,
             'csrfToken': token
         }, function(data) {
             var row = JSON.parse(data);

             if (row.length == 1) {
                 $('#organ-fget').css("display", "none");
                 var option = '<option value="">Select Organization</option>';
                 for (var i = 0; i < row.length; i++) {
                     var id = row[i][0]['organization_id'];
                     var ogan = row[i][0]['organization_name'];
                     option += "<option value='" + id + "' selected>" + ogan + "</option>";
                 }
                 $('#select-organ-fget').html(option);
                 $('#select-organ-fget').removeAttr('required');
             } else if (row.length > 1) {
                 var option = '<option value="">Select Organization</option>';
                 for (var i = 0; i < row.length; i++) {
                     var id = row[i][0]['organization_id'];
                     var ogan = row[i][0]['organization_name'];
                     option += "<option value='" + id + "'>" + ogan + "</option>";
                 }
                 $('#organ-fget').css("display", "block");

                 $('#select-organ-fget').html(option);
                 $('#select-organ-fget').attr('required');

             } else {

             }
         });
     } else {
         $('#organ-div').css("display", "none");

         $('#select-organ').html('<option value="">Select Organization</option>');
     }




 });
 $('#send-otp').click(function() {

     var token = $('#token').val();
     var mobile = $('#fget-email').val();

     $.post("index.php/customers/send_otp", {

         Mobile: mobile,

         'csrfToken': token
     }, function(data) {
         //  console.log(data);         
         $('#validotp').val(data);
         $('#mobf').css('display', 'none');
         $('#otpf').css('display', 'block');


     });



 });
 $('#submit-otp').click(function() {
     var otp = $('#otp').val();
     var validotp = $('#validotp').val();
     var err1 = document.getElementById('error-otp');
     if (otp.length > 0) {
         if (otp == validotp) {
             $('#otpf').css('display', 'none');
             $('#chf').css('display', 'block');
             err1.style.display = "none";
         } else {
             err1.style.display = "block";
             err1.innerHTML = "Wrong OTP Number";
         }
     } else {
         err1.style.display = "block";
         err1.innerHTML = "Enter OTP Number";
     }
 });


 $('#change-pwd').click(function() {
     var token = $('#token').val();
     var email = $('#fget-email').val();
     var pwd = $('#fget-passwd').val();
     var fgetorg = $('#select-organ-fget').val();

     if (email == "" && pwd == "") {
         Notiflix.Notify.Warning('All fields are required');
     } else if (email == "") {
         Notiflix.Notify.Warning('Email  field is required');
     } else if (pwd == "") {
         Notiflix.Notify.Warning('Password  field is required');
     } else {
         $.post("index.php/customers/update_password", {

             email: email,
             passwd: pwd,
             fgetorg: fgetorg,
             'csrfToken': token
         }, function(data) {
             if (data == 1) {
                 Notiflix.Notify.Success('Password Changed');
                 $('#fget-email').val('');
                 $('#fget-passwd').val('');
                 $('#forget-pwd').modal('hide');
             } else {
                 Notiflix.Notify.Failure('Password Not Changed');
             }
         });
     }




 });

 $('#fget-cpasswd').on('keyup', function() {
     var pwd = $('#fget-passwd').val();
     var cpwd = $('#fget-cpasswd').val();
     var ide = document.getElementById('cpwd-error');
     if (cpwd.length > 0) {
         if (pwd == cpwd) {
             ide.style.display = "none";
             document.getElementById('change-pwd').disabled = false;
         } else {
             ide.style.display = "block";
             ide.innerHTML = "Password does not match";
             document.getElementById('change-pwd').disabled = true;
         }
     }
 });

 $('#fget-passwd').on('keyup', function() {
     var pwd = $('#fget-passwd').val();
     var ide = document.getElementById('pwd-error');
     if (pwd.length > 8) {
         ide.style.display = "none";
         document.getElementById('change-pwd').disabled = false;
     } else {
         ide.style.display = "block";
         ide.innerHTML = "Password Minimum 8 Characters | Numbers | Special Symbol";
         document.getElementById('change-pwd').disabled = true;
     }
 });

 function check_register_email(e, tok) {
     var email = e.value;
     var ide = document.getElementById('mail-error');
     var token = document.getElementById('sub-token').value;

     $.post("index.php/customers/check_user_email", {
         email: email,
         'csrfToken': token
     }, function(data) {
         document.getElementById('log_token').value = tok;
         //  console.log(data);
         if (data == "1") {
             document.getElementById('subreg').disabled = true;
             ide.style.display = "block";
             ide.innerHTML = "Email is Already Available";
         } else {
             document.getElementById('subreg').disabled = false;
             ide.style.display = "none";
         }
     });
 }

 function check_mobile(e, tok) {
     var mobile = e.value;
     var ide = document.getElementById('mno-error');
     var token = document.getElementById('sub-token').value;
     if (mobile.length == 10) {


         $.post("index.php/customers/check_mobile", {
             mobile: mobile,
             'csrfToken': token
         }, function(data) {

             document.getElementById('log_token').value = tok;
             if (data == "1") {
                 document.getElementById('subreg').disabled = true;
                 ide.style.display = "block";
                 ide.innerHTML = "Mobile Number is Already Available";
             } else {
                 document.getElementById('subreg').disabled = false;
                 ide.style.display = "none";
             }
         });
     } else {
         document.getElementById('subreg').disabled = false;
         ide.style.display = "none";
     }
 }


 var country=$("#country-check").val();
 $('#select-payment').css("display","none")
if(country=="IN"){
    $('#book-appointment-form').attr('action', "index.php/Paytm/send_request");
    $('#book-appointment-submit').css("display","block");
    $('#book-appointment-submit-stripe').css("display","none");
}else{
    $('#book-appointment-form').attr('action', "index.php/Appointments/stripe");
    $('#book-appointment-submit').css("display","none");
    $('#book-appointment-submit-stripe').css("display","block");
}

 $('#select-payment').on('change',function(){
  var payment=$('#select-payment').val();
  if(payment=="pay"){
    $('#book-appointment-form').attr('action', "index.php/Paytm/send_request");
    $('#book-appointment-submit').css("display","block");
    $('#book-appointment-submit-stripe').css("display","none");
  }else if(payment=="strp"){
    $('#book-appointment-form').attr('action', "index.php/Appointments/stripe");
    $('#book-appointment-submit').css("display","none");
    $('#book-appointment-submit-stripe').css("display","block");
  }else if(payment==""){
    $('#book-appointment-submit').css("display","none");
    $('#book-appointment-submit-stripe').css("display","none");
  }

 });



 $('#mail').on('change', function() {
     var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

     if (reg.test($('#mail').val()) == false) {
         Notiflix.Notify.Warning('Invalid Email Address');
         event.preventDefault();
     } else {

     }


 });


 $('#organization').on('change', function() {
     var ide = document.getElementById('mno-error');
     var token = document.getElementById('sub-token').value;
     var mobile = document.getElementById('mobile').value;
     var org = document.getElementById('organization').value;
     $.post("index.php/customers/check_mobile_org", {
         mobile: mobile,
         'csrfToken': token,
         'organization': org
     }, function(data) {


         if (data == "1") {
             document.getElementById('subreg').disabled = true;
             ide.style.display = "block";
             ide.innerHTML = "Mobile Number is Already Available in Selected Organization";
         } else if (data == 2) {
             document.getElementById('subreg').disabled = false;
             ide.style.display = "none";
         } else {
             document.getElementById('subreg').disabled = false;
             ide.style.display = "none";
         }
     });


 });

 function validate() {
     var name = document.getElementsByName('uname')[0].value;
     var pwd = document.getElementsByName('pwd')[0].value;
     var org = document.getElementsByName('login-organ')[0].value;
     if (name == "" && pwd == "") {
         Notiflix.Notify.Warning('All fields are required');
         event.preventDefault();
     } else if (name == "") {
         Notiflix.Notify.Warning('Username field is required');
         event.preventDefault();
     } else if (org == "") {
         Notiflix.Notify.Warning('Organization field is required');
         event.preventDefault();
     } else if (pwd == "") {
         Notiflix.Notify.Warning('Password field is required');
         event.preventDefault();
     }
 }

 function validate_register() {
     var fname = document.getElementById('fname').value;

     var passwd = document.getElementById('passwd').value;
     var mno = document.getElementById('mobile').value;
     var org = document.getElementById('organization').value;
     var token = document.getElementById('sub-token').value;
     if (fname == "" && passwd == "" && mno == "" && org == "") {
         Notiflix.Notify.Warning('All fields are required');
         event.preventDefault();
     } else if (mno == "") {
         Notiflix.Notify.Warning('Mobile field is required');
         event.preventDefault();
     } else if (fname == "") {
         Notiflix.Notify.Warning('Name field is required');
         event.preventDefault();
     } else if (passwd == "") {
         Notiflix.Notify.Warning('Password field is required');
         event.preventDefault();
     } else if (org == "") {
         Notiflix.Notify.Warning('Organization field is required');
         event.preventDefault();
     } else if (mno.length <= 9) {
         Notiflix.Notify.Warning('Mobile Number Maximum 10 Digit');
         event.preventDefault();
     } else if (passwd.length < 8) {
         Notiflix.Notify.Warning(' Password Minimum 8 Characters');

         event.preventDefault();
     } else if (document.getElementById('mno-error').style.display == "block") {
         Notiflix.Notify.Warning('Mobile Number is Already Available');

         event.preventDefault();
     } else if ($('#mail').val().length != 0) {
         var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

         if (reg.test($('#mail').val()) == false) {
             Notiflix.Notify.Warning('Invalid Email Address');
             event.preventDefault();
         } else {

         }
     }






 }

 function checkletter(e) {
     e.value = e.value.replace(/[^A-Za-z ]/g, '');
 }

 function validate_pwd(e) {
     var pwd = e.value;
     var error = document.getElementById('pass');
     var btn = document.getElementById('subreg');
     if (pwd.length > 0) {


         if (pwd.length < 8) {
             error.style.display = "block";
             error.innerHTML = " Password Minimum 8 Characters";
             btn.disabled = true;
         } else if (pwd.length >= 8) {
             error.style.display = "none";
             btn.disabled = false;
         }
     } else {
         error.style.display = "none";
         btn.disabled = false;
     }
 }



 function hidelog() {
     var log = document.getElementById('login-frame');
     var reg = document.getElementById('signup-frame');
     log.style.display = "none";
     reg.style.display = "block";
 }

 function hidereg() {
     var log = document.getElementById('login-frame');
     var reg = document.getElementById('signup-frame');
     log.style.display = "block";
     reg.style.display = "none";

 }


 function get_data(token) {
     var mrn = document.getElementById('mrn-search').value;
     if (mrn.length == "0") {
         Notiflix.Notify.Failure('MRN search Field required');
     } else {
         $.post("Appointments/filter_mrn", {
             'csrfToken': token,
             'MRN': mrn
         }, function(data) {

             if (data == "notnull") {
                 Notiflix.Notify.Failure('Data Not Found');
                 if ($('#first-name').val().length > 0) {
                     //Notiflix.Notify.Failure('Data Not Found');
                 } else {
                     $('#first-name').val("");
                     $('#last-name').val("");
                     $('#email').val("");
                     $('#phone-number').val("");
                     $('#address').val("");
                     $('#city').val("");
                     $('#zip-code').val("");
                     $('#notes').val("");
                     $('#organization').val("");
                 }

             } else {
                 var row = JSON.parse(data);
                 $('#first-name').val(row.first_name);
                 $('#last-name').val(row.MRN);
                 $('#email').val(row.email);
                 $('#phone-number').val(row.phone_number);
                 $('#address').val(row.address);
                 $('#city').val(row.city);
                 $('#zip-code').val(row.zipcode);
                 $('#notes').val(row.notes);
                 $('#organization').val(row.Organization);
             }

         });
     }

 }