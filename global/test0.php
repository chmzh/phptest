<?php
session_start();
include_once 'Person.php';

$person=new Person(22);
$b=serialize($person);

$_SESSION["object"]=$b;

?>

