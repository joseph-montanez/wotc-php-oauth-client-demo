<?php

require_once __DIR__ . '/config.php';

$api = get_api();
//---------------------------------
//-- Update Single
//---------------------------------
$result = $api->put(
    'locations',
    [
        'location' => [
            "id"              => 87, // This is required
            "name"            => "HR Office2", // The fields to update
        ],
    ]
);
print_r($result);
$location_id = $result['locations'][0]['id'];
