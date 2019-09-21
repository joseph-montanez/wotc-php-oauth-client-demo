<?php

require_once __DIR__ . '/config.php';

$api = get_api();


//$result = $api->get('applicants/changes/wotc/status');
//
//print_r($result);


$result = $api->get(
    'applicants/changes/wotc/status?' . http_build_query(
        [
            'start_date' => (new DateTime('-2 weeks'))->format('Y-m-d'),
        ]
    )
);

print_r($result);
exit;



$result = $api->get(
    'applicants/changes/wotc/status?' . http_build_query(
        [
            'start_date' => (new DateTime('-1 weeks'))->format('Y-m-d'),
            'end_date' => (new DateTime('-6 days'))->format('Y-m-d'),
        ]
    )
);

print_r($result);




$result = $api->get(
    'applicants/changes/wotc/status?' . http_build_query(
        [
            'end_date' => (new DateTime('-6 days'))->format('Y-m-d'),
        ]
    )
);

print_r($result);




$result = $api->get(
    'applicants/changes/wotc/status?' . http_build_query(
        [
            'end_date' => 'Yes',
        ]
    )
);

print_r($result);
