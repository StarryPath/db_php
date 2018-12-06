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
<nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                      <a class="navbar-brand" href="index.jsp"> <?php echo $_SESSION['username']."，欢迎您"?></a>
                </div>
                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">                        
                         
                            
                    </ul>
                      
                </div>
              </div>
        </nav>

<div class="container col-md-3"> 
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#" id="xxzl.php" onclick="showAtRight(this)" >信息总览</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        学生档案 <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        
        <li><a href="#" id="rxgl.php" onclick="showAtRight(this) ">入学管理</a></li>
		<li class="divider"></li>
        <li><a href="# "id="bygl.php" onclick="showAtRight(this)">毕业管理</a></li>
		<li class="divider"></li>
        <li><a href="#" id="dacx.php" onclick="showAtRight(this)">档案查询与修改</a></li>
        
      </ul>
    </li>
	<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        学生成绩 <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#" id="cjsr.php" onclick="showAtRight(this)">成绩输入</a></li>
		<li class="divider"></li>
        <li><a href="#" id="cjcx.php" onclick="showAtRight(this)">成绩查询</a></li>
		<li class="divider"></li>
        <li><a href="#" id="glfa.php" onclick="showAtRight(this)">管理方案</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        系统维护 <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#" id="bf.php" onclick="showAtRight(this)">备份</a></li>
		<li class="divider"></li>
        <li><a href="#" id="hf.php" onclick="showAtRight(this)">恢复</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        系统安全 <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#"id="log.php" onclick="showAtRight(this)">登录日志</a></li>
      </ul>
    </li>
	<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        辅助功能 <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#" id="fltj.php" onclick="showAtRight(this)">分类统计</a></li>
      </ul>
    </li>
	
    
  </ul>
</div>

<div id="myManu"  class="container col-md-9"></div>
<script type="text/javascript">
       $(document).ready(function(){
$("#myManu").load( "xxzl.php",function() {
  jQuery.getScript("jquery.js");
  jQuery.getScript("bootstrap-3.3.7-dist/js/bootstrap.min.js");
})
       })
       
        
function showAtRight(data)
{
$("#myManu").load( data.id,function() {
  jQuery.getScript("jquery.js");
  jQuery.getScript("bootstrap-3.3.7-dist/js/bootstrap.min.js");
})}


</script>
	</body>
	
</html>