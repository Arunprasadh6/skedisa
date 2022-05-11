
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<script src="<?= asset_url('assets/js/backend_services_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_categories_helper.js') ?>"></script>

<style>
   .small-box {
    border-radius: .25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
    .small-box>.inner {
    padding: 10px;
    color:white;
}
.icon>i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}
.small-box .icon>i {
    font-size: 67px;
    position: absolute;
    right: 15px;
    top: 7px;
    transition: -webkit-transform .3s linear;
    transition: transform .3s linear;
    transition: transform .3s linear,-webkit-transform .3s linear;
}
</style>
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

  
   
</script>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
      google.charts.load('current', {packages: ['corechart','bar']});  
</script>     
<div class="container-fluid backend-page" id="services-page">
<ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#services" data-toggle="tab">
                Charts
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#categories" data-toggle="tab">
               Send Email to Customer
            </a>
        </li>
    </ul>

    <div class="tab-content">

        <!-- SERVICES TAB -->

        <div class="tab-pane active" id="services">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-8">
              

                    <h3>Dashboard</h3>
                    <div class="data">
                        
           
                        
                    </div>
                </div>
                
                <div class="record-details column col-12 col-md-10"> 
                    <div class="row">
                           <div class="col-lg-4 col-6">            
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $appointment_cnt[0]['total']; ?></h3>
                                            <p>Booked Appointments</p>
                                        </div>
                                            <div class="icon">
                                            <i class="ion ion-calendar"></i>
                                            
                                        </div>
                
                                    </div>
                            </div>

                            <div class="col-lg-4 col-6">            
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?php echo $service_cnt[0]['total']; ?></h3>
                                            <p>Services</p>
                                        </div>
                                            <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                
                                    </div>
                            </div>

                            <div class="col-lg-4 col-6">            
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?php echo $user_cnt[0]['total']; ?></h3>
                                            <p>User Registrations</p>
                                        </div>
                                            <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                
                                    </div>
                            </div>
                    </div>   
                    <br>
                    <br>
                    <div class="row">
                            <div class="col-md-6">
                                 <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
                                 </div>        
                            </div>
                            <div class="col-md-6">
                                    <div id = "container_do" style = "width: 550px; height: 400px; margin: 0 auto">
                                    </div>
                            </div>
                    </div>

                    
                   
                </div>
            </div>
        </div>

        <!-- CATEGORIES TAB -->
                <div class="tab-pane" id="categories">
                    <div class="row">
                        <div class="col-md-8">
                               <textarea id="subject" name="subject">

                               </textarea>
                                    <script>
                                        CKEDITOR.replace('subject');
                                    </script>
                        </div>                        
                    </div><br>   
                    <button id="sd-mail" class="btn btn-primary">Send Email</button>             
                </div>


    </div>
</div>

<script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Month', 'Booked appointments'],
               <?php foreach($chart_cnt as $row){ ?>
                [ "<?php echo substr($row['month'],0,3); ?>",  <?php echo $row['total']; ?>],
                <?php } ?>               
              
            ]);

            var options = {title: 'Booked Appointments'};  

            // Instantiate and draw the chart.
            var chart = new google.charts.Bar(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
         var token=GlobalVariables.csrfToken;
        
         
         $("#sd-mail").on("click",function(){
             
                var sub=CKEDITOR.instances.subject.getData();               
                $.post('<?php echo base_url("backend/send_email_customer"); ?>',{
                'csrfToken':token,
                "Subject":sub
                },function(data){
            console.log(data);
                })
                
         });


         function drawChart_donut() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Services');
            data.addColumn('number', 'Percentage');
            <?php foreach($services as $row){ ?>
                data.addRows([
               ["<?php echo $row['name']; ?>",<?php echo $row['price']; ?>]              
            ]);
                <?php } ?>
           
               
            // Set chart options
            var options = {
               'title':'Services',
               'width':550,
               'height':400,
               is3D:true
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('container_do'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart_donut);

      </script>