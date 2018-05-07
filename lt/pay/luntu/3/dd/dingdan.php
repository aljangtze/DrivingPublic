<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="_token" content="AYGmjpOeXS4Y0fCVIJRG4bQnbaHOXOrNoJdbwVBt">
<title>订单管理</title>
<link rel="stylesheet" href="file/global.css" type="text/css">
<link rel="stylesheet" href="file/index.css" type="text/css">
<link rel="stylesheet" href="file/menu.css" type="text/css">
<link rel="stylesheet" type="text/css" href="file/bootstrap.css">
<script type="text/javascript" src="file/jquery-1.js"></script>
<script type="text/javascript" src="file/kandytabs.js"></script>
<script type="text/javascript" src="file/easing.js"></script>
<link rel="stylesheet" href="file/kandytabs.css" type="text/css"> 
 <script src="file/autoheight.js" type="text/javascript"></script>
 <!--[if lt IE 7]>       
 <script src="http://localhost/jiaoyue/public/assets/js/fixPNG.js"></script>         
 <script>
 DD_belatedPNG.fix('img,span');
 </script>     
<![endif]-->
<link href="file/lanrenzhijia.css" rel="stylesheet" type="text/css">
 <script type="text/javascript">
    var tab,index=0;
    $(function() {
		    tab=$("#slide").KandyTabs({
		    del:true,
		    scroll:true,
		    trigger:'click',
		    custom:function(b,c,i){
				$("p",c).fadeOut();
				c.eq(i).find("p").slideDown(1500);
				index=i;
			},
		    done: function(btn,cont,tab){
		    	$("#slide .tabbtn").each(function(i)
		    	{
		    	if($(this).text().indexOf("我的桌面")>-1)//如果当前选项卡是我的桌面
		    	{
				$(this).css({"background":"#027be4","border-bottom":"1px solid #027be4","font-weight":"bold","color":"#ffffff"});//修改选项景色
		        $(this).find('.tabdel').text("");//	去除关闭按钮
		    	}	
		    	});
				setIframeH();//前台设定IFRAME高度 最好在在登录时把高度获取存放到session供其他IFRAME使用
		    }
          });
	});
	
	
</script>
<link type="text/css" rel="stylesheet" href="file/default.css"><style type="text/css">#kf-content-div a,
#kf-content-div p {
	border: 0px !important;
	padding: 0px !important;
	margin: 0px !important;
}

#kf-wiki-div a:hover,
#kf-content-div a:focus {
	text-decoration: none !important;
}

#kf-wiki-div a {
	text-decoration: none !important;
	color: #0645AD !important;
	background: none repeat scroll 0% 0% transparent !important;
}

#kf-wiki-div dt {
	margin-bottom: 0.1em !important;
	font-weight: bold !important;
}

#kf-wiki-div dd {
	margin-left: 1.6em !important;
	margin-bottom: 0.1em !important;
}

/**************/
#kf-my-add-btn {
	display: none;
	height: 18px;
	width: 18px;
	position: fixed;
	z-index: 2147483647;
	line-height: 18px;
	text-decoration: none;
	font: bold 12px/25px Arial;
	color: rgba(62, 87, 6, 0.53);
	background: -moz-linear-gradient(center top, rgba(165, 205, 78, 1) 0%, rgba(107, 143, 26, 1) 100%);
	opacity: 0.55;
	text-shadow: 1px 1px 1px rgba(255, 255, 255, .22);
	border-radius: 18px;
	box-shadow: 1px 1px 1px rgba(0, 0, 0, .29), inset 1px 1px 1px rgba(255, 255, 255, .44);
	transition: all 0.15s ease;
}

#kf-my-add-btn {
	color: rgba(62, 87, 6, 0.53);
	opacity: 0.55;
}

#kf-my-add-btn:hover {
	color: rgba(62, 87, 6, 1);
	opacity: 1;
}

#kf-add-loading-img {
	display: none;
	height: 24px;
	width: 24px;
	position: fixed;
	bottom: 20px;
	right: 20px;
	z-index: 2147483647;
	border-radius: 24px;
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.29), 1px 1px 1px rgba(255, 255, 255, 0.24) inset;
}

#kf-content-div {
	opacity: 0;
	display: none;
	width: 320px;
	position: fixed;
	right: 20px;
	bottom: -190px;
	z-index: 2147483647;
	font: normal 12px/25px Arial, sans-serif;
	color: #222;
	background: transparent;
}

#kf-top-div {
	height: 40px;
	width: 320px;
	background: rgba(0, 0, 0, .05);
	border-radius: 20px 20px 0px 0px;
	line-height: 40px;
	text-align: center;
}

#kf-wiki-tab {
	width: 160px;
	color: rgba(255, 255, 255, .88);
	text-decoration: none;
	background: rgba(0, 152, 249, .6);
	float: left;
	font-size: 1em;
	border-radius: 20px 20px 0px 0px;
}

#kf-translator-tab {
	width: 160px;
	color: rgba(0, 0, 0, 0.25);
	text-decoration: none;
	background: transparent;
	font-size: 1em;
	float: left;
	border-radius: 20px 20px 0px 0px;
}

#kf-frame-div {
	box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.33);
	text-align: left;
}

#kf-trans-div{
	font-weight: bold;width:300px;height:auto;background:rgba(233, 233, 233, 1);opacity:.8;padding:10px;max-height:190px;overflow:auto;
}

#kf-wiki-div {
	width: 300px;
	max-height: 190px;
	padding: 10px;
	background: #E9E9E9;
	opacity: 0.8;
	border: 0px;
	overflow: auto;
}

/*******/
.tipso_bubble,.tipso_bubble>.tipso_arrow{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.tipso_bubble{position:absolute;text-align:center;border-radius:6px;z-index:9999;padding:10px}.tipso_style{cursor:help;border-bottom:1px dotted}.tipso_bubble>.tipso_arrow{position:absolute;width:0;height:0;border:8px solid;pointer-events:none}.tipso_bubble.top>.tipso_arrow{border-color:#000 transparent transparent;top:100%;left:50%;margin-left:-8px}.tipso_bubble.bottom>.tipso_arrow{border-color:transparent transparent #000;bottom:100%;left:50%;margin-left:-8px}.tipso_bubble.left>.tipso_arrow{border-color:transparent transparent transparent #000;top:50%;left:100%;margin-top:-8px}.tipso_bubble.right>.tipso_arrow{border-color:transparent #000 transparent transparent;top:50%;right:100%;margin-top:-8px}</style></head>
<?php 
include_once("config.php");
$conn=mysql_connect(localhost,root,root) or die('连接mysql不成功'); 
$db=mysql_select_db(jiaoyu) or die('连接数据库不成功'); 
$sql="select count(id) from dingdan"; 
 mysql_query("set names 'utf8'");
$query=mysql_query($sql) or die('连接数据表不成功'); 
//$recordcount=mysql_num_rows($query);//
if($rs=mysql_fetch_array($query)){ 
$recordcount=$rs[0]; 
} 
if($recordcount==0){echo '无记录.';exit;} 
$pagesize=15;//
$pagecount=ceil($recordcount/$pagesize);// 
$page=isset($_GET['page'])?$_GET['page']:1;//
if($page<1||empty($page)){$page=1;} 
if($page>$pagecount){$page=$pagecount;} 
$offset=($page-1)*$pagesize;//
$result=mysql_query("SELECT * from dingdan order by id desc limit $offset,$pagesize"); 
 mysql_query("set names 'utf8'");
if(mysql_num_rows($result)==0){echo '无后台操作记录.';exit;} 
?>
<body style="overflow: hidden;" scroll="no">
<!-- header -->
<div class="header" region="north" border="true">
<div class="logo fleft"><img src="file/logo.png" width="344" height="49"></div>
<div class="header_right">
<ul>
    <li><a href="http://localhost/jiaoyue/public/web/index" target="_blank" title="前台" id="home"></a></li>
<!--  <li><a href="#" title="更换皮肤" id="theme"></a></li>
  <li><a href="#" title="设置" id="Setup"></a></li>
  <li><a href="#" title="刷新" id="refresh"></a></li>-->
  <li><a href="http://localhost/jiaoyue/public/admin/login" title="注销登录" id="logout"></a></li>
</ul>
</div>
</div>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>无标题文档</title>
<link href="file/style.css" rel="stylesheet" type="text/css">
<link href="file/select.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="file/jquery.js"></script>
<script type="text/javascript" src="file/jquery_002.js"></script>
<script type="text/javascript" src="file/select-ui.js"></script>
<script type="text/javascript" src="file/kindeditor.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>

<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>

<div style="border:1px solid;height:810px">
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">订单列表</a></li>
    <!--<li><a href="#">#</a></li>-->
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
    <div class="itab">
  	<ul> 
    <li><a href="#tab2" class="  selected">订单列表</a></li> 
  	</ul>
    </div> 
  	<div id="tab2" class="tabson" style="display: block;">
    <ul class="seachform">
    <form action="sdingdan.php" method="get">
    <li><label>商品名称 </label><input name="a" class="scinput" type="text"></li>
    <li><label>&nbsp;</label><input  value="查询" type="submit"></li>
    </form>
    </ul>
    <table class="tablelist">
    	<thead>
            <tr>
                <th>编号<i class="sort"><img src="file/px.gif"></i></th>
                <th>商品名称</th>
                <th>总价</th>
                <th>账户</th>
                <th>支付方式</th>
                <th>下单时间</th>
                <th>订单号</th>
                <th>付款状态</th>
                <th>订单状态</th>
                <th>收货地址</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
 <?php 
  while($row =mysql_fetch_assoc($result))
   {
  ?>		
              <tr class="odd">
        <td><?php echo $row["id"];?></td>
        <td><?php echo $row["a"];?>(一级佣金:<?php echo $row["l"];?>;二级佣金:<?php echo $row["m"];?>;三级佣金:<?php echo $row["n"];?>;)</td>
        <td><?php echo $row["c"];?></td>
        <td><?php echo $row["d"];?></td>
        <td>
        <font color="green"><?php echo $row["e"];?></font>                     </td>
        <td><?php echo $row["f"];?></td>
        <td><?php echo $row["g"];?></td>
        <td><font color="red">
		<?php
		$fukuan=$row["h"];
		if($fukuan==1){ 
		?>
		已付款
		<?php
		}else{
		?>
		未付款
		<?php
		}
		?>
		</font></td>
        <td>
            <font color="red">
			<?php
		$fahuo=$row["i"];
		if($fahuo==1){
		?>
		已发货
		<?php
		}else{
		?>
		未发货
		<?php
		}
		?>
			</font>                                </td>
        <td><?php echo $row["k"];?></td>
        <td>
		<?php
		$fahuo=$row["i"];
		if($fahuo!=1){
		?>
         <a href="Update_chanpin.php?id=<?php echo $row["id"];?>" class="tablelink">发货</a>
									<?php
		}else{
		?>
		<a class="tablelink">已发货</a>
		<?php
		}
		?>
         <a href="javascript:if(window.confirm('信息删除将无法找回，确定删除?'))location.href='delete_chanpin.php?b=<?php echo $row['id']?>'" class="tablelink">删除</a>
		 <?php
		$fukuan=$row["h"];
		if($fukuan==1){ 
		?>
		<a href="http://zh.kmhujia.com/fy.php?a=<?php echo $row["d"];?>&b=<?php echo $row["l"];?>&c=<?php echo $row["m"];?>&d=<?php echo $row["n"];?>&e=<?php echo $row["c"];?>&f=<?php echo $row["id"];?>" class="tablelink"><?php
		$yj=$row["x"];
		if($yj==0){ 
		?>发放佣金</a>
		<?php }else{?>
		<a href="#">佣金已发放</a>
		<?php
		}
		?>
		<?php
		}else{
			?>
			<?php 
		}
			?>
		</td>
        </tr> 
             <?php 			 
			 }
			 ?>
        </tbody>
    </table>
    <center><div></div></center>
	<br>
   <p align="center" class="STYLE1">&nbsp;
<?php 
echo "总记录:".$recordcount."条 页次:".$page."/".$pagecount."页"; 
if($page<>1){ 
echo " <a href=dingdan.php?page=1>首页</a>"; 
echo " <a href=dingdan.php?page=".($page-1).">上一页</a>"; 
} 
if($page<>$pagecount){ 
echo " <a href=dingdan.php?page=".($page+1).">下一页</a>"; 
echo " <a href=dingdan.php?page=".$pagecount.">最末页</a>"; 
} 
?> 
</p>
    <script>
        function dodel(id) {
            var form = document.myform;
            if(confirm("是否确认删除")) {
                form.action = "http://localhost/jiaoyue/public/admin/order/del" + "/" + id;
                form.submit();
            }
        }
    </script>
    </div> 
	</div>
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    </div>
</div>

<div id="footer" region="south" border="false" class="cs-south">
    </div>
    <div class="clear"></div>
<div id="kf-my-tips" style="position: fixed;" class="tipso_style"></div><a id="kf-my-add-btn" name="ke-my-add-btn" href="javascript:void(0);" style="background-image: url(&quot;data:image/gif;base64,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&quot;); background-size: 18px 18px;"></a><div id="kf-add-loading-img" style="background-image: url(&quot;data:image/gif;base64,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&quot;);"></div><div style="display: none; right: 20px; bottom: -90px;" id="kf-content-div"><div id="kf-top-div"><a id="kf-wiki-tab" href="javascript:void(0)" style="color: rgba(0, 0, 0, 0.25); background: transparent none repeat scroll 0% 0%;"></a><a id="kf-translator-tab" href="javascript:void(0)" style="color: rgba(255, 255, 255, 0.88); background: rgba(56, 189, 15, 0.6) none repeat scroll 0% 0%;"></a></div><div id="kf-frame-div"><div id="kf-trans-div" style="font-size: 1em;"></div><div id="kf-wiki-div" name="kf-wiki-div" style="display: none; font-size: 1em;"></div></div></div></body></html>