<?php
if ($_SERVER['REQUEST_METHOD']=='DELETE'){
    echo 'delete';
}else if($_SERVER['REQUEST_METHOD']=='PUT'){
    echo 'put';
}