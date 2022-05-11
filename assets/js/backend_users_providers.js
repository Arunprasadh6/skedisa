(function() {

    'use strict';

    /**
     * Providers Helper
     *
     * This class contains the Providers helper class declaration, along with the "Providers" tab
     * event handlers. By dividing the backend/users tab functionality into separate files
     * it is easier to maintain the code.
     *
     * @class ProvidersHelper
     */

     $('#save_provider').on("click",function(){
        console.log("working");
    })

    var ProvidersHelper = function() {
        this.filterResults = {}; // Store the results for later use.
        this.filterLimit = 20;
    };

    /**
     * Bind the event handlers for the backend/users "Providers" tab.
     */
    ProvidersHelper.prototype.bindEventHandlers = function() {
        /**
         * Event: Filter Providers Form "Submit"
         *
         * Filter the provider records with the given key string.
         *
         * @param {jQuery.Event} event
         */
        $('#providers').on('submit', '#filter-providers form', function(event) {
            event.preventDefault();
            var key = $('#filter-providers .key').val();
            $('.selected').removeClass('selected');
            this.resetForm();
            this.filter(key);
        }.bind(this));

        $('#providers').on('keyup', '#filter-providers form', function(event) {
            event.preventDefault();
            var key = $('#filter-providers .key').val();
            $('.selected').removeClass('selected');
            this.resetForm();
            this.filter(key);
        }.bind(this));

        /**
         * Event: Clear Filter Button "Click"
         */
        $('#providers').on('click', '#filter-providers .clear', function() {
            this.filter('');
            $('#filter-providers .key').val('');
            this.resetForm();
        }.bind(this));

        /**
         * Event: Filter Provider Row "Click"
         *
         * Display the selected provider data to the user.
         */
        $('#providers').on('click', '.provider-row', function(event) {
            if ($('#filter-providers .filter').prop('disabled')) {
                $('#filter-providers .results').css('color', '#AAA');
                return; // Exit because we are currently on edit mode.
            }

            var providerId = $(event.currentTarget).attr('data-id');
            var provider = this.filterResults.find(function(filterResult) {
                return Number(filterResult.id) === Number(providerId);
            });

            this.display(provider);
            $('#filter-providers .selected').removeClass('selected');
            $(event.currentTarget).addClass('selected');
            $('#edit-provider, #delete-provider').prop('disabled', false);
        }.bind(this));

        /**
         * Event: Add New Provider Button "Click"
         */
        $('#providers').on('click', '#add-provider', function() {
            this.resetForm();
            $('#filter-providers button').prop('disabled', true);
            $('#filter-providers .results').css('color', '#AAA');
            $('#providers .add-edit-delete-group').hide();
            $('#providers .save-cancel-group').show();
            $('#providers .record-details').find('input, select, textarea').prop('disabled', false);
            $('#provider-password, #provider-password-confirm').addClass('required');
            $('#providers').find('.add-break, .edit-break, .delete-break, .add-working-plan-exception, .edit-working-plan-exception, .delete-working-plan-exception, #reset-working-plan').prop('disabled', false);
            $('#provider-services input:checkbox').prop('disabled', false);

            // Apply default working plan
            BackendUsers.wp.setup(GlobalVariables.workingPlan);
            BackendUsers.wp.timepickers(false);
        }.bind(this));

        /**
         * Event: Edit Provider Button "Click"
         */
        $('#providers').on('click', '#edit-provider', function() {
            $('#providers .add-edit-delete-group').hide();
            $('#providers .save-cancel-group').show();
            $('#filter-providers button').prop('disabled', true);
            $('#filter-providers .results').css('color', '#AAA');
            $('#providers .record-details').find('input, select, textarea').prop('disabled', false);
            $('#provider-password, #provider-password-confirm').removeClass('required');
            $('#provider-services input:checkbox').prop('disabled', false);
            $('#providers').find('.add-break, .edit-break, .delete-break, .add-working-plan-exception, .edit-working-plan-exception, .delete-working-plan-exception, #reset-working-plan').prop('disabled', false);
            $('#providers input:checkbox').prop('disabled', false);
            BackendUsers.wp.timepickers(false);
        });

        /**
         * Event: Delete Provider Button "Click"
         */
        $('#providers').on('click', '#delete-provider', function() {
            var providerId = $('#provider-id').val();

            var buttons = [{
                    text: EALang.cancel,
                    click: function() {
                        $('#message-box').dialog('close');
                    }
                },
                {
                    text: EALang.delete,
                    click: function() {
                        this.delete(providerId);
                        $('#message-box').dialog('close');
                    }.bind(this)
                }
            ];

            GeneralFunctions.displayMessageBox(EALang.delete_provider, EALang.delete_record_prompt, buttons);
        }.bind(this));

        /**
         * Event: Save Provider Button "Click"
         */
        $('#providers').on('click', '#save-provider', function() {
            var provider = {
                first_name: $('#provider-first-name').val(),
                MRN: $('#provider-last-name').val(),
                email: $('#provider-email').val(),
                mobile_number: $('#provider-mobile-number').val(),
                phone_number: $('#provider-phone-number').val(),
                address: $('#provider-address').val(),
                city: $('#provider-city').val(),
                state: $('#provider-state').val(),
                zip_code: $('#provider-zip-code').val(),
                notes: $('#provider-notes').val(),
                timezone: $('#provider-timezone').val(),
                Organization: $('#provider-org').text(),
                settings: {
                    username: $('#provider-username').val(),
                    working_plan: JSON.stringify(BackendUsers.wp.get()),
                    working_plan_exceptions: JSON.stringify(BackendUsers.wp.getWorkingPlanExceptions()),
                    notifications: $('#provider-notifications').prop('checked'),
                    calendar_view: $('#provider-calendar-view').val()
                }
            };

            if ($('#provider-email').val().length > 0) {
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                if (reg.test($('#provider-email').val()) == false) {
                    Notiflix.Notify.Warning('Invalid Email Address');
                    return;
                } else {

                }
            }
            if ($('#provider-phone-number').val().length <= 9) {
                Notiflix.Notify.Warning('Mobile Number Maximum 10 Digit');
                return;
            }


            // Include provider services.
            var s1, s2 = 0;
            provider.services = [];
            var cbox;
            $('#provider-services input:checkbox').each(function(index, checkbox) {

                if ($(checkbox).prop('checked')) {
                    provider.services.push($(checkbox).attr('data-id'));
                    cbox = $(checkbox).attr('data-id');
                    $('#service-org').val(cbox);
                    s1 = 1;
                } else {
                    s2 = 1;
                }

            });
            if (s1 != 1 && s2 == 1) {
                $('#service-org').val('');
            }

            var ser = $('#service-org').val();
            if (ser.length == 0) {
                $('#service-org').addClass('required');
                $("#sid").css('color', 'red');
            } else {
                $('#service-org').removeClass('required');
                $("#sid").css('color', 'black');
            }

            // Include password if changed.
            if ($('#provider-password').val() !== '') {
                provider.settings.password = $('#provider-password').val();
            }

            // Include id if changed.
            if ($('#provider-id').val() !== '') {
                provider.id = $('#provider-id').val();
            }

            if (!this.validate()) {
                return;
            }

            this.save(provider);
        }.bind(this));




        /**
         * Event: Cancel Provider Button "Click"
         *
         * Cancel add or edit of an provider record.
         */
        $('#providers').on('click', '#cancel-provider', function() {
            var id = $('#filter-providers .selected').attr('data-id');
            this.resetForm();
            if (id) {
                this.select(id, true);
            }
            document.getElementById('pro_mno_error').style.display = "none";
        }.bind(this));

        /**
         * Event: Display Provider Details "Click"
         */
        $('#providers').on('shown.bs.tab', 'a[data-toggle="tab"]', function() {
            Backend.placeFooterToBottom();
        });

        /**
         * Event: Reset Working Plan Button "Click".
         */
        $('#providers').on('click', '#reset-working-plan', function() {
            $('.breaks tbody').empty();
            $('.working-plan-exceptions tbody').empty();
            $('.work-start, .work-end').val('');
            BackendUsers.wp.setup(GlobalVariables.workingPlan);
            BackendUsers.wp.timepickers(false);
        });
    };

    /**
     * Remove the previously registered event handlers.
     */
    ProvidersHelper.prototype.unbindEventHandlers = function() {
        $('#providers')
            .off('submit', '#filter-providers form')
            .off('click', '#filter-providers .clear')
            .off('click', '.provider-row')
            .off('click', '#add-provider')
            .off('click', '#edit-provider')
            .off('click', '#delete-provider')
            .off('click', '#save-provider')
            .off('click', '#cancel-provider')
            .off('shown.bs.tab', 'a[data-toggle="tab"]')
            .off('click', '#reset-working-plan');



    };

    /**
     * Save provider record to database.
     *
     * @param {Object} provider Contains the admin record data. If an 'id' value is provided
     * then the update operation is going to be executed.
     */
    ProvidersHelper.prototype.save = function(provider) {
        var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_save_provider';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            provider: JSON.stringify(provider)
        };

        $.post(url, data)
            .done(function(response) {
                Backend.displayNotification(EALang.provider_saved);
                this.resetForm();
                $('#filter-providers .key').val('');
                this.filter('', response.id, true);
            }.bind(this));
    };
     
    

    $('#day-submit').click(function() {

        var daywise = $('#datewise').val();
        var prowise = $('#providers').val();

        if (daywise == "" && prowise == "") {
            Notiflix.Notify.Warning('All fields are Required');
            event.preventDefault();
        } else if (daywise == "") {
            Notiflix.Notify.Warning('Start Date field are Required');
            event.preventDefault();
        } else if (prowise == "") {
            Notiflix.Notify.Warning('Provider field are Required');
            event.preventDefault();
        } else {
            // ajax code
        }

        var day = {
            startdate: $('#datewise').val(),
            provider: $('#providers').val(),
        };

        var url = GlobalVariables.baseUrl + '/index.php/backend_api/day_wise';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            day: day
        };

        $.post(url, data)
            .done(function(response) {
                Backend.displayNotification("Day Wise Report Successfully");
                var res = jQuery.parseJSON(response);
                if (res == "Data not available. Please select Another") {

                    Notiflix.Notify.Warning('Data not available. Please select Another');

                    $('#example').dataTable().fnDestroy();
                    $('#example').dataTable().fnClearTable();


                } else {


                    var appoita = res['appointment'];
                    var usera = res['user'];
                    var paya = res['payment'];

                    var datar = [];


                    //$("#example").dataTable().fnDestroy();


                    var amt = '';
                    $("#rows").html('');
                    for (var i = 0; i < appoita.length; i++) {
                        amt = (paya[i] == '') ? '' : paya[i][0]['Amount'];
                        var stime = appoita[i]['start_datetime'].split(' ');

                        stime = stime[1].split(':');

                        var hr = stime[0];

                        var ampm = hr >= 12 ? 'PM' : 'AM';
                        hr = hr % 12;
                        hr = hr ? hr : 12; // the hour '0' should be '12'
                        hr = ("0" + hr).slice(-2);
                        stime = hr + ":" + stime[1] + ":" + stime[2];
                        var bday = appoita[i]['book_datetime'].split(' ');
                        bday = bday[0].split('-');

                        var tme = bday[2] + "-" + bday[1] + "-" + bday[0];
                        var status = null;
                        if (appoita[i]['Status'] == 0) {
                            status = "Booked";
                        } else if (appoita[i]['Status'] == 1) {
                            status = "Canceld by Hospital";
                        } else if (appoita[i]['Status'] == 2) {
                            status = "Canceled By Customer";
                        } else if (appoita[i]['Status'] == 3) {
                            status = "Complete";
                        } else if (appoita[i]['Status'] == 4) {
                            status = "No show";
                        }
                        datar.push({
                            "Id": appoita[i]['Order_id'],
                            "Name": (usera[i] == '') ? '' : usera[i][0]['first_name'],
                            "BookedDate": tme,
                            "Appointment Date": formatAMPM(appoita[i]['start_datetime']),
                            "StartTime": stime,
                            "Amount": amt,
                            "Type": (amt == "") ? "Offline" : "Online",
                            "Status": status
                        });
                        //   $("#rows").append("<tr><td>"+appoita[i]['Order_id']+"</td><td>"+usera[i][0]['first_name']+"</td><td>"+appoita[i]['book_datetime']+"</td><td>"+appoita[i]['start_datetime']+"</td><td>"+amt+"</td></tr>");
                    }
                    // this.filter('', response.id, true);
                    const datar1 = JSON.stringify(datar);

                    var d = $('#example').dataTable({
                        "destroy": true,
                        "sEcho": 1,
                        "select": true,
                        "responsive": true,
                        "lengthMenu": [
                            [25, 50, 100, 200, -1],
                            [25, 50, 100, 200, "All"]
                        ],

                        paging: true,
                        "iTotalRecords": appoita.length,
                        "iTotalDisplayRecords": appoita.length,
                        "aaData": JSON.parse(datar1),
                        "bPaginate": true,
                        "bProcessing": true,
                        "pageLength": 10,
                        "columns": [
                            { mData: 'Id' },
                            { mData: 'Name' },
                            { mData: 'BookedDate' },
                            { mData: 'Appointment Date' },
                            { mData: 'StartTime' },
                            { mData: 'Amount' },
                            { mData: 'Type' },
                            { mData: 'Status' }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf', 'print'
                        ]

                    });
                }

                // d.ajax.reload(null, false);

            }.bind(this));
    }.bind(this));




    $('#week-submit').click(function() {

        var startdate = $('#weekwise1').val();
        var enddate = $('#weekwise2').val();
        var provider = $('#providers1').val();

        if (startdate == "" && enddate == "" && provider == "") {
            Notiflix.Notify.Warning('All fields are Required');
            event.preventDefault();
        } else if (startdate == "") {
            Notiflix.Notify.Warning('Start Date field are Required');
            event.preventDefault();
        } else if (enddate == "") {
            Notiflix.Notify.Warning('End Date field are Required');
            event.preventDefault();
        } else if (provider == "") {
            Notiflix.Notify.Warning('Provider field are Required');
            event.preventDefault();
        } else {
            // ajax code
        }


        var week = {
            startdate: $('#weekwise1').val(),
            enddate: $('#weekwise2').val(),
            provider: $('#providers1').val()

        };

        var url = GlobalVariables.baseUrl + '/index.php/backend_api/week_wise';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            week: week
        };

        $.post(url, data)
            .done(function(response) {
                Backend.displayNotification("Weekly Wise Report Successfully");
                var res = jQuery.parseJSON(response);

                if (res == "Data not available. Please select Another") {
                    $('#example1').dataTable().fnDestroy();
                    $('#example1').dataTable().fnClearTable();
                    Notiflix.Notify.Warning('Data not available. Please select Another');
                } else {

                    var appoita = res['appointment'];
                    var usera = res['user'];
                    var paya = res['payment'];
                    var datar = [];

                    //$("#example").dataTable().fnDestroy();


                    var amt = '';
                    $("#rows").html('');
                    for (var i = 0; i < appoita.length; i++) {
                        amt = (paya[i] == '') ? '' : paya[i][0]['Amount'];
                        var stime = appoita[i]['start_datetime'].split(' ');

                        stime = stime[1].split(':');

                        var hr = stime[0];

                        var ampm = hr >= 12 ? 'PM' : 'AM';
                        hr = hr % 12;
                        hr = hr ? hr : 12; // the hour '0' should be '12'
                        hr = ("0" + hr).slice(-2);
                        stime = hr + ":" + stime[1] + ":" + stime[2];
                        var bday = appoita[i]['book_datetime'].split(' ');
                        bday = bday[0].split('-');

                        var tme = bday[2] + "-" + bday[1] + "-" + bday[0];
                        var status = null;
                        if (appoita[i]['Status'] == 0) {
                            status = "Booked";
                        } else if (appoita[i]['Status'] == 1) {
                            status = "Canceld by Hospital";
                        } else if (appoita[i]['Status'] == 2) {
                            status = "Canceled By Customer";
                        } else if (appoita[i]['Status'] == 3) {
                            status = "Complete";
                        } else if (appoita[i]['Status'] == 4) {
                            status = "No show";
                        }

                        datar.push({
                            "Id": appoita[i]['Order_id'],
                            "Name": (usera[i] == '') ? '' : usera[i][0]['first_name'],
                            "BookedDate": tme,
                            "Appointment Date": formatAMPM(appoita[i]['start_datetime']),
                            "StartTime": stime,
                            "Amount": amt,
                            "Type": (amt == "") ? "Offline" : "Online",
                            "Status": status
                        });
                        //   $("#rows").append("<tr><td>"+appoita[i]['Order_id']+"</td><td>"+usera[i][0]['first_name']+"</td><td>"+appoita[i]['book_datetime']+"</td><td>"+appoita[i]['start_datetime']+"</td><td>"+amt+"</td></tr>");
                    }
                    // this.filter('', response.id, true);
                    const datar1 = JSON.stringify(datar);
                    // console.log(datar1);
                    var d = $('#example1').dataTable({
                        "destroy": true,
                        "sEcho": 1,
                        "select": true,
                        "responsive": true,
                        "lengthMenu": [
                            [25, 50, 100, 200, -1],
                            [25, 50, 100, 200, "All"]
                        ],

                        paging: true,
                        "iTotalRecords": appoita.length,
                        "iTotalDisplayRecords": appoita.length,
                        "aaData": JSON.parse(datar1),
                        "bPaginate": true,
                        "bProcessing": true,
                        "pageLength": 10,
                        "columns": [
                            { mData: 'Id' },
                            { mData: 'Name' },
                            { mData: 'BookedDate' },
                            { mData: 'Appointment Date' },
                            { mData: 'StartTime' },
                            { mData: 'Amount' },
                            { mData: 'Type' },
                            { mData: 'Status' }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf', 'print'
                        ]

                    });
                }
            }.bind(this));
    }.bind(this));

    $('#month-submit').click(function() {

        var startdate = $('#monthlywise1').val();
        var provider = $('#providers2').val();

        if (startdate == "" && provider == "") {
            Notiflix.Notify.Warning('All fields are Required');
            event.preventDefault();
        } else if (startdate == "") {
            Notiflix.Notify.Warning('Start Date field are Required');
            event.preventDefault();
        } else if (provider == "") {
            Notiflix.Notify.Warning('Provider field are Required');
            event.preventDefault();
        } else {
            // ajax code
        }


        var monthy = {
            startdate: $('#monthlywise1').val(),
            provider: $('#providers2').val()

        };

        var url = GlobalVariables.baseUrl + '/index.php/backend_api/month_wise';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            month: monthy
        };

        $.post(url, data)
            .done(function(response) {
                Backend.displayNotification("Monthly Wise Report Successfully");
                var res = jQuery.parseJSON(response);
                if (res == "Data not available. Please select Another") {
                    Notiflix.Notify.Warning('Data not available. Please select Another');
                    $('#example2').dataTable().fnDestroy();
                    $('#example2').dataTable().fnClearTable();
                } else {
                    //  console.log(res);
                    var appoita = res['appointment'];
                    var usera = res['user'];
                    var paya = res['payment'];

                    var datar = [];

                    //$("#example").dataTable().fnDestroy();


                    var amt = '';
                    $("#rows").html('');
                    for (var i = 0; i < appoita.length; i++) {
                        amt = (paya[i] == '') ? '' : paya[i][0]['Amount'];

                        var stime = appoita[i]['start_datetime'].split(' ');

                        stime = stime[1].split(':');

                        var hr = stime[0];

                        var ampm = hr >= 12 ? 'PM' : 'AM';
                        hr = hr % 12;
                        hr = hr ? hr : 12; // the hour '0' should be '12'
                        hr = ("0" + hr).slice(-2);
                        stime = hr + ":" + stime[1] + ":" + stime[2];
                        var bday = appoita[i]['book_datetime'].split(' ');
                        bday = bday[0].split('-');

                        var tme = bday[2] + "-" + bday[1] + "-" + bday[0];
                        var status = null;
                        if (appoita[i]['Status'] == 0) {
                            status = "Booked";
                        } else if (appoita[i]['Status'] == 1) {
                            status = "Canceld by Hospital";
                        } else if (appoita[i]['Status'] == 2) {
                            status = "Canceled By Customer";
                        } else if (appoita[i]['Status'] == 3) {
                            status = "Complete";
                        } else if (appoita[i]['Status'] == 4) {
                            status = "No show";
                        }

                        datar.push({
                            "Id": appoita[i]['Order_id'],
                            "Name": (usera[i] == '') ? '' : usera[i][0]['first_name'],
                            "BookedDate": tme,
                            "Appointment Date": formatAMPM(appoita[i]['start_datetime']),
                            "StartTime": stime,
                            "Amount": amt,
                            "Type": (amt == "") ? "Offline" : "Online",
                            "Status": status
                        });
                        //   $("#rows").append("<tr><td>"+appoita[i]['Order_id']+"</td><td>"+usera[i][0]['first_name']+"</td><td>"+appoita[i]['book_datetime']+"</td><td>"+appoita[i]['start_datetime']+"</td><td>"+amt+"</td></tr>");
                    }
                    // this.filter('', response.id, true);
                    const datar1 = JSON.stringify(datar);

                    var d = $('#example2').dataTable({
                        "destroy": true,
                        "sEcho": 1,
                        "select": true,
                        "responsive": true,
                        "lengthMenu": [
                            [25, 50, 100, 200, -1],
                            [25, 50, 100, 200, "All"]
                        ],

                        paging: true,
                        "iTotalRecords": appoita.length,
                        "iTotalDisplayRecords": appoita.length,
                        "aaData": JSON.parse(datar1),
                        "bPaginate": true,
                        "bProcessing": true,
                        "pageLength": 10,
                        "columns": [
                            { mData: 'Id' },
                            { mData: 'Name' },
                            { mData: 'BookedDate' },
                            { mData: 'Appointment Date' },
                            { mData: 'StartTime' },
                            { mData: 'Amount' },
                            { mData: 'Type' },
                            { mData: 'Status' }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf', 'print'
                        ]

                    });
                }
            }.bind(this));
    }.bind(this));


    $('#app-submit').click(function() {
        var status = $('#status').val();
        var url = GlobalVariables.baseUrl + '/index.php/backend_api/appointment_report';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            status: status
        };

        $.post(url, data)
            .done(function(response) {
                Backend.displayNotification("Appointments Report Successfully");
                //console.log(response);
                var res = jQuery.parseJSON(response);
                if (res == "Data not Available") {
                    Notiflix.Notify.Warning('Data not available. Please select Another');
                    $('#example3').dataTable().fnDestroy();
                    $('#example3').dataTable().fnClearTable();
                } else {
                    //  console.log(res);
                    var appoita = res['appointment'];
                    var usera = res['user'];
                    var datar = [];

                    //$("#example").dataTable().fnDestroy();


                    $("#rows").html('');
                    for (var i = 0; i < appoita.length; i++) {
                        var sta = (appoita[i]['Status'] == 3) ? "<span  style='color: white;background: green;padding: 5%;border-radius: 5px;'>Complete</span>" : "<span style='color: white;background: red;padding: 5%;border-radius: 5px;'>No Show</i></span>";
                        var stime = appoita[i]['start_datetime'].split(' ');
                        stime = stime[1].split(':');

                        var hr = stime[0];

                        var ampm = hr >= 12 ? 'PM' : 'AM';
                        hr = hr % 12;
                        hr = hr ? hr : 12; // the hour '0' should be '12'
                        hr = ("0" + hr).slice(-2);
                        stime = hr + ":" + stime[1] + ":" + stime[2];
                        var bday = appoita[i]['book_datetime'].split(' ');
                        bday = bday[0].split('-');

                        var tme = bday[2] + "-" + bday[1] + "-" + bday[0];

                        datar.push({
                            "Id": appoita[i]['Order_id'],
                            "Name": (usera[i] == '') ? '' : usera[i][0]['first_name'],
                            "BookedDate": tme,
                            "Appointment Date": formatAMPM(appoita[i]['start_datetime']),
                            "StartTime": stime,
                            "Status": sta
                        });
                        //   $("#rows").append("<tr><td>"+appoita[i]['Order_id']+"</td><td>"+usera[i][0]['first_name']+"</td><td>"+appoita[i]['book_datetime']+"</td><td>"+appoita[i]['start_datetime']+"</td><td>"+amt+"</td></tr>");
                    }
                    // this.filter('', response.id, true);
                    const datar1 = JSON.stringify(datar);

                    var d = $('#example3').dataTable({
                        "destroy": true,
                        "sEcho": 1,
                        "select": true,
                        "responsive": true,
                        "lengthMenu": [
                            [25, 50, 100, 200, -1],
                            [25, 50, 100, 200, "All"]
                        ],

                        paging: true,
                        "iTotalRecords": appoita.length,
                        "iTotalDisplayRecords": appoita.length,
                        "aaData": JSON.parse(datar1),
                        "bPaginate": true,
                        "bProcessing": true,
                        "pageLength": 10,
                        "columns": [
                            { mData: 'Id' },
                            { mData: 'Name' },
                            { mData: 'BookedDate' },
                            { mData: 'Appointment Date' },
                            { mData: 'StartTime' },
                            { mData: 'Status' }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf', 'print'
                        ]

                    });
                }







            }.bind(this));
    }.bind(this));


    function formatAMPM(date) {
        var date = new Date(date);
        var options = {
            day:'numeric',
            month:'numeric',
            year:'numeric',
          hour: 'numeric',
          minute: 'numeric',
          hour12: true
        };
        var timeString = date.toLocaleString('en-US', options);
        return timeString;
      }


    /**
     * Delete a provider record from database.
     *
     * @param {Number} id Record id to be deleted.
     */
    ProvidersHelper.prototype.delete = function(id) {
        var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_delete_provider';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            provider_id: id
        };

        $.post(url, data)
            .done(function() {
                Backend.displayNotification(EALang.provider_deleted);
                this.resetForm();
                this.filter($('#filter-providers .key').val());
            }.bind(this));
    };

    /**
     * Validates a provider record.
     *
     * @return {Boolean} Returns the validation result.
     */
    ProvidersHelper.prototype.validate = function() {
        $('#providers .has-error').removeClass('has-error');
        $('#providers .form-message')
            .removeClass('alert-danger')
            .hide();

        try {
            // Validate required fields.
            var missingRequired = false;
            $('#providers .required').each(function(index, requiredField) {
                if (!$(requiredField).val()) {
                    $(requiredField).closest('.form-group').addClass('has-error');
                    missingRequired = true;
                }
            });
            if (missingRequired) {
                throw new Error(EALang.fields_are_required);
            }

            // Validate passwords.
            if ($('#provider-password').val() !== $('#provider-password-confirm').val()) {
                $('#provider-password, #provider-password-confirm').closest('.form-group').addClass('has-error');
                throw new Error(EALang.passwords_mismatch);
            }

            if ($('#provider-password').val().length < BackendUsers.MIN_PASSWORD_LENGTH &&
                $('#provider-password').val() !== '') {
                $('#provider-password, #provider-password-confirm').closest('.form-group').addClass('has-error');
                throw new Error(EALang.password_length_notice.replace('$number', BackendUsers.MIN_PASSWORD_LENGTH));
            }

            // Validate user email.
            // if (!GeneralFunctions.validateEmail($('#provider-email').val())) {
            //     $('#provider-email').closest('.form-group').addClass('has-error');
            //     throw new Error(EALang.invalid_email);
            // }

            // Check if username exists
            if ($('#provider-username').attr('already-exists') === 'true') {
                $('#provider-username').closest('.form-group').addClass('has-error');
                throw new Error(EALang.username_already_exists);
            }

            return true;
        } catch (error) {
            $('#providers .form-message')
                .addClass('alert-danger')
                .text(error.message)
                .show();
            return false;
        }
    };

    /**
     * Resets the admin tab form back to its initial state.
     */
    ProvidersHelper.prototype.resetForm = function() {
        $('#filter-providers .selected').removeClass('selected');
        $('#filter-providers button').prop('disabled', false);
        $('#filter-providers .results').css('color', '');

        $('#providers .add-edit-delete-group').show();
        $('#providers .save-cancel-group').hide();
        $('#providers .record-details h3 a').remove();
        $('#providers .record-details').find('input, select, textarea')
            .val('')
            .prop('disabled', true);
        $('#providers .record-details #provider-calendar-view').val('default');
        $('#providers .record-details #provider-timezone').val('UTC');
        $('#providers .add-break, .add-working-plan-exception, #reset-working-plan').prop('disabled', true);
        BackendUsers.wp.timepickers(true);
        $('#providers .working-plan input:text').timepicker('destroy');
        $('#providers .working-plan input:checkbox').prop('disabled', true);
        $('.breaks').find('.edit-break, .delete-break').prop('disabled', true);
        $('.working-plan-exceptions').find('.edit-working-plan-exception, .delete-working-plan-exception').prop('disabled', true);

        $('#providers .record-details .has-error').removeClass('has-error');
        $('#providers .record-details .form-message').hide();

        $('#edit-provider, #delete-provider').prop('disabled', true);
        $('#provider-services input:checkbox')
            .prop('disabled', true)
            .prop('checked', false);
        $('#provider-services a').remove();
        $('#providers .working-plan tbody').empty();
        $('#providers .breaks tbody').empty();
        $('#providers .working-plan-exceptions tbody').empty();
    };

    /**
     * Display a provider record into the admin form.
     *
     * @param {Object} provider Contains the provider record data.
     */
    ProvidersHelper.prototype.display = function(provider) {
        $('#provider-id').val(provider.id);
        $('#provider-first-name').val(provider.first_name);
        $('#provider-last-name').val(provider.MRN);
        $('#provider-email').val(provider.email);
        $('#provider-mobile-number').val(provider.mobile_number);
        $('#provider-phone-number').val(provider.phone_number);
        $('#provider-address').val(provider.address);
        $('#provider-city').val(provider.city);
        $('#provider-state').val(provider.state);
        $('#provider-zip-code').val(provider.zip_code);
        $('#provider-notes').val(provider.notes);
        $('#provider-timezone').val(provider.timezone);


        $('#provider-username').val(provider.settings.username);
        $('#provider-calendar-view').val(provider.settings.calendar_view);
        $('#provider-notifications').prop('checked', Boolean(Number(provider.settings.notifications)));

        // Add dedicated provider link.
        var dedicatedUrl = GlobalVariables.baseUrl + '/index.php?provider=' + encodeURIComponent(provider.id);
        var $link = $('<a/>', {
            'href': dedicatedUrl,
            'html': [
                $('<span/>', {
                    'class': 'fas fa-link'
                })
            ]
        });

        $('#providers .details-view h3')
            .find('a')
            .remove()
            .end()
            .append($link);

        $('#provider-services a').remove();
        $('#provider-services input:checkbox').prop('checked', false);

        provider.services.forEach(function(providerServiceId) {
            var $checkbox = $('#provider-services input[data-id="' + providerServiceId + '"]');

            if (!$checkbox.length) {
                return;
            }

            $checkbox.prop('checked', true);

            // Add dedicated service-provider link.
            dedicatedUrl = GlobalVariables.baseUrl + '/index.php?provider=' + encodeURIComponent(provider.id) +
                '&service=' + encodeURIComponent(providerServiceId);

            $link = $('<a/>', {
                'href': dedicatedUrl,
                'html': [
                    $('<span/>', {
                        'class': 'fas fa-link'
                    })
                ]
            });

            $checkbox.parent().append($link);
        });

        // Display working plan
        var workingPlan = $.parseJSON(provider.settings.working_plan);
        BackendUsers.wp.setup(workingPlan);
        $('.working-plan').find('input').prop('disabled', true);
        $('.breaks').find('.edit-break, .delete-break').prop('disabled', true);
        $('#providers .working-plan-exceptions tbody').empty();
        var workingPlanExceptions = $.parseJSON(provider.settings.working_plan_exceptions);
        BackendUsers.wp.setupWorkingPlanExceptions(workingPlanExceptions);
        $('.working-plan-exceptions').find('.edit-working-plan-exception, .delete-working-plan-exception').prop('disabled', true);
        $('#providers .working-plan input:checkbox').prop('disabled', true);
        Backend.placeFooterToBottom();
    };

    /**
     * Filters provider records depending a string key.
     *
     * @param {string} key This is used to filter the provider records of the database.
     * @param {numeric} selectId Optional, if set, when the function is complete a result row can be set as selected.
     * @param {bool} display Optional (false), if true the selected record will be also displayed.
     */
    ProvidersHelper.prototype.filter = function(key, selectId, display) {
        display = display || false;

        var url = GlobalVariables.baseUrl + '/index.php/backend_api/ajax_filter_providers';
        var data = {
            csrfToken: GlobalVariables.csrfToken,
            key: key,
            limit: this.filterLimit
        };

        $.post(url, data)
            .done(function(response) {
                this.filterResults = response;

                $('#filter-providers .results').empty();
                response.forEach(function(provider) {
                    $('#filter-providers .results')
                        .append(this.getFilterHtml(provider))
                        .append($('<hr/>'));
                }.bind(this));

                if (!response.length) {
                    $('#filter-providers .results').append(
                        $('<em/>', {
                            'text': EALang.no_records_found
                        })
                    );
                } else if (response.length === this.filterLimit) {
                    $('<button/>', {
                            'type': 'button',
                            'class': 'btn btn-block btn-outline-secondary load-more text-center',
                            'text': EALang.load_more,
                            'click': function() {
                                this.filterLimit += 20;
                                this.filter(key, selectId, display);
                            }.bind(this)
                        })
                        .appendTo('#filter-providers .results');
                }

                if (selectId) {
                    this.select(selectId, display);
                }
            }.bind(this));
    };

    /**
     * Get an provider row html code that is going to be displayed on the filter results list.
     *
     * @param {Object} provider Contains the provider record data.
     *
     * @return {String} The html code that represents the record on the filter results list.
     */
    ProvidersHelper.prototype.getFilterHtml = function(provider) {
        var name = provider.first_name + ' ' + provider.MRN;

        var info = provider.email;

        info = provider.mobile_number ? info + ', ' + provider.mobile_number : info;

        info = info ? info + ', ' + provider.phone_number : provider.phone_number;

        return $('<div/>', {
            'class': 'provider-row entry',
            'data-id': provider.id,
            'html': [
                $('<strong/>', {
                    'text': name
                }),
                $('<br/>'),
                $('<span/>', {
                    'text': info
                }),
                $('<br/>'),
            ]
        });
    };

    /**
     * Initialize the editable functionality to the break day table cells.
     *
     * @param {Object} $selector The cells to be initialized.
     */
    ProvidersHelper.prototype.editableDayCell = function($selector) {
        var weekDays = {};
        weekDays[EALang.monday] = 'Monday';
        weekDays[EALang.tuesday] = 'Tuesday';
        weekDays[EALang.wednesday] = 'Wednesday';
        weekDays[EALang.thursday] = 'Thursday';
        weekDays[EALang.friday] = 'Friday';
        weekDays[EALang.saturday] = 'Saturday';
        weekDays[EALang.sunday] = 'Sunday';


        $selector.editable(function(value, settings) {
            return value;
        }, {
            type: 'select',
            data: weekDays,
            event: 'edit',
            height: '30px',
            submit: '<button type="button" class="d-none submit-editable">Submit</button>',
            cancel: '<button type="button" class="d-none cancel-editable">Cancel</button>',
            onblur: 'ignore',
            onreset: function(settings, td) {
                if (!BackendUsers.enableCancel) {
                    return false; // disable ESC button
                }
            },
            onsubmit: function(settings, td) {
                if (!BackendUsers.enableSubmit) {
                    return false; // disable Enter button
                }
            }
        });
    };

    /**
     * Initialize the editable functionality to the break time table cells.
     *
     * @param {jQuery} $selector The cells to be initialized.
     */
    ProvidersHelper.prototype.editableTimeCell = function($selector) {
        $selector.editable(function(value, settings) {
            // Do not return the value because the user needs to press the "Save" button.
            return value;
        }, {
            event: 'edit',
            height: '25px',
            submit: '<button type="button" class="d-none submit-editable">Submit</button>',
            cancel: '<button type="button" class="d-none cancel-editable">Cancel</button>',
            onblur: 'ignore',
            onreset: function(settings, td) {
                if (!BackendUsers.enableCancel) {
                    return false; // disable ESC button
                }
            },
            onsubmit: function(settings, td) {
                if (!BackendUsers.enableSubmit) {
                    return false; // disable Enter button
                }
            }
        });
    };

    

    /**
     * Select and display a providers filter result on the form.
     *
     * @param {Number} id Record id to be selected.
     * @param {Boolean} display Optional (false), if true the record will be displayed on the form.
     */
    ProvidersHelper.prototype.select = function(id, display) {
        display = display || false;

        // Select record in filter results.
        $('#filter-providers .provider-row[data-id="' + id + '"]').addClass('selected');

        // Display record in form (if display = true).
        if (display) {
            var provider = this.filterResults.find(function(filterResult) {
                return Number(filterResult.id) === Number(id);
            }.bind(this));

            this.display(provider);

            $('#edit-provider, #delete-provider').prop('disabled', false);
        }
    };
  
   
    window.ProvidersHelper = ProvidersHelper;

})();