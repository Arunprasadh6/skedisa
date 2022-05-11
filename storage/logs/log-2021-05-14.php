<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-14 03:40:26 --> Severity: Notice --> Use of undefined constant console - assumed 'console' /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Customers.php 78
ERROR - 2021-05-14 03:40:26 --> Severity: Warning --> log() expects parameter 1 to be float, string given /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Customers.php 78
ERROR - 2021-05-14 09:16:46 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-14 09:16:46 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 10:49:51 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-14 10:53:51 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-14 10:54:02 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-14 13:59:36 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 59
ERROR - 2021-05-14 13:59:36 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-14 14:24:51 --> Query error: Column 'TXNid' cannot be null - Invalid query: INSERT INTO `ea_Payment` (`Order_id`, `TXNid`, `Amount`, `Payment_mode`, `Currency`, `TXNDate`, `Status`, `Respcode`, `Respmsg`, `Gatway_name`, `Banktxnid`, `Bank_name`) VALUES ('81', NULL, '0.00', NULL, 'INR', NULL, 'TXN_FAILURE', '308', 'Invalid Txn Amount', NULL, '', NULL)
ERROR - 2021-05-14 14:27:57 --> EA\Engine\Types\Type: Invalid argument value provided (hussainmohamed@@gravitykey.com)
ERROR - 2021-05-14 14:27:57 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(111): EA\Engine\Types\Type->__construct('hussainmohamed@...')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 15:52:23 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-14 15:52:23 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 15:53:06 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 93
ERROR - 2021-05-14 15:53:06 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 94
ERROR - 2021-05-14 15:53:06 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 95
ERROR - 2021-05-14 15:53:06 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 96
ERROR - 2021-05-14 15:53:06 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 97
ERROR - 2021-05-14 16:04:07 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-14 16:04:07 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 16:04:53 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 93
ERROR - 2021-05-14 16:04:53 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 94
ERROR - 2021-05-14 16:04:53 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 95
ERROR - 2021-05-14 16:04:53 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 96
ERROR - 2021-05-14 16:04:53 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 97
ERROR - 2021-05-14 16:22:30 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-14 16:22:30 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 16:24:18 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-14 16:24:18 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 16:46:25 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 93
ERROR - 2021-05-14 16:46:25 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 94
ERROR - 2021-05-14 16:46:25 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 95
ERROR - 2021-05-14 16:46:25 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 96
ERROR - 2021-05-14 16:46:25 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 97
ERROR - 2021-05-14 16:48:51 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 59
ERROR - 2021-05-14 16:48:51 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-05-14 16:50:58 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-14 16:50:58 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(194): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-14 16:51:29 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 153
ERROR - 2021-05-14 16:51:29 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 155
ERROR - 2021-05-14 16:52:01 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 93
ERROR - 2021-05-14 16:52:01 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 94
ERROR - 2021-05-14 16:52:01 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 95
ERROR - 2021-05-14 16:52:01 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 96
ERROR - 2021-05-14 16:52:01 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 97
ERROR - 2021-05-14 16:52:41 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 59
ERROR - 2021-05-14 16:52:41 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
