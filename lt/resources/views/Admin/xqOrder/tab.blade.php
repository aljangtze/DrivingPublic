<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                    <li class="active">需求接单列表</li>
                </ol>
            </div>
            <!--查找-->
            <form class="form-inline form_ss">
                <!--搜索查询条件-->
                <div class="search_nr" id="sscs">
                    <ul>
                        <form action="{{ url('admin/xqordersqdel') }}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <li>
                                <div class="input-group" >
                                    <input type="text" class="form-control" name="name" placeholder="请输入接单人姓名" style="width:300px;" />
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
            <!--表格信息-->
            <input type="hidden" id="url" value="{{ url('admin/xqordersqdel') }}">
            <div class="table_yw" style="width:98%;margin:0 auto;">
                <table class="table table-bordered">
                    <tr class="info">
                        <td>
                            <input type="checkbox" id="SelectAll"  />
                        </td>
                        <td>序号</td>
                        <td>接单人</td>
                        <!--<td>接单人性别</td>-->
                        <td>接单人电话</td>
                        <td>学员姓名</td>
                        <!--<td>学员性别</td>-->
                        <td>学员电话</td>
                        <td>标题</td>
                        <td>练车时间</td>
                        <td>练车位置</td>
                        <td>项目</td>
                        <td>类型</td>
                        <td>车型</td>
                        <td>受理状态</td>
                        <td>支付状态</td>
                        <td>支付方式</td>
                        <td>下单时间</td>
                        <td width="10%">操作</td>
                    </tr>
                    @foreach($items as $tmp)
                    <tr>
                        <td>
                            <input type="checkbox" name="subcheck" value="{{ $tmp->id }}" />
                        </td>
                        <td>{{ $tmp->id }}</td>
                        <td>{{ $tmp->name }}</td>
<!--                                <td>
                            @if($tmp->sex == 1) 男 @endif
                            @if($tmp->sex == 0) 女 @endif
                        </td>-->
                        <td>{{ $tmp->tel }}</td>
                        <td>{{ $tmp->xname }}</td>
<!--                                <td>
                            @if($tmp->xsex == 1) 男 @endif
                            @if($tmp->xsex == 0) 女 @endif
                        </td>-->
                        <td>{{ $tmp->xtel }}</td>
                        <td>{{ $tmp->title }}</td>
                        <td>{{ $tmp->lctime }}</td>
                        <td>{{ $tmp->lcaddress }}</td>
                        <td>
                            @if($tmp->selitem == 1) 科目一 @endif
                            @if($tmp->selitem == 2) 科目二 @endif
                            @if($tmp->selitem == 3) 科目三 @endif
                            @if($tmp->selitem == 4) 科目四 @endif
                            @if($tmp->selitem == 5) 定制报名 @endif
                        </td>
                        <td>
                            @if($tmp->itemtype == 1) 场地练习 @endif
                            @if($tmp->itemtype == 2) 考试车练习 @endif
                            @if($tmp->itemtype1 == 3) 考试路训 @endif
                            @if($tmp->itemtype1 == 4) 长途路训 @endif
                            @if($tmp->itemtype1 == 5) 考试路训(考试车) @endif
                        </td>
                        <td>{{ $tmp->cartype }}</td>
                        <td>
                            @if($tmp->zt == 2) <font color="red">未受理</font> @endif
                        </td>
                        <td>{{ $tmp->payzt }}</td>
                        <td>{{ $tmp->paytype }}</td>
                        <td>{{ $tmp->jddate }}</td>
                        <td>
                            <!--<a href="zhxg.html" class="btn btn-info">修改</a>-->
                            <!--<a data-toggle="modal" data-target="#myModalzh{{ $tmp->id }}" class="btn btn-warning" style="margin-right: 5px" >查看账户</a>-->
                            <a href="javascript:dodel({{ $tmp->id }})" class="btn btn-danger">删除</a>
                        </td>

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
                    </tr>
                    @endforeach
                </table>
                <center><div>{!! $items->appends($where)->render() !!}</div></center>
            </div>
        </div>
        <form action="{{ url('admin/xqorder') }}" method="post" name="myform" style="display: none">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
        </form>
        <script>
function dodel(id) {
    dodell(id, "{{ url('admin/xqorder') }}");
}
        </script>
        <script>
            //复选框事件
            $(function () {
                $("#SelectAll").click(function () {
                    $("[name=subcheck]:checkbox").prop("checked", this.checked);
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

            $(function () {
                var currYear = (new Date()).getFullYear();
                var opt = {};
                opt.date = {preset: 'date'};
                opt.datetime = {preset: 'datetime'};
                opt.time = {preset: 'time'};
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
