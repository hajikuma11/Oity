<?php
$url = 'https://script.google.com/macros/s/AKfycbyrJAffhej-etQRoYWgGRqvfldC8Vt4u8Kvf13fo9AA_LAuFlYU/exec';
$imp = implode($_POST);
$arr = explode(',',$imp);
$cnt = count($arr);
$txt = '';

for ($i=2;$i<$cnt+2;$i++) {
  if (strpos($arr[$i-2],'https://') !== false) {
    $cnt--;
    $split = array_splice($arr, $i-2, $i-2);
    $i--;
  } else {
    //$arr[$i-2] = (string) $arr[$i-2];
    $arr[$i-2] = str_replace('"', '', $arr[$i-2]);
    $txt .= '&p'.$i.'='."'".$arr[$i-2]."'";
  }
}

file_get_contents($url.'?p1='.$cnt.$txt);
