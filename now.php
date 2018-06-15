<?php
date_default_timezone_set('Asia/Tokyo');
$Ntime = date("G");
//==============================================
if (6 <= $Ntime && $Ntime <= 8) {
  $TM = '6~8';
}
elseif (9 <= $Ntime && $Ntime <= 11) {
  $TM = '9~11';
}
elseif (12 <= $Ntime && $Ntime <= 14) {
  $TM = '12~14';
}
elseif (15 <= $Ntime && $Ntime <= 17) {
  $TM = '15~17';
}
elseif (18 <= $Ntime && $Ntime <= 20) {
  $TM = '18~20';
}
elseif (21 <= $Ntime && $Ntime <= 23) {
  $TM = '21~23';
}
elseif (0 <= $Ntime && $Ntime <= 5) {
  $TM = '運行していないようです';
}
//===============================================
if (strstr($text,'きた') or strstr($text,'bu')) {
  $loc = "bu";
}

elseif (strstr($text,'bd') or strstr($text,'なが')) {
  $loc = "bd";
}

elseif (strstr($text,'kk')) {
  $loc = "kk";
}

elseif (strstr($text,'kh') or strstr($text,'京橋発') or strstr($text,'京橋から')) {
  $loc = "bu";
}

$Tresult = $TM.$loc;
$messageData = [
 'type' => 'text',
 'text' => $Tresult
];