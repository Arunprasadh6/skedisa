
<?php include('header.php'); ?>
<style>
    a.promo-video__btn.promo-video__btn--desktop {
    margin-top: -57px;
}
.features__list {    
    display: flex;  
}
/* .main-section {
    padding-top: 15px;
} */
@media only screen and (max-width:767px) {
    .features__list {    
    display: block;  
}
/* @media only screen and (min-width:1024px) and (max-width:1400px) {
   .main-section {
    padding-top: 15px;
}
} */
</style>
<main>
        <section id="top" class="dot-nav--section  main-section ">
    <div class="shadow-box shadow"></div>

   

    <div class="container">
        <div class="main-section--pd">
            <div class="items-wrapper">
                <div class="items-row">
                    <div class="items-row--item">
                        <div class="content-part">

                            <h1 class="title title--h1">
                                Online Booking System <span class="divider"></span>
                        for <span class="highlight">all service based industries</span>
                            </h1>

                            <p class="p p--secondary">
                                Simply define your services and providers, display their availability, and you will have clients both old and new making bookings 24/7.
                            </p>

                            <div class="btn-bar">
    <div class="btn-row">
        <a href="<?php echo base_url('/customers'); ?>" class="btn btn--primary btn-icon-left fa-user">
            Get a Free Account
        </a>
                  
            </div>
    <span class="cursive "><i class="arrow"></i> No credit card needed</span>

</div>

                        </div>
                    </div>
                </div>
                <div class="items-row items-row--image">
                    <div class="items-row--item">
                        <div class="header_devices">
                            <div class="device">
                                 <picture>
                                     <img src="<?php echo asset_url('assets/build/images/skedis_bg.png');  ?>" />
                                        <a class="promo-video__btn promo-video__btn--desktop" data-toggle="modal" data-target="#modal__video-promo--short">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" class="promo-video__btn-icon svg-inline--fa fa-play fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
                                        </a>                                 
                                    </picture>                            
                                <div class="animation chat">
                                    <img src="<?php echo asset_url('assets/build/images/main-page/Simply-gif2.a887b18c.svg'); ?>" alt="devices">
                                    <a class="social-links"
                                    href="#more-bookings"
                                    title=""> Multiple channels
                                    </a>
                                </div>
                             </div>   
                        </div>
                                            </div>

                                                                                                                    </div>
            </div>
        </div>
    </div>


</section>



    <section id="features" class="dot-nav--section section">
    <div class="container">
        <header class="features__header">
            <div class="phantom-item"></div>
            <h2 class="features__title title title--h2">Our <span class="highlight">Features</span></h2>
            <div class="tab-switcher--header features-tab-switch">
              
            </div>
        </header>

        <div class="wrap-tabs features--tabs">
            <div class="tab--item features--tab-item tab-features--list-main in">
                <ul class="features__list features--list-main">
                    <li>
                        <picture>
                            <img width="100" height="100"
                                    src="<?php echo asset_url('assets/build/images/icons/features/static/icon_bookings.4081ac5d.svg') ?>"
                                    data-lazy-src="<?php echo asset_url('assets/build/images/icons/features/static/icon_bookings.4081ac5d.svg') ?>"
                                    data-hover="<?php echo asset_url('assets/build/images/icons/features/icon_bookings.6e5806e6.gif'); ?>"
                                    data-static="<?php echo asset_url('assets/build/images/icons/features/static/icon_bookings.4081ac5d.svg'); ?>"
                                    alt="Bookings icon"/>
                        </picture>
                        <div class="features__content">
                            <h3 class="title title--h3 has-subtitle">Accept online bookings</h3>
                            <p class="p p--secondary p--small">Your own mobile-optimised <a href="booking-page-themes.html" target="_blank">booking website</a> or <a href="accept-bookings-on-website-or-facebook.html" target="_blank">integration with your existing site</a>. Also, accept bookings directly via <a href="facebook-instagram-bookings.html" target="_blank">Facebook, Instagram, Google</a> or your own <a href="app_client-app_admin-app.html" target="_blank">branded client app</a>.</p>
                        </div>
                    </li>
                    <li>
                        <picture>
                            <img width="100" height="100"
                                 src="<?php  echo asset_url('assets/build/images/icons/features/static/icon_sms.4d4b47d0.svg'); ?>"
                                 data-lazy-src="<?php  echo asset_url('assets/build/images/icons/features/static/icon_sms.4d4b47d0.svg'); ?>"
                                    data-hover="<?php  echo asset_url('assets/build/images/icons/features/icon_sms.fe026585.gif'); ?>"
                                    data-static="<?php  echo asset_url('assets/build/images/icons/features/static/icon_sms.4d4b47d0.svg'); ?>"
                                    alt="SMS icon"/></picture>
                        <div class="features__content">
                            <h3 class="title title--h3 has-subtitle">Notifications via SMS/Email</h3>
                            <p class="p p--secondary p--small">Reminders to staff and clients whenever appointments are booked, cancelled or rescheduled. With push notifications on your mobile for new booking information via the admin app.</p>
                        </div>
                    </li>
                   
                    <li>
                        <picture><img width="100" height="100"
                                      src="<?php echo asset_url('assets/build/images/icons/features/static/icon_payment.790dae82.svg'); ?>"
                                      data-lazy-src="<?php echo asset_url('assets/build/images/icons/features/static/icon_payment.790dae82.svg'); ?>" data-hover="<?php echo asset_url('assets/build/images/icons/features/icon_payment.206e0fac.gif'); ?>" data-static="<?php echo asset_url('assets/build/images/icons/features/static/icon_payment.790dae82.svg'); ?>" alt="Payment icon"/></picture>
                        <div class="features__content">
                            <h3 class="title title--h3 has-subtitle">Accept Payments</h3>
                            <p class="p p--secondary p--small">Accept online payments & deposits through a <a href="accept-payments-through-your-booking-page.html" target="_blank">range of payment processors</a> like PayPal, Stripe and more or accept cash or card onsite via our POS system.</p>
                        </div>
                    </li>
                    <li>
                        <picture><img width="100" height="100"
                                      src="<?php echo asset_url('assets/build/images/icons/features/static/icon_api.2ba09bbb.png'); ?>"
                                      data-lazy-src="<?php echo asset_url('assets/build/images/icons/features/static/icon_api.2ba09bbb.png'); ?>"
                                      data-hover="<?php echo asset_url('assets/build/images/icons/features/icon_api.125e3029.gif'); ?>"
                                      data-static="<?php echo asset_url('assets/build/images/icons/features/static/icon_api.2ba09bbb.png'); ?>" alt="API icon"/></picture>
                        <div class="features__content">
                            <h3 class="title title--h3 has-subtitle">Integration &amp; API</h3>
                            <p class="p p--secondary p--small">Facebook, Instagram, Google My Business native integration, Wordpress and other CMS systems or use our API to build your own custom integrations. <a href="integrations.html" target="_blank">See all integrations</a></p>
                        </div>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>       
    </section> 
    </main>
    <div class="modal modal--video fade sb-video-modal in" id="modal__video-promo--short" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal__header">
                <h4 class="modal__header-title title title--h3">Skedisa Booking Video </h4>
                <button type="button" class="modal__close" data-dismiss="modal" aria-label="Close">
                  X
                </button>
            </div>

            <div class="modal__body modal__body--video">
                <div class="modal__content">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls autoplay  >
                        <source src="<?php echo asset_url('assets/build/images/skedisa_video.mp4'); ?>"  type="video/ogg">
                        </video>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
  