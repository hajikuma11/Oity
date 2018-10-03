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
                    ]
                    for ($fig=5:$fig<10:$fig++) {
                      ,[
                        'type' => 'action',
                        'action' => [
                          'type' => 'postback',
                          'label' => $fig.'人',
                          'data' => 'wwold'.$fig
                       ]
                      ]
                    }
                  ]
                ]
              ];
break;
}
