<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Update Webhook
//---------------------------------
$result = $api->get('sftp?per_page=1');
print_r($result);