<?php
if ($_SERVER['REQUEST_METHOD']=='DELETE'){
    echo 'delete';
}else if($_SERVER['REQUEST_METHOD']=='PUT'){
    $content = file_get_contents("php://input");
    
    echo 'put:'.$content;
}else if($_SERVER['REQUEST_METHOD']=='POST'){
    echo 'post';
}else if($_SERVER['REQUEST_METHOD']=='PATCH'){
    echo 'patch';
}

?>
<!-- 
<script type="text/javascript">
alert('hello');
</script>
 -->
