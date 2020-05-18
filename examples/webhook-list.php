<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Update Webhook
//---------------------------------
$result = $api->get(
    'webhooks'
);
print_r($result);