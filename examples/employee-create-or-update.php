<?php

require_once __DIR__ . '/config.php';

$api = get_api();
$faker = Faker\Factory::create();

$employee_ids = [];


//---------------------------------
//-- Create employee
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
    "dob"        => $dob->format('m/d/Y'),
    "applied_on" => $now->format('m/d/Y'),
    "started_on" => $now->format('m/d/Y'),
    "ssn"        => $ssn,
];
echo print_r($data), PHP_EOL;
$result = $api->put('employees', $data);
var_dump($result['id']);
$employee_id = $result['id'];
$employee_ids[] = $result['id'];
exit;


$expected = [
    'last_name' => true,
    'first_name' => true,
    'email' => false,
    'phone' => false,
    'dob' => false,
    'ssn' => true,
];

$diffChanges = [
//    'last_name'  => function () use ($faker) {
//        return $faker->lastName;
//    },
//    'first_name' => function () use ($faker) {
//        return $faker->firstName;
//    },
    'email'      => function () use ($faker) {
        return $faker->email;
    },
    'phone'      => function () use ($californiaAreaCodes, $faker) {
        $phone_area = '(' . $faker->randomElement($californiaAreaCodes) . ') ';
        $phone_prefix = $faker->numberBetween(100, 999);
        $phone_suffix = $faker->numberBetween(1000, 9999);
        return $phone_area . $phone_prefix . '-' . $phone_suffix;
    },
    'dob'        => function () use ($faker) {
        return $faker->dateTimeBetween('-60 years', '-18 years')
            ->format('m/d/Y');
    },
    'ssn' => function () use ($faker) {
        return $faker->numberBetween(222, 999) . '-'
            . $faker->numberBetween(22, 99) . '-'
            . $faker->numberBetween(2222, 9999);
    }
];

foreach ($diffChanges as $key => $callable) {
    if ($expected[$key]) {
        echo 'Testing ' . $key . ', this should result in a different record', PHP_EOL;
    } else {
        echo 'Testing ' . $key . ', this should result in the same record', PHP_EOL;
    }
    $dataChange = $data;
    $before = $data[$key];
    $value = $callable();
    $dataChange[$key] = $value;
    echo "Changing $key from $before to $value\n";
    echo print_r($dataChange), PHP_EOL;
    $changedResult = $api->put('employees', $dataChange);
    if (in_array($changedResult['id'], $employee_ids, true) === $expected[$key]) {
        echo "\t", 'failed - ', $changedResult['id'], PHP_EOL;
    } else {
        $employee_ids[] = $changedResult['id'];
        echo "\t", 'success - ', $changedResult['id'], PHP_EOL;
    }
}
