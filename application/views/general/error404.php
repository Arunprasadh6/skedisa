<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#35A768">

    <title><?= lang('page_not_found') ?> | Gravitykey</title>

    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/error404.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/css/general.css') ?>">

  

    <script>
        var EALang = <?= json_encode($this->lang->language) ?>;
    </script>

    <script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/fontawesome/js/solid.min.js') ?>"></script>
    <script src="<?= asset_url('assets/ext/datejs/date.min.js') ?>"></script>
    <script src="<?= asset_url('assets/js/polyfill.js') ?>"></script>
    <script src="<?= asset_url('assets/js/general_functions.js') ?>"></script>
</head>
<body>
<div id="message-frame" class="frame-container">
    <h3><?= lang('page_not_found')
        . ' - ' . lang('error') . ' 404' ?></h3>
    <p>
        <?= lang('page_not_found_message') ?>
    </p>

    <a href="<?= site_url() ?>" class="btn btn-success btn-large" style="background-color:#4e49d6;border-color:#4e49d6;">
        <i class="fas fa-calendar-alt mr-2"></i>
        <?= lang('book_appointment_title') ?>
    </a>

    <a href="<?= site_url('backend/dashboard_admin') ?>" style="background-color:#4e49d6;border-color:#4e49d6;color:white" class="btn btn-outline-secondary btn-large">
        <i class="fas fa-wrench mr-2"></i>
        <?= lang('backend_section') ?>
    </a>

    <div class="mt-4">
        <small>
            Powered by
            <a href="https://gravitykey.com">Gravitykey</a>
        </small>
    </div>
</div>

<?php google_analytics_script() ?>
</body>
</html>
