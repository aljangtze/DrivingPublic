<?php 
session_start();
date_default_timezone_set('PRC');
?>
<?php
include_once("config.php");
openDB();
$a=$_GET["a"];//学车时间
$b=$_GET["b"];
$c=$_GET["c"];
$d=$_GET["d"];//价格
$e=$_GET["e"];//微支付 0 支付宝 1
$f=$_GET["f"];//支付状态
$g=$_GET["g"];
$h=$_GET["h"];
$i=$_GET["i"];
$_SESSION["a12"]="驾驶证培训";
$_SESSION["c12"]=$d;
$k=$_GET["k"];
$l=$_GET["l"];
$m=$_GET["m"];
$n=$_GET["n"];//区分家小
$o=$_GET["o"];
//echo $a.$b.$c.$d.$e;
//echo exit();
$journalTime=Date("Y-m-d H:i:s");
if($e==1){
	//echo "正在接入";
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaa"]=$order_sn;
$sql="Insert into dingdan1(a,b,c,d,e,f,g,h,i,j,k,l,m,n) values('$a','$b','$c','$d','微信支付','2','$g','$h','$i','$order_sn','$k','$journalTime','$m','$n')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: pay2/towxpay.php");
}else{
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaazhi2"]=$order_sn;
$sql="Insert into dingdan1(a,b,c,d,e,f,g,h,i,j,k,l,m,n) values('$a','$b','$c','$d','支付宝支付','2','$g','$h','$i','$order_sn','$k','$journalTime','$m','$n')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: alipaywap2/index.php?sn=$order_sn&jiage=$d&mingcheng=驾驶证培训");
}
?>