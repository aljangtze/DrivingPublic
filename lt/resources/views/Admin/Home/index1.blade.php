<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台信息管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
</head>

<body>
<!--首页-->
<div class="info_box">
	<!--头像-->
	<div class="tx">
		<!--会员信息-->
		<div class="tx_img">
			<p><a href="grxx.html"><img src="{{ asset('pj/images/lttx.jpg') }}" class="img-thumbnail"></a></p>
			<div class="xx_box">
				<ul>
					<li>会员ID：{{ session()->get("Adminuser") }}</li>
					<li>权限：<i>管理员</i></li>
					<li>会员状态：<i>审核通过</i></li>
				</ul>
			</div>
		</div>
		
		<!--统计信息-->
		<div class="tjxx">
			<ul>
				<li>
					<a href="#">
						<img src="{{ asset('pj/images/ly.png') }}">
						<p>留言<em>123</em>条</p>
					</a>
				</li>
				<li>
					<img src="{{ asset('pj/images/cks.png') }}">
					<p>累计查看数<em>1000</em>条</p>
				</li>
				<li>
					<img src="{{ asset('pj/images/xx.png') }}">
					<p>已录入信息<em>500</em>条</p>
				</li>
				<li>
					<a href="#">
						<img src="{{ asset('pj/images/tz.png') }}">
						<p>重要通知<em>0</em>条</p>
					</a>
				</li>
			</ul>
		</div>
		<!--网站公告-->
		
	</div>
</div>
<!--留言-->
<div class="message">
	<!--意见反馈-->
<!--	<div class="feedback">
		<p>意见反馈</p>
		<form>
			<div class="form-group">
				<label class="sr-only">留言</label>
				<textarea rows="10" placeholder="留下您的意见，我们将不断完善" class="form-control" ></textarea>
			</div>
			<button type="submit" class="btn_tj">提交留言</button>
		</form>
	</div>-->
	<!--新闻动态-->
<!--	<div class="news">
		<p>联系方式</p>
		<div class="lxfs">
			<p>联系人：彭总</p>
			<p>联系电话：13036415000</p>
			<p>地址：云南省昆明市XXXXXXXXXXXXXXXXX</p>
			<p>网址：www.xxxxxxx.com</p>
			<p>邮箱：13036415000@163.com</p>
		</div>
	</div>-->
</div>
<!--底部-->
<div class="footer">
	<p>版权所有：云南伦途科技有限公司    &nbsp;&nbsp;&nbsp;滇ICP备68542158</p>	
</div>

</body>
</html>
