<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Employee
//---------------------------------
$result = $api->post(
    'employees',
    [
        'first_name' => "John",
        'last_name'  => "Doe",
        "email"      => "johndoe@gmail.com",
        "phone"      => "619-555-5555",
        "ssn"        => "1234",
        "started_on" => "11/1/2018",
        "dob"        => "1980-01-01",
    ]
);
print_r($result);
$employee_id = $result['id'];

//---------------------------------
//-- Create Employee - With Address
//---------------------------------
$result2 = $api->post(
    'employees',
    [
        'first_name'      => "John",
        'last_name'       => "Apple",
        "email"           => "johnapple@gmail.com",
        "phone"           => "619-555-1234",
        "ssn"             => "2234",
        "started_on"      => "11/10/2018",
        "dob"             => "1981-01-01",
        "address_street"  => "123 Street",
        "address_street2" => "Apt 16",
        "address_city"    => "Vista",
        "address_state"   => "CA",
        "address_county"  => "San Diego",
        "address_zipcode" => "92083",
    ]
);
print_r($result2);
$employee_id2 = $result2['id'];
