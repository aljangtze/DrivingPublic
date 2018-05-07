<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>订单录入-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pj/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('pj/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('pj/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('pj/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('pj/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('pj/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('pj/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">编辑班型信息</li>
		</ol>
	</div>
	<p class="clearfix"></p>
	<!--订单录入-->
	<div class="dd_box">
            <form action="{{ url('admin/ptclass')."/".$str->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                    <ul>
				<li>
					<div class="form-group">
						<label>姓名</label>
						<input type="text" class="form-control" name="name" value="{{ $str->name }}" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>性别</label>
						<select class="form-control" name="sex" style="width:180px;">
							<option @if($str->sex == 1) checked  @endif value="1">男</option>
							<option  @if($str->sex == 1) checked @endif  value="0">女</option>
						</select>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>价格</label>
						<input type="text" name="price" class="form-control" value="{{ $str->price }}" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>介绍</label>
						<input type="text" name="info" class="form-control" value="{{ $str->info }}" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>费用明细</label>
                                                <textarea name="sfinfo">{{ $str->sfinfo }}</textarea>
					</div>
				</li>
			</ul>
			<div style="clear:both;"><button type="submit" class="btn btn-info" style="margin-left:10px;" id="btn-change">保存修改</button></div>
		</form>
	</div>
</div>

<script>
$(function () {
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
		        startYear: currYear - 30, //开始年份
		        endYear: currYear + 50 //结束年份
			};

		  	$("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
			$("#dqDate").mobiscroll($.extend(opt['date'], opt['default']));
		  	var optDateTime = $.extend(opt['datetime'], opt['default']);
		  	var optTime = $.extend(opt['time'], opt['default']);
        });
</script>
</body>
</html>
