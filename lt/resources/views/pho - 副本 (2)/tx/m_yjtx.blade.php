<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>佣金提现-新司机网</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
        <script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
    </head>

    <body>
        <!--头部-->
    <header class="header">	
        <a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">佣金提现</p>
    </header>
    <!--内容-->
    <div class="jm1">
        <p class="yjtx1">您现在佣金为：<em>{{ $info->integral }}</em>元</p>
        <form action="{{ url('tel/dotx') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="nickname" value="{{ session()->get("Teluser") }}">
            <input type="hidden" name="name" value="{{ $info->name }}">
            <div class="fenshu">
                <label>提现金额 </label>
                <input type="text" name="money" placeholder="请输入提现金额，例168" onkeyup="(this.v = function () {
        this.value = this.value.replace(/[^0-9-]+/, '');
    }).call(this)" onblur="this.v();" />
            </div>
            <div class="fenshu">
                <label>卡号</label>
                <select name="kh" id="js-select">
                    <option value="{{ $info->yhkh }}">{{ $info->yhkh }}</option>
                </select>
            </div>
            <p class="clearfix" style="margin-bottom:10px;"></p>
            <button type="submit" class="btn btn-primary" id="btn-qd">提交</button>
        </form>
        @if(session("a")) 
        <div class="alert alert-warning">
            <strong>{{ session("a") }}</strong>
        </div>
        @endif
        <div class="tx_tip">
            <P>提现说明：</P>
            {!!$set->txsm!!}
        </div>
    </div>
    <script>
        $(function () {
            $("#js-select").change(function () {
                var js_select = $("#js-select").val();
                if (js_select == 1) {
                    $("#zfb").show();
                    $("#wx").hide();
                } else if (js_select == 2) {
                    $("#zfb").hide();
                    $("#wx").show();
                } else {
                    alert("请选择提现方式");
                }
            });
        });
    </script>
</body>
</html>
