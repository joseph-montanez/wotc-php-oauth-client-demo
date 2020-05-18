<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- List All Wages and Hours
//---------------------------------
$result = $api->get('employees/2581/hours-wages');

print_r($result);
