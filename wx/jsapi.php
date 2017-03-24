<?php
error_reporting(E_ALL);
require_once "lib/jssdk.php";
//第一步: 生成JSAPI签名
$jssdk =new JSSDK(1000004);
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JSAPI 签名输出测试</title>        
</head>
<bopdy>
<p>appId：<span><!--  $signPackage["appId"]--></span></p>
  <p>timestamp：<span><?php echo $signPackage["timestamp"];?></span></p>
  <p>nonceStr：<span><?php echo $signPackage["nonceStr"];?></span></p>
  <p>signature：<span><?php echo $signPackage["signature"];?></span></p>
	<a href="javascript:gg();">获取为止</a>
</body>
<!-- 第二步: 引用JSAPI 的脚本文件 -->
<script src="https://res.wx.qq.com/wwopen/js/jsapi/jweixin-1.0.0.js"></script>
<script src="jquery.min.js"></script> 
<script>
  /*
   * 第三步: 配置jsapi的权限 
   * 注意：所有的JS接口只能可信域名下调用   
   */
  wx.config({
	  debug: true,
	  appId: '<?php echo $signPackage["appId"];?>',    //此处的appId等同于企业的CorpID
	  timestamp: <?php echo $signPackage["timestamp"];?>,
	  nonceStr: '<?php echo $signPackage["nonceStr"];?>',
	  signature: '<?php echo $signPackage["signature"];?>',
	  jsApiList: [
		// 所有要调用的 API 都要加到这个列表中
	   'getLocation', //获取地理位置接口  
	  ]
  });
function gg(){
	wx.getLocation({
        type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
        success: function (res) {
            var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
            var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
            var speed = res.speed; // 速度，以米/每秒计
            var accuracy = res.accuracy; // 位置精度
			console.log(res);
			alert(latitude);
        },
		cancel: function (res) {
			console.log(res);
			alert('用户拒绝授权获取地理位置');
		},
		error: function (res) {
			console.log(res);
			alert('错误');
		},
    });
}	
  wx.ready(function () {
	//TODO： 执行和jsapi相关的初始化操作
	 

  });
</script>
</html>