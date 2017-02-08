<?php

require_once '../library/hprose/Hprose.php';
use Hprose\Http\Server;

function hello($name) {
    return "Hello $name!";
}

$server = new Server();
$server->add("hello");
$server->debug = true;
$server->crossDomain = true;
$server->start();