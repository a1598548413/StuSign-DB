<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
<meta name="renderer" content="webkit">
<title>学生作业提交系统-作业提交</title>
<style type="text/css">
*{padding:0px; margin:0px;}
.main{width:380px; margin:50px auto; border:1px solid #F96; padding:10px 20px;}
.redSpan{color:#F33; font-size:14px; font-weight:bold;}
.blueSpan{color:#06F; font-size:14px}
.head a{margin-left:40px; background-color:#F63; width:70px; font-size:13px; padding:5px 10px; color:#FFF; text-decoration:none;}
.head a:hover{color:#666;}
.content{margin-top:10px;}
.content label{font-size:13px; color:#F33;}
.bz{font-size:13px; color:#F33; margin-top:10px;}
.fileInput{ color:#666;}
.subDiv{margin-top:10px; margin-left:150px;}
.sub{ color:#FFF; background-color:#F63;width:70px; font-size:13px; border:none; padding:3px 6px;}
.ta{font-size:13px; color:#999;}
</style>
</head>

<body>
	<?
	
	if(isset($_GET["error"]))
	{
		$error=$_GET["error"];
		if($error==0)
		{
			echo "<script language='javascript'>";
			echo "alert('作业上传成功！')";
			echo "</script>";
		}
		else if($error==-1){
			$fileName=$_GET["fileName"];
			echo "<script language='javascript'>";
			echo "alert('作业上传失败，在服务器中对应您的作业文件夹已存在名为 ".$fileName." 的文件')";
			echo "</script>";
		}	
		else{
			echo "<script language='javascript'>";
			echo "alert('作业上传失败，错误代码：".$error."\\n可能原因：上传文件过大')";
			echo "</script>";	
		}
	}
	?>
	<div class="main">
    	<div class="head">
			<span class="redSpan">当前提交作业学生：</span>
        	<span class="blueSpan"><? echo iconv('utf-8','gbk',$_SESSION["stuID"]." ".$_SESSION["stuName"])?></span>
       	 	<a href="stuSign.php">返回</a>
        </div>
        <div class="content">
            <form action="result.php" method="post" enctype="multipart/form-data">
            	<label>请选择要提交的作业：&nbsp;</label><input type="file" class="fileInput" name="fileInput" id="fileInput">
                <div class="bz">备注：</div>
                <script type="text/javascript">
					function changeText()
					{
						document.getElementById("ta").value="";	
					}
				</script>
                <textarea cols="51" rows="9" class="ta" id="ta" name="td" onmousedown="javascript:changeText()">--选填[单击编辑]--</textarea>
                <div class="subDiv"><input type="submit" value="提交作业" class="sub"/></div>
            </form>
        </div>
    </div>
</body>
</html>