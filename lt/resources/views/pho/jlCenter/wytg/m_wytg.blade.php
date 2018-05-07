
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>我要投稿-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/public.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('phone/dist/css/dropify.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('phone/dist/js/dropify.js') }}"></script>
<script src="{{ asset('phone/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('phone/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('phone/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('phone/js/mobiscroll.js') }}" type="text/javascript"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">我要投稿</p>
</header>
<!--投稿标题-->
<div class="contribute">
    <form action="{{ url('jtel/postwyts')."/".session()->get("jTeluser") }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
    		<label>标题</label>
    		<input type="text" name="title" class="form-control" placeholder="输入标题名称" id="title">
 		</div>
		<div class="form-group">
    		<label>内容</label>
    		<textarea class="form-control" rows="6" name="content" placeholder="填写内容" id="content"></textarea>
 		</div>
		<!--上传附件-->
		<div class="form-group">
			<label>上传附件</label>
            <input id="file-1" type="file" name="pic" class="file" data-overwrite-initial="false" data-min-file-count="1" multiple>
        </div>
		<button type="submit" class="btn btn-primary" style="margin-bottom:30px;" id="btn_tj">提交文稿</button>
	</form>
</div>
<script>
$("#btn_tj").click(function(){
	var title=$("#title").val();
	var content=$("#content").val();
	if(title==""){
		alert("请填写标题");
		$("#title").focus();
		return false;
	}
	else if(content==""){
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
        maxFilesNum: 5,
		showPreview : false,
		msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
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

