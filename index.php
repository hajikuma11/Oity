<?php
$url = 'https://script.google.com/macros/s/AKfycbyrJAffhej-etQRoYWgGRqvfldC8Vt4u8Kvf13fo9AA_LAuFlYU/exec';
$tmp = count($_POST);
$tmp2 = $_POST->{'action:created'};

file_get_contents($url.'?p1=2&p2='.$tmp.'&p3='.$tmp2);




// $imp = implode($_POST);
// $arr = explode(',',$imp);
// $cnt = count($arr);

// for ($i=0;$i<$cnt;$i++) {
//   $arr[$i] = str_replace('"','',$arr[$i]);
//   $arr[$i] = preg_replace("/( |　)/", "", $arr[$i]);
//   if (strstr($arr[$i],':') != false && count(strstr($arr[$i],':')) > 10) {
//     $arr[$i] = substr($arr[$i],0,strpos($arr[$i],':'));
//   }
//}

// $cnt = count($arr);
// $txt = '?p1='.$cnt;
// $pls = 0;
// while ($cnt >= 0) {
//   $txt = '?p1='.$cnt;
//   for ($i=0;$i<3;$i++) {
//   $txt .= '&p';
//   $txt .= $i+2;
//   $txt .= '=';
//   $txt .= "'";
//   $txt .= $arr[$pls];
//   $txt .= "'";
//   $pls++;
// }
// $cnt -= 3;
// file_get_contents($url.$txt);
// }

// for ($i=0;$i<$cnt;$i++) {
//   $txt .= '&p';
//   $txt .= $i+2;
//   $txt .= '=';
//   $txt .= "'";
//   $txt .= $arr[$i];
//   $txt .= "'";
// }

//file_get_contents($url.$txt);

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

//file_get_contents($url.'?p1='.$cnt.'&p2='."'".$arr[12]."'".'&p3='."'".$arr[11]."'".'&p4='."'".$arr[14]."'");

