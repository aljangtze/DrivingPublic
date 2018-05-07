@extends("pho.bases.m_jlcenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1,user-scalable=no">
<title>普通班-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<a href="javascript:history.go(-1)" style="width:16%;" class="logo column"><img src="{{ asset('phone/images/fhjt.png') }}" alt="返回" /></a>
	<p style="width:72%;color:#fff;height:30px; line-height:40px; float:left;">普通班发布</p>
</header>
<!--VIP班发布内容-->
<div class="vip_class">
	<div class="jm1">
            <form action="{{ url('jtel/tjnormal')."/".session()->get("jTeluser") }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="bianhao" value="{{ $bianhao }}">
			<div class="fenshu">
				<label>价格</label>
				<input type="text" value="" placeholder="请填写普通班收费价格，例3000" id="vip-jg" name="price" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" />
			</div>
			<div class="fenshu">
				<label>介绍</label>
				<input type="text" value="" placeholder="请填写普通班介绍" id="vip-js" name="info"/>
			</div>
			<div class="fenshu">
				<label>收费明细</label>
				<textarea class="form-control" rows="8" name="sfinfo" placeholder="请填写收费明细"></textarea>
			</div>
			<button type="submit" class="btn btn-primary" id="btn_vip">确定发布</button>
		</form>
	</div>
</div>


</body>
</html>
@endsection
