<?php
	
	require_once 'SqlHelper.class.php';	
	require_once 'pro.class.php';

	class ProService
	{
		
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
		
		public function getFenye($fenyePage,$pro)
		{
			echo ".....".$pro->school."...."."$pro->field";
			$sqlHelper = new SqlHelper();
		
			/*if ($pro->name && $pro->school && $pro->field)
			{
				$sqll =  "select * from Professor WHERE name ='$pro->name' and School ='$pro->school' and Field = '$pro->field'";
				$sql =  "select * from Professor WHERE name ='$pro->name' and School ='$pro->school' and Field = '$pro->field' limit ".
						($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
				$num = $this->totalRecord($sql);
			}*/
			if ($pro->school && $pro->field)
			{
				$sqll = "select * from Professor WHERE School ='$pro->school' and Field = '$pro->field'";
				$sql =  "select * from Professor WHERE School ='$pro->school' and Field = '$pro->field'limit ".
						($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
				$num = $this->totalRecord($sqll);
			}
	
			$sqlHelper->execute_dql_fenye2($sql, $num, $fenyePage);
			$sqlHelper->close_connect();
		}
		
		
			
		public function getProByName($name)
		{
			$sql = "select * from professor where Name='$name'";
			$sqlHelper = new SqlHelper();
			$arr = $sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();
				
			$pro = new Pro();
			$pro->pro_id = $arr[0]['pro_id'];
			$pro->name = $arr[0]['Name'];
			$pro->school = $arr[0]['School'];
			$pro->statement = $arr[0]['statement'];
			$pro->contact = $arr[0]['contact'];
			$pro->website = $arr[0]['website'];
			return $pro;
		}
	}
?>