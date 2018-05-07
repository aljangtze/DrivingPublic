<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<title>实名认证</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<!--<link href="{{ asset('advers/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" title="" rel="stylesheet" />-->
<link title="" href="{{ asset('advers/css/style.css') }}" rel="stylesheet" type="text/css"  />
<link title="blue" href="{{ asset('advers/css/dermadefault.css') }}" rel="stylesheet" type="text/css"/>
<link title="green" href="{{ asset('advers/css/dermagreen.css') }}" rel="stylesheet" type="text/css" disabled="disabled"/>
<link title="orange" href="{{ asset('advers/css/dermaorange.css') }}" rel="stylesheet" type="text/css" disabled="disabled"/>
<link href="{{ asset('advers/css/templatecss.css') }}" rel="stylesheet" title="" type="text/css" />
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>

<!--<script src="{{ asset('advers/script/jquery-1.11.1.min.js') }}" type="text/javascript"></script>-->
<!--<script src="{{ asset('advers/script/jquery.cookie.js') }}" type="text/javascript"></script>-->
<!--<script src="{{ asset('advers/bootstrap-3.3.5-dist/js/bootstrap.min.js') }}" type="text/javascript"></script>-->
<script type="text/javascript" src="{{ asset('editor/ueditor.config.js') }}"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="{{ asset('editor/ueditor.all.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('editor/lang/zh-cn/zh-cn.js') }}"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            // var ue = UE.getEditor('container');
            var editor = UE.getEditor('content',{  
                			//focus时自动清空初始化时的内容  
               				 autoClearinitialContent:false,   
               				//关闭elementPath,左下方元素路径  
                			elementPathEnabled:false,    
                			//默认的编辑区域高度  
               				 initialFrameHeight:400,
					autoHeightEnabled:false  
            				});  
            var editor = UE.getEditor('content_en',{  
                			//focus时自动清空初始化时的内容  
               				 autoClearinitialContent:false,   
               				//关闭elementPath,左下方元素路径  
                			elementPathEnabled:false, 
                			//默认的编辑区域高度  
               				 initialFrameHeight:400,
					autoHeightEnabled:false  
            				});  
             
        </script>



</head>

<body>

  <div class="right-product view-product right-off">
     <div class="container-fluid">
				<div class="info-center">
					<div class="page-header">
                                      <div class="pull-left">
						<h4>广告信息设置</h4>      
					</div>
                                   </div>
					<div class="indentify-class padding-lr">
						<p class="margin-big-tb text-sub text-default">
							信息更新后会自同步到前端，更新信息时慎重，更新后原来的信息将无法恢复
						</p>
						<ul class="class-content">
							<li class="pull-left margin-large-35">
							<a class="class-detail pull-right " href="#">
							<div class="class-detail-top">
								<div class="text-center indentify-icon">
                                                                    <img width="100%" src="{{ asset('advers')."/".$str->advers }}">
								</div>
								<h3 class="text-center">{{ $str->title }}</h3>
								<div class="margin-tb padding-bottom text-justify info" style="height: 175px;overflow: hidden">
									{!!$str->content!!}
								</div>
								<ul class="class-detail-has margin-top text-lh-big">
									<li>
									<span class="text-black-gray">链接地址</span>
									<span class="pull-right text-gray-white">{{ $str->url}}</span>
									</li>
								</ul>
								<ul class="class-detail-has margin-top text-lh-big">
									<li>
									<span class="text-black-gray">更新时间</span>
									<span class="pull-right text-gray-white">{{ $str->updatedate }}</span>
									</li>
								</ul>
							</div>
							<p class="continue text-big" data-toggle="modal" data-target="#myModal">
								更新广告信息
							</p>
							</a>
							</li>
						</ul>
					</div>
				</div>            
		</div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:100%;">
	<div class="modal-dialog" style="width:40%;margin: 0 auto;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
                                    <center>更新海报信息</center>
				</h4>
			</div>
                    <form action="{{ url('admin/adver')."/".$str->id }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="mypic" value="{{ $str->advers }}">
			<div class="modal-body">  
				标题：<input class="form-control" type="text" name="title" id="hui" placeholder="请输入标题" value="{{ $str->title }}"><br />
				链接地址：<input class="form-control" type="text" name="url" id="hui" placeholder="请填写链接地址" value="{{ $str->url }}"><br />
				海报：<input class="form-control" type="file" id="hui" name="advers" placeholder="Please enter the category name" value=""><br />
                                内容：<textarea id="content" style="width:100%;height:100px" name="content" style="margin-left:85px;">{!!$str->content!!}</textarea><br />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="submit" class="btn btn-primary">
					提交更改
				</button>
			</div>
                    </form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>

<script type="text/javascript">
$(function(){
/*换肤*/
$(".dropdown .changecolor li").click(function(){
	var style = $(this).attr("id");
    $("link[title!='']").attr("disabled","disabled"); 
	$("link[title='"+style+"']").removeAttr("disabled"); 

	$.cookie('mystyle', style, { expires: 7 }); // 存储一个带7天期限的 cookie 
})
var cookie_style = $.cookie("mystyle"); 
if(cookie_style!=null){ 
    $("link[title!='']").attr("disabled","disabled"); 
	$("link[title='"+cookie_style+"']").removeAttr("disabled"); 
} 
/*左侧导航栏显示隐藏功能*/
$(".subNav").click(function(){				
			/*显示*/
			if($(this).find("span:first-child").attr('class')=="title-icon glyphicon glyphicon-chevron-down")
			{
				$(this).find("span:first-child").removeClass("glyphicon-chevron-down");
			    $(this).find("span:first-child").addClass("glyphicon-chevron-up");
			    $(this).removeClass("sublist-down");
				$(this).addClass("sublist-up");
			}
			/*隐藏*/
			else
			{
				$(this).find("span:first-child").removeClass("glyphicon-chevron-up");
				$(this).find("span:first-child").addClass("glyphicon-chevron-down");
				$(this).removeClass("sublist-up");
				$(this).addClass("sublist-down");
			}	
		// 修改数字控制速度， slideUp(500)控制卷起速度
	    $(this).next(".navContent").slideToggle(300).siblings(".navContent").slideUp(300);
	})
/*左侧导航栏缩进功能*/
$(".left-main .sidebar-fold").click(function(){

	if($(this).parent().attr('class')=="left-main left-full")
	{
		$(this).parent().removeClass("left-full");
		$(this).parent().addClass("left-off");
		
		$(this).parent().parent().find(".right-product").removeClass("right-full");
		$(this).parent().parent().find(".right-product").addClass("right-off");
		
		
		}
	else
	{
		$(this).parent().removeClass("left-off");
		$(this).parent().addClass("left-full");
		
		$(this).parent().parent().find(".right-product").removeClass("right-off");
		$(this).parent().parent().find(".right-product").addClass("right-full");
		
		
		}
	})	
 
  /*左侧鼠标移入提示功能*/
		$(".sBox ul li").mouseenter(function(){
			if($(this).find("span:last-child").css("display")=="none")
			{$(this).find("div").show();}
			}).mouseleave(function(){$(this).find("div").hide();})	
})
</script>
</body>
</html>
