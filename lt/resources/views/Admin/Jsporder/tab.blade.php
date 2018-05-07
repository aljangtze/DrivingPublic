<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>待审核-彭敬后台管理系统</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/zdy.css') }}">
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
                        <input type="hidden" id="url" value="{{ url('admin/jspordersqdel') }}">
                        @if(session()->has('error'))
                        <div class="alert alert-success" role="alert"><a href="#" class="alert-link"><font style="font-size: 14px">{{ session("error") }}</font></a></div>
                        @endif
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ url("admin/jsporder") }}" method="get" class="form-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="sexampleInputEmail2">练车时间</label>
                                <input type="text" name="a" class="form-control" id="exampleInputEmail2" placeholder="请输入练车时间">
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
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><font color="">全部【{{ $allcount }}】</font></a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> <font color="blue">已付款【{{ $yfkcount }}】</font></a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><font color="red">未付款【{{ $wfkcount }}】</font></a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><font color="green">已完成【{{ $ywccount }}】</font></a></li>
                        <li role="presentation"><a href="#yjd" aria-controls="settings" role="tab" data-toggle="tab"><font color="orange">已接单【{{ $yjdcount }}】</font></a></li>
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
                                    <td width="10%">练车时间</td>
                                    <td>价格/元</td>
                                    <td>所报科目</td>
                                    <td>练习模式</td>
                                    <td>练习地址</td>
                                    <td>联系电话</td>
                                    <td>支付方式</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>订单号</td>
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
                                    <td><font color="red">￥</font>{{ $tmp->b }}</td>
                                    <td>
                                        @if($tmp->d == 2) 科目二 @endif
                                        @if($tmp->d == 3) 科目三 @endif
                                    </td>
                                    <td>
                                        @if($tmp->e == 1) 场地联系 @endif
                                        @if($tmp->e == 2) 考试练习 @endif
                                    </td>
                                    <td>{{ $tmp->f }}</td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->i == 1) <font color="blue"> 已付款 </font> @endif
                                        @if($tmp->i == 2) <font color="red"> 未付款 </font> @endif
                                        @if($tmp->i == 3) <font color="green"> 已完成 </font> @endif
                                        @if($tmp->i == 4) <font color="orange"> 已接单 </font> @endif
                                    </td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->j }}</td>
                                    <td><a href="{{ asset("fp")."/".$tmp->fp }}"><img width="50px" height="50px" src="{{ asset("fp")."/".$tmp->fp }}"></a></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModal{{ $tmp->id }}" class="btn btn-info" target="mainFrame" style="margin-right: 5px">订单处理</a>
                                        <a data-toggle="modal" data-target="#myModal{{ $tmp->id }}{{ $tmp->id }}" class="btn btn-info" style="margin-right: 5px">上传发票</a>
                                        <a data-toggle="modal" data-target="#myModalzh{{ $tmp->id }}" class="btn btn-warning" style="margin-right: 5px" >查看账户</a>
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
                                            <form action="{{ url("admin/jsfp")."/".$tmp->id }}" enctype="multipart/form-data" method="post">
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
                                            <form action="{{ url('admin/jsporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="7">
                                                <input type="hidden" name="nickname" value="{{ $tmp->g }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->j }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="i" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="i" id="inlineRadio1" value="3"> 结单
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
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <table class="table table-bordered">
                                <tr class="info">
                                    <td>
                                        <input type="checkbox" id="SelectAll"  />
                                    </td>
                                    <td>序号</td>
                                    <td>练车时间</td>
                                    <td>价格/元</td>
                                    <td>所报科目</td>
                                    <td>练习模式</td>
                                    <td>练习地址</td>
                                    <td>联系电话</td>
                                    <td>支付方式</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>订单号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->i == 1)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subchecks" value="{{ $tmp->id }}" />
                                    </td>
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td><font color="red">￥</font>{{ $tmp->b }}</td>
                                    <td>
                                        @if($tmp->d == 2) 科目二 @endif
                                        @if($tmp->d == 3) 科目三 @endif
                                    </td>
                                    <td>
                                        @if($tmp->e == 1) 场地联系 @endif
                                        @if($tmp->e == 2) 考试练习 @endif
                                    </td>
                                    <td>{{ $tmp->f }}</td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->i == 1) <font color="blue"> 已付款 </font> @endif
                                        @if($tmp->i == 2) <font color="red"> 未付款 </font> @endif
                                        @if($tmp->i == 3) <font color="green"> 已完成 </font> @endif
                                        @if($tmp->i == 4) <font color="orange"> 已接单 </font> @endif
                                    </td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->j }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModala{{ $tmp->id }}" class="btn btn-info" target="mainFrame">订单处理</a>
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
                                            <form action="{{ url('admin/jsporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="7">
                                                <input type="hidden" name="nickname" value="{{ $tmp->g }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->j }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="i" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="i" id="inlineRadio1" value="3"> 结单
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
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <table class="table table-bordered">
                                <tr class="info">
                                    <td>
                                        <input type="checkbox" id="SelectAll"  />
                                    </td>
                                    <td>序号</td>
                                    <td>练车时间</td>
                                    <td>价格/元</td>
                                    <td>所报科目</td>
                                    <td>练习模式</td>
                                    <td>练习地址</td>
                                    <td>联系电话</td>
                                    <td>支付方式</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>订单号</td>
                                    <td width="20%">操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->i == 2)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subchecks" value="{{ $tmp->id }}" />
                                    </td>
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td><font color="red">￥</font>{{ $tmp->b }}</td>
                                    <td>
                                        @if($tmp->d == 2) 科目二 @endif
                                        @if($tmp->d == 3) 科目三 @endif
                                    </td>
                                    <td>
                                        @if($tmp->e == 1) 场地联系 @endif
                                        @if($tmp->e == 2) 考试练习 @endif
                                    </td>
                                    <td>{{ $tmp->f }}</td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->i == 1) <font color="blue"> 已付款 </font> @endif
                                        @if($tmp->i == 2) <font color="red"> 未付款 </font> @endif
                                        @if($tmp->i == 3) <font color="green"> 已完成 </font> @endif
                                        @if($tmp->i == 4) <font color="orange"> 已接单 </font> @endif
                                    </td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->j }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModalb{{ $tmp->id }}" class="btn btn-info" target="mainFrame">订单处理</a>
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
                                            <form action="{{ url('admin/jsporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="7">
                                                <input type="hidden" name="nickname" value="{{ $tmp->g }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->j }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="i" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="i" id="inlineRadio1" value="3"> 结单
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
                        <div role="tabpanel" class="tab-pane" id="settings">
                            <table class="table table-bordered">
                                <tr class="info">
                                    <td>
                                        <input type="checkbox" id="SelectAll"  />
                                    </td>
                                    <td>序号</td>
                                    <td>练车时间</td>
                                    <td>价格/元</td>
                                    <td>所报科目</td>
                                    <td>练习模式</td>
                                    <td>练习地址</td>
                                    <td>联系电话</td>
                                    <td>支付方式</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>订单号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->i == 3)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subchecks" value="{{ $tmp->id }}" />
                                    </td>
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td><font color="red">￥</font>{{ $tmp->b }}</td>
                                    <td>
                                        @if($tmp->d == 2) 科目二 @endif
                                        @if($tmp->d == 3) 科目三 @endif
                                    </td>
                                    <td>
                                        @if($tmp->e == 1) 场地联系 @endif
                                        @if($tmp->e == 2) 考试练习 @endif
                                    </td>
                                    <td>{{ $tmp->f }}</td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->i == 1) <font color="blue"> 已付款 </font> @endif
                                        @if($tmp->i == 2) <font color="red"> 未付款 </font> @endif
                                        @if($tmp->i == 3) <font color="green"> 已完成 </font> @endif
                                        @if($tmp->i == 4) <font color="orange"> 已接单 </font> @endif
                                    </td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->j }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModalc{{ $tmp->id }}" class="btn btn-info" target="mainFrame">订单处理</a>
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
                                            <form action="{{ url('admin/jsporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="7">
                                                <input type="hidden" name="nickname" value="{{ $tmp->g }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->j }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="i" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="i" id="inlineRadio1" value="3"> 结单
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
                        <div role="tabpanel" class="tab-pane" id="yjd">
                            <table class="table table-bordered">
                                <tr class="info">
                                    <td>
                                        <input type="checkbox" id="SelectAll"  />
                                    </td>
                                    <td>序号</td>
                                    <td>练车时间</td>
                                    <td>价格/元</td>
                                    <td>所报科目</td>
                                    <td>练习模式</td>
                                    <td>练习地址</td>
                                    <td>联系电话</td>
                                    <td>支付方式</td>
                                    <td>订单状态</td>
                                    <td>下单账号</td>
                                    <td>订单号</td>
                                    <td>操作</td>
                                </tr>
                                @foreach($items as $tmp)
                                @if($tmp->i == 4)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subchecks" value="{{ $tmp->id }}" />
                                    </td>
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->a }}</td>
                                    <td><font color="red">￥</font>{{ $tmp->b }}</td>
                                    <td>
                                        @if($tmp->d == 2) 科目二 @endif
                                        @if($tmp->d == 3) 科目三 @endif
                                    </td>
                                    <td>
                                        @if($tmp->e == 1) 场地联系 @endif
                                        @if($tmp->e == 2) 考试练习 @endif
                                    </td>
                                    <td>{{ $tmp->f }}</td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->h }}</td>
                                    <td>
                                        @if($tmp->i == 1) <font color="blue"> 已付款 </font> @endif
                                        @if($tmp->i == 2) <font color="red"> 未付款 </font> @endif
                                        @if($tmp->i == 3) <font color="green"> 已完成 </font> @endif
                                        @if($tmp->i == 4) <font color="orange"> 已接单 </font> @endif
                                    </td>
                                    <td>{{ $tmp->g }}</td>
                                    <td>{{ $tmp->j }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModald{{ $tmp->id }}" class="btn btn-info" target="mainFrame">订单处理</a>
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
                                            <form action="{{ url('admin/jsporder') }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $tmp->id }}">
                                                <input type="hidden" name="shid" value="{{ $tmp->id }}">
                                                <input type="hidden" name="type" value="7">
                                                <input type="hidden" name="nickname" value="{{ $tmp->g }}">
                                                <div class="modal-body">
                                                    <div class="page-header">
                                                        <h4>处理单号： <small>{{ $tmp->j }}</small></h4>
                                                    </div>
                                                    <textarea class="form-control" rows="3" name="info" placeholder="">亲爱的~{{ $tmp->m }}客户，您好！</textarea>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="i" id="inlineRadio1" checked value="4"> 接单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" name="i" id="inlineRadio1" value="3"> 结单
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
                    </div>
                    <center><div>{!! $items->render() !!}</div></center>
                </div>
            </div>
        </div>
        <form action="{{ url('admin/jsporder') }}" method="post" name="myform" style="display: none">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
        </form>
        <script>
            function dodel(id) {
            dodell(id, "{{ url('admin/jsporder') }}");
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
