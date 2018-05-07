<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>企业注册-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/dist/css/dropify.css') }}">
<script src="{{ asset('phone/js/jquery.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">企业注册</p>
</header>
<!--加盟表单信息-->
<div class="jm1">
    <form action="{{ url('tel/tjcwsj')."/".$nickname }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="fenshu">
			<label>负责人姓名</label>
			<input type="text" value="" placeholder="请填写姓名" id="userName" name="name"/>
		</div>
		<div class="fenshu">
			<label>负责人年龄</label>
			<input type="text" value="" placeholder="请填写您的年龄" id="age" name="older"/>
		</div>
		<div class="fenshu">
			<label>联系电话</label>
			<input type="text" value="" placeholder="请填写联系电话" name="tel"/>
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
		<div class="fenshu" name="type">
			<label>所在行业</label>
			<select id="select_id" name="type">
				<option value="0">请选择所在行业</option>
				<option value="1">驾培服务</option>
				<option value="2">汽车服务</option>
				<option value="3">驾驶证服务</option>
			</select>
		</div>
		
	<!--上传图片，驾校-->
	<div id="jp" style="display:none;">
		<div class="fenshu">
			<label>成立日期</label>
			<input type="text" value="" placeholder="请填写成立日期" id="jl-jl1" name="cldate"/>
		</div>
		
		<div class="fenshu">
			<label>驾校名称</label>
			<input type="text" value="" placeholder="请填写驾校名称" id="szjx1" name="jxname"/>
		</div>
		<div class="fenshu">
			<label>驾校位置</label>
			<input type="text" value="" placeholder="请填写驾校位置" id="jxwz2" name="jxaddress"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">营业执照</label>
            <input type="file" name="yyzzpic" id="jxpxz1" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">法人身份证正面</label>
            <input type="file" name="frsfzpicz" id="jlsfz1" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">法人身份证反面</label>
            <input type="file" name="frsfzpicf" id="jlsffm1" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">驾校门头照</label>
            <input type="file" name="jlcpic" id="jlsffm1" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">训练场地1</label>
            <input type="file" name="xlcdpic1" id="xlcd1" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">训练场地2</label>
            <input type="file" name="xlcdpic2" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
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
            <input type="file" name="dpzpic" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
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
	<!--上传图片，驾驶证服务-->
<!--	<div id="jszfw" style="display:none;">
		<div class="fenshu">
			<label>详细地址</label>
			<input type="text" value="" placeholder="请填写详细地址" id="jl-xxdz2" name="address"/>
		</div>
		<div class="fenshu">
			<label>服务地区</label>
			<input type="text" value="" placeholder="请填写服务地区" id="jl-fwdq2" name="fwdq"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">店铺照片</label>
            <input type="file" name="jl-dpzp" id="jxpxz" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">身份证正面</label>
            <input type="file" name="jl-fwzm" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
		<div class="image_up">
			<label for="input-file-now">身份证反面</label>
            <input type="file" name="jl-fwfm"  class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
		</div>
	</div>-->
		<p class="clearfix"></p>
		<button type="submit" class="btn btn-primary" id="btn_wyrz">企业注册</button>
	</form>
</div>
<script src="{{ asset('phone/dist/js/dropify.js') }}"></script>
<script>
$(function(){
	$("#select_id").change(function(){
		var select_id=$("#select_id").val();
		if(select_id==1){
			$("#jp").show();
			$("#cw").hide();
			$("#jszfw").hide();
		}
		else if(select_id==2 || select_id==3){
			$("#jp").hide();
			$("#cw").show();
		}
		else{
			$("#jx").hide();
			$("#cw").hide();
			$("#jl").hide();
			$("#jszfw").hide();
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
			alert("请填写驾校名称");
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
</script>
</body>
</html>
