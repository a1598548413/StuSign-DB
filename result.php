<?
	session_start();
	header("Content-Type:text/html;charset=utf-8");

	
		if($_FILES["fileInput"]["error"]>0)
		{
			echo "<script language='javascript'>";
			echo "window.location.href='submit.php?error=-10000'";
			echo "</script>";
		}
		else{
			$student=iconv('utf-8','gbk',$_SESSION["stuID"]."".$_SESSION["stuName"]);
			$store_path="D:/.ѧ���ϴ����ļ�/".$student."/".$_FILES["fileInput"]["name"];
			$mkdir_path1="D:/.ѧ���ϴ����ļ�";
			if(!file_exists($mkdir_path1))
			{
				mkdir($mkdir_path1,0777);
				  
			}
			$mkdir_path2=$mkdir_path1."/".$student;
			if(!file_exists($mkdir_path2))
			{
				mkdir($mkdir_path2,0777);
			}
			if($_POST["td"]!="--ѡ��[�����༭]--" && $_POST["td"]!="")
			{
				$file=fopen($mkdir_path2."/".$_FILES["fileInput"]["name"]."_��ע.txt","a+");
				fwrite($file,$_POST["td"]);
				fclose($file);
			}
			
			if(file_exists($store_path))
			{
				echo "<script language='javascript'>";
				echo "window.location.href='submit.php?error=-1&fileName=".$_FILES["fileInput"]["name"]."'";
				echo "</script>";
			}else{
				if(move_uploaded_file($_FILES["fileInput"]["tmp_name"],$store_path))
				{
					echo "<script language='javascript'>";
					echo "window.location.href='submit.php?error=0'";
					echo "</script>";
				}else{
					echo "<script language='javascript'>";
					echo "window.location.href='submit.php?error=-2'";
					echo "</script>";
				}
			}
		}
?>
