<?php
/*
ob_start();                   //打开缓冲区
echo "Hello\n";               //输出
header("location:index.php"); //把浏览器重定向到index.php
ob_end_flush();               //输出全部内容到浏览器
*/

echo date("Gi");

$a='';
if(isset($a)){
    echo $a.'a';
}


//闭包
function c(Closure $call){
    $call("hello");
}
c(function($msg){
    echo $msg;
});

class Test{
    public $name = "a";
    function p(){
        echo "test p";
    }
}
//stdClass 动态添加属性
function c1(stdClass $context){
    echo $context->a;
}
$class=new stdClass();
$class->a = "b";
c1($class);
