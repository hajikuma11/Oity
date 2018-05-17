<?php

 //***アクセストークン**********************************************************************************************************************************************************************
$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';

 //***json系*****************************************************************************************************************************************************************************
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
$userID = $jsonObj->{"events"}[0]->{"source"};
//***ヘルプ******************************************************************************************************************************************************************************
if ($message->{"text"} == 'ヘルプ' or $message->{"text"} == 'へるぷ' or $message->{"text"} == 'help' or $message->{"text"} == 'Help') {

    $messageData = [
        'type' => 'template',
        'altText' => 'ヘルプ選択',
        'template' => [
            'type' => 'buttons',
            'title' => 'ヘルプを選択',
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
elseif ($message->{"text"} == '天気' or $message->{"text"} == 'てんき' or $message->{"text"} == '気象' or $message->{"text"} == '気象情報') {
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
elseif ($message->{"text"} == 'forecast' or $message->{"text"} == 'forecast' or $message->{"text"} == '天気予報' or $message->{"text"} == 'てんきよほう') {
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
elseif ($message->{"text"} == '時刻' or $message->{"text"} == 'じこく') {

    $messageData = [
        'type' => 'template',
        'altText' => '機関選択',
        'template' => [
            'type' => 'buttons',
            'title' => '交通機関を選択',
            'text' => 'どの交通機関？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '電車',

                    'text' => 'Train',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => 'バス',

                    'text' => 'Localbus',
                    'data' => 'value'
                ]
            ]
        ]
    ];
}

//***電車の駅選択**************************************************************************************************************************************************************************
elseif ($message->{"text"} == 'Train' or $message->{"text"} == '電車') {

    $messageData = [
        'type' => 'template',
        'altText' => '駅選択',
        'template' => [
            'type' => 'buttons',
            'title' => '発車駅を選択',
            'text' => 'どこ発？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '長尾駅発',

                    'text' => 'NagaoSt',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '京橋駅発',

                    'text' => 'KyobashiSt',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '楠葉駅発(未実装)',

                    'text' => 'KuzuhaSt',
                    'data' => 'value'
                ]
            ]
        ]
    ];
}

//***長尾駅の向き**************************************************************************************************************************************************************************
elseif ($message->{"text"} == 'NagaoSt' or $message->{"text"} == '長尾駅発') {

    $messageData = [
        'type' => 'template',
        'altText' => '向き選択',
        'template' => [
            'type' => 'buttons',
            'title' => '向きを選択',
            'text' => 'どっち方面？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '木津方面',

                    'text' => '木津方面',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '京橋方面',

                    'text' => '京橋方面',
                    'data' => 'value'
                ]
            ]
        ]
    ];
}

//***バスの行き先選択***********************************************************************************************************************************************************************
elseif ($message->{"text"} == 'Localbus' or $message->{"text"} == 'バス') {

    $messageData = [
        'type' => 'template',
        'altText' => 'バス行先選択',
        'template' => [
            'type' => 'buttons',
            'title' => '行き先を選択',
            'text' => 'どこ行き？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '長尾駅行き',

                    'text' => 'goNag',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '北山中央行き',

                    'text' => 'goKita',
                    'data' => 'value'
                ]
            ]
        ]
    ];
}

//***長尾駅行き時間帯選択*******************************************************************************************************************************************************************
elseif ($message->{"text"} == 'goNag') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '時間帯を選択',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '６～８時',
                            'text' => '6~8bd',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '９～１１時',
                            'text' => '9~11bd',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１２～１４時',
                            'text' => '12~14bd',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'それ以降の時刻',
                            'text' => 'goNag2',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}
elseif ($message->{"text"} == 'goNag2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '時間帯を選択',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '１５～１７時',
                            'text' => '15~17bd',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１８～２０時',
                            'text' => '18~20bd',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '２１時',
                            'text' => '21bd',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

//***北山中央行き時間帯選択******************************************************************************************************************************************************************
elseif ($message->{"text"} == 'goKita') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '時間帯を選択',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '６～８時',
                            'text' => '6~8bu',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '９～１１時',
                            'text' => '9~11bu',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１２～１４時',
                            'text' => '12~14bu',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'それ以降の時刻',
                            'text' => 'goKita2',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}
elseif ($message->{"text"} == 'goKita2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '時間帯を選択',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '１５～１７時',
                            'text' => '15~17bu',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１８～２０時',
                            'text' => '18~20bu',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '２１時',
                            'text' => '21bu',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

//***裏コード*****************************************************************************************************************************************************************************
elseif ($message->{"text"} == '19991111') {

    $messageData = [
        'type' => 'template',
        'altText' => 'selectstep',
        'template' => [
            'type' => 'buttons',
            'title' => 'SelectCode',
            'text' => 'ALL_READY',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => 'Weather',
                            'text' => '::weathK&K::',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'Uschedule',
                            'text' => '::UsheH&H::',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

elseif ($message->{"text"} == '::weathK&K::') {

    $messageData = [
        'type' => 'template',
        'altText' => 'SelectWeath',
        'template' => [
            'type' => 'buttons',
            'title' => 'ForecastWeath',
            'text' => 'Where？',
            'actions' => [
                [
                    'type' => 'uri',
                    'label' => '『Kawachinagano』',
                    'uri' => 'https://goo.gl/SDVp4x'
                ],
                [
                    'type' => 'uri',
                    'label' => '『Kobe』',
                    'uri' => 'https://goo.gl/ZAHEuF'
                ]
            ]
        ]
    ];
}

elseif ($message->{"text"} == '::UsheH&H::') {

    $messageData = [
        'type' => 'template',
        'altText' => 'SelectSch',
        'template' => [
            'type' => 'buttons',
            'title' => 'Schedule',
            'text' => 'Whose？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => 'Honoka',
                            'text' => 'h9n2k1',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'Hajime',
                            'text' => 'h1j1m1',
                            'data' => 'value'
                        ]
                ]
            ]
    ];
}

elseif ($message->{"text"} == 'userid') {
 $msg = $userID->{"userId"};
 $messageData = [
    'type' => 'text',
    'text' => $msg
 ];
}

elseif ($message->{"type"} == 'location') {
  $loc = $message->{"address"};
  $messageData = [
    'type' => 'text',
    'text' => $loc
  ];
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
