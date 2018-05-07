@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>报名-新司机网</title>
    </head>

    <body>
        <!--头部-->
    <header class="header">	
        <p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">报名</p>
    </header>
    <!--幻灯片广告-->
    <div class="slide_container">
        <ul class="rslides" id="slider">
            @foreach($banner as $bb)
            <li>
                <img src="{{ asset('banner')."/".$bb->banner }}" alt="幻灯片3">
            </li>
            @endforeach
        </ul>
    </div>
    <p class="m_fg"></p> 
    <!--用户信息-横排-->
    <div class="basic_hp">
        <ul>
            <li>
                <a href="{{ url('tel/seljx')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/czjx.png') }}" alt="查找驾校" /><p>查找驾校 </p></a>
            </li>
            <li>
                <a href="{{ url('tel/seljl')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/czjl.png') }}" alt="查找教练" /><p>查找教练 </p></a>
            </li>
            <li>
                <a href="{{ url('tel/xyxqfb')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/fbxq.png') }}" alt="发布需求" /><p>发布需求 </p></a>
            </li>
            <li>
                <a href="{{ url('tel/wszx')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/zxpx.png') }}" alt="网上自学" /><p>网上自学 </p></a>
            </li>
            <li>
                <a href="{{ url('tel/xyjspx')."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/yyxc.png') }}" alt="即时学车" /><p>即时学车 </p></a>
            </li>
            <li>
                <a href="http://www.122.gov.cn"><img src="{{ asset('phone/images/yyks.png') }}" alt="预约考试" /><p>预约考试 </p></a>
            </li>


        </ul>
    </div>
    <p class="m_fg"></p>
    <!-- <div id="cover-bg"></div>
    <div class="alert_windows">
        <span>X</span>
        <p class="gg_title">弹窗广告</p>
        <div class="tc_content">
            <p>{{ $adver->title }}，详情请点击<a href="http://{{ $adver->url }}">此链接查看</a></p>
            <a href="http://{{ $adver->url }}"></a>
        </div>
    </div> -->
    <div id="cover-bg"></div>
    <div class="alert_windows">
        <div class="alert_head">
            <span onclick="closeGlobalAd();">X</span>
<!--            <p class="gg_title">弹窗广告</p>-->
        </div>
        <div class="tc_content">
            <p><a href="http://{{ $adver->url }}" onclick="redirectUrlToActive();">{{ $adver->title }} 详情请点击</a></p>
            <img src="{{ asset('advers')."/".$adver->advers }}">
        </div>
    </div>
        <!--列表-->
        @include("pho.bases.comm")

        <p class="m_bsfg" style="height:50px;margin-bottom:6px;"></p>
        <script type="text/javascript" src="{{ asset('phone/js/responsiveslides.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('phone/js/slide.js') }}"></script>
        <script type="text/javascript" src="{{ asset('phone/js/cookie.js') }}"></script>
        <script>
        
        </script>
    </body>
</html>
@endsection
