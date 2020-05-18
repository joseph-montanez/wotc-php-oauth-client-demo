<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- List All Employees
//---------------------------------
//$result = $api->get('user/dump-token');
$result = $api->post('employees/lookup', ['first_name' => 'Joseph', 'last_name' => 'Montanez']);
//$result = $api->get('employees/wotc/certified');

print_r($result);
