<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-06 03:13:02 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 03:13:02 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 03:13:02 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 03:13:02 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 03:13:02 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
ERROR - 2021-05-06 03:15:08 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 03:15:08 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 03:15:08 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 03:15:08 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 03:15:08 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
ERROR - 2021-05-06 03:19:29 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-06 03:19:29 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(159): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-06 03:45:01 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 03:56:17 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 04:22:18 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 24
ERROR - 2021-05-06 04:22:18 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-06 04:24:33 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-06 04:24:33 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(159): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-06 05:38:03 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 05:41:36 --> Query error: Unknown column 'id_users' in 'where clause' - Invalid query: SELECT *
FROM `ea_users`
WHERE `id_users` != '118'
AND `phone_number` = '0431276270'
AND `Organization` = '30'
ERROR - 2021-05-06 05:43:36 --> Query error: Unknown column 'id_users' in 'where clause' - Invalid query: SELECT *
FROM `ea_users`
WHERE `id_users` != '29'
AND `phone_number` = '9884598845'
AND `Organization` = '1'
ERROR - 2021-05-06 06:02:57 --> Query error: Unknown column 'id_users' in 'where clause' - Invalid query: SELECT *
FROM `ea_users`
WHERE `id_users` != '104'
AND `phone_number` = '9444532063'
AND `Organization` = '30'
ERROR - 2021-05-06 06:03:27 --> Query error: Unknown column 'id_users' in 'where clause' - Invalid query: SELECT *
FROM `ea_users`
WHERE `id_users` != '226'
AND `phone_number` = '1234567890'
AND `Organization` = '1'
ERROR - 2021-05-06 06:12:55 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 06:15:56 --> EA\Engine\Types\Type: Invalid argument value provided (hussainmohamed@@gravitykey.com)
ERROR - 2021-05-06 06:15:56 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(111): EA\Engine\Types\Type->__construct('hussainmohamed@...')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(159): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-06 06:16:12 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 76
ERROR - 2021-05-06 06:16:12 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 77
ERROR - 2021-05-06 06:16:12 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 78
ERROR - 2021-05-06 06:16:12 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 79
ERROR - 2021-05-06 06:16:12 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 80
ERROR - 2021-05-06 06:18:39 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 06:19:04 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 08:25:18 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-06 08:25:18 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(159): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-06 09:45:54 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 09:54:21 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-06 13:54:15 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 13:54:15 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 13:54:15 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 13:54:15 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 13:54:15 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
ERROR - 2021-05-06 13:55:11 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 13:55:11 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 13:55:11 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 13:55:11 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 13:55:11 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
ERROR - 2021-05-06 13:56:05 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 13:56:05 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 13:56:05 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 13:56:05 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 13:56:05 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
ERROR - 2021-05-06 14:02:49 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 14:02:49 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 14:02:49 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 14:02:49 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 14:02:49 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
ERROR - 2021-05-06 15:07:33 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 52
ERROR - 2021-05-06 15:07:33 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 53
ERROR - 2021-05-06 15:07:33 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 54
ERROR - 2021-05-06 15:07:33 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 55
ERROR - 2021-05-06 15:07:33 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 56
