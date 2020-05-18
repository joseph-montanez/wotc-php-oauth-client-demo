<?php

require_once __DIR__ . '/config.php';

$api = get_api();
$faker = Faker\Factory::create();

//---------------------------------
//-- Create Employee
//---------------------------------
$ein    = rand(10, 99) . '-' . rand(1000000, 9999999);
$result = $api->post(
    'register',
    [
        'first_name'   => $faker->firstName,
        'last_name'    => $faker->lastName,
        "email"        => $faker->email,
        "phone"        => "619-555-5555",
        "ein"          => $ein,
        "website"      => "https://google.com",
        "company_name" => $faker->company,
        'address'      => $faker->streetAddress,
        'city'         => "New York",
        'state'        => "New York",
        'zipcode'      => $faker->postcode,
        'for_profit'   => true,
    ]
);

print_r(json_encode($result, JSON_PRETTY_PRINT));
