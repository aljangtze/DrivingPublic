@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>驾驶证服务搜索-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">驾驶证服务搜索</p>
</header>
<!--当前所在城市-->
<div class="dq_city">
	<p>您所在位置：<span>云南省昆明市</span></p>
        <form action="{{ url('tel/xyjszfw')."/".session()->get("Teluser") }}" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="input-group">
		  <input type="text" name="name" class="form-control" placeholder="请输入商家名称">
			  <span class="input-group-btn">
			  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i>搜索</button>
			  </span>
		</div>
	</form>
</div>
<p class="m_fg"></p>
<!--教练分类排序-->
<div class="jlxx_fl">
	<ul>
		<li class="fl_slect"><a href="{{ url('tel/xyjszfw')."/".session()->get("Teluser") }}">默认排序</a></li>
		<li><a href="#">成交数量 ↓</a></li>
	</ul>
</div>
<script>
	$(function(){
		$(".jlxx_fl li").click(function(){
			$(this).addClass("fl_slect").siblings().removeClass("fl_slect");
		});
	});
</script>
<!--搜索结果统计-->

<!--教练信息-->
<div class="coach_box">
	<ul style="margin-top:10px;">
            @foreach($items as $tmp)
		<li>
			<a href="{{ url('tel/xyjr')."/".$tmp->id."/".session()->get("Teluser") }}">
				<div class="coach_img">
					<img src="{{ asset('dppic')."/".$tmp->dppic }}" />
				</div>
			</a>
			<div class="coach_xx">
				<p><a href="{{ url('tel/xyjr')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->name }}</a></p>
				<!--<p>价格：￥200</p>-->
				<p>成交量：40</p>
				<p class="dhyc_p"><span>{{ $tmp->address }}</span></p>
			</div>
		</li>
            @endforeach
	</ul>
</div>
<div class="m_bs1"></div>
</body>
</html>
@endsection