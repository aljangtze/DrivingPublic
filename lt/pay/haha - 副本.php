<?php 
date_default_timezone_set('PRC');
?>
<?php
include_once("conn/config.php");
openDB();
$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["c"];
$d=$_POST["d"];
$e=$_POST["e"];
$f=$_POST["f"];
$g=$_POST["g"];
$h=$_POST["h"];
$i=$_POST["i"];
$j=$_POST["j"];
$k=$_POST["k"];
$l=$_POST["l"];
$m=$_GET["m"];
$n=$_GET["n"];
$o=$_GET["o"];
$p=$_GET["p"];
$q=$_GET["p1"];
$r=$_GET["p2"];
$s=$_GET["p3"];
$t=$_GET["p4"];
$u=$_GET["p5"];
$bbc=$q+$$s+$u;
$miaoshu="$p$q$r$s$t$u";
$journalTime=Date("Y-m-d H:i:s");
if($l=="现金/刷卡"){
$sql="Insert into yuding(cheliang,taocan,xingming,dianhua,chepai,licheng,shijian,didian,beizhu,fukuan,zongjia,time) values('$m&nbsp;$n&nbsp;$o','$p&nbsp;$q&nbsp;$r&nbsp;$s&nbsp;$t&nbsp;$u','$e','$f','$g','$h','$i','$j','$k','$l','$bbc','$journalTime')";
mysql_query($sql);
mysql_query("set names 'utf8'");
echo "<script>window.alert('预定信息提交成功');location.href='index.php'</script>";	
}else{
$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
$sql="Insert into yuding(cheliang,taocan,xingming,dianhua,chepai,licheng,shijian,didian,beizhu,fukuan,zongjia,time,bianhao) values('$m&nbsp;$n&nbsp;$o','$p&nbsp;$q&nbsp;$r&nbsp;$s&nbsp;$t&nbsp;$u','$e','$f','$g','$h','$i','$j','$k','$l','$bbc','$journalTime','$order_sn')";
mysql_query($sql);
mysql_query("set names 'utf8'");
header("Location: pay/index.php?sn=$order_sn&ddms=$miaoshu&zongjia=$bbc");
}
?>