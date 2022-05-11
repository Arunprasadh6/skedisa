<?php include('function.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head> 
 
     <title> 
Best ortho hospital in trichy 
     </title> 

<!--index.php?route=checkout/confirm/getnumber-->
<!--Template Health-->
 
<!----> 
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content = "ortho in trichy, ortho clinic in trichy, bone and joint, ortho hospital in trichy, ortho doctor in trichy">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css"> 
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" type="text/css" />

<style>
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        } 
        body {
            top: 0px !important; 
        }
        .goog-logo-link {
            display:none !important;
        }
        .trans-section {
            margin: 100px;
        }
        .lang{
            position:fixed;
            top:14px;
            
        }
        .paddingtop{
                padding-top: 2%;
        }
#owl > .owl-dots{
    top:385px;
}
.section-img1{
        background-size: cover;
    padding-top: 100px;
    /*padding-bottom: 150px;*/
    width: 100%;
}
.mgt{
    margin-top:85px;
}
      
    </style> 
</head>

<body >

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>

 
 <!-- HEADER -->
     <header>
          <div class="container container1">
               <div class="row">
                    <div class="col-md-1 col-sm-5">
                         <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand logod">
                    <!--<i class="fa fa-h-square"></i>Bone and Joint Hospital-->
                    <img src="./images/bone-and-joint-logo.png" class="img-responsive logosd" alt="bone and joint hospital" />
                    </a>
                    </div>
                    <div class="col-md-3 col-sm-5">
                        <?php echo getheaderContent(); ?>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                        <?php echo getheader(); ?>
                         <?php echo getday(); ?>
      
             <a href="#" onclick="translateLanguage1('English');">English </a>|<a href="#" onclick="translateLanguage1('Tamil');"> தமிழ்</a>
                    </div>

               </div>
          </div>
     </header>

     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
                 
                      
    
  <div class="container1">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <a href="index.php" class="navbar-brand logom" >
                    <!--<i class="fa fa-h-square"></i>Bone and Joint Hospital-->
                    <img src="./images/bone-and-joint-logo.png" class="img-responsive logos" alt="bone and joint hospital" />
                    </a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php  echo getnavbar(); ?>
                        
                         <li style="display:block" onclick="send()" class="appointment-btn"><a  href="javascript:void(0)">Make an appointment</a></li>
                        <li  style="display:none" class="appointment-btn"><a data-toggle="modal" data-target="#myModal"  href="javascript:void(0)">Cancel an appointment</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="<?php echo $_SESSION['navbar'][0]; ?>" class="slider" style="display: <?php echo ($_SESSION['flag'][0] == 1) ? 'block' : 'none'; ?>" data-stellar-background-ratio="1" data-target=".navbar-collapse" data-offset="50">
          <div class="container">
               <div class="row">
                         <div class="owl-carousel owl-theme">
                             <?php echo getBanner(); ?>
                         </div>
               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="<?php echo $_SESSION['navbar'][1]; ?>" style="display: <?php echo ($_SESSION['flag'][1] == 1) ? 'block' : 'none'; ?>" data-stellar-background-ratio="1"  class="paddingtop">
          <div class="container">
               <div class="row" id="About1">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                             <h2 class='wow fadeInUp' data-wow-delay='0.6s'><?php echo $_SESSION['title'][0]; ?></h2>
                             <?php echo content(); ?>
                         </div>
                    </div>
                      <div class="col-md-6 col-sm-12" >
                         <div class="about-info">
                             
                          <img src="./admin/images/About/<?php echo $_SESSION['aboutimg']; ?>" alt="Bone and joint hospital" class="section-img1">
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>
<br>
 <!-- ABOUT -->
     <section id="<?php echo $_SESSION['navbar'][2]; ?>" class="slider1 paddingtop" style="display: <?php echo ($_SESSION['flag'][2] == 1) ? 'block' : 'none'; ?>" data-stellar-background-ratio="1" >
          <div class="container" >
               <div class="row" id="Service1">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                             <h2 class='wow fadeInUp' data-wow-delay='0.6s'><?php echo $_SESSION['title'][1]; ?></h2>
                             <?php echo getservice(); ?>
                         </div>
                    </div>
                     <div class="col-md-6 col-sm-12">
                       <div class="paddingtop">
                             <div class="owl-carousel owl-theme mgt" id="owl">
                             <?php echo getserviceimg(); ?>
                            
                         </div>
                         </div>
                    </div>
                    
                    
               </div>
          </div>
     </section>
     
      <section id="<?php echo $_SESSION['navbar'][3]; ?>" class="paddingtop" style="display: <?php echo ($_SESSION['flag'][3] == 1) ? 'block' : 'none'; ?>">
          <div class="container">
               <div class="row" id="Insurance1">

                    <div class="col-md-12 col-sm-12">
                         <div class="about-info">
                             <h2 class='wow fadeInUp' data-wow-delay='0.6s'><?php echo $_SESSION['title'][2]; ?></h2>
                             <?php echo getinsurance(); ?>

                             
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>

     <!-- TEAM -->
     <section id="<?php echo $_SESSION['navbar'][4]; ?>" data-stellar-background-ratio="1" class="paddingtop" style="display: <?php echo ($_SESSION['flag'][4] == 1) ? 'block' : 'none'; ?>">
          <div class="container">
               <div class="row" id="Doctor1">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s"><?php echo $_SESSION['title'][3]; ?></h2>
                         </div>
                    </div>

                    <div class="clearfix"></div>
                    <?php echo getDoctor(); ?>
                    
               </div>
                <br>
               <br>
          </div>
     </section>


     <!-- NEWS -->
     <section id="<?php echo $_SESSION['navbar'][5]; ?>" data-stellar-background-ratio="2.5" class="paddingtop" style="display: <?php echo ($_SESSION['flag'][5] == 1) ? 'block' : 'none'; ?>">
          <div class="container">
               <div class="row" id="News1">

                    <div class="col-md-12 col-sm-12">
                        
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2><?php echo $_SESSION['title'][4]; ?></h2>
                         </div>
                    </div>
                        <?php echo getnews(); ?>
               </div>
               <br>
               <br>
          </div>
     </section>


     <!-- MAKE AN APPOINTMENT -->
     <!--<section id="appointment" data-stellar-background-ratio="3">-->
     <!--     <div class="container">-->
     <!--          <div class="row">-->

     <!--               <div class="col-md-6 col-sm-6">-->
     <!--                    <img src="images/appointment-image.jpg" class="img-responsive" alt="">-->
     <!--               </div>-->

     <!--               <div class="col-md-6 col-sm-6">-->
                         <!-- CONTACT FORM HERE -->
     <!--                    <form id="appointment-form" role="form" method="post" action="#">-->

                              <!-- SECTION TITLE -->
     <!--                         <div class="section-title wow fadeInUp" data-wow-delay="0.4s">-->
     <!--                              <h2>Make an appointment</h2>-->
     <!--                         </div>-->

     <!--                         <div class="wow fadeInUp" data-wow-delay="0.8s">-->
     <!--                              <div class="col-md-6 col-sm-6">-->
     <!--                                   <label for="name">Name</label>-->
     <!--                                   <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">-->
     <!--                              </div>-->

     <!--                              <div class="col-md-6 col-sm-6">-->
     <!--                                   <label for="email">Email</label>-->
     <!--                                   <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">-->
     <!--                              </div>-->

     <!--                              <div class="col-md-6 col-sm-6">-->
     <!--                                   <label for="date">Select Date</label>-->
     <!--                                   <input type="date" name="date" value="" class="form-control">-->
     <!--                              </div>-->

     <!--                              <div class="col-md-6 col-sm-6">-->
     <!--                                   <label for="select">Select Department</label>-->
     <!--                                   <select class="form-control">-->
     <!--                                        <option>General Health</option>-->
     <!--                                        <option>Cardiology</option>-->
     <!--                                        <option>Dental</option>-->
     <!--                                        <option>Medical Research</option>-->
     <!--                                   </select>-->
     <!--                              </div>-->

     <!--                              <div class="col-md-12 col-sm-12">-->
     <!--                                   <label for="telephone">Phone Number</label>-->
     <!--                                   <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">-->
     <!--                                   <label for="Message">Additional Message</label>-->
     <!--                                   <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>-->
     <!--                                   <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>-->
     <!--                              </div>-->
     <!--                         </div>-->
     <!--                   </form>-->
     <!--               </div>-->

     <!--          </div>-->
     <!--     </div>-->
     <!--</section>-->


     <!-- GOOGLE MAP 
      -->     
	<section id="<?php echo $_SESSION['navbar'][6]; ?>" class="paddingtop" style="display: <?php echo ($_SESSION['flag'][6] == 1) ? 'block' : 'none'; ?>">
	
   
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7879453090727!2d78.67731000647359!3d10.827533749670268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf5980481d8bb%3A0xc99e9318ff7be0a!2sBone%20and%20Joint%20Hospital!5e0!3m2!1sen!2sin!4v1619598997513!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	    
	<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15675.172823339091!2d78.6790075!3d10.8271316!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc99e9318ff7be0a!2z4K6O4K6y4K-B4K6u4K-N4K6q4K-BIOCuruCuseCvjeCuseCvgeCuruCvjSDgrq7gr4Lgrp_gr43grp_gr4Eg4K6u4K6w4K-B4K6k4K-N4K6k4K-B4K614K6u4K6p4K-I!5e0!3m2!1sta!2sus!4v1563936100096!5m2!1sta!2sus" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen>-->
	</iframe>
	</section> 
	
	
	<div class="container">
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel Booking</h4>
        </div>
        <div class="modal-body">
            <label>Check Your Email or SMS to get Orderid</label>
         <input type="number" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" id="orderid" class="form-control" placeholder="Enter Your Order Id" />
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-info" onclick="cancel()" data-dismiss="modal">Appointment Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
	
	
    <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp contact" data-wow-delay="0.4s"><?php echo $_SESSION['title'][5]; ?></h4>
                              <?php echo getcontact(); ?>
                             
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp news" data-wow-delay="0.4s"><?php echo $_SESSION['title'][6]; ?></h4>
                              <?php echo getlatestnews(); ?>
                             
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp hour" data-wow-delay="0.4s"><?php echo $_SESSION['title'][7]; ?></h4>
                                   <?php echo getHours(); ?>
                                  
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-6 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; <?php echo date('Y'); ?> Bone & Joint Hospital 
                                   | Design: <a href="https://www.gravitykey.com" target="_parent">Gravitykey</a></p>
                              </div>
                         </div>
                         <div class="col-md-4 col-sm-6">
                              <div class="footer-link"> 
                                   <!--<a href="#">Laboratory Tests</a>-->
                                   <!--<a href="#">Departments</a>-->
                                   <!--<a href="#">Insurance Policy</a>-->
                                   <!--<a href="#">Careers</a>-->
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script>
        function send(){
            var url=document.URL;
            window.location="https://gravitykey.com/skedisa/customers/userlogin/30/";
             
         }
         
         function cancel(){
             var id=document.getElementById('orderid').value;
             $.post("https://gravitykey.com/skedtest/index.php?route=checkout/confirm/cancel", {
         pid:id,
   
  }, function(data) {

    alert(data);
    document.getElementById('orderid').value="";

  })

}
         
         
     </script>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
         <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js" type="text/javascript"></script>
    

<script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
        }

        function translateLanguage(lang) {
            googleTranslateElementInit();
            var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
        }

  function translateLanguage1(lang) {
      $.post('lang.php',{lang:lang},function(data){
          var d=JSON.parse(data);
       console.log(d);
         var c=$('.nav li').length-2;
        var s=1;
         for(var i=0;i<c;i++){
             
            $('.nav li:nth-child('+s+') a').html(d['nav'][i]); 
         s++;
         }
         $('.headercontent').html(d['header'][0]); 
        
        //title
        $('#About1 .about-info h2').html(d['title'][0]); 
        $('#Service1 .about-info h2').html(d['title'][1]); 
        $('#Insurance1 .about-info h2').html(d['title'][2]); 
        $('#Doctor1 .about-info h2').html(d['title'][3]); 
        $('#News1 .about-info h2').html(d['title'][4]); 
        
        $('footer .contact').html(d['title'][5]); 
        $('footer .news').html(d['title'][6]); 
        $('footer .hour').html(d['title'][7]);  
        
        
        
         
           $('#About .about-info div').html(d['content'][0]);
           $('#About .about-info figcaption h3').html(d['content'][1]);
           $('#About .about-info figcaption p').html(d['content'][2]);

         
           $('#Services .about-info div').html(d['service'][0]); 

           
           $('#Insurance .about-info div').html(d['insurance'][0]); 
           
          
           $('#address').html(d['contactus'][0]);
           
           $('.opening-hours p:nth-child(2)').html("<span>"+d['hours'][0]+" - "+d['hours'][1]+"</span><span>"+d['hours'][2]+" - "+d['hours'][3]+"</span>"); 
     

        $('.opening-hours p:nth-child(3)').html("<span>"+d['hours'][4]+"</span><span>"+d['hours'][5]+" - "+d['hours'][6]+"</span>"); 
        $('.opening-hours p:nth-child(4)').html("<span>"+d['hours'][7]+"</span><span>"+d['hours'][8]+" </span>"); 
        $('.opening-hours p:nth-child(5)').html("<span>"+d['hours'][9]+"</span><span>"+d['hours'][10]+"</span>"); 
    

      });
  }

        $(function(){
            $('.selectpicker').selectpicker();
        });
    </script>
 <script src="js/jquery.sticky.js"></script>

</body>
</html>