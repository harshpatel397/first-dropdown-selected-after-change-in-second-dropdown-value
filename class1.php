<?php

  $ID=$_GET['course'];
$con=mysql_connect("localhost","root","root");
mysql_select_db("class",$con);
 $dd_res=mysql_query("Select Semester_name from semester WHERE  course_Id =$ID ");
 $res=array();
 while($r=mysql_fetch_row($dd_res))
         { 
         	$res[]=$r;
             
         }
  
  echo json_encode($res);exit();
?>


