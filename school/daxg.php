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

if(isset($_POST["submit"]) && $_POST["submit"] == "提交")  
{  
			$sno2=$_POST["sno2"];  
			$sno = $_POST["sno"];  
            $sclass = $_POST["sclass"]; 
			$sname = $_POST["sname"]; 
			$sage = $_POST["sage"]; 
			$ssex = $_POST["ssex"]; 
			$saddr = $_POST["saddr"];  
			
			if($sno == "" || $sclass == ""|| $sname == ""|| $sage == ""|| $ssex == ""|| $saddr == "")  
            {  
                echo "<script>alert('请输入全部信息！'); </script>";  
            }  
            else  
            {  $mysqli = new mysqli($server, $db_user, $db_passwd,$db_name);
                $mysqli->set_charset('utf8');
				$sql = "update student_info set sno=?,sclass=?,sname=?,sage=?,ssex=?,saddr=? where sno=?";
				
				$stmt = $mysqli->stmt_init();  
				
				$stmt ->prepare($sql);
				$stmt->bind_param('iisissi',$sno,$sclass,$sname,$sage,$ssex,$saddr,$sno2);
				$stmt->execute();
				$stmt->close();
				$mysqli->close();
				echo "<script>alert('提交成功！'); </script>";  
            }  
        }  
         
?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   