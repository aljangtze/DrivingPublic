<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{ asset('at/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">论坛基本信息设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <ul class="forminfo">
        <form action="{{ url('admin/forumsaveset')."/".$str->id }}" post="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="myforumset_pic" value="{{ $str->forumset_pic }}">
        <li><label>论坛图标</label><input name="forumset_pic" type="file" class="dfinput" value="" /></li>
        <li><label>论坛简述</label><textarea name="info" cols="" rows="" class="textinput">{{ $str->info }}</textarea></li>
        <li><label>&nbsp;</label><input type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>


</body>

</html>
