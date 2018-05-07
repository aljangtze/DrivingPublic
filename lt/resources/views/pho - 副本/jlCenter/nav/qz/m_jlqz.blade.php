@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>圈子-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">圈子</p>
</header>
 <!--幻灯片广告-->
 <div class="slide_container">
      <ul class="rslides" id="slider">
          @foreach($banner as $bb)
	<li>
          <img src="{{ asset('banner')."/".$bb->banner }}" alt="幻灯片2">
        </li>
        @endforeach
      </ul>
  </div>
  <p class="m_fg"></p> 
<!--用户信息-横排-->
<div class="basic_hp">
	<ul>
		<li>
			<a href="{{ url('tel/forum')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/zxlt.png') }}" alt="看一看" /><p>看一看 </p></a>
		</li>
		<li>
			<a href="{{ url("tel/qzzsfx")."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/wypx.png') }}" alt="晒一晒" /><p>晒一晒 </p></a>
		</li>
	</ul>
</div>
<p class="m_fg"></p>
<!--列表-->
@include("pho.bases.comm")
<p class="m_bsfg" style="height:50px;margin-bottom:6px;"></p>
<script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
<script>

</script>
</body>
</html>
@endsection

