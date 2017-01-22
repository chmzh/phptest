<?php
$a = '';
$a=1;
echo gettype($a);


/*
function getMoney() {
    $rmb = 1;
    $dollar = 6;
    $func = function() use ( &$rmb ) {
        echo $rmb;
        $rmb = $rmb + 1;
        //echo $dollar;
    };
    return $func;
}
$abc = getMoney();
$abc();
$abc();
*/
echo memory_get_peak_usage()/(1000*1000);
exit;
$newfunc = create_function('$a,$b', '$a=1;echo $a;');
echo "New anonymous function: $newfunc\n";
echo $newfunc(2, M_E) . "\n";

function func1(){
    echo "abc";
}

$v = func1();
echo $v;


