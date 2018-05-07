<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>用户登录-云南伦途科技</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="js/supersized-init.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>

<body>
<div class="login-container">
	<h3>伦图驾校</h3>
	<form action="m_index.html" method="post" id="loginForm">
		<div>
			<input type="text" maxlength="11" name="phone_number" class="phone_number" placeholder="请输入手机号码" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div class="sfxz">
			<label>
			<input type="radio" id="xy" name="sfxz_name" checked="checked" />学员入口
			</label>
			<label>
			<input type="radio" id="jl" name="sfxz_name" />教练入口
			</label>
		</div>
		<div class="forget">
			<p><a href="m_forget.html">忘记密码？</a></p>
		</div>
		<button id="submit" type="submit">登 录</button>
	</form>

	<a href="m_register.html">
		<button type="button" class="register-tis">还有没有账号？</button>
	</a>

</div>
</body>
</html>
