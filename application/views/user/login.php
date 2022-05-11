<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">
    <title><?= lang('login') ?> | Gravitykey </title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/login.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">

    

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <style>
    .login {
        margin-top: 30%;
        padding: 0px 80px 0px 80px;
    }

    input.btn-login {
        color: white;
        background-color: #4e49d6;
        border: none;
        border-radius: 8px;
        width: 100%;
        padding: 7px;
        margin-top: 15px;

    }

    .btn-sig {

        color: #8a8b8b;
        background-color: #f6f8fa;
        border: none;
        border-radius: 8px;
        width: 100%;
        padding: 7px;
        margin-top: 15px;
        text-align: center;
    }
    .inpt{
        border-radius:10px;
    }
    </style>
    <script>
        var GlobalVariables = {
            csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
            baseUrl: <?= json_encode($base_url) ?>,
            destUrl: <?= json_encode($dest_url) ?>,
            AJAX_SUCCESS: 'SUCCESS',
            AJAX_FAILURE: 'FAILURE'
        };

        var EALang = <?= json_encode($this->lang->language) ?>;

        var availableLanguages = <?= json_encode(config('available_languages')) ?>;

        $(function () {
            GeneralFunctions.enableLanguageSelection($('#select-language'));
        });
    </script>
</head>
<body>
<!-- <div id="login-frame" class="frame-container">
    <h2><?php //echo "Appointment Administration"; ?></h2>
    <p><? //echo "Welcome! You will need to login in order to view appointment pages"; ?></p>
    <hr>
    <div class="alert d-none"></div>
    <form id="login-form">
        <div class="form-group">
            <label for="username"><?// lang('username') ?></label>
            <input type="text" id="username"
                   placeholder="<?php //echo "Enter your username"; ?>"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password"><? //lang('password') ?></label>
            <input type="password" id="password"
                   placeholder="<?php //echo "Enter your password"; ?>"
                   class="form-control"/>
        </div>

        <div class="form-group">
            <button type="submit" id="login" class="btn btn-primary">
                <i class="fas fa-sign-in-alt mr-2"></i>
                <?// lang('login') ?>
            </button>
        </div>

        <a href="<?= site_url('user/forgot_password') ?>" class="forgot-password">
            <?// lang('forgot_your_password') ?></a>
        |
        <span id="select-language" class="badge badge-success">
              <?// ucfirst(config('language')) ?>
            </span>

        <div class="mt-4">
            <small>
                Powered by
                <a href="https://gravitykey.com">Gravitykey</a>
            </small>
        </div>
    </form>
</div> -->

<div class="col-md-12">
            <div class="row" style="background:white">
                <div class="col-md-7" style="padding-left:1px">
                    <img style="height: 100vh" class="img-responsive" width="100%"
                        src="<?php echo asset_url('assets/img/login_page.jpeg'); ?>" />
                </div>
                <div class="col-md-5">
               
                    <form id="login-form">
                    
                    <div class="login">
                    <!-- Name@Domain.com E-mail -->                    
                        <h4 style="color:#4e49d6;margin-bottom: 31px;font-weight:700;">Login</h4>
                        <div class="alert d-none"></div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username"  placeholder="Username"
                                class="form-control inpt" />
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" id="password"  placeholder="password"
                                class="form-control inpt" />
                        </div>
                        <div class="form-group">
                            <input type="submit" id="login" value="Login" class="btn-login" />
                        </div>
                        <span style="margin-left:33%;color:#4e49d6;font-weight:500;"><b><a style="color:#4e49d6" href="<?= site_url('user/forgot_password') ?>">Forgot Password?</a></b></span>
                        <div class="form-group">
                        <label class="btn-sig">Don't have an account? <span style="color:#4e49d6"><a style="color:#4e49d6" href="<?= site_url('user/register') ?>">Sign up</a></span></label>
                    </div>
                </div>
                   
    </form>
                </div>
            </div>


        </div>

<script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
<script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
<script src="<?= asset_url('assets/js/login.js') ?>"></script>
</body>
</html>
