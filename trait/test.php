<?php

/*
namespace abc;
include 'Person.php';
exit(__DIR__);
$person = new Person("abc");
$person->test();
echo $person;

*/
trait Counter {
    public function inc() {
        static $c = 0;
        $c = $c + 1;
        echo "$c\n";
    }
}

class C1 {
    use Counter;
}

class C2 {
    use Counter;
}

$o = new C1(); $o->inc();$o->inc(); // echo 1


