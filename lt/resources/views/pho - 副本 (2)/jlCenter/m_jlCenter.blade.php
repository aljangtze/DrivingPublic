@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>会员中心-新司机网</title>
        <!--头部-->
    <header class="header">	
        <p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">会员中心</p>
    </header>
    <!--幻灯片广告-->
    <div class="slide_container">
        <ul class="rslides" id="slider">
            @foreach($banner as $bb)
            <li>
                <img src="{{ asset('banner')."/".$bb->banner }}" alt="幻灯片2">
            </li>
            @endforeach
        </ul>
    </div>
    <p class="m_fg"></p> 
    <!--用户帐号-->
    <div class="m_user">
        <div class="tx column">
            <a href="{{ url('tel/jlinfo')."/".session()->get("Teluser")."/"."1" }}"><img src="{{ asset('pic')."/".$str->pic }}" class="img-rounded"></a>
        </div>
        <div class="zh column">
            <p>账号：{{ $str->nickname }} <a href="{{ url('tel/znx')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/znx.png') }}"><em>({{ $count }})</em></a></p>
            <p>资产：{{ $str->integral }}<em>{{ $str->money }}</em>元</p>
            <p><a href="{{ url("tel/tx") }}" style="margin-right:10px;">提现</a> <a href="{{ url("tel/txmx") }}" style="margin-right:10px;">查看明细</a> <a href="{{ url('forgetpass') }}">修改密码</a></p>
        </div>
    </div>
    <!--用户信息-->
    <div class="basic_info">
        <p class="m_fg" style="margin-bottom:3px;"></p>
        <div class="m_orders">
            <a href="{{ url('tel/jlinfo')."/".session()->get("Teluser")."/"."1" }}"><img src="{{ asset('phone/images/jbxx.png') }}" alt="完善信息" /><p>完善信息 <span>></span> </p></a>
        </div>
        <div class="m_orders">
            <a href="{{ url('tel/jlorder')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/ddgl.png') }}" alt="我的订单" /><p>我的订单 <span>></span> </p></a>
        </div>
<!--        <div class="m_orders">
            <a href="{{ url('tel/jlwdxy') }}"><img src="{{ asset('phone/images/wdxy.png') }}" alt="我的学员" /><p>我的学员 <span>></span> </p></a>
        </div>-->
        <div class="m_orders">
            <a href="{{ url('tel/wytg')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/wytg.png') }}" alt="我要投稿" /><p>我要投稿 <span>></span></p></a>
        </div>
        <div class="m_orders">
            <a href="{{ url("tel/jl/gsjj")."/".session()->get("Teluser")."/"."1" }}"><img src="{{ asset('phone/images/guwm.png') }}" alt="关于我们" /><p>关于我们 <span>></span></p></a>
        </div>
        <div class="m_orders">
            <a href="{{ url('tel/cwsj')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/card.png') }}" alt="身份认证" /><p>身份认证 <span>></span></p></a>
        </div>
        <div class="m_orders">
            <a href="{{ url("tel/czsm") }}"><img src="{{ asset('phone/images/guwm.png') }}" alt="操作说明" /><p>操作说明 <span>></span></p></a>
        </div>
        <div class="m_orders">
            <a href="{{ url("tel/jlwdfb")."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/fabu.png') }}" alt="我的发布" /><p>我的发布 <span>></span></p></a>
        </div>
    </div>
    <!--退出登录-->
    <div class="pull_out">
        <a href="{{ url('tel/login')."/".session()->get("Teluser") }}"><button type="button">退出登录</button></a>
    </div>
    <p class="m_bsfg" style="height:50px;margin-bottom:10px;"></p>
    <!--加载时执行模态框，一天一次-->
    <!--<div id="cover-bg"></div>
    <div class="alert_windows">
            <span>X</span>
            <p class="gg_title"></p>
            <div class="tc_content">
                    <p><a href="http://{{ $adver->url }}">{{ $adver->title }}</a></p>
                    <a href="http://{{ $adver->url }}"><img src="{{ asset('advers')."/".$adver->advers }}"></a>
            </div>
    </div>-->

    <script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
    <!--<script>
    $(function(){
            if($.cookie("jlClose") != 'yes'){
                    var winWid = $(window).width()/2 - $('.alert_windows').width()/2;
                    var winHig = $(window).height()/4 - $('.alert_windows').height()/4;
                    $(".alert_windows").css({"left":winWid,"top":-winHig*2});	//自上而下
                    $(".alert_windows").show();
                    /*遮罩层*/
                    $("#cover-bg").css("height",$(document).height());   
            $("#cover-bg").css("width",$(document).width());   
            $("#cover-bg").show();   
                    
                    $(".alert_windows").animate({"left":winWid,"top":winHig},600);
                    $(".alert_windows span").click(function(){
                            $(this).parent().fadeOut(300);
                            $("#cover-bg").hide();
                            //$.cookie("isClose",'yes',{ expires:1/8640});	//测试十秒
                            $.cookie("isClose",'yes',{ expires:1});	
                    });
            }
    });
    </script>-->
</body>
</html>
@endsection
