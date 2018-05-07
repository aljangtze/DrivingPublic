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
        <form action="{{ url('jtel/nextcwsj')."/".$nickname }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<ul class="xzrz_fs">
            <li style="padding-left:8%"> <input type="radio" class="right t_size" name="type" id="gr" checked style="border:none;" value="2"/><span>个人</span></li>
            <li style="padding-left:8%"> <input type="radio" class="right t_size" name="type" id="qy" style="border:none;" value="1"/><span>企业</span></li>
		<!--<li> <div class="right t_size" id="js"></div><span>计时</span></li>-->
	</ul>
	<p class="tj">有营业执照的话，推荐以企业身份入驻</p>
	<p class="fwxy">
	   <label class="column">
			<input type="checkbox" checked="checked" value="1" id="ckx" >
	   </label>
	   <span class="column">
	   		同意和接受<a data-toggle="modal" data-target="#myModals">《新司机网身份认证规则及协议》</a>
	   </span>
	</p>
	<div class="btn_zc"><button type="submit" class="btn btn-primary" id="btn_register">下一步</button></div>
        </form>
</div>
<!--收费规则-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="myModals">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">新司机网身份认证规则及协议</h4>
      </div>
      <div class="modal-body">
        <p class="tip1">为了保障您的权益，请您在申请成为新司机服务平台（网址：www.xsjwang.com及“新司机”的微信公众号，以下简称“平台”）的服务商户之前，详细阅读以下各项说明及条款，您点击“提交申请”即表示您已阅读、理解并完全接受本协议述及的所有条款。</p>
        <p class="tip2"><b>一、所需材料及细则</b></p>
        <p class="tip1"><b>个人</b>（指教练员、驾驶证和车辆代办业务的个体）须填写个人相关信息和提供行业相关资质图片。</p>
        <p class="tip1">1、教练员须提供教练证或工作证、有效身份证正反面、教练车行驶证、 个人和教练车的图片。</p>
        <p class="tip1"><b>注：提交资料前可勾选，“成为即时教练”内的相关内容，成为新型的网络平台教练员，可享受实时对话学员的新型教学体验。</b></p>
        <p class="tip1">2、驾驶证、车辆代办业务的个体须提供门店图片、有效身份证正反面。</p>
        <p class="tip1"><b>企业</b>（指驾校、驾驶证和车辆代办业务的公司）须填写企业（公司）相关信息和提供行业相关资质图片。</p>
        <p class="tip1">1、驾校须提供营业执照、负责人有效身份证、驾校招牌图片、场地的招牌图片。</p>
        <p class="tip1">2、驾驶证和车辆代办业务的公司须提供营业执照、负责人有效身份证正反面。</p>
        <p class="tip2"><b>二、权益和责任</b></p>
        <p class="tip1">1、为保障您和其他用户的利益、权益，“平台”将对驾校、教练、商户、平台内所有的个人或企业商户进行资质认证，“个人”或“企业商户”提交的信息只作为平台认证之用，我们将竭力保障“个人”或“企业商户”的隐私（包括：姓名、手机号码、登录密码、身份证号码、身份证或其他身份证明、车辆信息、驾驶证、行驶证、常用地址、位置信息、订单信息、交易及支付信息、银行卡号）。</p>
        <p class="tip1">2、为了保障您在“平台”的信誉，方便学员能及时准确的找到您，请认证的商户提交自己真实准确的信息，若存在信息不清晰，不真实等情况，云南伦途科技有限公司将有权拒绝申请人的认证申请。</p>
        <p class="tip1">3、资质认证以图文的方式提交“平台”的后台，认证信息提交以后请耐心等待，我们工作人员将在1至3个工作日内处理完毕，您的审核结果我们会发送至您在平台内的站内信中。在图片拍摄方面请尽量清晰，因为这可能会影响到您的审核结果。</p>
        <p class="tip1">4、“平台”是驾校和学员，教练和学员的媒介，只负责宣传招生报名，不参与驾校的教学，关于教学的一切事宜皆由驾校或教练员自行负责。</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--底部弹窗-->
<div id="cover-bg"></div>
<div class="alert_windows" style="height:120px;">
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
