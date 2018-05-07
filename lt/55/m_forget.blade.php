<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>忘记密码-云南伦途科技</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="js/supersized-init.js"></script>
</head>

<body style="background:#fff;">


 <div class="login-container fgt_1">
 	<h3>重置密码</h3>
	<form action="" method="post" id="forgotForm">
		<div>
			<input type="text" name="phone_number" class="phone_number" maxlength="11" placeholder="输入绑定的手机号码" autocomplete="off" id="number"/>
		</div>
		<div style="clear:both;width:305px;">
			<span class="msgs" id="yzm">获取短信验证码</span><input type="text" id="yzm" name="yzm" style="width:160px;" oncontextmenu="return false" placeholder="输入6位有效数字" maxlength="6"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="btn_xyb" type="submit" style="background:#1583E0;color:#fff;">确定重置</button>
	</form>
 </div>
 
 
<script type="text/javascript">
$(function(){
	$("#yzm").click(function(){
		var u_number=$("#number").val();
		var sjyz=/^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/; 
		if(u_number=="" || !sjyz.test(u_number)){
			alert("手机格式不正确");
			$("#number").focus();
		}
		else{
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
			});
		}
	});
});

</script>

</body>
</html>
