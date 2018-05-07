<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
            <title>用户中心</title>
            <link href="{{ asset('main/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" title="" rel="stylesheet" />
            <link title="" href="{{ asset('main/css/style.css') }}" rel="stylesheet" type="text/css"  />
            <link title="blue" href="{{ asset('main/css/dermadefault.css') }}" rel="stylesheet" type="text/css"/>
            <link title="green" href="{{ asset('main/css/dermagreen.css') }}" rel="stylesheet" type="text/css" disabled="disabled"/>
            <link title="orange" href="{{ asset('main/css/dermaorange.css') }}" rel="stylesheet" type="text/css" disabled="disabled"/>
            <link href="{{ asset('main/css/templatecss.css') }}" rel="stylesheet" title="" type="text/css" />
            <link rel="stylesheet" type="text/css" href="{{ asset('bz/css/main.css') }}">

<script type="text/javascript" src="{{ asset('bz/js/main.js') }}"></script>
            <!--<script src="script/jquery-1.11.1.min.js" type="text/javascript"></script>
            <script src="script/jquery.cookie.js" type="text/javascript"></script>
            <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>-->
    </head>

    <body>
        <div class="right-product my-index right-full">
            <div class="container-fluid">
                <div class="info-center">

                    <!---title----->
                    <div class="info-title">
                        <div class="pull-left">
                            <h4><strong>Administrator，</strong></h4>
                            <p>欢迎登录管理系统！
                            
                            </p>
                        </div>
                        <div class="time-title pull-right">
                            <div class="year-month pull-left">
                                <p>{{ $date["week"] }}</p>
                                <p>{{ $date["rq"] }}</p>
                            </div>
                            <div class="hour-minute pull-right">
                                <strong>{{ $date["time"] }}</strong>
                                <p>当前系统刷新时间</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!----content-list----> 
                    <div class="content-list">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file blue"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>单位(个)</p>
                                            <h3 class="number">{{ $yjdcount }}</h3>
                                            <button class="btn btn-default">待处理订单<span style="color:red;"></span></button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file violet"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>单位（人）</p>
                                            <h3 class="number">{{ $rootcount }}</h3>
                                            <button class="btn btn-default">我的粉丝<span style="color:red;"></span></button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file orange"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>单位（人）</p>
                                            <h3 class="number">{{ $zt }}</h3>
                                            <button class="btn btn-default">粉丝直推<span style="color:red;"></span></button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
<!--                            <div class="col-md-3">
                                <div class="content">
                                    <div class="w30 left-icon pull-left">
                                        <span class="glyphicon glyphicon-file green"></span>
                                    </div>
                                    <div class="w70 right-title pull-right">
                                        <div class="title-content">
                                            <p>待办事项</p>
                                            <h3 class="number">90</h3>
                                            <button class="btn btn-default">待我处理<span style="color:red;">12</span></button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>-->
                        </div>
                        <!-------信息列表------->
                        <div class="row newslist" style="margin-top:20px;width:113%">
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        我的事务<div class="caret"></div>
                                        <a href="#" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a>
                                    </div>     
                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v8.0 </div>
                                        <div class="w20 pull-left text-center">2016年9月30日</div>
                                        <div class="w10 pull-left text-center"><span class="text-green-main">处理中...</span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v7.0</div>
                                        <div class="w20 pull-left text-center">2017年9月15日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v6.0</div>
                                        <div class="w20 pull-left text-center">2017年8月27日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v5.0</div>
                                        <div class="w20 pull-left text-center">2017年8月10日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v4.0</div>
                                        <div class="w20 pull-left text-center">2017年7月25日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v3.0</div>
                                        <div class="w20 pull-left text-center">2017年7月10日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v2.0</div>
                                        <div class="w20 pull-left text-center">2017年6月25日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="w15 pull-left">
                                            <img src="{{ asset('main/img/noavatar_middle.gif') }}" width="25" height="25" alt="图片" class="img-circle">
                                                Administrator
                                        </div>
                                        <div class="w55 pull-left">系统升级版本v1.0</div>
                                        <div class="w20 pull-left text-center">2017年6月10日</div>
                                        <div class="w10 pull-left text-center"><span><font color="#29a7e2">已完成</font></span></div>
                                    </div>
                                </div>
                            </div>
<!--
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        我的事务统计
                                        <a href="#" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a>
                                    </div>     
                                    <div class="panel-body">

                                    </div>
                                </div>

                            </div>-->
                        </div>
                    </div>

                </div>			
            </div>
        </div>
        <div class="wrap">
    </body>
</html>
