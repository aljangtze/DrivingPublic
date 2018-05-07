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
<div class="p_file" style="height:auto">
	<!--导航-->
	<div class="yw_nav" style="margin-top:0;">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">详情</li>
		</ol>
	</div>
	<!--通知详情-->
	<div class="tzxq">
		<p class="title">{{ $str->jxname }}</p>
		<p class="title_time">发布日期：{{ $str->fbdate }}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">驾校编号:</label>{{ $str->bh }}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">负责人:</label>{{ $str->name }}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">联系电话:</label>{{ $str->tel }}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">驾校位置:</label>{{ $str->address }}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">驾校简介:</label>{{ $str->content }}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">训练场地：</label>{!!$str->xlcd!!}</p>
                <p class="tzxq_nr" style="font-size: 16px"><label style="font-size: 18px;font-weight: bold">办公环境：</label>{!!$str->bghj!!}</p>
	</div>
</div>
</body>
</html>
