<? 
	session_start();
	if(isset($_GET["exit"]))
	{
		if($_GET["exit"]==1)
		{
			unset($_SESSION["teaID"]);
		}	
	}
	if(isset($_SESSION["teaID"]))
	{
		echo "<script language='javascript'>";
		echo "window.location.href='teaAdmin.php'";
		echo "</script>";	
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
<meta name="renderer" content="webkit">
<title>学生签到系统-教师登录</title>
<style type="text/css">
*{margin:0xp; padding:0px;}
.teaLogin{ position:relative;margin:100px auto; width:300px; border:1px solid #F96; font-size:18px; font-weight:bold; padding:10px;}
.main{background-color:#F96; padding-top:10px; padding-bottom:10px;}
.main div{margin-bottom:10px; margin-left:10px; position:relative;}
.main label{display:block; width:66px; float:left;}
.redSpan{color:#F00;}
.LoginDiv{ padding-left:100px;}
.LoginDiv input{width:70px; height:30px; background-color:#09F; font-size:15px; color:#FFF; font-weight:bold;}
</style>
</head>
<?
	date_default_timezone_set("PRC");
	function getReal($str)  
	{  
		$str = trim($str);  
		$str=strip_tags($str,"");  
		$str=preg_replace("{\t}","",$str);  
		$str=preg_replace("{\r\n}","",$str);  
		$str=preg_replace("{\r}","",$str);  
		$str=preg_replace("{\n}","",$str);  
		$str=preg_replace("{ }","",$str);  
		return $str;  
	}
	if(isset($_POST["teaID"]))
	{
		include "mysqlConn.php";
		mysql_select_db("stusign",$conn);
		$postTeaID=getReal($_POST["teaID"]);
		$postTeaPassword=getReal($_POST["teaPassword"]);
		$sql="select * from teadata";
		$result=mysql_query($sql);
		if($result)
		{
			if($ele=mysql_fetch_array($result))
			{
				$teaID=$ele["teaID"];
				$teaPassword=$ele["teaPassword"];
				if($teaID==$postTeaID && $teaPassword==$postTeaPassword)
				{
					$_SESSION["teaID"]=$teaID;
					echo "<script language='javascript'>";
					echo "window.location.href='teaAdmin.php'";
					echo "</script>";	
				}
				else if($teaID==$postTeaID && $teaPassword!=$postTeaPassword){
					echo "<script language='javascript'>";
					echo "alert('教师账号正确但密码错误，请重新登陆！')";	
					echo "</script>";
				}
				else if($teaID!=$postTeaID){
					echo "<script language='javascript'>";
					echo "alert('教师账号错误，请重新登陆！')";	
					echo "</script>";
				}		
			}	
		}else{
			echo "sql语句错误 ".mysql_error()."<br/>";	
		}
	}
?>
<body>
	<div class="teaLogin" id="teaLogin">
		<div class="main">
			<form action="<? echo $_SERVER["PHP_SELF"] ?>" method="post">
        		<div><label>账号：</label><input type="text" name="teaID"/><span class="redSpan"> *</span></div>
    			<div><label>密码：</label><input type="password" name="teaPassword"/><span class="redSpan"> *</span></div>
        		<div class="LoginDiv"><input type="submit" value="登 录"/></div>
			</form>
    	</div>
    </div>
</body>
</html>