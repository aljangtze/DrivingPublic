<?php
include_once("config.php");
openDB();
$a=$_GET["id"];
$sql="update dingdan set x=1 where id=$a";
mysql_query($sql);
echo "<script>location.href='http://ceshi.kmhujia.com/dd/dingdan.php'</script>";	
?>