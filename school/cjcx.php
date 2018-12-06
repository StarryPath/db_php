<?php  
session_start();
include("setting.php");
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
 <h1>成绩查询</h1>  
 <br><br>

  <div class="form-group">
    <label for="sno">输入要查询的学生学号</label>
    <input id="num" type="text" class="form-control" name="sno" placeholder="请输入学号">
  </div>
  
  
  <button id="submit"  class="btn btn-default" >提交</button>
  <div  id="waiting"></div>


<table class="table">
<caption>学生成绩</caption>
<thead>
<tr>
<th>学号</th>
<th>学年</th>
<th>学期</th>
<th>成绩</th>
</tr>
</thead>
<tbody id="ttt">

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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   