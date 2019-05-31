<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- List All Locations
//---------------------------------
$result = $api->get('locations');

print_r($result);
