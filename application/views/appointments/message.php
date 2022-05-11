<!DOCTYPE html>
<? error_reporting(0); 
date_default_timezone_set('Asia/Kolkata');

?> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">

    <title><?= $message_title ?> | Gravitykey</title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">

  

    <script>
        var EALang = <?= json_encode($this->lang->language) ?>;
    </script>

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
</head>

<body>
<div id="main" class="container">
    <div class="row wrapper">
        <div id="message-frame" class="col-12 border my-auto frame-container">
            <?php
            if(empty($message_icon) != true){
            ?>
            <div>
                <img id="message-icon" src="<?= $message_icon ?>" alt="warning">
            </div>
<?php
}
?>
            <div>
                <h3><?= $message_title ?></h3>
                <p><?= $message_text ?></p>
              
                  <center style="display:inline-grid">
                      <?php if(!empty($response)){ 
                      $res=json_decode($response,TRUE);
                     
                     ?>
                      
                      <table class="table table-responsive">
                <tr>
                    <th>Appointment Confirmation ID</th>
                    <th>Amount</th>
                    <th>Reference ID</th>
                    <th>Transaction ID</th>
                    <th>Status</th>
                    <th>Refund ID</th>
                </tr>
                <?php if($res['body']['resultInfo']['resultStatus']=="PENDING"){?>
                <tr>
                      <td><?php echo $res['body']['orderId']; ?></td>
                       <td><?php echo $res['body']['refundAmount']; ?></td>
                       <td><?php echo $res['body']['refId']; ?></td>
                          <td><?php echo $res['body']['txnId']; ?></td>
                        <td><?php echo $res['body']['resultInfo']['resultStatus']; ?></td>
                         <td><?php echo $res['body']['refundId']; ?></td>
                        
                </tr>
                <?php } else if($response['status']=="succeeded"){ ?>
                    <tr>
                      <td><?php echo $response['Order_id']; ?></td>
                       <td><?php echo $response['amount']; ?></td>
                       <td><?php echo $response['refundid']; ?></td>
                          <td><?php echo $response['balance_transaction']; ?></td>
                        <td><?php echo $response['status']; ?></td>
                         <td><?php echo $response['id']; ?></td>
                        
                </tr>
                    
                    <?php } ?>
                      </table>
                      <?php  }
                      if(empty($payment) != true){
                      ?>
                      
            <table class="table table-responsive tab-res">
                <tr>
                <th>Appointment Confirmation ID</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Transaction Date</th>
                    <th>Status</th>
                    <th>Bank Name</th>
                </tr>
                <?php 
                foreach($payment as $row){
                ?>
                <tr>
                    <td><?php echo $row['Order_id']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                    <td><?php echo $row['Payment_mode']; ?></td>
                    <td><?php  echo date('d-m-Y g:i:s',strtotime($row['TXNDate'])); ?></td>
                    <td><?php echo "Cancelled"; ?></td>
                    <td><?php echo $row['Bank_name']; ?></td>
                </tr>
                
                <?php   }   ?>
            </table>
            <?php
                      }
            ?>
            </center>
            <?php
            if(empty($service) != true){
            ?>
            <div class="row frame-content">
                        <div id="appointment-details" class="col-12 col-md-6">
                            <div style="text-lign:left;">
                                <h4>Appointment</h4>
                                 <? //foreach($customer as $row){ ?>
                                 
                                <p><span>Service: <?php echo $service['name']; ?></span><br>
                                <span>Provider: <?php  echo $provider['first_name']." ".$provider['MRN']; ?></span><br>
                                <span>Start: <?php echo date('d-m-Y g:i:s A',strtotime($appoint['start_datetime']));  ?></span><br>
                                <!-- <span>End: <? //echo date('d-m-Y g:i:s A',strtotime($appoint['end_datetime']));  ?></span><br> -->
                               
                                 <? //} ?>
                            </div>
                        </div>
                        <div id="customer-details" class="col-12 col-md-6">
                            <div style="text-lign:left;">
                              
                                <h4>Client</h4>
                                <p><span>Name: <?php echo $customer['first_name']; ?></span><br>
                                <!--<span>MRN Number: <? //echo $customer['MRN']; ?></span><br>-->
                                <span>Phone Number: <?php echo $customer['phone_number']; ?></span>
                                <br><span>Email: <?php echo $customer['email']; ?></span><br>
                                <span></span><br><span></span><br><span></span><br></p>
                               
                            </div>
                        </div>
                    </div>
               <?php
            }
               ?>
                <?php if (isset($exceptions) && config('debug')): ?>
                    <div>
                        <h4><?= lang('unexpected_issues') ?></h4>
                        <?php foreach ($exceptions as $exception): ?>
                            <?= exceptionToHtml($exception) ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="mt-2">
                <small>
                    Powered by
                    <a href="https://gravitykey.com">Gravitykey</a>
                </small>
                    <a style="width:10%" class="btn btn-primary" href="<? echo site_url('Appointments/history'); ?>">Back</a>
            </div>
        </div>
    </div>
</div>

<?php google_analytics_script() ?>
</body>
</html>
