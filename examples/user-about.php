<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- List All Employees
//---------------------------------
$result = $api->get('user');

print_r($result);
