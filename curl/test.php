<?php
$url = 'http://test.cmz.com/curl/delete.php';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_exec($ch);
curl_close($ch);