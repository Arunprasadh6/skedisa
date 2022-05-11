<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <title>SkedisA</title>
    <meta name="description" content="Online booking system. Booking website or widget for your own website. Let clients schedule appointments, get reminders and pay online 24/7. Free version!">

    

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#06adef">
        <meta name="msapplication-navbutton-color" content="#06adef">
        <meta name="apple-mobile-web-app-status-bar-style" content="#06adef">     
        
        
       
          <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">   
            <link rel="stylesheet" href="<?php echo asset_url('assets/build/main.569ee873.css'); ?>">
            <link rel="stylesheet" href="<?php echo asset_url('assets/build/index_landing.7858bb55.css'); ?>">
     

    </head>
    <body class="">

    <header id='header' class='header '>
    <section class="header--settings-block">
        <div class="container header--settings-container">

            <button class="header--togg-menu" aria-label="Menu">
                <span class="hamburger-box">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
                <span class="txt-box">Menu</span>
            </button>

            <a href="<?php echo base_url('/customers/customer_login'); ?>" class="header--logo" title="SimplyBook">
               
                    <title>SkedisA</title>
                    <img src="<?php echo asset_url('assets/build/images/skedis.png') ?>" class="hdr-img" style="height:50px;width:auto" />
               
                            </a>

            <div class="header--user-block">
            <a class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" href="<?php echo base_url('/customers/customer_login'); ?>" >Home</a>
            <a class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" href="<?php echo base_url('/customers/plan'); ?>" >Plan</a>
            <a class="btn btn--transparent btn--login hide-on-mob" href="<?php echo base_url('/customers/customer_feature'); ?>">Features</a>
                                <a class="btn btn--transparent btn--login hide-on-mob" aria-label="Log in" href="<?php echo base_url('/customers'); ?>" >Log in</a>
                <a href="default/registration.html" class="btn btn--primary hide-on-mob" aria-label="Sign in">Sign up</a>
                                <button class="btn open-sub-menu-login-bar" aria-label="Profile" data-toggle="modal" data-target="#client-account-card">
                  
                </button>

               

            </div>
        </div>

    
    </section>

    <section class="header--navigation-block">
        <div class="container header--navigation-menu-container">
            <nav class="header--main-nav header--main-nav-mobile"> <!-- header--main-nav-desk -->
                <div class="header--main-nav-header">
                    <button class=" header--mob-togg-menu open" aria-label="Close">
                        X
                    </button>
                    <span class="mob--menu-name">Menu</span>
                </div>

                <ul class='main-nav--menu'>
    <li class="phantom-block"></li>
   
    <li class="menu--link-has-dropdown" data-submenu="m-features">
        <a class="menu--link" href="#">
            <span class="main-menu-icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="toolbox" class="svg-inline--fa ico fa-toolbox fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.63 214.63l-45.25-45.26c-6-6-14.14-9.37-22.63-9.37H384V80c0-26.47-21.53-48-48-48H176c-26.47 0-48 21.53-48 48v80H77.25c-8.49 0-16.62 3.37-22.63 9.37L9.37 214.63c-6 6-9.37 14.14-9.37 22.63V448c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32V237.25c0-8.48-3.37-16.62-9.37-22.62zM160 80c0-8.83 7.19-16 16-16h160c8.81 0 16 7.17 16 16v80H160V80zm320 368H32v-96h96v24c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-24h192v24c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-24h96v96zm-96-128v-24c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v24H160v-24c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v24H32v-82.75L77.25 192h357.49L480 237.25V320h-96z"></path></svg>
            </span>
            <span class="menu-link--text">Features</span>
            <span class="ico-sub-menu">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="angle-right" class="svg-inline--fa icon fa-angle-right fa-w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z"></path></svg>
            </span>
        </a>     
    </li>
 
</ul>
            </nav>
                      
                    </div>
    </section>
</header>