<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{ asset('at/css/style.css') }}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/yz.js') }}"></script>
<!-- 加载编辑器的容器 -->
        
        <!-- 配置文件 -->
        <script type="text/javascript" src="{{ asset('editor/ueditor.config.js') }}"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="{{ asset('editor/ueditor.all.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('editor/lang/zh-cn/zh-cn.js') }}"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            // var ue = UE.getEditor('container');
            var editor = UE.getEditor('xlcd',{  
                			//focus时自动清空初始化时的内容  
               				 autoClearinitialContent:true,   
               				//关闭elementPath,左下方元素路径  
                			elementPathEnabled:false,  
                			//默认的编辑区域高度  
               				 initialFrameHeight:200,
					autoHeightEnabled:false,
                                        toolbars:'insertvideo',
                                        toolbars:[['insertimage','bold','italic','forecolor','backcolor','fontsize','fontfamily','indent','insertorderedlist','insertunorderedlist']],
                                        elementPathEnabled:false,
            				});  
            var editor = UE.getEditor('bghj',{  
                			//focus时自动清空初始化时的内容  
               				 autoClearinitialContent:true,   
               				//关闭elementPath,左下方元素路径  
                			elementPathEnabled:false,  
                			//默认的编辑区域高度  
               				 initialFrameHeight:200,
					autoHeightEnabled:false,
                                        toolbars:'insertvideo',
                                        toolbars:[['insertimage','bold','italic','forecolor','backcolor','fontsize','fontfamily','indent','insertorderedlist','insertunorderedlist']],
                                        elementPathEnabled:false,
            				});  
                                        
                                        
        </script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <ul class="forminfo">
        <form action="{{ url('admin/jpformsave')."/".$str->id }}" name="myform" method="post" id="myform" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type='hidden' name='mypic' value='{{ $str->jlcpic }}'>
        <li><label>驾校名称</label><input name="jxname" value="{{ $str->jxname }}" type="text" id="jxname" onblur="dosel('jxname','jxnamea','驾校名称','{{ url('pj/images/right.gif') }}')" class="dfinput" /><i id="jxnamea">*必填</i></li>
        <li><label>驾校门头照</label><input type="file" name="jlcpic" class="dfinput"><i>*必选</i></li>
        <li><label>价格</label><input type="text" name="price" class="dfinput" value="{{ $str->price }}"><i>*选填</i></li>
        <li><label>负责人</label><input name="name" value="{{ $str->name }}" type="text" id="name" onblur="dosel('name','namea','负责人','{{ url('pj/images/right.gif') }}')" class="dfinput" /><i id="namea">*必填</i></li>
        <li><label>联系电话</label><input name="tel" value="{{ $str->tel }}" type="text" id="tel" onblur="dosel('tel','tela','联系电话','{{ url('pj/images/right.gif') }}')" class="dfinput" /><i id="tela">*必填</i></li>
        <li><label>驾校位置</label><input name="jxaddress" value="{{ $str->jxaddress }}" type="text" id="address" onblur="dosel('address','addressa','驾校位置','{{ url('pj/images/right.gif') }}')" class="dfinput" /><i id="addressa">*必填</i></li>
        <li><label>驾校简介</label><textarea name="brief" value="{{ $str->brief }}" cols="" id="content" onblur="dosel('content','contenta','驾校简介','{{ url('pj/images/right.gif') }}')" rows="" class="textinput"></textarea><i id="contenta">*必填</i></li>
        <li><label>训练场地</label><textarea id="xlcd" style="width:520px;height:500px;border:none;margin-left: 90px"   name="xlcdpic11" ></textarea>{!!$str->xlcdpic11!!}</li>
        <li><label>办公环境</label><textarea id="bghj" style="width:520px;height:500px;border:none;margin-left: 90px"   name="bghj" >{!!$str->bghj!!}</textarea></li>
        <li style="width:100%"><label>&nbsp;</label><input type="submit" class="btn" id="submit" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>


</body>

</html>
