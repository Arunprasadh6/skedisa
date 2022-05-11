<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-30 06:13:43 --> Severity: Warning --> mysqli::real_connect(): MySQL server has gone away C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2021-07-30 06:13:44 --> Severity: Notice --> Undefined offset: 0 C:\xampp\htdocs\skedisa\application\controllers\Appointments.php 1158
ERROR - 2021-07-30 06:20:40 --> Severity: error --> Exception: Call to undefined function openssl_encrypt() C:\xampp\htdocs\skedisa\application\libraries\encdec_paytm.php 7
ERROR - 2021-07-30 06:22:18 --> Severity: error --> Exception: Call to undefined function openssl_encrypt() C:\xampp\htdocs\skedisa\application\libraries\encdec_paytm.php 7
ERROR - 2021-07-30 06:24:45 --> Severity: Warning --> file_get_contents(): Unable to find the wrapper &quot;https&quot; - did you forget to enable it when you configured PHP? C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-07-30 06:24:45 --> Severity: Warning --> file_get_contents(https://instantalerts.co/api/web/send?apikey=3933232g02l37672h82fb79pcp8h68943f8&amp;sender=SKEDIS&amp;to=919677694044&amp;message=Dear+Customer%2C+your+appointment+with+BJH+Tiruchirappalli+is+confirmed+at+02-08-2021+11%3A00+AM++-+SKEDIS): failed to open stream: No such file or directory C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-07-30 06:24:46 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-07-30 06:24:46 --> #0 C:\xampp\htdocs\skedisa\application\libraries\Notifications.php(85): EA\Engine\Types\Type->__construct('')
#1 C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php(343): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\core\CodeIgniter.php(532): Backend_api->ajax_save_appointment()
#3 C:\xampp\htdocs\skedisa\index.php(341): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2021-07-30 06:28:43 --> Severity: Warning --> file_get_contents(): Unable to find the wrapper &quot;https&quot; - did you forget to enable it when you configured PHP? C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-07-30 06:28:43 --> Severity: Warning --> file_get_contents(https://instantalerts.co/api/web/send?apikey=3933232g02l37672h82fb79pcp8h68943f8&amp;sender=SKEDIS&amp;to=917871651556&amp;message=Dear+Customer%2C+your+appointment+with+BJH+Tiruchirappalli+is+confirmed+at+02-08-2021+12%3A00+PM++-+SKEDIS): failed to open stream: No such file or directory C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-07-30 06:28:43 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-07-30 06:28:43 --> #0 C:\xampp\htdocs\skedisa\application\libraries\Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php(343): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\core\CodeIgniter.php(532): Backend_api->ajax_save_appointment()
#3 C:\xampp\htdocs\skedisa\index.php(341): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2021-07-30 13:53:26 --> Severity: Notice --> Undefined variable: dest_url C:\xampp\htdocs\skedisa\application\views\user\login.php 26
