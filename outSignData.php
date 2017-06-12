<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>outSignData</title>
</head>
<body>
<?php
	include_once("mysqlConn.php");
	mysql_select_db("stusign",$conn);
	mysql_query('set names utf8');
	date_default_timezone_set("PRC");
	$today=date("Y-m-d");
	$filePath=dirname(__file__)."/历史签到记录/学生签到记录By".$today.".csv";
	$file=fopen(iconv('utf-8','gbk',$filePath),"w");
	$sql="select * from stusigndata where stuSignDate between '$today 00:00:00' and '$today 23:59:59'";
	$result=mysql_query($sql);
	if($result)
	{
		while($ele=mysql_fetch_array($result))
		{
				fputcsv($file,array(iconv("utf-8","GBK",$ele["stuID"]),iconv("utf-8","GBK",$ele["stuName"]),iconv("utf-8","GBK",$ele["stuTel"]),iconv("utf-8","GBK",$ele["stuQQ"]),iconv("utf-8","GBK",long2ip($ele["stuSignIP"])),iconv("utf-8","GBK",$ele["stuSignDate"])));
		}	
	}
	fclose($file);
	echo "<script language='javascript'>";
	echo "window.location.href='teaAdmin.php?outSignMes=1&filePath=".$filePath."'";
	echo "</script>";
?>
</body>
</html>