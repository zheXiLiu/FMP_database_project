<?php
	
	if (0)
		$details = "<img src = 'nocom.jpg' />";
	else
		$details = "<img src = 'piee.php?id=1'  />"."<img src = 'piee.php?id=2' />".
		"<img src = 'piee.php?id=3' />"."<img src = 'piee.php?id=4' />";
?>

<html>
	<h1>Existing Reviws about Professor</h1>
	
	<table border="0" BORDERCOLOR=orange>
		<tr >
			<td rowspan =2 width = 150><img src = 'Jeff Erickson.jpg' /></td>
			<td ><img src = ''  width="291" height="166" /><br></td>
			<td ><img src = 'radar.php'  width="291" height="166" /><br></td>
			<td ><img src = 'pie3dex1.php'  width="291" height="166"/><br></td>
		</tr>
		
		<tr>
			<td colspan =3><?php echo $details;?></td>
		</tr>
		
	</table>
</html>