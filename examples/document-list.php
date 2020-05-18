<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- List documents
//---------------------------------
$result = $api->get('documents');

print_r($result);