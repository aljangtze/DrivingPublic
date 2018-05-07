@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>计时详情-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">计时详情</p>
</header>
<!--教练详情-->
<div class="coacher">
	<!--<p><img src="{{ asset('phone/images/jx.jpg') }}" alt="驾校图片"></p>-->
	<div class="coacher_info">
		<p>价格/学时</p>
                <p class="suojin"><label class="fxk"><input type="checkbox" id="time1" onclick="seltime1()" value="0">8:30-12:30 —— {{ $arr->seltime1 }}元</label></p>
		<p class="suojin"><label class="fxk"><input type="checkbox" id="time2" onclick="seltime2()" value="0">13:30-17:30 —— {{ $arr->seltime2 }}元</label></p>
		<p class="suojin"><label class="fxk"><input type="checkbox" id="time3" onclick="seltime3()" value="0">18:30-21:30 —— {{ $arr->seltime3 }}元</label></p>
		<p class="suojin"><label class="fxk"><input type="checkbox" id="time4" onclick="seltime4()" value="0">全天 —— {{ $arr->seltime4 }}元</label></p>
		<p>练习人数：{{ $arr->lxrs }}人/车</p>
		<p>所学车型：{{ $arr->cartype }}</p>
		<p>练习模式：
                @if($type == 2)
                    @if($arr->lxmodel == 1) 场地练习 @endif
                    @if($arr->lxmodel == 2) 考试练习 @endif
                @endif
                @if($type == 3)
                    @if($arr->lxmodel == 1) 考试路训 @endif
                    @if($arr->lxmodel == 2) 长途路训 @endif
                    @if($arr->lxmodel == 3) 考试路训(教练车) @endif
                @endif
                </p>
		<p>发布日期：{{ $arr->fbdate }}</p>
		<p>练习地址：{{ $arr->lcaddress }}</p>
	</div>	
</div>
<script>
    function seltime1(){
        var time1 = $("#time1").val();
        if(time1 == 0) {
            $("#time1").val("8:30-12:30");
            $("#lctime1").val("8:30-12:30");
            var price = $("#price1").val() + {{ $arr->seltime1 }};
            $("#price1").val(price);
        } else {
            $("#time1").val("0");
            $("#lctime1").val("");
            var price = $("#price1").val() - {{ $arr->seltime1 }};
            $("#price1").val("");
        }
    }
    function seltime2(){
        var time1 = $("#time2").val();
        if(time1 == 0) {
            $("#time2").val("13:30-17:30");
            $("#lctime2").val("13:30-17:30");
            var price = $("#price2").val() + {{ $arr->seltime2 }};
            $("#price2").val(price);
        } else {
            $("#time2").val("0");
            $("#lctime2").val("");
            var price = $("#price2").val() - {{ $arr->seltime2 }};
            $("#price2").val("");
        }
    }
    function seltime3(){
        var time1 = $("#time3").val();
        if(time1 == 0) {
            $("#time3").val("18:30-21:30");
            $("#lctime3").val("18:30-21:30");
            var price = $("#price3").val() + {{ $arr->seltime3 }};
            $("#price3").val(price);
        } else {
            $("#time3").val("0");
            $("#lctime3").val("");
            var price = $("#price3").val() - {{ $arr->seltime3 }};
            $("#price3").val("");
        }
    }
    function seltime4(){
        var time1 = $("#time4").val();
        if(time1 == 0) {
            $("#time4").val("全天");
            $("#lctime4").val("全天");
            var price = $("#price4").val() + {{ $arr->seltime4 }};
            $("#price4").val(price);
        } else {
            $("#time4").val("0");
            $("#lctime4").val("");
            var price = $("#price4").val() - {{ $arr->seltime4 }};
            $("#price4").val("");
        }
    }
</script>
<form action="{{ url('tel/xyjppay') }}" method="post" name="myform" style="display: none" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="lctime1" id="lctime1" value="">
    <input type="hidden" name="lctime2" id="lctime2" value="">
    <input type="hidden" name="lctime3" id="lctime3" value="">
    <input type="hidden" name="lctime4" id="lctime4" value="">
    <input type="hidden" name="price1" id="price1" value="">
    <input type="hidden" name="price2" id="price2" value="">
    <input type="hidden" name="price3" id="price3" value="">
    <input type="hidden" name="price4" id="price4" value="">
    <input type="hidden" name="id" value="{{ $arr->id }}">
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="lcmodel" value="{{ $arr->lxmodel }}">
    <input type="hidden" name="lcaddress" value="{{ $arr->lcaddress }}">
    <input type="hidden" name="tel" value="{{ $arr->tel }}">
    <input type="hidden" name="fbdate" value="{{ $arr->fbdate }}">
    <input type="hidden" name="lxrs" value="{{ $arr->lxrs }}">
    <input type="hidden" name="cartype" value="{{ $arr->cartype }}">
</form>
<p class="m_bsfg" style="height:50px;"></p>
<!--立即预约-->
<div class="ljyy">
	<p><a href="javascript:dopay()">我要预约</a></p>
</div>
<script>
   function dopay() {
        var form = document.myform;
        form.action = "{{ url('tel/xyjppay') }}";
        form.submit();
    }
</script>

</body>
</html>
@endsection