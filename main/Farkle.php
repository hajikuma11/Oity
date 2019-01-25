<?php
//テスト用テキストデータ
$text = 'FK_test';

/*FK_を切り離す*/
$text = substr($text,3);

if (strstr($text,'S_')) { /*スタートなら*/

    /*S_を切り離す*/
    $text = substr($text,2);

    /**
     * [0] 何人目
     * [n] n人目のプレイヤーID
     */
    $arr = explode("_",$text);

    for ($i=3;$i<=5;$i++) { /*何人目の登録か処理*/

        if ($arr[0] == $i) {
            $num = $i+1;
        }

    }

    /*$numがNULLなら3*/
    if ($num == NULL) {
        $num = 3;
    }

    for ($i=1;$i<count($arr);$i++) {

    }

    $messageData = [
        'type' => 'template',
        'altText' => 'プレイヤー登録',
        'template' => [
            'type' => 'buttons',
            'title' => 'Farkle',
            'text' => $num.'人目のプレイヤーはボタンを押してください',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => $num.'人目のプレイヤーとして登録',

                    'text' => $num.'人目のプレイヤーとして登録されました',
                    'data' => 'FK_S_'.$num.$arrtxt
                ]
            ]
        ]
    ];

}