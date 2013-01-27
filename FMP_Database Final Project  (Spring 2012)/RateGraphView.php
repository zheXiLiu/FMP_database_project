<?php
	session_start();
	error_reporting(null);
	require_once 'SqlHelper.class.php';
	require_once 'RComm.class.php';
	require_once 'RCommService.php';
	require_once 'Fenye.class.php';
	
	$email = $_SESSION['email'];
	$name = $_REQUEST['name'];
	
	$img = "proimg/".$name.".jpg";
	
	//echo "Hello ".$email." , Here is the rating page for ".$name."<br><br>";
	
	$sql = "select * from comment where pro_name ='$name' ";
	//$sql = "select * from comment where pro_name = 'Jiawei Han' ";
	
	$rcService = new RCommService();
	$num = $rcService->totalRecord($sql);
	
	
	
	if ($num!=0)
	{
	
		//**************************************GRAPHS*****************************************
		
		$avg_long_sql = "select avg(acc),avg(sten),avg(intr),avg(pers),avg(over) from comment where pro_name='$name'";
		$a = $rcService->getAvg($avg_long_sql);
		//Overall average
		$avgg = $a[0]['avg(over)'];
		//radar graph for overall anaylsis
		$imgradar = "radar.php?acc={$a[0]['avg(acc)']}&sten={$a[0]['avg(sten)']}&intr={$a[0]['avg(intr)']}&pers={$a[0]['avg(pers)']}";
	
		
		//acc img
		$acc_sql = "select acc, count(acc) from comment where pro_name = '$name' group by acc";
		$accary = $rcService->getAvg($acc_sql);
		$acca = array(0,0,0,0,0);
		for ($i = 0; $i < $num;$i++)
		{
			if ($accary[$i]['acc'])
			{	
				$index = $accary[$i]['acc'];
				$acca[$index] = ($accary[$i]['count(acc)'])*100/($num);
			}
		}
		$imgacc = "piee.php?id=1&one={$acca[1]}&two={$acca[2]}&three={$acca[3]}&four={$acca[4]}&num=$num";
		
		//sten img
		$sten_sql = "select sten, count(sten) from comment where pro_name = '$name' group by sten";
		$stenarray = $rcService->getAvg($sten_sql);
		$stena = array(0,0,0,0,0);
		for ($i = 0; $i < $num;$i++)
		{
			if ($stenarray[$i]['sten'])
			{
				$index = $stenarray[$i]['sten'];
				$stena[$index] = ($stenarray[$i]['count(sten)'])*100/($num);
			}
		}
		$imgsten = "piee.php?id=2&one={$stena[1]}&two={$stena[2]}&three={$stena[3]}&four={$stena[4]}&num=$num";
		
		//img pers
		$pers_sql = "select pers, count(pers) from comment where pro_name = '$name' group by pers";
		$persary = $rcService->getAvg($pers_sql);
		$persa = array(0,0,0,0,0);
		for ($i = 0; $i < $num;$i++)
		{
			if ($persary[$i]['pers'])
			{
				$index = $persary[$i]['pers'];
				$persa[$index] = ($persary[$i]['count(pers)'])*100/($num);
			}
		}
		$imgpers = "piee.php?id=3&one={$persa[1]}&two={$persa[2]}&three={$persa[3]}&four={$persa[4]}&num=$num";
		
		//img intrs
		$intr_sql = "select intr, count(intr) from comment where pro_name = '$name' group by intr";
		$intrary = $rcService->getAvg($intr_sql);
		$intra = array(0,0,0,0,0);
		for ($i = 0; $i < $num;$i++)
		{
			if ($intrary[$i]['intr'])
			{
				$index = $intrary[$i]['intr'];
				$intra[$index] = ($intrary[$i]['count(intr)'])*100/($num);
			}
		}
		$imgintr = "piee.php?id=4&one={$intra[1]}&two={$intra[2]}&three={$intra[3]}&four={$intra[4]}&num=$num";
		
		
		
		//img over
		$over_sql = "select over, count(over) from comment where pro_name = '$name' group by over";
		$overary = $rcService->getAvg($over_sql);
		$overa = array(0,0,0,0,0);
		for ($i = 0; $i < $num;$i++)
		{
		if ($overary[$i]['over'])
			{
					$index = $overary[$i]['over'];
					$overa[$index] = ($overary[$i]['count(over)'])*100/($num);
			}
		}
			$imgover = "pie3dex1.php?one={$overa[1]}&two={$overa[2]}&three={$overa[3]}&four={$overa[4]}&num=$num";
	}
	
	//*************************************************************************************
	
	else if ($num == 0)
	{
		
	}
	
?>


<html>
	<head>
	</head>
	
	<body>
		
		<h1>Existing Ratings & Comments for <?php echo $name;?> </h1>
		<h2>Total ratings & comments found: <?php echo $num;?> </h2>
		<table border="0" BORDERCOLOR=orange>
			<tr height = 300 >
				<td width = 150 ><img src = '<?php echo $img;?>' /></td>
				<td>
					<div style = "font-size:20px">Overall score on FMP:<br> </div>
					<div style = "font-size:26px; font-weight:bold"><?php echo round($avgg,2); ?></div>
					<br>
					<div style = "font-size:16px">
						Accessbility: <?php echo round($a[0]['avg(acc)'],2); ?> <br>
						Academic Strength: <?php echo round($a[0]['avg(sten)'],2); ?> <br>
						Personality: <?php echo round($a[0]['avg(pers)'],2); ?> <br>
						Rater's Interest: <?php echo round($a[0]['avg(intr)'],2); ?> <br>
					</div>
				</td>
				<td ><img src = '<?php echo $imgradar;?>'  width="291" height="166" /><br></td>
				<td ><img src = '<?php echo $imgover;?>'  width="291" height="166"/><br></td>
			</tr>
			
			<tr>
				<td><div style = "font-size:22px">Component<br> Analysis:</div></td>
				<td colspan =3>
					<img src = '<?php echo $imgacc ?>' width="280"/>
					<img src = '<?php echo $imgsten ?>' width="280"/>
					<img src = '<?php echo $imgpers ?>' width="280"/>
					<img src = '<?php echo $imgintr ?>' width="280"/>
				</td>
			</tr>
			
		</table>
			
	</body>
	
</html>