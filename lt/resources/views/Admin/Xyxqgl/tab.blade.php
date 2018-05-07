<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理账户-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/pxdel.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>
</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">学员需求管理</li>
		</ol>
	</div>
	<!--查找-->
	<form class="form-inline form_ss">
		<!--搜索查询条件-->
		<div class="search_nr" id="sscs">
			<ul>
                            <form action="{{ url('admin/xyxqgl') }}" method="get">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<li>
					<div class="input-group" >
					  <input type="text" class="form-control" name="name" placeholder="请输入姓名" style="width:300px;" />
					  <span class="input-group-btn">
						<button class="btn btn-default" type="submit">搜索</button>
					  </span>
					</div>
				</li>
                            </form>
			</ul>
		</div>
	</form>
	<!--表格操作-->
        <input type="hidden" id="url" value="{{ url('admin/xyxqglsqdel') }}">
	<div class="glzh">
		<button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
		<!--<button type="button" class="btn btn-info">导出表格</button>-->
	</div>
	<!--表格信息-->
	<div class="table_yw" style="width:98%;margin:0 auto;">
		<table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>姓名</td>
				<td>性别</td>
				<td>联系电话</td>
				<td>标题</td>
				<td>练车时间</td>
				<td>所在位置</td>
				<td>户口所在地</td>
				<td>项目</td>
				<td>类型</td>
				<td>科二所选车型</td>
				<td>科三所选车型</td>
				<td>详细内容</td>
				<td>操作</td>
			</tr>
                        @foreach($items as $tmp)
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
				</td>
				<td>{{ $tmp->id }}</td>
				<td>{{ $tmp->name }}</td>
				<td>@if($tmp->sex == 1) 男 @endif @if($tmp->sex == 0) 女 @endif</td>
				<td>{{ $tmp->tel }}</td>
				<td>{{ $tmp->title }}</td>
				<td>{{ $tmp->lcdate }}&nbsp;{{ $tmp->lctime }}</td>
				<td>{{ $tmp->szaddress }}</td>
				<td>{{ $tmp->hkaddress }}</td>
                                <td>
                                    @if($tmp->selitem == 1) 科目一 @endif
                                    @if($tmp->selitem == 2) 科目二 @endif
                                    @if($tmp->selitem == 3) 科目三 @endif
                                    @if($tmp->selitem == 4) 科目四 @endif
                                    @if($tmp->selitem == 5) 定制报名 @endif
                                </td>
                                <td>
                                    @if($tmp->keitem == 1) 场地练习 @endif
                                    @if($tmp->keitem == 2) 考试练习 @endif
                                    @if($tmp->keitem1 == 3) 考试路训 @endif
                                    @if($tmp->keitem1 == 4) 长途路训 @endif
                                    @if($tmp->keitem1 == 5) 考试路训(考试车) @endif
                                    @if($tmp->keitem3 == 3) 考试路训 @endif
                                    @if($tmp->keitem3 == 4) 长途培训 @endif
                                    @if($tmp->keitem3 == 5) 考试路训（考试车） @endif
                                </td>
				<td>{{ $tmp->kecartype }}</td>
				<td>{{ $tmp->kescartype }}</td>
				<td>{{ $tmp->infocontent }}</td>
				<td>
					<!--<a href="zhxg.html" class="btn btn-info">修改</a>-->
                                        <a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
				</td>
			</tr>
                        @endforeach
		</table>
            <center><div>{!! $items->appends($where)->render() !!}</div></center>
	</div>
</div>
    <form action="{{ url('admin/xyxqgl') }}" name="myform" method="post" style="display:none">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="delete">
    </form>
<script>
    function dodel(id) {
        dodell(id,"{{ url('admin/xyxqgl') }}");
    }
</script>
<script>
//复选框事件
$(function() {
$("#SelectAll").click(function(){
	$("[name=subcheck]:checkbox").prop("checked",this.checked);
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
