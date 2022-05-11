<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-06 11:42:27 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-07-06 11:42:27 --> #0 C:\xampp\htdocs\skedisa\application\libraries\Notifications.php(96): EA\Engine\Types\Type->__construct('')
#1 C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php(343): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\core\CodeIgniter.php(532): Backend_api->ajax_save_appointment()
#3 C:\xampp\htdocs\skedisa\index.php(341): require_once('C:\\xampp\\htdocs...')
#4 {main}
ERROR - 2021-07-06 11:42:44 --> Severity: Warning --> file_get_contents(): Unable to find the wrapper &quot;https&quot; - did you forget to enable it when you configured PHP? C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 598
ERROR - 2021-07-06 11:42:45 --> Severity: Warning --> file_get_contents(https://instantalerts.co/api/web/send?apikey=3933232g02l37672h82fb79pcp8h68943f8&amp;sender=SKEDIS&amp;to=916456546546&amp;message=Your+appointment+will+be+delayed+by+2+hour%28s%29+at+the+clinic.+Apologies+for+the+inconvenience.+Appreciate+your+patience%21): failed to open stream: No such file or directory C:\xampp\htdocs\skedisa\application\controllers\Backend_api.php 598
