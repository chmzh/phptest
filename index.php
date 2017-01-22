<?php

// static $abc = [];
// if(!empty($abc)){
//     print_r($abc);
// }else{
//     $abc[] = $_GET['a'];
// }
// return;

phpinfo();
return;
function loader($class)
{
    $file = $class . '.php';
    if (is_file($file)) {
        require_once($file);
    }
    echo __METHOD__;
}

spl_autoload_register('loader');

$a = new A();
//$a->go("dfdsfdf");

// if(is_scalar($a)){
//     echo "1";
// }else{
//     echo "2";
// }

//echo gettype($a);

if(1<2){
    require __DIR__."/require_include/test2.php";
}
//echo print_r($MyTestGlobal);

//declare(tick = 1){
//    echo "lkajsd";
//}

declare(ticks=1);

// A function called on each tick event
function tick_handler()
{
    echo "tick_handler() called\r\n";
}

//register_tick_function('tick_handler');

//$a1 = 1;
//$a = 1;

//if ($a > 0) {
    //$a += 2;
    //print($a."\r\n");
//}
$c = "A";
$a1 = new $c;
//$a1->go("abc");
echo is_callable($a)?"a":"b";
echo "<br/>";
echo strpos("abc", '\\');

$abc = A::of($c);
$abc->go("<br/>my");

$aa = new ReflectionClass("A");

echo PHP_SAPI === 'cli'?"cli\n":"no cli\n";
echo print_r($_SERVER['argv']);
