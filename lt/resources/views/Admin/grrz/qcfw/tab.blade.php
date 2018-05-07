<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>待审核-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/pxdel.js') }}"></script>
<style>
            #a{
                float: left;
                width:31%;
                margin-left: 10px;
                margin-top: 5px;
            }
            
            .panel ul li label{
                color:black;
                font-weight: normal;
            }
            
            .hh{
                width:50%;
                float: left;
            }
            
            .hh p{
                text-align: center;
            }
        </style>
</head>

<body>
<div class="info_box">
	<!--导航-->
	<div class="yw_nav">
		<ol class="breadcrumb">
		  <li><a href="#">首页</a></li>
		  <li class="active">汽车服务</li>
		</ol>
	</div>
	<form class="form-inline form_ss">
		<!--搜索查询条件-->
		<div class="search_nr" id="sscs">
			<ul>
                            <form action="{{ url('admin/grqcfw') }}" method="get">
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
	<div class="tb_operation">
                <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                <a href="{{ url('admin/grqcfw')."/"."1"."/"."edit" }}"><button type="button" class="btn btn-success">（{{ $count }}）已审核</button></a>
	</div>
        <input type="hidden" id="url" value="{{ url('admin/delgrjpqdel') }}">
	<!--表格信息-->
	<div class="table_yw">
		<table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>编号</td>
				<td>排序</td>
				<td>姓名</td>
				<td>性别</td>
				<td>年龄</td>
				<td>联系电话</td>
				<td>身份证号</td>
				<td>所在行业</td>
				<td>详细地址</td>
				<td>服务地区</td>
<!--				<td>店铺照片</td>
				<td>身份证正面</td>
				<td>身份证反面</td>-->
				<td>审核状态</td>
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
                                    @if($tmp->type == 2)
                                    <font color="blue">汽车服务</font>
                                    @endif
                                </td>
				<td>{{ $tmp->address }}</td>
				<td>{{ $tmp->fwdq }}</td>
<!--                                <td>
                                    <a href="{{ asset('dppic')."/".$tmp->dppic }}"><img width="80px" height="50px" src="{{ asset('dppic')."/s_".$tmp->dppic }}"></a>
                                </td>
                                <td>
                                    <a href="{{ asset('grsfzpicz')."/".$tmp->grsfzpicz }}"><img width="80px" height="50px" src="{{ asset('grsfzpicz')."/s_".$tmp->grsfzpicz }}"></a>
                                </td>
                                <td>
                                    <a href="{{ asset('grsfzpicf')."/".$tmp->grsfzpicf }}"><img width="80px" height="50px" src="{{ asset('grsfzpicf')."/s_".$tmp->grsfzpicf }}"></a>
                                </td>-->
                                <td>
                                    @if($tmp->sh == 2)
                                    <font color="red">未审核</font>
                                    @endif
                                    @if($tmp->sh == 1)
                                    <font color="blue">已审核</font>
                                    @endif
                                </td>
				<td>
					<a href="{{ url('admin/grqcedit')."/".$tmp->id }}" class="btn btn-info" target="rightFrame">修改</a>
					<a href="JavaScript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
<!--					<a href="{{ url('admin/grjpsh')."/".$tmp->id }}" class="btn btn-info" target="rightFrame">审核</a>-->
                                        <a data-toggle="modal" data-target="#myModal{{ $tmp->id }}" class="btn btn-info" target="mainFrame">审核</a>
				</td>
                                
                                <div class="modal fade" id="myModal{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:100%;">
                                <div class="modal-dialog" style="width:50%;margin: 0 auto;">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                &times;
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">
                                                            <center>专项教练审核</center>
                                                        </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading"></div>
                                                        <div class="panel-body">
                                                        <ul>
                                                            <li id="a"><label>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：{{ $tmp->name }}</label></li>
                                                            <li id="a"><label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</label>：@if($tmp->sex == 1) 男 @endif @if($tmp->sex == 0) 女 @endif</li>
                                                            <li id="a"><label>联系电话：</label>{{ $tmp->tel }}</li>
                                                            <li id="a"><label>身份证号：</label>{{ $tmp->sfzh }}</li>
                                                            <li id="a"><label>所在行业：</label>
                                                                @if($tmp->type == 1) 驾培服务 @endif
                                                                @if($tmp->type == 2) 汽车服务 @endif
                                                                @if($tmp->type == 3) 驾驶证服务 @endif
                                                            </li>
<!--                                                            <li id="a"><label>真实年龄：</label>{{ $tmp->older }}</li>
                                                            <li id="a"><label>价格/小时：</label>{{ $tmp->price }}</li>
                                                            <li id="a"><label>练习人数：</label> 
                                                            @if($tmp->lxrs == 1) 1人/车 @endif
                                                            @if($tmp->lxrs == 2) 2人/车 @endif
                                                            @if($tmp->lxrs == 3) 3人/车 @endif
                                                            @if($tmp->lxrs == 4) 4人/车 @endif
                                                            </li>-->
                                                            <li id="a"><label>发布日期：</label>{{ $tmp->fbdate }} </li>
                                                            <li id="a"><label>时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间：</label>
                                                            @if($tmp->time !== null) {{ $tmp->time }} @endif
                                                            @if($tmp->time1 !== null) {{ $tmp->time1 }} @endif
                                                            @if($tmp->time2 !== null) {{ $tmp->time2 }} @endif
                                                            @if($tmp->time3 !== null) {{ $tmp->time3 }} @endif
                                                            </li>
                                                            
                                                            
                                                            
                                                            @if($tmp->type == 2)
                                                            <li id="a"><label>详细地址：</label> {{ $tmp->address }}</li>
                                                            <li id="a"><label>服务地区：</label> {{ $tmp->fwdq }}</li>
                                                            @endif
                                                            
                                                            @if($tmp->type == 3)
                                                            <li id="a"><label>详细地址：</label> {{ $tmp->address }}</li>
                                                            <li id="a"><label>服务地区：</label> {{ $tmp->fwdq }}</li>
                                                            @endif
                                                            
                                                            @if($tmp->type == 1)
                                                            <li id="a"><label>教龄：</label> {{ $tmp->jlolder }}</li>
                                                            <li id="a"><label>所在驾校：</label> {{ $tmp->szjxname }}</li>
                                                            <li id="a"><label>驾校位置：</label> {{ $tmp->jxaddress }}</li>
                                                            @endif
                                                        </ul>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">附件</div>
                                                        <div class="panel-body">
                                                            <ul>
                                                                @if($tmp->type == 2)
                                                                <li class="hh"><a href="{{ asset('dppic')."/".$tmp->dppic }}" target="_blank"><img width="370px" height="270px" src="{{ asset('dppic')."/".$tmp->dppic }}"></a><p>店铺照片</p></li>
                                                                <li class="hh"><a href="{{ asset('grsfzpicz')."/".$tmp->grsfzpicz }}" target="_blank"><img width="370px" height="270px" src="{{ asset('grsfzpicz')."/".$tmp->grsfzpicz }}"></a><p>身份证正面</p></li>
                                                                <li class="hh"><a href="{{ asset('grsfzpicf')."/".$tmp->grsfzpicf }}" target="_blank"><img width="370px" height="270px" src="{{ asset('grsfzpicf')."/".$tmp->grsfzpicf }}"></a><p>身份证反面</p></li>
                                                                @endif
                                                                @if($tmp->type == 3)
                                                                <li class="hh"><a href="{{ asset('dppic')."/".$tmp->dppic }}" target="_blank"><img width="370px" height="270px" src="{{ asset('dppic')."/".$tmp->dppic }}"></a><p>店铺照片</p></li>
                                                                <li class="hh"><a href="{{ asset('grsfzpicz')."/".$tmp->grsfzpicz }}" target="_blank"><img width="370px" height="270px" src="{{ asset('grsfzpicz')."/".$tmp->grsfzpicz }}"></a><p>身份证正面</p></li>
                                                                <li class="hh"><a href="{{ asset('grsfzpicf')."/".$tmp->grsfzpicf }}" target="_blank"><img width="370px" height="270px" src="{{ asset('grsfzpicf')."/".$tmp->grsfzpicf }}"></a><p>身份证反面</p></li>
                                                                @endif
                                                                @if($tmp->type == 1)
                                                                <li class="hh"><a href="{{ asset('jlzpic')."/".$tmp->jlzpic }}" target="_blank"><img width="370px" height="270px" src="{{ asset('jlzpic')."/".$tmp->jlzpic }}"></a><p>教练证或工作证</p></li>
                                                                <li class="hh"><a href="{{ asset('sfzpicz')."/".$tmp->sfzpicz }}" target="_blank"><img width="370px" height="270px" src="{{ asset('sfzpicz')."/".$tmp->sfzpicz }}"></a><p>身份证正面</p></li>
                                                                <li class="hh"><a href="{{ asset('jszpicz')."/".$tmp->jszpicz }}" target="_blank"><img width="370px" height="270px" src="{{ asset('jszpicz')."/".$tmp->jszpicz }}"></a><p>驾驶证正面</p></li>
                                                                <li class="hh"><a href="{{ asset('jlcxszpic')."/".$tmp->jlcxszpic }}" target="_blank"><img width="370px" height="270px" src="{{ asset('jlcxszpic')."/".$tmp->jlcxszpic }}"></a><p>教练车行驶证正面</p></li>
                                                                <li class="hh"><a href="{{ asset('jlcpic')."/".$tmp->jlcpic }}" target="_blank"><img width="370px" height="270px" src="{{ asset('jlcpic')."/".$tmp->jlcpic }}"></a><p>教练车</p></li>
                                                                <li class="hh"><a href="{{ asset('grpic')."/".$tmp->grpic }}" target="_blank"><img width="370px" height="270px" src="{{ asset('grpic')."/".$tmp->grpic }}"></a><p>个人照片</p></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <form action="{{ url('admin/zxjlsh')."/".$tmp->id }}" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                        <input type="hidden" name="sh" value="1"/>
                                                        <input type="hidden" name="shid" value="{{ $tmp->id }}"/>
                                                        <input type="hidden" name="type" value="{{ $tmp->type }}"/>
                                                        <input type="hidden" name="nickname" value="{{ $tmp->nickname }}"/>
                                                        
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">填写审核信息</div>
                                                        <div class="panel-body">
                                                          <textarea class="form-control" rows="3" name="info" placeholder="请填写审核信息"></textarea>
                                                              <input type="radio" name="sha" id="optionsRadios1" checked value="1">
                                                                  通过&nbsp;&nbsp;&nbsp;
                                                              <input type="radio" name="sha" id="optionsRadios1" value="2">
                                                             未通过&nbsp;&nbsp;&nbsp;
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
                                                </div>
                                        </div><!-- /.modal-content -->
                                </div>
                                
                                
			</tr>
                        @endforeach
		</table>
            <center><div>{!! $items->appends($where)->render() !!}</div></center>
            <form action="{{ url('admin/grjpfw') }}" name="myform" method="post" style="display: none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            <script>
                function dodel(id){
                    var form = document.myform;
                    if(confirm("是否确定删除~")) {
                        form.action="{{ url('admin/grjpfw') }}" + "/" + id;
                        form.submit();
                    }
                }
                
                function dopxx(id){
                    var px = $("#px"+id+"").val();
                    dopx(px,"{{ url('admin/zxjlpx') }}",id);
                }
            </script>
	</div>
</div>

<script>
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
		$("#SelectAll").prop("checked",flag);
		});
});

</script>
</body>
</html>
