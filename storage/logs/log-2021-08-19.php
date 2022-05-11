<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-19 08:59:41 --> Severity: Warning --> file_get_contents(): Unable to find the wrapper &quot;https&quot; - did you forget to enable it when you configured PHP? C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-08-19 08:59:41 --> Severity: Warning --> file_get_contents(https://instantalerts.co/api/web/send?apikey=3933232g02l37672h82fb79pcp8h68943f8&amp;sender=SKEDIS&amp;to=917871651556&amp;message=Dear+Customer%2C+your+appointment+with+BJH+Tiruchirappalli+is+confirmed+at+27-08-2021+12%3A20+PM++-+SKEDIS): failed to open stream: No such file or directory C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-08-19 08:59:43 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-08-19 08:59:43 --> #0 C:\xampp\htdocs\skedisa\application\libraries\Notifications.php(111): EA\Engine\Types\Type->__construct('')
#1 C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php(343): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\core\CodeIgniter.php(532): Backend_api->ajax_save_appointment()
#3 C:\xampp\htdocs\skedisa\index.php(341): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2021-08-19 09:00:27 --> Severity: Warning --> file_get_contents(): Unable to find the wrapper &quot;https&quot; - did you forget to enable it when you configured PHP? C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-08-19 09:00:27 --> Severity: Warning --> file_get_contents(https://instantalerts.co/api/web/send?apikey=3933232g02l37672h82fb79pcp8h68943f8&amp;sender=SKEDIS&amp;to=917871651556&amp;message=Dear+Customer%2C+your+appointment+with+BJH+Tiruchirappalli+is+confirmed+at+26-08-2021+01%3A00+PM++-+SKEDIS): failed to open stream: No such file or directory C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 599
ERROR - 2021-08-19 09:00:27 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-08-19 09:00:27 --> #0 C:\xampp\htdocs\skedisa\application\libraries\Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php(343): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\core\CodeIgniter.php(532): Backend_api->ajax_save_appointment()
#3 C:\xampp\htdocs\skedisa\index.php(341): require_once('C:\\xampp\\htdocs...')
#4 {main}
