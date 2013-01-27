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
	
	
	if ($_GET['err'])
	{
		if ($_GET['err']==2)
			$errmsg= "You have already cast your vote on this comment!<br>";
		echo $errmsg;
	}
	
	
	
	if ($_POST['go'])
	{
		$order = $_POST['order'];
	}
	else if ($_REQUEST['order'])
	{
		$order = "rdate";
		$order = $_REQUEST['order'];
	}
	else
	{
		$order = "rdate";
	}
	
	if ($order == "rdate")
	{
		echo "rank by reviewing date";
		$con = " order by rev_date desc";
	}
	else if ($order == "rpop")
	{
		echo "rank by popularity";
		$con = " order by (upvote+downvote) desc ,rev_date desc";
	}
	else if ($order == "rscore")
	{
		echo "rank by Rating Score";
		$con = " order by over desc,(upvote+downvote) desc, rev_date desc";
	}
	
	else if ($order == "rhelp")
	{
		echo "rank by Helpfulness";
		$sqql = "Select *, (upvote/(upvote+downvote) + 1.6*1.6/(2*upvote) -
 				1.6* SQRT (( (upvote/(upvote+downvote))*(1- upvote/(upvote+downvote))
				 + 1.6*1.6/(4*(upvote+downvote)))/(upvote+downvote)))/(1+1.6*1.6/(upvote+downvote))  
 				AS ci_lower_bound FROM comment WHERE  pro_name='$name'";
		
      	$con = "ORDER BY ci_lower_bound DESC";
	}
	
	
	$sql = "select * from comment where pro_name ='$name' ";
	
	$rcService = new RCommService();
	$num = $rcService->totalRecord($sql);
	
	if ($num!=0)
	{
		$fenyePage = new Fenye();
		$fenyePage->pageNow = 1;
		$fenyePage->pageSize = 5; 
		$fenyePage->pageCount = 0;
		$fenyePage->page_whole = 10;
		$fenyePage->gotoUrl = "rate_commView.php?name=$name&order=$order";
		
		if($_GET['pageNow'])
		{
			$fenyePage->pageNow = $_GET['pageNow'];
		}
		
		/*
		 * 
		 $sql1 = "select * from comment where pro_name = '$name' limit ".
				($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
		*/
		
		$sqll = "select * from comment where pro_name = '$name'";
		
		if($sqql != NULL)
			$sqll = $sqql;
		
		$subs = " limit ".
				($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;	
		
		$sqll .=$con;
		$sqll .= $subs;
		
		
		
		
		$rcService->getFenye2($fenyePage, $name,$sqll);
	}	
	
	$compurl = "<a href = 'RateGraphView.php?name={$name}' target = '_blank'>  Component Analysis Graphs</a>";
	$rateurl = "<a href = 'rate_comUI.php?flag=rate&name={$name}' target = '_blank'> Write ratings&comments</a>";
?>

<html>
	<head>
	</head>
	
	<body>
		
		<h1>Existing Ratings & Comments for <?php echo $name;?> </h1>
		<h2>Total ratings & comments found: <?php echo $num;?> </h2>
		<h2><a href='rate_comUI.php?flag=rate&name=<?php echo $name;?>'>Rate this professor</a></h2>
		
		
	
		<?php 
		
		echo $compurl." &nbsp&nbsp&nbsp ";
		echo $rateurl."<br>";
		?>
		
		<br><br>
		<form action = 'rate_commView.php?name=<?php echo $name?>' method = "POST">
			<?php echo $fenyePage->navigator;?>  Order by:
			<select id="order"  name="order">
				<option selected="selected" value="<?php echo $stu->interest1?>">Choose.. <?php echo $stu->interest1?></option>
				<option value="rdate">Review Date</option>
				<option value="rpop">Popularity</option>
				<option value="rhelp">Helpfulness</option>
				<option value="rscore">Rating Score</option>
				
			</select>
		<input type="submit" name="go" value="Go" />
		</form> 
	
		
		<?php 
		if($num!=0)
		{
			
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
							 <a href ='rate_updown.php?flag=upvote&id={$row['com_id']}&email=$email'>like</a>{$row['upvote']} upvotes &nbsp &nbsp
							 <a href = 'rate_updown.php?flag=downvote&id={$row['com_id']}&email=$email'>dislike</a> {$row['downvote']} downvotes
						</td>
						
				</tr>";
			}
			echo "</table>";
			
		}
		
		?>
	</body>
	
</html>

 				
 				