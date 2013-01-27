<?php
	require_once 'SqlHelper.class.php';
	require_once 'RComm.class.php';
	
	class RCommService
	{
		public function storeComm ($rc)
		{
			$sqlHelper = new SqlHelper();
			
			$sql = "Insert into comment ".
			"(rev_date,pro_name,stu_name,acc,sten,intr,pers,over,comm) values ".
			"('$rc->rev_date','$rc->pro_name','$rc->stu_name',
			$rc->acc,$rc->sten,$rc->intr,$rc->pers,
			($rc->acc+$rc->sten+$rc->intr+$rc->pers)/4,'$rc->comm')";
			
			echo $sql;
			$res = $sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		
		public function totalRecord($sql)
		{
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper-> count_dql($sql);
			return $res;
		}
		
		public function getPageCount($pageSize,$sql)
		{
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper->execute_dql($sqll);
				
			if($row = mysql_fetch_row($res))
			{
				$pageCount = ceil($row[0]/$pageSize);
			}
			$sqlHelper->close_connect();
			return $pageCount;
		}
		
		public function getFenye ($fenyePage,$name)
		{
			$sqlHelper = new SqlHelper();
		
			$sql1 = "select * from comment where pro_name = '$name' limit ".
					($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
			
			$sql2 = "select count(*) from comment where pro_name = '$name'";
			$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
			$sqlHelper->close_connect();
		}
		
		public function getFenye2($fenyePage,$name,$sql1)
		{
			$sqlHelper = new SqlHelper();
			$sql2 = "select count(*) from comment where pro_name = '$name'";
			$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
			$sqlHelper->close_connect();
		}
		
		public function getFenye3($fenyePage,$email,$sql1)
		{
			$sqlHelper = new SqlHelper();
			$sql2 = "select count(*) from comment where stu_name = '$email'";
			$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
			$sqlHelper->close_connect();
		}
		
		public function getAvg($sql)
		{
			$sqlHelper = new SqlHelper();
			$a = $sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();
			return $a;
		}
		
	}
?>
