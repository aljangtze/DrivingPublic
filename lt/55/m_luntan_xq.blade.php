<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>文章详情-伦途科技</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/m_index.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="m_luntan.html" style="width:16%;" class="logo column"><img src="images/fhjt.png" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">文章详情</p>
</header>

<!--详情标题-->
<div class="m_detail">
	<div class="de_title">
		<p>百度度秘首席技术官朱凯华上海畅聊 AI的无限可能</p>
		<p class="de_date"><img src="images/yj_icon.png">123<span>2017-04-26</span></p>
	</div>
</div>
<!--详情内容-->
<div class="de_content ft_detail">
	<p>近日，百度度秘事业部首席技术官朱凯华赴上海计算机学会第十二届学术年会进行分享交流。他发表了主题为《AI赋能的搜索和对话交互》的演讲，更是引来全场经久不息的掌声，被誉为“最具干货的人工智能分享”。</p>
	<p class="m_bsfg" style="height:5px;"></p>
	<p>
		<img src="images/lt_1.jpg">
		<img src="images/lt_2.jpg">
	</p>
	<p>据了解，此次应大会邀请而来的演讲嘉宾朱凯华，现任百度度秘事业部首席技术官，也是百度公司首席架构师，负责度秘和人工智能操作系统DuerOS的核心技术。依靠自身专业领域的特长，他大幅提升百度搜索相关性水平，主导了度秘等一系列产品的创新。本届大会，朱凯华的演讲主要围绕《AI赋能的搜索和对话交互》展开。演讲中，他重点阐释了目前百度度秘事业部重点进行科研攻关的两部分内容：AI赋能的现代搜索引擎，即现阶段的百度搜索；以及AI赋能的对话式交互计算机，即百度技术团队现在正在做的DuerOS系统。针对DuerOS通过AI赋能未来的愿景，朱凯华指出：“我们希望DuerOS是无处不在的，我们希望未来DuerOS的标志可以贴在任何地方。无论它贴在哪里，小朋友就知道这个设备可以对话。它贴在桌子上就可以跟桌子对话，它贴在椅子上就可以跟椅子对话。</p>
</div>
<p class="clearfix"></p>
<!--详情底部-->
<div class="de_footer">
	<p class="dhyc_p">上一篇：<button type="button" class="btn btn-link">张举高老师昭通小学爱心捐赠张举高老师昭通小学爱心捐赠</button></p>
	<p class="dhyc_p">下一篇：<button type="button" class="btn btn-link" >张举高老师昭通小学爱心捐赠</button></p>
</div>
<!--评论-->
<div class="discuss">
	<p class="discuss_title">参与的评论</p>
	<ul class="discuss_box">
		<li>
			<p class="discuss_one">18206722101 <span>2017-04-28</span></p>
			<p style="font-size:1.2rem;margin:4px 0;">伦途怎么样</p>
			<p style="color:#999;font-size:1.2rem; margin-bottom:5px;">回复</p>
		</li>
		<li>
			<p class="discuss_one">18206722101 <span>2017-04-28</span></p>
			<p style="font-size:1.2rem;margin:4px 0;">这篇文章还是不错的</p>
			<p style="color:#999;font-size:1.2rem; margin-bottom:5px;">回复</p>
		</li>
	</ul>
	<!--分割-->
	<p class="m_bsfg"></p>
	
	<!--发表评论-->
	<p class="discuss_fb">发表评论</p>
	<form>
		<div class="form-group">
   		 	<label for="exampleInputEmail1">标题</label>
    		<input type="text" class="form-control" id="pl_title" placeholder="请输入您的标题">
		</div>
  		<div class="form-group">
    		<label for="exampleInputPassword1">内容</label>
    		<textarea id="pl_content" width="100%" class="form-control" placeholder="请输入内容"  rows="5"></textarea>
  		</div>
		<button type="submit" class="btn btn-primary" id="btn_discuss">发表</button>
	</form>
</div>
<p class="m_bsfg"></p>
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
