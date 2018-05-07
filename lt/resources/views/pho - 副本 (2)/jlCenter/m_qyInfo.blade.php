@extends("pho.bases.comm.comm")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>完善信息-新司机网</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:86%;text-align:center;color:#fff;height:40px; line-height:40px;">完善信息</p>
</header>
<!--基本信息内容-->
<div class="m_basic_box">
	<form action="{{ url('tel/tjinfo')."/".session()->get("Teluser") }}" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="mypic" value="{{ $str->pic }}">
            <input type="hidden" name="type" value="{{ $type }}">
		<div class="form-group">
    		<label>姓名</label>
                <input type="text" name="name" class="form-control" id="qymc" value="{{ $str->name }}">
 		</div>
		<div class="form-group clearfix">
   				 <label style="float:left;">性别</label>
  				 <select class="form-control" name="sex">
  					<option @if($str->sex == 1) selected @endif value="1">男</option>
  					<option @if($str->sex == 0) selected @endif value="2">女</option>
				</select>
 		</div>
		<div class="form-group">
    		<label><span>*</span>联系电话</label>
    		<input type="text" class="form-control" name="tel" id="user" value="{{ $str->tel }}">
 		</div>
 		<div class="form-group">
    		<label><span>*</span>开户银行</label>
    		<input type="text" placeholder="绑定开户银行名称" class="form-control" name="khh" id="bank" value="{{ $str->khh }}">
 		</div>
 		<div class="form-group">
    		<label><span>*</span>银行卡号</label>
    		<input type="text" placeholder="绑定开户银行卡号" class="form-control" name="yhkh" id="bank_num" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" value="{{ $str->yhkh }}">
 		</div>
		<div class="form-group">
    		<label><span>*</span>地址</label>
    		<input type="text" class="form-control" id="age" name="address" value="{{ $str->address }}"/>
 		</div>
            <div class="uptx">
                    <div class="image_up">
                                    <label for="input-file-now">上传头像</label>
                        <input type="file" id="sctx" class="dropify" name="pic"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
                    </div>
                    <p>Ps：</p>
                    <p>1、上传图片最大为5M；</p>
                    <p>2、图片支持格式为jpg png gif jpeg</p>
            </div>
		
		<button type="submit" class="btn btn-primary" id="btn_basic" style="width:100%;">确定保存</button>
	</form>
</div>

<p class="m_bsfg" style="height:80px;"></p>
@if($type == '2')
@include("pho.bases.comm.xytf");
@endif
@if($type == '1')
@include("pho.bases.comm.jltf");
@endif
<script src="{{ asset('phone/dist/js/dropify.js') }}"></script>
<script>
$("#uploads").click(function(){
		if($("#sctx").val()==0){
				alert("上传头像不能为空");
				return false;
			}
		else{
				alert("上传成功");
			}
	});
$(document).ready(function(){
	// Basic
	$('.dropify').dropify();
});
</script>
<script type="text/javascript">
	$("#btn_basic").click(function(){
		var user=$("#user").val();
		var age=$("#age").val();
		var addr=$("#address").val();
		var bank=$("#bank").val();
		var bank_num=$("#bank_num").val();
		if(user==""){
			alert("请填写联系电话");
			$("#user").focus();
			return false;
		}
		else if(bank==""){
			alert("请填写开户银行");
			$("#bank").focus();
			return false;
		}
		else if(bank_num==""){
			alert("请填写银行卡号");
			$("#bank_num").focus();
			return false;
		}
		else if(addr==""){
//			alert("请填写您公司地址");
			$("#address").focus();
			return false;
		}
		else{
			alert("保存成功");
		}
	});
</script> 
</body>
</html>
@endsection
