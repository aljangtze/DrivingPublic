@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>个人中心-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">个人中心</p>
</header>
 <!--幻灯片广告-->
 <div class="slide_container">
      <ul class="rslides" id="slider">
          @foreach($banner as $bb)
        <li>
          <img src="{{ asset('banner')."/".$bb->banner }}" alt="幻灯片3">
        </li>
        @endforeach
      </ul>
</div>
  <p class="m_fg"></p> 
<!--用户帐号-->
<div class="m_user">
	<div class="tx column">
    	<a href="{{ url('tel/jlinfo')."/".session()->get("Teluser")."/"."2" }}"><img src="{{ asset('pic')."/".$userinfo->pic }}" class="img-rounded"></a>
    </div>
    <div class="zh column">
    	<p>账号：{{ $userinfo->nickname }} <a href="{{ url('tel/znx')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/znx.png') }}"><em>({{ $ucount }})</em></a></p>
    	<p>资产：<em>{{ $userinfo->integral }}</em>元</p>
    	<p><a href="{{ url("tel/tx")."/".session()->get("Teluser") }}" style="margin-right:10px;">提现</a> <a href="{{ url("tel/txmx")."/".session()->get("Teluser") }}" style="margin-right:10px;">查看明细</a> <a href="{{ url('forgetpass') }}">修改密码</a></p>
    </div>
</div>
<p class="m_fg" style="margin-bottom:0px;"></p>
<!--用户信息-竖排-->
<div class="basic_info">
	<div class="m_orders">
		<a href="{{ url('tel/jlinfo')."/".session()->get("Teluser")."/"."2" }}"><img src="{{ asset('phone/images/jbxx.png') }}" alt="基本信息" /><p>基本信息 <span>></span></p></a>
	</div>
    <div class="m_orders">
		<a href="{{ url('tel/xyorders')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/ddgl.png') }}" alt="我的订单" /><p>我的订单 <span>></span></p></a>
	</div>
	<div class="m_orders">
		<a href="{{ url('tel/wytg')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/wytg.png') }}" alt="我要投稿" /><p>我要投稿 <span>></span></p></a>
	</div>
	<div class="m_orders">
		<a href="{{ url('tel/xytsjb')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/jubao.png') }}" alt="投诉举报" /><p>投诉举报 <span>></span></p></a>
	</div>
	<div class="m_orders">
		<a href="{{ url("tel/jl/gsjj")."/".session()->get("Teluser")."/"."2" }}"><img src="{{ asset('phone/images/guwm.png') }}" alt="关于我们" /><p>关于我们 <span>></span></p></a>
	</div>
	<div class="m_orders">
		<a href="{{ url("tel/xywdfb") }}"><img src="{{ asset('phone/images/guwm.png') }}" alt="我的发布" /><p>我的发布 <span>></span></p></a>
	</div>
	<div class="m_orders">
		<a href="{{ url("tel/czsm") }}"><img src="{{ asset('phone/images/guwm.png') }}" alt="操作说明" /><p>操作说明 <span>></span></p></a>
	</div>
</div>
<!--退出登录-->
<div class="pull_out">
	<a href="{{ url('tel/login')."/".session()->get("Teluser") }}"><button type="button">退出登录</button></a>
</div>
<p class="m_bsfg" style="width:100%;clear:both;height:50px;margin-bottom:12px;"></p>



<script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
</body>
</html>
@endsection
