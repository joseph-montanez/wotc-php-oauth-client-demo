<?php
require_once __DIR__ . '/config.php';

$api = get_api();
$faker = Faker\Factory::create();

//---------------------------------
//-- Create Applicant
//---------------------------------
$californiaAreaCodes = [
    209, 213, 279, 310, 323, 341, 408, 415, 424, 442, 510, 530, 559, 562,
    619, 626, 628, 650, 657, 661, 669, 707, 714, 747, 760, 805, 818, 820,
    831, 858, 909, 916, 925, 949, 951
];

$phone_area = '(' . $faker->randomElement($californiaAreaCodes) . ') ';
$phone_prefix = $faker->numberBetween(222, 999);
$phone_suffix = $faker->numberBetween(2111, 9999);
$phone = $phone_area . $phone_prefix . '-' . $phone_suffix;
$dob = $faker->dateTimeBetween('-60 years', '-18 years');
$now = new DateTime();
$ssn = $faker->numberBetween(222, 999) . '-' . $faker->numberBetween(22, 99) . '-' . $faker->numberBetween(2222, 9999);
//$ssn = '11-111-1111';

var_dump($phone);

//-- Try with first put attempt, should be a new record
$data = [
    'first_name' => $faker->firstName,
    'last_name'  => $faker->lastName,
    "email"      => $faker->email,
    "phone"      => $phone,
//    "dob"        => $dob->format('m/d/Y'),
    "applied_on" => $now->format('m/d/Y'),
//    "started_on" => $now->format('m/d/Y'),
    "is_rehire"  => true,
    "ssn"        => $ssn,
];
echo print_r($data), PHP_EOL;
$result = $api->put('applicants', $data);
var_dump($result['id']);
$employee_id = $result['id'];

$result = $api->get(
    'employees/' . $employee_id . '/wotc/url?' . http_build_query(
        [
//            'redirect' => 'https://gmail.com',
            'DOB' => $dob->format('Y-m-d'),
            'Title' => 'Engineer',
            'StartingRate' => 22.20,
            'Rehire' => 1,
        ]
    )
);

echo '<pre>', var_dump($result), '</pre>';
exit;
