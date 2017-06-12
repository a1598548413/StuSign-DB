<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
<meta name="renderer" content="webkit">
<title>学生签到系统-学生签到结果</title>
<style type="text/css">
.all{margin:50px 23%; width:800px;}
.blueSpan{color:#39F; font-size:17px; font-weight:bold;}
.redSpan{color:#F00; font-weight:bold;}
.main{margin-top:20px;}
.mainTabl{border-collapse:collapse; text-align:center; border:2px solid #3C9; }
.mainTabl thead td{padding:10px 30px; background-color:#6C6; font-size:16px; font-weight:bold; color:#FFF;}

.mainTabl td{padding:5px 20px; background-color:#FFF;font-size:14px; color:#000;}
.changeTr:hover td{ background-color:#0CF; color:#FFF;}
.tjzy{font-size:13px; color:#FFF; text-decoration:none; padding:5px 10px; background-color:#F63; position:relative; left:200px;}
</style>
</head>

<body>
	
    <div class="all">
	<div class="header">
	<?
		echo "<span class='blueSpan'>".$_SESSION["stuID"]."</span> "."<span class='blueSpan'>".$_SESSION["stuName"]."</span> 已签到成功 <span class='redSpan'>本机IP已和该学生绑定</span>";
	?>
    <script type="text/javascript">
	function open_no()
	{
		alert("抱歉，本功能暂时被关闭了！");	
	}
	</script>
     <a href="submit.php" class="tjzy">提交作业</a>
     <a href="javascript:open_no()" class="tjzy">课后游戏</a>
    </div>
    <div class="main">
    <table class="mainTabl" border="1">
    	<caption><b>您的签到信息如下</b></caption>
        <thead><tr><td>学号</td><td>姓名</td><td>电话</td><td>QQ</td><td>IP地址</td><td>签到时间</td></tr></thead>
    		<tr>
            	<td><? echo $_SESSION["stuID"]?></td>
                <td><? echo $_SESSION["stuName"]?></td>
                <td><? echo $_SESSION["stuTel"]?></td>
                <td><? echo $_SESSION["stuQQ"]?></td>
                <td><? echo $_SESSION["stuSignIP"]?></td>
                <td><? echo $_SESSION["stuSignDate"]?></td>
            </tr>
    </table>
    </div>
    </div>
</body>
</html>