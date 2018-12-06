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
		<script src="echarts.min.js"></script>
   </head>
   <body>
<?php
$mysqli = new mysqli($server, $db_user, $db_passwd,$db_name);

$query = "SELECT count(*) from student_info where ssex = '男'";
$stmt = $mysqli->stmt_init();   
$stmt->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($num_m);//男生数
$stmt->fetch();

$query2 = "SELECT count(*) from student_info where ssex = '女'";
$stmt = $mysqli->stmt_init();   
$stmt->prepare($query2);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($num_w);//女生数
$stmt->fetch();

$query3 = "SELECT avg(grade) from grade_info group by sno;";
$stmt = $mysqli->stmt_init();   
$stmt->prepare($query3);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($score);//成绩
$a=0;$b=0;$c=0;$d=0;
while($stmt->fetch())
{
	if($score>=90)
		$a=$a+1;
	else if($score>=80)
		$b=$b+1;
	else if($score>=60)
		$c=$c+1;
	else 
		$d=$d+1;
}

$stmt->close();
$mysqli->close();
?>
 <h1>分类统计</h1>  
 <br><br>
 <div id="main" style="width: 600px;height:400px;"></div>
 <div id="two" style="width: 600px;height:400px;"></div>
    <script>
        // 绘制图表。
 var myChart=echarts.init(document.getElementById('main'));
 
 
 var option={
            title: {
            text: '男女比例'
					},
			series : [
			{
            name: '男女人数',
            type: 'pie',
            radius: '75%',
            data:[
                {value:<?php echo $num_m?>, name:'男'},
                {value:<?php echo $num_w?>, name:'女'}
                
            ],
			label : {
normal : {
formatter: '{b}:{c}: ({d}%)',
textStyle : {
fontWeight : 'normal',
fontSize : 15
}
}
}
        }
    ]
        };
		myChart.setOption(option);
    </script>
	<script>
        // 绘制图表。
var myChart2=echarts.init(document.getElementById('two'));
var option2={
            title: {
            text: '管理方案'
					},
			series : [
			{
            name: '管理方案',
            type: 'pie',
            radius: '75%',
			label : {
normal : {
formatter: '{b}:{c}: ({d}%)',
textStyle : {
fontWeight : 'normal',
fontSize : 15
}
}
},
            data:[
                {value:<?php echo $a?>, name:'优秀'},
                {value:<?php echo $b?>, name:'良好'},
				{value:<?php echo $c?>, name:'合格'},
                {value:<?php echo $d?>, name:'退学'}
                
            ]
        }
    ]
        };
		myChart2.setOption(option2);
		myChart.on('click', function (params) {
    window.open('select.php?sel=' + encodeURIComponent(params.name));
});
myChart2.on('click', function (params) {
    window.open('select2.php?sel=' + encodeURIComponent(params.name));
});
    </script>

  
</body>
</html>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   