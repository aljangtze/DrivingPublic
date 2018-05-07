<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>会员中心-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/public.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('phone/dist/css/dropify.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('phone/dist/js/dropify.js') }}"></script>
<script src="{{ asset('phone/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
</head>

<body>
    
    @yield("content")

    <div class="footer_nav">
  		<ul>
			<li>
				<a href="{{ url('jtel/navjx')."/".session()->get("jTeluser") }}">
					<!-- <img src="{{ asset('phone/images/dhxy.png') }}" alt="对话学员"/> -->
					<!-- <p>对话学员</p> -->
					<img src="{{ asset('phone/images/dhxy_1.png') }}" alt="对话学员"/>
					<p class="active">对话学员</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('jtel/lz')."/".session()->get("jTeluser") }}">
					<!-- <img src="{{ asset('phone/images/byw.png') }}" alt="办业务"/>
					<p>办业务</p> -->

					<img src="{{ asset('phone/images/byw_1.png') }}" alt="办业务"/>
					<p class="active">办业务</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('tel/qz')."/".session()->get("jTeluser") }}">
					<!-- <img src="{{ asset('phone/images/qz.png') }}" alt="圈子"/>
					<p>圈子</p> -->

					<img src="{{ asset('phone/images/qz_1.png') }}" alt="圈子"/>
					<p class="active">圈子</p>
				</a>	
			</li>
			<li>
				<a href="{{ url('jtel/jlcenter')."/".session()->get("jTeluser") }}">
					<!-- <img src="{{ asset('phone/images/wd.png') }}" alt="我的"/>
					<p>我的</p> -->

					<img src="{{ asset('phone/images/wd_1.png') }}" alt="我的"/>
					<p class="active">我的</p>
				</a>	
			</li>
		</ul>
  </div>
</body>
</html>
