<?php

 //***アクセストークン**********************************************************************************************************************************************************************
$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';

 //***json系*****************************************************************************************************************************************************************************
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$text = $message->{"text"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
$line_source = $jsonObj->{"events"}[0]->{"source"};
$userID = $line_source->{"userId"};
//***ヘルプ******************************************************************************************************************************************************************************
if ($text == 'ヘルプ' or $text == 'へるぷ' or $text == 'help' or $text == 'Help') {

    $messageData = [
        'type' => 'template',
        'altText' => 'ヘルプ選択',
        'template' => [
            'type' => 'buttons',
            'title' => 'ヘルプ',
            'text' => 'どのヘルプを表示しますか？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '交通系',

                    'text' => '交通',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => 'URL系',

                    'text' => 'URL',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '教室系',

                    'text' => '教室',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => 'その他',

                    'text' => 'その他',
                    'data' => 'value'
                ]
            ]
        ]
    ];
}

//***天気系********************************************************************************************************************************************************************************
elseif ($text == '天気' or $text == 'てんき' or $text == '気象' or $text == '気象情報') {
    // ボタンタイプ
    $messageData = [
        'type' => 'template',
        'altText' => '情報選択',
        'template' => [
            'type' => 'buttons',
            'title' => '気象情報',
            'text' => 'どの情報？',
            'actions' => [
              [
                  'type' => 'postback',
                  'label' => '天気予報',

                  'text' => 'forecast',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '台風情報',

                  'text' => 'typhoon',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '雨雲レーダー',

                  'text' => 'rainmap',
                  'data' => 'value'
              ]
            ]
        ]
    ];
}

//***天気予報********************************************************************************************************************************************************************************
elseif ($text == 'forecast' or $text == 'forecast' or $text == '天気予報' or $text == 'てんきよほう') {
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
                    'uri' => 'https://goo.gl/xocMKr'
                ],
                [
                    'type' => 'uri',
                    'label' => '『大阪府』',
                    'uri' => 'https://goo.gl/zDoPwU'
                ],
                [
                    'type' => 'uri',
                    'label' => '『京都府』',
                    'uri' => 'https://goo.gl/sbXiYv'
                ],
                [
                    'type' => 'uri',
                    'label' => '『兵庫県』',
                    'uri' => 'https://goo.gl/3AuVUs'
                ]
            ]
        ]
    ];
}

//***交通機関選択**************************************************************************************************************************************************************************
elseif ($text == '時刻' or $text == 'じこく') {

    require_once "(/app/main/Tr-Bs.php)";
}

 elseif (strstr($text,'今')) {
 	require_once "(/app/main/now.php)";
 }

 elseif ($text == 'オールなう' or $text == 'オールナウ' or $text == 'おなう'
      or $text == 'Train' or $text == '電車' or $text == 'train' or $text == 'KyobashiSt'
      or $text == '京橋発' or $text == '京橋から' or $text == 'kh2' or $text == 'NagaoSt'
      or $text == '長尾駅発' or $text == 'Localbus' or $text == 'バス' or $text == 'bus'
      or $text == 'goNag' or $text == 'goNag2' or $text == 'goKita' or $text == 'goKita2'
      or $text == 'goKuz' or $text == 'goKuz2' or $text == 'goKitafK' or $text == 'goKitafK2') {

    require_once "(~/Tr-Bs.php)";
}

//***裏コード*****************************************************************************************************************************************************************************
elseif ($text == '19991111' or $text == ':weathK&K:' or $text == 'userid' or $text == 'quickreply') {
require_once "(/app/main/help.php)";
}

elseif (strstr($text,'進数')) {
  require_once "(/app/main/decimal.php)";
}

elseif ($text == 'pg') {

  $link = pg_connect("host=ec2-23-23-153-145.compute-1.amazonaws.com dbname=d1o6ghv54q1l02 user=vrzabuvonfrevo password=c3ac08f31a9d87de492624ea203f8e3237529940af2475ebde5f70614ff874a8");

  if (!$link) {
    $messageData = [
     'type' => 'text',
     'text' => '接続に失敗'
    ];
  } else {
    $messageData = [
     'type' => 'text',
     'text' => '接続に成功'
    ];
  }

  pg_close($link);
}
//***レスポンス系*****************************************************************************************************************************************************************************
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
