<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>帖子列表-彭敬后台管理系统</title>
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
		  <li class="active">已审核帖子列表</li>
		</ol>
	</div>
	<!--查找-->
	<form class="form-inline form_ss">
		<!--搜索查询条件-->
		<div class="search_nr" id="sscs">
			<ul>
                            <form action="{{ url('admin/forum/create') }}" method="get">
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
	<div class="glzh">
		<button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
		<a  href="{{ url('admin/forum/create') }}" ><button type="button" class="btn btn-info">已审核({{ $count }})</button></a>
		<a href="{{ url('admin/forumhsz') }}"><button type="button" class="btn btn-danger">回收站({{ $hs }})</button></a>
	</div>
        <input type="hidden" id="url" value="{{ url('admin/forumsqdel') }}">
	<!--表格信息-->
	<div class="table_yw" style="width:98%;margin:0 auto;">
		<table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>排序</td>
				<td>姓名</td>
				<td>性别</td>
				<td>账号</td>
				<td>标题</td>
				<td>浏览次数</td>
				<td>审核</td>
				<td>操作</td>
			</tr>
                        @foreach($items as $tmp)
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
				</td>
				<td>{{ $tmp->id }}</td>
				<td><input style="width: 40px;height:30px" id="px{{ $tmp->id }}" onblur="dopxx({{ $tmp->id }})" type="tex" name="px" value="{{ $tmp->px }}"></td>
				<td>{{ $tmp->name }}</td>
				<td>@if($tmp->sex == 1) 男 @endif @if($tmp->sex == 0) 女 @endif </td>
				<td>{{ $tmp->nickname }}</td>
				<td>{{ $tmp->title }}</td>
				<td>{{ $tmp->show }}</td>
                                <td>@if($tmp->sh == 1) <font color="blue">已审核</font> @endif</td>
				<td>
					<a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
					<a href='{{ url("admin/forum/$tmp->id/edit") }}' class="btn btn-info">查看</a>
					<!--<a href='{{ url("admin/forumhs/$tmp->id") }}' class="btn btn-danger">放入回收站</a>-->
					<!--<a href='{{ url("admin/forumsh/$tmp->id") }}' class="btn btn-info">审核</a>-->
				</td>
			</tr>
                        @endforeach
		</table>
            <center><div>{!! $items->appends($where)->render() !!}</div></center>
	</div>
</div>
    <form action="{{ url('admin/forum') }}" name="myform" method="post" style="display: none">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">   
    <input type="hidden" name="_method" value="delete">   
    </form>
    <script>
        function dodel(id) {
            dodell(id,"{{ url('admin/forum') }}");
        }
        
        function dopxx(id){
            var px = $("#px"+id+"").val();
            dopx(px,"{{ url('admin/forumpx') }}",id);
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
