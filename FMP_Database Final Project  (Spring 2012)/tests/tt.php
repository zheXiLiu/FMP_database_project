<?php
	require_once 'SqlHelper.class.php';
	
	$s = new SqlHelper();
	$word = "Here we go";
	echo $s->wordcast($word);
?>