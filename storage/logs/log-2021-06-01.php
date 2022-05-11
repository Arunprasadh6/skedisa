<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-01 07:47:48 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-06-01 07:47:48 --> Query error: Column 'password' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `password`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-06-01 08:00:46 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-06-01 08:00:46 --> Query error: Column 'password' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `password`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-06-01 08:05:37 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 153
ERROR - 2021-06-01 08:05:37 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 155
ERROR - 2021-06-01 08:09:01 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 08:09:01 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(144): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 08:12:13 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-06-01 08:12:13 --> Query error: Column 'password' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `password`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-06-01 08:17:06 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 153
ERROR - 2021-06-01 08:17:06 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 155
ERROR - 2021-06-01 08:17:20 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 153
ERROR - 2021-06-01 08:17:20 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 155
ERROR - 2021-06-01 08:18:05 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 153
ERROR - 2021-06-01 08:18:05 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 155
ERROR - 2021-06-01 08:54:27 --> Severity: error --> Exception: Class 'PaytmChecksum' not found /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/refund.php 25
ERROR - 2021-06-01 09:06:33 --> Severity: Compile Error --> Cannot use "self" when no class scope is active /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/encdec_paytm.php 258
ERROR - 2021-06-01 09:07:42 --> Severity: error --> Exception: Class 'PaytmChecksum' not found /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/refund.php 25
ERROR - 2021-06-01 09:09:02 --> Severity: 8192 --> Non-static method PaytmChecksum::generateSignature() should not be called statically /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/refund.php 25
ERROR - 2021-06-01 09:09:02 --> Severity: error --> Exception: Call to undefined function generateSignatureByString() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/encdec_paytm.php 263
ERROR - 2021-06-01 09:09:58 --> Severity: 8192 --> Non-static method PaytmChecksum::generateSignature() should not be called statically /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/paytm/refund.php 25
ERROR - 2021-06-01 09:09:58 --> Severity: 8192 --> Non-static method PaytmChecksum::generateSignatureByString() should not be called statically /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/encdec_paytm.php 261
ERROR - 2021-06-01 09:09:58 --> Severity: error --> Exception: Call to undefined method PaytmChecksum::generateRandomString() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/encdec_paytm.php 277
ERROR - 2021-06-01 09:31:37 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 144
ERROR - 2021-06-01 09:32:27 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 145
ERROR - 2021-06-01 09:34:15 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 75
ERROR - 2021-06-01 09:34:15 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 336
ERROR - 2021-06-01 09:38:58 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 75
ERROR - 2021-06-01 09:44:07 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 75
ERROR - 2021-06-01 09:44:10 --> Severity: Notice --> Undefined index: ORDER_ID /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 45
ERROR - 2021-06-01 09:44:10 --> Severity: Notice --> Undefined index: INDUSTRY_TYPE_ID /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 47
ERROR - 2021-06-01 09:44:10 --> Severity: Notice --> Undefined index: CHANNEL_ID /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 48
ERROR - 2021-06-01 09:44:10 --> Severity: Notice --> Undefined index: PRICE /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 49
ERROR - 2021-06-01 09:44:10 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 75
ERROR - 2021-06-01 09:44:42 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 75
ERROR - 2021-06-01 09:55:22 --> Severity: error --> Exception: Call to undefined function getChecksumFromArray() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php 75
ERROR - 2021-06-01 09:55:22 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 336
ERROR - 2021-06-01 09:57:13 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 09:57:13 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 10:00:10 --> Severity: error --> Exception: Call to undefined function generateSignature() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 75
ERROR - 2021-06-01 10:00:43 --> Severity: Notice --> Use of undefined constant PAYTM_MERCHANT_MID - assumed 'PAYTM_MERCHANT_MID' /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 54
ERROR - 2021-06-01 10:00:43 --> Severity: error --> Exception: Call to undefined function generateSignature() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 74
ERROR - 2021-06-01 10:00:59 --> Severity: error --> Exception: Call to undefined function generateSignature() /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 74
ERROR - 2021-06-01 10:07:41 --> Severity: Notice --> Undefined variable: checksum /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 79
ERROR - 2021-06-01 10:30:30 --> Severity: error --> Exception: Class 'PaytmChecksum' not found /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 60
ERROR - 2021-06-01 10:31:21 --> Severity: error --> Exception: Class 'PaytmChecksum' not found /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 60
ERROR - 2021-06-01 10:31:32 --> Severity: error --> Exception: Class 'PaytmChecksum' not found /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm_refund.php 60
ERROR - 2021-06-01 10:35:01 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-06-01 10:35:01 --> Query error: Column 'password' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `password`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-06-01 10:35:29 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 336
ERROR - 2021-06-01 10:35:42 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 10:35:42 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 10:39:39 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:39:39 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:39:39 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:39:39 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:39:39 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:40:26 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 10:40:26 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:40:26 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:40:26 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:40:26 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:40:26 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:40:31 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 10:40:31 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:40:31 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:40:31 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:40:31 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:40:31 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:40:46 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:40:46 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:40:46 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:40:46 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:40:46 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:40:52 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:40:52 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:40:52 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:40:52 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:40:52 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:41:04 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:41:04 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:41:04 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:41:04 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:41:04 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:46:12 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:46:12 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:46:12 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:46:12 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:46:12 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:46:50 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:46:50 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:46:50 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:46:50 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:46:50 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:51:24 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:51:24 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:51:24 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:51:24 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:51:24 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:51:51 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:51:51 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:51:51 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:51:51 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:51:51 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:53:11 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:53:11 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:53:11 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:53:11 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:53:11 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:54:04 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:54:04 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:54:04 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:54:04 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:54:04 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 10:54:48 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 10:54:48 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 10:54:48 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 10:54:48 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 10:54:48 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:00:38 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 11:00:38 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:00:38 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:00:38 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:00:38 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:00:38 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:00:46 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 11:00:46 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:00:46 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:00:46 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:00:46 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:00:46 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:01:08 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 11:01:08 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:01:08 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:01:08 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:01:08 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:01:08 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:01:23 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 11:01:23 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:01:23 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:01:23 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:01:23 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:01:23 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:01:48 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Appointments.php 993
ERROR - 2021-06-01 11:01:48 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:01:48 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:01:48 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:01:48 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:01:48 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:02:31 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:02:31 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:02:31 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:02:31 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:02:31 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:05:16 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 11:05:16 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 11:05:56 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:05:56 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:05:56 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:05:56 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:05:56 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:06:27 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:06:27 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:06:27 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:06:27 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:06:27 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:06:28 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:06:28 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:06:28 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:06:28 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:06:28 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:14:00 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 336
ERROR - 2021-06-01 11:14:11 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 11:14:11 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 11:15:59 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:15:59 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:15:59 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:15:59 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:15:59 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:20:32 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:20:32 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:20:32 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:20:32 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:20:32 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:20:46 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:20:46 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:20:46 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:20:46 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:20:46 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:26:18 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 11:26:18 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 11:31:32 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 11:31:32 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 11:36:06 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-06-01 11:42:30 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 11:42:30 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 11:43:12 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:43:12 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:43:12 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:43:12 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:43:12 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:44:17 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 11:44:17 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 11:44:33 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 11:44:33 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 11:44:33 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 11:44:33 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 11:44:33 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 11:58:49 --> Severity: Notice --> Undefined variable: dest_url /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/user/login.php 26
ERROR - 2021-06-01 12:11:08 --> Severity: Notice --> Undefined offset: 0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php 63
ERROR - 2021-06-01 12:11:08 --> Query error: Column 'password' cannot be null - Invalid query: INSERT INTO `ea_users` (`id`, `first_name`, `MRN`, `email`, `password`, `mobile_number`, `phone_number`, `address`, `city`, `state`, `zip_code`, `userid`, `notes`, `timezone`, `Organization`, `Order_id`, `language`, `id_roles`) VALUES (NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2021-06-01 12:12:04 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 351
ERROR - 2021-06-01 12:12:32 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 12:12:32 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 12:23:35 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 12:23:35 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 12:23:35 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 12:23:35 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 12:23:35 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 12:23:46 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 12:23:46 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 12:23:46 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 12:23:46 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 12:23:46 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 12:24:15 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 12:24:15 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 12:24:15 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 12:24:15 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 12:24:15 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 12:25:00 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 351
ERROR - 2021-06-01 12:27:34 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 12:27:34 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:10:34 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:10:34 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:12:52 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:12:52 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(85): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:15:22 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:15:22 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:15:22 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:15:22 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:15:22 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:16:00 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 351
ERROR - 2021-06-01 13:16:18 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:16:18 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:16:47 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:17:17 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:17:17 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:17:17 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:17:17 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:17:17 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:17:40 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 351
ERROR - 2021-06-01 13:20:06 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:20:06 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:20:31 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:20:31 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:20:31 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:20:31 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:20:31 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:20:47 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:20:47 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:20:47 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:20:47 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:20:47 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:24:13 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:24:13 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(85): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:24:55 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:24:55 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:24:55 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:24:55 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:24:55 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:26:44 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:26:44 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:26:44 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:26:44 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:26:44 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:27:23 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 351
ERROR - 2021-06-01 13:27:38 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:27:38 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:28:37 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:28:37 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(85): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:31:37 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:31:37 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(85): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:32:13 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:32:13 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:32:13 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:32:13 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:32:13 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:32:42 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:32:42 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:32:42 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:32:42 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:32:42 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
ERROR - 2021-06-01 13:33:00 --> Severity: Notice --> Undefined index: password /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Customers_model.php 351
ERROR - 2021-06-01 13:33:15 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-06-01 13:33:15 --> #0 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/libraries/Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/models/Paytm_model.php(199): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/controllers/Paytm.php(149): Paytm_model->Store_payment(Array)
#3 /home/u616935663/domains/gravitykey.com/public_html/skedisa/vendor/codeigniter/framework/system/core/CodeIgniter.php(532): Paytm->get_response()
#4 /home/u616935663/domains/gravitykey.com/public_html/skedisa/index.php(341): require_once('/home/u61693566...')
#5 {main}
ERROR - 2021-06-01 13:33:31 --> Severity: Notice --> Undefined variable: appointment_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 103
ERROR - 2021-06-01 13:33:31 --> Severity: Notice --> Undefined variable: provider_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 104
ERROR - 2021-06-01 13:33:31 --> Severity: Notice --> Undefined variable: customer_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 105
ERROR - 2021-06-01 13:33:31 --> Severity: Notice --> Undefined variable: service_data /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 106
ERROR - 2021-06-01 13:33:31 --> Severity: Notice --> Undefined variable: company_name /home/u616935663/domains/gravitykey.com/public_html/skedisa/application/views/appointments/payment_history.php 107
