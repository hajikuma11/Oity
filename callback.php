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
$userID = $jsonObj->{"events"}[0]->{"source"};
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

    $messageData = [
        'type' => 'template',
        'altText' => '機関選択',
        'template' => [
            'type' => 'buttons',
            'title' => '交通機関',
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

elseif (strstr($text,'今')) {
	require "now.php";
}

//***電車の駅選択**************************************************************************************************************************************************************************
elseif ($text == 'Train' or $text == '電車' or $text == 'train') {

    $messageData = [
        'type' => 'template',
        'altText' => '駅選択',
        'template' => [
            'type' => 'buttons',
            'title' => '発車駅',
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

//***京橋発長尾方面**************************************************************************************************************************************************************************
elseif ($text == 'KyobashiSt' or $text == '京橋発' or $text == '京橋から') {

  $messageData = [
      'type' => 'template',
      'altText' => '時間帯選択',
      'template' => [
          'type' => 'buttons',
          'title' => '京橋発松井山手・木津方面',
          'text' => '何時くらい？',
          'actions' => [
                      [
                          'type' => 'postback',
                          'label' => '６～８時',
                          'text' => '6~8kh',
                          'data' => 'value'
                      ],
                      [
                          'type' => 'postback',
                          'label' => '９～１１時',
                          'text' => '9~11kh',
                          'data' => 'value'
                      ],
                      [
                          'type' => 'postback',
                          'label' => '１２～１４時',
                          'text' => '12~14kh',
                          'data' => 'value'
                      ],
                      [
                          'type' => 'postback',
                          'label' => 'それ以降の時刻',
                          'text' => 'kh2',
                          'data' => 'value'
                      ]
          ]
      ]
  ];
}
elseif ($text == 'kh2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '京橋発松井山手・木津方面',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '１５～１７時',
                            'text' => '15~17kh',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１８～２０時',
                            'text' => '18~20kh',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '２１～２３時',
                            'text' => '21~24kh',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

//***長尾駅の向き**************************************************************************************************************************************************************************
elseif ($text == 'NagaoSt' or $text == '長尾駅発') {

    $messageData = [
        'type' => 'template',
        'altText' => '向き選択',
        'template' => [
            'type' => 'buttons',
            'title' => '方面を選択',
            'text' => 'どっち方面？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '松井山手・木津方面',

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
elseif ($text == 'Localbus' or $text == 'バス' or $text == 'bus') {

    $messageData = [
        'type' => 'template',
        'altText' => 'バス行先選択',
        'template' => [
            'type' => 'buttons',
            'title' => 'バスの行き先',
            'text' => 'どこからどこ行き？',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => '北山中央　→→　長尾駅',

                    'text' => 'goNag',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '　長尾駅　→→　北山中央',

                    'text' => 'goKita',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '　楠葉駅　→→　北山中央',

                    'text' => 'goKitafK',
                    'data' => 'value'
                ],
                [
                    'type' => 'postback',
                    'label' => '北山中央　→→　樟葉駅',

                    'text' => 'goKuz',
                    'data' => 'value'
                ]
            ]
        ]
    ];
}

//***北山中央から長尾駅行き時間帯選択*******************************************************************************************************************************************************************
elseif ($text == 'goNag') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '北山中央→→→長尾駅',
            'text' => '何時くらい？',
            'actions' => [
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
elseif ($text == 'goNag2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '北山中央→→→長尾駅',
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

//***長尾駅から北山中央行き時間帯選択******************************************************************************************************************************************************************
elseif ($text == 'goKita') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '長尾駅→→→北山中央',
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
elseif ($text == 'goKita2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '長尾駅→→→北山中央',
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

//***北山中央から楠葉駅行き時間帯選択*******************************************************************************************************************************************************************
elseif ($text == 'goKuz') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '北山中央→→→楠葉駅',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '１０～１１時',
                            'text' => '10~11kk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１２～１４時',
                            'text' => '12~14kk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'それ以降の時刻',
                            'text' => 'goKuz2',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}
elseif ($text == 'goKuz2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '北山中央→→→楠葉駅',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '１５～１７時',
                            'text' => '15~17kk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１８～２０時',
                            'text' => '18~20kk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '２１時～２３時',
                            'text' => '21~23kk',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

//***楠葉駅から北山中央行き時間帯選択******************************************************************************************************************************************************************
elseif ($text == 'goKitafK') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '楠葉駅→→→北山中央',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '６～８時',
                            'text' => '6~8fk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '９～１１時',
                            'text' => '9~11fk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１２～１４時',
                            'text' => '12~14fk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'それ以降の時刻',
                            'text' => 'goKitafK2',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}
elseif ($text == 'goKitafK2') {

    $messageData = [
        'type' => 'template',
        'altText' => '時間帯選択',
        'template' => [
            'type' => 'buttons',
            'title' => '楠葉駅→→→北山中央',
            'text' => '何時くらい？',
            'actions' => [
                        [
                            'type' => 'postback',
                            'label' => '１５～１７時',
                            'text' => '15~17fk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '１８～２０時',
                            'text' => '18~20fk',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => '２１時～２３時',
                            'text' => '21~23fk',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

//***裏コード*****************************************************************************************************************************************************************************
elseif ($text == '19991111' or $text == ':weathK&K:' or $text == 'userid') {
require "help.php";
}

elseif (strstr($text,'進数')) {
  require "decimal.php";
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
