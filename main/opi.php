<?php
$json = file_get_contents(__DIR__.'/opi.json');
//$json = json_decode($json,true);
$json = preg_replace("/( |　)/","",$json);

$messageData = [
    'type' => 'flex',
    'altText' => 'flexmessage',
    'contents' => $json
];