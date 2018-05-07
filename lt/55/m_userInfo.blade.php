<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>基本信息-云南伦途科技有限公司</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="images/fhjt.png" alt="返回" /></a>
	<p style="width:86%;text-align:center;color:#fff;height:40px; line-height:40px;">基本信息</p>
</header>
<!--基本信息内容-->
<div class="m_basic_box">
	<form action="m_xyCenter.html">
		<div class="form-group">
    		<label><span>*</span>真实姓名</label>
    		<input type="text" class="form-control" placeholder="输入真实姓名" id="user">
 		</div>
		<div class="form-group clearfix">
   				 <label style="float:left;">性别</label>
  				 <select class="form-control">
  					<option value="1">男</option>
  					<option value="2">女</option>
				</select>
 		</div>
		<div class="form-group">
    		<label><span>*</span>年龄</label>
    		<input type="text" class="form-control" placeholder="输入年龄" id="age" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();"/>
 		</div>
		<div class="form-group">
    		<label>出生日期</label>
    		<input type="text" class="form-control" placeholder="输入出生日期，例如1995-07-13" />
 		</div>
		<div class="form-group">
    		<label><span>*</span>居住地址</label>
    		<textarea class="form-control"placeholder="输入详细地址,例如：云南省昆明市盘龙区东风广场建工大厦" rows="3" id="address"/></textarea>
 		</div>
		<button type="submit" class="btn btn-primary" id="btn_basic" style="width:100%;">确定保存</button>
	</form>
</div>

<script type="text/javascript">
	$("#btn_basic").click(function(){
		var user=$("#user").val();
		var age=$("#age").val();
		var addr=$("#address").val();
		if(user==""){
			alert("请填写您的真实姓名");
			$("#user").focus();
			return false;
		}
		else if(age==""){
			alert("请填写您的年龄");
			$("#age").focus();
			return false;
		}
		else if(addr==""){
			alert("请填写您居住地址");
			$("#address").focus();
			return false;
		}
		else{
			alert("保存成功");
		}
	});
</script> 
</body>
</html>
