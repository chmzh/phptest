<?php
require_once '../library/hprose/Hprose.php';
use Hprose\Http\Client;
use Hprose\InvokeSettings;
use Hprose\ResultMode;
$client = new Client(false);
var_dump($client);
echo $client->hello("World", new InvokeSettings(array('mode' => ResultMode::Raw)));