<?php

error_reporting(E_ALL);

class Globals{
    public $var = array();
    function __construct(){
        global $_fanwe;
        $_fanwe=2;
    }
}
new Globals();
function Nice(){
    global $_fanwe;
    echo $_fanwe;
}
Nice();

function globals(){
    global $_fanwe;
    $_fanwe=3;
}
function Text(){
    global $_fanwe;
    echo $_fanwe;
}
globals();
Text();
