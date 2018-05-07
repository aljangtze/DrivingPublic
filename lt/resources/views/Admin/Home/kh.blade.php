<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台信息管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<style>
            #a{
                float: left;
                width:31%;
                margin-left: 20px;
                margin-top: 5px;
                text-align: left;
            }
            
            .panel-body ul li label{
                color:black;
                float: left;
                font-weight: normal;
            }
            
            .hh{
                width:50%;
                float: left;
            }
            
            .hh img{
                width:370px;
                height:270px;
            }
            
            .hh p{
                text-align: center;
            }
        </style>
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
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"><center>基本信息</center></div>
                        <div class="panel-body">
                            <ul>
                                <li id="a"><label>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>{{ $str->name }}</li>
                                <li id="a"><label>性别：</label>@if($str->sex == 1) 男 @endif @if($str->sex == 0) 女 @endif</li>
                                <li id="a"><label>联系电话：</label>{{ $str->tel }}</li>
                                <li id="a"><label>身份证号：</label>{{ $str->sfzh }}</li>
                                <li id="a"><label>所在行业：</label>
                                    @if($str->type == 1) 驾培服务 @endif
                                    @if($str->type == 2) 汽车服务 @endif
                                    @if($str->type == 3) 驾驶证服务 @endif
                                </li>
                                @if($str->type == 1)
                                <li id="a"><label>成立日期：{{ $str->cldate }}</label></li>
                                <li id="a"><label>驾校名称：{{ $str->jxname }}</label></li>
                                <li id="a"><label>驾校位置：{{ $str->jxaddress }}</label></li>
                                @endif
                                @if($str->type == 2)
                                <li id="a"><label>详细地址：{{ $str->address }}</label></li>
                                <li id="a"><label>服务地区：{{ $str->fwdq }}</label></li>
                                @endif
                                @if($str->type == 3)
                                <li id="a"><label>详细地址：{{ $str->address }}</label></li>
                                <li id="a"><label>服务地区：{{ $str->fwdq }}</label></li>
                                @endif
                            </ul>
                        </div>
                      </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"><center>申请附带资料</center></div>
                        <div class="panel-body">
                            <ul>
                                @if($str->type == 1)
                                <li class="hh"><a href="{{ asset('sjrz')."/".$str->yyzzpic }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('sjrz')."/".$str->yyzzpic }}"></a><p>营业执照</p></li>
                                <li class="hh"><a href="{{ asset('frsfzpicz')."/".$str->frsfzpicz }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('frsfzpicz')."/".$str->frsfzpicz }}"></a><p>法人身份证</p></li>
                                <li class="hh"><a href="{{ asset('frsfzpicf')."/".$str->frsfzpicf }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('frsfzpicf')."/".$str->frsfzpicf }}"></a><p>法人身份证反面</p></li>
                                <li class="hh"><a href="{{ asset('xlcdpic1')."/".$str->xlcdpic1 }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('xlcdpic1')."/".$str->xlcdpic1 }}"></a><p>训练场地</p></li>
                                <li class="hh"><a href="{{ asset('xlcdpic2')."/".$str->xlcdpic2 }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('xlcdpic2')."/".$str->xlcdpic2 }}"></a><p>训练场地</p></li>
                                @endif
                                @if($str->type == 2)  
                                <li class="hh"><a href="{{ asset('dpzpic')."/".$str->dpzpic }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('dpzpic')."/".$str->dpzpic }}"></a><p>店铺照片</p></li>
                                <li class="hh"><a href="{{ asset('grsfzpicz')."/".$str->grsfzpicz }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('grsfzpicz')."/".$str->grsfzpicz }}"></a><p>身份证正面</p></li>
                                <li class="hh"><a href="{{ asset('grsfzpicf')."/".$str->grsfzpicf }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('grsfzpicf')."/".$str->grsfzpicf }}"></a><p>身份证反面</p></li>
                                @endif
                                @if($str->type == 3)  
                                <li class="hh"><a href="{{ asset('dpzpic')."/".$str->dpzpic }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('dpzpic')."/".$str->dpzpic }}"></a><p>店铺照片</p></li>
                                <li class="hh"><a href="{{ asset('grsfzpicz')."/".$str->grsfzpicz }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('grsfzpicz')."/".$str->grsfzpicz }}"></a><p>身份证正面</p></li>
                                <li class="hh"><a href="{{ asset('grsfzpicf')."/".$str->grsfzpicf }}" target="_blank"><img style="width:370px;height:270px" src="{{ asset('grsfzpicf')."/".$str->grsfzpicf }}"></a><p>身份证反面</p></li>
                                @endif
                            </ul>
                        </div>
                     </div>
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
