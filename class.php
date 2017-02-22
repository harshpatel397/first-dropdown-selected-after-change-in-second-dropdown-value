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
    $('#country').change(function(){
		var b =$(this).val();
		show(b);
	});
	$('#state').change(function(){
		var c =$(this).val();
		show1(c);
	});
});
function showState(a)
{
    var url = '/drop/class1.php';  
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
function show(b){
		 var urls='/drop/class2.php';
		 $.ajax({
		 	type:"GET",
		 	url:urls,
		 	data:"countrys="+b,
		 	success:function(result)
		 	{
		 		
		 		html="";
		 		obj1=jQuery.parseJSON(result);
		 		for(var key in obj1){
		 	html += "<option value=" + key + ">" + obj1[key] + "</option>"
		 		}
		 		document.getElementById("state").innerHTML = html;
		 	}	
		 });
}
function show1(c){
		 var urls='/drop/class3.php';
		 $.ajax({
		 	type:"GET",
		 	url:urls,
		 	data:"citys="+c,
		 	success:function(result)
		 	{
		 		
		 		html="";
		 		obj2=jQuery.parseJSON(result);
		 		for(var key in obj2){
		 		html += "<option value=" + key + ">" + obj2[key] + "</option>"
		 		}
		 		document.getElementById("city").innerHTML = html;
		 	}	
		 });
	}
</script>
</head>
<form>
	<select name="course" id="course" >
		 <option value="" > -----------Select----------- </option> 
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
<hr>
<?php  
mysql_select_db("world",$con);
?>
<form>
	<select id="country">
	<option value="">--------------Select---------------</option>
	<?php  
	$res=mysql_query("select * from countries");
	while($r1=mysql_fetch_row($res))
	{	
		echo "<option value='$r1[0]'>$r1[2]</option>";
	}
	?>
	</select>
	<div>
	<select id="state"></select>
	</div>
	<div>
	<select id="city"></select>
	</div>
</form>
</body>
</html>