<?php
$body = file_get_contents('php://input');
$payload = json_decode($body);
file_put_contents('log.txt', $payload);
