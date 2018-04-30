<?php

$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

if ($message->{"text"} == '天気') {
    
    require_once('weather.php');
    
    $time = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
    
    $weather  = new Weather('osaka');
    $now    = $weather->GetCondition();
    $today   = $weather->GetToday();
    
    $messageData = [
        'type' => 'text',
        'text' =>  $message  = '('
           $time->format('m/d H:i')
          ')'
           PHP_EOL
           ' 現在における天気は'
           PHP_EOL
          '  '
           $now['weather']
           '('
           $now['temp']
           '℃)'
           PHP_EOL
           'です。'
           PHP_EOL
           '今日の天気は'
           PHP_EOL
          '  '
           $today["weather"]
           'で,'
           PHP_EOL
          ' 　 '
           '最高気温は'
           $today['high']
           '℃, 最低気温は'
           $today['low']
           '℃'
           PHP_EOL
          'でしょう。';
        
    ];
}
error_log(json_encode($response));

$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
));
$result = curl_exec($ch);
error_log($result);
curl_close($ch);