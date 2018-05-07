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
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">知识分享</p>
</header>
<!--热门话题-->
<div class="m_new">
	<ul>
            @foreach($items as $tmp)
		<li>
			<div class="column new_img">
				<a href="{{ url('tel/qzzsfxdetail')."/".$tmp->id."/".session()->get("Teluser") }}"><img src="{{ asset('article')."/".$tmp->pic }}"></a>
			</div>
			<div class="column_r new_nr">
				<p class="dhyc_p"><a href="{{ url('tel/qzzsfxdetail')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->title }}</a></p>
				<div class="new_jj">{!!$tmp->content!!}</div>
				<p class="new_date"><img src="{{ asset('phone/images/yj_icon.png') }}">{{ $tmp->show }}<span>{{ $tmp->fbdate }}</span></p>
			</div>
		</li>
            @endforeach
	</ul>
</div>

<p class="clearfix"></p>
</body>
</html>
