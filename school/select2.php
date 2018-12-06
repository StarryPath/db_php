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
		<script src="echarts.min.js"></script>
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
$sel=$_REQUEST["sel"];
if(isset($sel))
{
if($sel=="优秀")
{
	$gg=90;
	$tt=101;
}
else if($sel=="良好")
{
	$gg=80;
	$tt=90;
}
else if($sel=="合格")
{
	$gg=60;
	$tt=80;
}
else
{
	$tt=60;
	$gg=-1;
}
//echo $sel;
$mysqli = new mysqli($server, $db_user, $db_passwd,$db_name);
$mysqli->set_charset('utf8');
$query = "SELECT  student_info.sno,sclass,sname,year,term,grade,sage,ssex,saddr from student_info   left   join   grade_info     on  student_info.sno=grade_info.sno group by student_info.sno having avg(grade)>=? and avg(grade)<? ";
//echo $query;
$stmt = $mysqli->stmt_init();   
$stmt->prepare($query);

$stmt->bind_param('ii',$gg,$tt);
$stmt->execute();
//echo $stmt->errno;
$stmt->store_result();
$stmt->bind_result($sno,$sclass,$sname,$year,$term,$grade,$sage,$ssex,$saddr);

while($stmt->fetch())
{
	array_push($a1,$sno);
	array_push($a2,$sclass);
	array_push($a3,$sname);
	array_push($a4,$year);
	array_push($a5,$term);
	array_push($a6,$grade);
	array_push($a7,$sage);
	array_push($a8,$ssex);
	array_push($a9,$saddr);

}
$stmt->close();
$mysqli->close();
}
?>
 <h1>信息总览</h1>  
 <br>
 <div class="input-group col-md-3" style="margin-top:0px positon:relative">
       <input type="text" id="xm" class="form-control"placeholder="模糊查询姓名" / >
            <span class="input-group-btn">
               <button id="search"class="btn btn-info btn-search">查找</button>
               
            </span>
			
 </div>
 <div  id="waiting"></div>
<br>
 
<table class="table table-striped">

  <thead>
    <tr>
      <th>学号</th>
      <th>班级</th>
      <th>姓名</th>
	  <th>学年</th>
	  <th>学期</th>
	  <th>分数</th>
	  <th>年龄</th>
	  <th>性别</th>
	  <th>籍贯</th>
    </tr>
  </thead>
  <tbody id="ttt">
<?php
	//echo count($a1);
	for($i=0;$i<count($a1);$i++)
	{
		echo "<tr >";
		echo "<td>".$a1[$i]."</td>";
		echo "<td>".$a2[$i]."</td>";
		echo "<td>".$a3[$i]."</td>";
		echo "<td>".$a4[$i]."</td>";
		echo "<td>".$a5[$i]."</td>";
		echo "<td>".$a6[$i]."</td>";
		echo "<td>".$a7[$i]."</td>";
		echo "<td>".$a8[$i]."</td>";
		echo "<td>".$a9[$i]."</td>";
		echo "</tr>";
		
	}
	//echo "<script>alert('提交成功！');</script>";  
?>
  
  </tbody>
</table>
<script type="text/javascript">   
$(document).ready(function(){
  $("button#search").click(function(){
	 $("#waiting").html('<div class="alert alert-info" >Waiting......</div>');
    
  $.ajax({ 
             url: "ajax4.php",   
             type: "POST", 
             data:{sname:$("#xm").val()}, 
             dataType: "json", 
             error: function(){   
                 alert('Error loading XML document');   
				 
             },   
             success: function(data,status){//如果调用php成功  
                var arr = Object.keys(data); 
				$('#ttt').html("");
				for (var i=0;i<arr.length;i=i+9)
				{
					
					$('#ttt').append("<tr>");
					$('#ttt').append("<td>"+data[i]+"</td>");
					$('#ttt').append("<td>"+data[i+1]+"</td>");
					$('#ttt').append("<td>"+data[i+2]+"</td>");
					$('#ttt').append("<td>"+data[i+3]+"</td>");
					$('#ttt').append("<td>"+data[i+4]+"</td>");
					$('#ttt').append("<td>"+data[i+5]+"</td>");
					$('#ttt').append("<td>"+data[i+6]+"</td>");
					$('#ttt').append("<td>"+data[i+7]+"</td>");
					$('#ttt').append("<td>"+data[i+8]+"</td>");
					$('#ttt').append("</tr>");
				}
               
			
				$("#waiting").html('<div class="alert alert-success">查询成功</div>');
             } 
        }); 
})
$("input").keydown(function(event){
	 if (event.keyCode == "13"){//keyCode=13是回车键
	 $("button#search").click();
		 
	 }
	 
});
})
</script>


  
</body>
</html>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   