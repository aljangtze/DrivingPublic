<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>忘记密码-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('phone/js/jquery.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('phone/js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/supersized.3.2.7.min.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('phone/js/supe rsized-init.js') }}"></script>-->
<script type="text/javascript" src="{{ asset('phone/js/yzm.js') }}"></script>
</head>
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
                                 {image : './phone/images/1.jpg'},
								 //{image : './img/3.jpg'}
                       ]

    });

});

</script>
<body style="background:#fff;">


 <div class="login-container fgt_1">
 	<h3>重置密码</h3>
	<form action="{{ url('resetpass') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<input type="text" name="nickname" class="phone_number" maxlength="11" placeholder="输入绑定的手机号码" autocomplete="off" id="phone_number"/>
		</div>
		<div style="clear:both;width:305px;">
                    <span class="msgs" id="yzm" onclick="doyzm('{{ url("yzm") }}')">获取短信验证码</span><input type="text" id="yzm" name="yzm" style="width:160px;" oncontextmenu="return false" placeholder="输入6位有效数字" maxlength="6"/>
		</div>
		<div>
			<input type="password" name="pass" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="btn_xyb" type="submit" style="background:#1583E0;color:#fff;">确定重置</button>
	</form>
 </div>
 <a href="{{ url('tel/login') }}">
		<button type="button" class="register-tis">返回登录</button>
	</a>
 
<script type="text/javascript">
$(function  () {
	//获取短信验证码
	var validCode=true;
	$(".msgs").click (function  () {
		var time=99;
		var code=$(this);
		if (validCode) {
			validCode=false;
			code.addClass("msgs1");
		var t=setInterval(function  () {
			time--;
			code.html(time+"秒");
			if (time==0) {
				clearInterval(t);
			code.html("重新获取");
				validCode=true;
			code.removeClass("msgs1");

			}
		},1000)
		}
	})
})

</script>

</body>
</html>
