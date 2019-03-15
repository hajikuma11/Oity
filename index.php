<?php
$cnt = $_POST->{changes}[0]->{body}[0]->{from}[0];
$imp = implode("  ",$_POST);
$yaji = $_POST->{action}[0];

$url = 'https://script.google.com/macros/s/AKfycbw8sFc-jlQrlZJOf_8fvbnrO1KUjsrfwv376piCGXxV6PlV6j03/exec';
file_get_contents($url."?p1=$_POST"."&p2=".$cnt."&p3=".$imp."&p4=".$yaji);
