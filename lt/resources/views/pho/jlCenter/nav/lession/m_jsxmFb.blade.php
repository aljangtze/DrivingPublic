@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
        <title>即时学车发布-新司机网</title>
    </head>

    <body>
        <!--头部-->
    <header class="header">	
        <a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">即时学车发布</p>
    </header>
    <!--VIP班发布内容-->
    <ul class="xx_ul">
        <!--	<li>
                <a href="{{ url('tel/lessionone')."/".session()->get("Teluser") }}">科目一发布 <em>></em></a>
            </li>-->
        <li>
            <a href="{{ url('jtel/lessiontwo')."/".session()->get("jTeluser") }}">科目二发布 <em>></em></a>
        </li>
        <li>
            <a href="{{ url('jtel/lessionthree')."/".session()->get("jTeluser") }}">科目三发布 <em>></em></a>
        </li>
        <!--	<li>
                <a href="{{ url('tel/lessionfour')."/".session()->get("Teluser") }}">科目四发布 <em>></em></a>
            </li>-->
    </ul>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:100px;height:200px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        温馨提醒
                    </h4>
                </div>
                <div class="modal-body" style="min-height:20px">
                    请先完善您的基本信息来发发布吧！
                </div>
                <div class="modal-footer">
                    <!--                    <button type="button" class="btn btn-default" 
                                                data-dismiss="modal">关闭
                                        </button>-->
                    <button onclick="location.href ='{{ url("tel/jlinfo")."/".session()->get("Teluser")."/"."1" }}'" type="button" class="btn btn-primary">
                        去完善基本信息
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:100px;height:200px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        温馨提醒
                    </h4>
                </div>
                <div class="modal-body" style="min-height:20px">
                    您还没有成为专项训练商家，请先到会员中点成为商家，进行商家认证!或者直接点击下方按钮认证成为商家吧！
                </div>
                <div class="modal-footer">
                    <!--                    <button type="button" class="btn btn-default" 
                                                data-dismiss="modal">关闭
                                        </button>-->
                    <button onclick="location.href ='{{ url("tel/cwsj")."/".session()->get("Teluser") }}'" type="button" class="btn btn-primary">
                        去认证
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="myModalaa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:100px;height:200px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        温馨提醒
                    </h4>
                </div>
                <div class="modal-body" style="min-height:20px">
                    您已经申请成为专项训练的商家，您提交的信息正在审核中...请耐心等待！
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" 
                            data-dismiss="modal">关闭
                    </button>
                    <!--                    <button onclick="location.href='{{ url("tel/cwsj")."/".session()->get("Teluser") }}'" type="button" class="btn btn-primary">
                                            去认证
                                        </button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        $(function () {
        $.ajax({
        url: "{{ url('tel/sfhs') }}" + "/" + "1",
                type: "get",
                async: true,
                dataType: "json",
                success: function (data) {
                if (data == 1) {
                $(function () {
                $('#myModal').modal({
                keyboard: true
                })
                });
                }
                if (data == 2) {
                $(function () {
                $('#myModala').modal({
                keyboard: true
                })
                });
                }
                if (data == 3) {
                $(function () {
                $('#myModalaa').modal({
                keyboard: true
                })
                });
                }
                }
        });
        });
    </script>
</body>
</html>
@endsection
