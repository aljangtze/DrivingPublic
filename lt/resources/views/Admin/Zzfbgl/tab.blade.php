<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理账户-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/dist/css/dropify.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pj/dist/js/dropify.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/pxdel.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>
</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">自主发布管理</li>
		</ol>
	</div>
	<!--查找-->
	<form class="form-inline form_ss">
		<!--搜索查询条件-->
		<div class="search_nr" id="sscs">
			<ul>
                            <form action="{{ url('admin/zzfbgl') }}" method="get">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<li>
					<div class="input-group" >
					  <input type="text" class="form-control" name="jxname" placeholder="请输入驾校名称" style="width:300px;" />
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
        <input type="hidden" id="url" value="{{ url('admin/zzfbglsqdel') }}">
	<!--表格信息-->
	<div class="table_yw" style="width:98%;margin:0 auto;">
		<table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>排序</td>
				<td>图片</td>
				<td>驾校名称</td>
				<td>价格</td>
				<td>负责人</td>
				<td>联系电话</td>
				<td>驾校位置</td>
				<!--<td>驾校简介</td>-->
				<td>发布日期</td>
				<td width="30%">操作</td>
			</tr>
                        @foreach($items as $tmp)
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
				</td>
				<td>{{ $tmp->id }}</td>
                                <td><input style="width: 40px;height:30px" id="px{{ $tmp->id }}" onblur="dopxx({{ $tmp->id }})" type="tex" name="px" value="{{ $tmp->px }}"></td>
				<td><img width="80px" height="50px" src="{{ asset('pic')."/".$tmp->pic }}"></td>
				<td>{{ $tmp->jxname }}</td>
                                <td><font color="red">￥{{ $tmp->price }}</font></td>
				<td>{{ $tmp->name }}</td>
				<td>{{ $tmp->tel }}</td>
				<td>{{ $tmp->address }}</td>
				<!--<td>{{ $tmp->content }}</td>-->
				<td>{{ $tmp->fbdate }}</td>
				<td>
                                        <a href="{{ url('admin/zzfbdetail')."/".$tmp->id }}"><button type="button" class="btn btn-warning">查看详情</button></a>
					<a href='{{ url("admin/zzfbgl/$tmp->id/edit") }}' class="btn btn-info">修改</a>
					<a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
					<a class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $tmp->id }}">班型发布</a>
                                        <a href="{{ url('admin/zzfbclassindex')."/".$tmp->id."/".$tmp->bh }}"><button type="button" class="btn btn-success">查看班型</button></a>
				</td>
                                
                                <div class="modal fade" id="myModal{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                        &times;
                                                                </button>
                                                                <center><h4 class="modal-title" id="myModalLabel">
                                                                        班型发布
                                                                </h4></center>
                                                        </div>
                                                    <form action="{{ url('admin/zzfbclass') }}" method="post" class="form-horizontal">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="bh" value="{{ $tmp->bh }}">
                                                        <input type="hidden" name="jid" value="{{ $tmp->id }}">
                                                        <div class="modal-body" style="min-height: 400px">
                                                                    <div class="form-group">
                                                                      <label for="inputEmail3" class="col-sm-2 control-label">价格</label>
                                                                      <div class="col-sm-10">
                                                                          <input style="width:200px;float: left" type="text" name="price" class="form-control" id="inputEmail3" placeholder="请输入价格"><i style="float: left;margin-top: 5px;margin-left: 10px">*必填</i>
                                                                      </div>
                                                                    </div>
                                                                    <br />
                                                                    <br />
                                                                    <div class="form-group">
                                                                      <label for="inputEmail3" class="col-sm-2 control-label">班型</label>
                                                                      <div class="radio">
                                                                        <label>
                                                                          <input type="radio" name="classtype" id="optionsRadios1" value="1" checked>
                                                                          vip班&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                          <input type="radio" name="classtype" id="optionsRadios1" value="2">
                                                                          普通班
                                                                        </label>
                                                                      </div>
                                                                    </div>
                                                                    
                                                                    <br />
                                                                    <br />
                                                                    <div class="form-group" style="clear: both;height:100px">
                                                                      <label for="inputEmail3" class="col-sm-2 control-label">介绍</label>
                                                                      <div class="col-sm-10">
                                                                          <textarea class="form-control" rows="3" cols="1" name="info" style="width:300px;float: left"></textarea><i style="float: left;margin-top: 5px;margin-left: 10px">*必填</i>
                                                                      </div>
                                                                    </div>
                                                                    <div class="form-group" style="margin-top: 10px">
                                                                      <label for="inputEmail3" class="col-sm-2 control-label">费用明细</label>
                                                                      <div class="col-sm-10">
                                                                          <textarea class="form-control" rows="3" cols="1" name="fyinfo" style="width:300px;float: left"></textarea><i style="float: left;margin-top: 5px;margin-left: 10px">*必填</i>
                                                                      </div>
                                                                    </div>
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
                                
			</tr>
                        @endforeach
		</table>
            <center><div>{!! $items->appends($where)->render() !!}</div></center>
	</div>
</div>
    
    
    <form action="{{ url('admin/zzfbgl') }}" method="post" name="myform" style="display: none">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="delete">
    </form>
<script>
    function dodel(id) {
        dodell(id,"{{ url('admin/zzfbgl') }}");
    }
    
     function dopxx(id){
            var px = $("#px"+id+"").val();
            dopx(px,"{{ url('admin/zzfbglpx') }}",id);
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
