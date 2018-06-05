<?php
if ($message->{"text"} == 'userid') {
$msg = $userID->{"userId"};
$messageData = [
   'type' => 'text',
   'text' => $msg
];
}
elseif ($message->{"text"} == 'id') {
  $messageData = [
     'type' => 'text',
     'text' => 'lol'
   ];
}
