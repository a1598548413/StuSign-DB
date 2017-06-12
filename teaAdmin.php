<? session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
<meta name="renderer" content="webkit">
<title>学生签到系统-教师管理界面</title>
<style type="text/css">
.all{margin:50px 20%; width:1000px; position:relative;}
.blueSpan{color:#39F; font-size:17px; font-weight:bold;}
.redSpan{color:#F00; font-weight:bold;}
.main{margin-top:15px;}
.mainTabl{border-collapse:collapse; text-align:center; border:2px solid #3C9; margin-top:10px;}
.mainTabl thead td{padding:10px 30px; background-color:#6C6; font-size:16px; font-weight:bold; color:#FFF;}

.mainTabl td{padding:5px 20px; background-color:#FFF;font-size:14px; color:#000;}
.changeTr:hover td{ background-color:#0CF; color:#FFF;}
.header{position:relative;}
.changeDiv{position:absolute; top:0px;left:600px;}
.getDiv{ position:absolute; top:0px;left:700px;}
.changeDiv input,.getDiv input{width:100px; height:25px; background-color:#09F; font-size:15px; color:#FFF; font-weight:bold;}
.delete{width:70px; height:25px; background-color:#F33;; font-size:14px; color:#FFF; font-weight:bold;}
.troubleStuDiv{ position:absolute; width:300px; left:30%; top:70px; z-index:100; visibility:hidden;}
.eat{position:absolute; top:0px; left:0px; width:100%; height:100%; opacity:0.7; background-color:#FFFFFF; z-index:2; visibility:hidden;}
.signDiv{ padding-left:55px; margin-top:10px;float:left;}
.signDiv input{width:70px; height:22px; background-color:#09F; font-size:13px; color:#FFF; font-weight:bold; }
.deleteA{ text-decoration:none; color:#FFF; font-size:13px; font-weight:bold; background-color:#F33; padding:4px 20px;}
.changePWDiv{position:absolute; width:300px; left:25%; top:40px;background-color:#F96; padding-top:10px; padding-bottom:10px; visibility:hidden; z-index:100; font-size:13px; border:1px #FF3333 solid;}
.changePWDiv div{margin-bottom:10px; margin-left:10px; position:relative;}
.changePWDiv label{display:block; width:80px; float:left;}
.time{font-size:13px; font-weight:bold; color:#0C6;}
.yjdc{text-decoration:none; font-size:12px; color:#39C; margin-left:20px;}
.unyjdc{text-decoration:none; font-size:12px; color:#39C; margin-left:10px; font-weight:bold;}
.exit{text-decoration:none; font-size:12px; color:#FFF; margin-left:10px; font-weight:bold; padding:5px 10px; background-color:#F33;}
</style>
</head>

<body>
	<?
	if(!isset($_SESSION["teaID"]))
	{
		echo "<script language='javascript'>";
		echo "window.location.href='teaLogin.php'";
		echo "</script>";
	}
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
	if(isset($_GET["cpresult"]))
	{
		if($_GET["cpresult"]==1)
		{
			echo "<script language='javascript'>";
			echo "alert('密码修改成功！')";
			echo "</script>";
		}
		else if($_GET["cpresult"]==0){
			echo "<script language='javascript'>";
			echo "alert('原密码错误！')";
			echo "</script>";
		}
		else if($_GET["cpresult"]==-1){
			echo "<script language='javascript'>";
			echo "alert('程序出错！')";
			echo "</script>";
		}	
	}
	if(isset($_GET["deleteID"]))
	{
		include "mysqlConn.php";
		mysql_select_db("stusign",$conn);
		$today=date("Y-m-d");
		$sql="delete from stusigndata where stuID='$_GET[deleteID]' and stuSignDate between '$today 00:00:00' and '$today 23:59:59'";
		mysql_query($sql);
		echo "<script language='javascript'>";
		echo "window.location.href='teaAdmin.php'";
		echo "</script>";
	}
	if(isset($_GET["outSignMes"]))
	{
		if($_GET["outSignMes"]==1)
		{
			echo "<script language='javascript'>";
			echo "alert('成功导出本次记录\\n CSV文件已被保存到:\\n".$_GET['filePath']." 中')";
			echo "</script>";	
		}	
	}
	?>
	<div class="all">
		<div class="header">
			<span class="blueSpan">欢迎进入教师管理界面：</span><span class="redSpan"><? echo $_SESSION["teaID"]?></span>
            <a href="teaLogin.php?exit=1" class="exit">退出登录</a>
                
    	</div>
    	<div class="main">
            	
    		<table class="mainTabl" border="1">
    			<caption><b>已签到学生名单如下<a href="outSignData.php" class="yjdc">[一键导出]</a></b></caption>
        		<thead><tr><td>学号</td><td>姓名</td><td>电话</td><td>QQ</td><td>IP地址</td><td>签到时间</td><td>撤销签到</td></tr></thead>
    			<?
				$stuDataIDArr=array();
				$stuSignIDArr=array();
				include "mysqlConn.php";
				mysql_select_db("stusign",$conn);
				mysql_query('set names utf8');
				$today=date("Y-m-d");
				$sql="select * from stusigndata where stuSignDate between '$today 00:00:00' and '$today 23:59:59'";
				$result=mysql_query($sql);
				if($result)
				{
					$countSignStu=mysql_num_rows($result);
					$count=0;
					while($ele=mysql_fetch_array($result))
					{
						$stuSignIDArr[$count]=$ele["stuID"];
						$count++;
						echo "<tr class='changeTr'>";
						echo "<td>".$ele["stuID"]."</td>";
						echo "<td>".$ele["stuName"]."</td>";
						echo "<td>".$ele["stuTel"]."</td>";
						echo "<td>".$ele["stuQQ"]."</td>";
						echo "<td>".long2ip($ele["stuSignIP"])."</td>";
						echo "<td>".$ele["stuSignDate"]."</td>";
						echo "<td><a class='deleteA' href='".$_SERVER["PHP_SELF"]."?deleteID=".($ele["stuID"])."'>撤销</a></td>";
						echo "</tr>";
						
					}
				}else{
					echo "sql语句错误 ".mysql_error()."<br/>";
				}
				echo "<span class='redSpan'>[本次签到人数：".$countSignStu."人]</span>";
				$sql="select * from studata";
				$result=mysql_query($sql);
				if($result)
				{
					$countStu=mysql_num_rows($result);
					echo "<span class='blueSpan'> [应签到人数：".$countStu."人]</span>";
					echo "<span class='time'> ".date("Y/m/d")."</span> ";
					$count=0;
					while($ele=mysql_fetch_array($result))
					{
						$stuDataIDArr[$count]=$ele["stuID"];
						$stuDataNameArr[$count]=$ele["stuName"];
						$count++;	
					}
				}
				?>
    			</table>
    		</div>
            <script>
			function openChangePWDiv()
			{
				document.getElementById("eat").style.visibility="visible";
				document.getElementById("changePWDiv").style.visibility="visible";
			}
            function openTroubleStuDiv()
			{
				document.getElementById("eat").style.visibility="visible";
				document.getElementById("troubleStuDiv").style.visibility="visible";
			}
			</script>
            <div class="changeDiv"><input type="button" onclick="javascript:openChangePWDiv()" value="修改密码"/></div>
            <div class="getDiv"><input type="button" onclick="javascript:openTroubleStuDiv()" value="未签到名单"/></div>
            <div class="changePWDiv" id="changePWDiv">
            	<script>
            		function ChangePW()
					{
						var newPW=document.getElementById("newPW").value;
						var rnewPW=document.getElementById("rnewPW").value;
						if(newPW!=rnewPW)
						{
							document.getElementById("newPW").value="";
							document.getElementById("rnewPW").value="";
							alert("两次输入的新密码不一致，请重新输入");	
						}else{
							document.getElementById("changePWForm").submit();
						}
						
					}
				</script>
            	<form action="changePW.php" method="post" id="changePWForm">
                	<div><label>原密码：</label><input type="password" name="oldPW"/><span class="redSpan"> *</span></div>
    				<div><label>新密码：</label><input type="password" name="newPW" id="newPW"/><span class="redSpan"> *</span></div>
    				<div><label>重复新密码：</label><input type="password" name="rnewPW" id="rnewPW"/><span class="redSpan"> *</span></div>
                    <div class="signDiv"><input type="button" onclick="javascript:ChangePW()" value="修 改"/></div>
                    <script>
            		function closeChangePWDiv()
					{
						document.getElementById("eat").style.visibility="hidden";
						document.getElementById("changePWDiv").style.visibility="hidden";
					}
					</script>
                    <div class="signDiv"><input type="button" onclick="javascript:closeChangePWDiv()" value="关 闭"/></div>
                </form>
            </div>
            <div class="troubleStuDiv" id="troubleStuDiv">
            <?
						
				$troubleStuIDArr=array_diff($stuDataIDArr,$stuSignIDArr);
				$newTroubleStuIDArr=array();
				$count=0;
				foreach($troubleStuIDArr as $tro){
					$newTroubleStuIDArr[$count]=$tro;
					$count++;	
				}
				$troubleStuNameArr=array();
				for($i=0;$i<sizeof($newTroubleStuIDArr);$i++)
				{
					$sql="select stuName from studata where stuID='".$newTroubleStuIDArr[$i]."'";
					$result=mysql_query($sql);
					if($result)
					{
								
						$ele=mysql_fetch_array($result);
						$troubleStuNameArr[$i]=$ele["stuName"];
					}else{
						echo "sql语句错误 ".mysql_error()."<br/>";
					}	
				}
				$_SESSION["stuIDArr"]=serialize($newTroubleStuIDArr);
				$_SESSION["stuNameArr"]=serialize($troubleStuNameArr);
			?>
            <table class="mainTabl" border="1">
            		<caption><span class="redSpan">未签到学生名单</span><a href="outUnsignData.php?<?php echo $iamtoolong ?>" class="unyjdc">[一键导出]</a></caption>
        			<thead><tr><td>学号</td><td>姓名</td></tr></thead>
                    
                    <?
						for($i=0;$i<sizeof($newTroubleStuIDArr);$i++)
						{
							
							echo "<tr class='changeTr'>";
							echo "<td>".$newTroubleStuIDArr[$i]."</td>";
							echo "<td>".$troubleStuNameArr[$i]."</td>";
							echo "</tr>";
						}
                    ?>
            </table>
            <script>
            function closeTroubleStuDiv()
			{
				document.getElementById("eat").style.visibility="hidden";
				document.getElementById("troubleStuDiv").style.visibility="hidden";
			}
			</script>
            <div class="signDiv"><input type="button" onclick="javascript:closeTroubleStuDiv()" value="知 道 了" /></div>
            </div>
            <div class="eat" id="eat">
			</div>
    	</div>
        

    
</body>
</html>