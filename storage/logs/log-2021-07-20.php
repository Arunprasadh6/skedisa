<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-20 04:27:00 --> EA\Engine\Types\Type: Invalid argument value provided ()
ERROR - 2021-07-20 04:27:00 --> #0 C:\xampp\htdocs\skedisa\application\libraries\Notifications.php(148): EA\Engine\Types\Type->__construct('')
#1 C:\xampp\htdocs\skedisa\application\controllers\Customers.php(50): Notifications->send_register('', 'gravityname', 'Hospital No.4')
#2 C:\xampp\htdocs\skedisa\vendor\codeigniter\framework\system\core\CodeIgniter.php(532): Customers->register()
#3 C:\xampp\htdocs\skedisa\index.php(341): require_once('C:\\xampp\\htdocs...')
#4 {main}
