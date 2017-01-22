<?php
session_start();
include_once 'Person.php';
$p=$_SESSION['object'];
$a=unserialize($p);
$a->walk(true);
$a->walk(false);
echo $a->age;
?>

