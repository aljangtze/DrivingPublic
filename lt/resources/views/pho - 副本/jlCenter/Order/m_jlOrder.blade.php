@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>全部订单-新司机网</title>
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
		<li @if($type == 0) class="fl_slect" @endif><a href="{{ url('tel/jlorder')."/".session()->get("Teluser")."/"."0" }}">全部订单 <em>({{ $allcount }})</em></a></li>
		<li @if($type == 2) class="fl_slect" @endif><a href="{{ url('tel/jlorder')."/".session()->get("Teluser")."/"."2" }}">未付款 <em>({{ $wcount }})</em></a></li>
		<li @if($type == 1) class="fl_slect" @endif><a href="{{ url('tel/jlorder')."/".session()->get("Teluser")."/"."1" }}">已付款 <em>({{ $ycount }})</em></a></li>
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
    <!--需求订单开始-->
    @foreach($items as $tmp)
    @if($tmp->payzt == 3)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xqorderdetail')."/".$tmp->id."/".session()->get("Teluser") }}" class="dhyc_p">{{ $tmp->title }} <em>></em></a><span>交易成功</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xqorderdetail')."/".$tmp->id."/".session()->get("Teluser") }}">
			<div class="order_sx column">
                            <p class="p_rowBig">
                                @if($tmp->selitem == 1) 科目一 @endif
                                @if($tmp->selitem == 2) 科目二 @endif
                                @if($tmp->selitem == 3) 科目三 @endif
                                @if($tmp->selitem == 4) 科目四 @endif
                                @if($tmp->selitem == 5) 定制报名 @endif
                                
                                @if($tmp->itemtype == 1) 场地练习 @endif
                                    @if($tmp->itemtype == 2) 考试车练习 @endif
                                    @if($tmp->itemtype1 == 3) 考试路训 @endif
                                    @if($tmp->itemtype1 == 4) 长途路训 @endif
                                    @if($tmp->itemtype1 == 5) 考试路训(考试车)
                                @endif
                            </p>
			</div>
			<p class="order_price">￥200</p>
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥200</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
                         <button type="button" class="btn_state"><a href="#">线下已付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
                        <a href="{{ url('tel/xqsqdel')."/".$tmp->id."/".session()->get("Teluser") }}"><button type="button" class="btn_state">删除订单</button></a>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
    @endforeach
    <!--已付款开始-->
    @foreach($items as $tmpa)
    @if($tmpa->payzt == 1)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xqorderdetail')."/".$tmpa->id."/".session()->get("Teluser") }}" class="dhyc_p">{{ $tmpa->title }} <em>></em></a><span style="color:#111">已付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xqorderdetail')."/".$tmpa->id."/".session()->get("Teluser") }}">
<!--			<div class="order_img column">
				<img src="{{ asset('phone/images/jx.jpg') }}">
			</div>-->
			<div class="order_sx column">
                            <p class="p_rowBig">
                                @if($tmpa->selitem == 1) 科目一 @endif
                                @if($tmpa->selitem == 2) 科目二 @endif
                                @if($tmpa->selitem == 3) 科目三 @endif
                                @if($tmpa->selitem == 4) 科目四 @endif
                                @if($tmpa->selitem == 5) 定制报名 @endif
                                
                                @if($tmpa->itemtype == 1) 场地练习 @endif
                                    @if($tmpa->itemtype == 2) 考试车练习 @endif
                                    @if($tmpa->itemtype1 == 3) 考试路训 @endif
                                    @if($tmpa->itemtype1 == 4) 长途路训 @endif
                                    @if($tmpa->itemtype1 == 5) 考试路训(考试车)
                                @endif
                            </p>
			</div>
			<p class="order_price">￥200</p>
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥200</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
                        <button type="button" class="btn_state"><a href="#">线下已付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<button type="button" class="btn_state" style="border:1px solid #D9534F;color:#D9534F"><a href="{{ url('tel/xqtrueorder')."/".$tmpa->id."/".session()->get("Teluser") }}" style="color:#D9534F">确认收款</a></button>
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @endforeach
        <!--已付款结束-->
        <!--未付款开始-->
        @foreach($items as $tmpb)
        @if($tmpb->payzt == 2)
	<li>
		<div class="order_head">
			<p><a href="{{ url('tel/xqorderdetail')."/".$tmpb->id."/".session()->get("Teluser") }}" class="dhyc_p">{{ $tmpb->title }} <em>></em></a><span>未付款</span></p>
		</div>
		<div class="order_body">
		  <a href="{{ url('tel/xqorderdetail')."/".$tmpb->id."/".session()->get("Teluser") }}">
<!--			<div class="order_img column">
				<img src="{{ asset('phone/images/jx.jpg') }}">
			</div>-->
			<div class="order_sx column">
                            <p class="p_rowBig">
                                @if($tmpb->selitem == 1) 科目一 @endif
                                @if($tmpb->selitem == 2) 科目二 @endif
                                @if($tmpb->selitem == 3) 科目三 @endif
                                @if($tmpb->selitem == 4) 科目四 @endif
                                @if($tmpb->selitem == 5) 定制报名 @endif
                                
                                @if($tmpb->itemtype == 1) 场地练习 @endif
                                    @if($tmpb->itemtype == 2) 考试车练习 @endif
                                    @if($tmpb->itemtype1 == 3) 考试路训 @endif
                                    @if($tmpb->itemtype1 == 4) 长途路训 @endif
                                    @if($tmpb->itemtype1 == 5) 考试路训(考试车)
                                @endif
                            </p>
			</div>
			<p class="order_price">￥200</p>
		   </a>
		</div>
		<div class="order_footer column_r">
			<p>共1件商品 <span>合计：<em>￥200</em></span></p>
		</div>
		<!--操作状态-->
		<div class="btn_state_box">
			<button type="button" class="btn_state" style="border:1px solid #D9534F;"><a href="{{ url('tel/xqpayorder')."/".$tmpb->id."/".session()->get("Teluser") }}" style="color:#D9534F;">线下未付清</a></button>
			<button type="button" class="btn_state" style="border:1px solid #29A7E2;"><a href="tel:18988484593" style="color:#29A7E2;">客服</a></button>
			<!--<button type="button" class="btn_state" style="border:1px solid #D9534F; color:#D9534F;"><a href="#" style="color:#D9534F">去付款</a></button>-->
		</div>
		<p class="m_fg"></p>
	</li>
        @endif
        @endforeach
        <!--未付款结束-->
 </ul>
<p class="m_bsfg" style="width:100%;height:50px;"></p>
</body>
</html>
@endsection
