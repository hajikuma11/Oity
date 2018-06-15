<?php
$url = "https://drive.google.com/file/d/1pffky3ZNBpU9tsoB_w_1Y9lVmgow7gdU/view?usp=sharing";
$file = file_get_contents($url);
$json = mb_convert_encoding($file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$obj = json_decode($json);
echo $obj;
