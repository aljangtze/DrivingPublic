<?php 
session_start();
date_default_timezone_set('PRC');
?>
<?php
include_once("config.php");
openDB();
$a=$_GET["a"];//店铺名、产品名、视频名
$b=$_GET["b"];
$c=$_GET["c"];
$d=$_GET["d"];
$e=$_GET["e"];//价格
$f=$_GET["f"];//微支付 0 支付宝 1
$g=$_GET["g"];
$h=$_GET["h"];
$i=$_GET["i"];
$_SESSION["a1"]=$a;
$_SESSION["c1"]=$e;
$k=$_GET["k"];
$l=$_GET["l"];
$m=$_GET["m"];
$n=$_GET["n"];
$o=$_GET["o"];

//echo $a.$b.$c.$d.$e;
//echo exit();
$journalTime=Date("Y-m-d H:i:s");
if($f==1){
	//echo "正在接入";
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaa"]=$order_sn;
$sql="Insert into dingdan(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o) values('$a','$b','$c','$d','$e','微信支付','$g','$order_sn','$i','2','$k','$journalTime','$m','$n','$o')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: pay/towxpay.php");
}else{
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaazhi"]=$order_sn;
$sql="Insert into dingdan(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o) values('$a','$b','$c','$d','$e','支付宝支付','$g','$order_sn','$i','2','$k','$journalTime','$m','$n','$o')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: alipaywap/index.php?sn=$order_sn&jiage=$e&mingcheng=$a");
}
?>