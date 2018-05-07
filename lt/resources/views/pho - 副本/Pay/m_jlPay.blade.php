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
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png')}}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">确认订单</p>
</header>
<!--订单详情-->
<div class="order_box">
	<p><strong>{{ session()->get("Teluser") }}</strong>，请确认以下订单信息：</p>
	<ul class="order_xq">
		<li><p><span>教练姓名：{{ $str->name }}</span> </p></li>
		<li><p><span>教练教龄：{{ $data["jlolder"] }}年</span> </p></li>
		<li><p><span>下单时间：{{ $data["xddate"] }}</span> </p></li>
		<li><p><span>商品价格：<font color="red">￥</font>{{ $data["price"] }}</span> </p></li>
		<li><p><span>预约班型：@if($data["classtype"] == 1) vip班 @endif @if($data["classtype"] == 2) 普通班 @endif</span> </p></li>
		<!--<li><p><span>预约时间：</span> 2017-08-10</p></li>-->
	</ul>
</div>
<p class="m_fg"></p>
<!--定金方式-->
<div class="select_fk">
	<p class="pay_way">请选择以下付款方式：</p>
	<!-- <div class="select-pay">
		<ul id="xz">
				<li class="xz_1">
					<ul class="son_nav">
						<li onClick="selclass('1','{{ $data["price"] }}')" id="selq" value="1">全额付款</li>
						<li onClick="selclass('2','200')" id="selqq" value="2">预约金（200）</li>
						
					</ul>
				</li>
			</ul>
	</div> -->
    <div class="select-pay">
        <ul>
            <li onClick="selclass('2','200')" id="selqq" value="2">预约金200</li>
            <li onClick="selclass('1','{{ $data["price"] }}')" id="selq" value="1">全额支付</li>
        </ul>
    </div>
</div>
<!--支付方式-->
<div class="select_way">
    <form action="{{ url('tel/jlsavedetail') }}" name="myform" method="post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="jlID" value="{{ $data["jlID"] }}">
    <input type="hidden" name="classtype" id="" value="{{ $data["classtype"] }}">
    <input type="hidden" name="price" id="price" value="{{ $data['price'] }}">
    <input type="hidden" name="yyj" id="yyj" value="">
    <input type="hidden" name="nickname" id="nickname" value="{{ $data["nickname"] }}">
    <input type="hidden" name="jlolder" id="" value="{{ $data["jlolder"] }}">
    <input type="hidden" name="jxaddress" id="" value="{{ $data["jxaddress"] }}">
    <input type="hidden" name="szjxname" id="" value="{{ $data["szjxname"] }}">
    <input type="hidden" name="bid" id="" value="{{ $data["bid"] }}">
    </form>
    <a class="btn-wx" style="margin-right:15px;" onclick="dopay('1')">微信支付</a>
    <a class="btn-zfb" onclick="dopay('0')">支付宝支付</a>
</div>
<script>
    
    function selclass(fktype,price) {
        if(fktype == 1) {
            var a = $("#selq").val();
            $("#price").val(price);
            // if(a == 1) {
            //     $("#price").val(price);
            //     $("#selq").val(price);
            // } else {
            //     // $("#price").val("0");
            //     $("#selq").val("1");
            // }
        }
        if(fktype == 2) {
            var b = $("#selqq").val();
            $("#price").val(price);

            // if(b == 2) {
            //     $("#price").val(price);
            //     $("#selqq").val(price);
            // } else {
            //     $("#yyj").val("0");
            //     $("#selqq").val("2");
            // }
        }
    }
    
    function dopay(fktype) {
        var form = document.myform;
        form.action = "{{ url('tel/jlsavedetail') }}" + "/" + fktype;
        form.submit();
    }
</script>
<!--说明-->
<div class="ps">
	<p>Ps：</p>
	{!!$arr->zfsm!!}
</div>
<script>
$(function () {
	$(".xz_1").click(function(){
		$(".son_nav").toggle();
	}); 
  });

$(function () {

		$(".son_nav li").click(function(){
			var zhi=$(".son_nav li").val();
			var wz=$(this).html();
			if(zhi==1){
				$("#xz_text").html(wz);
			}	
			else if(zhi==2){
				$("#xz_text").html(wz);
			}
		});

  });
  

</script>
<script>
$(function(){
    $(".select-pay li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    });
});
</script>
</body>
</html>
