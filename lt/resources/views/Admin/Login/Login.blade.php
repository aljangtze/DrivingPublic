<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/login.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/login.js') }}"></script>
</head>

<body>
<h1>后台管理登录<!--<sup>V2017</sup>--></h1>
<div class="login" style="margin-top:50px;">   
    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
			<!--<a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">快速注册</a>-->
			<div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>    
  <div class="web_qr_login" id="web_qr_login" style="display: block; height: auto;">    
		<!--登录-->
		<div class="web_login" id="web_login">  
		   <div class="login-box">
			<div class="login_form">
			<form action="{{ url('admin/dologin') }}" name="loginform" accept-charset="utf-8" id="login_form" class="loginForm" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
<!--                                <input type="hidden" name="did" value="0"/>
				<input type="hidden" name="to" value="log"/>-->
                               
                                    <div id="userCue" class="cue" style="border:none;color:red">{{ session("errors") }}</div>
                              
				<div class="uinArea" id="uinArea">
				<label class="input-tips" for="u">帐号：</label>
				<div class="inputOuter" id="uArea">
					<input type="text" id="u" name="nickname" class="inputstyle"/>
				</div>
				</div>
				<div class="pwdArea" id="pwdArea">
                                    <label class="input-tips" for="p">密码：</label> 
                                    <div class="inputOuter" id="pArea">  
                                        <input type="password" id="p" name="pass" class="inputstyle"/>
                                    </div>
				</div>
				<div class="pwdArea" id="pwdArea">
                                    <label class="input-tips" for="p">编号：</label> 
                                    <div class="inputOuter" id="pArea">  
                                        <input type="text" id="p" name="bianhao" class="inputstyle"/>
                                    </div>
				</div>
				<div style="padding-left:50px;margin-top:20px;">
					<input type="submit" value="登 录" style="width:150px;" class="button_blue"/>
				</div>
		  </form>
	   </div>
	 </div>   
   </div>
   <!--登录end-->
</div>
  <!--注册-->
   <!-- <div class="qlogin" id="qlogin" style="display: none; ">
    <div class="web_login">
		<form name="form2" id="regUser" accept-charset="utf-8"  action="login.html" method="post">
	        <input type="hidden" name="to" value="reg"/>
		    <input type="hidden" name="did" value="0"/>
        	<ul class="reg_form" id="reg-ul">
        		<div id="userCue" class="cue">快速注册请注意格式</div>
                <li>
                    <label for="user"  class="input-tips2">手机号：</label>
                    <div class="inputOuter2">
                        <input type="text" id="user" name="user" maxlength="11" class="inputstyle2" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" />
                    </div>
                </li>
				<li>
                    <label for="user"  class="input-tips2">验证码：</label>
                    <div class="inputOuter2" style="width:214px;">
                        <input type="text" id="yzm" name="yzm" maxlength="6" class="inputstyle2" style="width:110px;float:left;" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();"/>
						
						<input id="btnSendCode" type="button" value="获取验证码"  />
                    </div>
                </li>
                <li>
                <label for="passwd" class="input-tips2">密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd"  name="passwd" maxlength="16" class="inputstyle2"/>
                    </div>
                </li>
                <li>
                <label for="passwd2" class="input-tips2">确认密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd2" name="" maxlength="16" class="inputstyle2" />
                    </div>
                </li>

                <li>
                    <div class="inputArea">
                        <input type="button" id="reg"  style="margin-top:10px;margin-left:85px;" class="button_blue" value="立即注册"/>
                    </div>
                    
                </li>
				<div class="cl"></div>
            </ul>
		</form>
    </div>
   </div>-->
  <!--注册end-->
</div>
<script>
$("#btnSendCode").click(function(){
							 
		var phone = /^1[34578]\d{9}$/;
		if (!phone.test($('#user').val())) {

			$('#user').focus().css({
				border: "1px solid red",
				boxShadow: "0 0 2px red"
			});
			$('#userCue').html("<font color='red'><b>×手机格式错误</b></font>");
			return false;
		}
		else{
			
			}
			
		});
</script>
</body>
</html>
