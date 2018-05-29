<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['account/profile/([a-zA-Z]+).(\d+)'] = 'account/profile/$2/$1';
$route['account/profile/(:any)'] = 'path/to/404';
