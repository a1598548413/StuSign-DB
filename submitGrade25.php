<?
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	include("mysqlConn.php");
	mysql_select_db("stusign",$conn);
	mysql_query("set names utf8");
	$sql="select herograde from gamehero where heroname='$_POST[heroname]'";
	$result=mysql_query($sql);
	if($result)
	{
		if(mysql_num_rows($result)!=0)
		{
			$ele=mysql_fetch_array($result);
			if((int)$ele["herograde"]>=(int)$_POST['herograde'])
			{
				echo "<script language='javascript'>";
				echo "alert('大侠您这次的分数没有超过您的最好水平哦~\\n您的最好水平为：$ele[herograde]    本次：$_POST[herograde]\\n我们只记录您的最好水平！')";
				echo "</script>";
			}else{
				$sql="update gamehero set herograde='$_POST[herograde]' where heroname='$_POST[heroname]'";
				if(mysql_query($sql))
				{
					echo "<script language='javascript'>";
					echo "alert('祝贺大侠再创新高！   分数：$_POST[herograde]\\n您的分数我们记住了~')";
					echo "</script>";	
				}else{
					echo "<script language='javascript'>";
					echo "alert('大侠，我们的数据库挂了，传不上去！\\n(错误3)')";
					echo "</script>";	
				}
			}
		}
		else{
			$sql="insert into gamehero values('$_POST[heroname]','$_POST[herograde]','25个数的三次机会')";
			if(mysql_query($sql))
			{
				echo "<script language='javascript'>";
				echo "alert('祝贺大侠再创新高！   分数：$_POST[herograde]\\n您的分数我们记住了~')";
				echo "</script>";	
			}else{
				echo "<script language='javascript'>";
				echo "alert('大侠，我们的数据库挂了，传不上去！\\n(错误2)')";
				echo "</script>";	
			}
		}	
	}else{
		echo "<script language='javascript'>";
		echo "alert('大侠，我们的数据库挂了，传不上去！\\n(错误1)')";
		echo "</script>";
	}
	
	
?>