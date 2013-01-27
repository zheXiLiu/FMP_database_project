<?php
	session_start();
	
	require_once 'SqlHelper.class.php';
	require_once 'stuService.class.php';
	require_once 'stu.class.php';
	
	if ($_SESSION['email'])
	{
		$email = $_SESSION['email'];
	
		$stuService = new stuService();
		$stuService->getStu($email);	
		
		if (!empty($_REQUEST['submitt']))
		{
			$stu = new Stu();
			$stu->email = $email;
			$stu->name = $_POST['name'];
			$stu->Cur_university = $_POST['Cur_university'];
			$stu->major = $_POST['major'];
			$stu->skills = $_POST['skills'];
			$stu->courses = $_POST['courses'];
			$stu->gpa = $_POST['gpa'];
			$stu->interest1 = $_POST['interest1'];
			$stu->interest2 = $_POST['interest2'];
			$stu->interest3 = $_POST['interest3'];
			$stu->fb = $_POST['fb'];
		
			
			$stuService = new stuService();
			$res = $stuService->updateStu($stu);
			if ($res == 1 )
			{
				echo "Success!<br>";
				echo "<a href = 'index.php'>Back to home page</a><br>";
				echo "<a href = 'editProfileUI.php'>Edit Profile<br>";
				echo "<a href = 'viewSelfProfile.php'>View Profile<br>";
			}
			else
			{
				echo "No Change Has Been Made!<br>";
				echo "<a href = 'index.php'>Back to home page</a><br>";
				echo "<a href = 'editProfileUI.php'>Edit Profile</a><br>";
				echo "<a href = 'viewSelfProfile.php'>View Profile</a><br>";
			}
		}
	}
	else
	{
		header("location: login.html");
	}

?>