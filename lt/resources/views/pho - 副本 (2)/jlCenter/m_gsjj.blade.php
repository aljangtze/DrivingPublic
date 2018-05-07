@extends("pho.bases.comm.comm")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>关于我们-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">关于我们</p>
</header>
<!--关于内容-->
<div class="gynr">
	<p class="lxfs">{!!$str->content!!}</p>
</div>
@if($type == '2')
@include("pho.bases.comm.xytf");
@endif
@if($type == '1')
@include("pho.bases.comm.jltf");
@endif
</body>
</html>
@endsection
