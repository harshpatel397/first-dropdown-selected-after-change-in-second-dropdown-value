<?php
$con=mysql_connect("localhost","root","root");
mysql_select_db("class",$con);
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#course').change(function(){
		var a=$(this).val();
		showState(a);
    });
});
function showState(a)
{
    var url = '/drop/dropdown1.php';  
    $.ajax({
        type: "GET",
        url: url,
        data:"course="+a,
        success:function(results)
        {      
        	html = "";
     	  	obj = jQuery.parseJSON(results);
       		for (var key in obj) {
           	html += "<option value=" + key + ">" + obj[key] + "</option>"
       }
       document.getElementById("semester").innerHTML = html;                    
        }
    });
}
</script>
<form>
  <select name="course" id="course" >
     <option value=""> -----------ALL----------- </option> 
     <?php
         $dd_res=mysql_query("Select * from course");
         while($r=mysql_fetch_row($dd_res))
         { 
          
               echo "<option value='$r[0]'> $r[1] </option>";
         }
     ?>
     </select>
  <div>
  <select  id="semester" >
  </select>
  </div>
</form>


