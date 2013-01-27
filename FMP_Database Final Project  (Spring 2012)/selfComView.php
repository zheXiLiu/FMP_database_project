<?php
	session_start();
	error_reporting(null);
	require_once 'SqlHelper.class.php';
	require_once 'RComm.class.php';
	require_once 'RCommService.php';
	require_once 'Fenye.class.php';
	
	$email = $_SESSION['email'];
	
	
	if ($_GET['act'])
	{
		$id = $_GET['id'];
		$sql = "delete from comment where com_id = $id ";
		$sqlHelper = new SqlHelper();
		$sqlHelper->execute_dml($sql);
		$s = "return confirmDeleted()";
	}
	
	$sql = "select * from comment where stu_name ='$email'";
	
	$rcService = new RCommService();
	$num = $rcService->totalRecord($sql);
	
	if ($num!=0)
	{
		$fenyePage = new Fenye();
		$fenyePage->pageNow = 1;
		$fenyePage->pageSize = 5; 
		$fenyePage->pageCount = 0;
		$fenyePage->page_whole = 10;
		$fenyePage->gotoUrl = "selfComView.php?";
		
		if($_GET['pageNow'])
		{
			$fenyePage->pageNow = $_GET['pageNow'];
		}
		
		$sqll = "select * from comment where stu_name = '$email'";
		
		$subs = " limit ".
				($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
		$con = " order by rev_date desc";
		
		$sqll .=$con;
		$sqll .= $subs;
		
		$rcService->getFenye3($fenyePage, $email,$sqll);
	}	
?>

<html>
	<head>
		<script type = "text/javascript">
		function confirmDel()
		{
			if  (window.confirm("You sure you want to delete this comment ?"))
			{
				window.alert("Ok, we are deleting your comment!");
				return 1;
			}
			else
				return 0;
		}

		function confirmDeleted()
		{
			window.alert("This comment has been deleted!");
		}
</script>
	</head>
	
	<body>
		
		<h1>My comments:  </h1>
		<h2>Total ratings & comments found: <?php echo $num;?> </h2>
	
		<?php 
		if($num!=0)
		{
			echo $fenyePage->navigator;
			echo "<table border = '1' bordercolor = 'green' cellspacing = '0px' >";
			//echo "<tr><th>Time</th><th>pro_name</th><th>Reviewer</th><th>Accessbility</th><th>Academic Strength</th><th>Personality</th><th>Rater's Interest</th><th>Overall</th><th>Comments</th><th>rate this</th><th>upvote</th><th>downvote</th></tr>";
		
			for ($i = 0; $i< count($fenyePage->res_array); $i++)
			{
				$row = $fenyePage->res_array[$i];
				echo "<tr height = '50'>
						<td>Professor: {$row['pro_name']}<br>
							Review time: {$row['rev_date']}<br>
							Review writer: {$row['stu_name']}
						</td>
						<td>
							Accessibility: {$row['acc']}<br>
							Accademic Strength: {$row['sten']}<br>
							Personality : {$row['pers']}<br>
							Rater's interest: {$row['intr']}<br>
							
						</td>
						<td>
							Comment: <br>
							{$row['comm']}
						</td>
						<td>
							 {$row['upvote']} upvotes &nbsp &nbsp
							 {$row['downvote']} downvotes
						</td>
						<td>
							<a onclick='return confirmDel()' href='selfComView.php?act=del&id={$row['com_id']}'>Delete Comment</a>
						</td>
						
				</tr>";
			}
			echo "</table>";
			
			
		}
		
		?>
	</body>
	
</html>

 				
 				