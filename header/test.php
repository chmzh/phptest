<?php
$url = 'http://test.cmz.com/header/header.php'; 
$options = array(
    "http" => array(
        "header" => "User-Agent: Advanced HTTP Magic Client"
    ) );
$page = file_get_contents($url, false , stream_context_create($options)); 
echo $page;