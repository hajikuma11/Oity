<?php
$json = file_get_contents('opi.json');
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);


$messsageData = [
    'type' => 'flex',
    'altText' => 'flexmessage',
    'contents' => $arr
];