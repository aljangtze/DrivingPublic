<?php 
date_default_timezone_set('PRC');
?>
<?php
   error_reporting(E_ALL & ~E_NOTICE);
   function openDB()
   {
   	   $serverLink=@mysql_connect("localhost","root","root") or die("�������ݿ������ʧ��");//�������ݿ����
	   mysql_query("set names 'utf8'");//ѡ�ַ�����ֹ����
	   $dbLink=@mysql_select_db("jiaoyu",$serverLink) or die("�������ݿ�ʧ��");//ѡ�����ݿ� 
   }
?>