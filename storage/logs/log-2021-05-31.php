<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-31 08:19:05 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-31 08:19:05 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-31 08:45:41 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-31 08:51:40 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-05-31 10:53:06 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-31 10:53:06 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-31 11:12:59 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'skravi512@gmail.com', 'admin@123', '6765747574', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:15:33 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'skravi125@gmail.com', 'admin@123', '8568568568', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:16:15 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', '', 'admin@123', '4365546563', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:17:12 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'skravi125@gmail.com', 'admin@123', '4656546547', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:18:42 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'suryakumar@gravitykey.com', 'admin@123', '3564673555', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:20:42 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'skravi125@gmail.com', 'admin@123', '6576583453', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:22:39 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'skravi125@gmail.com', 'admin@123', '7467686434', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:23:52 --> Query error: Unknown column 'passwd' in 'field list' - Invalid query: INSERT INTO `ea_duplicate_user` (`first_name`, `email`, `passwd`, `phone_number`, `address`, `city`, `zip_code`, `userid`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES ('surya', 'skravi125@gmail.com', 'admin@123', '6876867867', '', '', '', '55', 'Asia/Calcutta', '30', '249', 'english', '3')
ERROR - 2021-05-31 11:42:36 --> Query error: Unknown column 'ea_register.phone_number' in 'where clause' - Invalid query: SELECT *
FROM `ea_register`
WHERE `ea_register`.`phone_number` = '7987987988'
ERROR - 2021-05-31 11:43:12 --> Severity: error --> Exception: Call to protected method Customers_model::cregister() from context 'Appointments' /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 635
ERROR - 2021-05-31 11:43:54 --> Query error: Column count doesn't match value count at row 1 - Invalid query: Insert into ea_register values(NULL,'sandy','','sandy@gmail.com','7676aaafb027c825bd9abab78b234070e702752f625b752e55e55b48e607e358','7987987988','30',3)
ERROR - 2021-05-31 11:50:18 --> Severity: Notice --> Undefined index: TXNDATE /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/cancel.php 45
ERROR - 2021-05-31 11:52:29 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-31 11:52:29 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(198): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-31 11:57:08 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-05-31 11:57:08 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-05-31 11:57:08 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-05-31 11:57:08 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-05-31 11:57:08 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-05-31 12:00:46 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-31 12:00:46 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-31 12:07:33 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-31 12:07:33 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-05-31 12:08:18 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-05-31 12:08:18 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-05-31 12:08:18 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-05-31 12:08:18 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-05-31 12:08:18 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-05-31 12:09:46 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-05-31 12:09:46 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
