<?php
$imp = implode("",$_POST);
$imp = explode(",",$imp);

$url = 'https://script.google.com/macros/s/AKfycbw8sFc-jlQrlZJOf_8fvbnrO1KUjsrfwv376piCGXxV6PlV6j03/exec';
file_get_contents($url."?p1=$imp[0]"."&p2=$imp[1]"."&p3=$imp[2]"."&p4=$imp[3]");
