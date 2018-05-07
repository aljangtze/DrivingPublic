<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>审核通过-彭敬后台管理系统</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
        <script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>

    </head>

    <body>
        <div class="info_box">
            <!--导航-->
            <div class="yw_nav">
                <ol class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li class="active">投稿列表</li>
                </ol>
            </div>
            <form class="form-inline form_ss">
                <!--搜索查询条件-->
                <div class="search_nr" id="sscs">
                    <ul>
                        <form action="{{ url('admin/wytg') }}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <li>
                                <div class="input-group" >
                                    <input type="text" name="name" class="form-control" placeholder="请输入姓名" style="width:300px;" />
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
            </div>
            <input type="hidden" id="url" value="{{ url('admin/wytgsqdel') }}">
            <!--表格信息-->
            <div class="table_yw">
                <table class="table table-bordered">
                    <tr class="info">
                        <td>
                            <input type="checkbox" id="SelectAll"  />
                        </td>
                        <td>序号</td>
                        <td>姓名</td>
                        <td>联系电话</td>
                        <td>标题</td>
                        <td>内容</td>
                        <td>投稿日期</td>
                        <td>附件</td>
                        <td>处理状态</td>
                        <td>操作</td>
                    </tr>
                    @foreach($items as $tmp)
                    <tr>
                        <td>
                            <input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
                        </td>
                        <td>{{ $tmp->id }}</td>
                        <td>{{ $tmp->name }}</td>
                        <td>{{ $tmp->tel }}</td>
                        <td>{{ $tmp->title }}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $tmp->id }}">点击查看</button></td>
                        <td>{{ $tmp->addtime }}</td>
                        <td><a href="{{ asset('pic')."/".$tmp->pic }}"><img src="{{ asset('pic')."/s_".$tmp->pic }}"></a></td>
                        <td>
                            @if($tmp->cl == 1)
                            <font color="blue">已处理</font>
                            @endif
                            @if($tmp->cl == 2)
                            <font color="red">未处理</font>
                            @endif
                        </td>
                        <td>
                            <a href='{{ url("admin/wytg/$tmp->id/edit") }}' class="btn btn-info">处理</a>
                            <a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
                        </td>

                    <div style="margin-top:50px" class="modal fade" id="myModal{{ $tmp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        {{ $tmp->title }}
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    {{ $tmp->content }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                    </button>
<!--                                    <button type="button" class="btn btn-primary">
                                        提交更改
                                    </button>-->
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                    </tr>
                    @endforeach
                    <script>
function dodel(id) {
var form = document.myform;
if (confirm("是否确定删除~删除后不可恢复")) {
    form.action = "{{ url('admin/wytg') }}" + "/" + id;
    form.submit();
}
}
                    </script>
                    <form action="{{ url('admin/wytg') }}" name="myform" method="post" style="display: none">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </table>
                <center><div>{!! $items->appends($where)->render() !!}</div></center>
            </div>
        </div>

        <script>
            $(function () {
                $("#SelectAll").click(function () {
                    $("[name=subcheck]:checkbox").prop("checked", this.checked);
        //	$(".tb_operation").toggle();
                });
                $("[name=subcheck]:checkbox").click(function () {
                    var flag = true;
                    $("[name=subcheck]:checkbox").each(function () {
                        if (!this.checked) {
                            flag = false;
                        }
                    });
                    $("#all").prop("checked", flag);
                });
            });
        </script>
    </body>
</html>
