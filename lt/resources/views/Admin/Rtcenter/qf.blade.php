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
        <!--<script type="text/javascript" src="{{ asset('pj/js/qfxx.js') }}"></script>-->
        <!-- 加载编辑器的容器 -->

        <!-- 配置文件 -->
        <script type="text/javascript" src="{{ asset('at/editor/ueditor.config.js') }}"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="{{ asset('at/editor/ueditor.all.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('at/editor/lang/zh-cn/zh-cn.js') }}"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
// var ue = UE.getEditor('container');
var editor = UE.getEditor('content', {
//focus时自动清空初始化时的内容  
autoClearinitialContent:false,
        //关闭elementPath,左下方元素路径  
        elementPathEnabled:false,
        //默认的编辑区域高度  
        initialFrameHeight:400,
        autoHeightEnabled:false
});
        </script>

    </head>

    <body>
        <div class="info_box">
            <!--导航-->
            <div class="yw_nav">
                <ol class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li class="active">新建群发</li>
                </ol>
            </div>
            <div class="panel panel-default" style="margin: 5px 10px 5px 15px">
                @include("Admin.Rtcenter.comm")
            </div>
            <!--表格操作-->

            <!--表格信息-->
            <div class="table_yw">
                <div class="panel panel-default" style="margin: 5px 10px 5px 15px">
                    <div class="panel-body">
                        <div class="panel panel-default" style="height:640px;width: 49%;float: left;margin-right: 1%;overflow-y: auto;">
                            <div class="panel-body">
                                <table class="table table-bordered" >
                                    <tr class="info">
                                        <td width="2%">
                                            <input type="checkbox" id="SelectAll"  />
                                        </td>
                                        <td>姓名</td>
                                    </tr>
                                    @foreach($items as $tmp)
                                    <tr>
                                        <td width="2%">
                                            <input type="checkbox" onclick="doselxx()" name="subcheck" value="{{ $tmp->nickname }}" />
                                        </td>
                                        <td>@if($tmp->name == "") <font color="red">用户还未完善基本信息</font> @else {{ $tmp->name }}@endif</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-default" style="height:640px;width: 49%;float: left;margin-right: 1%;overflow-y: auto;">
                            <div class="panel-body">
                                <form action="{{ url("admin/fsqf") }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="str" id="str" value="">
                                    <textarea id="content" style="width:100%;height:550x" name="content" style="margin-left:85px;"></textarea>
                                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                <button type="submit" class="btn btn-primary" style="margin-top: 20px;">发送</button>
                                </form>
                            </div>
                        </div>
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
        $(function() {
            var url = $("#url").val();

                $("#SelectAll").click(function(){
                        $("[name=subcheck]:checkbox").prop("checked",this.checked);

                        var box = $("input[name='subcheck']");
                                length = box.length;
                                var str = "";
                                for(var i=0;i<length;i++) {
                                    if(box[i].checked == true) {
                                        str = str + "," + box[i].value;
                                    }
                                }
                                $("#str").val(str);
                });

        });
        
        function doselxx() {
            $("[name=subcheck]:checkbox").click(function(){
		var flag=true;
		$("[name=subcheck]:checkbox").each(function(){
			if(!this.checked){
				flag=false;
			}
		});
		$("#all").prop("checked",flag);
		});
                
                    var box = $("input[name='subcheck']");
                    length = box.length;
                    var str = "";
                    for(var i=0;i<length;i++) {
                        if(box[i].checked == true) {
                            str = str + "," + box[i].value;
                        }
                    }
                    $("#str").val(str);
                    if(str == "") {
                    alert("请选择需要删除的数据~"); 
                 } 
        }
        </script>
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
