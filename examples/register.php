<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Employee
//---------------------------------
$ein    = rand(10, 99) . '-' . rand(1000000, 9999999);
$result = $api->post(
    'register',
    [
        'first_name'   => "John",
        'last_name'    => "Doe",
        "email"        => "johndoe+$ein@gmail.com",
        "phone"        => "619-555-5555",
        "ein"          => $ein,
        "website"      => "https://google.com",
        "company_name" => "Test $ein",
        'address'      => "123 Street",
        'city'         => "New York",
        'state'        => "New York",
        'zipcode'      => "92000",
        'for_profit'   => true,
    ]
);

print_r(json_encode($result, JSON_PRETTY_PRINT));
