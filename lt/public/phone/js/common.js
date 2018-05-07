//打开字滑入效果
window.onload = function(){
	$(".connect p").eq(0).animate({"left":"0%"}, 600);
	$(".connect p").eq(1).animate({"left":"0%"}, 400);
};
//jquery.validate表单验证
$(document).ready(function(){
	//添加自定义验证规则
	jQuery.validator.addMethod("phone_number", function(value, element) {  
    var length = value.length;  
    var mobile = /^1[34578]\d{9}$/;  
    return this.optional(element) || (length == 11 && mobile.test(value));  
}, "请正确填写您的手机号码"); 
	//登陆表单验证
	$("#loginForm").validate({
		rules:{
			phone_number:{
				required:true,
				phone_number:true,//自定义的规则
				digits:true,//整数
			},
			password:{
				required:true,
				minlength:6, 
				maxlength:32,
			},
		},
		//错误信息提示
		messages:{
			phone_number:{
				required:"必须填写手机账号",
				digits:"请输入正确的手机号码",
				remote: "用户名已存在",
			},
			password:{
				required:"必须填写密码",
				minlength:"密码至少为6个字符",
				maxlength:"密码至多为32个字符",
			},
		},
	});
	
});

$(document).ready(function(){
	//添加自定义验证规则
	
	
	//忘记密码
	$("#forgotForm").validate({
		rules:{
			phone_number:{
				required:true,
				phone_number:true,//自定义的规则
				digits:true,//整数
			},
			yzm:{
				required:true,
				minlength:6, 
				digits:true,
				},
			password:{
				required:true,
				minlength:6, 
				maxlength:32,
			},
		},
		//错误信息提示
		messages:{
			phone_number:{
				required:"请输入手机号码",
				digits:"请输入正确的手机号码",
			},
			yzm:{
				required: "请输入验证码",
				minlength: "验证码为6个数字",
				digits:"请输入整数",
				},
			password:{
				required:"必须填写密码",
				minlength:"密码至少为6个字符",
				maxlength:"密码至多为32个字符",
			},
		},
		submitHandler: function(form){ 
					alert("重置成功");
                  	location.href="m_login.html";
            } 
	});
});
