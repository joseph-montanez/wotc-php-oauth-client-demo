<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Webhook
//---------------------------------
$result = $api->post(
    'sftp',
    [
        "name" => "demo",
        "host" => "example.wotc.com",
        "port" => 22,
        "username" => "example",
        "password" => "password123",
        "interval" => 10,
//        'events' => 'wotc-status'
    ]
);
print_r($result);