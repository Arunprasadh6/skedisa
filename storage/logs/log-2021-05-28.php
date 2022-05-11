<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-28 03:43:24 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-28 03:43:24 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-28 03:48:53 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 03:48:53 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 03:49:49 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-05-28 03:49:49 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-05-28 03:49:49 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-05-28 03:49:49 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-05-28 03:49:49 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-05-28 04:35:48 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-28 04:35:48 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Backend_api.php(318): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Backend_api->ajax_save_appointment()
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#4 {main}
ERROR - 2021-05-28 06:09:51 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-05-28 06:09:51 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-05-28 06:09:51 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-05-28 06:09:51 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-05-28 06:09:51 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-05-28 08:56:40 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-28 09:15:13 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 09:15:13 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 09:25:15 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-28 09:45:45 --> Severity: Notice --> Undefined index: orgid /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/book.php 7
ERROR - 2021-05-28 09:45:48 --> Severity: Notice --> Undefined index: orgid /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/book.php 7
ERROR - 2021-05-28 09:53:55 --> Severity: Notice --> Undefined index: site /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/customer/login.php 211
ERROR - 2021-05-28 10:25:10 --> Severity: Notice --> Array to string conversion /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customermodel.php 123
ERROR - 2021-05-28 10:55:11 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('Prakash David', 'prakash.david@gmail.com', 'password-1', '2243818462', '345 Prospect av', 'Hackensack', '07601', '55', 'America/New_York', '30', '232', 'english', '3')
ERROR - 2021-05-28 10:58:07 --> Severity: Notice --> Undefined index: site /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/customer/login.php 211
ERROR - 2021-05-28 10:58:18 --> Severity: Notice --> Undefined index: orgid /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/book.php 382
ERROR - 2021-05-28 11:00:58 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 11:00:58 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 11:03:23 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 11:03:23 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 11:08:48 --> Severity: Notice --> Undefined index: site /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/customer/login.php 211
ERROR - 2021-05-28 11:12:05 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 11:12:05 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 11:14:28 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 11:14:28 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 11:17:01 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-05-28 11:17:01 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-28 11:22:39 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-28 11:22:39 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-28 11:23:51 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-28 11:23:51 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-28 11:51:48 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-28 11:51:48 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-28 12:10:15 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-28 12:10:15 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-28 12:41:51 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-28 13:09:00 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-28 13:16:19 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-05-28 13:16:19 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-05-28 13:16:19 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-05-28 13:16:19 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-05-28 13:16:19 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-05-28 13:17:06 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-05-28 13:17:06 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-05-28 13:17:06 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-05-28 13:17:06 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-05-28 13:17:06 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-05-28 13:20:22 --> Severity: Notice --> Undefined index: TXNDATE /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 45
