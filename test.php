<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>Test</title>
</head>

<body>
	<?
		$file=fopen(dirname(_FILE_)."/studentData/studentData.txt","r");
		$stuDataArr=array();
		$count=-1;
		while(fgetc($file)!=false)
		{
			fseek($file,ftell($file)-1);
			$count++;
			$string=str_replace("\r\n","",fgets($file));
			$stuDataArr[$count]=$string;
			echo $stuDataArr[$count]."<br/>";
		}
		print_r($stuDataArr);
		fclose($file);
		$file=fopen(dirname(_FILE_)."/studentSignData/student".date(" Y-m-d").".txt","r");
		$stuSignDataArr=array();
		$count=-1;
		echo "<hr/>";
		while(fgetc($file)!=false)
		{
			fseek($file,ftell($file)-1);
			$count++;
			$string="";
			$countForReturn=0;
			for($countIn=0;$countIn!=2;)
			{
				$char=fgetc($file);
				$countForReturn++;
				if($char==" ")
				{
					$countIn++;
					if($countIn==1)
					{
						$string=$string.$char;
					}
					continue;
				}
				$string=$string.$char;	
			}
			fseek($file,ftell($file)-$countForReturn);
			fgets($file);
			$stuSignDataArr[$count]=$string;
			echo $stuSignDataArr[$count]."<br/>";
		}
		print_r($stuSignDataArr);
		$troubleStuArr=array_diff($stuDataArr,$stuSignDataArr);
		echo "<hr/>";
		print_r($troubleStuArr);
		if($stuSignDataArr[1]===$stuDataArr[0])
		{
			echo "Yes<br/>";
		}else{
			echo "No<br/>";	
		}
		$str1=$stuSignDataArr[1];
		$str2=$stuDataArr[0];
		echo "<hr/>".strlen($str1)." ".strlen($str2)."<hr/>";
		$test=array("143011 离队","143222 但是");
		$test2=array("1432232 巍峨","143011 离队");
		$test3=array_diff($test,$test2);
		if($test[0]===$test2[1])
		{
			echo "Yes<br/>";
		}else{
			echo "No<br/>";	
		}
		print_r($test3);
	?>
</body>
</html>