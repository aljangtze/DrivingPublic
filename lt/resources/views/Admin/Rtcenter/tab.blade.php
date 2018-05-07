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


    </head>

    <body>
        <div class="info_box">
            <!--导航-->
            <div class="yw_nav">
                <ol class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li class="active">会员列表</li>
                </ol>
            </div>
            <div class="panel panel-default" style="margin: 5px 10px 5px 15px">
                @include("Admin.Rtcenter.comm")
            </div>
            <form class="form-inline form_ss">
                <!--搜索查询条件-->
                <div class="search_nr" id="sscs">
                    <ul>
                        <li>
                            <div class="input-group" >
                                <input type="text" class="form-control" placeholder="输入关键词搜索" style="width:300px;" />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">搜索</button>
                                </span>
                            </div>
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
                        <td>头像</td>
                        <td>姓名</td>
                        <td>性别</td>
                        <td>电话</td>
                        <td>账号</td>
                        <td>密码</td>
                        <td>身份</td>
                        <td>开户行</td>
                        <td>银行卡号</td>
                        <td>现有资产</td>
                        <td>操作</td>
                    </tr>
                    @foreach($items as $tmp)
                    <tr>
                        <td>
                            <input type="checkbox" name="subcheck" value="1" />
                        </td>
                        <td>{{ $tmp->id }}</td>
                        <td><img width="80px" height="50px" src="{{ asset('pic')."/".$tmp->pic }}"></td>
                        <td>{{ $tmp->name }}</td>
                        <td>
                            @if($tmp->sex == 1) 男 @endif
                            @if($tmp->sex == 2) 女 @endif
                        </td>
                        <td>{{ $tmp->tel }}</td>
                        <td>{{ $tmp->nickname }}</td>
                        <td>{{ $tmp->pass }}</td>
                        <td>
                            @if($tmp->type == 1) <font color="blue">教练</font> @endif
                            @if($tmp->type == 2) 学员 @endif
                        </td>
                        <td>{{ $tmp->khh }}</td>
                        <td>{{ $tmp->yhkh }}</td>
                        <td><font color="red">￥{{ $tmp->integral }}</font></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $tmp->id }}">发消息</button>
                        </td>

                    <div style="margin-top: 50px" class="modal fade" id="myModal{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        发送消息给【@if($tmp->name == "") <font color="red">此用户还未完善基本信息</font> @else {{ $tmp->name }} @endif】
                                    </h4>
                                </div>
                                <form action="{{ url("admin/fsinfo") }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="nickname" value="{{ $tmp->nickname }}">
                                    <div class="modal-body">
                                        <textarea class="form-control" name="info" rows="3" placeholder="请输入消息内容....."></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <!--                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                                            </button>-->
                                        <button type="submit" class="btn btn-primary">
                                            发送
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
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 200px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="alert alert-warning" style="height: 50px;">
                        <h5>发送成功</h5>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script>
            $(function () {
            if ("{{ session('a') }}" !== ""){
            $('#myModal').modal({
            keyboard: true
            });
            setTimeout(function(){
            $("#myModal").modal("hide");
            }, 2000);
            }
            });
        </script>

        <script>
            $(function () {
            $("#SelectAll").click(function () {
            $("[name=subcheck]:checkbox").prop("checked", this.checked);
            $(".tb_operation").toggle();
            });
            $("[name=subcheck]:checkbox").click(function () {
            var flag = true;
            $("[name=subcheck]:checkbox").each(function () {
            if (!this.checked) {
            flag = false;
            }
            });
            $("#SelectAll").prop("checked", flag);
            });
            });

        </script>

    </body>
</html>
