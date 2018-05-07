@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>投诉举报-新司机网</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/bootstrap-fileinput-master/css/fileinput.css') }}">
<script type="text/javascript" src="{{ asset('phone/bootstrap-fileinput-master/js/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/bootstrap-fileinput-master/js/locales/zh.js') }}"></script>
<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">投诉举报</p>
</header>
<!--投稿标题-->
<div class="contribute">
	<form action="{{ url('tel/xytsjbsave')."/".session()->get("Teluser") }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
    		<label class="sr-only">内容</label>
    		<textarea class="form-control" rows="6" placeholder="填写投诉内容" id="content" name="content"></textarea>
 		</div>
		<!--上传附件-->
		<div class="form-group">
			<label>上传附件</label>
            <input id="file-1" type="file" class="file" name="fj" data-overwrite-initial="false" data-min-file-count="1" multiple>
        </div>
		<button type="submit" class="btn btn-primary" style="margin-bottom:30px;" id="btn_tj">提交投诉</button>
	</form>
</div>
<script>
$("#btn_tj").click(function(){
	var content=$("#content").val();
	if(content==""){
		alert("请填写内容");
		$("#content").focus();
		return false;
	}
	else{
		alert("提交成功，等待后台审核");
		location.href="m_wzzs.html";
	}
});
    $('#file-1').fileinput({
        language: 'zh',
        uploadUrl: '#',
		maxFileSize: 1000,
        maxFilesNum: 2,
		showPreview : false,
		msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
		allowedFileExtensions : ['jpg', 'png','gif'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
		//下面几个就是初始化预览图片的配置      
        //    initialPreviewAsData: true,  
        //    initialPreviewFileType: 'image',  
        //    initialPreview:path , //要显示的图片的路径  
        //    initialPreviewConfig:con 
		//allowedFileTypes: ['image', 'video', 'flash'],//限制文件上传类型
        //allowedFileExtensions : ['jpg', 'png','gif'],//限制图片上传类型
    });
</script>
</body>
</html>
@endsection
