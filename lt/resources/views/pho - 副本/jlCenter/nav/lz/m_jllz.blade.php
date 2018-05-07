@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>办业务-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">办业务</p>
</header>
 <!--幻灯片广告-->
 <div class="slide_container">
      <ul class="rslides" id="slider">
        @foreach($banner as $bb)
	<li>
          <img src="{{ asset('banner/')."/".$bb->banner }}" alt="幻灯片2">
        </li>
        @endforeach
      </ul>
  </div>
  <p class="m_fg"></p> 
<!--用户信息-横排-->
<div class="basic_hp">
	<ul>
		<li>
			<a href="{{ url('tel/lzjrzfw')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/jsz.png') }}" alt="驾证服务发布" /><p>驾证服务发布 </p></a>
		</li>
		<li>
			<a href="{{ url('tel/lzqcfw')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/qcfw.png') }}" alt="车辆服务发布" /><p>车辆服务发布 </p></a>
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
<div class="footer_nav">
  		<ul>
			<li>
				<a href="m_jlxc.html">
					<img src="{{ asset('phone/images/dhxy.png') }}" alt="对话学员"/>
					<p>对话学员</p>
				</a>	
			</li>
			<li>
				<a href="m_jllz.html">
					<img src="{{ asset('phone/images/byw.png') }}" alt="办业务"/>
					<p>办业务</p>
				</a>	
			</li>
			<li>
				<a href="m_jlqz.html">
					<img src="{{ asset('phone/images/qz.png') }}" alt="常用"/>
					<p>圈子</p>
				</a>	
			</li>
			<li>
				<a href="m_jlCenter.html">
					<img src="{{ asset('phone/images/wd.png') }}" alt="我的"/>
					<p>我的</p>
				</a>	
			</li>
		</ul>
  </div>

<script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
<script>

</script>
</body>
</html>
@endsection
