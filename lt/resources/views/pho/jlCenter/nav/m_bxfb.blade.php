@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>班型发布-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">班型发布</p>
</header>
<!--VIP班发布内容-->
<ul class="xx_ul">
	<li>
        <a href="{{ url('jtel/addclassvip')."/".session()->get("jTeluser") }}">VIP班型 <em>></em></a>
    </li>
    <li>
        <a href="{{ url('jtel/normal')."/".session()->get("jTeluser") }}">普通班型 <em>></em></a>
    </li>
</ul>


</body>
</html>
@endsection
