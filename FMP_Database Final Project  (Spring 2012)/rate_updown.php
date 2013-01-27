<?php
	error_reporting(null);
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	
	if($_GET['flag'])
	{
		$flag = $_GET['flag'];
		if ($flag == "upvote")
		{
			//echo "YES!!&^*&^*&^*&!";
			$id = $_GET['id'];
			$email = $_GET['email'];
			
			$sql = "insert into com_stat (com_id,email,vote_stat) values ($id, '$email','$flag')";
			$res = $sqlHelper->execute_dml($sql);
			if ($res == 1)
			{
				$sql2 = "update comment set upvote = comment.upvote+1 where com_id = $id";
				$res2 = $sqlHelper->execute_dml($sql2);
				header('Location: ' . $_SERVER['HTTP_REFERER'].'&err=0');
			}
			else
			{
				header('Location: ' . $_SERVER['HTTP_REFERER'].'&err=2');
			}	
		}
		if ($flag == "downvote")
		{
			$id = $_GET['id'];
			$email = $_GET['email'];	
			$sql = "insert into com_stat (com_id,email,vote_stat) values ($id, '$email','$flag')";
			$res = $sqlHelper->execute_dml($sql);
			if ($res == 1)
			{
				$sql2 = "update comment set downvote = comment.downvote+1 where com_id = $id";
				$res2 = $sqlHelper->execute_dml($sql2);
				header('Location: ' . $_SERVER['HTTP_REFERER'].'&err=0');
			}
			else
			{
				header('Location: ' . $_SERVER['HTTP_REFERER'].'&err=2');
			}
		}
	}
?>


