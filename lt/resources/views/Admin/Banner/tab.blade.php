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
<script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>
</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">幻灯片列表</li>
		</ol>
	</div>
	<!--上传-->
<!--	<div class="modify_tx">
	   <form>
		<div class="image_up">
			<label for="input-file-now">头像上传</label>
            <input type="file" name="jl-dpzp" id="jxpxz" class="dropify"  data-max-file-size="5M" data-allowed-file-extensions="jpg png gif jpeg"/>
			<button type="submit" class="btn btn-info">确定上传</button>
		</div>
	   </form>
	</div>-->
	<!--信息补充-->
	<div class="img_ul" style="width:100%">
            <p>BANNER库&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="SelectAll"  />全选
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="check" class="btn btn-danger" id="sqdel">删除</button>
                <input type="hidden" id="url" value="{{ url('admin/bannersqdel') }}">
            </p>
		<ul>
                    @foreach($items as $tmp)
			<li class="bg-danger">
                            <img width="106px" height="150px" src="{{ asset('banner')."/".$tmp->banner }}">
                            <span  style="display: block;width: 100%;height: 42px"><font color="000">标题:{{ $tmp->title }}&nbsp;&nbsp;投放位置:
                                @if($tmp->dk == 1)
                                        PC端/@if($tmp->type == 1) 教练中心 @endif @if($tmp->type == 2) 学员中心 @endif / 
                                        @if($tmp->qufen == 1) 会员中心 @endif  @if($tmp->qufen == 2) 教学 @endif  @if($tmp->qufen == 3) 圈子 @endif 
                                        @if($tmp->qufen == 4) 领证 @endif
                                        @if($tmp->qufen == 5) 学车 @endif
                                    @endif
                                    @if($tmp->dk == 2)
                                        手机端/@if($tmp->type == 1) 教练中心 @endif @if($tmp->type == 2) 学员中心 @endif / 
                                        @if($tmp->qufen == 1) 会员中心 @endif  @if($tmp->qufen == 2) 教学 @endif  @if($tmp->qufen == 3) 圈子 @endif 
                                       @if($tmp->qufen == 5) 学车 @endif
                                       @if($tmp->qufen == 4) 领证 @endif
                                    @endif
                                    </font>
                                </span>
                            <button type="button" class="btn btn-danger" onclick="dodel({{ $tmp->id }})">删除</button>
                                <a href='{{ url("admin/banner/$tmp->id/edit") }}'><button type="button" class="btn btn-primary" id="sqdel">修改</button></a>
                                <input type="checkbox" name="subcheck" style="float: right" value="{{ $tmp->id }}" />
			</li>
                    @endforeach
		</ul>
	</div>
                    <center><div>{!! $items->render() !!}</div></center>
</div>
    <form action="{{ url('admin/banner') }}" name="myform" method="post" style="display: none">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="delete">
    </form>
    <script>
        function dodel(id) {
            var form = document.myform;
            if(confirm("是否确定删除~删除后便无法修复")) {
                form.action="{{ url('admin/banner') }}" + "/" +id;
                form.submit();
            }
        }
    </script>
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
