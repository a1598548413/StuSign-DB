<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>outUnsignData</title>
</head>

<body>
<?
	date_default_timezone_set("PRC");
	$today=date("Y-m-d");
	$filePath=dirname(__file__)."/历史未签到记录/未签到学生记录By".$today.".csv";
	$file=fopen(iconv('utf-8','gbk',$filePath),"w");
	$stuIDArr=unserialize($_SESSION["stuIDArr"]);
	$stuNameArr=unserialize($_SESSION["stuNameArr"]);
	for($i=0;$i<sizeof($stuIDArr);$i++)
	{
		fputcsv($file,array(iconv("utf-8","GBK",$stuIDArr[$i]),iconv("utf-8","GBK",$stuNameArr[$i])));	
	}
	fclose($file);
	echo "<script language='javascript'>";
	echo "window.location.href='teaAdmin.php?outSignMes=1&filePath=".$filePath."'";
	echo "</script>";
?>
</body>
</html>