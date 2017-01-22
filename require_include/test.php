<?php
  function TestFunc()
  {
    require('test2.php');
    print_r($GLOBALS);
  }
  
  TestFunc();