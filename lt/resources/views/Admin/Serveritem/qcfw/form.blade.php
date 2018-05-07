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
    <li><a href="#">信息编辑</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <ul class="forminfo">
        <form action="{{ url('admin/lzqcfw')."/".$str->id }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
        <li><label>姓名</label><input name="name" type="text" class="dfinput" value="{{ $str->name }}"/><i></i></li>
        <li><label>性别</label><cite><input name="sex" type="radio" value="1" @if($str->sex == 1) checked @endif  />男&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" @if($str->sex == 0) checked @endif value="0" />女</cite></li>
        <li><label>联系电话</label><input name="tel" type="text" class="dfinput" value="{{ $str->tel }}" /><i></i></li>
        <li><label>商家名称</label><input name="shopname" type="text" class="dfinput" value="{{ $str->shopname }}" /></li>
        <li><label>服务项目</label><input name="fwitem" type="text" class="dfinput" value="{{ $str->fwitem }}" /></li>
        <li><label>服务价格</label><input name="fwprice" type="text" class="dfinput" value="{{ $str->fwprice }}" /></li>
        <li><label>商家地址</label><input name="shopaddress" type="text" class="dfinput" value="{{ $str->shopaddress }}" /></li>
        <li><label>服务介绍</label><input name="iteminfo" type="text" class="dfinput" value="{{ $str->iteminfo }}" /></li>
        <li><label>&nbsp;</label><input type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>


</body>

</html>
