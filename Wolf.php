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
                        'type' => 'text',
                        'label' => '4人',
                        'text' => 'wwolf4'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'text',
                        'label' => '5人',
                        'text' => 'wwolf5'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'text',
                        'label' => '6人',
                        'text' => 'wwolf6'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'text',
                        'label' => '7人',
                        'text' => 'wwolf7'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'text',
                        'label' => '8人',
                        'text' => 'wwolf8'
                     ]
                    ],
                    [
                      'type' => 'action',
                      'action' => [
                        'type' => 'text',
                        'label' => '9人',
                        'text' => 'wwolf9'
                     ]
                    ]
                  ]
                ]
              ];
break;
}
