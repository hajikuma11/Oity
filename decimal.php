<?php
$utftext = mb_convert_encoding($text,'SJIS');
$TDATA = substr($utftext,4);
$sec =decbin($TDATA);
$eig =octdec($TDATA);
$sixt =dechex($TDATA);
$messageData = [
   'type' => 'text',
   'text' => "[2]$sec\n[8]$eig\n[16]$sixt"
];
