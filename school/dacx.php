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
 <h1>档案查询与修改</h1>  
 <br><br>

  <div class="form-group">
    <label for="sno">输入要查询的学生学号 （查询成功后可修改）</label>
    <input id="num" type="text" class="form-control" name="sno" placeholder="请输入学号">
  </div>
  
  
  <button id="submit"  class="btn btn-default" >查询</button>
  <div  id="waiting"></div>

<form action="daxg.php" method="post" target="nm_iframe">
<table class="table">
<caption>学籍信息</caption>

<thead>
<tr>
<th>学号</th>
<th>班级</th>
<th>姓名</th>
<th>年龄</th>
<th>性别</th>
<th>籍贯</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>

<td id="t1" ></td>
<td id="t2"></td>
<td id="t3"></td>
<td id="t4"></td>
<td id="t5"> </td>
<td id="t6"></td>
<td id="t8"></td>


<td id="t7"></td>
<td id="t9"></td>
</tr>
</tbody>
</table>
</form>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>


<script type="text/javascript">   
$(document).ready(function(){
  $("button#submit").click(function(){
	 $("#waiting").html('<div class="alert alert-info" >Waiting......</div>');
    
  $.ajax({ 
             url: "ajax.php",   
             type: "POST", 
             data:{sno:$("#num").val()}, 
             dataType: "json", 
             error: function(){   
                 alert('Error loading XML document');   
				 jQuery.getScript("jquery.js");
  jQuery.getScript("bootstrap-3.3.7-dist/js/bootstrap.min.js");
             },   
             success: function(data,status){//如果调用php成功  
                
                $('#t1').html(data[0]);  
				$('#t2').html(data[1]); 
				$('#t3').html(data[2]); 
				$('#t4').html(data[3]); 
				$('#t5').html(data[4]); 
				$('#t6').html(data[5]); 
				$('#t7').html('<a id="xg"  class="btn btn-default" >修改</button>');
				$('#t9').html('<input id="t9" type="hidden" name="sno2" value="'+data[0]+'">');
				
				
				$("#waiting").html('<div class="alert alert-success">查询成功</div>');
				$("#xg").click(function(){
				$('#t1').html('<input type="text" name="sno" value="'+$('#t1').text()+'">');  
				$('#t2').html('<input type="text" name="sclass" value="'+$('#t2').text()+'">'); 
				$('#t3').html('<input type="text" name="sname" value="'+$('#t3').text()+'">'); 
				$('#t4').html('<input type="text" name="sage" value="'+$('#t4').text()+'">'); 
				$('#t5').html('<input type="text" name="ssex" value="'+$('#t5').text()+'">'); 
				$('#t6').html('<input type="text" name="saddr" value="'+$('#t6').text()+'">'); 
				$('#t8').html('<button id="tj" class="btn btn-default" type="submit" value="提交" name="submit">提交</button>');
				
})
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   