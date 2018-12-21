<?php

require_once '/app/vendor/autoload.php';

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
            $cont = str_replace("晴","☀️",$cont);
           $cont = str_replace("曇","☁️",$cont);
           $cont = str_replace("雨","☔️",$cont);
           $cont = str_replace("雪","❄️",$cont);
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
$m = date("m");
$week_name = array("日", "月", "火", "水", "木", "金", "土");

for ($i=0;$i<7;$i++) {
    if ($i >= 1) {
        $w = date("w",strtotime($i." day"));
        $d = date("d",strtotime($i." day"));
        $m = date("m",strtotime($i." day"));
    }

    $day[$i] = $d."日 (".$week_name[$w].")";
    $weatherData[$i] = $tenkArr[$i];
    $forRain[$i] = $kousArr[$i]."%";
    $maxTemp[$i] = $maxArr[$i]."°C";
    $minTemp[$i] = $minArr[$i]."°C";
                /* $day = 日付
                 * $weatherData = 天気
                 * $forRain = 降水確率
                 * $maxTemp = 最高気温
                 * $minTemp = 最低気温
                 * */
}
$messageData = [
    'type' => 'text',
    'text' => $day[0]
];