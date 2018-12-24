<?php
$json = file_get_contents(__DIR__.'/opi.json');
//$txt = str_replace('{','[',$json);
//$txt = str_replace('}',']',$txt);
//$txt = str_replace('"',"'",$txt);
//$txt = str_replace("':","' =>",$txt);

$messageData = [
    'type' => 'flex',
    'altText' => 'flexmessage',
    'contents' => $json
];