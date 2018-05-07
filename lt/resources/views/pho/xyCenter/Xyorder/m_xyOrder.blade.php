<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>全部订单-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:86%;text-align:center;color:#fff;height:40px; line-height:40px;">全部订单</p>
</header>
<!--订单分类排序-->
<div class="qbdd_fl">
	<ul>
		<li @if($act== 1) class="fl_slect" @endif><a href="{{ url('tel/xyorders')."/".session()->get("Teluser") }}">全部订单 <em>({{ $allcount }})</em></a></li>
		<li @if($act== 2) class="fl_slect" @endif><a href="{{ url('tel/xyorders')."/".session()->get("Teluser")."/"."1"."/"."2" }}">未付款 <em>({{ $wcount }})</em></a></li>
		<li @if($act== 3) class="fl_slect" @endif><a href="{{ url('tel/xyorders')."/".session()->get("Teluser")."/"."2"."/"."3" }}">已付款 <em>({{ $ycount }})</em></a></li>
	</ul>
</div>
<script>
	$(function(){
		$(".qbdd_fl li").click(function(){
			$(this).addClass("fl_slect").siblings().removeClass("fl_slect");
		});
	});
</script>
<ul class="m_all_order">
    <!--驾校订单开始-->
    @foreach($items as $tmp)
        @if($tmp->j == 3)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$tmp->id."/"."1" }}" class="dhyc_p">{{ $tmp->a }} <em>></em></a><span>交易成功</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$tmp->id."/"."1" }}">
			<div class="order_img column">
				<img src="{{ asset('pic')."/".$tmp->i }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：{{ $tmp->a }}&nbsp;&nbsp;
                                @if($tmp->b == 1) VIP班 @endif
                                @if($tmp->b == 2) 普通班 @endif
                            </p>
                                <p class="p_xm">下单时间：{{ $tmp->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $tmp->e }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $tmp->e }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyordersdel')."/".$tmp->id."/"."1" }}"><button type="button" class="btn_state">删除订单</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($tmp->j == 2)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$tmp->id."/"."1" }}" class="dhyc_p">{{ $tmp->a }} <em>></em></a><span>未付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$tmp->id."/"."1" }}">
			<div class="order_img column">
				<img src="{{ asset('pic')."/".$tmp->i }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：{{ $tmp->a }}&nbsp;&nbsp;
                                @if($tmp->b == 1) VIP班 @endif
                                @if($tmp->b == 2) 普通班 @endif
                            </p>
                                <p class="p_xm">下单时间：{{ $tmp->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $tmp->e }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $tmp->e }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="#" style="color:#D9534F;">线下未付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
                        <a href="{{ url('tel/xyorderstrue')."/".$tmp->id."/"."2"."/"."1" }}"><button type="button" class="btn_state" style="border:1px solid #D9534F;color:#D9534F">确认付款</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($tmp->j == 1)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$tmp->id."/"."1" }}" class="dhyc_p">{{ $tmp->a }} <em>></em></a><span>已付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$tmp->id."/"."1" }}">
			<div class="order_img column">
				<img src="{{ asset('pic')."/".$tmp->i }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：{{ $tmp->a }}&nbsp;&nbsp;
                                @if($tmp->b == 1) VIP班 @endif
                                @if($tmp->b == 2) 普通班 @endif
                            </p>
                                <p class="p_xm">下单时间：{{ $tmp->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $tmp->e }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $tmp->e }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state"><a href="#">线下已付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<button type="button" class="btn_state" style=""><a href="#">已付款</a></button>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @endforeach
        <!--驾校订单结束-->
        
        
        
        
        
        <!--教练订单开始-->
        @foreach($jlorder as $jll)
        @if($jll->h == 3)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$jll->id."/"."2" }}" class="dhyc_p">{{ $jll->k }} <em>></em></a><span>交易成功</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$jll->id."/"."2" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：@if($jll->d == 1) VIP班 @endif @if($jll->d == 2) 普通班 @endif&nbsp;&nbsp;</p>                    </p>
                                <p class="p_xm">下单时间：{{ $jll->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $jll->e }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $jll->e }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyordersdel')."/".$jll->id."/"."2" }}"><button type="button" class="btn_state">删除订单</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($jll->h == 1)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$jll->id."/"."2" }}" class="dhyc_p">{{ $jll->k }} <em>></em></a><span>未付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$jll->id."/"."2" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：@if($jll->d == 1) VIP班 @endif @if($jll->d == 2) 普通班 @endif&nbsp;&nbsp;</p>                    </p>
                                <p class="p_xm">下单时间：{{ $jll->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $jll->e }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $jll->e }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="#" style="color:#D9534F;">线下未付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyorderstrue')."/".$jll->id."/"."1"."/"."2" }}"><button type="button" class="btn_state" style="border:1px solid #D9534F;color:#D9534F">确认付款</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($jll->h == 2)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$jll->id."/"."2" }}" class="dhyc_p">{{ $jll->k }} <em>></em></a><span>已付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$jll->id."/"."2" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：@if($jll->d == 1) VIP班 @endif @if($jll->d == 2) 普通班 @endif&nbsp;&nbsp;</p>                    </p>
                                <p class="p_xm">下单时间：{{ $jll->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $jll->e }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $jll->e }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state"><a href="#">线下已付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<button type="button" class="btn_state" style=""><a href="#">已付款</a></button>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @endforeach
        <!--教练订单结束-->
        
        
        
        
        <!--驾驶证服务与汽车服务订单开始-->
        @foreach($xyorder as $xyy)
        @if($xyy->f == 3)
        <li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$xyy->id."/"."3" }}" class="dhyc_p">商家名称：{{ $xyy->b }} <em>></em></a><span>交易成功</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$xyy->id."/"."3" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：驾驶证服务/汽车服务&nbsp;&nbsp;</p>
                                <p class="p_xm">下单时间：{{ $xyy->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $xyy->d }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $xyy->d }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyordersdel')."/".$xyy->id."/"."3" }}"><button type="button" class="btn_state">删除订单</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($xyy->f == 2)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$xyy->id."/"."3" }}" class="dhyc_p">商家名称：{{ $xyy->b }} <em>></em></a><span>未付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$xyy->id."/"."3" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：驾驶证服务/汽车服务&nbsp;&nbsp;</p>
                                <p class="p_xm">下单时间：{{ $xyy->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $xyy->d }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $xyy->d }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="#" style="color:#D9534F;">线下未付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyorderstrue')."/".$xyy->id."/"."2"."/"."3" }}"><button type="button" class="btn_state" style="border:1px solid #D9534F;color:#D9534F">确认付款</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($xyy->f == 1)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$xyy->id."/"."3" }}" class="dhyc_p">商家名称：{{ $xyy->b }} <em>></em></a><span>已付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$xyy->id."/"."3" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">报名项目：驾驶证服务/汽车服务&nbsp;&nbsp;</p>
                                <p class="p_xm">下单时间：{{ $xyy->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $xyy->d }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $xyy->d }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state"><a href="#">线下已付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<button type="button" class="btn_state" style=""><a href="#">已付款</a></button>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @endforeach
        <!--驾驶证服务与汽车服务订单结束-->
        
        
        
        
        <!--计时培训订单开始-->
        @foreach($jqorder as $jqq)
        @if($jqq->i == 3)
        <li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$jqq->id."/"."4" }}" class="dhyc_p">计时培训 <em>></em></a><span>交易成功</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$jqq->id."/"."4" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">练车时间：{{ $jqq->a }}&nbsp;&nbsp;</p>
                                <p class="p_xm">下单时间：{{ $jqq->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $jqq->b }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $jqq->b }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyordersdel')."/".$jqq->id."/"."4" }}"><button type="button" class="btn_state">删除订单</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($jqq->i == 2)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$jqq->id."/"."4" }}" class="dhyc_p">计时培训 <em>></em></a><span>未付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$jqq->id."/"."4" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">练车时间：{{ $jqq->a }}&nbsp;&nbsp;</p>
                                <p class="p_xm">下单时间：{{ $jqq->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $jqq->b }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $jqq->b }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="#" style="color:#D9534F;">线下未付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<a href="{{ url('tel/xyorderstrue')."/".$jqq->id."/"."2"."/"."4" }}"><button type="button" class="btn_state" style="border:1px solid #D9534F;color:#D9534F">确认付款</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @if($jqq->i == 1)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xyordersdetail')."/".$jqq->id."/"."4" }}" class="dhyc_p">计时培训 <em>></em></a><span>已付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xyordersdetail')."/".$jqq->id."/"."4" }}">
			<div class="order_img column">
				<img src="{{ asset('phone/images/timg.jpg') }}">
			</div>
			<div class="order_sx column">
                            <p class="p_xm">练车时间：{{ $jqq->a }}&nbsp;&nbsp;</p>
                                <p class="p_xm">下单时间：{{ $jqq->l }}</p>
                                <P class="p_xm">订单价格：<font color="red">￥</font>{{ $jqq->b }}</p>
			</div>
			
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥{{ $jqq->b }}</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state"><a href="#">线下已付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="tel:18988484593" style="color:#D9534F;">举报</a></button>
			<button type="button" class="btn_state" style=""><a href="#">已付款</a></button>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @endforeach
        <!--计时培训订单结束-->
        
        
        
        
        
        
 </ul>

</body>
</html>
