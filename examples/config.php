<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set('memory_limit', '1024G');
//memory

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
    $api->setAccessToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZTUyNDA1YjM0ZTQ1YmUwNjE3NjBlMmE0MzU2YTUyOWZlZWVkN2FhY2YzODUyZGFmMWJiZjYwYzA0NDE0YzdiNGFmNzY3N2I1MmQ5NDk1In0.eyJhdWQiOiIzIiwianRpIjoiZTFlNTI0MDViMzRlNDViZTA2MTc2MGUyYTQzNTZhNTI5ZmVlZWQ3YWFjZjM4NTJkYWYxYmJmNjBjMDQ0MTRjN2I0YWY3Njc3YjUyZDk0OTUiLCJpYXQiOjE1ODA4OTY5NjUsIm5iZiI6MTU4MDg5Njk2NSwiZXhwIjoxNjEyNTE5MzY1LCJzdWIiOiI1MDUiLCJzY29wZXMiOltdfQ.c5a5Rnm0cnH-Ef-pAZww0fL8p6fhcRnL-8nXUhoE9GSR7ap0U-bGlZWvCuzFIVGwp7kPN2fl_X0X91qDwsNc5N04U51859TzuLHwrm_ud55E3WDisPLLWld2Bf1VJ3bNDbRfSSNXs3fPNO0tvzLV2S64ta3XDIqgzcraQKMTkpxLOqI3t7OnTsLJeduFOEtW2FVJd0sc1OG8mKCc3ZcaxvWvDvUdNUMomCP3EdaZMVvKnU609QSbOrx3wWyB6Lu5GeNTfSrGjQW8hOlGfo51NSWmJPx9_ZnC4vKO4H1dM6Wf7TWbXaSLtmfafsT6DTVZ43W80s4zvrVm81b9sXXHSn2HNl8s_HnTnV0I_7q-XWJfHK9hxy7umr4JIc779srRef2GNtzKchorosSqinm91HomqFgP4Vu4s436SmfUOtTLDVw9S-I16KM8yM4d_VlzTse5nnKox1DHRa-z3KzrckeveJY1sFg5WYwUt0qy5rnvAolqmvPpLKt5bEwV79LeHsV1eBvozJHSyfmfGGCRctejMjH3OTEQQyTi-da7udjyaMAjD1P0yRyw3I5Nd9DSVZM9n-vOn7rfAhRl0hKV8SKenOJuNNHrLIT0wIoq9ufnsqTTBBwCq1bqYu3cn7cb4-jTwM1kMMamYK43FIo4yvQOyOqcI-k8NVn6t72g4mc');

    return $api;
}
