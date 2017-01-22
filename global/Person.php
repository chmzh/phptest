<?php
class Person
{
    public static $g;
    public $age;

    function __construct($age)
    {
        $this->age=$age;
    }

    function walk($bol)
    {
        if($bol===true){
            echo "I'm walking...!";
        }else{
            echo "I'm running...!";
        }
        
    }

}
?>
