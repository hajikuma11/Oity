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
