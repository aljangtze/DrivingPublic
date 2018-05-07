<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>业务简报-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/mobiscroll_002.js" type="text/javascript"></script>
<script src="js/mobiscroll_004.js" type="text/javascript"></script>
<link href="css/mobiscroll_002.css" rel="stylesheet" type="text/css">
<script src="js/mobiscroll.js" type="text/javascript"></script>
<script src="js/mobiscroll_003.js" type="text/javascript"></script>
<script src="js/mobiscroll_005.js" type="text/javascript"></script>
<link href="css/mobiscroll_003.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="index.html">首页</a></li>
		  <li class="active">业务简报</li>
		</ol>
	</div>
	<form class="form-inline form_ss">
		<!--搜索查询-->
		<div class="search">
			<button type="button" class="btn btn-default" id="btn-ss">查看搜索条件</button>
		</div>
		<!--搜索查询条件-->
		<div class="search_nr" style="display:none;" id="sscs">
			<ul>
				<li>
					<div class="form-group">
						<label class="">分公司</label>
						<input type="text" class="form-control" placeholder="输入分公司名称" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label class="">归属团队</label>
						<input type="text" class="form-control" placeholder="输入所在团队名称" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label class="">业务员</label>
						<input type="text" class="form-control" placeholder="输入业务员姓名" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label class="">保险公司</label>
						<input type="text" class="form-control" placeholder="输入保险公司名称" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label class="">保单号</label>
						<input type="text" class="form-control" placeholder="输入保单号" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="appDate">超保日期</label>
						<input type="text" class="form-control" placeholder="请点击选择超保日期" readonly="readonly" name="appDate" id="appDate" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label for="appDate">到期日期</label>
						<input type="text" class="form-control" placeholder="请点击选择超保日期" readonly="readonly" name="appDate" id="dqDate" />
					</div>
				</li>
				<li>
					<button type="submit" class="btn btn-info" style="margin-left:30px;">立即搜索</button>
				</li>
			</ul>
		</div>
	</form>
	<!--表格操作-->
	<div class="tb_operation" style="display:none;">
		<button type="button" class="btn btn-danger">全部删除</button>
	</div>
	<!--表格信息-->
	<div class="table_yw">
		<table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>分公司</td>
				<td>归属团队</td>
				<td>业务员</td>
				<td>保险公司</td>
				<td>保单号</td>
				<td>超保日期</td>
				<td>到期日期</td>
				<td>状态</td>
				<td>资产编号</td>
				<td>资产总额</td>
				<td>分享期数</td>
				<td>已分期数</td>
				<td>已分总额</td>
				<td>资产余额</td>
				<td>操作</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="1" />
				</td>
				<td>1</td>
				<td>东风广场分部</td>
				<td>勇敢队</td>
				<td>小张</td>
				<td>蚂蚁雄兵</td>
				<td>A1234561212</td>
				<td>2017-09-29</td>
				<td>2017-09-01</td>
				<td>已通过</td>
				<td>Z001</td>
				<td>￥1000.00</td>
				<td>5</td>
				<td>2</td>
				<td>￥300.00</td>
				<td>￥700.00</td>
				<td>
					<a class="btn btn-info">修改</a>
					<a class="btn btn-danger">删除</a>
					<a href="bbmx.html" class="btn btn-success">查看</a>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="2" />
				</td>
				<td>2</td>
				<td>东风广场分部</td>
				<td>勇敢队</td>
				<td>小张</td>
				<td>蚂蚁雄兵</td>
				<td>A1234561212</td>
				<td>2017-09-29</td>
				<td>2017-09-01</td>
				<td>未通过</td>
				<td>Z002</td>
				<td>￥1000.00</td>
				<td>5</td>
				<td>2</td>
				<td>￥300.00</td>
				<td>￥700.00</td>
				<td>
					<a class="btn btn-info">修改</a>
					<a class="btn btn-danger">删除</a>
					<a href="bbmx.html" class="btn btn-success">查看</a>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="3" />
				</td>
				<td>3</td>
				<td>东风广场分部</td>
				<td>勇敢队</td>
				<td>小张</td>
				<td>蚂蚁雄兵</td>
				<td>A1234561212</td>
				<td>2017-09-29</td>
				<td>2017-09-01</td>
				<td>未通过</td>
				<td>Z003</td>
				<td>￥1000.00</td>
				<td>5</td>
				<td>2</td>
				<td>￥300.00</td>
				<td>￥700.00</td>
				<td>
					<a class="btn btn-info">修改</a>
					<a class="btn btn-danger">删除</a>
					<a href="bbmx.html" class="btn btn-success">查看</a>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="4"  />
				</td>
				<td>4</td>
				<td>东风广场分部</td>
				<td>勇敢队</td>
				<td>小张</td>
				<td>蚂蚁雄兵</td>
				<td>A1234561212</td>
				<td>2017-09-29</td>
				<td>2017-09-01</td>
				<td>未通过</td>
				<td>Z004</td>
				<td>￥1000.00</td>
				<td>5</td>
				<td>2</td>
				<td>￥300.00</td>
				<td>￥700.00</td>
				<td>
					<a class="btn btn-info">修改</a>
					<a class="btn btn-danger">删除</a>
					<a href="bbmx.html" class="btn btn-success">查看</a>
				</td>
			</tr>
		</table>
	</div>
</div>

<script>
//复选框事件
$(function() {
$("#SelectAll").click(function(){
	$("[name=subcheck]:checkbox").prop("checked",this.checked);
	$(".tb_operation").toggle();
});
	$("[name=subcheck]:checkbox").click(function(){
		var flag=true;
		$("[name=subcheck]:checkbox").each(function(){
			if(!this.checked){
				flag=false;
			}
		});
		$("#all").prop("checked",flag);
		});
});
	   
$(function(){
	$("#btn-ss").click(function(){
		$("#sscs").toggle();
		$("#btn-ss").blur();
	});
});
$(function () {
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
		        startYear: currYear - 30, //开始年份
		        endYear: currYear + 50 //结束年份
			};

		  	$("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
			$("#dqDate").mobiscroll($.extend(opt['date'], opt['default']));
		  	var optDateTime = $.extend(opt['datetime'], opt['default']);
		  	var optTime = $.extend(opt['time'], opt['default']);
        });
</script>
</body>
</html>
