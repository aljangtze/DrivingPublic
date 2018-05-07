<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>用户登录-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/supersized.3.2.7.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.validate.min.js') }}"></script>
<script>

$(function(){
	var gg = "{{ session("arry")["errors"] }}";
	if(gg == "") {
		gg == "";
	} else {
		alert(gg);
	}
});

</script>
<script>
jQuery(function($){

    $.supersized({

        // 功能
        slide_interval     : 4000,    // 转换之间的长度
        transition         : 1,    // 0 - 无，1 - 淡入淡出，2 - 滑动顶，3 - 滑动向右，4 - 滑底，5 - 滑块向左，6 - 旋转木马右键，7 - 左旋转木马
        transition_speed   : 1000,    // 转型速度
        performance        : 1,    // 0 - 正常，1 - 混合速度/质量，2 - 更优的图像质量，三优的转换速度//（仅适用于火狐/ IE浏览器，而不是Webkit的）

        // 大小和位置
        min_width          : 0,    // 最小允许宽度（以像素为单位）
        min_height         : 0,    // 最小允许高度（以像素为单位）
        vertical_center    : 1,    // 垂直居中背景
        horizontal_center  : 1,    // 水平中心的背景
        fit_always         : 0,    // 图像绝不会超过浏览器的宽度或高度（忽略分钟。尺寸）
        fit_portrait       : 1,    // 纵向图像将不超过浏览器高度
        fit_landscape      : 0,    // 景观的图像将不超过宽度的浏览器

        // 组件
        slide_links        : 'blank',    // 个别环节为每张幻灯片（选项：假的，'民'，'名'，'空'）
        slides             : [    // 幻灯片影像
                                 {image : '../../phone/images/1.jpg'},
								 //{image : './img/3.jpg'}
                       ]

    });

});
</script>
</head>

<body>
<div class="login-container">
	<div class="logos">
		<img src="{{ asset('phone/images/logo.png') }}">
	</div>
	<h3>新司机服务平台</h3>
        <center><font color="red">{{ session("errors") }}</font></center>
	<form action="{{ url('tel/dologin') }}" method="post" id="loginForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="xnickname" value="{{ $nickname }}">
		<div>
			<input type="text" maxlength="11" name="nickname" class="phone_number" placeholder="请输入手机号码" autocomplete="off" value="{{ session("arry")["title"] }}" />
		</div>
		<div>
			<input type="password" name="pass" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" value="{{ session("arry")["pass"] }}" />
		</div>
		<div class="sfxz">
			<label>
			<input type="radio" id="xy" name="type" checked="checked" value="2" />个人登录
			</label>
			<label style="width:130px;">
			<input type="radio" id="jl" name="type" value="1"/>企业商户登录
			</label>
		</div>
		<div class="forget">
			<p><a href="{{ url('forgetpass') }}">忘记密码？</a></p>
		</div>
		<button id="submit" type="submit">登 录</button>
	</form>
        
        @if($nickname !== null)
	<a href="{{ url('tel/reg')."/".$nickname }}">
		<button type="button" class="register-tis">注册</button>
	</a>
        @endif
        @if($nickname == null)
	<a href="{{ url('tel/reg') }}">
		<button type="button" class="register-tis">注册</button>
	</a>
        @endif

</div>
</body>
</html>
