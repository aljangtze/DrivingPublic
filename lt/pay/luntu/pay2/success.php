<?php 
header('Access-Control-Allow-Origin:http://127.0.0.1:5729');
include_once("../config.php");
openDB();
session_start();
$sn=$_SESSION["sn"];
$sql="update demo_xq set f=1 where h='$sn'";
mysql_query($sql);
mysql_query("set names 'utf-8'");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>pay success</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="dist/css/dropify.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/mobiscroll_002.js" type="text/javascript"></script>
<script src="js/mobiscroll_004.js" type="text/javascript"></script>
<link href="css/mobiscroll_002.css" rel="stylesheet" type="text/css">
<script src="js/mobiscroll.js" type="text/javascript"></script>
<script src="js/mobiscroll_003.js" type="text/javascript"></script>
<script src="js/mobiscroll_005.js" type="text/javascript"></script>
<link href="css/mobiscroll_003.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="btn_help">
<a href="http://www.xsjwang.com/tel/login"><button id="btn_fb" align="center">返回首页</button></a>
</div>
</body>
</html>