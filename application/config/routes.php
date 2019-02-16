<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/Index/index';
$route['admin/login'] = 'admin/Index/login';
$route['admin/logout'] = 'admin/Index/logout';
$route['admin/periode'] = 'admin/Periode/index';
$route['admin/usulan/(:any)'] = 'admin/usulan/index/$1';
$route['admin/password'] = 'admin/Index/password';

$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
