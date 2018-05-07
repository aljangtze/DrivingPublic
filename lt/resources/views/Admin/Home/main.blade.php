<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台信息管理系统</title>
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pj/css/index.css') }}">
<script type="text/javascript" src="{{ asset('pj/js/jquery.min.js') }}"></script>
</head>

<frameset rows="100,*" cols="*" frameborder="NO" border="0" framespacing="0">
  <frame src="{{ url('admin/home/top')."/".$bh }}" name="topFrame" scrolling="NO" noresize title="topFrame">
  <frameset rows="*" cols="130,*" framespacing="0" frameborder="NO" border="0" >
    <frame src="{{ url('admin/home/left')."/".$bh }}" name="leftFrame" scrolling="auto" noresize title="leftFrame">
    <frame src="{{ url('admin/home/index')."/".$bh }}"  name="rightFrame" title="mainFrame">
  </frameset>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
