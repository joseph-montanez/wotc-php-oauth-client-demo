<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');

/**
 * Get the API class with configured data
 *
 * @return \Wotc\Api\Client\Api
 */
function get_api() {
    $api = new \Wotc\Api\Client\Api();
    $api->setEndpoint('sandbox.wotc.com/portal');
    $api->getProvider('2', 'IkjWRX5mdlrtZENvCSAl2UiNDFwE6XY7CkkPxDTP');
    //-- Lifetime Token
    $api->setAccessToken('INSERT TOKEN HERE');

    return $api;
}