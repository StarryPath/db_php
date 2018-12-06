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
 <h1>管理方案</h1>  
 <br><br>

  <div class="form-group">
    <label for="sno">输入要查询的学生学号</label>
    <input id="num" type="text" class="form-control" name="sno" placeholder="请输入学号">
  </div>
  
  
  <button id="submit"  class="btn btn-default" >提交</button>
  <div  id="waiting"></div>


<table class="table">
<thead>
<tr>
<th>学号</th>
<th>总成绩</th>
<th>学期数</th>
<th>平均成绩</th>
<th>评价</th>
</tr>
</thead>
<tbody id="ttt">
<td id="t1"></td>
<td id="t2"></td>
<td id="t3"></td>
<td id="t4"></td>
<td id="t5"> </td>
</tbody>
</table>



<script type="text/javascript">   
$(document).ready(function(){
  $("button#submit").click(function(){
	 $("#waiting").html('<div class="alert alert-info" >Waiting......</div>');
    
  $.ajax({ 
             url: "ajax3.php",   
             type: "POST", 
             data:{sno:$("#num").val()}, 
             dataType: "json", 
             error: function(){   
                 alert('Error loading XML document');   
				 
             },   
             success: function(data,status){//如果调用php成功  
                
                $('#t1').html($("#num").val()); 
				$('#t2').html(data[0]); 
				$('#t3').html(data[1]); 
				$('#t4').html(data[2]); 
				if(data[2]>=90)
				{
					$('#t5').html('<p class="text-success">优秀</p>'); 
				}	
				else if (data[2]>=80)
				{
					$('#t5').html('<p class="text-success">良好</p>'); 
				}
				else if (data[2]>=60)
				{
					$('#t5').html('<p class="text-warning">合格</p>'); 
				}
				else 
				{
					$('#t5').html('<p class="text-danger">退学</p>'); 
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   