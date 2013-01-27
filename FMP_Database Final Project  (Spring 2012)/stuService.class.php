<?php
	require_once 'SqlHelper.class.php';
	require_once 'stu.class.php';
	class stuService
	{
		public function getStu($email)
		{
			$sql = "select * from stu where email='$email'";
			$sqlHelper = new SqlHelper();
			$arr = $sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();
				
			$stu = new Stu();
			$stu->name = $arr[0]['name'];
			$stu->Cur_university=$arr[0]['Cur_university'];
			$stu->major=$arr[0]['major'];
			$stu->skills=$arr[0]['skills'];
			$stu->courses=$arr[0]['courses'];
			$stu->interest1=$arr[0]['interest1'];
			$stu->interest2=$arr[0]['interest2'];
			$stu->interest3=$arr[0]['interest3'];
			$stu->gpa=($arr[0]['gpa']);
			$stu->fb=($arr[0]['fb']);
			
			return $stu;
		}
		
		public function updateStu($stu)
		{
			$sql = "update stu set name='{$stu->name}', Cur_university ='{$stu->Cur_university}',".
			" major='{$stu->major}',skills ='{$stu->skills}',courses= '{$stu->courses}',".
			"interest1= '{$stu->interest1}',interest2='{$stu->interest2}',interest3='{$stu->interest3}',".
			"fb='{$stu->fb}',gpa='{$stu->gpa}' where email ='{$stu->email}'";
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
	}
?>