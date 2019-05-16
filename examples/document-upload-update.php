<?php

require_once __DIR__ . '/config.php';

$api = get_api();

//---------------------------------
//-- Upload a document
//---------------------------------
$data   = file_get_contents(__DIR__ . '/composer.phar');
$result = $api->post(
    'documents/upload',
    $data,
    [
        'Content-Type' => 'application/json',
        'Content-Length' => strlen($data),
    ],
    false
);

print_r($result);
$document_id = $result['id'];

//---------------------------------
//-- Update a document
//---------------------------------
$result = $api->put(
    'documents/' . $document_id,
    [
        'name' => 'composer.phar',
        'document_type' => '8850',
    ],
    [
        'Content-Type' => 'application/json',
    ]
);
print_r($result);


////---------------------------------
////-- List documents
////---------------------------------
//$result = $api->get('documents');
//
//print_r($result);