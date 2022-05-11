<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <style>
    .login {
        margin-top: 30%;
        padding:25px;
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
</head>

<body>
    <div class="">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-responsive" width="100%"
                        src="<?php echo asset_url('assets/img/login_page.jpeg'); ?>" />
                </div>
                <div class="col-md-5">
                    <div class="login">
                        <h4 style="color:#4e49d6;margin-bottom: 31px;font-weight:700;">Login</h4>
                        <div class="form-group">
                            <label for="username">E-mail</label>
                            <input type="text" id="fname" name="fname" placeholder="Name@Domain.com"
                                class="form-control inpt" />
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" id="fname" name="fname" placeholder="password"
                                class="form-control inpt" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login in" class="btn-login" />
                        </div>
                        <span style="float:right;color:#4e49d6;font-weight:500;"><b>Forget Password?</b></span>
                        <div class="form-group">
                        <label class="btn-sig">Don't have an account? <span style="color:#4e49d6">Sign up</span></label>
                    </div>
                    </div>
                   

                </div>
            </div>


        </div>


    </div>


</body>
<script src="<?php echo asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>

</html>