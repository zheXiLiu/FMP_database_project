<?php
	session_start();
	require_once 'stu.class.php';
	require_once 'stuService.class.php';
	
	if ($_SESSION['email'])
	{
		$email = $_SESSION['email'];
		
		$stuService = new stuService();
		$stu = new Stu();
		$stu = $stuService->getStu($email);
		
		
	}
	else
	{
		header("location: login.php");
	}
?>
<html>
<header>
	<title>Edit personal profile page</title>
</header>

<body>
	<a href = "index.php">Back to main page</a>
	
	
	<form name="EditForm" method="post" action="editProfileProcess.php" value = "editStu">
	
	<table border = "5px" BORDERCOLOR=orange>
	
	<tr>
		<td colspan = 2><legend>Edit Personal Information</legend></td>
		
	</tr>
	
	<tr >
		<td>Email:</td>
		<td><?php echo $email; ?></td>
	</tr>
	
	<tr >
		<td>Name:</td>
		<td><?php echo $stu->name;?></td>
	</tr>
	
	<tr>
		<td>Current University:</td>
		<td>
			<?php echo $stu->Cur_university;?>
		</td>
	</tr>
	
	<tr>
		<td>Major:</td>
		<td><?php echo $stu->major;?></td>
	</tr>
	
	<tr>
		<td>Skills:</td>
		<td><?php echo $stu->skills;?></td>
	</tr>
	
	<tr>
		<td>Courses taken (name):</td>
		<td><?php echo $stu->courses;?></td>
	</tr>


	
	<tr>
		<td>GPA:</td>
		<td><?php echo $stu->gpa;?></td>
	</tr>
	
	<tr>
		<td colspan = 2>Please list your top three intreasts:</td>
		
	</tr>
	
	<tr>
		<td>Interest 1:</td>
		<td>
			<?php echo $stu->interest1;?>
		</td>
	</tr>
	
	<tr>
		<td>Interest 2:</td>
		<td>
			<?php echo $stu->interest2;?>
		</td>
	</tr>
	
	<tr>
		<td>Interest 3:</td>
		<td>
			<?php echo $stu->interest3;?>
		</td>
	</tr>
	
	<tr>
		<td>facebook:</td>
		<td><?php echo $stu->fb;?></td>
	</tr>
	
	<tr>
		<td><a href = "editProfileUI.php">Edit Profile</a></td>
		<td><a href = "index.php">Back to Home Page</a></td>
	</tr>
	</table>
	</form>

	
	<style type="text/css">
    		html{font-size:15px;}
   	      	table{width:550px; margin: 10 auto;}
   	      	tr{height: 60;}
   	      	select{width: 250};
  	       legend{font-weight:bold; font-size:20px;color:orange; margin-left:2px}
               label{float:left; width:90px; margin-left:50px;margin-top:5px}
               .left{margin-left:160px}
               .input{width:150px;height:20px,margin-top:10px}
               textarea{margin-top:20px; cols:50;}
               span{color: silver;}
               div{margin-left:50px}
	</style>
	
	
</body>

</html>