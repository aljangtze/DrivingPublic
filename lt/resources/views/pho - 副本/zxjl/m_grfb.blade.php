@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>发布列表-新司机网</title>
    </head>

    <body>
        <!--头部-->
    <header class="header">
        <a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">发布列表</p>
    </header>
    <!--科目分类排序-->
    <div class="jlxx_fl">
    </div>
    <!--类目查找-->
<!--    <div class="lmcz" style="height:30px;">
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
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."A1" }}">A1</a></li>
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."A2" }}">A2</a></li>
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."A3" }}">A3</a></li>
                            </ul>
                        </li>
                        <li>
                            <p>B型</p>
                            <ul class="select_second_ul">
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."B1" }}">B1</a></li>
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."B2" }}">B2</a></li>
                            </ul>
                        </li>
                        <li>
                            <p>C型</p>
                            <ul class="select_second_ul">
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."C1" }}">C1</a></li>
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."C2" }}">C2</a></li>
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."C3" }}">C3</a></li>
                                <li><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."C4" }}">C4</a></li>
                            </ul>
                        </li>
                        <li>
                            <p><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."D" }}">D型</a></p>
                        </li>
                        <li>
                            <p><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."E" }}">E型</a></p>
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
                            <p><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."6"."/"."1" }}">场地练习</a></p>
                        </li>
                        <li>
                            <p><a href="{{ url('tel/xyjspxlist')."/".$str->id."/"."6"."/"."2" }}">考试车练习</a></p>
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
                                <form action="{{ url('tel/xyjspxlist')."/".$str->id."/"."7" }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="appDate" class="sr-only">日期</label>
                                    <input value="" class="form-control" readonly="readonly" name="fbdate" id="appDate" type="text" placeholder="请点击选择日期">
                                    <button type="submit" class="btn btn-primary" style="margin-top:10px;">搜索</button>
                                </form>
                            </div>
                        </li>
                    </ul>
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
    <div class="m_bsfg" style="height:0px;"></div>
    <!--内容-->
    <div class="coach_box" style="">
        @if($tmp !== null)
        <ul class="coach-ul">
            @foreach($tmp as $tmp)
            <li>
                <a href="{{ url('tel/xyjpdetail')."/".$str->id."/"."2" }}">
                    <div class="coach_img" style="height:110px;">
                        @if($tmp->type == 1)
                        <img src="{{ asset('jlcpic')."/".$tmp->jlcpic }}" />
                        @endif
                        @if($tmp->type == 2)
                        <img src="{{ asset('dppic')."/".$tmp->dppic }}" />
                        @endif
                        @if($tmp->type == 3)
                        <img src="{{ asset('dppic')."/".$tmp->dppic }}" />
                        @endif
                    </div>
                    <div class="drive_xx drive-p">
                        <p>{{ $tmp->name }}</p>
                        <!--<p style="font-size:1.5rem;color:#f00;font-weight:bold">￥{{ $tmp->price }}</p>-->
                        <p>8:30-12:30：<span style="font-size:1.3rem;color:#f00;font-weight:bold">￥{{ $str->seltime1 }}</span></p>
                        <p>13:30-17:30：<span style="font-size:1.3rem;color:#f00;font-weight:bold">￥{{ $str->seltime2 }}</span></p>
                        <p>18:30-21:30：<span style="font-size:1.3rem;color:#f00;font-weight:bold">￥{{ $str->seltime2 }}</span></p>
                        <p class="dhyc_p">练车地址：{{ $str->lcaddress }}</p>
<!--				<p>所在行业：
                        @if($tmp->type == 1) 驾培服务 @endif
                        @if($tmp->type == 2) 汽车服务 @endif
                        @if($tmp->type == 3) 驾驶证服务 @endif
                        </p>
                        <p>
                        @if($tmp->type == 1) {{ $tmp->jxaddress }} @endif
                        @if($tmp->type == 2) {{ $tmp->address }} @endif
                        @if($tmp->type == 3) {{ $tmp->address }} @endif
                        </p>-->
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <div style="height: 60px;width:100%;clear: both;"></div>
    <script>
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
                startYear: currYear - 30, //开始年份
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
