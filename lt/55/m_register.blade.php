<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>用户注册-云南伦途科技</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="js/supersized-init.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>

<body>
<div class="register-container">
	<h3>用户注册</h3>

	<form action="m_login.html" method="post" id="registerForm">
		<div>
			<input type="text" name="phone_number"  maxlength="11"class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		
		<div>
			<input type="password" name="confirm_password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div style="clear:both;width:305px;">
			<span class="msgs">获取短信验证码</span><input type="text" id="yzm" name="yzm" style="width:160px;" oncontextmenu="return false" placeholder="输入6位有效数字" maxlength="6"/>
		</div>
		<div class="way">
			<label class="radio-inline">
  				<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="checked"> 学员
			</label>
			<label class="radio-inline">
				 <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 教练
			</label>
		</div>
		
		<button id="submit" type="submit">注 册</button>
	</form>
	<a href="m_login.html">
		<button type="button" class="register-tis">已经有账号？</button>
	</a>

</div>

<script>
$(function  () {
	//获取短信验证码
	var validCode=true;
	$(".msgs").click (function  () {
		var time=30;
		var code=$(this);
		if (validCode) {
			validCode=false;
			code.addClass("msgs1");
		var t=setInterval(function  () {
			time--;
			code.html(time+"秒后重新获取");
			if (time==0) {
				clearInterval(t);
			code.html("重新获取");
				validCode=true;
			code.removeClass("msgs1");

			}
		},1000)
		}
	})
});
</script>
</body>
</html>
