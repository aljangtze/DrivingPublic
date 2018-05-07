<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>后台信息管理系统</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
        <script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
    </head>

    <body>
        <!--第一行-->
        <div class="header">
            <p>
                欢迎<strong>{{ session()->get("Adminuser") }}</strong>来到后台信息管理系统！
                <!--<a href="#">联系我们</a>-->
                <a href="{{ url('admin/outlogin') }}" target="_top">退出</a>
            </p>	
        </div>
        <!--第二行-->
        <div class="logo">
            <p>后台信息管理系统</p>
            @if($type == 1) 
            <ul id="navs">
<!--                <li>
                    <a href="index.html" target="mainFrame">首页</a>
                    <ul class="son_nav hidden">
                        <li><a href="#">首页</a></li>
                        <li><a href="#">首页</a></li>
                    </ul>
                </li>
                <li><a href="ywcx.html" target="mainFrame">业务操作</a>
                    <ul class="son_nav hidden">
                        <li><a href="#">首页</a></li>
                    </ul>
                </li>-->
<!--                <li><a href="ywjb.html" target="mainFrame">系统管理</a></li>-->
                <!--<li><a href="{{ url('admin/jpfw')."/"."2" }}" target="rightFrame">企业中心</a></li>-->
                <!--<li><a href="grxx.html" target="mainFrame">教练中心</a></li>-->
                <li><a href="{{ url('admin/wytg') }}" target="rightFrame">投稿管理</a></li>
                <li><a href="{{ url('admin/banner') }}" target="rightFrame">幻灯片管理</a></li>
                <!--<li><a href="grxx.html" target="mainFrame">班型管理</a></li>-->
                <li><a href="grxx.html" target="mainFrame">计时培训管理</a></li>
                <li><a href="{{ url('admin/article') }}" target="rightFrame">文章管理</a></li>
                <li><a href="{{ url('admin/forum') }}" target="rightFrame">论坛管理</a></li>
                <li><a href="{{ url('admin/tsgl') }}" target="rightFrame">投诉管理</a></li>
                <li><a href="{{ url('admin/xyxqgl') }}" target="rightFrame">学员需求管理</a></li>
                <li><a href="{{ url('admin/zzfbgl') }}" target="rightFrame">自主发布管理</a></li>
<!--                <li><a href="grxx.html" target="mainFrame">自主发布管理</a></li>-->
                <li><a href="{{ url('admin/rtcenter') }}" target="rightFrame">会员中心</a></li>
                <li><a href="{{ url('admin/adver') }}" target="rightFrame">广告中心</a></li>
                <li><a href="{{ url('admin/tjgx') }}" target="rightFrame">直推管理</a></li>
                </ul>
            @endif
        </div>

        <script>
        $(function () {
            $("#navs li").hover(function () {
                $(this).find(".son_nav").removeClass('hidden');
            }, function () {
                $(this).find(".son_nav").addClass('hidden');
            });

        });

        </script>
    </body>
</html>
