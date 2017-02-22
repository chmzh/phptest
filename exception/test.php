<?php
set_exception_handler(function ($e) {
    $code = $e->getCode() ?: 400;
    header("Content-Type: application/json", NULL, $code); 
    echo json_encode(["error" => $e->getMessage(),'line'=>$e->getLine()]); 
    exit;
});

throw new Exception('Unknown endpoint', 404);