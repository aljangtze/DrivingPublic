@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>新司机网</title>
    </head>

    <body>
        <!--头部-->
    <header class="header" style=" margin-bottom:0;">
        <a href="javascript:history.go(-1)" class="logo column" style="width:14%;"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <form class="form-inline" action="{{ url('tel/xyjspx')."/".session()->get("Teluser") }}">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-group km_search" style="float:right;right:2%;width:78%;">
                <input type="text" class="form-control" name="name" placeholder="请输入关键词查找...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </header>
    <!--科目分类排序-->
    <!--<div class="jlxx_fl">
            <ul>
                    <li><a href="m_kmxz_1.html">科目一</a></li>
                    <li class="fl_slect"><a href="m_kmxz_2.html">科目二</a></li>
                    <li><a href="m_kmxz_3.html">科目三</a></li>
                    <li><a href="m_kmxz_4.html">科目四</a></li>
            </ul>
    </div>-->
    <!--当前所在城市-->
    <div class="dq_city">
        <p style="margin-bottom:0;">您所在位置：<span>云南省昆明市</span></p>
        <!--精确搜索-->

        <div class="docs-methods" style="margin-top:6px;width:100%;">
            <form class="form-inline" action="{{ url('tel/xyjspx')."/".session()->get("Teluser") }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div id="distpicker">
                    <div class="form-group" style="width:80%;float:left;margin-right:1%;">
                        <div style="position: relative;">
                            <input id="city-picker3" class="form-control" name="address" readonly type="text" value="请选择省/市/区县" data-toggle="city-picker">
                        </div>
                    </div>
                    <div class="form-group" style="width:18%; overflow:hidden">
                        <button class="btn btn-primary" type="submit" style="width:100%;">搜索</button>
                    </div>
                </div>
            </form>
        </div>
        <!--科目分类排序-->
        <div class="jlxx_fl">
            <ul>
                <li class="fl_slect"><a href="{{ url("tel/xyjspx")."/"."2"."/".session()->get("Teluser") }}">科目二</a></li>
                <li class=""><a href="{{ url("tel/xyjspx")."/"."3"."/".session()->get("Teluser") }}">科目三</a></li>
            </ul>
        </div>
        <!--类目查找-->
        <!--	<div class="lmcz">
                        <dl class="topmenu">
                                <dt>
                                        <div class="selectlist">
                                                <div class="select_textdiv">
                                                        <input type="hidden" value=""/>
                                                        <p class="s_text">车型</p><span class="down"><img src="{{ asset('phone/images/down.png') }}"></span>
                                                </div>
                                                <div class="select_textul">
                                                        <ul class="select_first_ul">
                                                                <li class="focus">
                                                                        <p>A型</p>
                                                                        <ul class="select_second_ul" style="display: block;">
                                                                                <li><a href="#">A1</a></li>
                                                                                <li><a href="#">A2</a></li>
                                                                                <li><a href="#">A3</a></li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <p>B型</p>
                                                                        <ul class="select_second_ul">
                                                                                <li><a href="#">B1</a></li>
                                                                                <li><a href="#">B2</a></li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <p>C型</p>
                                                                        <ul class="select_second_ul">
                                                                                <li><a href="#">C1</a></li>
                                                                                <li><a href="#">C2</a></li>
                                                                                <li><a href="#">C3</a></li>
                                                                                <li><a href="#">C4</a></li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <p><a href="#">D型</a></p>
                                                                </li>
                                                                <li>
                                                                        <p><a href="#">E型</a></p>
                                                                </li>
                                                        </ul>
                                                </div>
                                        </div>	
                                </dt>
                                <dt>
                                        <div class="selectlist">
                                                <div class="select_textdiv">
                                                        <input type="hidden" value=""/>
                                                        <p class="s_text">项目</p><span class="down"><img src="{{ asset('phone/images/down.png') }}"></span>
                                                </div>
                                                <div class="select_textul">
                                                        <ul class="select_first_ul">
                                                                <li>
                                                                        <p><a href="#">场地练习</a></p>
                                                                </li>
                                                                <li>
                                                                        <p><a href="#">考试车练习</a></p>
                                                                </li>
                                                        </ul>
                                                </div>
                                        </div>	
                                </dt>
                                <dt>
                                        <div class="selectlist">
                                                <div class="select_textdiv">
                                                        <input type="hidden" value=""/>
                                                        <p class="s_text">日期</p><span class="down"><img src="{{ asset('phone/images/down.png') }}"></span>
                                                </div>
                                                <div class="select_textul">
                                                        <ul class="select_first_ul">
                                                                <li>
                                                                        <div class="demos" style="width:100%;height:90px;margin-top:5px;">
                                                                                <label for="appDate" class="sr-only">日期</label>
                                                                                <input value="" class="form-control" readonly="readonly" name="appDate" id="appDate" type="text" placeholder="请点击选择日期">
                                                                                <button type="submit" class="btn btn-primary" style="margin-top:10px;">搜索</button>
                                                                        </div>
                                                        </li>
                                                </div>
                                        </div>	
                                </dt>
                                <dt>
                                        <div class="selectlist">
                                                <div class="select_textdiv">
                                                        <input type="hidden" value=""/>
                                                        <p class="s_text">时间</p><span class="down"><img src="{{ asset('phone/images/down.png') }}"></span>
                                                </div>
                                                <div class="select_textul">
                                                        <ul class="select_first_ul">
                                                                <li class="focus">
                                                                        <p>时间段</p>
                                                                        <ul class="select_second_ul" style="display: block;">
                                                                                <li><a href="#">8:30-12:30</a></li>
                                                                                <li><a href="#">13:30-17:30</a></li>
                                                                                <li><a href="#">18:30-21:30</a></li>
                                                                                <li><a href="#">全天</a></li>
                                                                        </ul>
                                                                </li>
                                                        </ul>
                                                </div>
                                        </div>	
                                </dt>
                        </dl>
                </div>-->
    </div>

    <p class="m_fg"></p>
    <!--列表-->
    <div class="fb_ul">
        <ul>
            <!--科目二开始-->
            @foreach($items as $tmp)
            <li>
                <div class="fb_li">
                    <p><strong>练习项目：</strong> 
                        @if($tmp->type == 2) 科目二 @endif
                        @if($tmp->type == 3) 科目三 @endif
                    </p>
                    <p><strong>所学车型：</strong> {{ $tmp->cartype }}</p>
                </div>
                <div class="fb_li">
                    <p><strong>练习模式：</strong>
                        @if($tmp->lxmodel == 1) 场地练习 @endif
                        @if($tmp->lxmodel == 2) 考试车练习 @endif
                    </p>
                    <p><strong>发布日期：</strong> {{ $tmp->fbdate }} </p>
                    <p><strong>练习地址：</strong> {{ $tmp->lcaddress }} </p>
                </div>
                <div class="btn_xq"><a href="{{ url('tel/xyjspxlist')."/".$tmp->id }}">查看详情 >></a></div>
            </li>
            @endforeach
            <!--科目二结束-->
            <!--科目三开始-->
        </ul>
    </div>
    <!--查找发布-->
    <div class="czgb">
        <a href="{{ url('tel/xyxqfb')."/".session()->get("Teluser") }}" class="btn btn-primary">制定我的即时学车</a>
    </div>
    <p style="height:50px"></p>
    <script src="{{ asset('phone/js/city-picker.data.js') }}"></script>
    <script src="{{ asset('phone/js/city-picker.js') }}"></script>
    <script src="{{ asset('phone/js/main.js') }}"></script>
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
