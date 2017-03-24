<?php
$url = "http://test.cmz.com/cookie/cookie.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_COOKIE, "visited=true"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$result = curl_exec($ch);
echo $result;
curl_close($ch);