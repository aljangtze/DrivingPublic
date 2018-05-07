@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>发布需求-新司机网</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/style1.css') }}" />


    </head>

    <body>
        <!--头部-->
    <header class="header">	
        <a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">发布需求</p>
    </header>
    <!--发布需求-->
    <div class="jm1">
        <form action="{{ url('tel/savexyxqfb')."/".session()->get("Teluser") }}" name="myform" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="hkaddress" id="dz" value="">
            <div class="fenshu">
                <label>选择项目</label>
                <select id="select_id" name="selitem">
                    <option value="0">请选择项目</option>
                    <option value="1">科目一</option>
                    <option value="2">科目二</option>
                    <option value="3">科目三</option>
                    <option value="4">科目四</option>
                    <option value="5">定制报名</option>
                </select>
            </div>
            <div class="fenshu">
                <label>需求标题</label>
                <input type="text" name="title" value="" placeholder="请简写需求标题" id="fbName"/>
            </div>
            <div class="fenshu">
                <label>练车时间</label>
                <input type="text" name="lctime" value="" placeholder="请填写学车时间" id="fbtime"/>
            </div>
            <div class="fenshu demos">
                <label for="appDate">练车日期</label>
                <input type="text" name="lcdate" value="" placeholder="请点击选择学车日期" readonly="readonly" name="appDate" id="appDate" />
            </div>
            <div class="fenshu">
                <label>联系电话</label>
                <input type="text" name="tel" value="" placeholder="请填写联系电话" id="lxdh" maxlength="11" onkeyup="(this.v = function () {
                            this.value = this.value.replace(/[^0-9-]+/, '');
                        }).call(this)" onblur="this.v();"/>
            </div>
            <div class="fenshu">
                <label>所在位置</label>
                <input type="text" name="szaddress" value="" placeholder="请填写所在位置" id="szwz"/>
            </div>
            <div class="fenshu">
                <label>户口所在地</label>
                <!-- <input type="text" name="hkaddress" value="" placeholder="请填写户口所在地，精确到地级市" id="hkszd"/> -->
                <div class="enrol_text">
                    <div class="iphone" >
                        <div class="browser">
                            <!--选择地区-->
                            <section class="express-area">
                                <a id="expressArea" href="javascript:void(0)">
                                    <dl>
                                        <!--<dt>选择地区：</dt>-->
                                        <dd id="addree">省 > 市 > 区/县</dd>
                                    </dl>
                                </a>
                            </section>
                            <!--选择地区弹层-->
                            <section id="areaLayer" class="express-area-box">
                                <header>
                                    <h3>选择地区</h3>
                                    <a id="backUp" class="back" href="javascript:void(0)" title="返回"></a>
                                    <a id="closeArea" class="close" href="javascript:void(0)" title="关闭"></a>
                                </header>
                                <article id="areaBox">
                                    <ul id="areaList" class="area-list"></ul>
                                </article>
                            </section>
                            <!--遮罩层-->
                            <div id="areaMask" class="mask"></div>
                            <script src="{{ asset('phone/js/jquery.area.js') }}" type="text/javascript"></script>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="fenshu">
                    <label>训练用车</label>
                    <label class="checkbox-inline">
                       <input type="checkbox" name="fx_sjc" id="fx_sjc" checked="checked"> 私家车
                    </label>
                    <label class="checkbox-inline">
                       <input type="checkbox" name="fx_jlc" id="fx_jlc"> 教练车
                    </label>
            </div>-->

            <div class="fenshu kemu2">
                <label>科二项目</label>
                <select id="select_k2" name="keitem">
                    <option value="0">请选择项目</option>
                    <option value="1">场地练习</option>
                    <option value="2">考试车练习</option>
                </select>
            </div>
            <div class="fenshu kemu2">
                <label>科二车型</label>
                <input type="text" name="kecartype" value="" placeholder="请填写科二所学车型，例C1" id=""/>
            </div>
            <div class="fenshu kemu3">
                <label>科三选择</label>
                <select id="select_k3" name="keitem3">
                    <option value="0">请选择项目</option>
                    <option value="3">考试路训</option>
                    <option value="4">长途培训</option>
                    <option value="5">考试路训（考试车）</option>
                </select>
            </div>
            <div class="fenshu kemu3">
                <label>科三车型</label>
                <input type="text" name="kescartype" value="" placeholder="请填写科三所学车型，例C1" id=""/>
            </div>
            <div class="fenshu">
                <label>详细内容</label>
                <textarea class="form-control" name="infocontent" rows="8" placeholder="请填写详细内容"></textarea>
            </div>
            <p class="clearfix"></p>
            <button type="button" onclick="dosubmit()" class="btn btn-primary" id="btn_qdrz">发布需求</button>
        </form>
    </div>
    <script>

        function clear(str) {
            str = str.replace(/>/g, "");//取消字符串中出现的所有逗号 
            return str;
        }

        function dosubmit() {
            var address = $("#addree").text();
            address = clear(address);
            $("#dz").val(address);
            var form = document.myform;
            var url = "{{ url('tel/savexyxqfb') }}" + "/" + {{ session()->get("Teluser") }};
            form.action = url;
            form.submit();
        }

    </script>
    <p style="width:100%;height:50px"></p>
    <script>
        $(function () {
            $("#select_id").change(function () {
                var as = $('#select_id option:selected').val();
                if (as == "2") {
                    $(".kemu2").toggle();
                    $(".kemu3").hide();
                } else if (as == "3") {
                    $(".kemu3").toggle();
                    $(".kemu2").hide();
                } else {
                    $(".kemu2").hide();
                    $(".kemu3").hide();
                }
            });
        });
        //***********判断*************
        $(function () {
            $("#btn_qdrz").click(function () {
                var fbName = $("#fbName").val();
                var fbtime = $("#fbtime").val();
                var lxdh = $("#fbfzr").val();
                var szwz = $("#szwz").val();
                var appDate = $("#appDate").val();
                if (fbName == "" || fbtime == "" || lxdh == "" || szwz == "" || appDate == "") {
                    alert("内容不能为空");
                    return false;
                } else {
                    alert("发布成功，等待后台人员审核");
                }
            });
        });
        //*********日期***********
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
                startYear: currYear - 10, //开始年份
                endYear: currYear + 40 //结束年份
            };

            $("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
            var optDateTime = $.extend(opt['datetime'], opt['default']);
            var optTime = $.extend(opt['time'], opt['default']);
        });
    </script>
</body>
</html>
@endsection
