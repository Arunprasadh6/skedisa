<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <title><? echo "Payment Success"; ?></title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">

   

    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
</head>
<body>
<div id="main" class="container">
    <div class="row wrapper">
        <div id="success-frame" class="col-12 border my-auto frame-container">
            <div>
                <img id="success-icon" class="mt-0 mb-2" src="<?= base_url('assets/img/success.png') ?>"/>
            </div>
            <center><h3>Your Appointment and Payment was  successful</h3></center>
          
            <? if(!empty($data)){ ?>
            <center style="display:inline-grid">
            <table class="table table-responsive">
                <tr>
                    <th>Appointment Confirmation ID</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Transaction Date</th>
                    <th>Status</th>
                    <th>Bank Name</th>
                </tr>
               
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['amount']; ?></td>
                    <td><?php echo $data['payment_method']; ?></td>
                    <td><?php  echo gmdate('d-m-Y g:i:s',$data['created']); ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['payment_method_details']['type']; ?></td>
                </tr>
                
                <?    }   ?>
            </table></center>
            
            <div class="row frame-content">
                        <div id="appointment-details" class="col-12 col-md-6">
                            <!-- <div>
                                <h4>Appointment</h4>
                                 <?// foreach($appoint as $row){ ?>
                                <p><span>Service: <?php // echo $row['name']; ?></span><br>
                                <span>Provider: <?php// echo $provider[0]['first_name']." ".$provider[0]['MRN']; ?></span><br>
                                <span>Start: <?php // echo date('d-m-Y g:i:s A',strtotime($row['start_datetime'])); ?></span><br>
                                <span>End: <? //echo  date('d-m-Y g:i:s A',strtotime($row['end_datetime'])); ?></span><br> -->
                               
                                 <? //} ?>
                            </div> 
                        </div>
                        <div id="customer-details" class="col-12 col-md-6">
                            <div>
                                <?// foreach($users as $row){ ?>
                                <!-- <h4>Client</h4>
                                <p><span> Name: <?php //echo $row['first_name']; ?></span><br>
                                <span>MRN Number: //echo $row['MRN'];</span><br>-->
                                <!-- <span>Phone Number: <?php // echo $row['phone_number']; ?></span>
                                <br><span>Email: <?php //echo $row['email']; ?></span><br> -->
                                <!-- <span></span><br><span></span><br><span></span><br></p> -->
                                <? // } ?>
                            </div>
                        </div>
                    </div>

            <div class="mt-2">
                <small>
                    Powered by
                    <a href="https://gravitykey.com">Gravitykey</a>
                </small>
                
                <a class="backend-link badge badge-primary" href="https://gravitykey.com/health-center-master">Back to Website &nbsp;
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <?php // $this->session->user_id ? lang('backend_section') : lang('login') ?>
                        </a>
                        <a class="backend-link badge badge-primary" href="<?php echo site_url('Appointments'); ?>">Back to Home &nbsp;
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <?php // $this->session->user_id ? lang('backend_section') : lang('login') ?>
                        </a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/ext/datejs/date.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/moment/moment.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/moment/moment-timezone-with-data.min.js') ?>"></script>
<script src="https://apis.google.com/js/client.js"></script>

<script src="<?= asset_url('assets/js/frontend_book_success.js') ?>"></script>
<script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>

<?php google_analytics_script() ?>
</body>
</html>
