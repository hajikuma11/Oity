<?php
$body = file_get_contents('php://input');
$payload = json_decode($body,true);
print var_export($payload , true);
