<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{ asset('at/css/style.css') }}" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{{ asset('at/js/jquery.js') }}"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>通讯录</div>
    
    @if($type == 1)   
    <dl class="leftmenu">
    <dd>
    <div class="title">
    <span><img src="{{ asset('at/images/leftico01.png') }}" /></span>系统设置
    </div>
    	<ul class="menuson">
            <!--<li><cite></cite><a href="{{ url('admin/user/create') }}" target="rightFrame">添加帐号</a><i></i></li>-->
            <li class="active"><cite></cite><a href="{{ url('admin/user') }}" target="rightFrame">管理账户</a><i></i></li>
            <li class=""><cite></cite><a href="{{ url("admin/setinfo") }}" target="rightFrame">使用说明设置</a><i></i></li>
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="{{ asset('at/images/leftico02.png') }}" /></span>企业中心
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/jpfw')."/"."2" }}" target="rightFrame">驾培服务</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/qcfw') }}" target="rightFrame">汽车服务</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/jszfw') }}" target="rightFrame">驾驶证服务</a><i></i></li>
        </ul>     
    </dd> 
    
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico03.png') }}" /></span>教练中心</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/grjpfw') }}" target="rightFrame">驾培服务</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/grqcfw') }}" target="rightFrame">汽车服务</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/grjrzfw') }}" target="rightFrame">驾驶证服务</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/zxjl') }}" target="rightFrame">专项教练</a><i></i></li>
    </ul>    
    </dd>  
    
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>投稿管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/wytg') }}" target="rightFrame">投稿列表</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>幻灯片管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/banner') }}" target="rightFrame">幻灯片列表</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/banner/create') }}" target="rightFrame">添加幻灯片</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>班型管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/vipclass') }}" target="rightFrame">vip班</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/ptclass') }}" target="rightFrame">普通班</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>计时培训管理</div>
    <ul class="menuson">
        <!--<li><cite></cite><a href="{{ url('admin/lessionone') }}" target="rightFrame">科目一</a><i></i></li>-->
        <li><cite></cite><a href="{{ url('admin/lessiontwo') }}" target="rightFrame">科目二</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/lessionthree') }}" target="rightFrame">科目三</a><i></i></li>
        <!--<li><cite></cite><a href="{{ url('admin/lessionfour') }}" target="rightFrame">科目四</a><i></i></li>-->
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>服务项目管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/lzjrzfw') }}" target="rightFrame">驾驶证服务</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/lzqcfw') }}" target="rightFrame">汽车服务</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>文章管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/article/create') }}" target="rightFrame">文章发布</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/article') }}" target="rightFrame">文章列表</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>论坛管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/forum') }}" target="rightFrame">帖子列表</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/forumsetinfo') }}" target="rightFrame">论坛信息设置</a><i></i></li>
    </ul>
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>投诉管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/tsgl') }}" target="rightFrame">投诉列表</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>学员需求管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/xyxqgl') }}" target="rightFrame">需求列表</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>订单管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/xqorder') }}" target="rightFrame">需求接单列表</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/jporder') }}" target="rightFrame">驾校订单</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/jlorder') }}" target="rightFrame">教练订单</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/jsporder') }}" target="rightFrame">计时培训订单</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/qjorder') }}" target="rightFrame">汽驾订单</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>自主发布管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/zzfbgl/create') }}" target="rightFrame">我要发布</a><i></i></li>
        <li><cite></cite><a href="{{ url('admin/zzfbgl') }}" target="rightFrame">发布列表</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>会员中心</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/rtcenter') }}" target="rightFrame">站内会员列表</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>广告中心</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/adver') }}" target="rightFrame">广告设置</a><i></i></li>
    </ul>
    
    </dd>   
    
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>直推管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/tjgx') }}" target="rightFrame">直推列表</a><i></i></li>
    </ul>
    
    </dd>   
    </dl>
    @endif
    
    @if($type == 2)
    <dl class="leftmenu">
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>班型管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url('admin/zzfbclassindex')."/".$id->id."/".$bh }}" target="rightFrame">旗下班型</a><i></i></li>
    </ul>
    </dl>
    <dl class="leftmenu">
    <dd><div class="title"><span><img src="{{ asset('at/images/leftico04.png') }}" /></span>订单管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="{{ url("admin/qorder")."/".$bh }}" target="rightFrame">订单列表</a><i></i></li>
    </ul>
    </dl>
    @endif
    
    </dd>   
    
</body>
</html>
