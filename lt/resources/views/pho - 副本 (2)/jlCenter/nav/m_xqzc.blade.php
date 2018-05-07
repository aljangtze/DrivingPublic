@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>学员需求-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">学员需求</p>
</header>
<!--需求查找-->
<div class="xqcz">
	<ul>
            @foreach($items as $tmp)
		<li>
			<P class="xqbt p_row"><a href="{{ url('tel/jlxyxqdetail')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->title }}</a></P>
			<p>{{ $tmp->fbdate }}<span>发布人：{{ $tmp->name }}</span></p>
		</li>
            @endforeach
	</ul>
</div>

</body>
</html>
@endsection
