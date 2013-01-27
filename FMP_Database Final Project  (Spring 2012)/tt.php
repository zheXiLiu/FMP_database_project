<?php
	require_once 'SqlHelper.class.php';
	
	$s = new SqlHelper();
	$word = "this 1";
	echo $s->wordcast($word);
	
	
	/*
	 * 
	create table com_stat
	(
		com_id int,
		email varchar(20),
		vote_stat varchar(10),
		primary key(com_id,email)
	)
	
	insert into com_stat
	(com_id, email,vote_stat)
	values
	(18,"user5","upvote");
	*/
?>

	
create trigger vote
AFTER INSERT ON com_stat
FOR EACH ROW BEGIN
UPDATE
comment set upvote = (upvote+1)
WHERE comment.com_id = NEW.com_id 
and 
NEW.vote_stat="upvote" ;
END


