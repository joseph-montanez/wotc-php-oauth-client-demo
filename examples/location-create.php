<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Location Multiple
//---------------------------------
$result = $api->post(
    'locations',
    [
        'locations' => [
            [
                "name"            => "HR Office",
                "description"     => "Down in east port",
                "code"            => "O-221",
                "label"           => "O221",
                "phone"           => "619-555-5555",
                "address_street"  => "123 Street",
                "address_street2" => "PO BOX 22",
                "address_city"    => "New York",
                "address_state"   => "NY",
                "address_county"  => "NY County",
                "address_zipcode" => "92300",
            ],
            [
                "name"            => "HR Office",
                "description"     => "Down in east port",
                "code"            => "O-221",
                "label"           => "O221",
                "phone"           => "619-555-5555",
                "address_street"  => "123 Street",
                "address_street2" => "PO BOX 22",
                "address_city"    => "New York",
                "address_state"   => "NY",
                "address_county"  => "NY County",
                "address_zipcode" => "92300",
            ]
        ],
    ]
);
print_r($result);
$location_id = $result['locations'][0]['id'];

//---------------------------------
//-- Create Location Single
//---------------------------------
$result = $api->post(
    'locations',
    [
        'location' => [
            "name"            => "HR Office",
            "description"     => "Down in east port",
            "code"            => "O-221",
            "label"           => "O221",
            "phone"           => "619-555-5555",
            "address_street"  => "123 Street",
            "address_street2" => "PO BOX 22",
            "address_city"    => "New York",
            "address_state"   => "NY",
            "address_county"  => "NY County",
            "address_zipcode" => "92300",
        ],
    ]
);
print_r($result);
$location_id = $result['locations'][0]['id'];

//---------------------------------
//-- Create Location Single - Submit only required fields.
//---------------------------------
$result = $api->post(
    'locations',
    [
        'location' => [
            "name"         => "HR Office", // Instead of name you can use "code"
            "phone"        => "619-555-5555",
            "address_city" => "New York",
            "address_state"   => "NY",
            "address_zipcode" => "92300",
        ],
    ]
);
print_r($result);
$location_id = $result['locations'][0]['id'];
