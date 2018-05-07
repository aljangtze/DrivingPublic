@extends("pho.bases.comm.comm")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>我的学员-新司机网</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:86%;text-align:center;color:#fff;height:40px; line-height:40px;">我的学员</p>
</header>
<!--基本信息内容-->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>姓名</th>
            <th>联系电话</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border:none">张辉</td>
            <td style="border:none">15184126523</td>
            <td style="border:none"><a href="tel:15184126523" style="color: #29a7e2;"><span class="glyphicon glyphicon-earphone"></span>&nbsp;拨打电话</a></td>
        </tr>
    </tbody>
</table>
</body>
</html>
@endsection
