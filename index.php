<?php
$url = 'https://script.google.com/macros/s/AKfycbyrJAffhej-etQRoYWgGRqvfldC8Vt4u8Kvf13fo9AA_LAuFlYU/exec';
$imp = implode($_POST);
$arr = explode(',',$imp);
$cnt = count($arr);
$txt = '';

//for ($i=2;$i<$cnt+2;$i++) {
//  if (strpos($arr[$i-2],'https://') !== false) {
//    $cnt--;
//    $split = array_splice($arr, $i-2, $i-2);
//    $i--;
//  } else {
//    //$arr[$i-2] = (string) $arr[$i-2];
//    $arr[$i-2] = str_replace('"', '', $arr[$i-2]);
//    $arr[$i-2] = str_replace("'", '', $arr[$i-2]);
//    $arr[$i-2] = str_replace('{', '', $arr[$i-2]);
//    $arr[$i-2] = str_replace('}', '', $arr[$i-2]);
//    $txt .= '&p'.$i.'='."'".$arr[$i-2]."'";
//  }
//}
//file_get_contents($url.'?p1='.$cnt.$txt);
$cnt = 20;
$txt = "'?p1='.$cnt";

for ($i=0;$i<20;$i++) {
   $txt .= ".'&p"."$i='.".'"'."'".'"'.'.'.$arr[$i];
}

//file_get_contents($url.'?p1='.$cnt.'&p2='."'".$arr[12]."'".'&p3='."'".$arr[11]."'".'&p4='."'".$arr[14]."'");
file_get_contents($url.$txt);
