<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>管理账户-彭敬后台管理系统</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
        <script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pj/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pj/js/plsc.js') }}"></script>

    </head>

    <body>
        <div class="panel panel-default" style="margin: 10px 10px 10px 10px">
            <div class="panel-heading">
                <h3 class="panel-title">使用说明设置</h3>
            </div>
            <div class="panel-body">
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle" style="width:70px; height:70px;overflow:hidden">
                                <a href="#">
                                    <img width="60px" height="60px"class="img-circle" src="{{ asset("pj/images/zf.png") }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">支付说明设置 <a href="{{ url("admin/setinfo/zfedit")."/"."1" }}"><font color="#29a7e2" size="3px">修改</font></a> </h4>
                                {!!$str->zfsm!!}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle" style="width:70px; height:70px;overflow:hidden">
                                <a href="#">
                                    <img width="60px" height="60px"class="img-circle" src="{{ asset("pj/images/txsm.jpg") }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">提现说明设置 <a href="{{ url("admin/setinfo/txsm")."/"."1" }}"><font color="#29a7e2" size="3px">修改</font></a> </h4>
                                {!!$str->txsm!!}
                            </div>
                        </div>
                    </div>
                </div>
<!--                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle" style="width:70px; height:70px;overflow:hidden">
                                <a href="#">
                                    <img width="60px" height="60px"class="img-circle" src="{{ asset("pj/images/zf.png") }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">驾驶证服务支付说明设置 <a href="{{ url("admin/setinfo/jsedit")."/"."1" }}"><font color="#29a7e2" size="3px">修改</font></a> </h4>
                          {!!$str->jszsysm!!}
                            </div>
                        </div>
                    </div>
                </div>-->
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle" style="width:70px; height:70px;overflow:hidden">
                                <a href="#">
                                    <img width="60px" height="60px"class="img-circle" src="{{ asset("pj/images/zf.png") }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">汽车服务、驾驶证服务支付说明设置 <a href="{{ url("admin/setinfo/qcedit")."/"."1" }}"><font color="#29a7e2" size="3px">修改</font></a> </h4>
                          {!!$str->qcfwsysm!!}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left media-middle" style="width:70px; height:70px;overflow:hidden">
                                <a href="#">
                                    <img width="60px" height="60px"class="img-circle" src="{{ asset("pj/images/sm.jpg") }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">平台使用说明设置 <a href="{{ url("admin/setinfo/1/edit") }}"><font color="#29a7e2" size="3px">修改</font></a> </h4>
                          {!!$str->ptsysm!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
