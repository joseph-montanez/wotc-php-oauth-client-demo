<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Webhook
//---------------------------------
$result = $api->delete('webhooks/349');
print_r($result);