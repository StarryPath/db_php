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
 <h1>成绩输入</h1>  
 <br><br>
  <form role="form" action="check_cjsr.php" method="post" target="nm_iframe">
  <div class="form-group">
    <label for="sno">学号</label>
    <input type="text" class="form-control" name="sno" placeholder="请输入学号">
  </div>
  <div class="form-group">
    <label for="year">学年</label>
    <input type="text" class="form-control" name="year" placeholder="请输入学年">
  </div>
  <div class="form-group">
    <label for="term">学期</label>
    <input type="text" class="form-control" name="term" placeholder="请输入学期">
  </div>
  <div class="form-group">
    <label for="grade">成绩</label>
    <input type="text" class="form-control" name="grade" placeholder="请输入成绩">
  </div>
  
 
  <button type="submit" class="btn btn-default" value="提交" name="submit">提交</button>
</form>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>
 </body>
 </html>