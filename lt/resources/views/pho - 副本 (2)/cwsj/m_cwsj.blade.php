<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>身份认证-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
</head>

<body style="width:100%;height:100%;background-color:#F5F5F5;">
<!--头部-->
<header class="header">	
	<!--<a href="javascript:history.go(-1)" class="logo column"><img src="images/fhjt.png" alt="返回" /></a>-->
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">身份认证</p>
</header>
<!--选择认证-->
<div class="xzrz">
	<p class="xz">以哪种方式进行认证？</p>
        <form action="{{ url('tel/nextcwsj')."/".$nickname }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<ul class="xzrz_fs">
            <li style="margin-left:8%"> <input type="radio" class="right t_size" name="type" id="gr" checked style="border:none;" value="2"/><span>个人</span></li>
            <li style="margin-left:8%"> <input type="radio" class="right t_size" name="type" id="qy" style="border:none;" value="1"/><span>企业</span></li>
		<!--<li> <div class="right t_size" id="js"></div><span>计时</span></li>-->
	</ul>
	<p class="tj">有营业执照的话，推荐以企业身份入驻</p>
	<p class="fwxy">
	   <label class="column">
			<input type="checkbox" checked="checked" value="1" id="ckx" >
	   </label>
	   <span class="column">
	   		同意和接受<a data-toggle="modal" data-target="#myModal">《新司机服务收费规则》</a>
	   </span>
	</p>
	<div class="btn_zc"><button type="submit" class="btn btn-primary" id="btn_register">下一步</button></div>
        </form>
</div>
<!--收费规则-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">新司机服务收费规则</h4>
      </div>
      <div class="modal-body">
        <p>新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则新司机服务收费规则</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--底部弹窗-->
<div id="cover-bg"></div>
<div class="alert_windows">
	<!-- <span>X</span> -->
	<!-- <p class="gg_title">弹窗广告</p> -->
	<div class="cwsj_content">
            @if($dcount !== 0)
            @foreach($items as $tmp)
            <p>您已经认证过企业@if($tmp->type == 1) <font color="#29a7e2">驾培服务</font> @endif  @if($tmp->type == 2) <font color="#29a7e2">汽车服务</font> @endif  @if($tmp->type == 3) <font color="#29a7e2">驾驶证服务</font> @endif，确定还要认证吗？</p>
            @endforeach
            @else
            <p><font color="red">您还没有认证过企业信息</font></p>
            @endif
            <p height="10px"></p>
            @if($acount !== 0)
            @foreach($arr as $tmpa)
            <p>您已经认证过个人@if($tmpa->qf == 1) <font color="#29a7e2">专项教练</font>@endif @if($tmpa->type == 1) <font color="#29a7e2">驾培服务</font> @endif  @if($tmpa->type == 2) <font color="#29a7e2">汽车服务</font> @endif  @if($tmpa->type == 3) <font color="#29a7e2">驾驶证服务</font> @endif，确定还要认证吗？</p>
            @endforeach
            @else
            <p><font color="red">您还没有认证过个人信息</font></p>
            @endif
	</div>
	<button type="button" id="btn_close">关闭</button>
</div>
<script>
$(function(){
	if($.cookie("jlClose") != 'yes'){
		var winWid = $(window).width()/2 - $('.alert_windows').width()/2;
		var winHig = $(window).height()/4 - $('.alert_windows').height()/4;
		$(".alert_windows").css({"left":winWid,"top":-winHig*2});	//自上而下
		$(".alert_windows").show();
		/*遮罩层*/
		$("#cover-bg").css("height",$(document).height());   
        $("#cover-bg").css("width",$(document).width());   
        $("#cover-bg").show();   
		
		$(".alert_windows").animate({"left":winWid,"top":winHig},600);
		$("#btn_close").click(function(){
			$(this).parent().fadeOut(300);
			$("#cover-bg").hide();
			$.cookie("isClose",'yes',{ expires:1/86400});	//测试一秒	
		});
	}
});
</script>
<script>
<!--check触发事件，选中移除按钮禁用状态-->
$(function(){
	$('input').on('change', function(){
		if($('input:checkbox:checked').val()) {
			$("#btn_register").removeAttr("disabled");
		}
		else{
			$("#btn_register").attr("disabled",true);
			}
	});
	$("#btn_register").click(function(){
		if($("#gr").attr("class").indexOf("right-h")>0){
			location.href="m_jlWyrz.html";
		}
		else if($("#qy").attr("class").indexOf("right-h")>0){
			location.href="m_jljxrz.html";
		}
		else if($("#js").attr("class").indexOf("right-h")>0){
			location.href="m_jssf.html";
		}
		else{
			alert("请选择一种方式进行认证");
		}
	});
});
$(function(){
	$("#gr").click(function(){
		$("#gr").addClass("right-h");
		$("#qy").removeClass("right-h");
		$("#js").removeClass("right-h");
	});
	$("#qy").click(function(){
		$("#gr").removeClass("right-h");
		$("#qy").addClass("right-h");
		$("#js").removeClass("right-h");
	});
	$("#js").click(function(){
		$("#gr").removeClass("right-h");
		$("#qy").removeClass("right-h");
		$("#js").addClass("right-h");
	});
});
</script>
</body>
</html>
