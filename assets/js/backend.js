window.Backend = window.Backend || {};

/**
 * Backend
 *
 * This module contains functions that are used in the backend section of the application.
 *
 * @module Backend
 */
(function(exports) {

    'use strict';

    /**
     * Main javascript code for the backend of Easy!Appointments.
     */
    $(function() {
        $(window)
            .on('resize', function() {
                Backend.placeFooterToBottom();
            })
            .trigger('resize');

        $(document).ajaxStart(function() {
            $('#loading').show();
        });

        $(document).ajaxStop(function() {
            $('#loading').hide();
        });

        tippy('[data-tippy-content]');

        GeneralFunctions.enableLanguageSelection($('#select-language'));
    });

    /**
     * Backend Constants
     */
    exports.DB_SLUG_ADMIN = 'admin';
    exports.DB_SLUG_PROVIDER = 'provider';
    exports.DB_SLUG_SECRETARY = 'secretary';
    exports.DB_SLUG_CUSTOMER = 'customer';

    exports.PRIV_VIEW = 1;
    exports.PRIV_ADD = 2;
    exports.PRIV_EDIT = 4;
    exports.PRIV_DELETE = 8;

    exports.PRIV_APPOINTMENTS = 'appointments';
    exports.PRIV_CUSTOMERS = 'customers';
    exports.PRIV_SERVICES = 'services';
    exports.PRIV_USERS = 'users';
    exports.PRIV_SYSTEM_SETTINGS = 'system_settings';
    exports.PRIV_USER_SETTINGS = 'user_settings';

    /**
     * Place the backend footer always on the bottom of the page.
     */
    exports.placeFooterToBottom = function() {
        var $footer = $('#footer');

        if (window.innerHeight > $('body').height()) {
            $footer.css({
                'position': 'absolute',
                'width': '100%',
                'bottom': '0px'
            });
        } else {
            $footer.css({
                'position': 'static'
            });
        }
    };


    /**
     * Display backend notifications to user.
     *
     * Using this method you can display notifications to the use with custom messages. If the 'actions' array is
     * provided then an action link will be displayed too.
     *
     * @param {String} message Notification message
     * @param {Array} [actions] An array with custom actions that will be available to the user. Every array item is an
     * object that contains the 'label' and 'function' key values.
     */
    exports.displayNotification = function(message, actions) {
        message = message || '- No message provided for this notification -';

        var $notification = $('#notification');

        if (!actions) {
            actions = [];

            setTimeout(function() {
                $notification.fadeOut();
            }, 5000);
        }

        $notification.empty();








        var $instance = $('<div/>', {
                'class': 'notification alert',
                'html': [
                    $('<button/>', {
                        'type': 'button',
                        'class': 'close',
                        'data-dismiss': 'alert',
                        'html': [
                            $('<span/>', {
                                'html': '&times;'
                            })
                        ]
                    }),
                    $('<strong/>', {
                        'html': message
                    })
                ]
            })
            .appendTo($notification);

        actions.forEach(function(action) {
            $('<button/>', {
                    'class': 'btn btn-outline-secondary btn-xs',
                    'text': action.label,
                    'on': {
                        'click': action.function
                    }
                })
                .appendTo($instance);
        });

        $notification.show('fade');
    }


    $('#phone-number').on('keyup', function() {
        var no = $('#phone-number').val().replace((/[^+0-9]/g), '');
        $('#phone-number').val(no);
    });


    $('#phone-number').on('change', function() {
        var no = $('#phone-number').val();
        if (no.length <= 9) {
            Notiflix.Notify.Warning('Phone Number incorrect');
            $('#button-next-3,#save-customer').prop('disabled', true);
        } else {
            $('#button-next-3,#save-customer').prop('disabled', false);
        }
    });

    $('#last-name').on('keyup', function() {
        var no = $('#last-name').val().replace((/[^a-zA-Z0-9]/g), '');
        $('#last-name').val(no);
    });

    $('#first-name').on('keyup', function() {
        var no = $('#first-name').val().replace((/[^a-zA-Z ]/g), '');
        $('#first-name').val(no);
    });

    $('#first-name').on('change', function() {
        var no = $('#first-name').val();
        if (no.length < 3) {
            Notiflix.Notify.Warning('Name Minimum 3 Characters');
            $('#button-next-3').prop('disabled', true);
        } else {
            $('#button-next-3').prop('disabled', false);
        }
    });



    $('#city').on('keyup', function() {
        var no = $('#city').val().replace((/[^a-zA-Z]/g), '');
        $('#city').val(no);
    });


    $('#zip-code').on('keyup', function() {
        var no = $('#zip-code').val().replace((/[^0-9]/g), '');
        $('#zip-code').val(no);
    });


    $('#zip-code').on('change', function() {
        var no = $('#zip-code').val();
        if (no.length < 4) {
            Notiflix.Notify.Warning('Pincode Minimum 4 Characters');
            // $('#button-next-3').prop('disabled', true);
        } else {
            //$('#button-next-3').prop('disabled', false);
        }
    });

    // $('#email').on('change', function() {
    //     var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    //     if (reg.test($('#email').val()) == false) {
    //         Notiflix.Notify.Warning('Invalid Email Address');
    //     } else {

    //     }


    // });


    $('#add-coupon').on("click",function(){
        var data={
            coupon_name:$('#coupon-name').val(),
            coupon_code:$('#coupon-code').val(),
            start_date:$('#start').val(),
            end_date:$('#end').val(),
            coupon_count:$('#coupon-count').val(),
            coupon_percentage:$('#coupon-customer').val(),
            status:$('#status').val(),
            organization:$('#service-org').text(),
            csrfToken: GlobalVariables.csrfToken         
        }
        var url = GlobalVariables.baseUrl + '/index.php/backend_api/Store_coupon';
        $.post(url,data).done(function(response){
           // get_coupon();
        })
    });

    //get_coupon();

function get_coupon(){
    var url = GlobalVariables.baseUrl + 'backend_api/get_coupon';
    var data={        
        csrfToken: GlobalVariables.csrfToken         
    }   
    $.post(url,data).done(function(response){
        var row=JSON.parse(response);

       
        if (row.length === 0) {
            $('#filter-services .results').append(
                $('<em/>', {
                    'text': EALang.no_records_found
                })
            );
        }else{
           
            for(var i=0;i<row.length;i++){
               
                $('#filter-services .results')
                .append($('<div/>', {
                    'class': 'service-row entry',
                    'data-id': row[i].coupon_id,
                    'html': [
                        $('<strong/>', {
                            'text': row[i].coupon_name
                        }),
                        $('<br/>'),
                        $('<span/>', {
                            'text': row[i].coupon_code+" ,"+row[i].start_date
                        }),
                        $('<br/>')
                    ]
                }))
                .append($('<hr/>'))
            }
           
        }
        
    })
}
   


})(window.Backend);