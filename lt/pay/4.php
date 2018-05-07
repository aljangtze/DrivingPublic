<?php 
session_start();
date_default_timezone_set('PRC');
?>
<?php
include_once("config.php");
openDB();
$a=$_GET["a"];
$b=$_GET["b"];//店铺名、产品名、视频名
$c=$_GET["c"];
$d=$_GET["d"];
$e=$_GET["e"];//价格
$f=$_GET["f"];
$g=$_GET["g"];//微支付 0 支付宝 1
$h=$_GET["h"];//支付状态
$i=$_GET["i"];
$_SESSION["a13"]="教练培训";
$_SESSION["c13"]=$e;
$k=$_GET["k"];
$l=$_GET["l"];
$m=$_GET["m"];
$n=$_GET["n"];//区分家小
$j=$_GET["j"];
//echo $a.$b.$c.$d.$e;
//echo exit();
$journalTime=Date("Y-m-d H:i:s");
if($g==1){
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaa"]=$order_sn;
$sql="Insert into dingdan3(a,b,c,d,e,f,g,h,i,j,k,l,m,n) values('$a','$b','$c','$d','$e','$f','微信支付','2','$i','$j','$order_sn','$journalTime','$m','$n')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: pay4/towxpay.php");
}else{
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaazhi4"]=$order_sn;
$sql="Insert into dingdan3(a,b,c,d,e,f,g,h,i,j,k,l,m,n) values('$a','$b','$c','$d','$e','$f','支付宝支付','2','$i','$j','$order_sn','$journalTime','$m','$n')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: alipaywap3/index.php?sn=$order_sn&jiage=$e&mingcheng=教练培训");
}
?>