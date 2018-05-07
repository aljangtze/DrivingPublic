<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>确认订单-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">确认订单</p>
</header>
<!--订单详情-->
<div class="order_box">
	<p><strong>{{ session()->get("Teluser") }}</strong>，请确认以下订单信息：</p>
	<ul class="order_xq">
		<li><p><span>订单标题：</span> {{ $arr->jxname }}</p></li>
		<li><p><span>下单时间：</span> {{ $date }}</p></li>
		<li><p><span>商品价格：</span> ￥{{ $data["price"] }}</p></li>
		<li><p><span>预约班型：</span> @if($data["classtype"] == 1)VIP班@endif @if($data["classtype"] == 2)普通班@endif</p></li>
		<!--<li><p><span>预约时间：</span> 2017-08-10</p></li>-->
	</ul>
</div>
<p class="m_fg"></p>
<!--定金方式-->
<div class="select_fk">
	<p class="pay_way">请选择以下付款方式：</p>
	<div class="select-pay">
		<!-- <select class="form-control">
                    <option value="0" onclick="doxd('0')">预约金200</option>
                    <option value="1" onclick="doxd('1')">全额支付</option>
		</select> -->
		<ul>
			<li value="0" onclick="doxd('0')">预约金200</li>
			<li value="1" onclick="doxd('1')">全额支付</li>
		</ul>
	</div>
</div>
<!--支付方式-->
<div class="select_way">
    <a class="btn-wx" style="margin-right:15px;" onclick="dopay('1')">微信支付</a>
	<a class="btn-zfb" onclick="dopay('0')">支付宝支付</a>
</div>
<form action="{{ url('tel/zzfbpay/pay') }}" method="post" name="myform" style="display:none">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="fktype" id="fktype" value="1">
    <input type="hidden" name="jid" id="fktype" value="{{ $data['jid'] }}">
    <input type="hidden" name="bid" id="bid" value="{{ $data['bid'] }}">
    <input type="hidden" name="price" id="price" value="{{ $data['price'] }}">
    <input type="hidden" name="paytype" id="paytype" value="">
    <input type="hidden" name="qf" id="qf" value="{{ $data['qf'] }}">
    <input type="hidden" name="nickname" id="nickname" value="{{ session()->get("Teluser") }}">
    <input type="hidden" name="bainhao" id="nickname" value="{{ $data["bainhao"] }}">
</form>
<script>
function doxd(fktype) {
    $("#fktype").val(fktype);
}
function dopay(paytype) {
	$("#paytype").val(paytype);
    var form = document.myform;
    form.action = "{{ url('tel/zzfbpay/pay') }}";
    form.submit();
}
</script>
<!--说明-->
<div class="ps">
	<p>Ps：</p>
	{!!$str->zfsm!!}
</div>

<script>
$(function(){
	$(".select-pay li").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
	});
});
</script>
</body>
</html>
