<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Employee
//---------------------------------
$result = $api->post(
    'employees',
    [
        'first_name'  => "John",
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
