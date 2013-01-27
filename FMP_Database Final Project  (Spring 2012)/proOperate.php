<?php
	session_start();	
	$email = $_SESSION['email'];
	$name = $_REQUEST['name'];
	require_once 'pro.class.php';
	require_once 'ProService.class.php';
	require_once 'RComm.class.php';
	require_once 'RCommService.php';
	require_once 'SqlHelper.class.php';
	
	
	
	if (!empty($_REQUEST['flag']))
	{
		$flag = $_REQUEST['flag'];
	
		if($flag == "ratePro")
		{	
				
			$rcService = new RCommService();
			$rc = new RComm();
			$rc->pro_name = $_GET['name'];
			$rc->stu_name = $email;
			$rc->acc = $_REQUEST['acc'];
			$rc->sten = $_REQUEST['sten'];
			$rc->intr = $_REQUEST['intr'];
			$rc->pers = $_REQUEST['pers'];
			$rc->comm = $_REQUEST['comm'];
			$rc->rev_date = date("Y-m-d H:i:s");
			echo $rc->rev_date;
			
			if(  $rc->acc == NULL || $rc->sten == NULL || $rc->intr == NULL || $rc->pers == NULL )
			{
				
				Header("Location: rate_comUI.php?name=$name&err=1");
			}
			else 
			{
				$res = $rcService->storeComm($rc);
				if ($res == 1)
				{
					echo "Thank you for your comments!";
					echo "<br><a href = 'searchProfessorUI.php'>Back to search</a>";
					
				}
				else
				{
					echo "faild!";
				}
			}
		}
		
	}
?>