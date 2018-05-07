<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加账号-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
</head>

<body>
<div class="p_file">
	<!--导航-->
	<div class="yw_nav" style="margin-top:0;">
		<ol class="breadcrumb">
		  <li><a href="index.html">首页</a></li>
		  <li class="active">添加账号</li>
		</ol>
	</div>
	<!--添加账号-->
	<div class="add_zh">
            <form class="form-inline" action="{{ url('admin/user') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label>账号</label>
				<input type="text" class="form-control" id="zh" name="nickname" value="" placeholder="输入新账户" />
			</div>
			<div class="form-group">
				<label>密码</label>
                                <input type="password" class="form-control" id="mm" name="pass" value="" placeholder="输入账户密码" />
			</div>
			<div class="form-group">
				<label>姓名</label>
				<input type="text" class="form-control" id="mm" name="name" value="" placeholder="姓名" />
			</div>
			<div class="form-group">
				<label>性别</label>&nbsp;&nbsp;&nbsp;
                                男<input type="radio" class="form-control" id="mm" name="sex" value="1" />&nbsp;&nbsp;&nbsp;
                                女<input type="radio" class="form-control" id="mm" name="sex" value="0" />
			</div>
			<div class="form-group">
				<label>权限类别</label>&nbsp;&nbsp;&nbsp;
                                高级管理员<input type="radio" class="form-control" id="mm" checked name="type" value="1" />&nbsp;&nbsp;&nbsp;
			</div>
			<div class="form-group">
				<label>联系电话</label>
				<input type="text" class="form-control" id="mm" name="tel" value="" placeholder="联系电话" />
			</div>
			<div class="form-group">
				<label>地址</label>
				<input type="text" class="form-control" id="mm" name="address" value="" placeholder="地址" />
			</div>
			<button type="submit" class="btn btn-info" id="btn_tj">添加账户</button>
		</form>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$("#btn_tj").click(function(){
		var zh=$("#zh").val();
		var mm=$("#mm").val();
		var qx=$("#qx").val();
		if(zh=="" || qx=="0" || mm==""){
			alert("内容不能为空");
		}
		else{
			alert("添加账号成功");
		}
	});
});
</script>
</body>
</html>
