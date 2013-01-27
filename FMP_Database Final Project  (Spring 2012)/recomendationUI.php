<?php
	session_start();
	$email = $_SESSION['email'];
	echo ".....you are here as ".$email;
?>

<html>
<body>
	
	<fieldset>
	
	<br>
	
	***************** Detailed Searching Gose below *******************
	
	<form name="search" method="post" action="recommend.php">
	<table>
	
	<tr height = "50">
		<td >Choose The Kind of Recommendation You Want:</td>
			<td>
			<select id = "Recommend_Type" name = "Recommend_Type">
				<option selected="selected" value="">Choose...</option>
				<option value = "same school">same school</option>
				<option value = "same major">same major</option>
				<option value = "same primary interest">same primary interest </option>				
			</select>
			</td>
	</tr>
	<tr height = "50"> 
		<td><input type="submit" name= "searchs" value="  Recommend ! " /></td>
		<td><input type = "reset" name = "clear"></td>
	 </tr>
	
	</table>
	</form>
	</fieldset>
	
	<a href = "index.php">Back to home page</a>
	
	<style type="text/css">
    		html{font-size:15px;}
   	       fieldset{width:550px; margin: 10 auto;}
  	       legend{font-weight:bold; font-size:20px;color:orange}
               label{float:left; width:90px; margin-left:50px;margin-top:5px}
               .left{margin-left:160px}
               .input{width:150px;height:20px,margin-top:10px}
               .textarea{margin-top:50px}
               span{color: silver;}
               div{margin-left:100px}
	</style>
	
	
</body>
		
</html>