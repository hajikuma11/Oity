<?php
$txt = file_get_contents('123.txt');

$txt = str_replace('{','[',$txt);
$txt = str_replace('}',']',$txt);
$txt = str_replace('"',"'",$txt);
$txt = str_replace("':","' =>",$txt);

file_put_contents('123.txt',$txt);