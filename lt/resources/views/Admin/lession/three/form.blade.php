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
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <ul class="forminfo">
        <form action="{{ url('admin/lessionthree')."/".$str->id }}" method='post'>
            <input type='hidden' name="_token" value="{{ csrf_token() }}">
            <input type='hidden' name="_method" value="PUT">
            <li><label>姓名</label><input name="name" type="text" class="dfinput" value="{{ $str->name }}"/></li>
            <li><label>性别</label><cite><input name="sex" type="radio" @if($str->sex == 1) checked @endif value="1"  />男&nbsp;&nbsp;&nbsp;&nbsp;<input name="sex" type="radio" @if($str->sex == 0) checked @endif  value="0" />女</cite></li>
            <li><label>联系电话</label><input name="tel" type="text" class="dfinput" value='{{ $str->tel }}'/></li>
            <li><label>8:30-12:30</label><input name="seltime1" type="text" class="dfinput" value="{{ $str->seltime1 }}" /></li>
            <li><label>13:30-17:30</label><input name="seltime2" type="text" class="dfinput" value="{{ $str->seltime2 }}" /></li>
            <li><label>18:30-21:30</label><input name="seltime3" type="text" class="dfinput" value="{{ $str->seltime3 }}" /></li>
            <li><label>全天</label><input name="seltime4" type="text" class="dfinput" value="{{ $str->seltime4 }}" /></li>
            <li><label>练习人数</label><input name="lxrs" type="text" class="dfinput" value="{{ $str->lxrs }}" /></li>
            <li><label>所学车型</label><input name="cartype" type="text" class="dfinput" value="{{ $str->cartype }}" /></li>
            <li><label>练习模式</label>
                <input name="lxmodel" type="radio" value="1" @if($str->lxmodel == 1) checked @endif />考试路训&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="lxmodel" type="radio" @if($str->lxmodel == 2) checked @endif  value="2" />长途路训&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="lxmodel" type="radio" @if($str->lxmodel == 3) checked @endif  value="3" />考试路训(考试车)
            </cite></li>
            <li><label>发布日期</label><input name="fbdate" type="text" class="dfinput" value="{{ $str->fbdate }}" /></li>
            <li><label>练车地址</label><input name="lcaddress" type="text" class="dfinput" value="{{ $str->lcaddress }}" /></li>
            <li><label>&nbsp;</label><input type="submit" class="btn" value="确认保存"/></li>
        </form>
    </ul>
    
    
    </div>


</body>

</html>
