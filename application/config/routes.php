<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "DIYS";
$route['login'] = 'DIYS/login_page';
$route['register'] = "DIYS/register_page";
$route['browse'] = 'DIYS/browse';
$route['add_kit'] = 'DIYS/add_kit_page';
$route['dashboard'] = 'DIYS/admin_dashboard';
$route['404_override'] = '';

//end of routes.php