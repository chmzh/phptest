<?php
function xrange($start, $limit, $step = 1) {
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

$abc = xrange(1, 10);


echo gettype($abc)."<br/>";

echo get_class($abc)."<br/>";

var_dump($abc)."<br/>";

//var_dump(token_get_all("abc cdef"));
define("ABC", "abc");
echo constant("ABC")."<br/>";
echo ABC;

echo __LINE__;
// $arr = array(1, 2, 3, 4, 5);

// foreach ($arr as $key => $row) {
//     echo $key , $row;
// }
