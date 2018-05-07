<?php

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {
	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号
	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];


    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
	
include_once("../config.php");
openDB();
session_start();
$aaazhi=$_SESSION["aaazhi"];
$sql="update dingdan set f='1' where h='$aaazhi3'";
mysql_query($sql);
echo "<script>window.alert('订单已支付完毕,正在为你跳转首页！');location.href='http://233.hjlink.com'</script>";	

	echo "验证成功<br />";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    
    echo "验证失败";
}
?>
<?php
//include_once("../config.php");
//openDB();
//session_start();
//$aaazhi=$_SESSION["aaazhi"];
//$sql="update dingdan set h='1' where g='$aaazhi'";
//mysql_query($sql);
//echo "<script>window.alert('订单已支付完毕,正在为你跳转首页！');location.href='http://www.ynjince.com'</script>";	
?>
        <title>支付宝手机支付</title>
	</head>
    <body>
    </body>
</html>