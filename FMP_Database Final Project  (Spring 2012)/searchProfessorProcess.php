<?php
	
	session_start();
	require "SqlHelper.class.php";
	require_once 'ProService.class.php';
	require_once 'Fenye.class.php';

	$sqlHelper = new SqlHelper();
	$email = $_SESSION['email'];
	
	
		$pnameA = $_POST["pnameA"];
		$SchoolA = $_POST['SchoolA'];
		$FieldA = $_POST['FieldA'];
		$kw_dec = $_POST['kw_dec'];
		$kw_com = $_POST['kw_com'];
		
		$kw_decs = explode(" ", $kw_dec);
		$kw_coms = explode(" ", $kw_com);
		
		if (!$pnameA && !$FieldA && !$SchoolA &&!$kw_dec &&!$kw_com)
		{
			echo "Well, please at least enter one to make things easier! <br>";
		}
		else if (!$kw_com)
		{ 
			for ($i = 0; $i < count($kw_decs);$i++)
			{
				if ($i ==0)
				{
					$sql =  "select * from professor WHERE name like '%$pnameA%' and School like '%$SchoolA%' and".
					" Field like '%$FieldA%' and statement like '%$kw_decs[0]%' ";
				}
				else 
				{
					$sql .= "and (statement like '%$kw_decs[$i]%')";
				}
				
			}
			$sql.= " group by name";
			echo $sql;
	
		}
		else
		{
			for ($i = 0; $i < count($kw_decs);$i++)
			{
				if ($i == 0)
				$sql =  "select * from professor,comment WHERE name like '%$pnameA%' and School like '%$SchoolA%' and".
				" Field like '%$FieldA%' and statement like '%$kw_decs[0]%' ";
				else
					$sql .= "and (statement like '%$kw_decs[$i]%')";
			}
				
			for ($j = 0; $j < count($kw_coms); $j++)
			{
				$sql.= " and (comm like '%$kw_coms[$j]%') ";
			}
			$sql.= " and name = pro_name group by name";
			echo $sql;
		}
		


	$sql_log = "insert into search_log (Email,Professor_Name, School_Name, Field,Comment, Rearch_Interest)
					values ('$email', '$pnameA','$SchoolA','$FieldA','$kw_com', '$kw_dec')";
	
	echo "<br>..............................<br>";
	echo $sql_log;
	echo "<br>..............................<br>";
	
	echo "<a href = 'searchProfessorUI.php' >Back to Search </a>";
	
	$proService = new ProService();
		
	$num = $proService->totalRecord($sql);
	echo "<br> Total records found: ".$num;
	
	$sqlHelper = new SqlHelper();
	$res_array = $sqlHelper -> execute_dql2($sql);
	$sqlHelper->execute_dml($sql_log);
	echo "<table border = '1' bordercolor = 'green' cellspacing = '0px' width = '700px'>";
	echo "<tr><th>name</th><th>university</th><th>More personal details</th><th>Comments</th> <th>Rate graphs </th><th>I want to rate </th></tr>";
	
	//按数组取，直接释放资源
	for ($i = 0; $i< count($res_array); $i++)
	{
		$row = $res_array[$i];
		echo "<tr height = '80'><td>{$row['Name']}</td><td>{$row['School']}</td>".
		"<td><a href ='viewProDetail.php?name={$row['Name']}' target = '_blank'>Read more</a></td>".
		"<td><a href='rate_commView.php?flag=viewrc&name={$row['Name']}' target = '_blank'>Existing Comments</a></td>".
		"<td><a href='RateGraphView.php?name={$row['Name']}' target = '_blank'>Existing Rating Graphs</a></td>".
		"<td><a href='rate_comUI.php?flag=rate&name={$row['Name']}' target = '_blank'>I want to rate</a></td></tr>";
	}
	echo "<h1>Search Result: </h1>";
	echo "</table>";
	
?>

