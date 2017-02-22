<?php
$id=$_GET['countrys'];
$con=mysql_connect("localhost","root","root");
mysql_select_db("world",$con);
$res1=mysql_query("select name from states WHERE country_id=$id ");
$res=array();
while ($r=mysql_fetch_row($res1)) {
	
	$res[]=$r;
}
echo json_encode($res);exit;
?>