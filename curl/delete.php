<?php
if ($_SERVER['REQUEST_METHOD']=='DELETE'){
    echo 'delete';
}else if($_SERVER['REQUEST_METHOD']=='PUT'){
    echo 'put';
}else if($_SERVER['REQUEST_METHOD']=='POST'){
    echo 'post';
}

?>
<!-- 
<script type="text/javascript">
alert('hello');
</script>
 -->
