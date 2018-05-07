@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>驾校查找-新司机网</title>
    </head>

    <body>
        <!--头部-->
    <header class="header" style=" margin-bottom:0;">
        <a href="javascript:history.go(-1)" class="logo column" style="width:14%;"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <form action="{{ url('tel/seljx')."/".session()->get("Teluser") }}" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-group km_search" style="float:right;right:2%;width:78%;">
                <input type="text" class="form-control" name="name" placeholder="请输入关键词查找驾校...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </header>
    <!--当前所在城市-->
    <div class="dq_city">
        <p style="margin-bottom:0;">您所在位置：<span>云南省昆明市</span></p>
        <!--精确搜索-->

        <div class="docs-methods" style="margin-top:6px;width:100%;">
            <form class="form-inline" action="{{ url('tel/seljx')."/".session()->get("Teluser") }}" method="get">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div id="distpicker">
                    <div class="form-group" style="width:80%;float:left;margin-right:1%;">
                        <div style="position: relative;">
                            <input id="city-picker3" class="form-control" name="jxaddress" readonly type="text" value="请选择省/市/区县" data-toggle="city-picker">
                        </div>
                    </div>
                    <div class="form-group" style="width:18%; overflow:hidden">
                        <button class="btn btn-primary" type="submit" style="width:100%;">搜索</button>
                    </div>
                </div>
            </form>
        </div>
        <!--类目查找-->

    </div>

    <p class="m_fg"></p>
    <!--列表-->
    <div class="coach_box">
        <ul>
            @foreach($items as $tmp)
            <li>
                <a href="{{ url('tel/seljxdetail')."/".$tmp->id."/".session()->get("Teluser") }}">
                    <div class="coach_img">
                        @if($tmp->type == 1)
                        <img src="{{ asset('jlcpic')."/".$tmp->jlcpic }}" />
                        @endif
                    </div>
                </a>
                <div class="drive_xx">
                    <p><a href="{{ url('tel/seljxdetail')."/".$tmp->id."/".session()->get("Teluser") }}">{{ $tmp->jxname }}</a></p>
                    <p style="font-size:1.5rem;color:#f00;font-weight:bold">￥{{ $tmp->price }}元</p>
                    <p>成交量：{{ $cjl[$tmp->id] }}</p>
                    <p class="dhyc_p" style="height:40px;"><span>{{ $tmp->jxaddress }}</span></p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!--查找发布-->
    <div class="czgb">
        <a href="{{ url('tel/xyxqfb')."/".session()->get("Teluser") }}" class="btn btn-primary">制定我的报名</a>
    </div>
    <p style="height:80px;"></p>
    <script src="{{  asset('phone/js/city-picker.data.js') }}"></script>
    <script src="{{  asset('phone/js/city-picker.js') }}"></script>
    <script src="{{  asset('phone/js/main.js') }}"></script>
    <script type="text/javascript">
$(function () {
    var currYear = (new Date()).getFullYear();
    var opt = {};
    opt.date = {preset: 'date'};
    opt.datetime = {preset: 'datetime'};
    opt.time = {preset: 'time'};
    opt.default = {
        theme: 'android-ics light', //皮肤样式
        display: 'modal', //显示方式 
        mode: 'scroller', //日期选择模式
        dateFormat: 'yyyy-mm-dd',
        lang: 'zh',
        showNow: true,
        nowText: "今天",
        startYear: currYear - 10, //开始年份
        endYear: currYear + 40 //结束年份
    };

    $("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
    var optDateTime = $.extend(opt['datetime'], opt['default']);
    var optTime = $.extend(opt['time'], opt['default']);
});
    </script>
</body>
</html>
@endsection
