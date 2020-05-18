<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- List All Employees
//---------------------------------
$result = $api->get('employees/4129/wotc');

print_r($result);
