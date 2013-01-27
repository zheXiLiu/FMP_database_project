<?php
	require_once 'ProService.class.php';

	require_once 'SqlHelper.class.php';
	require_once 'stuService.class.php';
	require_once 'stu.class.php';
	session_start();
	
	$email = $_SESSION['email'];
	$service = new stuService();
	$stu = $service ->getStu($email);

	$school = $stu-> Cur_university;
	$major = $stu-> major;
	$interest = $stu-> interest1;
	
	if (!empty($_REQUEST['searchs']))
	{
			$Recommend_Type = $_POST['Recommend_Type'];
			if(!Recommend_Type)
			{
				echo("Please at least choose one recommentdation type!");
			}
			else if ($Recommend_Type = "same school")
			{
				echo"get here";
				$sql = "CREATE VIEW sub_log AS
						select b.Professor_Name as name, b.School_Name as School, b.Field as Field,b.Comment as Comment, b.Rearch_Interest as Research_Interest from stu AS a, search_log  AS b WHERE  Cur_university = '$school'";
			}
			else if ($Recommend_Type = "same major")
			{
				$sql = "CREATE VIEW sub_log AS
						select b.Professor_Name as name, b.School_Name as School, b.Field as Field,b.Comment as Comment, b.Rearch_Interest as Research_Interest from stu AS a, search_log  AS b WHERE  major = '$major'";

			}
			else if ($Recommend_Type = "same primary interest")
			{
				$sql = "CREATE VIEW sub_log AS
						select b.Professor_Name as name, b.School_Name as School, b.Field as Field,b.Comment as Comment, b.Rearch_Interest as Research_Interest from stu AS a, search_log  AS b WHERE  interest1 = '$interest'";
			}
			echo  $sql;
	}
	
	
	$sqlHelper = new SqlHelper();
	$sqlHelper -> execute_dql($sql);
	
	
	
	$A = $sqlHelper -> execute_dql2(	"SELECT  name
						FROM sub_log
						GROUP BY name
						ORDER BY COUNT( * ) DESC
						LIMIT 3");
						;
	$B =$sqlHelper -> execute_dql2("SELECT  School
						FROM sub_log
						GROUP BY School
						ORDER BY COUNT( * ) DESC
						LIMIT 3");
						
					
	$C = $sqlHelper -> execute_dql2("SELECT  Field
						FROM sub_log
						GROUP BY Field
						ORDER BY COUNT( * ) DESC
						LIMIT 3");
	$D = $sqlHelper -> execute_dql2("SELECT  Research_Interest
						FROM sub_log
						GROUP BY Research_Interest
						ORDER BY COUNT( * ) DESC
						LIMIT 3");
	$E = $sqlHelper -> execute_dql2("SELECT  Comment
						FROM sub_log
						GROUP BY Comment
						ORDER BY COUNT( * ) DESC
						LIMIT 3");
	
	$pnameA= $A[1][name];
	$SchoolA= $B[1][School];
	$FieldA = $C[1][Field];
	$kw_dec= $D[1][Research_Interest];
	$kw_com= $E[1][Comment];

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
		
	$proService = new ProService();
		
	$num = $proService->totalRecord($sql);
	echo "<br> Total records found: ".$num;
	
	$sqlHelper = new SqlHelper();
	$res_array = $sqlHelper -> execute_dql2($sql);
	mysql_query("DROP VIEW sub_log");
	echo "<table border = '1' bordercolor = 'green' cellspacing = '0px' width = '700px'>";
	echo "<tr><th>pro_id</th><th>name</th><th>university</th><th>Field</th><th>More personal details</th><th>View existing comments</th> 	<th>Rate & Comment this </th></tr>";
						
							//按数组取，直接释放资源
						
	for ($i = 0; $i< count($res_array); $i++)
	{
							$row = $res_array[$i];
							echo "<tr height = '80'><td>{$row['pro_id']}</td><td>{$row['Name']}</td><td>{$row['School']}</td><td>{$row['Field']}</td>".
							"<td><a href ='viewProDetail.php?name={$row['Name']}' target = '_blank'>Read more</a></td>".
							"<td><a href='rate_commView.php?flag=viewrc&name={$row['Name']}' target = '_blank'>Existing Comments & Rates</a></td>".
							"<td><a href='rate_comUI.php?flag=rate&name={$row['Name']}' target = '_blank'>I want to rate</a></td></tr>";
	}
	echo "<h1>Search Result: </h1>";
	echo "</table>";

	
	




?>