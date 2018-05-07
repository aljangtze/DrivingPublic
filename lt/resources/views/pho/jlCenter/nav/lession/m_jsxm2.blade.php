@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>科目二发布-新司机网</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
<!--头部-->
<header class="header">
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">科目二发布</p>
</header>
<!--汽车服务内容-->
<div class="vip_class">
	<div class="jm1">
            <form action="{{ url('jtel/savelessiontwo')."/".session()->get("jTeluser") }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="sjid" value="{{ $sjid }}">
                <input type="hidden" name="type" value="2">
			<p style="color:#111;margin-bottom:5px;">价格/学时(可多填)</p>
				<div class="fenshu">
					<label>8:30-12:30</label>
					<input type="text" name="seltime1" value="" placeholder="请填写价格（范围：20-200元）" class="price" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]+/,'');}).call(this)" onblur="this.v();" />
				</div>
				<div class="fenshu">
					<label>13:30-17:30</label>
					<input type="text" name="seltime2" value="" placeholder="请填写价格（范围：20-200元）" class="price" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]+/,'');}).call(this)" onblur="this.v();" />
				</div>
				<div class="fenshu">
					<label>18:30-21:30</label>
					<input type="text" name="seltime3" value="" placeholder="请填写价格（范围：20-200元）" class="price" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]+/,'');}).call(this)" onblur="this.v();" />
				</div>
				<div class="fenshu">
					<label>全天</label>
					<input type="text" name="seltime4" value="" placeholder="请填写价格（范围：20-200元）" class="price" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]+/,'');}).call(this)" onblur="this.v();" />
				</div>   

			<div class="fenshu">
				<label>练习人数</label>
				<select id="select_rs" name="lxrs">
					<option value="1">1人/车</option>
					<option value="2">2人/车</option>
					<option value="3">3人/车</option>
					<option value="4">4人/车</option>
				</select>
			</div>
			<div class="fenshu">
				<label>所学车型</label>
				<input type="text" name="cartype" value="" placeholder="请填写所学车型" id=""/>
			</div>
			<div class="fenshu">
				<label>练习模式</label>
				<select id="select_ms" name="lxmodel">
                                    
					<option value="1">场地练习</option>
					<option value="2">考试车练习</option>
                                    
				</select>
			</div>
			
			<div class="fenshu">
				<labe for="appDate"l>发布日期</label>
				<input type="text" name="fbdate" value="" placeholder="请填写发布日期" readonly="readonly"  id="appDate"/>
			</div>

			<p class="clearfix" style="height:0;margin-bottom:0;"></p>
			<div class="fenshu">
				<label>联系电话</label>
				<input type="text" name="tel" value="" placeholder="请填写联系电话，必填" id="phone" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" />
			</div>
			<div class="fenshu">
				<label>练车地址</label>
				<input type="text" name="lcaddress" value="" placeholder="请填写练车地址，必填" id="addr"/>
			</div>
			<!--上传附件-->
			<!--<div class="image_up">
				<label for="input-file-now">商家图片</label>
				<input type="file" name="sjtp" id="sjtp" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
			</div>-->
			<button type="submit" class="btn btn-primary" id="btn_ptbx" style="margin-top:15px;">确定发布</button>
		</form>
	</div>
	<!--车型说明-->
	<div class="cxsm">
		<p class="sm">说明：</p>
		<p class="ys">A1：大型客车 <span>A2：牵引车</span></p>
		<p class="ys">A3：城市公交车</p>
		<p class="ys">B1：中型客车 <span>B2：大型货车</span></p>
		<p class="ys">C1：小型汽车 <span>C2：小型自动挡汽车</span></p>
		<p class="ys">C3：低速载货汽车 <span>C4：三轮汽车</span></p>
		<p class="ys">C5：残疾人专用小型自动挡载客汽车</p>
		<p class="ys">D：普通三轮摩托车 <span>E：普通二轮摩托车</span></p>
	</div>
</div>
<script src="dist/js/dropify.js"></script>
<script>
$("#btn_ptbx").click(function(){
	var max_number= 200;
	var min_number= 20;
	var price=$(".price").val();
	var appDate=$("#appDate").val();
	var phone=$("#phone").val();
	var addr=$("#addr").val();
    if(price < min_number || price>max_number){
		alert("请输入20-200元范围之间");
		return false;
	}
	else if(appDate=="" || phone=="" || addr==""){
		alert("内容不能为空");
		return false;
	}
	else{
		alert("发布成功");
	}
});



$(document).ready(function(){
	// Basic
	$('.dropify').dropify();
	// Translated
	$('.dropify-fr').dropify({
		messages: {
			default: 'Glissez-déposez un fichier ici ou cliquez',
			replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
			remove:  'Supprimer',
			error:   'Désolé, le fichier trop volumineux'
		}
	});
	// Used events
	var drEvent = $('#input-file-events').dropify();
	drEvent.on('dropify.beforeClear', function(event, element){
		return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
	});
	drEvent.on('dropify.afterClear', function(event, element){
		alert('File deleted');
	});

	drEvent.on('dropify.errors', function(event, element){
		console.log('Has Errors');
	});
	var drDestroy = $('#input-file-to-destroy').dropify();
	drDestroy = drDestroy.data('dropify')
	$('#toggleDropify').on('click', function(e){
		e.preventDefault();
		if (drDestroy.isDropified()) {
			drDestroy.destroy();
		} else {
			drDestroy.init();
		}
	})
});
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
