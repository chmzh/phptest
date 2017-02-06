<?php
date_default_timezone_set('PRC');
header("Content-type:text/html;charset=utf-8");

header("Cache-Control:no-cache");
//响应头Last-Modified
$lastmodified = filemtime('./cache.php');
$lastmodifiedGMT = gmdate('D, d M Y H:i:s',$lastmodified). ' GMT';
header("Last-Modified:$lastmodifiedGMT");

//响应头ETag
$etag = md5_file('./cache.php');
header("ETag:$etag");




if (@$_SERVER['HTTP_IF_MODIFIED_SINCE'] == $lastmodifiedGMT ||
    @trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }

//返回304后，下面的内容不会向浏览器返回，而浏览器会使用之前的缓存   
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
    <a href='cache_sample.php'>刷新时间</a>
</body>
</html>