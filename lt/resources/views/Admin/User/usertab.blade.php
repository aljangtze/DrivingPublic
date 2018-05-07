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
<script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>

</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="index.html">首页</a></li>
		  <li class="active">管理账户</li>
		</ol>
	</div>
	<!--查找-->
	<form class="form-inline form_ss">
		<!--搜索查询条件-->
		<div class="search_nr" id="sscs">
			<ul>
                            <form action="{{ url('admin/user') }}" method="get">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<li>
					<div class="input-group" >
					  <input type="text" name="name" class="form-control" placeholder="请输入信息" style="width:300px;" />
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
	<div class="glzh">
		<button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
		<!--<button type="button" class="btn btn-info">导出表格</button>-->
	</div>
	<!--表格信息-->
        <input type="hidden" id="url" value="{{ url('admin/usersqdel') }}">
	<div class="table_yw" style="width:98%;margin:0 auto;">
		<table class="table table-bordered">
			<tr class="info">
				<td>
                                <input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>姓名</td>
				<td>性别</td>
				<td>账号</td>
				<td>密码</td>
				<td>电话</td>
				<td>编号</td>
				<td>地址</td>
				<td>管理类型</td>
				<td>操作</td>
			</tr>
                        @foreach($items as $tmp)
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
				</td>
				<td>{{ $tmp->id }}</td>
				<td>{{ $tmp->name }}</td>
                                <td>
                                    @if($tmp->sex == 1)
                                    男
                                    @endif
                                    @if($tmp->sex == 0)
                                    女
                                    @endif
                                </td>
				<td>{{ $tmp->nickname }}</td>
				<td>{{ $tmp->pass }}</td>
				<td>{{ $tmp->tel }}</td>
				<td>{{ $tmp->bianhao }}</td>
				<td>{{ $tmp->address }}</td>
				<td>
                                    @if($tmp->type == 1)
                                    <font color="red">高级管理员</font>
                                    @endif
                                    @if($tmp->type == 3)
                                    <font color="Orange">权限已被移除</font>
                                    @endif
                                    @if($tmp->type == 2 || $tmp->type == null)
                                    普通管理员
                                    @endif
                                </td>
				<td>
					<a href='{{ url("admin/user/$tmp->id/edit") }}' class="btn btn-info">修改</a>
					<a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
				</td>
			</tr>
                        @endforeach
		</table>
            <center><div>{!! $items->appends($where)->render() !!}</div></center>
            <form action="{{ url('admin/user') }}" name="myform" method="post" style="display: none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            <script>
               function dodel(id) {
                   var form = document.myform;
                   if(confirm('是否确定删除~删除后不可以恢复')) {
                       form.action = "{{ url('admin/user') }}" + "/" + id;
                       form.submit();
                   }
               }
            </script>
	</div>
</div>

<script>
//复选框事件

	   
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
