<?php
date_default_timezone_set('Asia/Kolkata');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    
 <title><? echo "Payment Failure"; ?></title>
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
                <img id="success-icon" class="mt-0 mb-2" src="<?= base_url('assets/img/error.png') ?>"/>
            </div>
            <center><h3>Your payment was not successful</h3></center>
             <? if(!empty($data)){ 
            
             ?>
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
                    <td><? echo $data['ORDERID']; ?></td>
                    <td><? echo $data['TXNAMOUNT']; ?></td>
                    <td><? echo (@$data['PAYMENTMODE'] == '')?'*****':$data['PAYMENTMODE']; ?></td>
                    <?php
                    if(!empty($data['TXNDATE'])){
                    ?>
                    <td><?  echo @(date('d-m-Y H:i:s',strtotime($data['TXNDATE'])) == '01-01-1970 00:00:00')?'*****': date('d-m-Y g:i:s',strtotime($data['TXNDATE'])) ; ?></td>
                    <?php
                    }
                    else{
                    ?>
                    <td>*****</td>
                    <?php
                    }
                    ?>
                    <td><? echo $data['STATUS']; ?></td>
                    <td><? echo (@$data['BANKNAME'] == '')?'*****':$data['BANKNAME']; ?></td>
                    
                </tr>
                <tr>
                    
                    <td>Error</td>
                     <td colspan="5"><? echo $data['RESPMSG']; ?></td>
                </tr>
                
                <?
                }   ?>
            </table></center>
            
            <div class="mt-2">
                <small>
                    Powered by
                    <a href="https://gravitykey.com">Gravitykey</a>
                </small>
                
                <a class="backend-link badge badge-primary" href="<?php echo site_url('Appointments'); ?>">Home&nbsp;
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <? // $this->session->user_id ? lang('backend_section') : lang('login') ?>
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
