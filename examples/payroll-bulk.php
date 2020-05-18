<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------------------------------
//-- Add Bulk Payroll - Minimum requirements
// This is the minimum requirements for bulk entry
//---------------------------------------------------------
$result = $api->put(
    'hours-wages/bulk', [
            [
                'ssn' => '8605',
//                'employee_id' => '22',
                'total_hours' => '650',
                'total_wages' => '14000',
                'override' => true,
            ]
    ]
);

print_r($result);

//$payroll_id = $result['id'];
//
////---------------------------------
////-- Update Payroll
////---------------------------------
//$result = $api->put(
//    'hours-wages/' . $payroll_id,
//    [
//        'total_wages' => '15000',
//    ]
//);
//
//print_r($result);
