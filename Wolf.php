<?php
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
              'label' => '4人',
              'text' => 'wwf4'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '5人',
              'text' => 'wwf5'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '6人',
              'text' => 'wwf6'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '7人',
              'text' => 'wwf7'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '8人',
              'text' => 'wwf8'
                ]
            ],
            [
            'type' => 'action',
            'action' => [
              'type' => 'message',
              'label' => '9人',
              'text' => 'wwf9'
                ]
            ]
        ]
    ]
];
break;
}
