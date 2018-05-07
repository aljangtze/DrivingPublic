@extends("pho.bases.m_xyCenter")
@section("content")
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>我的发布-新司机网</title>
</head>

<body>
<!--头部-->
<header class="header">	
	<p style="width:100%;text-align:center;color:#fff;height:40px; line-height:40px;">我的发布</p>
</header>
@foreach($items as $tmp)
<div class="panel panel-default">
    <div class="panel-heading" style="font-size: 14px">
        发布类型:
        @if($tmp->selitem == 1) 科目一 @endif 
        @if($tmp->selitem == 2) 科目二 @endif
        @if($tmp->selitem == 3) 科目三 @endif
        @if($tmp->selitem == 4) 科目四 @endif
        @if($tmp->selitem == 5) 定制报名 @endif
    </div>
  <div class="panel-body">
      <p>标题:{{ $tmp->title }}</p>
      <p>练车时间:{{ $tmp->lcdate }}&nbsp;{{ $tmp->lctime }}</p>
      <p>联系电话:{{ $tmp->tel }}</p>
      <p>所在位置:{{ $tmp->szaddress }}</p>
      <p>户口所在地:{{ $tmp->hkaddress }}</p>
      <!--<p>类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:</p>-->
      <p>详&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;情:{{ $tmp->infocontent }}</p>
      <p></p>
  </div>
</div>
@endforeach
</body>
</html>
@endsection
