<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>用户注册-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/supersized.3.2.7.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('phone/js/supersized-init.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('phone/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/yzm.js') }}"></script>
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

    $(function() {
        jQuery.validator.addMethod("phone_number", function(value, element) {  
    var length = value.length;  
    var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;  
    return this.optional(element) || (length == 11 && mobile.test(value));  
}, "请正确填写您的手机号码"); 
	//注册表单验证
	$("#registerForm").validate({
		rules:{
			tel:{
				required:true,
				phone_number:true,//自定义的规则
				digits:true,//整数
			},
			pass:{
				required:true,
				minlength:6, 
				maxlength:32,
			},
		
			password:{
				required:true,
				minlength:6,
				equalTo:'.password',
			},
			
			code:{
				required:true,
				minlength:6, 
				digits:true,
				},
		},
		//错误信息提示
		messages:{
			tel:{
				required:"请输入手机号码",
				digits:"请输入正确的手机号码"
			},
			pass:{
				required:"必须填写密码",
				minlength:"密码至少为6个字符",
				maxlength:"密码至多为32个字符"
			},
			
			password:{
				required: "请再次输入密码",
				minlength: "确认密码不能少于3个字符",
				equalTo: "两次输入密码不一致"//与另一个元素相同
			},
			
			code:{
				required: "请输入验证码",
				minlength: "验证码为6个数字",
				digits:"请输入整数"
				},
		},

	});
    })
</script>
</head>

<body>
<div class="register-container">
	<h3>注册</h3>

	<form action="{{ url('tel/doreg').'/'.'15911704571' }}" method="post" id="registerForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<input type="text" name="tel"  maxlength="11"class="phone_number" placeholder="输入手机号码" autocomplete="off" id="phone_number"/>
		</div>
            
		<div>
			<input type="password" name="pass"  class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		
		<div>
			<input type="password" name="password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div style="clear:both;width:305px;">
			<span class="msgs" onclick="doyzm('{{ url("yzm") }}')">获取短信验证码</span><input type="text" id="yzm" name="code" style="width:160px;" oncontextmenu="return false" placeholder="输入6位有效数字" maxlength="6"/>
		</div>
		<div class="way">
			<label class="radio-inline">
  				<input type="radio" name="type" id="inlineRadio1" value="2" checked="checked"> 个人
			</label>
			<label class="radio-inline">
				 <input type="radio" name="type" id="inlineRadio2" value="1"> 企业商户
			</label>
		</div>
		
		<button id="submit" type="submit">注 册</button>
	</form>
	<a href="{{ url('tel/login') }}">
		<button type="button" class="register-tis">登录</button>
	</a>

</div>

<script>
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
