@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>驾证服务项目-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1);" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">驾证服务项目</p>
</header>
<!--个人信息-->
<div class="m_xszq" >
	<div class="bg">
		<img src="{{ asset('phone/images/jszfw_bg.jpg') }}" alt="背景"  width="100%">
	</div>
	<div class="lt_title" style="width:96%;margin:0 auto;height:66px;">
		<div class="m_lttx column">
    		<img @if($userinfo->pic == "") src="{{ asset('phone/images/lttx.jpg') }}" @else  src="{{ asset('pic').'/'.$userinfo->pic }}" @endif alt="图片" class="img-thumbnail" style="height:70px;"/>    	
		</div>
		<div class="column m_lttx_name" style="margin-top:-19px; position:relative;">
			<p>{{ $data->name }} <span style="color:#555;">成交量：654</span></p>
			<p>地址：{{ $data->address }}</p>
		</div>
	</div>
</div>
<p class="m_fg"></p>
<!--服务项目-->
<div class="fwxm">
	<ul>
            @foreach($items as $tmp)
		<li>
			<p class="dhyc_p"><a href="{{ url('tel/xyxd')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->fwitem }}</a></p>
			<p class="jj_fwxm">{{ $tmp->iteminfo }}</p>
			<p>￥<em>{{ $tmp->fwprice }}</em>  <a href="{{ url('tel/xyxd')."/".$tmp->id."/".session()->get("Teluser") }}"><button class="btn_xd">去下单</button></a></p>
		</li>
            @endforeach
	</ul>
</div>
<div class="m_bs1"></div>
</body>
</html>
@endsection
