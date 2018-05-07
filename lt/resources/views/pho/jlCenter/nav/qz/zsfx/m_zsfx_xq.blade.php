<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>会员中心-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/public.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('phone/dist/css/dropify.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
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
</head>

<body>
        <!--头部-->
    <header class="header">	
        <a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">知识分享</p>
    </header>

    <!--详情标题-->
    <div class="m_detail">
        <div class="de_title">
            <p>{{ $str->title }}</p>
            <p class="de_date"><img src="{{ asset('phone/images/yj_icon.png') }}">{{ $str->show }}<span>{{ $str->fbdate }}</span></p>
        </div>
    </div>
    <!--详情内容-->
    <div class="de_content ft_detail">
        <p>{!!$str->content!!}</p>
    </div>

    <p class="clearfix" style="margin-bottom:0;"></p>
    <!--详情底部-->
    <div class="de_footer">
        @if($up == null)
        <p class="dhyc_p">上一篇：<button type="button" class="btn btn-link">无</button></p>
        @endif
        @if($up !== null)
        <p class="dhyc_p">上一篇：<a href="{{ url('tel/qzzsfxdetail')."/".$up->id."/".session()->get("Teluser") }}"><button type="button" class="btn btn-link">{{ $up->title }}</button></a></p>
        @endif
        @if($down == null)
        <p class="dhyc_p">下一篇：<button type="button" class="btn btn-link" >无</button></p>
        @endif
        @if($down !== null)
        <p class="dhyc_p">下一篇：<a href="{{ url('tel/qzzsfxdetail')."/".$down->id."/".session()->get("Teluser") }}"><button type="button" class="btn btn-link" >{{ $down->title }}</button></a></p>
        @endif
    </div>
    <p class="m_bsfg" style="height:150px;"></p>
    <!--推荐框-->
    <div class="xwtj">
        <p class="xwtj_bt">新司机服务平台</p>
        <div class="xw_img column">
            <a href="{{ url("tel/cwsj")."/".session()->get("Teluser") }}"><img src="{{ asset('phone/images/jx.jpg') }}" class="img-rounded"></a>	
        </div>
        <div class="xw_font column">
            <p><a href="{{ url("tel/cwsj")."/".session()->get("Teluser") }}">加入平台</a></p>
        </div>
    </div>
    <!--<p style="height: 30px"></p>-->
    <script>
        $(function () {

        });
    </script>
</body>
</html>
