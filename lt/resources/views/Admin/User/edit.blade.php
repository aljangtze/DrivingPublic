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
		  <li><a href="#">首页</a></li>
		  <li class="active">修改账号信息</li>
		</ol>
	</div>
	<!--添加账号-->
	<div class="add_zh">
            <form class="form-inline" action="{{ url('admin/user')."/".$str->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label>账号</label>
				<input type="text" class="form-control" id="zh" name="nickname" value="{{ $str->nickname }}" placeholder="输入新账户" />
			</div>
			<div class="form-group">
				<label>密码</label>
                                <input type="password" class="form-control" id="mm" name="pass" value="{{ $str->pass }}" placeholder="输入账户密码" />
			</div>
			<div class="form-group">
				<label>姓名</label>
				<input type="text" class="form-control" id="mm" name="name" value="{{ $str->name }}" placeholder="姓名" />
			</div>
			<div class="form-group">
				<label>性别</label>&nbsp;&nbsp;&nbsp;
                                男<input type="radio" class="form-control" @if($str->sex == 1) checked @endif id="mm" name="sex" value="1" />&nbsp;&nbsp;&nbsp;
                                女<input type="radio" class="form-control" @if($str->sex == 0) checked @endif id="mm" name="sex" value="0" />
			</div>
			<div class="form-group">
				<label>权限类别</label>&nbsp;&nbsp;&nbsp;
                                普通管理员<input type="radio" class="form-control" id="mm" @if($str->type == 2) checked @endif  name="type" value="2" />&nbsp;&nbsp;&nbsp;
                                移除权限<input type="radio" class="form-control" id="mm" @if($str->type == 3) checked @endif  name="type" value="3" />&nbsp;&nbsp;&nbsp;
			</div>
			<div class="form-group">
				<label>联系电话</label>
				<input type="text" class="form-control" id="mm" name="tel" value="{{ $str->tel }}" placeholder="联系电话" />
			</div>
			<div class="form-group">
				<label>地址</label>
				<input type="text" class="form-control" id="mm" name="address" value="{{ $str->address }}" placeholder="地址" />
			</div>
			<button type="submit" class="btn btn-info" id="btn_tj">保存</button>
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
			alert("信息编辑成功");
		}
	});
});
</script>
</body>
</html>
