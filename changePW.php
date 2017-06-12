<?
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	$cpresult;
	if(!isset($_SESSION["teaID"]))
	{
		echo "<script language='javascript'>";
		echo "window.location.href='teaLogin.php'";
		echo "</script>";	
	}else{
		include "mysqlConn.php";
		mysql_select_db("stuSign",$conn);
		$sql="select teaPassword from teadata where teaID='$_SESSION[teaID]'";
		$result=mysql_query($sql);
		if($result)
		{
			$ele=mysql_fetch_array($result);
			if($_POST["oldPW"]==$ele["teaPassword"])
			{
				$sql="update teadata set teaPassword='$_POST[newPW]' where teaID='$_SESSION[teaID]'";
				if(mysql_query($sql))
				{
					$cpresult=1;
				}else{
					$cpresult=-1;	
				}
			}
			else{
				$cpresult=0;	
			}
			echo "<script language='javascript'>";
			echo "window.location.href='teaAdmin.php?cpresult=".$cpresult."'";
			echo "</script>";
		}else{
			echo "sql语句错误 ".mysql_error()."<br/>";
		}
		
	}
?>