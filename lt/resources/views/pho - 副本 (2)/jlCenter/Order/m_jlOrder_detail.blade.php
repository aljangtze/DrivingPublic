@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>订单详情-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">订单详情</p>
</header>
<!--详情列表-->
<div class="dd_xq">
	<p><strong>订单编号：</strong>YN800201706301001</p>
	<p><strong>标题：</strong>{{ $str->title }}</p>
	<p><strong>简介：</strong>
        @if($str->selitem == 1) 科目一 @endif
        @if($str->selitem == 2) 科目二 @endif
        @if($str->selitem == 3) 科目三 @endif
        @if($str->selitem == 4) 科目四 @endif
        @if($str->selitem == 5) 定制报名 @endif
                                
        @if($str->itemtype == 1) 场地练习 @endif
        @if($str->itemtype == 2) 考试车练习 @endif
        @if($str->itemtype1 == 3) 考试路训 @endif
        @if($str->itemtype1 == 4) 长途路训 @endif
        @if($str->itemtype1 == 5) 考试路训(考试车)@endif
        </p>
	<p><strong>价格：</strong>￥200</p>
	<p><strong>状态：</strong>
        @if($str->payzt == 1) 已付款 @endif
        @if($str->payzt == 2) 未付款 @endif
        @if($str->payzt == 3) 已完成 @endif
        </p>
</div>
<p class="m_fg"></p>
<!--条形码-->
<div class="txm">
	<p>商品条形码为：</p>
	<p><img src="{{ asset('phone/images/txm.jpg') }}"></p>
</div>
</body>
</html>
@endsection
