<?php
$url = 'http://test.cmz.com/curl/delete.php';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_exec($ch);