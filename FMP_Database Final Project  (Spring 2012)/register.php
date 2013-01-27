<?php	
	
	error_reporting(0);
	session_start();
	require_once "SqlHelper.class.php";
	
	
	if ($_SESSION['email'])
	{
		header("location: index.php");
	}
	
	else
	{
	
		
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password1 = $_POST['password1'];
			
			//echo $email.$password.$password1;
			
			$enc_password = md5($password);
			
			if($email && $password && $password1)
			{
				if (strlen($password) > 12 || strlen($password) < 6)
				{
					$errmsg = "Your password must be between 6 and 12 characters";
				}
			
			
				if ($password == $password1)
				{
	                //  echo $email."<br>".$enc_password;
					
	                $sql = "INSERT INTO stu (email,password) VALUES ('$email','$enc_password')";
					$sqlHelper = new SqlHelper();
					$res = $sqlHelper->execute_dml($sql);
	                //$query = mysql_query($sql,$conn);
					
	                 //$row = mysql_rows_affected($query);  
	                 // echo "rows changed".$row;
					
					die ("Resgiteration Complete! <a href = 'login.php'>Click here to login member area </a> ");
				}
				else
				{
					$errmsg =  "Passwords must match!";
				}
			}
			else
			{
				$errmsg =  "All fields are required!";
			}		
	
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign up &middot; By Automata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="docs/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="docs/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="docs/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="docs/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="docs/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="docs/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action = "register.php" method = "POST">
        	<h2 class="form-signin-heading">Please sign up</h2>
       		 <input type="text" name = "email" class="input-block-level" placeholder="Email address">
       		 <input type="password" name = "password" class="input-block-level" placeholder="Password">
       		 <input type="password" name = "password1" class="input-block-level" placeholder="Re-enter Password">

      		<button class="btn btn-large btn-primary"  type="submit">Sign Up</button>
			<button class="btn btn-large btn-primary" type="reset"> Clear </button>
             
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="docs/assets/js/jquery.js"></script>
    <script src="docs/assets/js/bootstrap-transition.js"></script>
    <script src="docs/assets/js/bootstrap-alert.js"></script>
    <script src="docs/assets/js/bootstrap-modal.js"></script>
    <script src="docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="docs/assets/js/bootstrap-tab.js"></script>
    <script src="docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="docs/assets/js/bootstrap-popover.js"></script>
    <script src="docs/assets/js/bootstrap-button.js"></script>
    <script src="docs/assets/js/bootstrap-collapse.js"></script>
    <script src="docs/assets/js/bootstrap-carousel.js"></script>
    <script src="docs/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
