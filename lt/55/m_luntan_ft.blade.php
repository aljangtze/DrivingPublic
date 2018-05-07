<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>发表新帖-伦途科技</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<link rel="stylesheet" type="text/css" href="bootstrap-fileinput-master/css/fileinput.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap-fileinput-master/js/fileinput.min.js"></script>
<script type="text/javascript" src="bootstrap-fileinput-master/js/locales/zh.js"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="m_luntan.html" style="width:16%;" class="logo column"><img src="images/fhjt.png" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">发表新帖</p>
</header>
<!--发表新帖-->
<div calss="m_xszq">
	<img src="images/ltbg.jpg" alt="论坛背景"  width="100%">
	<div class="lt_title">
		<div class="m_lttx column">
    		<img src="images/lttx.jpg" alt="论坛交流区图片" class="img-thumbnail" />    	</div>
		<div class="column m_lttx_name">
			<p>发表新帖</p>
			<p>论坛简述：适合一些网站新手提问交流的平台，可以让新手迅速的成长起来。</p>
		</div>
	</div>
	<div class="btn_ft">
		<button type="button" class="btn btn-primary"><a href="m_luntan_ft.html"><em class="glyphicon glyphicon-edit"></em>发帖</a></button>
	</div>
</div>
<p class="m_fg"></p>
<div class="container-fluid m_ft_box">
	<form>
  		<div class="form-group">
    		<label for="exampleInputEmail1"><span>*</span>标题内容</label>
    		<input type="text" class="form-control" id="m_bt" placeholder="请填写标题">
  		</div>
  		<div class="form-group">
    		<label for="exampleInputEmail1"><span>*</span>内容简介</label>
    		<textarea type="text" rows="6" class="form-control" id="m_content" placeholder="请填写内容简介"></textarea>
  		</div>
		<!--上传附件-->
		<div class="form-group">
			<label>上传附件</label>
            <input id="file-1" type="file" class="file" data-overwrite-initial="false" data-min-file-count="1" multiple>
        </div>
		<button type="submit" class="btn btn-primary" style="margin-bottom:30px;margin-top:10px;" id="btn_tj">确定发表</button>
	</form>
</div>

<script>
$(function(){
	$("#btn_tj").click(function(){
		var fb=$("#m_bt").val();
		var nr=$("#m_content").val();
		if(fb=="" || nr==""){
			alert("标题或内容不能为空");
			return false;
		}
	});
});
 $('#file-1').fileinput({
        language: 'zh',
        uploadUrl: '#',
		maxFileSize: 1000,
        maxFilesNum: 3,
		allowedFileExtensions : ['jpg', 'png','gif'],//限制图片上传类型
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
