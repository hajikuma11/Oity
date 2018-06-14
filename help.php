<?php
if ($text == '19991111') {

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
                            'style' => 'primary',
                            'label' => 'Weather',
                            'text' => ':weathK&K:',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'postback',
                            'label' => 'Uschedule',
                            'text' => ':UsheH&H:',
                            'data' => 'value'
                        ]
            ]
        ]
    ];
}

elseif ($text == ':weathK&K:') {

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

elseif ($text == 'userid') {
$msg = $userID->{"userId"};
$messageData = [
   'type' => 'text',
   'text' => $msg
];
}

elseif ($text == 'flex') {
  $messageData = [
    'type' => 'flex',
  'altText' => 'this is a flex message',
  'contents' = [
    'type' => 'bubble',
    'body' => [
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => [
        [
          'type' => 'text',
          'text' => 'hello'
        ],
        [
          'type' => 'text',
          'text' => 'world'
        ],
      ]
    ]
  ]
];
}
