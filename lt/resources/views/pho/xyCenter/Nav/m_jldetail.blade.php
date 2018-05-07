<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>教练详情-新司机</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
        <script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('phone/js/select-time.js') }}"></script>
    </head>

    <body>
        <!--头部-->
    <header class="header">	
        <a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
        <p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">教练详情</p>
    </header>
    <!--教练详情-->
    <div class="coacher">
        <p><img src="{{ asset('jlcpic')."/".$str->jlcpic }}" alt="教练图片"></p>
        <div class="coacher_info">
            <p>姓名：{{ $str->name }}</p>
            <p>价格区域：￥{{ $str->jpprice }}元</p>
            <p>性别：@if($str->sex == 1) 男 @endif @if($str->sex == 0) 女 @endif</p>
            <p>年龄：{{ $str->older }}岁</p>
            <p>教龄：{{ $str->jlolder }}年</p>
            <p>所在驾校：{{ $str->szjxname }}</p>
            <p>驾校位置：{{ $str->jxaddress }}</p>
            <div class="m_fg"></div>
            <!--标签页-->
            <div class="bxsm">
                <!-- Nav tabs -->
                <ul class="nav" role="tablist">
                    <li role="presentation"><a href="#xlcd" aria-controls="xlcd" role="tab" data-toggle="tab">训练场地</a></li>
                    <li role="presentation"><a href="#bghj" aria-controls="bghj" role="tab" data-toggle="tab">办公环境</a></li>
                    <li role="presentation" class="active"><a href="#vip" aria-controls="vip" role="tab" data-toggle="tab">VIP班</a></li>
                    <li role="presentation"><a href="#ptb" aria-controls="ptb" role="tab" data-toggle="tab">普通班</a></li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content" style="margin-top:6px;">
                    <div role="tabpanel" class="tab-pane active" id="vip">
                        @foreach($arr as $aa)
                        <p class="bx_title">{{ $aa->price }}元（必含）</p>
                        <p class="bx_sub">{{ $aa->info }}</p>
                        <ul class="bx_ul">
                            <li>
                                <p class="ul_jj">{{ $aa->sfinfo }}</p>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ptb">
                        @foreach($ptclass as $pp)
                        <p class="bx_title">{{ $pp->price }}元（必含）</p>
                        <p class="bx_sub">{{ $pp->info }}</p>
                        <ul class="bx_ul">
                            <li>
                                <p class="ul_jj">{{ $pp->sfinfo }}</p>
                            </li>
                        </ul>	
                        @endforeach
                    </div>
                    <!--训练场地-->
                    <div role="tabpanel" class="tab-pane" id="xlcd">
                        <p>
                            <img src="{{ asset('phone/images/xlcd1.jpg') }}">
                            <img src="{{ asset('phone/images/xlcd2.jpg') }}">
                            <img src="{{ asset('phone/images/xlcd3.jpg') }}">
                        </p>
                    </div>
                    <!--办公环境-->
                    <div role="tabpanel" class="tab-pane" id="bghj">
                        <p>
                            <img src="{{ asset('phone/images/bghj_1.jpg') }}">
                            <img src="{{ asset('phone/images/bghj_2.jpg') }}">
                        </p>
                    </div>
                </div>
                <!-- 标签内容介绍 -->
            </div>
            <!--标签页结束-->	
        </div>

    </div>
    <p class="m_bsfg" style="width:100%;height:50px;"></p>
    <!--立即预约-->
    <div class="ljyy" style="height:40px">
        <p><a data-toggle="modal" data-target="#myModal">立即报名</a></p>
    </div>
    <!--预约时间，模态框-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--模态框头部-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">选择班型</h4>
                </div>
                <!--模态框内容-->
                <div class="modal-body">

                    <!--选择车辆-->
                    <ul id="xz">
                        <li class="xz_1">
                            <span id="xz_text">--请选择--</span>
                            <ul class="son_nav">
                                @foreach($arr as $gg)
                                <li onclick="doselvip('{{ $gg->price }}','{{ $gg->classtype }}','{{ $gg->id }}')" value="1">VIP班（{{ $gg->price }}元）</li>
                                @endforeach
                                @foreach($ptclass as $pp)
                                <li onclick="doselvip('{{ $pp->price }}','{{ $pp->classtype }}','{{ $pp->id }}')" value="2" >普通班（{{ $pp->price }}元）</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <!--<div class="yuyue_pay">
                            <p>
                                    已选择<label id="shuliang">0</label>
                                    <span>总价：<em>￥</em><label id="total">0</label></span>
                            </p>
                    </div>-->
                </div>
                <div class="dhyc_p" style="height:0px;"></div>
                <!--模态框底部-->
                <form action="{{ url('tel/jlxddetail') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-footer">
                        <input type="hidden" name="jlID" id="jlID" value="{{ $str->id }}">
                        <input type="hidden" name="nickname" id="nickname" value="{{ session()->get("Teluser") }}">
                        <input type="hidden" name="classtype" id="classtype" value="0">
                        <input type="hidden" name="bid" id="bid" value="">
                        <input type="hidden" name="price" id="price" value="">
                        <input type="hidden" name="jlolder" id="jlorder" value="{{ $str->jlolder }}">
                        <input type="hidden" name="szjxname" id="szjxname" value="{{ $str->szjxname }}">
                        <input type="hidden" name="jxaddress" id="szjxname" value="{{ $str->jxaddress }}">
                        <!-- <a class="btn btn-default" data-dismiss="modal">关闭</a> -->
                        <button class="btn btn-danger" type="submit">去报名</button>
                    </div>
                </form>
            </div>

            <script>
                function doselvip(price, classtype, bid) {
                $("#classtype").val(classtype);
                $("#price").val(price);
                $("#bid").val(bid);
                }
            </script>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <p style="width:80px"></p>
    <script>
        // $(function () {
        // 	$(".xz_1").click(function(){
        // 		$(".son_nav").toggle();
        // 	}); 
        //   });

        $(function () {

        $(".son_nav li").click(function(){
        $(this).addClass("xzbx").siblings().removeClass("xzbx");
        var zhi = $(".son_nav li").val();
        var wz = $(this).html();
        // if(zhi==1){
        // 	$("#xz_text").html(wz);
        // }	
        // else if(zhi==2){
        // 	$("#xz_text").html(wz);
        // }
        });
        });

    </script>
</body>
</html>