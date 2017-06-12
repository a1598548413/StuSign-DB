<?
	session_start();
	header("Content-Type:text/html;charset=utf-8");
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
	date_default_timezone_set("PRC");
	include "mysqlConn.php";
	mysql_select_db("stusign",$conn);
	mysql_query('set names utf8');
	$stuSignIP=ip2long($_SERVER["REMOTE_ADDR"]);
	$today=date("Y-m-d");
	$sql="select * from stusigndata where stuSignIP=$stuSignIP and stuSignDate between '$today 00:00:00' and '$today 23:59:59'";
	$result=mysql_query($sql);
	if($result)
	{
		if(mysql_num_rows($result)!=0)
		{
			$ele=mysql_fetch_array($result);
			$stuID=$ele["stuID"];
			$stuName=$ele["stuName"];
			$stuTel=$ele["stuTel"];
			$stuQQ=$ele["stuQQ"];
			$stuSignIP=long2ip($ele["stuSignIP"]);
			$stuSignDate=$ele["stuSignDate"];
			$_SESSION["stuID"]=$stuID;
			$_SESSION["stuName"]=$stuName;
			$_SESSION["stuTel"]=$stuTel;
			$_SESSION["stuQQ"]=$stuQQ;
			$_SESSION["stuSignIP"]=$stuSignIP;
			$_SESSION["stuSignDate"]=$stuSignDate;
			echo "<script language='javascript'>";
			echo "window.location.href='stuResult.php'";
			echo "</script>";
		}else{
			if(isset($_POST["stuID"]))
			{
				if(!empty($_POST["stuID"]) && !empty($_POST["stuName"]) && !empty($_POST["stuTel"]) && !empty($_POST["stuQQ"]))
				{
				$stuID=getReal($_POST["stuID"]);
				$stuName=getReal($_POST["stuName"]);
				$stuTel=getReal($_POST["stuTel"]);
				$stuQQ=getReal($_POST["stuQQ"]);
				$stuSignIP=ip2long($_SERVER["REMOTE_ADDR"]);
				$stuSignDate=date("Y/m/d-H:i:s");
				$sql="insert into stusigndata values('$stuID','$stuName','$stuTel','$stuQQ',$stuSignIP,'$stuSignDate')";
				mysql_query($sql);
				$_SESSION["stuID"]=$stuID;
				$_SESSION["stuName"]=$stuName;
				$_SESSION["stuTel"]=$stuTel;
				$_SESSION["stuQQ"]=$stuQQ;
				$_SESSION["stuSignIP"]=$_SERVER["REMOTE_ADDR"];
				$_SESSION["stuSignDate"]=$stuSignDate;
				$stuSignIP=$_SERVER["REMOTE_ADDR"];
				echo "<script language='javascript'>";
				echo "window.location.href='stuResult.php?stuID=".$stuID."&stuName=".$stuName."&stuTel=".$stuTel."&stuQQ=".$stuQQ."&stuSignIP=".$stuSignIP."&stuSignDate=".$stuSignDate."'; ";
				echo "</script>";
				}
			}
		}
	}else{
		echo "sql语句错误 ".mysql_error()."<br/>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
<meta name="renderer" content="webkit">
<head>

<title>学生签到系统-学生签到</title>
<style type="text/css">
*{margin:0xp; padding:0px;}
.studentSign{ position:relative;margin:100px auto; width:300px; border:1px solid #F96; font-size:18px; font-weight:bold; padding:10px;}
.main{background-color:#F96; padding-top:10px; padding-bottom:10px;}
.main div{margin-bottom:10px; margin-left:10px; position:relative;}
.main label{display:block; width:66px; float:left;}
.redSpan{color:#F00;}
.signDiv{ padding-left:100px;}
.signDiv input{width:70px; height:30px; background-color:#09F; font-size:15px; color:#FFF; font-weight:bold;}
.tips{ position:absolute; top:-80px; font-size:10px;}
</style>
</head>

<body>
	<div class="studentSign" id="studentSign">
    	<div class="tips">
        	<p class="redSpan"> *注意：一个IP地址只能签到一位学生，在提交信息前请仔细确认，如果填写错误请到教师处申请重新签到</p>
            <p class="redSpan"> *注意：请填写完整信息，否则无法签到</p>
        </div>
    	<div class="main">
		<form action=<? echo $_SERVER["PHP_SELF"] ?> method="post" id="form1">
        	
			<div><label>学号：</label><input type="text" name="stuID" id="stuID"/><span class="redSpan"> *</span></div>
    		<div><label>姓名：</label><input type="text" name="stuName" id="stuName"/><span class="redSpan"> *</span></div>
    		<div><label>手机：</label><input type="text" name="stuTel" id="stuTel"/><span class="redSpan"> *</span></div>
    		<div><label>QQ：</label><input type="text" name="stuQQ" id="stuQQ"/><span class="redSpan"> *</span></div>
            <div><label>IP：</label><? echo $_SERVER["REMOTE_ADDR"]?></div>
            <script type="text/javascript">
			function qd()
			{
				if(document.getElementById("stuID").value=="" || document.getElementById("stuName").value==""
				    || document.getElementById("stuTel").value=="" || document.getElementById("stuQQ").value=="")
				{
					alert("请输入完整信息！");	
				}else{
					var isright=1;
					if(isNaN(document.getElementById("stuID").value))
					{
						isright=0;
						alert("学号必须仅由数字构成，请重新输入！");
						document.getElementById("stuID").value="";
						
					}else{
						if(document.getElementById("stuID").value.length!=8)
						{
							isright=0;
							alert("学号位数不正确，请重新输入！");
							document.getElementById("stuID").value="";
						}	
					}
					if(!document.getElementById("stuName").value.match(/^[\u4e00-\u9faf]+$/))
					{
						isright=0;
						alert("姓名必须由汉字构成，请重新输入！");
						document.getElementById("stuName").value="";	
					}
					if(isNaN(document.getElementById("stuTel").value))	
					{
						isright=0;
						alert("手机号码必须仅由数字构成，请重新输入！");
						document.getElementById("stuTel").value="";
					}else{
						if(document.getElementById("stuTel").value.length!=11)
						{
							isright=0;
							alert("手机号码位数不正确，请重新输入！");
							document.getElementById("stuTel").value="";
						}	
					}
					if(isNaN(document.getElementById("stuQQ").value))	
					{
						isright=0;
						alert("QQ号码必须仅由数字构成，请重新输入！");
						document.getElementById("stuQQ").value="";
					}else{
						if(document.getElementById("stuQQ").value.length>10 || document.getElementById("stuQQ").value.length<5)
						{
							isright=0;
							alert("QQ号码位数应该在5~10位之间，请重新输入！");
							document.getElementById("stuQQ").value="";
						}	
					}
					if(isright==1)
					{
						document.getElementById("form1").submit();
					}
				}
			}
			</script>
        	<div class="signDiv"><input type="button" value="签 到" onclick="javascript:qd()"/></div>
		</form>
        </div>
        
	</div>
</body>
</html>