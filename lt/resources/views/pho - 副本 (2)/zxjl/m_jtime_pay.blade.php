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
	<p class="order_1"><strong>15270299356</strong>，请确认以下订单信息：</p>
	<ul class="order_xq">
		<li><p><span>预约项目：</span> @if($data["type"] == 2) 科目二 @endif @if($data["type"] == 3) 科目三 @endif</p></li>
		<li><p><span>下单时间：</span> {{ $data["xddate"] }}</p></li>
		<li style="min-height:26px;height:auto;"><p style="margin-bottom:0;"><span>练车时间：</span>{{ $data["lctime"] }}</p></li>
		<li><p><span>练习人数：</span> {{ $data["lxrs"] }}人/车</p></li>
		<li><p><span>练习模式：</span>
                        @if($data["type"] == 2)
                            @if($data["lcmodel"] == 1)
                                场地练习
                            @endif
                            @if($data["lcmodel"] == 2)
                                考试练习
                            @endif
                        @endif
                        @if($data["type"] == 3)
                            @if($data["lcmodel"] == 1)
                                考试路训
                            @endif
                            @if($data["lcmodel"] == 2)
                                长途路训
                            @endif
                            @if($data["lcmodel"] == 3)
                                考试路训(教练车)
                            @endif
                        @endif
                    </p></li>
		<li><p><span>所学车型：</span> {{ $data["cartype"] }}</p></li>
		<li><p><span>预约时间：</span> {{ $data["fbdate"] }}</p></li>
		<li><p><span>应支付：</span> ￥<font color="red">{{ $data["price"] }}</font></p></li>
	</ul>
</div>
<p class="m_fg"></p>
<!--定金方式-->
<div class="select_fk">
	<p class="pay_way">请选择以下付款方式：</p>
	<!--<div class="form-group">
		<select class="form-control">
			<option value="0">预约金200</option>
			<option value="1">全额支付</option>
		</select>
	</div>-->
</div>
<!--支付方式-->
<form action="{{ url('tel/xyjpdopay') }}" method="post" name="myform" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="lctime" value="{{ $data["lctime"] }}">
<input type="hidden" name="price" value="{{ $data["price"] }}">
<input type="hidden" name="jpid" value="{{ $data["id"] }}">
<input type="hidden" name="type" value="{{ $data["type"] }}">
<input type="hidden" name="lcmodel" value="{{ $data["lcmodel"] }}">
<input type="hidden" name="lcaddress" value="{{ $data["lcaddress"] }}">
<input type="hidden" name="tel" value="{{ $data["tel"] }}">
</form>
<div class="select_way">
    <a class="btn btn-danger" style="margin-right:15px;" onclick="dopay('1')">微信支付</a>
	<a class="btn btn-danger" onclick="dopay('0')">支付宝支付</a>
</div>
<script>
    function dopay(paytype){
        var form = document.myform;
        form.action = "{{ url('tel/xyjpdopay') }}" + "/" + paytype;
        form.submit();
    }
</script>
<!--说明-->
<div class="ps">
	<p>Ps：</p>
	{!!$arr->zfsm!!}
</div>
</body>
</html>
