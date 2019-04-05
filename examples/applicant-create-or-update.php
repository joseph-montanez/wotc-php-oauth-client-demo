<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Create Employee
//---------------------------------
$result = $api->put(
    'applicants',
    [
        'first_name' => "John",
        'last_name'  => "Doe",
        "email"      => "johndoe@gmail.com",
        "phone"      => "619-555-5555",
        "applied_on" => "11/1/2018",
    ]
);
print_r($result);
$employee_id = $result['id'];
print_r($employee_id);

