<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{ asset('at/css/style.css') }}" rel="stylesheet" type="text/css" />
<!-- 加载编辑器的容器 -->
        
        <!-- 配置文件 -->
        <script type="text/javascript" src="{{ asset('at/editor/ueditor.config.js') }}"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="{{ asset('at/editor/ueditor.all.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('at/editor/lang/zh-cn/zh-cn.js') }}"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            // var ue = UE.getEditor('container');
            var editor = UE.getEditor('content',{  
                			//focus时自动清空初始化时的内容  
               				 autoClearinitialContent:false,   
               				//关闭elementPath,左下方元素路径  
                			elementPathEnabled:false,  
                			//默认的编辑区域高度  
               				 initialFrameHeight:800,
					autoHeightEnabled:false  
            				});  
        </script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">使用说明设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>平台使用说明设置</span></div>
    
    <ul class="forminfo">
        <form action="{{ url('admin/setinfo')."/".$str->id }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
<!--        <li><label>文章标题</label><input name="title" type="text" class="dfinput" /><i></i></li>
        <li><label>图片</label><input name="pic" type="file" class="dfinput" /><i>*必选</i></li>
        <li><label>投放位置</label><cite><input name="type" type="radio" value="1"/>关于我们</li>-->
        <li><label>文章内容</label><textarea id="content" style="width:90%;height:800px" name="ptsysm" style="margin-left:85px;">{!!$str->ptsysm!!}</textarea></li>
        <li><label>&nbsp;</label><input type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>


</body>

</html>
