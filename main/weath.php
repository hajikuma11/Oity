<?php

require_once __DIR__.'../vendor/autoload.php';

$URL = 'https://www.jma.go.jp/jp/week/331.html';

$html = file_get_contents($URL);
$doc = phpQuery::newDocument($html);

$contents = $doc[".for"]->text();

$contArr = explode("\n", $contents);

$txt = $tenk = $kous = $max = $min = "";
$cntKous = $cntmax = $endcnt = 0;

for ($i=0;$i<50;$i++) {
   $cont = trim(preg_replace('/[\t|\s{,}]/', '', $contArr[$i]));
   if ($cont == "") {
   } else {
       if (strstr($cont,"晴")||strstr($cont,"曇")||strstr($cont,"雨")||strstr($cont,"雪")) {
            $tenk .= $cont."&";
       } else if (strstr($cont,"/")) {
            $cont2 = substr($cont,0, 2);
            if (is_numeric($cont2)) {
            } else {
                $cont2 = substr($cont,2,2);
            }
            $kous .= $cont2."&";
            $cntKous++;
       } else if ($cntKous > 0 && $cntKous < 7) {
            $kous .= $cont."&";
            $cntKous++;
       } else if ($cntKous >= 7 && $cntmax <7) {
            if (strstr($cont,"(") == false) {
            $max .= $cont."&";
            $cntmax++;
            }
       } else {
           if (strstr($cont,"(") == false) {
               $min .= $cont."&";
               $endcnt++;
           }
       }
   }
}

$tenkArr = explode("&", $tenk);
$kousArr = explode("&",$kous);
$maxArr = explode("&",$max);
$minArr = explode("&",$min);

$w = date("w");
$d = date("d");
$week_name = array("日", "月", "火", "水", "木", "金", "土");
$txt1 = $txt2 = $txt3 = "";

for ($i=0;$i<7;$i++) {
    if ($i >= 1) {
        $w = date("w",strtotime($i." day"));
        $d = date("d",strtotime($i." day"));
    }

    $txtData = $d."日".$week_name[$w]."曜日の\n";
    $txtData .= "天気は、".$tenkArr[$i]."\n";
    $txtData .= "降水確率は、".$kousArr[$i]."％\n";
    $txtData .= "最高気温は、".$maxArr[$i]."度\n";
    $txtData .= "最低気温は、".$minArr[$i]."度\n";
    $txtData .= "\n";

    if ($i <= 2) {
        $txt1 .= $txtData;
    } elseif ($i >= 6) {
        $txt2 .= $txtData;
    } else {
        $txt3 .= $txtData;
    }
}

$messageData = [
    'type' => 'text',
    'text' => $txt1
];

$messageData2 = [
    'type' => 'text',
    'text' => $txt2
];

$messageData3 = [
    'type' => 'text',
    'text' => $txt3
];

$msgFlag = 2;