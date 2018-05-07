<?php 
session_start();
date_default_timezone_set('PRC');
?>
<?php
include_once("config.php");
openDB();
$a=$_GET["a"];
$b=$_GET["b"];//价格
$c=$_GET["c"];
$d=$_GET["d"];
$e=$_GET["e"];
$f=$_GET["f"];
$g=$_GET["g"];
$h=$_GET["h"];//微支付 0 支付宝 1
$i=$_GET["i"];//支付状态
$_SESSION["a13"]="计时培训";
$_SESSION["c13"]=$b;
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
$sql="Insert into dingdan2(a,b,c,d,e,f,g,h,i,j,k,l,m,n) values('$a','$b','$c','$d','$e','$f','$g','微信支付','2','$order_sn','$k','$journalTime','$m','$n')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: pay3/towxpay.php");
}else{
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaazhi3"]=$order_sn;
$sql="Insert into dingdan2(a,b,c,d,e,f,g,h,i,j,k,l,m,n) values('$a','$b','$c','$d','$e','$f','$g','支付宝支付','2','$order_sn','$k','$journalTime','$m','$n')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: alipaywap3/index.php?sn=$order_sn&jiage=$b&mingcheng=计时培训");
}
?>