@extends("pho.bases.comm.comm")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>文章详情-新司机网</title>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="{{ url('tel/forum')."/".session()->get("Teluser") }}" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">文章详情</p>
</header>

<!--详情标题-->
<div class="m_detail">
	<div class="de_title">
		<p>{{ $str->title }}</p>
		<p class="de_date"><img src="{{ asset('phone/images/yj_icon.png') }}">{{ $str->show }}<span>{{ $str->fbdate }}</span></p>
	</div>
</div>
<!--详情内容-->
<div class="de_content ft_detail">
	<p>
            @if($str->fj != null)
		<img src="{{ asset('forum')."/".$str->fj }}">
            @endif
            @if($str->fj = null)
            @endif
	</p>
	<p>{{ $str->info }}</p>
</div>
<p class="clearfix"></p>
<!--详情底部-->
<div class="de_footer">
    @if($up == null)
	<p class="dhyc_p">上一篇：<button type="button" class="btn btn-link">无</button></p>
    @endif
    @if($up !== null)
	<p class="dhyc_p">上一篇：<a href="{{ url('tel/forumdetail')."/".$up->id."/".session()->get("Teluser") }}"><button type="button" class="btn btn-link">{{ $up->title."/".$up->id }}</button></a></p>
    @endif
    @if($down == null)
	<p class="dhyc_p">下一篇：<button type="button" class="btn btn-link" >无</button></p>
    @endif
    @if($down !== null)
	<p class="dhyc_p">下一篇：<a href='{{ url("tel/forumdetail/$down->id")."/".session()->get("Teluser") }}'><button type="button" class="btn btn-link" >{{ $down->title."/".$down->id }}</button></a></p>
    @endif
</div>


<p class="m_bsfg"></p>
<p class="discuss_fb">发表评论</p>
	<form action="{{ url('tel/contract') }}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="userinfo" value="{{ session()->get("Teluser") }}">
		<input type="hidden" name="itemId" value="{{ $str->id }}">
		<!--<div class="form-group">
   		 	<label for="exampleInputEmail1">标题</label>
    		<input type="text" class="form-control" id="pl_title" placeholder="请输入您的标题">
		</div>-->
  		<div class="form-group">
    		<label for="exampleInputPassword1">内容</label>
    		<textarea id="pl_content" width="100%" name="content" class="form-control" placeholder="请输入内容"  rows="5"></textarea>
  		</div>
		<button type="submit" class="btn btn-primary" id="btn_discuss">发表</button>
	</form>
<!--评论-->
<div class="discuss">
	<p class="discuss_title">参与的评论</p>
	<ul class="discuss_box">
		<li>
			@foreach($contact as $coo)
                        <div class="discuss_one"><div style="width:64px;float:left;margin-right:15px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{$coo->userinfo}}</div> <span>{{ $coo->fbdate }}</span></div>
			<p style="font-size:1.2rem;margin:4px 0;">{{ $coo->content }}</p>
			@endforeach
			<!-- <p style="color:#999;font-size:1.2rem; margin-bottom:5px;">回复</p> -->
		</li>
	</ul>
	<!--分割-->
	
	
	<!--发表评论-->
	
</div>
<p class="m_bsfg" style="height:80px"></p>
<script>
//发帖判断
$(function () {
            $("#btn_discuss").click(function () {
				var title=$("#pl_title").val();
				var jianjie=$("#pl_content").val();
                if(title==""){
						alert("标题不能为空");
						$("#pl_title").focus();
						return false;
					}
				else if(jianjie==""){
						alert("内容简介不能为空");
						$("#pl_content").focus();
						return false;
					}
				else{
						alert("发表成功");
					 	window.location.href="m_Lt_detail.html";
					}
            });
});
</script>
</body>
</html>
@endsection
