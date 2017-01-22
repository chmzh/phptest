<?php
include 'Person.php';

Person::$g = 2;
$p = new Person(1);
echo $p::$g;
$p1 = new Person(2);
echo $p1::$g;

Person::$g +=1;

$a = ["a"=>"b"];

array("a"=>"b");

if(isset($GLOBALS['A'])){
    echo "yes";
}

$GLOBALS['A'] = 1;
echo $GLOBALS['A'];


unset($GLOBALS);

echo $GLOBALS;