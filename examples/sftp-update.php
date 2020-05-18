<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Update Webhook
//---------------------------------
$result = $api->put(
    'sftp/12',
    [
        "path" => "tiptap",
    ]
);
print_r($result);