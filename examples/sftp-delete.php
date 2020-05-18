<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Update Webhook
//---------------------------------
$result = $api->post('sftp/12/delete');
print_r($result);