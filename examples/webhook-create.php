<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Webhook
//---------------------------------
$result = $api->post(
    'webhooks',
    [
        "payload_url" => "http://example.com/integration",
        "content_type" => "json",
        "secret" => "tiptap",
        "active" => true,
        'events' => ['wotc-status'],
//        'events' => 'wotc-status'
    ]
);
print_r($result);