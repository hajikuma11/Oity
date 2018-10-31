<?php
$text = strstr($text, 'WLF', true);

//人数選択
if ($text == '人狼') {
  $messageData = [
      'type' => 'template',
      'altText' => '何人でプレイする？',
      'template' => [
          'type' => 'buttons',
          'title' => '何人でプレイする？',
          'text' => 'プレイする人数を選択してください',
          'actions' => [
              [
                  'type' => 'postback',
                  'label' => '4人',

                  'text' => '4pWLF',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '5人',

                  'text' => '5pWLF',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '6人',

                  'text' => '6pWLF',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '7人',

                  'text' => '7pWLF',
                  'data' => 'value'
              ]
          ]
      ]
  ];
}

//4人でプレイする
elseif ($text == '4p') {

}

switch ($text) {
case '人狼':
$messageData = [
    'type' => 'text',
    'text' => '何人であそぶ？',
    'quickReply' => [
        'items' => [
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '4',
              'text' => 'wwf4'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '5',
              'text' => 'wwf5'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '6',
              'text' => 'wwf6'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '7',
              'text' => 'wwf7'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '8',
              'text' => 'wwf8'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '9',
              'text' => 'wwf9'
                ]
            ]
        ]
    ]
];
break;
}
