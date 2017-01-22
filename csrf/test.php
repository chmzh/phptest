<?xml ?>
<?php
include 'Crumb.php';
echo substr(Crumb::challenge('1'.'-1'.'1'),-12,10).'<br/>';
echo substr(Crumb::challenge('2'.'-1'.'1'),-12,10).'<br/>';

