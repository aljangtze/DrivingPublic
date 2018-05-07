<?php
session_start();
$a=$_SESSION["Webuser"];
$aa=$_SESSION["old"];
include_once("config.php");
openDB();
$sql="SELECT * from demo_vishop_user where nickname='$a'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$b=$row["id"];//---------------------------------------新ID
$sql12="SELECT * from demo_vishop_user where nickname='$aa'";
$result12=mysql_query($sql12);
$row12=mysql_fetch_array($result12);
$bb=$row12["id"];//----------------------------------------老ID
$sql2="SELECT * from sanji where phone='$aa'";
$resultSet2=mysql_query($sql2);
$i=mysql_num_rows($resultSet2);
	if($i==0)
	{
	$sql3="Insert into sanji(phone,yourID) values('$aa','$bb')";
    mysql_query($sql3);
	$sql4="Insert into sanji(phone,yourID,yiji) values('$a','$b','$bb')";
    mysql_query($sql4);
	$sql6="Insert into guanxi(level,yourID,otherID) values('1','$b','$bb')";
    mysql_query($sql6);
	$sql7="Insert into zhijie(yourID,firstID) values('$b','$bb')";
    mysql_query($sql7);
	}else{		
	$result2=mysql_query($sql2);
    $row2=mysql_fetch_array($result2);
    $e=$row2["lock"];
	$f=$row2["yiji"];
	$g=$row2["erji"];
	$h=$row2["sanji"];
	$sql21="SELECT * from sanji where phone='$a'";
	$resultSet21=mysql_query($sql21);
	$row21=mysql_fetch_array($result21);
	$j=$row2["lock"];
	if($j!=1){
	$sql77="Insert into zhijie(yourID,firstID) values('$a','$f')";
    mysql_query($sql77);	
	
	$sql16="Insert into guanxi(level,yourID,otherID) values('1','$a','$f')";	
    mysql_query($sql16);
	
	$sql17="Insert into guanxi(level,yourID,otherID) values('2','$a','$g')";	
    mysql_query($sql17);
	
	$sql18="Insert into guanxi(level,yourID,otherID) values('3','$a','$h')";	
    mysql_query($sql18);
	
	$sql19="Insert into guanxi(level,yourID,otherID) values('1','$f','$g')";	
    mysql_query($sql19);
	
	$sql20="Insert into guanxi(level,yourID,otherID) values('2','$f','$h')";	
    mysql_query($sql20);
	
	$sql21="Insert into guanxi(level,yourID,otherID) values('1','$g','$h')";	
    mysql_query($sql21);
		
	$sql5="Insert into sanji(phone,yourID,yiji,erji,sanji,lock) values('$a','$b','$f','$g','$h','1')";
    mysql_query($sql5);
	
	}else{
		
	}	
	}
?>