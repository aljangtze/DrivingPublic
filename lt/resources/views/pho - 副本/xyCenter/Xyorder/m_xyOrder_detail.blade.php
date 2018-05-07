<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>订单详情-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">订单详情</p>
</header>
<!--详情列表-->
<div class="dd_xq">
    <!--驾校订单详情开始-->
    @if($type == 1)
	<p><strong>订单编号：</strong>{{ $str->h }}</p>
	<p><strong>名称：</strong>{{ $str->a }}</p>
	<p><strong>所报项目：</strong>@if($str->b == 1) VIP班 @endif  @if($str->b == 2) 普通班 @endif</p>
	<p><strong>联系电话：</strong>@if($arr == null) 暂时没有联系信息，请咨询客服热线 @endif  @if($arr !== null) {{ $arr->tel }} @endif</p>
	<p><strong>驾校位置：</strong>@if($arr == null) 暂时没有驾校位置信息，请咨询客服热线 @endif  @if($arr !== null) {{ $arr->jxaddress }} @endif</p>
	<p><strong>价格：</strong>￥{{ $str->e }}</p>
	<p><strong>状态：</strong>
        @if($str->j == 1) 已付款 @endif
        @if($str->j == 2) 未付款 @endif
        @if($str->j == 3) 已完成 @endif
        </p>
    @endif
    <!--驾校订单详情结束-->
    
    <!--教练订单详情开始-->
    @if($type == 2)
	<p><strong>订单编号：</strong>{{ $str->k }}</p>
	<p><strong>所报项目：</strong>@if($str->d == 1) VIP班 @endif  @if($str->d == 2) 普通班 @endif</p>
	<p><strong>联系电话：</strong>@if($arr == null) 暂时没有联系信息，请咨询客服热线 @endif  @if($arr !== null) {{ $arr->tel }} @endif</p>
	<p><strong>驾校位置：</strong>@if($arr == null) 暂时没有驾校位置信息，请咨询客服热线 @endif  @if($arr !== null) {{ $arr->jxaddress }} @endif</p>
	<p><strong>价格：</strong>￥{{ $str->e }}</p>
	<p><strong>状态：</strong>
        @if($str->h == 1) 已付款 @endif
        @if($str->h == 2) 未付款 @endif
        @if($str->h == 3) 已完成 @endif
        </p>
    @endif
    <!--教练订单详情开始-->
    
    <!--驾驶证服务和汽车服务订单详情开始-->
    @if($type == 3)
	<p><strong>订单编号：</strong>{{ $str->j }}</p>
	<p><strong>商家名称：</strong>{{ $str->b }}</p>
	<p><strong>所报项目：</strong>驾驶证服务/汽车服务</p>
	<p><strong>联系电话：</strong>@if($arr == null) 暂时没有联系信息，请咨询客服热线 @endif  @if($arr !== null) {{ $arr->tel }} @endif</p>
	<p><strong>受理地区：</strong>{{ $str->c }}</p>
	<p><strong>价格：</strong>￥{{ $str->d }}</p>
	<p><strong>状态：</strong>
        @if($str->f == 1) 已付款 @endif
        @if($str->f == 2) 未付款 @endif
        @if($str->f == 3) 已完成 @endif
        </p>
    @endif
    <!--驾驶证服务和汽车服务订单详情结束-->
    
    <!--计时培训订单详情开始-->
    @if($type == 4)
	<p><strong>订单编号：</strong>{{ $str->j }}</p>
	<p><strong>练车时间：</strong>{{ $str->a }}</p>
	<p><strong>所报项目：</strong>@if($str->i == 1) VIP班 @endif  @if($str->i == 2) 普通班 @endif</p>
	<p><strong>联系模式：</strong>@if($str->e == 1) 场地练习 @endif  @if($str->e == 2) 考试练习 @endif</p>
	<p><strong>联系电话：</strong>@if($arr == null) 暂时没有联系信息，请咨询客服热线 @endif  @if($arr !== null) {{ $arr->tel }} @endif</p>
	<p><strong>受理地区：</strong>{{ $str->f}}</p>
	<p><strong>价格：</strong>￥{{ $str->b }}</p>
	<p><strong>状态：</strong>
        @if($str->i == 1) 已付款 @endif
        @if($str->i == 2) 未付款 @endif
        @if($str->i == 3) 已完成 @endif
        </p>
    @endif
    <!--计时培训订单详情结束-->
</div>
<p class="m_fg"></p>
<!--条形码-->
<div class="txm">
	<p>商品条形码为：</p>
	<p><img src="{{ asset('phone/images/txm.jpg') }}"></p>
</div>
</body>
</html>
