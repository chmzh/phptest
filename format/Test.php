<?php
//echo number_format(123456789,2,'a','b');

$auth = "24\tLewis Carroll";

$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);

echo $id."<br/>";
echo $first."<br/>";
echo $last."<br/>";

