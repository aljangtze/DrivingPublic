@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>汽车服务发布-新司机网</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
<!--头部-->
<header class="header">
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">汽车服务发布</p>
</header>
<!--汽车服务内容-->
<div class="vip_class">
	<div class="jm1">
		<form action="{{ url('jtel/savelzqcfw')."/".session()->get("jTeluser") }}" method="post">
                    <input type="hidden" name="bianhao" value="{{ $bianhao }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="fenshu">
				<label>商家名称</label>
				<input type="text" value="" name="shopname" placeholder="请填写商家名称，必填" id="sjmc"/>
			</div>
			<div class="fenshu">
				<label>服务项目</label>
				<!-- <input type="text"  value="" name="fwitem" placeholder="请填写服务项目，必填" id="fwxm"/> -->
				<select name="fwitem" id="fwxm">
					<option value="1">车辆过户</option>
					<option value="2">提档转籍</option>
					<option value="3">补办牌照</option>
					<option value="4">免检盖章</option>
					<option value="5">车辆年检</option>
					<option value="6">车辆上牌</option>
					<option value="7">补办行驶证</option>
					<option value="8">代开委托书</option>
					<option value="9">违章查询</option>
					<option value="10">罚单代缴</option>
				</select>
			</div>
			<div class="fenshu">
				<label>服务价格</label>
				<input type="text" disabled="disabled" value="19.88" name="fwprice" placeholder="请填写价格（例200），必填" id="jg" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" />
			</div>
			<div class="fenshu">
				<label>商家地址</label>
				<input type="text" value="" name="shopaddress" placeholder="请填写商家地址，必填" id="addr"/>
			</div>
			<div class="fenshu">
				<label>所需材料</label>
				<textarea class="form-control" name="iteminfo" rows="8" placeholder="请填写项目所需要的材料及说明" style="border:1px solid #ededed;outline:none;box-shadow:none;" /></textarea>
			</div>
			<button type="submit" class="btn btn-primary" id="btn_ptbx" style="margin-top:15px;">确定发布</button>
		</form>
	</div>
</div>
<script src="dist/js/dropify.js"></script>
<script>
$("#btn_ptbx").click(function(){
	var sjmc=$("#sjmc").val();
	var jg=$("#jg").val();
	var addr=$("#addr").val();
	var sjtp=$("#sjtp").val();
	if(jg=="" || sjmc=="" || addr=="" || sjtp==""){
		alert("必填内容不能为空");
		return false;
	}
	else{
		alert("发布成功");
	}
});

</script>
</body>
</html>
@endsection
