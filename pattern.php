<?php
//$pattern = '/^(.+?\.php)(/.*)$/';
//$pattern = '/(\w+)/';
// $arr = [];

$a = preg_match_all('/^(.+?\.php)(\/.*)$/','world.php/abc',$arr);
//echo $a."aa<br/>";
//print_r($arr);

$str = 'windows NT windows 2003 windows xp';
preg_match('/windows (?=xp)/',$str,$res);
//print_r($res);

$type = "varchar(64)";
preg_match('/^(\w+)\((.+?)\)(.*)$/', $type, $matches);
//echo "<br/>".preg_replace('/\(.+\)/', '(' . $matches[2] . ')', "varchar(128)") . $matches[3];

//print_r($arr);



echo gettype(1.1);

echo new Expression("dfdf");