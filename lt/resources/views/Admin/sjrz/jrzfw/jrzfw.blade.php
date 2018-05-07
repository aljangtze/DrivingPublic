<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>业务简报-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pj/js/mobiscroll_002.js') }}" type="text/javascript"></script>
<script src="{{ asset('pj/js/mobiscroll_004.js') }}" type="text/javascript"></script>
<link href="{{ asset('pj/css/mobiscroll_002.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('pj/js/mobiscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('pj/js/mobiscroll_003.js') }}" type="text/javascript"></script>
<script src="{{ asset('pj/js/mobiscroll_005.js') }}" type="text/javascript"></script>
<link href="{{ asset('pj/css/mobiscroll_003.css') }}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>

</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">驾培服务</li>
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
                            <form action="{{ url('admin/jrzfw') }}" method="get">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<li>
					<div class="form-group">
						<label class="">姓名</label>
						<input type="text" name="name" class="form-control" placeholder="请输入姓名" />
					</div>
				</li>
				<li>
					<div class="form-group">
						<label class="">服务地区</label>
						<input type="text" name="fwdq" class="form-control" placeholder="请输入搜索关键词" />
					</div>
				</li>
<!--				<li>
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
				</li>-->
				<li>
					<button type="submit" class="btn btn-info" style="margin-left:30px;">立即搜索</button>
				</li>
                            </form>
			</ul>
		</div>
	</form>
	<!--表格操作-->
	<div class="tb_operation">
                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
	</div>
	<!--表格信息-->
        <input type="hidden" id="url" value="{{ url('admin/jpqdel') }}">
	<div class="table_yw">
		<table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>姓名</td>
				<td>性别</td>
				<td>年龄</td>
				<td>联系电话</td>
				<td>省份证号</td>
				<td>所在行业</td>
				<td>详细地址</td>
				<td>服务地区</td>
				<td>店铺照片</td>
				<td>身份证正面</td>
				<td>省份证反面</td>
                                <td>审核</td>
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
                                <td>{{ $tmp->older }}</td>
                                <td>{{ $tmp->tel }}</td>
                                <td>{{ $tmp->sfzh }}</td>
                                <td>
                                   @if($tmp->type == 3)
                                   驾驶证服务
                                   @endif
                                </td>
                                <td>{{ $tmp->address }}</td>
                                <td>{{ $tmp->fwdq }}</td>
                                <td>
                                    <a href="{{ asset('dpzpic')."/".$tmp->dpzpic }}"><image width="80px" height="50px" src="{{ asset('dpzpic/s_').$tmp->dpzpic }}"></a>
                                </td>
                                <td>
                                    <a href="{{ asset('grsfzpicz')."/".$tmp->grsfzpicz }}"><image width="80px" height="50px" src="{{ asset('grsfzpicz/s_').$tmp->grsfzpicz }}"></a>
                                </td>
                                <td>
                                    <a href="{{ asset('grsfzpicf')."/".$tmp->grsfzpicf }}"><image width="80px" height="50px" src="{{ asset('grsfzpicf/s_').$tmp->grsfzpicf }}"></a>
                                </td>
                                <td>
                                    @if($tmp->sh == 1)
                                    <font color="blue">已审核</font>
                                    @endif
                                    @if($tmp->sh == 2)
                                    <font color="red">未审核</font>
                                    @endif
                                </td>
				<td>
					<a href="{{ url('admin/qcfwedit')."/".$tmp->id }}" class="btn btn-primary"><font color="white">修改</font></a>&nbsp;&nbsp;
					<a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger"><font color="white">删除</font></a>&nbsp;&nbsp;
                                        @if($tmp->sh == 2)
					<a href="{{ url('admin/sh')."/".$tmp->id }}" class="btn btn-success"><font color="white">审核</font></a>
                                        @endif
                                        @if($tmp->sh == 1)
                                        <a href="javascript:alert('不能重复审核')" class="btn btn-success"><font color="white">审核</font></a>
                                        @endif</br>
                                        @if($tmp->sh == 1)
                                        <a data-toggle="modal" data-target="#myModal{{ $tmp->id }}" class="btn btn-info"><font color="white">班型发布</font></a>&nbsp;&nbsp;
                                        @endif
                                        @if($tmp->sh == 2)
                                        <a href="javascript:alert('审核未通过，请先审核再来发布')" class="btn btn-info"><font color="white">班型发布</font></a>&nbsp;&nbsp;
                                        @endif
                                        <a href="{{ url('admin/zzfbclassindex')."/".$tmp->id }}" class="btn btn-warning"><font color="white">查看班型</font></a>
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
                                                        <input type="hidden" name="bh" value="{{ $tmp->bianhao }}">
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
    <script>
        function dodel(id) {
            var form = document.myform;
            if(confirm("是否确定删除~")){
                form.action = "{{ url('admin/del') }}"+ "/" + id;
                form.submit();
            }
        }
    </script>
    <form action="{{ url('admin/del') }}" name="myform" method="get" style="display: none">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="delete">
    </form>
<script>
//复选框事件
$(function() {
$("#SelectAll").click(function(){
	$("[name=subchecks]:checkbox").prop("checked",this.checked);
//	$(".tb_operation").toggle();
});
	$("[name=subchecks]:checkbox").click(function(){
		var flag=true;
		$("[name=subchecks]:checkbox").each(function(){
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
