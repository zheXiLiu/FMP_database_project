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
		<td><input name="name" type="text" value = "<?php echo $stu->name?>"/></td>
	</tr>
	
	<tr>
		<td>Current University:</td>
		<td>
			<select  name = "Cur_university" >
				<option selected="selected" value="<?php echo $stu->Cur_university?>">Current: <?php echo $stu->Cur_university?></option>
				<option value = "Univeristy of Illinois at Urbana Champain">Univeristy of Illinois at Urbana Champain </option>
				<option value = "Carnegie Mellon University">Carnegie Mellon University</option>		
				<option value = "Massachusetts Institute of Technology">Massachusetts Institute of Technology</option>
				<option value = "Stanford University">Stanford University</option>
				<option value = "University of California, Berkeley">University of California, Berkeley </option>				
			</select>
		</td>
	</tr>
	
	<tr>
		<td>Major:</td>
		<td><input name="major" type="text" value = "<?php echo $stu->major;?>"/></td>
	</tr>
	
	<tr>
		<td>Skills:</td>
		<td><textarea  cols = "45" rows = 3 name = "skills" wrap="virtual" ><?php echo $stu->skills;?></textarea></td>
	</tr>
	
	<tr>
		<td>Courses taken (name):</td>
		<td><textarea  cols = "45" rows = 3 name = "courses"><?php echo $stu->courses;?></textarea></td>
	</tr>


	
	<tr>
		<td>GPA:</td>
		<td><input  name="gpa" type="text" value = "<?php echo $stu->gpa;?>" /></td>
	</tr>
	
	<tr>
		<td colspan = 2>Please list your top three intreasts:</td>
		
	</tr>
	
	<tr>
		<td>Interest 1:</td>
		<td>
			<select id="interest1"  name="interest1">
				<option selected="selected" value="<?php echo $stu->interest1?>">Choose.. <?php echo $stu->interest1?></option>
				<option value="Algorithms & Theory">Algorithms & Theory</option>
				<option value="Archetecture">Archetecture</option>
				<option value="Archetecture">Artifical Intellegience</option>
				<option value="Bioinformatics">Bioinformatics</option>
				<option value="Compilers">Compilers</option>
				<option value="Computer Vision">Computer Vision</option>
				<option value="Database">Database</option>
				<option value="Data Mining">Data Mining</option>
				<option value="Graphics">Graphics</option>
				<option value="HCI">HCI</option>
				<option value="Info Retrieval">Info Retrieval</option>
				<option value="Languages">Languages</option>
				<option value="Machine Learning">Machine Learning</option>
				<option value="Multimedia">Multimedia</option>
				<option value="Networking">Networking</option>
				<option value="Security">Security</option>
				<option value="Software Engineering">Software Engineering</option>
				<option value="System">System</option>
				</select>
		</td>		
	</tr>
	
	<tr>
		<td>Interest 2:</td>
		<td>
			<select id="interest2"  name="interest2">
				<option selected="selected" value="<?php echo $stu->interest2?>">Choose.. <?php echo $stu->interest2?></option>
				<option value="Algorithms & Theory">Algorithms & Theory</option>
				<option value="Archetecture">Archetecture</option>
				<option value="Archetecture">Artifical Intellegience</option>
				<option value="Bioinformatics">Bioinformatics</option>
				<option value="Compilers">Compilers</option>
				<option value="Computer Vision">Computer Vision</option>
				<option value="Database">Database</option>
				<option value="Data Mining">Data Mining</option>
				<option value="Graphics">Graphics</option>
				<option value="HCI">HCI</option>
				<option value="Info Retrieval">Info Retrieval</option>
				<option value="Languages">Languages</option>
				<option value="Machine Learning">Machine Learning</option>
				<option value="Multimedia">Multimedia</option>
				<option value="Networking">Networking</option>
				<option value="Security">Security</option>
				<option value="Software Engineering">Software Engineering</option>
				<option value="System">System</option>
				
			</select>
		</td>
	</tr>
	
	<tr>
		<td>Interest 3:</td>
		<td>
			<select id="interest3"  name="interest3">
				<option selected="selected" value="<?php echo $stu->interest3?>">Choose.. <?php echo $stu->interest3?></option>
				<option value="Algorithms & Theory">Algorithms & Theory</option>
				<option value="Archetecture">Archetecture</option>
				<option value="Archetecture">Artifical Intellegience</option>
				<option value="Bioinformatics">Bioinformatics</option>
				<option value="Compilers">Compilers</option>
				<option value="Computer Vision">Computer Vision</option>
				<option value="Database">Database</option>
				<option value="Data Mining">Data Mining</option>
				<option value="Graphics">Graphics</option>
				<option value="HCI">HCI</option>
				<option value="Info Retrieval">Info Retrieval</option>
				<option value="Languages">Languages</option>
				<option value="Machine Learning">Machine Learning</option>
				<option value="Multimedia">Multimedia</option>
				<option value="Networking">Networking</option>
				<option value="Security">Security</option>
				<option value="Software Engineering">Software Engineering</option>
				<option value="System">System</option>
				
			</select>	
		</td>
	</tr>
	
	<tr>
		<td>facebook:</td>
		<td>
			<input name="fb" type="text"  value = "<?php echo $stu->gpa;?>"/>
		</td>
	</tr>
	
	<tr>
		<td><input type="submit" name="submitt" value="Submit" /></td>
		<td><input type = "reset" value = "clear"/></td>
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