@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>对话学员-新司机网</title>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">对话学员</p>
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
			<a href="{{ url('tel/jlxyxq')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/fbxq.png') }}" alt="学员需求" /><p>学员需求 </p></a>
		</li>
		<li>
			<a href="{{ url("tel/addclass")."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/vip.png') }}" alt="班型发布" /><p>班型发布</p></a>
		</li>
		<li>
			<a href="{{ url("tel/lession")."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/jsxm.png') }}" alt="计时项目发布" /><p>计时培训发布 </p></a>
		</li>
		<li>
			<a href="{{ url('tel/wszx')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/zxpx.png') }}" alt="网上自学" /><p>网上自学 </p></a>
		</li>
		<li>
			<a href="http://www.122.gov.cn/"><img src="{{ asset('phone/images/yyks.png') }}" alt="预约考试" /><p>预约考试 </p></a>
		</li>
	</ul>
</div>
<p class="m_fg"></p>
<!-- <div id="cover-bg"></div>
<div class="alert_windows">
	<span>X</span>
	<p class="gg_title">弹窗广告</p>
	<div class="tc_content">
		<p>{{ $adver->title }}，详情请点击<a href="http://{{ $adver->url }}">此链接查看</a></p>
		<a href="http://{{ $adver->url }}">
</div> -->
	</div>
<div id="cover-bg"></div>
    <div class="alert_windows">
    	<div class="alert_head">
        	<span onclick="closeGlobalAd();">X</span>
        	<!--<p class="gg_title">弹窗广告</p>-->
        </div>
        <div class="tc_content">
            <p><a href="http://{{ $adver->url }}" onclick="redirectUrlToActive();">{{ $adver->title }} 详情请点击</a></p>
            <img src="{{ asset('advers')."/".$adver->advers }}"></a>
        </div>
    </div>
<!--列表-->
@include("pho.bases.comm")
<p class="m_bsfg" style="height:50px;margin-bottom:6px;"></p>
<script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/cookie.js') }}"></script>
<script>

</script>
</body>
</html>
@endsection