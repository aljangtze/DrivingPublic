<?php 
session_start();
date_default_timezone_set('PRC');
?>
<?php
include_once("config.php");
openDB();
$a=$_GET["a"];//店铺名、产品名、视频名
$b=$_GET["b"];//上面的ID
$c=$_GET["c"];//价格
$d=$_GET["d"];//用户电话
$e=$_GET["e"];//微支付 0 支付宝 1
$l=$_GET["l"];//会员ID
$i=$_GET["i"];
$_SESSION["a1"]=$a;
$_SESSION["c1"]=$c;
$j=$_GET["j"];//价格
$k=$_GET["k"];//用户电话
$l=$_GET["l"];
//echo $a.$b.$c.$d.$e;
//echo exit();
$journalTime=Date("Y-m-d H:i:s");
if($e==1){
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaa"]=$order_sn;
$sql="Insert into dingdan(a,b,c,d,e,f,g,k,l,m,n) values('$a','$b','$c','$d','微信支付','$journalTime','$order_sn','$i','$j','$k','$l')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: example/jsapi.php");
}else{
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$_SESSION["aaazhi"]=$order_sn;
$sql="Insert into dingdan(a,b,c,d,e,f,g,k,l,m,n) values('$a','$b','$c','$d','支付宝支付','$journalTime','$order_sn','$i','$j','$k','$l')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: alipaywap/index.php?sn=$order_sn&jiage=$c&mingcheng=$a");
}
?>