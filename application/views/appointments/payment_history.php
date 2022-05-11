<!DOCTYPE html>
<?php $a=$this->session->userdata('role_slug'); 
if(empty($a)){
    redirect(site_url());
}
else


date_default_timezone_set('Asia/Kolkata');

error_reporting(0);
?>
<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <title><?php echo "History"; ?></title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/frontend.css') ?>">

   

    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
</head>
<body>
<div id="main" class="container">
    <div class="row wrapper">
        <div id="success-frame" class="col-12 border my-auto frame-container">
               <a style="width:10%" class="btn btn-primary" href="<?php echo site_url('Appointments'); ?>">Home</a>
           <div>
                
                <?php
                $i=1;
                ?>
                 <center><h3>Your Appointment History</h3>&nbsp;&nbsp;&nbsp;
                 </center>
                
            <?php  if(!empty($history)){ 
                
                ?>
            <center style="display:inline-grid">
            <table class="table table-responsive">
                <tr>
                   <th>Appointment Confirmation ID</th>
                   
                    <th>Provider</th>
  
                    <th>Appointment Date</th>
                    <th>Start Time</th>
                    <!-- <th>End Time</th> -->
                    <th>Amount</th>
                    <th> Action </th>
                    <th> Reschedule </th>
                   <input type="hidden" id="token" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                </tr>
                <?php 
                // foreach($history as $row){
                // print_r($history);
                for($i=0;$i<count($history);$i++){ 
                    
                ?>   
                <tr>
                     
                    <td><?php echo $history[$i]['Order_id']; ?></td>
                  
                    <td><?php echo $provider_name[$i][0]['first_name']." ".$provider_name[$i][0]['MRN']; ?></td>
                         
                    <td><?php echo date('d-m-Y',strtotime($history[$i]['start_datetime'])); ?></td>
                    <td><?php echo date('h:i A',strtotime($history[$i]['start_datetime'])); ?></td>
                    <!-- <td><? //echo date('h:i A',strtotime($row['end_datetime'])); ?></td> -->
                  
                    <td><?php echo ($Price[$i][0]['Amount']) ? $Price[$i][0]['Amount'] : 'Offline'; ?></td>

                    <?php
                      
                      $start_date=date('Y-m-d',strtotime($history[$i]['start_datetime']));
                      $current_date=date('Y-m-d');
                      $current_hour=date('h:i A');
                       $refundhour='-'.$refund_hour['hour'].' hours';
                      
                       $appointment_date = date('Y-m-d', strtotime($refundhour, strtotime($history[$i]['start_datetime'])));
                       $appointment_hour = date('h:i A', strtotime($refundhour, strtotime($history[$i]['start_datetime'])));
                     
                     
                //       if($appointment_date == $current_date){                      
                //         if($current_hour <=  $appointment_hour){                       
                        
                //     ?>
                 <?php // if($Price[$i][0]['Status']=="TXN_SUCCESS"){?>
                <!-- //   <td><a href="javascript:void(0)" onclick="cancel_appointment('<?php //echo $history[$i]['hash']; ?>','<?php //echo $history[$i]['Order_id']; ?>','refundfull')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                //   <td><a href="javascript:void(0)" onclick="modify_appointment('<?php //echo $history[$i]['hash']; ?>','<?php //echo $history[$i]['Order_id']; ?>,'<?php// echo $provider_name[$i][0]['first_name'].' '.$provider_name[$i][0]['MRN']; ?>','<?php// echo $service[$i][0]['name']; ?>','<?php //echo $service[$i][0]['id']; ?>','<?php //echo $provider_name[$i][0]['id']; ?>')" class="btn btn-warning" style="width:100%;"> Reschedule </a></td> -->
                  <?php
                //     }else if($Price[$i][0]['Status']=="succeeded"){ ?> 
                <!-- //     <td><a href="javascript:void(0)" onclick="cancel_appointment_stripe('<?php// echo $history[$i]['hash']; ?>','<?php// echo $history[$i]['Order_id']; ?>','<?php// echo $Price[$i][0]['Banktxnid']; ?>','refundfull')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                //     <td><a href="javascript:void(0)" onclick="modify_appointment('<?php //echo $history[$i]['hash']; ?>','<?php //echo $history[$i]['Order_id']; ?>,'<?php //echo $provider_name[$i][0]['first_name'].' '.$provider_name[$i][0]['MRN']; ?>','<?php //echo $service[$i][0]['name']; ?>','<?php //echo $service[$i][0]['id']; ?>','<?php //echo $provider_name[$i][0]['id']; ?>')" class="btn btn-warning" style="width:100%;"> Reschedule </a></td> -->
                    
                    <?php // }
                //     else{
                //         ?>
                <!-- //           <td><button  class="btn btn-warning" style="width:100%;"> Booked </button></td>
                //           <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td> -->

                         <?php
                //     }                 
                // } // second if end
                // else{
                //     if($Price[$i][0]['Status']=="TXN_SUCCESS"){
                //     ?>
                <!-- //   <td><a href="javascript:void(0)" onclick="cancel_appointment('<?php //echo $history[$i]['hash']; ?>','<?php// echo $history[$i]['Order_id']; ?>','refundoff')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                //   <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td> -->
                 <?php
                //     }else if($Price[$i][0]['Status']=="succeeded"){ ?> 
                <!-- //      <td><a href="javascript:void(0)" onclick="cancel_appointment_stripe('<?php //echo $history[$i]['hash']; ?>','<?php //echo $history[$i]['Order_id']; ?>','<?php //echo $Price[$i][0]['Banktxnid']; ?>','refundoff')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                //   <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td> -->
                     <?php //}
                //     else{
                //         ?>
                <!-- //           <td><button  class="btn btn-warning" style="width:100%;"> Booked </button></td>
                //          <td> <button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td> -->

                         <?php
                //     }
                // } // second else end 
                
                // }// first if end
              
          if($current_date == $start_date){                  
                        
                     if($current_hour <= '08:00 AM'){
                        
                        if($Price[$i][0]['Status']=="TXN_SUCCESS"){
                    ?>
                    <td><a href="javascript:void(0)" onclick="cancel_appointment('<?php echo $history[$i]['hash']; ?>','<?php echo $history[$i]['Order_id']; ?>','refundoff')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                    <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>
                    <?php
                        } else if($Price[$i][0]['Status']=="succeeded"){ ?>
                        
                        <td><a href="javascript:void(0)" onclick="cancel_appointment_stripe('<?php echo $history[$i]['hash']; ?>','<?php echo $history[$i]['Order_id']; ?>','<?php echo $Price[$i][0]['Banktxnid']; ?>','refundoff')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                  <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>
                        <?php
                        }
                        else{
                            ?>
                              <td><button  class="btn btn-warning" style="width:100%;"> Booked </button></td>
                            <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>

                            <?php
                        }
                    }
                    
                    else{
                       ?>
                         <td><button  class="btn btn-warning" style="width:100%;"> Booked </button></td>
                     <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>

                       <?php 
                    }
             }
             
             else if($current_date < $start_date){
                        if($Price[$i][0]['Status']=="TXN_SUCCESS"){
                        ?>
                   <td><a href="javascript:void(0)" onclick="cancel_appointment('<?php echo $history[$i]['hash']; ?>','<?php echo $history[$i]['Order_id']; ?>','refundoff')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                   <td><a href="javascript:void(0)" onclick="modify_appointment('<?php echo $history[$i]['hash']; ?>','<?php echo $history[$i]['Order_id']; ?>','<?php echo $provider_name[$i][0]['first_name'].' '.$provider_name[$i][0]['MRN']; ?>','<?php echo $service[$i][0]['name']; ?>','<?php echo $service[$i][0]['id']; ?>','<?php echo $provider_name[$i][0]['id']; ?>')" class="btn btn-warning" style="width:100%;"> Reschedule </a></td>

                        <?php
                        } else if($Price[$i][0]['Status']=="succeeded"){ 
                            ?>
                          <td><a href="javascript:void(0)" onclick="cancel_appointment_stripe('<?php echo $history[$i]['hash']; ?>','<?php echo $history[$i]['Order_id']; ?>','<?php echo $Price[$i][0]['Banktxnid']; ?>','refundoff')" class="btn btn-danger" style="width:100%;"> Cancel </a></td>
                  <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>
   
<?php
                        }
                        else{
?>
   <td><button  class="btn btn-warning" style="width:100%;"> Booked </button></td>
  <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>

<?php

                        }
                    }
                    else{
                        
                   ?>
                   <td><button  class="btn btn-success" style="width:100%;"> Completed </button></td>
                   <td><button  class="btn btn-warning" style="width:100%;" disabled> Reschedule </button></td>

                   <?php
                        
                    }
                   ?>

                </tr>
                
                <?php  }  }  ?>
            </table></center>
              
            </div>

            <div class="mt-2">
                <small>
                    Powered by
                    <a href="https://gravitykey.com">Gravitykey</a>
                </small>
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

<script>
    var GlobalVariables = {
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        appointmentData: <?= json_encode($appointment_data) ?>,
        providerData: <?= json_encode($provider_data) ?>,
        customerData: <?= json_encode($customer_data) ?>,
        serviceData: <?= json_encode($service_data) ?>,
        companyName: <?= json_encode($company_name) ?>,
        googleApiKey: <?= json_encode(config('google_api_key')) ?>,
        googleClientId: <?= json_encode(config('google_client_id')) ?>,
        googleApiScope: 'https://www.googleapis.com/auth/calendar'
    };

    var EALang = <?= json_encode($this->lang->language) ?>;
</script>

<script src="<?= asset_url('assets/js/frontend_book_success.js') ?>"></script>
<script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>

<?php google_analytics_script() ?>
</body>
</html>
<script>
    function cancel_appointment(hash,oid,amountstatus){
        var token=$('#token').val();
       var del=confirm("Are you sure you want to cancel..?");
       if(del==true){
            window.location='cancel_refund/'+hash+'/'+oid+'/'+amountstatus;
       }else{
          
       }
       
    }


    function cancel_appointment_stripe(hash,oid,refid,amountstatus){
        var token=$('#token').val();
       var del=confirm("Are you sure you want to cancel..?");
       if(del==true){
            window.location='cancel_refund_stripe/'+hash+'/'+oid+'/'+refid+'/'+amountstatus;
       }else{
          
       }
       
    }

    function modify_appointment(hash,oid,proname,service,id,pid){
        var token=$('#token').val();
       var del=confirm("Are you sure you want to Reschedule..?");
       if(del==true){
            window.location='appointment_reschedule/'+hash+'/'+oid+'/'+proname+'/'+service+'/'+id+'/'+pid;
       }
       
    }
</script>
