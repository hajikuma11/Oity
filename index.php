<?php
$body = file_get_contents('php://input');
$payload = json_decode($body);
var_dump($payload);
