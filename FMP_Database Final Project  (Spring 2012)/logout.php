<?php
	session_start();
	session_destroy();
	
	echo "You have been loged out!";

	echo " <a href = 'index.html'>Back to main page </a>";
?>