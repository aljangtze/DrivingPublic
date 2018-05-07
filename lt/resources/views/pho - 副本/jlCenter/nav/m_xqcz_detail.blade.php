@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>需求详情-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">需求详情</p>
</header>
<!--详情标题-->
<div class="m_detail">
	<div class="de_title xq-detail">
		<p>{{ $str->title }}</p>
		<p class="sub">{{ $str->fbdate }}<span>发布人：{{ $str->name }}</span></p>
	</div>
</div>
<!--详情内容-->
<div class="xq_nr">
    <p>练车时间：{{ $str->lcdate }}&nbsp;{{ $str->lctime }}</p>
	<p>联系电话：{{ $str->tel }}</p>
	<p>所在位置：{{ $str->szaddress }}</p>
	<p>户口所在地：{{ $str->hkaddress }}</p>
	<p>项目：
        @if($str->selitem == 1) 科目一 @endif
        @if($str->selitem == 2) 科目二 @endif
        @if($str->selitem == 3) 科目三 @endif
        @if($str->selitem == 4) 科目四 @endif
        @if($str->selitem == 5) 定制报名 @endif
        </p>
	<p>类别：
        @if($str->keitem == 1) 场地练习 @endif
        @if($str->keitem == 2) 考试练习 @endif
        @if($str->keitem1 == 3) 考试路训 @endif
        @if($str->keitem1 == 4) 长途路训 @endif
        @if($str->keitem1 == 5) 考试路训(考试车) @endif
        </p>
	<p>车型：
        @if($str->kecartype !== null)
        {{ $str->kecartype }}
        @endif
        @if($str->kescartype !== null)
        {{ $str->kescartype }}
        @endif
        </p>
	<p>详情：{{ $str->infocontent }}</p>

	<a href="{{ url('tel/jlxyxqjd')."/".$str->id."/".session()->get("Teluser") }}"><button type="button" class="btn btn-primary">我要接单</button></a>
</div>

<script>
$(function(){
	$("#btn-jd").click(function(){
		alert("接单成功");
		$("#btn-jd").addClass("disabled");
		$("#btn-jd").html("已被接单");
	});
});
</script>
</body>
</html>
@endsection
