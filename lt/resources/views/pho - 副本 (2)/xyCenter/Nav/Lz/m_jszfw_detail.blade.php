<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>业务详情-新司机网</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/public.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('phone/dist/css/dropify.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('phone/dist/js/dropify.js') }}"></script>
<script src="{{ asset('phone/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1);" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">业务详情</p>
</header>
<!--卖家信息-->
<div class="mjxx">
	<p>商家名称：{{ $str->shopname }}</p>
	<p>受理地区：{{ $str->shopaddress }}</p>
</div>
<p class="m_fg"></p>
<!--业务标题-->
<div class="ywbt">
	<p>代缴驾驶证上的违章罚款</p>
	<!--服务类型标签-->
	<p class="bqfl">驾证违章代缴</p>

	<div class="fwf">
		<p>服务费用 <em>￥{{ $str->fwprice }}</em></p>
	</div>
	<p class="m_fg" style="width:100%;margin:0;"></p>
	<p class="mjly">
		<span>买家留言</span>
		<textarea placeholder="请填写留言信息（选填）" class="mj_text"></textarea>
		<!-- <a href="m_mjly.html"><strong class="dhyc_p">请填写留言信息（选填）</strong> <i>></i></a> -->
	</p>
	<p class="m_fg" style="width:100%;margin:0;height:7px;"></p>
	<div class="sxcl">
		<p>项目所需材料</p>
	</div>
	<!--这块动态编辑-->
	<div class="sx">
		<p>手续</p>
		{!!$arr->jszsysm!!}
	</div>
	<p class="m_fg" style="width:100%;margin:0;"></p>
	<p style="margin:0 auto;color:#D9534F;width:92%;height:40px;text-align:right;font-weight:bold; line-height:40px;font-size:1.5rem;">总金额：<i>￥{{ $str->fwprice }}</i></p>
</div>
<div class="m_bs1"></div>
<!--提交评价-->
<div class="db_djdd">
    <button type="button" onclick="dopay('1')" style="background:#489F21">微信支付</button></span>
<button type="button" onclick="dopay('0')" style="background:#019BE1">支付宝支付</button></span>
</div>
<form action="{{ url('tel/jqserverpay') }}" method="post" name="myform" style="display: none">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="shopname" value="{{ $str->shopname }}">
    <input type="hidden" name="price" value="{{ $str->fwprice }}">
    <input type="hidden" name="serID" value="{{ $str->id }}">
    <input type="hidden" name="shopaddress" value="{{ $str->shopaddress }}">
</form>
<script>
    function dopay(paytype){
        var form = document.myform;
        form.action = "{{ url('tel/jqserverpay') }}" + "/" + paytype;
        form.submit();
    }
</script>
</body>
</html>
