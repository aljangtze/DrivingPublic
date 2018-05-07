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
		  <li class="active">编辑信息</li>
		</ol>
	</div>
	<p class="clearfix"></p>
	<!--订单录入-->
	<div class="xg_box">
		<form class="form-inline" action="{{ url('admin/postgrqcedit')."/".$str->id }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<ul>
				<li>
					<div class="form-group">
						<label>姓名</label>
						<input type="text" name="name" class="form-control" value="{{ $str->name }}" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>性别</label>
						<select class="form-control" style="width:180px;" name="sex">
							<option @if($str->sex == 1) checked @endif value="1">男</option>
							<option @if($str->sex == 0) checked @endif value="2">女</option>
						</select>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>联系电话</label>
						<input type="text" class="form-control" name="tel" value="{{ $str->tel }}"  onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>省份证号码</label>
						<input type="text" class="form-control" name="sfzh" value="{{ $str->sfzh }}"  />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>年龄</label>
						<input type="text" class="form-control" name="jlolder" value="{{ $str->older }}"  />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>详细地址</label>
						<input type="text" class="form-control" name="address" value="{{ $str->address }}" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>服务地区</label>
						<input type="text" class="form-control" name="fwdq" value="{{ $str->fwdq }}" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>店铺照片</label>
						<input type="file" name="dppic" class="form-control" />
						<input type="hidden" name="mydppic" class="form-control" value="{{ $str->dppic }}"/>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label>身份证正面</label>
						<input type="file" name="grsfzpicz" class="form-control" />
                                                <input type="hidden" name="mygrsfzpicz" class="form-control" value="{{ $str->grsfzpicz }}"/>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="appDate">身份证正面</label>
						<input type="file" name="grsfzpicf" class="form-control" />
						<input type="hidden" name="mygrsfzpicf" class="form-control" value="{{ $str->grsfzpicf }}"/>
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
