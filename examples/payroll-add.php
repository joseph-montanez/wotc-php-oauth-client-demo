<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Add Payroll
//---------------------------------
$result = $api->post(
    'hours-wages',
    [
        'employee_id' => 1,
        'start_date'  => '2018-01-01',
        'total_hours' => '650',
        'total_wages' => '14000',
    ]
);

print_r($result);

$payroll_id = $result['id'];

//---------------------------------
//-- Update Payroll
//---------------------------------
$result = $api->put(
    'hours-wages/' . $payroll_id,
    [
        'total_wages' => '15000',
    ]
);

print_r($result);
