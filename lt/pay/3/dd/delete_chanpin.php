<?php
include_once("config.php");
openDB();
$a=$_GET["b"];
$sql="delete  from dingdan where id=$a";
mysql_query($sql);
echo "<script>window.alert('¶©µ¥É¾³ý³É¹¦');location.href='dingdan.php'</script>";	
?>