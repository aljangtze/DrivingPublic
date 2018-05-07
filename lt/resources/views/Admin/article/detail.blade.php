<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>通知详情-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
</head>

<body>
<!--首页-->
<div class="p_file">
	<!--导航-->
	<div class="yw_nav" style="margin-top:0;">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">文章详情</li>
		</ol>
	</div>
	<!--通知详情-->
	<div class="tzxq">
		<p class="title">{{ $str->title }}</p>
		<p class="title_time">{{ $str->fbdate }}</p>
		<p class="tzxq_nr">{!!$str->content!!}</p>
	</div>
</div>
</body>
</html>
