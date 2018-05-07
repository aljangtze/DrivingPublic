<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="{{ asset('at/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">编辑lessionone</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>编辑</span></div>
    
    <ul class="forminfo">
        <form action="{{ url('admin/lessionone')."/".$str->id }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
        <li><label>姓名</label><input name="name" type="text" class="dfinput" value="{{ $str->name }}"/></li>
        <li><label>性别</label><cite><input name="sex" type="radio" @if($str->sex == 1) checked @endif value="1" />男&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" @if($str->sex == 0) checked @endif value="0" />女</cite></li>
        <li><label>电话</label><input name="tel" type="text" class="dfinput" value="{{ $str->tel }}"/></li>
        <li><label>价格</label><input name="price" type="text" class="dfinput" value="{{ $str->price }}" /></li>
        <li><label>练习人数/每车</label><input name="lxrs" type="text" class="dfinput" value="{{ $str->lxrs }}"/></li>
        <li><label>所学车型</label><input name="cartype" type="text" class="dfinput" value="{{ $str->cartype }}" /></li>
        <li><label>发布日期</label><input name="fbdate" type="text" class="dfinput" value="{{ $str->fbdate }}" /></li>
        <li><label>培训实效</label><input name="seltime" type="text" class="dfinput" value="{{ $str->seltime }}" /></li>
        <li><label>联系电话</label><input name="lxtel" type="text" class="dfinput" value="{{ $str->lxtel }}" /></li>
        <li><label>练习地址</label><input name="lxaddress" type="text" class="dfinput" value="{{ $str->lxaddress }}" /></li>
        <li><label>&nbsp;</label><input type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>


</body>

</html>
