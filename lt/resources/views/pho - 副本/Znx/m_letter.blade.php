<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>站内信-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">站内信</p>
</header>
<!--详情-->
<div class="znx">
	<ul>
            @foreach($items as $tmp)
		<li>
			<p class="znx_title">@if($tmp->qf == 5) {!!$tmp->content!!} @else {{ $tmp->info }} @endif</p>
                        @if($tmp->qf == 1) 
			<p class="znx_title">申请项目：
                        专项训练
                            @if($tmp->type == 1) 驾培服务 @endif
                            @if($tmp->type == 2) 汽车服务 @endif
                            @if($tmp->type == 3) 驾驶证服务 @endif】
                        </p>
                        @endif
                        @if($tmp->qf ==0) 
                            @if($tmp->type == 1)
			<p class="znx_title">申请项目：
                            驾培服务
                        </p>
                            @endif
                            @if($tmp->type == 2)
			<p class="znx_title">申请项目：
                            汽车服务
                        </p>
                            @endif
                            @if($tmp->type == 3)
			<p class="znx_title">申请项目：
                            驾驶证服务
                        </p>
                            @endif
                        @endif
                        @if($tmp->sha == 1)
			<p class="znx_title">审核状态：
                        <font color="blue">已通过</font>
                        </p>
                        @endif
                        @if($tmp->sha == 2)
			<p class="znx_title">审核状态：
                        <font color="red">未通过</font>
                        </p>
                        @endif
                        <p class="znx_date"><button onclick="window.location='{{ url("tel/znxdel")."/".$tmp->id }}'">删除</button> <span>{{ $tmp->fbdate }}</span></p>
		</li>
            @endforeach
	</ul>
</div>

</body>
</html>
