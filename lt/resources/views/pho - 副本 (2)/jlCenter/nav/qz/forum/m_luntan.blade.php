<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>论坛交流-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">论坛交流</p>
</header>
<!--论坛交流-->
<div calss="m_xszq">
	<img src="{{ asset('phone/images/ltbg.jpg') }}" alt="论坛背景"  width="100%">
	<div class="lt_title">
		<div class="m_lttx column">
    		<img src="{{ asset('forumsets')."/".$ltinfo->forumset_pic }}" alt="论坛交流区图片" class="img-thumbnail" />    	
		</div>
		<div class="column m_lttx_name">
			<p>论坛交流 <span>贴数：{{ $count }}</span></p>
			<p>论坛简述：{{ $ltinfo->info }}</p>
		</div>
	</div>
	<div class="btn_ft">
            <button onclick="window.location='{{ url('tel/forumft')."/".session()->get("Teluser") }}'" type="button" class="btn btn-primary"><a href="{{ url('tel/forumft')."/".session()->get("Teluser") }}"><em class="glyphicon glyphicon-edit"></em>晒一晒</a></button>
	</div>
</div>
<p class="m_fg"></p>
<!--热门话题-->
<div class="xs_content">
	<ul>
            @foreach($list as $tmp)
            @if($tmp->px != 0)
		<li>
			<p class="dhyc_p"><a href="{{ url('tel/forumdetail')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->title }}</a></p>
			<p class="xs_jj">{{ $tmp->info }}</p>
			<ul class="xs_subul">
				<li>
                    @if($tmp->fj != null)
					<img src="{{ asset('forum')."/".$tmp->fj }}">
                    @endif
                    @if($tmp->fj = null)
                    @endif
				</li>
			</ul>
			<p class="m_ty_date"><img src="{{ asset('phone/images/yj_icon.png') }}">{{ $tmp->show }} <span>{{ $tmp->fbdate }}</span></p>
		</li>
                @endif
            @endforeach
            @foreach($lista as $tmp)
            @if($tmp->px == 0)
		<li>
			<p class="dhyc_p"><a href="{{ url('tel/forumdetail')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->title }}</a></p>
			<p class="xs_jj">{{ $tmp->info }}</p>
			<ul class="xs_subul">
				<li>
                                    @if($tmp->fj != null)
					<img src="{{ asset('forum')."/".$tmp->fj }}">
                                    @endif
                                    @if($tmp->fj = null)
                                    @endif
				</li>
			</ul>
			<p class="m_ty_date"><img src="{{ asset('phone/images/yj_icon.png') }}">{{ $tmp->show }} <span>{{ $tmp->fbdate }}</span></p>
		</li>
                @endif
            @endforeach
	</ul>
</div>

<p class="clearfix"></p>

</body>
</html>
