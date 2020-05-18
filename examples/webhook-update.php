<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Update Webhook
//---------------------------------
$result = $api->put(
    'webhooks/4',
    [
        "secret" => "tiptap",
    ]
);
print_r($result);