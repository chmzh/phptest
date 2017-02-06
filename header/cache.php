<?php
date_default_timezone_set('PRC');
header("Content-type:text/html;charset=utf-8");

//用Cache-Control告诉浏览器有效期 5秒
header("Cache-Control:max-age=5");//等同于Cache-Control:public, max-age=5
$curr_time = date('Y-m-d H:i:s');
echo '服务器时间:'.$curr_time;  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Cache</title>
</head>
<body>
<br>
    Time:<?php  echo $curr_time; ?>
<br>
    <a href='http://test.cmz.com/header/cache.php'>刷新时间</a>
</body>
</html>