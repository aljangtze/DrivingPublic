<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>在线培训-云南伦途科技有限公司</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">在线培训</p>
</header>

<div class="px_box">
	<ul id="navs">
		<li>
			<p class="two"><a href="#">理论培训  <em>></em></a></p>
			<!--<ul id="son_nav1" class="s-hide">
				<li><a href="#">科目一</a></li>
				<li><a href="#">科目二</a></li>
				<li><a href="#">科目三</a></li>
				<li><a href="#">科目四</a></li>
			</ul>-->
		</li>
		<li>
			<p class="one"><a href="#">视频学习 <em>></em></a></p>
			<ul id="son_nav" class="s-hide">
				<li><a href="m_spkm1.html">科目一</a></li>
				<li><a href="#">科目二</a></li>
				<li><a href="#">科目三</a></li>
				<li><a href="#">科目四</a></li>
			</ul>
		</li>
		<li>
			<p class="three"><a href="#">学车直播 <em>></em></a></p>
			<!--<ul id="son_nav2" class="s-hide">
				<li><a href="#">科目二</a></li>
				<li><a href="#">科目三</a></li>
			</ul>-->
		</li>
		<li>
			<p class="three"><a href="#">练车技巧 <em>></em></a></p>
			<!--<ul id="son_nav2" class="s-hide">
				<li><a href="#">科目二</a></li>
				<li><a href="#">科目三</a></li>
			</ul>-->
		</li>
	</ul>
</div>

<script>
$(function(){
	$("#navs .one").click(function(){
		$("#son_nav").toggle(400);
	});
});
		
</script>
</body>
</html>
