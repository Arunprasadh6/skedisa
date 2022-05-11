

window.FrontendBook = window.FrontendBook || {};

/** 
 * Frontend Book
 *
 * This module contains functions that implement the book appointment page functionality. Once the
 * initialize() method is called the page is fully functional and can serve the appointment booking
 * process.
 *
 * @module FrontendBook
 */
(function (exports) {

    'use strict';

    /**
     * Contains terms and conditions consent.
     *
     * @type {Object}
     */
    var termsAndConditionsConsent;

    /**
     * Contains privacy policy consent.
     *
     * @type {Object}
     */
    var privacyPolicyConsent;

    /**
     * Determines the functionality of the page.
     *
     * @type {Boolean}
     */
    exports.manageMode = false;

    /**
     * This method initializes the book appointment page.
     *
     * @param {Boolean} defaultEventHandlers (OPTIONAL) Determines whether the default
     * event handlers will be bound to the dom elements.
     * @param {Boolean} manageMode (OPTIONAL) Determines whether the customer is going
     * to make  changes to an existing appointment rather than booking a new one.
     */
    exports.initialize = function (defaultEventHandlers, manageMode) {
        defaultEventHandlers = defaultEventHandlers || true;
        manageMode = manageMode || false;

        if (GlobalVariables.displayCookieNotice) {
            cookieconsent.initialise({
                palette: {
                    popup: {
                        background: '#ffffffbd',
                        text: '#666666'
                    },
                    button: {
                        background: '#429a82',
                        text: '#ffffff'
                    }
                },
                content: {
                    message: EALang.website_using_cookies_to_ensure_best_experience,
                    dismiss: 'OK'
                },
            });

            $('.cc-link').replaceWith(
                $('<a/>', {
                    'data-toggle': 'modal',
                    'data-target': '#cookie-notice-modal',
                    'href': '#',
                    'class': 'cc-link',
                    'text': $('.cc-link').text()
                })
            );
        }

        FrontendBook.manageMode = manageMode;

        // Initialize page's components (tooltips, datepickers etc).
        tippy('[data-tippy-content]');

        var weekDayId = GeneralFunctions.getWeekDayId(GlobalVariables.firstWeekday);

var day,moth,yr;

var url = GlobalVariables.baseUrl + '/index.php/backend/get_date';
//var url="backend/get_date";
var token1 = GlobalVariables.csrfToken;


$.post(url,{'csrfToken':token1},function(data){
 
    var record=JSON.parse(data);
     var maxdate=record.date;
    // day=date[2];
    // moth= date[1]==1 ? 12 : date[1]-1;
    // yr=date[0];  
    
  

  
        $('#select-date').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            firstDay: weekDayId,
            minDate: +1,
            maxDate: maxdate,
            defaultDate: Date.today(),

            dayNames: [
                EALang.sunday, EALang.monday, EALang.tuesday, EALang.wednesday,
                EALang.thursday, EALang.friday, EALang.saturday],
            dayNamesShort: [EALang.sunday.substr(0, 3), EALang.monday.substr(0, 3),
                EALang.tuesday.substr(0, 3), EALang.wednesday.substr(0, 3),
                EALang.thursday.substr(0, 3), EALang.friday.substr(0, 3),
                EALang.saturday.substr(0, 3)],
            dayNamesMin: [EALang.sunday.substr(0, 2), EALang.monday.substr(0, 2),
                EALang.tuesday.substr(0, 2), EALang.wednesday.substr(0, 2),
                EALang.thursday.substr(0, 2), EALang.friday.substr(0, 2),
                EALang.saturday.substr(0, 2)],
            monthNames: [EALang.january, EALang.february, EALang.march, EALang.april,
                EALang.may, EALang.june, EALang.july, EALang.august, EALang.september,
                EALang.october, EALang.november, EALang.december],
            prevText: EALang.previous,
            nextText: EALang.next,
            currentText: EALang.now,
            closeText: EALang.close,

            onSelect: function (dateText, instance) {
                FrontendBookApi.getAvailableHours($(this).datepicker('getDate').toString('yyyy-MM-dd'));
                FrontendBook.updateConfirmFrame();
            },

            onChangeMonthYear: function (year, month, instance) {
                var currentDate = new Date(year, month - 1, 1);
                FrontendBookApi.getUnavailableDates($('#select-provider').val(), $('#select-service').val(),
                    currentDate.toString('yyyy-MM-dd'));
            }
        });
  

        $('#select-timezone').val(Intl.DateTimeFormat().resolvedOptions().timeZone);

        // Bind the event handlers (might not be necessary every time we use this class).
        if (defaultEventHandlers) {
            bindEventHandlers();
        }

        // If the manage mode is true, the appointments data should be loaded by default.
        if (FrontendBook.manageMode) {
            applyAppointmentData(GlobalVariables.appointmentData,
                GlobalVariables.providerData, GlobalVariables.customerData);
        } else {
            var $selectProvider = $('#select-provider');
            var $selectService = $('#select-service');

            // Check if a specific service was selected (via URL parameter).
            var selectedServiceId = GeneralFunctions.getUrlParameter(location.href, 'service');

            if (selectedServiceId && $selectService.find('option[value="' + selectedServiceId + '"]').length > 0) {
                $selectService.val(selectedServiceId);
            }

            $selectService.trigger('change'); // Load the available hours.

            // Check if a specific provider was selected.
            var selectedProviderId = GeneralFunctions.getUrlParameter(location.href, 'provider');

            if (selectedProviderId && $selectProvider.find('option[value="' + selectedProviderId + '"]').length === 0) {
                // Select a service of this provider in order to make the provider available in the select box.
                for (var index in GlobalVariables.availableProviders) {
                    var provider = GlobalVariables.availableProviders[index];

                    if (provider.id === selectedProviderId && provider.services.length > 0) {
                        $selectService
                            .val(provider.services[0])
                            .trigger('change');
                    }
                }
            }

            if (selectedProviderId && $selectProvider.find('option[value="' + selectedProviderId + '"]').length > 0) {
                $selectProvider
                    .val(selectedProviderId)
                    .trigger('change');
            }

        }
});  
    };

    /**
     * This method binds the necessary event handlers for the book appointments page.
     */
    function bindEventHandlers() {
        /**
         * Event: Timezone "Changed"
         */
        $('#select-timezone').on('change', function () {
            var date = $('#select-date').datepicker('getDate');

            if (!date) {
                return;
            }

            FrontendBookApi.getAvailableHours(date.toString('yyyy-MM-dd'));

            FrontendBook.updateConfirmFrame();
        });

        /**
         * Event: Selected Provider "Changed"
         *
         * Whenever the provider changes the available appointment date - time periods must be updated.
         */
        $('#select-provider').on('change', function () {
            FrontendBookApi.getUnavailableDates($(this).val(), $('#select-service').val(),
                $('#select-date').datepicker('getDate').toString('yyyy-MM-dd'));
            FrontendBook.updateConfirmFrame();
        });

        /**
         * Event: Selected Service "Changed"
         *
         * When the user clicks on a service, its available providers should
         * become visible.
         */
        $('#select-service').on('change', function () {
            var serviceId = $('#select-service').val();

            $('#select-provider').empty();

            GlobalVariables.availableProviders.forEach(function (provider) {
                // If the current provider is able to provide the selected service, add him to the list box.
                var canServeService = provider.services.filter(function (providerServiceId) {
                    return Number(providerServiceId) === Number(serviceId);
                }).length > 0;

                if (canServeService) {
                    $('#select-provider').append(new Option(provider.first_name + ' ' + provider.MRN, provider.id));
                }
            });

            // Add the "Any Provider" entry.
            if ($('#select-provider option').length >= 1 && GlobalVariables.displayAnyProvider === '1') {
                $('#select-provider').append(new Option('- ' + EALang.any_provider + ' -', 'any-provider'));
            }

            FrontendBookApi.getUnavailableDates($('#select-provider').val(), $(this).val(),
                $('#select-date').datepicker('getDate').toString('yyyy-MM-dd'));
            FrontendBook.updateConfirmFrame();
            updateServiceDescription(serviceId);
        });
        
        
        $('#phone-number').on('keyup',function(){
           var no=$('#phone-number').val().replace((/[^0-9]/g),'');
          $('#phone-number').val(no);
        });
        
         
        $('#phone-number').on('keyup',function(){
           var no=$('#phone-number').val();
             var ide=document.getElementById('pno-error'); 
            
 if(no.length == 10){           
             $.post("index.php/customers/check_mobile",{
                mobile:no,'csrfToken':GlobalVariables.csrfToken
            },function(data){
              
                if(data==1){
                    $('#button-next-3').prop('disabled', true);
                    ide.style.display="block";
                    ide.innerHTML="Mobile Number is Already Available";
                }else{
                    $('#button-next-3').prop('disabled', false);
                     ide.style.display="none";
                }
            });
            
        }
        else{
            $('#button-next-3').prop('disabled', false);
            ide.style.display="none";
        }
       
      

        });
        
$('#logincheckbtn').on('click',function(){

    var no=$('#phone-numbercheck').val();
    var passwd=$('#passwdcheck').val();
if(no.length != 0 && passwd != 0){

    $.post("customers/check_mob",{
        'mobile':no,
        'passwd':passwd,
        'csrfToken': GlobalVariables.csrfToken
    },function(data){
        
        if(data=="0"){
        $('#notification').css('display','block');   
        $('#phone-number').val('');
        $('#email').val('');
        $('#first-name').val('');
        $('#passwd').parent().css('display','block');
        $('#cpasswd').parent().css('display','block');
        
    }else{
            var res=JSON.parse(data);
        
            Notiflix.Notify.Success('Login Successfully');        
    $(".logincheck").css("display","none");
    $(".loginselect").css("display","none");
    $(".account").css("display","block");

        $('#notification').css('display','none');
        $('#phone-number').val(res['Mobile']);

        $('#email').val(res['Email']);
        $('#first-name').val(res['Fname']);
        $('#address').val(res['address']);
        $('#city').val(res['city']);
        $('#zip-code').val(res['zip_code']);
        $('#notes').val(res['notes']);
        
document.getElementById("phone-number").disabled=true;
document.getElementById("email").disabled=true;
document.getElementById("first-name").disabled=true;
document.getElementById("address").disabled=true;
document.getElementById("city").disabled=true;
document.getElementById("zip-code").disabled=true;
document.getElementById("notes").disabled=true;
$('#passwd').removeClass('required');
$('#cpasswd').removeClass('required');
$('#passwd').parent().css('display','none');
        $('#cpasswd').parent().css('display','none');
        
        }
    });
}
else{
    Notiflix.Notify.Warning('All fields are required.');
}
});

$('input[name=account]').on('click',function(e){
    var radi=$(this).val();
if(radi == "account"){

$(".account").css("display","none");

$(".logincheck").css("display","block");
}
else if(radi == "noaccount"){
    $(".logincheck").css("display","none");
    $(".account").css("display","block");
    

    document.getElementById("phone-number").disabled=false;
    document.getElementById("email").disabled=false;
    document.getElementById("first-name").disabled=false;
    

}

    
 });
 


        $('#cpasswd').on('keyup',function(){
           var pwd=$('#passwd').val();
           var cpwd=$('#cpasswd').val();
            var ide=document.getElementById('cpwd-error'); 
           if(cpwd.length != 0){
           
           if(pwd==cpwd){
                 ide.style.display="none";
           }else{
               ide.style.display="block";
               ide.innerHTML="Password Not Matched";
               event.preventDefault();
           }
        }
        });
        
        
        $('#passwd').on('change',function(e){
            var pwd=$('#passwd').val();
            if(pwd.length > 0){
         
           
            if(pwd.length < 8){
                Notiflix.Notify.Warning(' Password Minimum 8 Characters');        
               }else if(pwd.length >=8){
              }
            }
           
        }); 
        
        
        $('#last-name').on('keyup',function(){
           var no=$('#last-name').val().replace((/[^0-9]/g),'');
          $('#last-name').val(no);
        });
        
         $('#mrn-search').on('keyup',function(){
           var no=$('#mrn-search').val().replace((/[^0-9]/g),'');
          $('#mrn-search').val(no);
        });
        
        
        
          $('#first-name').on('keyup',function(){
           var no=$('#first-name').val().replace((/[^a-zA-Z ]/g),'');
          $('#first-name').val(no);
        });
        
       
       
        

        $('#first-name').on('change',function(){
           var no=$('#first-name').val();
            if(no.length < 3){
                 Notiflix.Notify.Warning('Name Minimum 3 Characters');
                 $('#button-next-3').prop('disabled', true);
            }else{
                $('#button-next-3').prop('disabled', false);
                
            }
        });
        
        
        
         $('#city').on('keyup',function(){
           var no=$('#city').val().replace((/[^a-zA-Z ]/g),'');
          $('#city').val(no);
        });
        
        
        $('#zip-code').on('keyup',function(){
           var no=$('#zip-code').val().replace((/[^0-9]/g),'');
          $('#zip-code').val(no);
        });
        
        
        $('#zip-code').on('change',function(){
           var no=$('#zip-code').val();
            if(no.length < 4){
                 Notiflix.Notify.Warning('Pincode Minimum 4 Characters');
                 $('#button-next-3').prop('disabled', true);
                 
            }else{
                $('#button-next-3').prop('disabled', false);
                
            }
        });
        
        
        
        $('#email').on('change',function(){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test($('#email').val()) == false) 
        {
          Notiflix.Notify.Warning('Invalid Email Address');
          event.preventDefault();

        }else{
            
        }

       
        });
        
        

        /**
         * Event: Next Step Button "Clicked"
         *
         * This handler is triggered every time the user pressed the "next" button on the book wizard.
         * Some special tasks might be performed, depending the current wizard step.
         */
        $('.button-next').on('click', function () {
            // If we are on the first step and there is not provider selected do not continue with the next step.
            if ($(this).attr('data-step_index') === '1' && !$('#select-provider').val()) {
                return;
            }

            // If we are on the 2nd tab then the user should have an appointment hour selected.
            if ($(this).attr('data-step_index') === '2') {
                if (!$('.selected-hour').length) {
                    if (!$('#select-hour-prompt').length) {
                        $('<div/>', {
                            'id': 'select-hour-prompt',
                            'class': 'text-danger mb-4',
                            'text': EALang.appointment_hour_missing,
                        })
                            .prependTo('#available-hours');
                    }
                    return;
                }
            }

            // If we are on the 3rd tab then we will need to validate the user's input before proceeding to the next
            // step.
            if ($(this).attr('data-step_index') === '3') {
                if (!validateCustomerForm()) {
                    return; // Validation failed, do not continue.
                } else {
                    FrontendBook.updateConfirmFrame();

                    var $acceptToTermsAndConditions = $('#accept-to-terms-and-conditions');
                    if ($acceptToTermsAndConditions.length && $acceptToTermsAndConditions.prop('checked') === true) {
                        var newTermsAndConditionsConsent = {
                            first_name: $('#first-name').val(),
                            MRN: $('#last-name').val(),
                            email: $('#email').val(),
                            type: 'terms-and-conditions'
                        };

                        if (JSON.stringify(newTermsAndConditionsConsent) !== JSON.stringify(termsAndConditionsConsent)) {
                            termsAndConditionsConsent = newTermsAndConditionsConsent;
                            FrontendBookApi.saveConsent(termsAndConditionsConsent);
                        }
                    }

                    var $acceptToPrivacyPolicy = $('#accept-to-privacy-policy');
                    if ($acceptToPrivacyPolicy.length && $acceptToPrivacyPolicy.prop('checked') === true) {
                        var newPrivacyPolicyConsent = {
                            first_name: $('#first-name').val(),
                            MRN: $('#last-name').val(),
                            email: $('#email').val(),
                            type: 'privacy-policy'
                        };

                        if (JSON.stringify(newPrivacyPolicyConsent) !== JSON.stringify(privacyPolicyConsent)) {
                            privacyPolicyConsent = newPrivacyPolicyConsent;
                            FrontendBookApi.saveConsent(privacyPolicyConsent);
                        }
                    }
                }
            }
            if(document.getElementById('pno-error').style.display == "block"){
                Notiflix.Notify.Warning('Mobile Number is Already Available');
                               
            }
            else if($('#phone-number').val().length <= 9 && $('#phone-number').val().length != 0){
                
                Notiflix.Notify.Warning('Phone Number incorrect');
               $('#button-next-3').prop('disabled', true);
          }
          else if($('#passwd').val()!=$('#cpasswd').val()){
            Notiflix.Notify.Warning('Password Not Matched');
          }
          else if($('#passwd').val() != undefined ){
          
          if($('#passwd').val().length != 0 && $('#passwd').val().length < 8){
             Notiflix.Notify.Warning('Password Minimum 8 Characters');        
          }else{
          
            // Display the next step tab (uses jquery animation effect).
   var nextTabIndex = parseInt($(this).attr('data-step_index')) + 1;
  
   $(this).parents().eq(1).hide('fade', function () {
       $('.active-step').removeClass('active-step');
       $('#step-' + nextTabIndex).addClass('active-step');
       $('#wizard-frame-' + nextTabIndex).show('fade');
  
     
   });       
  
              }
        }
          else if($('#email').val().length != 0){
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test($('#email').val()) == false) 
            {
              Notiflix.Notify.Warning('Invalid Email Address');
    
            }else{
          
          // Display the next step tab (uses jquery animation effect).
 var nextTabIndex = parseInt($(this).attr('data-step_index')) + 1;

 $(this).parents().eq(1).hide('fade', function () {
     $('.active-step').removeClass('active-step');
     $('#step-' + nextTabIndex).addClass('active-step');
     $('#wizard-frame-' + nextTabIndex).show('fade');

   
 });       

            }
          }
         
          else{
 // Display the next step tab (uses jquery animation effect).
 var nextTabIndex = parseInt($(this).attr('data-step_index')) + 1;

 $(this).parents().eq(1).hide('fade', function () {
     $('.active-step').removeClass('active-step');
     $('#step-' + nextTabIndex).addClass('active-step');
     $('#wizard-frame-' + nextTabIndex).show('fade');

   
 });
            }
           
        });

        /**
         * Event: Back Step Button "Clicked"
         *
         * This handler is triggered every time the user pressed the "back" button on the
         * book wizard.
         */
        $('.button-back').on('click', function () {
            var prevTabIndex = parseInt($(this).attr('data-step_index')) - 1;

            $(this).parents().eq(1).hide('fade', function () {
                $('.active-step').removeClass('active-step');
                $('#step-' + prevTabIndex).addClass('active-step');
                $('#wizard-frame-' + prevTabIndex).show('fade');
            });
        });

        /**
         * Event: Available Hour "Click"
         *
         * Triggered whenever the user clicks on an available hour
         * for his appointment.
         */
        $('#available-hours').on('click', '.available-hour', function () {
            $('.selected-hour').removeClass('selected-hour');
            $(this).addClass('selected-hour');
            FrontendBook.updateConfirmFrame();
        });

        if (FrontendBook.manageMode) {
            /**
             * Event: Cancel Appointment Button "Click"
             *
             * When the user clicks the "Cancel" button this form is going to be submitted. We need
             * the user to confirm this action because once the appointment is cancelled, it will be
             * delete from the database.
             *
             * @param {jQuery.Event} event
             */
            $('#cancel-appointment').on('click', function (event) {
                var buttons = [
                    {
                        text: EALang.cancel,
                        click: function () {
                            $('#message-box').dialog('close');
                        }
                    },
                    {
                        text: 'OK',
                        click: function () {
                            if ($('#cancel-reason').val() === '') {
                                $('#cancel-reason').css('border', '2px solid #DC3545');
                                return;
                            }
                            $('#cancel-appointment-form textarea').val($('#cancel-reason').val());
                            $('#cancel-appointment-form').submit();
                        }
                    }
                ];

                GeneralFunctions.displayMessageBox(EALang.cancel_appointment_title,
                    EALang.write_appointment_removal_reason, buttons);

                $('<textarea/>', {
                    'class': 'form-control',
                    'id': 'cancel-reason',
                    'rows': '3',
                    'css': {
                        'width': '100%'
                    }
                })
                    .appendTo('#message-box');

                return false;
            });

            $('#delete-personal-information').on('click', function () {
                var buttons = [
                    {
                        text: EALang.cancel,
                        click: function () {
                            $('#message-box').dialog('close');
                        }
                    },
                    {
                        text: EALang.delete,
                        click: function () {
                            FrontendBookApi.deletePersonalInformation(GlobalVariables.customerToken);
                        }
                    }
                ];

                GeneralFunctions.displayMessageBox(EALang.delete_personal_information,
                    EALang.delete_personal_information_prompt, buttons);
            });
        }

        /**
         * Event: Book Appointment Form "Submit"
         *
         * Before the form is submitted to the server we need to make sure that
         * in the meantime the selected appointment date/time wasn't reserved by
         * another customer or event.
         *
         * @param {jQuery.Event} event
         */
        $('#book-appointment-submit').on('click', function () {           
            FrontendBookApi.registerAppointment();            
        });

        $('#book-appointment-submit-stripe').on('click', function () {           
            FrontendBookApi.registerAppointment();            
        });


        $('#book-reschedule-submit').on('click', function () {
        
        var formData = JSON.parse($('input[name="post_data"]').val());

        var data = {
            csrfToken: GlobalVariables.csrfToken,
            post_data: formData
        };
        var url = GlobalVariables.baseUrl + '/index.php/appointments/change_appointment';
        $.post(url,data,function(data){
            Notiflix.Notify.Success('Appointment Reschedule Successfully');    
            setTimeout(function(){
             window.location=GlobalVariables.baseUrl + '/Appointments';   
            },2000);
        });
            
        });

        /**
         * Event: Refresh captcha image.
         *
         * @param {jQuery.Event} event
         */
        $('.captcha-title button').on('click', function (event) {
            $('.captcha-image').attr('src', GlobalVariables.baseUrl + '/index.php/captcha?' + Date.now());
        });


        $('#select-date').on('mousedown', '.ui-datepicker-calendar td', function (event) {
            setTimeout(function () {
                FrontendBookApi.applyPreviousUnavailableDates(); // New jQuery UI version will replace the td elements.
            }, 300); // There is no draw event unfortunately.
        })
    }

    /**
     * This function validates the customer's data input. The user cannot continue
     * without passing all the validation checks.
     *
     * @return {Boolean} Returns the validation result.
     */
    function validateCustomerForm() {
        $('#wizard-frame-3 .has-error').removeClass('has-error');
        $('#wizard-frame-3 label.text-danger').removeClass('text-danger');

        try {
            // Validate required fields.
            var missingRequiredField = false;
            $('.required').each(function (index, requiredField) {
                if (!$(requiredField).val()) {
                    $(requiredField).parents('.form-group').addClass('has-error');
                    missingRequiredField = true;
                }
            });
            if (missingRequiredField) {
                throw new Error(EALang.fields_are_required);
            }

            var $acceptToTermsAndConditions = $('#accept-to-terms-and-conditions');
            if ($acceptToTermsAndConditions.length && !$acceptToTermsAndConditions.prop('checked')) {
                $acceptToTermsAndConditions.parents('.form-check').addClass('text-danger');
                throw new Error(EALang.fields_are_required);
            }

            var $acceptToPrivacyPolicy = $('#accept-to-privacy-policy');
            if ($acceptToPrivacyPolicy.length && !$acceptToPrivacyPolicy.prop('checked')) {
                $acceptToPrivacyPolicy.parents('.form-check').addClass('text-danger');
                throw new Error(EALang.fields_are_required);
            }


            // Validate email address.
            // if (!GeneralFunctions.validateEmail($('#email').val())) {
            //     $('#email').parents('.form-group').addClass('has-error');
            //     throw new Error(EALang.invalid_email);
            // }

            return true;
        } catch (error) {
            $('#form-message').text(error.message);
            return false;
        }
    }

    /**
     * Every time this function is executed, it updates the confirmation page with the latest
     * customer settings and input for the appointment booking.
     */
    exports.updateConfirmFrame = function () {
        if ($('.selected-hour').text() === '') {
            return;
        }

        // Appointment Details
        var selectedDate = $('#select-date').datepicker('getDate');

        if (selectedDate !== null) {
            selectedDate = GeneralFunctions.formatDate(selectedDate, GlobalVariables.dateFormat);
        }

        var serviceId = $('#select-service').val();
        var servicePrice = '';
        var serviceCurrency = '';

        GlobalVariables.availableServices.forEach(function (service, index) {
            if (Number(service.id) === Number(serviceId) && Number(service.price) > 0) {
                servicePrice = service.price;
                serviceCurrency = service.currency;
                return false; // break loop
            }
        });

        $('#appointment-details').empty();
// console.log(serviceCurrency);
        $('<div/>', {
            'html': [
                $('<h4/>', {
                    'text': EALang.appointment
                }),
                $('<p/>', {
                    'html': [
                        $('<span/>', {
                            'text': EALang.service + ': ' + $('#select-service option:selected').text()
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': "Provider" + ': ' + $('#select-provider option:selected').text()
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': 'Date' + ': ' + selectedDate 
                        }),
                        $('<br/>'),
                         $('<span/>', {
                            'text': 'Time' + ': ' + $('.selected-hour').text()
                        }),
                        $('<br/>'),
                      
                        $('<br/>'),
                        $('<span/>', {
                            
                            'text': EALang.price + ': ' + serviceCurrency +" "+ servicePrice,
                            'prop': {
                                'hidden': !servicePrice
                            }
                        }),
                    ]
                })
            ]
        })
            .appendTo('#appointment-details');

        // Customer Details
        var firstName = GeneralFunctions.escapeHtml($('#first-name').val());
        var MRN = GeneralFunctions.escapeHtml($('#last-name').val());
        var phoneNumber = GeneralFunctions.escapeHtml($('#phone-number').val());
        var email = GeneralFunctions.escapeHtml($('#email').val());
        var address = GeneralFunctions.escapeHtml($('#address').val());
        var city = GeneralFunctions.escapeHtml($('#city').val());
        var zipCode = GeneralFunctions.escapeHtml($('#zip-code').val());
         var userid = GeneralFunctions.escapeHtml($('#userid').val());
         var Organization = GeneralFunctions.escapeHtml($('#organization').val());

        $('#customer-details').empty();

        $('<div/>', {
            'html': [
                $('<h4/>)', {
                    'text': 'Client Information'
                }),
                $('<p/>', {
                    'html': [
                        $('<span/>', {
                            'text': 'Name' + ': ' + firstName 
                        }),
                        $('<br/>'),
                        // $('<span/>', {
                        //     'text': 'MRN Number'+': '+ MRN
                        // }),
                        // $('<br/>'),
                       
                        $('<span/>', {
                            'text': EALang.phone_number + ': ' + phoneNumber
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': EALang.email + ': ' + email
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': address ? EALang.address + ': ' + address : ''
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': city ? EALang.city + ': ' + city : ''
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': zipCode ? "Pincode" + ': ' + zipCode : ''
                        }),
                        $('<br/>'),
                    ]
                })
            ]
        })
            .appendTo('#customer-details');


        // Update appointment form data for submission to server when the user confirms the appointment.
        var data = {};

        data.customer = {
            MRN: $('#last-name').val(),
            first_name: $('#first-name').val(),
            mobile_number:($('#google-id').val()=="") ? '' : $('#google-id').val(),
            email: $('#email').val(),
            password: $('#passwd').val(),
            phone_number: $('#phone-number').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            zip_code: $('#zip-code').val(),
            userid: $('#user-id').val(),
            timezone: $('#select-timezone').val(),
            userid: $('#userid').val(),
             Organization: $('#organization').val(),
             Order_id:$('#ORDER_ID').val()
             
        };

        data.appointment = {
            start_datetime: $('#select-date').datepicker('getDate').toString('yyyy-MM-dd')
                + ' ' + Date.parse($('.selected-hour').data('value') || '').toString('HH:mm') + ':00',
            end_datetime: calculateEndDatetime(),
            notes: $('#notes').val(),
            is_unavailable: false,
            id_users_provider: $('#select-provider').val(),
            id_services: $('#select-service').val(),
             Organization: $('#organization').val(),
             Order_id:$('#ORDER_ID').val(),
             Status:0
        };

        data.manage_mode = FrontendBook.manageMode;

        if (FrontendBook.manageMode) {
            data.appointment.id = GlobalVariables.appointmentData.id;
            data.customer.id = GlobalVariables.customerData.id;
        }
        $('input[name="csrfToken"]').val(GlobalVariables.csrfToken);
        $('input[name="post_data"]').val(JSON.stringify(data));
    };

    /**
     * This method calculates the end datetime of the current appointment.
     * End datetime is depending on the service and start datetime fields.
     *
     * @return {String} Returns the end datetime in string format.
     */
    function calculateEndDatetime() {
        // Find selected service duration.
        var serviceId = $('#select-service').val();

        var service = GlobalVariables.availableServices.find(function (availableService) {
            return Number(availableService.id) === Number(serviceId);
        });

        // Add the duration to the start datetime.
        var startDatetime = $('#select-date').datepicker('getDate').toString('dd-MM-yyyy')
            + ' ' + Date.parse($('.selected-hour').data('value') || '').toString('HH:mm');
        startDatetime = Date.parseExact(startDatetime, 'dd-MM-yyyy HH:mm');
        var endDatetime;

        if (service.duration && startDatetime) {
            endDatetime = startDatetime.add({'minutes': parseInt(service.duration)});
        } else {
            endDatetime = new Date();
        }

        return endDatetime.toString('yyyy-MM-dd HH:mm:ss');
    }

    /**
     * This method applies the appointment's data to the wizard so
     * that the user can start making changes on an existing record.
     *
     * @param {Object} appointment Selected appointment's data.
     * @param {Object} provider Selected provider's data.
     * @param {Object} customer Selected customer's data.
     *
     * @return {Boolean} Returns the operation result.
     */
    function applyAppointmentData(appointment, provider, customer) {
        try {
            // Select Service & Provider
            $('#select-service').val(appointment.id_services).trigger('change');
            $('#select-provider').val(appointment.id_users_provider);

            // Set Appointment Date
            $('#select-date').datepicker('setDate',
                Date.parseExact(appointment.start_datetime, 'yyyy-MM-dd HH:mm:ss'));
            FrontendBookApi.getAvailableHours(moment(appointment.start_datetime).format('YYYY-MM-DD'));

            // Apply Customer's Data
            $('#last-name').val(customer.MRN);
            $('#user-id').val(customer.user_id);
            $('#first-name').val(customer.first_name);
            $('#email').val(customer.email);
            $('#phone-number').val(customer.phone_number);
            $('#address').val(customer.address);
            $('#city').val(customer.city);
            $('#zip-code').val(customer.zip_code);
            $('#userid').val(customer.userid);
            if (customer.timezone) {
                $('#select-timezone').val(customer.timezone)
            }
            $('#organization').val(customer.Organization);
            
            var appointmentNotes = (appointment.notes !== null)
                ? appointment.notes : '';
            $('#notes').val(appointmentNotes);

            FrontendBook.updateConfirmFrame();

            return true;
        } catch (exc) {
            return false;
        }
    }

    /**
     * This method updates a div's html content with a brief description of the
     * user selected service (only if available in db). This is useful for the
     * customers upon selecting the correct service.
     *
     * @param {Number} serviceId The selected service record id.
     */
    function updateServiceDescription(serviceId) {
        var $serviceDescription = $('#service-description');

        $serviceDescription.empty();

        var service = GlobalVariables.availableServices.find(function (availableService) {
            return Number(availableService.id) === Number(serviceId);
        });

        if (!service) {
            return;
        }
            $('#service_prive').val(service.price);
        $('<strong/>', {
            'text': service.name
        })
            .appendTo($serviceDescription);

        if (service.description) {
            $('<br/>')
                .appendTo($serviceDescription);

            $('<span/>', {
                'text': service.description
            })
                .appendTo($serviceDescription);
        }

        if (service.duration || Number(service.price) > 0 || service.location) {
            $('<br/>')
                .appendTo($serviceDescription);
        }

        // if (service.duration) {
        //     $('<span/>', {
        //         'text': '[' + EALang.duration + ' ' + service.duration + ' ' + EALang.minutes + ']'
        //     })
        //         .appendTo($serviceDescription);
        // }

        if (Number(service.price) > 0) {
            $('#service_prive').val(service.price);
            $('<span/>', {
                'text': '[' + EALang.price + ' ' +  service.currency +" " +service.price +  ']'
            })
                .appendTo($serviceDescription);
        }

        if (service.location) {
            $('<span/>', {
                'text': '[' + EALang.location + ' ' + service.location + ']'
            })
                .appendTo($serviceDescription);
        }
    }

})(window.FrontendBook);
