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
        <script type="text/javascript" src="{{ asset('pj/js/pxdel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>

    </head>

    <body>
        <div class="info_box">
            <!--导航-->
            <div class="yw_nav">
                <ol class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li class="active">提现列表</li>
                </ol>
            </div>
            <div class="panel panel-default" style="margin: 5px 10px 5px 15px">
                @include("Admin.Rtcenter.comm")
            </div>
            <!--表格操作-->
            <div class="tb_operation" style="display:none;">
                <button type="button" class="btn btn-danger">全部删除</button>
            </div>

            <!--表格信息-->
            <form action="" method="post" name="myform" style="display: none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            <script>
function dodel(id) {
    dodell(id, "{{ url('admin/txgldel') }}");
}
            </script>
            <div class="table_yw">
                <div class="panel panel-default" style="margin: 5px 10px 5px 15px">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>姓名</th>
                                    <th>账号</th>
                                    <th>卡号</th>
                                    <th>提现金额</th>
                                    <th>状态</th>
                                    <th width="10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $tmp)
                                <tr>
                                    <td>{{ $tmp->id }}</td>
                                    <td>{{ $tmp->name }}</td>
                                    <td>{{ $tmp->nickname }}</td>
                                    <td>{{ $tmp->kh }}</td>
                                    <td><font color="red">￥</font>{{ $tmp->money }}</td>
                                    <td>
                                        @if($tmp->type == 1) <font color="#29a7e2">审核通过</font> @endif
                                        @if($tmp->type == 2) <font color="red">等待审核</font> @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $tmp->id }}">审核</button>
                                        <button type="button" onclick="dodel({{ $tmp->id }})" class="btn btn-danger">删除</button>
                                    </td>

                            <div style="margin-top: 100px" class="modal fade" id="myModal{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                提现审核
                                            </h4>
                                        </div>
                                        <form action="{{ url("admin/dotxgl")."/".$tmp->id }}" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="qf" value="11">
                                            <input type="hidden" name="nickname" value="{{ $tmp->nickname }}">
                                            <div class="modal-body">
                                                <textarea name="info" class="form-control" rows="3">尊敬的{{ $tmp->name }}先生/女士,您申请的提现金额{{ $tmp->money }}元，已审核通过。我们会尽快处理。</textarea>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 200px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="alert alert-warning" style="height: 50px;">
                        <h5>{{ session("a") }}</h5>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script>
            $(function () {
                if ("{{ session('a') }}" !== "") {
                    $('#myModal').modal({
                        keyboard: true
                    });
                    setTimeout(function () {
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
