<?php
error_reporting(E_ALL);
class A
{    
        
    private $a;
    
    public function setA($a){
        $this->a[] = $a;
    }
    
    public function getA(){
        return $this->a;
    }
    
    public function go($name){
        echo $name;
    }
    
    public function setFoo($v){
        $this->Foo = $v;
    }
    
    public function getFoo(){
        return $this->Foo;
    }
    
    public function __get($name){
        $getter = "get".$name;
        if(method_exists($this, $getter)){
            return $this->$getter();
        }
    }
    
    public function __set($name,$value){
        $setter = "set".$name;
        if(method_exists($this, $setter)){
            $this->$setter($value);
        } elseif (method_exists($this, 'get' . $name)) {
        throw new InvalidCallException('Setting read-only property: ' .
            get_class($this) . '::' . $name);
    } else {
        throw new UnknownPropertyException('Setting unknown property: '
            . get_class($this) . '::' . $name);
    }
    }
    
    public static function className(){
        return get_called_class();
    }
    
    public static function of($c){
        return new static($c);
    }
}

/*
$c = "A";
$c = new A();

echo get_class($c);

$c->Foo = "dfdf";
echo $c->Foo;

$c->setA(["a"=>"adfdf"]);

print_r($c->a);




function increment(&$var)
{
    $var++;
}

$a = 0;
call_user_func([$c,'go'],"asdfdf");
//echo $a."\n";

// You can use this instead
//call_user_func_array('increment', array(&$a));
//echo $a."\n";

var_export($a);
$b = 3.1;
$v = var_export($b,true);
echo $v;
*/
function aa(){
    do{
        for($i=0;$i<100;$i++){
            echo $i;
            if($i===10){
                return;
            }
        }
    }while(true);
}

//echo A::className();
$a = new A();
$arr = ["a"=>"b","b"=>"c"];

$arr1 = array_fill_keys($arr, "abc");

//print_r($arr1);

$config['bootstrap'][] = 'debug';
$config['bootstrap'][] = 'debug1';
//print_r($config);
//echo __DIR__.'/../index.php';