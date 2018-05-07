<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>个人注册-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/dist/css/dropify.css') }}">
<script src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script src="{{ asset('phone/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">个人注册</p>
</header>
<!--加盟表单信息-->
<div class="jm1">
    <form action="{{ url('jtel/tjgrrz')."/".$nickname }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="fenshu">
			<label>姓名</label>
			<input type="text" value="" placeholder="请填写姓名" id="userName" name="name"/>
		</div>
		<div class="fenshu">
			<label>年龄</label>
			<input type="text" value="" placeholder="请填写您的年龄" id="age" name="older"/>
		</div>
		<div class="fenshu">
			<label>联系电话</label>
			<input type="text" value="" placeholder="请输入联系电话" id="age" name="tel"/>
		</div>
		<div class="fenshu">
			<label>身份证号码</label>
			<input type="text" value="" placeholder="请填写身份证号码" id="cartID" name="sfzh" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();"/>
		</div>
		<div class="fenshu">
			<label>性别</label>
			<label class="radio-inline">
			   <input type="radio" name="sex" id="inlineRadio1" value="1" checked="checked"> 男
			</label>
			<label class="radio-inline">
			   <input type="radio" name="sex" id="inlineRadio2" value="0"> 女
			</label>
		</div>
		<div class="fenshu">
			<label>所在行业</label>
			<select id="select_id" name="type">
				<option value="0">请选择所在行业</option>
				<!--<option value="1">驾校</option>-->
				<option value="1">驾培服务</option>
				<option value="2">汽车服务</option>
				<option value="3">驾驶证服务</option>
			</select>
		</div>
	   <div id="jl" style="display:none;">
	   	<p class="m_bsfg" style="height:0;margin-bottom:0;"></p>
		<div class="fenshu">
			<label>教龄</label>
			<input type="text" value="" placeholder="请填写您的教龄" id="jl-jl2" name="jlolder"/>
		</div>
		<div class="fenshu">
			<label>所在驾校</label>
			<input type="text" value="" placeholder="请填写所在驾校，没有填无" id="szjx2" name="szjxname"/>
		</div>
		<div class="fenshu">
			<label>驾校位置</label>
			<input type="text" value="" placeholder="请填写驾校位置，没有填无" id="jxwz2" name="jxaddress"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">教练证或工作证</label>
            <input type="file" name="jlzpic" id="jxzp3" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">身份证（正面）</label>
            <input type="file" name="sfzpicz"  class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">驾驶证（正面）</label>
            <input type="file" name="jszpicz" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">教练车行驶证（正面）</label>
            <input type="file" name="jlcxszpic" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">教练车</label>
            <input type="file" name="jlcpic" id="jlc" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">个人真实照片</label>
            <input type="file" name="grpic" id="jlc" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		
	</div>
	<!--上传图片，汽车服务-->
	<div id="cw" style="display:none;">
		<div class="fenshu">
			<label>详细地址</label>
			<input type="text" value="" placeholder="请填写详细地址" id="jl-xxdz" name="address"/>
		</div>
		<div class="fenshu">
			<label>服务地区</label>
			<input type="text" value="" placeholder="请填写服务地区" id="jl-fwdq" name="fwdq"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">店铺照片</label>
            <input type="file" name="dppic" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">身份证正面</label>
            <input type="file" name="grsfzpicz"  class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">身份证反面</label>
            <input type="file" name="grsfzpicf" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
	</div>
	
	<!--专项教练-->
	<div id="jsjl" style="display:none;">
	<p class="m_bsfg" style="height:0;margin-bottom:0;"></p>
		<div class="fenshu">
				<label>价格/小时</label>
				<input type="text" value="" name="price" placeholder="请填写价格（范围：20-200元）" id="price" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]+/,'');}).call(this)" onblur="this.v();" />
			</div>
			<div class="fenshu">
				<label>练习人数</label>
				<select id="select_id" name="lxrs">
					<option value="0">请选择练习人数</option>
					<option value="1">1人/车</option>
					<option value="2">2人/车</option>
					<option value="3">3人/车</option>
					<option value="4">4人/车</option>
				</select>
			</div>
			<div class="fenshu">
				<labe for="appDate"l>发布日期</label>
				<input type="text" value="" name="fbdate" placeholder="请填写发布日期" readonly="readonly"  id="appDate"/>
			</div>
			<!--时间段-->
			<div class="xm_check">
				<p style="color:#333;margin-bottom:0;height:30px;">时间选择(可多选)</p>
				<div class="times">
					<input type="checkbox" name="time" value="8:30-12:30"/> 8:30-12:30
				</div>
				<div class="times">
					<input type="checkbox" name="time1" value="13:30-17:30"/> 13:30-17:30
				</div>
				<div class="times">
					<input type="checkbox" name="time2" value="18:30-21:30"/> 18:30-21:30
				</div>
				<div class="times">
					<input type="checkbox" name="time3" value="全天"/> 全天
				</div>
			</div>
	</div>
		<p class="clearfix"></p>
                <input type="hidden" name="qf" id="qf" value="0">
                <button type="button" class="btn btn-info" id="btn_zxjl" style="width:100%;margin-bottom:15px;" onclick="dodel()">成为即时教练</button>
		<button type="submit" class="btn btn-primary" id="btn_wyrz">提交</button>
	</form>
</div>
<script>
    function dodel() {
      var a = $("#qf").val();
      if(a == 0) {
          var b = 1;
          $("#qf").val(b);
      } else {
         var c = 0;
          $("#qf").val(c);
      }
    }
</script>
<script src="{{ asset('phone/dist/js/dropify.js') }}"></script>
<script>
$(function(){
	$("#btn_zxjl").click(function(){
		$("#jsjl").toggle();
	});
	$("#select_id").change(function(){
		var select_id=$("#select_id").val();
		if(select_id==1){
			$("#jl").show();
			$("#cw").hide();
		}
		else if(select_id==2){
			$("#jl").hide();
			$("#cw").show();
		}
                else if(select_id==3){
			$("#jl").hide();
			$("#cw").show();
		}
		else{
			$("#jx").hide();
			$("#cw").hide();
			$("#jl").hide();
		}
	});
	$("#btn_wyrz").click(function(){
		var select_id=$("#select_id").val();
		var userName=$("#userName").val();
		var szjx=$("#szjx").val();
		if(userName==""){
			alert("请填写真实姓名");
			$("#userName").focus();
			return false;
		}
		else if(szjx==""){
			alert("请填写所在驾校");
			$("#szjx").focus();
			return false;
		}
		else if(select_id==0){
			alert("请选择所在行业");
			return false;
		}
		else{
			alert("入驻资料提交成功，等待后台审核");
		}
	});
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
