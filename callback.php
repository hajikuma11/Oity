<?php
 
$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';
 
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);
 
$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
 
// 送られてきたメッセージの中身からレスポンスのタイプを選択
if ($message->{"text"} == '天気'　or $message->{"text"} ==　'てんき') {
    // ボタンタイプ
    $messageData = [
        'type' => 'template',
        'altText' => '天気選択',
        'template' => [
            'type' => 'buttons',
            'title' => '天気予報',
            'text' => 'どこの予報？',
            'actions' => [
                [
                    'type' => 'uri',
                    'label' => '『枚方市』',
                    'uri' => 'https://www.mapion.co.jp/weather/admi/27/27210.html'
                ],
                [
                    'type' => 'uri',
                    'label' => '『大阪市』',
                    'uri' => 'https://www.mapion.co.jp/weather/admi/27/27127.html'
                ]
            ]
        ]
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