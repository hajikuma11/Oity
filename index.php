<?php
$imp = implode("",$_POST);
$imp = explode(",",$imp);
$str = "?p1=$imp[0]"."&p2=$imp[1]"."&p3=$imp[2]"."&p4=$imp[3]"."&p5=$imp[4]"."&p6=$imp[5]"."&p7=$imp[6]"."&p8=$imp[7]"."&p9=$imp[8]"."&p10=$imp[9]";

$url = 'https://script.google.com/macros/s/AKfycbw8sFc-jlQrlZJOf_8fvbnrO1KUjsrfwv376piCGXxV6PlV6j03/exec';
file_get_contents($url.$str);
