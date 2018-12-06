<?php  
include("setting.php");
session_start();
if (isset($_SESSION['username']) && !empty($_SESSION['username']))
{
	header("Content-type: text/html;charset=utf-8");
	error_reporting(E_ALL || ~E_NOTICE);
}
else 
{
	header('Location:login.html');
    exit();
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>学生学籍管理系统</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
	 body{padding: 70px} 
</style>
	<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
      <script src="jquery.js"></script>
      <!-- 包括所有已编译的插件 -->
      <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

   </head>
   <body>
   <?php
$a1=array();
$a2=array();
$a3=array();
$a4=array();
$a5=array();
$a6=array();
$a7=array();
$a8=array();
$a9=array();
$mysqli = new mysqli($server, $db_user, $db_passwd,$db_name);

$query = "SELECT  username,logintime,state,ip from log ";
$stmt = $mysqli->stmt_init();   
$stmt->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name,$time,$state,$ip);
while($stmt->fetch())
{
	array_push($a1,$name);
	array_push($a2,$time);
	array_push($a3,$state);
	array_push($a4,$ip);
	
}
$stmt->close();
$mysqli->close();
?>
 <h1>日志管理</h1>  
 <br><br>

  


<table class="table">

<thead>
<tr>
<th>用户名</th>
<th>登录时间</th>
<th>登录状态</th>
<th>ip地址</th>
</tr>
</thead>
<tbody id="ttt">
<?php
	for($i=0;$i<count($a1);$i++)
	{
		echo "<tr >";
		echo "<td>".$a1[$i]."</td>";
		echo "<td>".$a2[$i]."</td>";
		if($a3[$i]==1)
		echo "<td>登录成功</td>";
	else
		echo "<td>登录失败</td>";
		echo "<td>".$a4[$i]."</td>";

		echo "</tr>";
	}
  ?>
</tbody>
</table>



<script type="text/javascript">   
$(document).ready(function(){
  $("button#submit").click(function(){
	 $("#waiting").html('<div class="alert alert-info" >Waiting......</div>');
    
  $.ajax({ 
             url: "ajax2.php",   
             type: "POST", 
             data:{sno:$("#num").val()}, 
             dataType: "json", 
             error: function(){   
                 alert('Error loading XML document');   
				 
             },   
             success: function(data,status){//如果调用php成功  
                var arr = Object.keys(data); 
				for (var i=0;i<arr.length;i=i+4)
				{
					
					$('#ttt').append("<tr>");
					$('#ttt').append("<td>"+data[i]+"</td>");
					$('#ttt').append("<td>"+data[i+1]+"</td>");
					$('#ttt').append("<td>"+data[i+2]+"</td>");
					$('#ttt').append("<td>"+data[i+3]+"</td>");
					$('#ttt').append("</tr>");
				}
               
			
				$("#waiting").html('<div class="alert alert-success">查询成功</div>');
             } 
        }); 
})
$("input").keydown(function(event){
	 if (event.keyCode == "13"){//keyCode=13是回车键
	 $("button#submit").click();
		 
	 }
	 
});
})
</script>
</body>
</html>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   