<?php

 //***アクセストークン**********************************************************************************************************************************************************************
$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';

 //***変数宣言****************************************************************************************************************************************************************************
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$text = $message->{"text"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
$line_source = $jsonObj->{"events"}[0]->{"source"};
$userID = $line_source->{"userId"};
$msgFlag = 0;

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
                    'type' => 'postback',
                    'label' => '『大阪府』',
                    'text' => 'weekOsaka',
                    'data' => 'value'
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

elseif ($text == 'weekOsaka') {
    require_once __DIR__ . ("/main/weath.php");
}

//***交通機関選択**************************************************************************************************************************************************************************
elseif ($text == '時刻' or $text == 'じこく') {

    require_once __DIR__ . ("/main/Tr-Bs.php");
}

 elseif (strstr($text,'今')) {
 	require_once __DIR__ . ("/main/now.php");
 }

 elseif ($text == 'Train' or $text == '電車' or $text == 'train' or $text == 'KyobashiSt'
      or $text == '京橋発' or $text == '京橋から' or $text == 'kh2' or $text == 'NagaoSt'
      or $text == '長尾駅発' or $text == 'Localbus' or $text == 'バス' or $text == 'bus'
      or $text == 'goNag' or $text == 'goNag2' or $text == 'goKita' or $text == 'goKita2'
      or $text == 'goKuz' or $text == 'goKuz2' or $text == 'goKitafK' or $text == 'goKitafK2') {

    require_once __DIR__ . ("/main/Tr-Bs.php");
}

elseif ($text == 'オールなう' or $text == 'オールナウ' or $text == 'おナウ' or $text == 'おーるなう' or $text == 'AN') {
  require_once __DIR__ . ("/main/allNow.php");
}

//**人狼
elseif (strstr($text,'WLF') || $text == '人狼') {
  require_once __DIR__ . ("/Wolf/Wolf.php");
}
//***裏コード*****************************************************************************************************************************************************************************
elseif ($text == '19991111' or $text == ':weathK&K:' or $text == 'userid' or $text == 'quickreply') {
require_once __DIR__ . ("/main/help.php");
}

elseif (strstr($text,'進数')) {
  require_once __DIR__ . ("/main/decimal.php");
}

elseif ($text == 'rpathtest') {
  require_once ("/app/main/Tr-Bs.php");
}

elseif ($text == 'getprofile') {
  $AfterConID = substr($userID, 0, 2);
  $BeforeConID = substr($userID, 30, 32);
  $conID = $BeforeConID.$AfterConID;
  $messageData = [
    'type' => 'text',
    'text' => $conID
  ];
}

elseif ($text == '👍🔥') {
    $messageData = [
        'type' => 'text',
        'text' => "i'll be back"
    ];
}
//***レスポンス系*****************************************************************************************************************************************************************************
  if ($msgFlag == 1) {
    $response = [
        'replyToken' => $replyToken,
        'messages' => [$messageData,$messageData2]
    ];
  } else if ($msgFlag == 2) {
    $response = [
        'replyToken' => $replyToken,
        'messages' => [$messageData,$messageData2,$messageData3]
    ];
  } else {
    $response = [
        'replyToken' => $replyToken,
        'messages' => [$messageData]
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
