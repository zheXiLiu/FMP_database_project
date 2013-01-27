<?php
	
	//Tool class, operations on database.
	
	class SqlHelper
	{
		public $conn;
		public $dbname = "liu275_liu275";
		public $username= "root";
		public $password = "Lzx19920619";
		public $host = "localhost";
		
		public function __construct()
		{
			$this->conn = mysql_connect($this->host,$this->username,$this->password);
			if (!$this->conn)
			{
				die("Database connection faild".mysql_error());	
			}
			mysql_select_db($this->dbname,$this->conn);
		}
		
		public function wordcast($word)
		{
			$arr = explode(" ", $word);
			$word = implode("%", $arr);
			return $word;
		}
		
		public function execute_dql($sql)
		{
			$res = mysql_query($sql,$this->conn) or die(mysql_error());
			return $res;
		}
		
		//执行dql 返回数组，立刻释放资源
		public function execute_dql2($sql)
		{
			$arr = array();
			$res = mysql_query($sql,$this->conn) or die(mysql_error());
			$i = 0;
			while ($row = mysql_fetch_assoc($res))
			{
				$arr[$i++] = $row;
			}
			//这里可以把res马上关闭掉
			mysql_free_result($res);
			return $arr;
		}
		
		public function count_dql($sql)
		{
			$arr = array();
			$res = mysql_query($sql,$this->conn) or die(mysql_error());
			$i = 0;
			while ($row = mysql_fetch_assoc($res))
			{
				$arr[$i++] = $row;
			}
			//这里可以把res马上关闭掉
			mysql_free_result($res);
			$count = count($arr);
			return $count;
		}
		
		//执行dml
		public function execute_dml($sql)
		{
			//echo "<br>HERE<br>";
			$b = mysql_query($sql,$this->conn) ;
			if (!$b)
			{	
				return 0;
			}
			else
			{
				if(mysql_affected_rows($this->conn))
				{
					//echo "<br>SUCCESS<br>";
					return 1;
				}
				else
				{
					
					return 2;
				}
			}
		}

		//关闭连接
		public function close_connect()
		{
			if (!empty($this->conn))
			{
				mysql_close($this->conn);
			}
		}
		
		public function execute_dql_fenye($sql1,$sql2,&$fenyePage)
		{
			//查询到要分页的数据
			$res = mysql_query($sql1) or die (mysql_error());
			//$res->array()
			$arr = "";
			while ($row = mysql_fetch_assoc($res))
			{
				$arr[] = $row;
			}
				
			$res2 = mysql_query($sql2, $this->conn) or die (mysql_error());
			if ($row = mysql_fetch_row($res2))
			{
				$fenyePage->pageCount = ceil($row[0]/$fenyePage->pageSize);
				$fenyePage->rowCount = $row[0];
			}
				
			mysql_free_result($res);
			mysql_free_result($res2);
			// 把$arr 给fenyePage
			$fenyePage->res_array = $arr;
				
			//把导航信息也放到分页中
			$navigator= "";
				
			$start = floor(($fenyePage->pageNow-1)/$fenyePage->page_whole)*$fenyePage->page_whole +1;
			$pre_start = $start-1;
			$index = $start;
				
			$navigator= "Current Page: {$fenyePage->pageNow}/ Total: {$fenyePage->pageCount} &nbsp &nbsp ";
			
			//start 1->10,  floor($pageNow - 1)/10  11->20 floor(($pageNow-1)/10)ï¼� 1ï¼Š10ï¼‹1,  21..2ï¼Š10ï¼‹1
			//向前整体翻页
			if ($fenyePage->pageNow > $fenyePage->page_whole)
			{
				$navigator.= "&nbsp<a href = '{$fenyePage->gotoUrl}&pageNow= $pre_start'> <<  </a> &nbsp ";
			}
						
			//上一页
			if ($fenyePage->pageNow > 1)
			{
				$pagePrev= $fenyePage->pageNow - 1;
				$navigator.= "&nbsp <a href = '{$fenyePage->gotoUrl}&pageNow=$pagePrev'> Previous</a> &nbsp ";
			}
		
			// x个页面		
			for (; $start < $index+10; $start++)
			{
				if ($start-1 < $fenyePage->pageCount)
				{
					if ($start == $fenyePage->pageNow)
						$navigator.= "<a href = '{$fenyePage->gotoUrl}&pageNow=$start' style = 'color:Red; font-weight:bold'>[$start]</a>";
					else
						$navigator.= "&nbsp<a href = '{$fenyePage->gotoUrl}&pageNow=$start' >[$start]</a>&nbsp";
				}
			}	
			//下一页
			if ($fenyePage->pageNow<$fenyePage->pageCount)
			{
				$pageNext = $fenyePage->pageNow+1;
				$navigator.="&nbsp <a href = '{$fenyePage->gotoUrl}&pageNow=$pageNext'> Next</a> &nbsp ";
			}
							
			//向后整体翻页
			if ($fenyePage->pageNow - 1+$fenyePage->page_whole<$fenyePage->pageCount)
			{
				$navigator.= "&nbsp<a href = '{$fenyePage->gotoUrl}&pageNow= $start'> >> </a> &nbsp ";
			}
					
			//当前页
		
					
			$fenyePage->navigator = $navigator;
		}
		
		
		public function execute_dql_fenye2($sql,$num,&$fenyePage)
		{
			$res = mysql_query($sql) or die (mysql_error());
			$arr = "";
			while ($row = mysql_fetch_assoc($res))
			{
				$arr[] = $row;
			}
				
	
			$fenyePage->pageCount = ceil($num/$fenyePage->pageSize);
			$fenyePage->rowCount = $num;
			
			mysql_free_result($res);
			$fenyePage->res_array = $arr;
			$navigator= "";
			

			echo "number of records each page: ".$fenyePage->pageSize."<br>";
			echo "number of pages:".$fenyePage->pageCount."<br>";
			
			$start = floor(($fenyePage->pageNow-1)/$fenyePage->page_whole)*$fenyePage->page_whole +1;
			$pre_start = $start-1;
			$index = $start;
		
			//向前整体翻页
			if ($fenyePage->pageNow > $fenyePage->page_whole)
			{
				$navigator= "&nbsp<a href = '{$fenyePage->gotoUrl}&pageNow= $pre_start'> <<  </a> &nbsp ";
			}
		
			//上一页
			if ($fenyePage->pageNow > 1)
			{
				$pagePrev= $fenyePage->pageNow - 1;
				$navigator.= "&nbsp <a href = '{$fenyePage->gotoUrl}&pageNow=$pagePrev'> Previous</a> &nbsp ";
			}
			// x个页面
			for (; $start < $index+10; $start++)
			{
				if ($start-1 < $fenyePage->pageCount)
				{
					if ($start == $fenyePage->pageNow)
						$navigator.= "<a href = '{$fenyePage->gotoUrl}&pageNow=$start' style = 'color:Red; font-weight:bold'>[$start]</a>";
					else
						$navigator.= "&nbsp<a href = '{$fenyePage->gotoUrl}&pageNow=$start' >[$start]</a>&nbsp";
				}
			}
			//下一页
			if ($fenyePage->pageNow<$fenyePage->pageCount)
			{
				$pageNext = $fenyePage->pageNow+1;
				$navigator.="&nbsp <a href = '{$fenyePage->gotoUrl}&pageNow=$pageNext'> Next</a> &nbsp ";
			}
				
			//向后整体翻页
			if ($fenyePage->pageNow - 1+$fenyePage->page_whole<$fenyePage->pageCount)
			{
				$navigator.= "&nbsp<a href = '{$fenyePage->gotoUrl}&pageNow= $start'> >> </a> &nbsp ";
			}
				
			//当前页
			//$navigator.= "<br>Current Page: {$fenyePage->pageNow}/ Total: {$fenyePage->pageCount}<br><br><br>";
			
			$fenyePage->navigator = $navigator;
		}
	}
	
?>