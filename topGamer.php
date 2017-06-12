<?
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	include("mysqlConn.php");
	mysql_select_db("stusign",$conn);
	mysql_query("set names utf8");
	$sql="select heroname,herograde from gamehero order by herograde desc";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<caption><b>英雄榜</b></caption>";
		echo "<thead><tr><td>排名</td><td>玩家</td><td>分数</td</tr></thead>";
		$count=0;
		while($ele=mysql_fetch_array($result))
		{
			$count++;
			echo "<tr>";
			echo "<td>".$count."</td>";
			echo "<td>".$ele["heroname"]."</td>";
			echo "<td>".$ele["herograde"]."</td>";
			echo "</tr>";
				
		}	
	}else{
		echo "<script language='javascript'>";
		echo "alert('大侠,非常抱歉，我们的数据库出错了！')";
		echo "</script>";	
	}
?>