<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>待审核-彭敬后台管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/zdy.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>


</head>

<body>
    
<div class="panel panel-default">
  <div class="panel-body">
    <div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已付款</a></li>
      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">未付款</a></li>
      <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">已完成</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <table class="table table-bordered">
			<tr class="info">
				<td>
					<input type="checkbox" id="SelectAll"  />
				</td>
				<td>序号</td>
				<td>图片</td>
				<td>驾校名称</td>
				<td>所报班型</td>
				<td>价格</td>
				<td>付款类型</td>
				<td>付款方式</td>
				<td>订单号</td>
				<td>订单状态</td>
				<td>下单账号</td>
				<td>行业</td>
				<td>操作</td>
			</tr>
                        @foreach($items as $tmp)
			<tr>
				<td>
					<input type="checkbox" name="subcheck" value="1" />
				</td>
				<td>{{ $tmp->id }}</td>
				<td><img src="{{ asset('jlcpic')."/".$tmp->i }}"></td>
				<td>小宋</td>
				<td>男</td>
				<td>18212345678</td>
				<td>云A66666</td>
				<td>东风广场分部</td>
				<td>勇敢队</td>
				<td>小张</td>
				<td>蚂蚁雄兵</td>
				<td>A1234561212</td>
				<td>
					<a href="ddxg.html" class="btn btn-info" target="mainFrame">修改</a>
					<a class="btn btn-danger">删除</a>
				</td>
			</tr>
                        @endforeach
		</table>
        </div>
      <div role="tabpanel" class="tab-pane" id="profile">2</div>
      <div role="tabpanel" class="tab-pane" id="messages">3</div>
      <div role="tabpanel" class="tab-pane" id="settings">4</div>
    </div>

  </div>
  </div>
</div>
<script>
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
		$("#SelectAll").prop("checked",flag);
		});
});

</script>
</body>
</html>
