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
                    <li class="active">群发消息</li>
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
                <input type="hidden" name="_method" value="delete">
            </form>
            <script>
                function dodel(id) {
                    dodell(id,"{{ url('admin/rtcenter') }}");
                }
            </script>
            <div class="table_yw">
                <div class="panel panel-default" style="margin: 5px 10px 5px 15px">
                    <div class="panel-body">
                        @foreach($items as $tmp)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div style="width: 100px;height:100px;border:1px solid #ccc;border-radius:50%;float: left;"><p style="margin-top: 30px;text-align: center;font-weight: bold;">{{ $tmp->fbdate }}</p></div>
                                <div class="panel panel-default" style="margin-left: 120px;min-height: 100px">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><font style="font-size: 14px;">发送方：{{ session()->get("Adminuser") }}</font> <font style="font-size: 14px;margin-left: 20px">接收方:{{ $tmp->nickname }}</font><a href="javascript:dodel({{ $tmp->id }})"><font style="font-size: 14px;margin-left: 20px;color:red"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除</font></a></h5>
                                    </div>
                                    <div class="panel-body">
                                        {!!$tmp->content!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                   <div style="">{!! $items->appends($where)->render() !!}</div>
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
