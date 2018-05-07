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
        <script type="text/javascript" src="{{ asset('pj/js/pxdel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>
        <script>
$(function(){

if ({{ session() -> has("error") }}) {
setTimeout(function(){
window.location.reload();
}, 3000); //等待2s执行一次
}


});</script>

    </head>

    <body>

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button type="button" class="btn btn-danger" id="sqdel">全部删除</button>
                        <input type="hidden" id="url" value="{{ url('admin/jpordersqdel') }}">
                        @if(session()->has('error'))
                        <div class="alert alert-success" role="alert"><a href="#" class="alert-link"><font style="font-size: 14px">{{ session("error") }}</font></a></div>
                        @endif
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ url("admin/jporder") }}" method="get" class="form-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="sexampleInputEmail2">驾校名称</label>
                                <input type="text" name="a" class="form-control" id="exampleInputEmail2" placeholder="请输入驾校名称">
                            </div>
                            <div class="form-group">
                                <!--<label for="sexampleInputEmail2">驾校名称</label>-->
                                <button type="submit" class="form-control"><span class="glyphicon glyphicon-search">查询</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部<font color="#29a7e2">【{{ $allcount }}】</font></a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已付款<font color="blue">【{{ $yfkcount }}】</font></a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">未付款<font color="red">【{{ $wfkcount }}】</font></a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">已完成<font color="green">【{{ $ywccount }}】</font></a></li>
                        <li role="presentation"><a href="#yjd" aria-controls="settings" role="tab" data-toggle="tab">已接单<font color="orange">【{{ $yjdcount }}】</font></a></li>
                    </ul>

                    <!-- 全部订单 -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="home">
                            <table class="table table-bordered">
                                <tr class="info">
                                    <td>
                                        <input type="checkbox" id="SelectAll"  />
                                    </td>
                                    <td>序号</td>
                                    <td>驾校名称</td>
                                    <td>所报班型</td>
                                    <td>价格</td>
                                    <td>支付方式</td>
                                    <td>付款方式</td>
                                    <td>订单号</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>发票</td>
                                    <td width="20%">操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
                                    </td>
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td>@if($tmp->b == 1) vip班 @endif  @if($tmp->b == 2) 普通班 @endif</td>
                                    <td><font color="red">￥</font>{{ $tmp->e }}</td>
                                    <td>@if($tmp->f == "微信支付") 微信支付 @endif @if($tmp->f == "支付宝支付") 支付宝支付 @endif</td>
                                    <td>@if($tmp->g == 1) 全额付款 @endif  @if($tmp->g == 2) 预约金 @endif</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->j == 1)<font color="blue">已付款</font> @endif @if($tmp->j == 2)<font color="red"> 未付款</font> @endif
                                        @if($tmp->j == 3)<font color="green"> 已完成</font> @endif @if($tmp->j == 4)<font color="orange"> 已接单</font> @endif
                                    </td>
                                    <td>{{ $tmp->m }}</td>
                                    <td><a href="{{ asset("fp")."/".$tmp->fp }}"><img width="50px" height="50px" src="{{ asset("fp")."/".$tmp->fp }}"></a></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModal{{ $tmp->id }}" class="btn btn-info" style="margin-right: 5px">订单处理</a>
                                        <a data-toggle="modal" data-target="#myModal{{ $tmp->id }}{{ $tmp->id }}" class="btn btn-info" style="margin-right: 5px">上传发票</a>
                                        <a data-toggle="modal" data-target="#myModalzh{{ $tmp->id }}" class="btn btn-warning" style="margin-right: 5px">查看账户</a>
                                        <a onclick="dodel({{ $tmp->id }})" class="btn btn-danger" style="margin-right: 5px">删除</a>
                                    </td>

                                <div style="margin-top:100px" class="modal fade" id="myModal{{ $tmp->id }}{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    上传发票
                                                </h4>
                                            </div>
                                            <form action="{{ url("admin/jpfp")."/".$tmp->id }}" enctype="multipart/form-data" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="mypf" value="{{ $tmp->fp }}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">发票</label>
                                                        <input type="file" name="fp" id="exampleInputFile">

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

                                <div style="margin-top:100px" class="modal fade" id="myModalzh{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    账户信息
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:<font style="color: #29a7e2">&nbsp;&nbsp;{{ $zhinfo[$tmp->id]->name }}</font></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">开户银行:<font style="color: #29a7e2">&nbsp;&nbsp;{{ $zhinfo[$tmp->id]->khh }}</font></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">开户账号:<font style="color: #29a7e2">&nbsp;&nbsp;{{ $zhinfo[$tmp->id]->yhkh }}</font></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>

                                <div class="modal fade" id="myModal{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    订单处理
                                                </h4>
                                            </div>
                                            <form action="{{ url('admin/jporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="nickname" value="{{ $tmp->m }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->h }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="j" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="j" id="inlineRadio1" value="3"> 结单
                                                    </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        提交
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!--已付款-->
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <table class="table table-bordered">
                                <tr class="info">
        <!--				<td>
                                                <input type="checkboxa" id="SelectAll"  />
                                        </td>-->
                                    <td>序号</td>
                                    <td>驾校名称</td>
                                    <td>所报班型</td>
                                    <td>价格</td>
                                    <td>支付方式</td>
                                    <td>付款方式</td>
                                    <td>订单号</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->j ==1 )
                                <tr>
        <!--				<td>
                                                <input type="checkboxa" name="subchecka" value="1" />
                                        </td>-->
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td>@if($tmp->b == 1) vip班 @endif  @if($tmp->b == 2) 普通班 @endif</td>
                                    <td><font color="red">￥</font>{{ $tmp->e }}</td>
                                    <td>@if($tmp->f == "微信支付") 微信支付 @endif @if($tmp->f == "支付宝支付") 支付宝支付 @endif</td>
                                    <td>@if($tmp->g == 1) 全额付款 @endif  @if($tmp->g == 2) 预约金 @endif</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->j == 1)<font color="blue">已付款</font> @endif @if($tmp->j == 2)<font color="red"> 未付款</font> @endif
                                        @if($tmp->j == 3)<font color="green"> 已完成</font> @endif @if($tmp->j == 4)<font color="orange"> 已接单</font> @endif
                                    </td>
                                    <td>{{ $tmp->m }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModalb{{ $tmp->id }}" class="btn btn-info">订单处理</a>
                                        <a onclick="dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
                                    </td>
                                <div class="modal fade" id="myModalb{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    订单处理
                                                </h4>
                                            </div>
                                            <form action="{{ url('admin/jporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="nickname" value="{{ $tmp->m }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->h }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="j" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="j" id="inlineRadio1" value="3"> 结单
                                                    </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        提交
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                        <!--未付款-->
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <table class="table table-bordered">
                                <tr class="info">
        <!--				<td>
                                                <input type="checkbox" id="SelectAll"  />
                                        </td>-->
                                    <td>序号</td>
                                    <td>驾校名称</td>
                                    <td>所报班型</td>
                                    <td>价格</td>
                                    <td>支付方式</td>
                                    <td>付款方式</td>
                                    <td>订单号</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->j ==2 )
                                <tr>
        <!--				<td>
                                                <input type="checkbox" name="subcheck" value="1" />
                                        </td>-->
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td>@if($tmp->b == 1) vip班 @endif  @if($tmp->b == 2) 普通班 @endif</td>
                                    <td><font color="red">￥</font>{{ $tmp->e }}</td>
                                    <td>@if($tmp->f == "微信支付") 微信支付 @endif @if($tmp->f == "支付宝支付") 支付宝支付 @endif</td>
                                    <td>@if($tmp->g == 1) 全额付款 @endif  @if($tmp->g == 2) 预约金 @endif</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->j == 1)<font color="blue">已付款</font> @endif @if($tmp->j == 2)<font color="red"> 未付款</font> @endif
                                        @if($tmp->j == 3)<font color="green"> 已完成</font> @endif @if($tmp->j == 4)<font color="orange"> 已接单</font> @endif
                                    </td>
                                    <td>{{ $tmp->m }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModala{{ $tmp->id }}" class="btn btn-info">订单处理</a>
                                        <a onclick="dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
                                    </td>
                                <div class="modal fade" id="myModala{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    订单处理
                                                </h4>
                                            </div>
                                            <form action="{{ url('admin/jporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="nickname" value="{{ $tmp->m }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->h }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="j" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="j" id="inlineRadio1" value="3"> 结单
                                                    </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        提交
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                        <!--已完成-->
                        <div role="tabpanel" class="tab-pane" id="settings">
                            <table class="table table-bordered">
                                <tr class="info">
        <!--				<td>
                                                <input type="checkbox" id="SelectAll"  />
                                        </td>-->
                                    <td>序号</td>
                                    <td>驾校名称</td>
                                    <td>所报班型</td>
                                    <td>价格</td>
                                    <td>支付方式</td>
                                    <td>付款方式</td>
                                    <td>订单号</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->j ==3 )
                                <tr>
        <!--				<td>
                                                <input type="checkbox" name="subcheck" value="1" />
                                        </td>-->
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td>@if($tmp->b == 1) vip班 @endif  @if($tmp->b == 2) 普通班 @endif</td>
                                    <td><font color="red">￥</font>{{ $tmp->e }}</td>
                                    <td>@if($tmp->f == "微信支付") 微信支付 @endif @if($tmp->f == "支付宝支付") 支付宝支付 @endif</td>
                                    <td>@if($tmp->g == 1) 全额付款 @endif  @if($tmp->g == 2) 预约金 @endif</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->j == 1)<font color="blue">已付款</font> @endif @if($tmp->j == 2)<font color="red"> 未付款</font> @endif
                                        @if($tmp->j == 3)<font color="green"> 已完成</font> @endif @if($tmp->j == 4)<font color="orange"> 已接单</font> @endif
                                    </td>
                                    <td>{{ $tmp->m }}</td>
                                    <td>
                                        <!--<a data-toggle="modal" data-target="#myModalc{{ $tmp->id }}" class="btn btn-info">订单处理</a>-->
                                        <a onclick="dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
                                    </td>
                                <div class="modal fade" id="myModalc{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    订单处理
                                                </h4>
                                            </div>
                                            <form action="{{ url('admin/jporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="nickname" value="{{ $tmp->m }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->h }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="j" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="j" id="inlineRadio1" value="3"> 结单
                                                    </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        提交
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                        <!--已接单-->
                        <div role="tabpanel" class="tab-pane" id="yjd">
                            <table class="table table-bordered">
                                <tr class="info">
        <!--				<td>
                                                <input type="checkbox" id="SelectAll"  />
                                        </td>-->
                                    <td>序号</td>
                                    <td>驾校名称</td>
                                    <td>所报班型</td>
                                    <td>价格</td>
                                    <td>支付方式</td>
                                    <td>付款方式</td>
                                    <td>订单号</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->j ==4 )
                                <tr>
        <!--				<td>
                                                <input type="checkbox" name="subcheck" value="1" />
                                        </td>-->
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td>@if($tmp->b == 1) vip班 @endif  @if($tmp->b == 2) 普通班 @endif</td>
                                    <td><font color="red">￥</font>{{ $tmp->e }}</td>
                                    <td>@if($tmp->f == "微信支付") 微信支付 @endif @if($tmp->f == "支付宝支付") 支付宝支付 @endif</td>
                                    <td>@if($tmp->g == 1) 全额付款 @endif  @if($tmp->g == 2) 预约金 @endif</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->j == 1)<font color="blue">已付款</font> @endif @if($tmp->j == 2)<font color="red"> 未付款</font> @endif
                                        @if($tmp->j == 3)<font color="green"> 已完成</font> @endif @if($tmp->j == 4)<font color="orange"> 已接单</font> @endif
                                    </td>
                                    <td>{{ $tmp->m }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModald{{ $tmp->id }}" class="btn btn-info">订单处理</a>
                                        <a onclick="dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
                                    </td>
                                <div class="modal fade" id="myModald{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    订单处理
                                                </h4>
                                            </div>
                                            <form action="{{ url('admin/jporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="4">
                                                <input type="hidden" name="nickname" value="{{ $tmp->m }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->h }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="j" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="j" id="inlineRadio1" value="3"> 结单
                                                    </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        提交
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal -->
                                </div>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                        <center><div>{!! $items->render() !!}</div></center>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ url('admin/jporder') }}" method="post" name="myform" style="display: none">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
        </form>
        <script>
            function dodel(id) {
            dodell(id, "{{ url('admin/jporder') }}");
            }
        </script>
        <script>
            $(function() {
            $("#SelectAll").click(function(){
            $("[name=subcheck]:checkbox").prop("checked", this.checked);
            $(".tb_operation").toggle();
            });
            $("[name=subcheck]:checkbox").click(function(){
            var flag = true;
            $("[name=subcheck]:checkbox").each(function(){
            if (!this.checked){
            flag = false;
            }
            });
            $("#SelectAll").prop("checked", flag);
            });
            });

        </script>
    </body>
</html>
