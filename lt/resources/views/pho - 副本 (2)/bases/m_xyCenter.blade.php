<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>学员中心-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/public.css') }}" />
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/menudown.js') }}" ></script>
<script src="{{ asset('phone/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('phone/css/menudown.css') }}" />
<link href="{{ asset('phone/css/city-picker.css') }}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ asset('phone/js/select-time.js') }}"></script>
</head>

<body>
    @yield("content")
    
<div class="footer_nav">
  		<ul>
			<li>
				<a href="{{ url('tel/xyxc')."/".session()->get("Teluser") }}">
					<!-- <img src="{{ asset('phone/images/bm.png') }}" alt="报名"/> -->
					<!-- <p>报名</p> -->
					<img src="{{ asset('phone/images/bm_1.png') }}" alt="报名"/>
					<p class="active">报名</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/xylz')."/".session()->get("Teluser") }}">
					<!-- <img src="{{ asset('phone/images/yz.png') }}" alt="有证"/>
					<p>有证</p> -->

					<img src="{{ asset('phone/images/yz_1.png') }}" alt="有证"/>
					<p class="active">有证</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/xyqz')."/".session()->get("Teluser") }}">
					<!-- <img src="{{ asset('phone/images/qz.png') }}" alt="常用"/>
					<p>圈子</p> -->

					<img src="{{ asset('phone/images/qz_1.png') }}" alt="常用"/>
					<p class="active">圈子</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/xycenter')."/".session()->get("Teluser") }}">
					<!-- <img src="{{ asset('phone/images/wd.png') }}" alt="我的"/>
					<p>我的</p> -->

					<img src="{{ asset('phone/images/wd_1.png') }}" alt="我的"/>
					<p class="active">我的</p>
				</a>	
			</li>
		</ul>
  </div>
<!--加载时执行模态框，一天一次-->
</body>
</html>
