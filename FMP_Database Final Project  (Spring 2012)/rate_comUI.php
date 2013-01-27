<?php
	//该页面显示准备修改的用户的信息
	session_start();
	require_once 'ProService.class.php';
	require_once 'pro.class.php';
	$name = $_REQUEST['name'];
	$email = $_SESSION['email'];
	if ($_REQUEST['err'] == 1)
	{
		echo "<h3>All fiels are required please!<br></h3>";
	}
	
	echo "Hello ".$email;
?>

<html>
<head>
</head>
<h1>Rate <?php echo $name; ?>: </h1>
All fields are required please!
<form action = "proOperate.php?name=<?php echo $name?>" method = "post">
<input type = "hidden" name = "flag" value = "ratePro"/>
<table   >

<tr><td>Name: </td> <td>  <?php echo $name?></td> </tr>

<tr>
	<td height = "50">Accessbility:</td> 
	<td>
		<input type="radio" name="acc" value = "4">4 Very Accssible
		<input type="radio" name="acc" value = "3">3 Good
		<input type="radio" name="acc" value = "2">2 Average
		<input type="radio" name="acc" value = "1">1 Hard to Access
	</td>
</tr>

<tr>
	<td height = "50">Accdemic Strength:</td> 
	<td>
		<input type="radio" name="sten" value = "4">4 (Excellent)
		<input type="radio" name="sten" value = "3">3 (Good)
		<input type="radio" name="sten" value = "2">2 (Average)
		<input type="radio" name="sten" value = "1">1 (Below Average)
	</td>
</tr>

<tr>
	<td  height = "50">Personality:</td> 
	<td>
		<input type="radio" name="pers" value = "4">4 Excellent
		<input type="radio" name="pers" value = "3">3 Good
		<input type="radio" name="pers" value = "2">2 Average
		<input type="radio" name="pers" value = "1">1 Below Average
	</td>
</tr>

<tr height = "50">
	<td>Rater's Interests:</td> 
	<td>
		<input type="radio" name="intr" value = "4">4 (Very interested)
		<input type="radio" name="intr" value = "3">3 (interested)
		<input type="radio" name="intr" value = "2">2 (Average)
		<input type="radio" name="intr" value = "1">1 (Not interested)
 	</td> 
</tr>

<tr>
	<td height = "100">Comment: </td>
	<td><textarea rows ="6" cols = "40" name = "comm"></textarea></td>
</tr>

<tr>
	<td height = "50"><input type = "submit" value = "Submit Changes! "></td>
	<td><input type = "reset" value = "Clear ALL"></td>
</tr>

</table>
</form>

</html>

<?php
	echo "<a href = 'searchProfessorUI.php'>Back to search page</a>";
	echo "&nbsp&nbsp<a href = 'viewProDetail.php?name=$name'>To this professor's page</a>";
	
?>
