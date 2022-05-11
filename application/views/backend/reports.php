<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"     href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<style>
#footer {
    display: none;
}
</style>
<script src="<?= asset_url('assets/js/backend_services_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_categories_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_services.js') ?>"></script>
<script>
var GlobalVariables = {
    csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
    baseUrl: <?= json_encode($base_url) ?>,
    dateFormat: <?= json_encode($date_format) ?>,
    timeFormat: <?= json_encode($time_format) ?>,
    services: <?= json_encode($services) ?>,
    categories: <?= json_encode($categories) ?>,
    timezones: <?= json_encode($timezones) ?>,
    user: {
        id: <?= $user_id ?>,
        email: <?= json_encode($user_email) ?>,
        timezone: <?= json_encode($timezone) ?>,
        role_slug: <?= json_encode($role_slug) ?>,
        privileges: <?= json_encode($privileges) ?>
    }
};

$(function() {
    BackendServices.initialize(true);
});
</script>

<div class="container-fluid backend-page" id="services-page">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#day" data-toggle="tab">
                Day
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#week" data-toggle="tab">
                Week
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#month-wise" data-toggle="tab">
                Month
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#app-wise" data-toggle="tab">
                Appointment
            </a>
        </li>

    </ul>

    <div class="tab-content">

        <!-- SERVICES TAB -->

        <div class="tab-pane active" id="day">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-4">

                    <h3>Search</h3>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" id="datewise" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="providers">
                            <option value="">Select Provider</option>
                            <?php
                           foreach($available_providers as $row){
                               echo "<option value=".$row['id'].">".$row['first_name']." ".$row['MRN']."</option>";
                           }
                           ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="day-submit" class="btn btn-primary">Search</button>
                    </div>

                </div>

                <div class="record-details column col-12 col-md-8">


                    <h3>Day Reports</h3>
                    <span id="service-org" style="display:none">
                        <? echo $this->session->userdata('Organization'); ?>
                    </span>
                    <div class="form-message alert" style="display:none;"></div>
                    <table id="example" class="display wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Booked Date</th>
                                <th>Appointment Date</th>
                                <th>Start Time</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>
        <!-- CATEGORIES TAB -->

        <div class="tab-pane" id="week">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-5">

                    <h3>Search</h3>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" onchange="get_week()" id="weekwise1" />
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" readonly class="form-control" id="weekwise2" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="providers1">
                            <option value="">Select Provider</option>
                            <?php
                           foreach($available_providers as $row){
                            echo "<option value=".$row['id'].">".$row['first_name']." ".$row['MRN']."</option>";
                        }
                           ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="week-submit" class="btn btn-primary">Search</button>
                    </div>

                </div>

                <div class="record-details column col-12 col-md-8">


                    <h3>Weekly Reports</h3>
                    <span id="service-org1" style="display:none">
                        <? echo $this->session->userdata('Organization'); ?>
                    </span>
                    <div class="form-message alert" style="display:none;"></div>
                    <table id="example1" class="display wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Booked Date</th>
                                <th>Appointment Date</th>
                                <th>Start Time</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>

                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>

        <script>
        function get_week() {
            'use strict';
            var from = document.getElementById('weekwise1').value;


            var date = new Date(from);
            var week = date.setDate(date.getDate() + 6);
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var year = date.getFullYear();
            var wk = year + "-" + month + "-" + day;
            document.getElementById('weekwise2').value = wk;


        }
        </script>

        <div class="tab-pane" id="month-wise">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-4">

                    <h3>Search</h3>
                    <div class="form-group">

                        <select class="form-control" id="monthlywise1">
                            <option>Select Month</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="11">Dec</option>
                        </select>

                    </div>

                    <div class="form-group">

                        <select class="form-control" id="providers2">
                            <option value="">Select Provider</option>
                            <?php
                           foreach($available_providers as $row){
                            echo "<option value=".$row['id'].">".$row['first_name']." ".$row['MRN']."</option>";
                        }
                           ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="month-submit" class="btn btn-primary">Search</button>
                    </div>

                </div>

                <div class="record-details column col-12 col-md-8">


                    <h3>Monthly Reports</h3>
                    <span id="service-org2" style="display:none">
                        <? echo $this->session->userdata('Organization'); ?>
                    </span>
                    <div class="form-message alert" style="display:none;"></div>
                    <table id="example2" class="display wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Booked Date</th>
                                <th>Appointment Date</th>
                                <th>Start Time</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Status</th>

                            </tr>
                        </thead>


                    </table>

                </div>
            </div>
        </div>

        <div class="tab-pane " id="app-wise">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-5">

                    <h3>Search</h3>

                    <div class="form-group">
                        <select class="form-control" id="status">
                            <option value="">Select Status</option>
                            <option value="3">Complete</option>
                            <option value="4">No Show</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <button id="app-submit" class="btn btn-primary">Search</button>
                    </div>

                </div>

                <div class="record-details column col-12 col-md-8">


                    <h3>Appointment Reports</h3>
                    <span id="service-org" style="display:none">
                        <? echo $this->session->userdata('Organization'); ?>
                    </span>
                    <div class="form-message alert" style="display:none;"></div>
                    <table id="example3" class="display wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Booked Date</th>
                                <th>Appointment Date</th>
                                <th>Start Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>


    </div>
</div>






<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#example,#example1,#example2,#example3').DataTable({

    });
});
</script>
<script src="<?= asset_url('assets/js/backend_users_providers.js') ?>"></script>