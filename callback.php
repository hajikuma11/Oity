<?php

$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

// 送られてきたメッセージの中身からレスポンスのタイプを選択
if ($message->{"text"} == '天気') {
    $messageData = [
        'type' => 'text',
        require_once('weather.php'); // 天気情報クラス
 
// 現在時刻. タイムゾーンはJST指定
$time = new DateTime('now', new DateTimeZone('Asia/Tokyo'));

 
// 現在の天気と明日の予報を入手 (from weather.php)
$weather  = new Weather('tokyo'); // まだ東京固定
$now    = $weather->GetCondition();
$tomorrow   = $weather->GetTomorrow();
 
// 呟く文に天気情報を加える
$message  .= '大阪の現在('
      . $time->format('m/d H:i')
      . ')の天気は'
      . $now['weather']
      . '('
      . $now['temp']
      . '℃)です.'
      . PHP_EOL
      . '明日は'
      . $tomorrow["weather"]
      . 'で, '
      . '最高気温は'
      . $tomorrow['high']
      . '℃, 最低気温は'
      . $tomorrow['low']
      . '℃ です.';
    ];
} 

$response = [
    'replyToken' => $replyToken,
    'messages' => [$messageData]
];
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