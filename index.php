<?php
$_POST = mb_convert_encoding($_POST, "UTF-8", "auto");
$cnt = count($_POST);
$imp = implode("\n",$_POST);
$yaji = $_POST->body;

$url = 'https://script.google.com/macros/s/AKfycbw8sFc-jlQrlZJOf_8fvbnrO1KUjsrfwv376piCGXxV6PlV6j03/exec';
file_get_contents($url."?p1=$_POST"."&p2=".$cnt."&p3=".$imp."&p4=".$yaji);
