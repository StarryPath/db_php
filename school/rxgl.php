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
 <h1>入学管理</h1>  
<form role="form" action="rxgl.php" method="post" target="nm_iframe">
  <div class="form-group">
    <label for="sno">学号</label>
    <input type="text" class="form-control" name="sno" placeholder="请输入学号">
  </div>
  <div class="form-group">
    <label for="sclass">班级</label>
    <input type="text" class="form-control" name="sclass" placeholder="请输入班级">
  </div>
  <div class="form-group">
    <label for="sname">姓名</label>
    <input type="text" class="form-control" name="sname" placeholder="请输入姓名">
  </div>
  <div class="form-group">
    <label for="sage">年龄</label>
    <input type="text" class="form-control" name="sage" placeholder="请输入年龄">
  </div>
  <div class="form-group">
    <label for="ssex">性别</label>
    <input type="text" class="form-control" name="ssex" placeholder="请输入性别">
  </div>
  <div class="form-group">
    <label for="saddr">籍贯</label>
    <input type="text" class="form-control" name="saddr" placeholder="请输入籍贯">
  </div>

  
  <button type="submit" class="btn btn-default" value="提交" name="submit">提交</button>
</form>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>
</body>
</html>
<?php  
if(isset($_POST["submit"]) && $_POST["submit"] == "提交")  
{  
    $sno = $_POST["sno"];  
    $sclass = $_POST["sclass"]; 
	$sname = $_POST["sname"]; 
	$sage = $_POST["sage"]; 
	$ssex = $_POST["ssex"]; 
	$saddr = $_POST["saddr"];
	
	
	
				
    if($sno == "" || $sclass == ""|| $sname == ""|| $sage == ""|| $ssex == ""|| $saddr == "")  
    {  
        echo "<script>alert('请输入全部信息！');</script>";  
    }  
    else  
    {  
        $mysqli = new mysqli($server, $db_user, $db_passwd,$db_name);
        $mysqli->set_charset('utf8');
		$sql = "insert into student_info(sno,sclass,sname,sage,ssex,saddr) values(?,?,?,?,?,?)";
		
		$stmt = $mysqli->stmt_init();  
		
		$stmt ->prepare($sql);
		$stmt->bind_param('iisiss',$sno,$sclass,$sname,$sage,$ssex,$saddr);
		$stmt->execute();
		if($stmt->errno===1062)
		{
			echo "<script>alert('学号重复！'); </script>"; 
		}
		else 
		{
			echo "<script>alert('提交成功！'); </script>";  
		}
		$stmt->close();
		$mysqli->close();
		
    }  
}  
        
?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   