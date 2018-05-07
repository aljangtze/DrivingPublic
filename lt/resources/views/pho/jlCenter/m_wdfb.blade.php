@extends("pho.bases.m_jlcenter")
@section("content")
<!--头部-->
<header class="header">	
    <a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
    <p style="width:86%;text-align:center;color:#fff;height:40px; line-height:40px;">我的发布</p>
</header>
<!--内容-->
<div class="fabu">
    <!-- Nav tabs -->
    <ul class="nav" role="tablist">
        <li class="active"><a href="#jishi" aria-controls="jishi" role="tab" data-toggle="tab">即时学车</a></li>
        <li><a href="#bx" aria-controls="bx" role="tab" data-toggle="tab">班型发布</a></li>
        <li><a href="#jsz" aria-controls="jsz" role="tab" data-toggle="tab">驾驶证服务</a></li>
        <li><a href="#cl" aria-controls="cl" role="tab" data-toggle="tab">车辆服务</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <!--即时学车-->
        <div role="tabpanel" class="tab-pane active" id="jishi">
            <div class="fb_ul">
                <ul>
                    @foreach($items as $tmp)
                    <li>
                        <div class="fb_li">
                            <p><strong>练习项目：</strong>@if($tmp->type == 2)科目二 @endif @if($tmp->type == 3) 科目三 @endif</p>
                            <p><strong>所学车型：</strong>{{ $tmp->cartype }}</p>
                        </div>
                        <div class="fb_li">
                            @if($tmp->type == 2)
                            <p><strong>练习模式：</strong>@if($tmp->lxmodel == 1) 场地练习 @endif @if($tmp->lxmodel == 2) 考试车练习 @endif</p>
                            @endif
                            @if($tmp->type == 3)
                            <p><strong>练习模式：</strong>@if($tmp->lxmodel == 1) 考试路训 @endif @if($tmp->lxmodel == 2) 长途路训 @endif @if($tmp->lxmodel == 3) 考试路训（考试车） @endif</p>
                            @endif
                            <p><strong>发布日期：</strong> {{ $tmp->fbdate }} </p>
                            <p><strong>8:30-12:30</strong> <font color="red">￥</font>{{ $tmp->seltime1 }} </p>
                            <p><strong>13:30-17:30</strong><font color="red">￥</font>{{ $tmp->seltime2 }} </p>
                            <p><strong>18:30-21:30：</strong> <font color="red">￥</font>{{ $tmp->seltime3 }} </p>
                            <p><strong>全天:</strong><font color="red">￥</font>{{ $tmp->seltime4 }} </p>
                        </div>
                        <div class="fb_dz ">
                            <p class="dhyc_p"><strong>练习地址：</strong> {{ $tmp->lcaddress }} </p>
                        </div>
                        <div class="btn_xq" style="clear:both;height:28px;width:100%;"><a href="#" style="border:1px solid #29A7E2;margin-top:5px;display:inline-block;padding:2px 10px;border-radius:5px;font-size:1.2rem;">状态：@if($tmp->sh == 2)正在审核中 @endif @if($tmp->sh == 1) 审核通过 @endif</a><a href="{{ url("jtel/jldel")."/".$tmp->id."/"."1" }}" style="border:1px solid #29A7E2;margin-top:5px;display:inline-block;padding:2px 10px;border-radius:5px;font-size:1.2rem;margin-left: 3px">删除</a></div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--班型-->
        <div role="tabpanel" class="tab-pane" id="bx">
            <div class="fb_ul">
                <ul>
                    @foreach($class as $cc)
                    <li>
                        <div class="fb_li">
                            <p><strong>班型：</strong> vip班</p>
                            <p><strong>价格：</strong> <font color="red">￥</font>{{  $cc->price}}</p>
                        </div>
                        <div class="fb_dz">
                            <p class="dhyc_p"><strong>介绍：</strong> {{ $cc->info }} </p>

                        </div>
                        <div class="fb_dz ">
                            <p class="dhyc_p"><strong>收费明细：</strong> {{ $cc->sfinfo }} </p>

                        </div>
                        <div class="btn_xq" style="clear:both;height:28px;width:100%;"><a href="{{ url("jtel/jldel")."/".$cc->id."/"."2" }}" style="border:1px solid #29A7E2;margin-top:5px;display:inline-block;padding:2px 10px;border-radius:5px;font-size:1.2rem;">删除</a></div>
                    </li>
                    @endforeach
                    @foreach($classpt as $ptt)
                    <li>
                        <div class="fb_li">
                            <p><strong>班型：</strong> 普通班</p>
                            <p><strong>价格：</strong><font color="red">￥</font> {{ $ptt->price }}</p>
                        </div>
                        <div class="fb_dz">
                            <p class="dhyc_p"><strong>介绍：</strong> {{ $ptt->info }} </p>

                        </div>
                        <div class="fb_dz ">
                            <p class="dhyc_p"><strong>收费明细：</strong> {{ $ptt->sfinfo }} </p>

                        </div>
                        <div class="btn_xq" style="clear:both;height:28px;width:100%;"><a href="{{ url("jtel/jldel")."/".$ptt->id."/"."3" }}" style="border:1px solid #29A7E2;margin-top:5px;display:inline-block;padding:2px 10px;border-radius:5px;font-size:1.2rem;">删除</a></div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--驾驶证-->
        <div role="tabpanel" class="tab-pane" id="jsz">
            <div class="fb_ul">
                <ul>
                    @foreach($jllist as $jll)
                    <li>
                        <div class="fb_li">
                            <p><strong>商家名称：</strong> {{ $jll->shopname }}</p>
                            <p><strong>服务项目：</strong> {{ $jll->fwitem }}</p>
                        </div>
                        <div class="fb_li">
                            <p><strong>服务价格：</strong> <font color="red">￥</font>{{ $jll->fwprice }} </p>
                            <p><strong>发布日期：</strong> {{ $jll->addtime }} </p>
                        </div>
                        <div class="fb_dz ">
                            <p class="dhyc_p"><strong>商家地址：</strong> {{ $jll->shopaddress }} </p>

                        </div>
                        <div class="btn_xq" style="clear:both;height:28px;width:100%;"><a href="{{ url("jtel/jldel")."/".$jll->id."/"."4" }}" style="border:1px solid #29A7E2;margin-top:5px;display:inline-block;padding:2px 10px;border-radius:5px;font-size:1.2rem;">删除</a></div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--车辆服务-->
        <div role="tabpanel" class="tab-pane" id="cl">
            <div class="fb_ul">
                <ul>
                    @foreach($qclist as $qcc)
                    <li>
                        <div class="fb_li">
                            <p><strong>商家名称：</strong> {{ $qcc->shopname }}</p>
                            <p><strong>服务项目：</strong> {{ $qcc->fwitem }}</p>
                        </div>
                        <div class="fb_li">
                            <p><strong>服务价格：</strong> <font color="red">￥</font>{{ $qcc->fwprice }} </p>
                            <p><strong>发布日期：</strong> {{ $qcc->addtime }} </p>
                        </div>
                        <div class="fb_dz ">
                            <p class="dhyc_p"><strong>商家地址：</strong> {{ $qcc->shopaddress }} </p>

                        </div>
                        <div class="btn_xq" style="clear:both;height:28px;width:100%;"><a href="{{ url("jtel/jldel")."/".$qcc->id."/"."5" }}" style="border:1px solid #29A7E2;margin-top:5px;display:inline-block;padding:2px 10px;border-radius:5px;font-size:1.2rem;">删除</a></div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


<p class="m_bsfg" style="height:50px;margin-bottom:10px;"></p>
@endsection
