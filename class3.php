<?php
$id=$_GET['citys'];
$con=mysql_connect("localhost","root","root");
mysql_select_db("world",$con);
$res1=mysql_query("select name from cities WHERE state_id=$id ");
$res=array();
while ($r1=mysql_fetch_row($res1)) {
	
	$res[]=$r1;
}
echo json_encode($res);exit;
?>