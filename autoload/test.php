<?php

use com\cmz\MyClass;
function autoload($className){
    if(strpos($className, '\\')!==false){
        $src = str_replace('\\', '/', $className).'.php';
        echo $src;
        include $src;
    }
    
}

spl_autoload_register('autoload', true, true);

$obj = new MyClass();