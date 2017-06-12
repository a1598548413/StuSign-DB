<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>csvTOmysql</title>
</head>

<body>
<?
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
	$file=fopen("studentdata.csv","r");
	include 'mysqlConn.php';
	mysql_select_db("stuSign",$conn);
	mysql_query('set names utf8');
	while(!feof($file) && $data=fgetcsv($file))
	{
		$data[0]=getReal($data[0]);
		$data[1]=getReal($data[1]);
		$sql="insert into studata(stuID,stuName) values('$data[0]','$data[1]')";
		mysql_query($sql);
	}
	echo "csv数据录入mysql完成";
?>
</body>
</html>