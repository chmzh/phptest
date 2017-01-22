<?php
namespace abc;
include 'PersonTrait.php';

class Person
{
    private $userName;
    use PersonT;
    
    public function __construct($userName){
        $this->userName = $userName;
    }
    
    function test1(){
        $this->test();
    }
    
    public function __toString(){
        return $this->userName.'___________';
    }
}

?>