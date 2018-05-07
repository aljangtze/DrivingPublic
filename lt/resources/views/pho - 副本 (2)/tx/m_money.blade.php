<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>明细-新司机网</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
        <script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
    </head>

    <body>
        <!--头部-->
    <header class="header">	
        <a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">明细</p>
    </header>
    <!--内容-->
    <div class="money">
        <p class="jyze"><strong>{{ session()->get("Teluser") }}</strong>，您当前提现总额为：<em>{{ $sum }}</em>元</p>
        @foreach($money as $tmp)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title" style="font-size: 12px">交易类型：<strong>提现</strong></h5>
            </div>
            <div class="panel-body">
                <p>金额:&nbsp;&nbsp;<strong>{{ $tmp->money }}元</strong></p>
                <p>交易时状态:&nbsp;&nbsp; @if($tmp->type == 2) 审核中...@endif @if($tmp->type == 1) 审核成功 @endif</p>
                <p>交易时间:&nbsp;&nbsp;{{ $tmp->date }}</p>
            </div>
        </div>
        @endforeach
        <div class="txgn">
            <!--<a href="m_yjtx.html" class="btn btn-primary">我要提现</a>-->
        </div>
    </div>

</body>
</html>
