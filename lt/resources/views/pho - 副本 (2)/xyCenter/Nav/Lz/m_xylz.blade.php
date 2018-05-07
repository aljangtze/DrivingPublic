@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>有证-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">有证</p>
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
<!--用户信息-横排-->
<div class="basic_hp">
	<ul>
		<li>
			<a href="{{ url('tel/xyjszfw')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/jsz.png') }}" alt="汽车服务发布" /><p>驾驶证服务 </p></a>
		</li>
		<li>
			<a href="{{ url('tel/xyqc')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/qcfw.png') }}" alt="车务发布" /><p>车辆服务 </p></a>
		</li>
		<li>
			<a href="http://yn.122.gov.cn/"><img src="{{ asset('phone/images/wzcx.png') }}" alt="网上车管所" /><p>网上车管所 </p></a>
		</li>
	</ul>
</div>
<p class="m_fg"></p>
<!--列表-->
@include("pho.bases.comm")

<p class="m_bsfg" style="height:50px;margin-bottom:6px;"></p>
<!--底部导航-->

<script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
<script>

</script>
</body>
</html>
@endsection