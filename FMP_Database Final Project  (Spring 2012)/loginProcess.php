<?php
	
	session_start();	
	$email = $_POST['email'];
	$password = $_POST["password"];
	require_once "SqlHelper.class.php";
	
	if ($email && $password)
	{
			$sqlHelper = new SqlHelper();
			
			$sql = "SELECT * FROM stu WHERE email = '$email'";
			$sql = $sqlHelper->execute_dql($sql);
			
			$numrows = mysql_num_rows ($sql);
			
			if ($numrows != 0 )
			{	
				while ($rows = mysql_fetch_assoc($sql))
				{
					$dbemail = $rows['email'];
					$dbpassword = $rows['password'];
				}
				
                $enc_password = md5($password); 
				
				if ($email == $dbemail && $enc_password == $dbpassword )
				{
					$_SESSION['email'] = $dbemail;
					header ("Location: index.php");
				}
				else
				{
					header ("Location: login.php?errno=1");
					exit();
				}
			}
			else
			{
				header("Location: login.php?errno=2");
				exit();
			}
	}
	else
	{
		header("Location: login.php?errno=3");
		exit();
	}
	mysql_free_result($sql);
?>