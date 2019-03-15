<?php
$request = json_decode(file_get_contents('php://input'), true);
$rec1 = $request[0]
$rec2 = $request[1]
$rec3 = $request[2]
$rec4 = $request[3]
$url = 'https://script.google.com/macros/s/AKfycbw8sFc-jlQrlZJOf_8fvbnrO1KUjsrfwv376piCGXxV6PlV6j03/exec';
file_get_contents($url."?p1=$rec1&p2=$rec2&p3=$rec3&p4=$rec4");
