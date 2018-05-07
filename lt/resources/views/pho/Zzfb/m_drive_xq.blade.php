<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>驾校详情-新司机网</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('phone/css/m_index.css') }}">
<script type="text/javascript" src="{{ asset('phone/js/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('phone/js/bootstrap.min.js') }}"></script>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:84%;text-align:center;color:#fff;height:40px; line-height:40px;">驾校详情</p>
</header>
<!--教练详情-->
<div class="coacher">
	<p><img src="{{ asset('pic')."/".$zzfb->pic }}" alt="驾校图片"></p>
	<div class="coacher_info">
		<p>驾校名称：{{ $zzfb->jxname }}</p>
		<p>负责人：{{ $zzfb->name }}</p>
		<p>驾校简介：{{ $zzfb->content }}</p>
		<p>驾校位置：{{ $zzfb->address }}</p>
		<p>旗下教练：
                    @foreach($qxjl as $cc)
                    {{ $cc->name }}&nbsp;&nbsp;&nbsp;
                    @endforeach
                </p>
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
                      @foreach($zzfclass as $nn)
                      @if($nn->classtype == 1)
				<p class="bx_sub">{{ $nn->info }}</p>
				<ul class="bx_ul">
					<li>
						<p><em id="pricevip">{{ $nn->price }}</em>元</p>
						<p class="ul_jj">{{ $nn->fyinfo }}</p>
					</li>
				</ul>
                      @endif
                      @endforeach
			</div>
			<div role="tabpanel" class="tab-pane" id="ptb">
                      @foreach($zzfclass as $nb)
                      @if($nb->classtype == 2)
				<p class="bx_sub">{{ $nb->info }}</p>
				<ul class="bx_ul">
                                    <li>
                                        <p><em id="ptprice">{{ $nb->price }}</em>元</p>
					<p class="ul_jj">{{ $nb->fyinfo }}</p>
                                    </li>
				</ul>	
                      @endif
                      @endforeach
			</div>
			<!--训练场地-->
			<div role="tabpanel" class="tab-pane" id="xlcd">
				<p>
					{!!$zzfb->xlcd!!}
				</p>
			</div>
			<!--办公环境-->
			<div role="tabpanel" class="tab-pane" id="bghj">
				<p>
					{!!$zzfb->bghj!!}
				</p>
			</div>
		  </div>
		  <!-- 标签内容介绍 -->
		</div>
		<!--标签页结束-->	
	</div>
	
</div>
<p class="m_bsfg" style="height:50px;"></p>
<!--立即预约-->
<div class="ljyy" style="height:40px">
	<p><a data-toggle="modal" data-target="#myModal">立即报名</a></p>
</div>


<!--预约班型-->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	  <!--模态框头部-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">预约班型</h4>
      </div>
	  <!--模态框内容-->
         
      <div class="modal-body">
		<!--选择车辆-->
	  	<div class="xzcl form-group">
	  		<label>选择班型</label>
	  		<ul id="xz">
				<li class="xz_1">
					<span id="xz_text">--请选择--</span>
					<ul class="son_nav">
						@foreach($zzfclass as $gg)
                                                @if($gg->classtype == 1)
						<li onClick="doselvip('{{$zzfb->id}}','{{ $gg->price }}','{{ $gg->classtype }}','{{ $gg->id }}')" value="1">VIP班（{{ $gg->price }}元）</li>
						@endif
                                                @if($gg->classtype == 2)
						<li onclick="doselvip('{{$zzfb->id}}','{{ $gg->price }}','{{ $gg->classtype }}','{{ $gg->id }}')" value="2" >普通班（{{ $gg->price }}元）</li>
						@endif
                                                @endforeach
						
					</ul>
				</li>
			</ul>
			<!--<select class="form-control">
                            <option value="0" selected="selected">--请选择班型--</option>
                           @foreach($zzfclass as $gg)
                            @if($gg->classtype == 1)
                            <option value="1" onclick="doselvip('{{$zzfb->id}}','{{ $gg->price }}','{{ $gg->classtype }}','{{ $gg->id }}')">VIP班（{{ $gg->price }}元）</option>
                            @endif
                            @if($gg->classtype == 2)
                            <option value="2"onclick="doselvip('{{$zzfb->id}}','{{ $gg->price }}','{{ $gg->classtype }}','{{ $gg->id }}')">普通班（{{ $gg->price }}元）</option>
                            @endif
                            @endforeach
			</select>-->
	  	</div>
      </div>
	  <!--模态框底部-->
    
      <div class="modal-footer">
      	<form action="{{ url('tel/zzfbpay') }}" method="post">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="jid" name="jid" value="">  
          <input type="hidden" id="price" name="price" value="">
          <input type="hidden" id="classtype" name="classtype" value="0">
          <input type="hidden" id="bid" name="bid" value="">
          <input type="hidden" id="bainhao" name="bainhao" value="{{ $zzfb->bh }}">
          <input type="hidden" name="qf" value="1">
        <!-- <a class="btn btn-default" data-dismiss="modal">关闭</a> -->
        <button class="btn btn-danger" type="submit">去报名</button>
        </form>
      </div>
    
    </div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->

</div>
<script>
    function doselvip(jid,price,classtype,bid) {
    	
        $("#jid").val(jid);
        $("#classtype").val(classtype);
        $("#price").val(price);
        $("#bid").val(bid);
    }

</script>
<script>
// $(function () {
// 	$(".xz_1").click(function(){
// 		$(".son_nav").toggle();
// 	}); 
//   });

$(function () {

		$(".son_nav li").click(function(){
			$(this).addClass("xzbx").siblings().removeClass("xzbx");
			var zhi=$(".son_nav li").val();
			var wz=$(this).html();
			// if(zhi==1){
			// 	$("#xz_text").html(wz);
			// }	
			// else if(zhi==2){
			// 	$("#xz_text").html(wz);
			// }
		});

  });

</script>
<!-- /.modal -->
</body>
</html>
