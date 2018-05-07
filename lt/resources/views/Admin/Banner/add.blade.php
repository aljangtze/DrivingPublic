<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>上传图片-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/dist/css/dropify.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script src="{{ asset('pj/dist/js/dropify.js') }}"></script>
</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">上传图片</li>
		</ol>
	</div>
	<!--上传-->
        <form action="{{ url('admin/banner') }}" method="post" class="form-inline" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modify_tx">
                        <div class="image_up">
                                <label for="input-file-now">头像上传</label>
                    <input type="file" name="banner" id="jxpxz" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
                        </div>
                </div>
               <dir style=" border:0px solid ;width:500px;margin-left: 400px;">
                <label for="input-file-now">标题：</label>
                <input type="text" name="title" class="form-control" style="width:300px" id="exampleInputName2"  value=""><br />
                <label for="input-file-now">投放位置：</label>
                <label><input type="radio" name="type"  value="1">教练中心</label>
                <label><input type="radio" name="type"  value="2">学员中心</label><br />
                <label for="input-file-now">投放位置：</label>
                <label><input type="radio" name="qufen"  value="1">会员中心</label>
                <label><input type="radio" name="qufen"  value="2">教学</label>
                <label><input type="radio" name="qufen"  value="3">圈子</label>
                <label><input type="radio" name="qufen"  value="4">领证</label>
                <label><input type="radio" name="qufen"  value="5">学车</label><br />
                <label for="input-file-now">投放端口：</label>
                <label><input type="radio" name="dk"  value="1">PC端</label>
                <label><input type="radio" name="dk"  value="2">mb手机端</label>
                </div>
                                <button type="submit" class="btn btn-info">确定上传</button>
	   </form>
	<!--信息补充-->
<!--	<div class="img_ul" style="width:100%">
		<p>图片库</p>
		<ul>
			<li>
				<img src="{{ asset('pj/images/2.jpg') }}">
                                <span>标题:hello&nbsp;&nbsp;投放位置:会员中心/圈子</span>
                                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                                <input type="checkbox" name="subcheck" style="float: right" value="" />
			</li>
			<li>
				<img src="{{ asset('pj/images/2.jpg') }}">
                                <span>标题:hello&nbsp;&nbsp;投放位置:会员中心/圈子</span>
                                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                                <input type="checkbox" name="subcheck" style="float: right" value="" />
			</li>
			<li>
				<img src="{{ asset('pj/images/2.jpg') }}">
                                <span>标题:hello&nbsp;&nbsp;投放位置:会员中心/圈子</span>
                                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                                <input type="checkbox" name="subcheck" style="float: right" value="" />
			</li>
			<li>
				<img src="{{ asset('pj/images/2.jpg') }}">
                                <span>标题:hello&nbsp;&nbsp;投放位置:会员中心/圈子</span>
                                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                                <input type="checkbox" name="subcheck" style="float: right" value="" />
			</li>
			<li>
				<img src="{{ asset('pj/images/2.jpg') }}">
                                <span>标题:hello&nbsp;&nbsp;投放位置:会员中心/圈子</span>
                                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                                <input type="checkbox" name="subcheck" style="float: right" value="" />
			</li>
			<li>
				<img src="{{ asset('pj/images/2.jpg') }}">
                                <span>标题:hello&nbsp;&nbsp;投放位置:会员中心/圈子</span>
                                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                                <input type="checkbox" name="subcheck" style="float: right" value="" />
			</li>
		</ul>
	</div>-->
</div>

<script>
$(document).ready(function(){
	// Basic
	$('.dropify').dropify();
	// Translated
	$('.dropify-fr').dropify({
		messages: {
			default: 'Glissez-déposez un fichier ici ou cliquez',
			replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
			remove:  'Supprimer',
			error:   'Désolé, le fichier trop volumineux'
		}
	});
	// Used events
	var drEvent = $('#input-file-events').dropify();
	drEvent.on('dropify.beforeClear', function(event, element){
		return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
	});
	drEvent.on('dropify.afterClear', function(event, element){
		alert('File deleted');
	});
	drEvent.on('dropify.errors', function(event, element){
		console.log('Has Errors');
	});
	var drDestroy = $('#input-file-to-destroy').dropify();
	drDestroy = drDestroy.data('dropify')
	$('#toggleDropify').on('click', function(e){
		e.preventDefault();
		if (drDestroy.isDropified()) {
			drDestroy.destroy();
		} else {
			drDestroy.init();
		}
	});
});
</script>
</body>
</html>
