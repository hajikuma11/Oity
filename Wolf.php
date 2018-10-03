<?php
switch ($text) {
case '人狼':
    $messageData = [
      'type' => 'text',
      'text' => '遊ぶ人数を選択してください',
      'quickReply' => [
        'items' => [
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'postback',
                        'label' => '4人',
                        'data' => 'wwold4'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'postback',
                        'label' => '5人',
                        'data' => 'wwold5'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'postback',
                        'label' => '6人',
                        'data' => 'wwold6'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'postback',
                        'label' => '7人',
                        'data' => 'wwold7'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'postback',
                        'label' => '8人',
                        'data' => 'wwold8'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'postback',
                        'label' => '9人',
                        'data' => 'wwold9'
                     ]
                    ]
                  ]
                ]
              ];
break;
}
