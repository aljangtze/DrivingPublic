<?php 
date_default_timezone_set('PRC');
?>
<?php
   error_reporting(E_ALL & ~E_NOTICE);
   function openDB()
   {
   	   $serverLink=@mysql_connect("localhost","root","123456t!!!") or die("连接数据库服务器失败");//连接数据库服务
	   mysql_query("set names 'utf8'");//选字符，防止乱码
	   $dbLink=@mysql_select_db("pj",$serverLink) or die("连接数据库失败");//选择数据库 
   } 
?>