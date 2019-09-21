<?php

require_once __DIR__ . '/config.php';

$api = get_api();

$result = $api->get('employees/2606/wotc/url');

echo '<pre>', var_dump($result), '</pre>'; exit;
