<?php
include_once("config.php");
openDB();
$a=$_GET["b"];
$sql="delete  from dingdan where id=$a";
mysql_query($sql);
echo "<script>window.alert('����ɾ���ɹ�');location.href='dingdan.php'</script>";	
?>