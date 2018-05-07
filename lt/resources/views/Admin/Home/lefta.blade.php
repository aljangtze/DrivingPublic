<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
</head>

<body style="overflow-x:hidden;width:200px;height:auto;background-color:#f4f4f4;">
<!--左边内容-->
<div class="left_content">
	<ul class="l_nav">
		<li>
			<p>内容管理</p>
		</li>
		<li><a href="{{ url('admin/gallery') }}" target="mainFrame"><span>图片管理</span></a></li>
		<li><a href="ddlr.html" target="mainFrame"><span>订单录入</span></a></li>	
		<li><a href="ddxg.html" target="mainFrame"><span>订单修改</span></a></li>
		<li><a href="dsh.html" target="mainFrame"><span>待审核</span></a></li>
		<li><a href="shtg.html" target="mainFrame"><span>审核通过</span></a></li>	
		
		<li>
			<p>企业中心</p>
		</li>
		<li><a href="{{ url('admin/jpfw')."/"."2" }}" target="mainFrame"><span>驾培服务</span></a></li>
		<li><a href="{{ url('admin/qcfw') }}" target="mainFrame"><span>汽车服务</span></a></li>
		<li><a href="{{ url('admin/jszfw') }}" target="mainFrame"><span>驾驶证服务</span></a></li>
		
		<li>
			<p>个人中心</p>
		</li>
		<li><a href="{{ url('admin/grjpfw') }}" target="mainFrame"><span>驾培服务</span></a></li>
		<li><a href="{{ url('admin/grqcfw') }}" target="mainFrame"><span>汽车服务</span></a></li>
		<li><a href="{{ url('admin/grjrzfw') }}" target="mainFrame"><span>驾驶证服务</span></a></li>
		
		<li>
			<p>投稿管理</p>
		</li>
		<li><a href="{{ url('admin/wytg') }}" target="mainFrame"><span>投稿列表</span></a></li>
                
		<li>
			<p>幻灯片管理</p>
		</li>
		<li><a href="{{ url('admin/banner') }}" target="mainFrame"><span>幻灯片列表</span></a></li>
		<li><a href="{{ url('admin/banner/create') }}" target="mainFrame"><span>添加幻灯片</span></a></li>
		
		<li>
			<p>系统管理</p>
		</li>
		<li><a href="{{ url('admin/user/create') }}" target="mainFrame"><span>添加帐号</span></a></li>
		<li><a href="{{ url('admin/user') }}" target="mainFrame"><span>管理账户</span></a></li>
	</ul>
</div>

<script>
$(function(){
	$(".l_nav li").click(function(){
		$(this).addClass("actives").siblings().removeClass("actives");	
	});
});

</script>
</body>
</html>
