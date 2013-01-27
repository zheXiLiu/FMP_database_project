<?php
	session_start();
	require_once 'pro.class.php';
	require_once 'ProService.class.php';
	
	$email = $_SESSION['email'];
	$name = $_REQUEST['name'];
	
	$proService = new ProService();
	$pro = new Pro();
	$pro = $proService->getProByName($name);
	$img = "proimg/".$name.".jpg";
	
?>

        
        
        
 <html>     
    <head>
   	 	<meta charset="utf-8">
	    <title><?php echo $name;?> &middot; By Automata</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Le styles -->
	    <link href="docs/assets/css/bootstrap.css" rel="stylesheet">
	    <style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
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
    <div class="container navbar-wrapper">

      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>ta
          </a>
          <a class="brand" href="#">Find your professor</a>
          <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
          <div class="nav-collapse collapse">
            <ul class="nav">
       		
       		 <li> <a  href="searchProfessorUI.php">Search Professors</a></li>
 
              <!-- Read about Bootstrap dropdowns at http://twitter.github.com/bootstrap/javascript.html#dropdowns -->
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="viewSelfProfile.php">View Profile</a></li>
                  <li><a href="editProfileUI.php">Edit Profile</a></li>
                  <li><a href="selfComView.php">View my comments</a></li>
                  </ul>
              </li>
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Our Functionality <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="search.html">Let's Search</a></li>
                  <li><a href="#">Conference Match</a></li>
                  <li><a href="#">Simply Recommend</a></li>
                  </ul>
              </li>
              
               <li> <a  href="logout.php">Log out</a></li>
  
           		 
            </ul>
          
          
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <table>
    	<tr >
    		<td width=18% style="text-align:center;vertical-align:top">
    			 
    				<img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="154" height="232" id="imceimage-field_portrait-" />   
   					<br><br>
    				<?php echo $pro->contact; ?>
    				<br>
   					<a href="<?php echo $pro->website; ?>">Personal Website</a><br/>
   					
   					
    		</td>
    		<td  width = 60%>
    			 <div class="body_copy" >
  				<h1><?php echo $name;?></h1>
	 		
				  <p><h4><?php echo $pro->school; ?></h4>
  	 			<?php echo $pro->statement; ?>
  	 			</div>
    		<td>
    		<td width = 20% style="text-align:center;vertical-align:top">
    			<h4><?php echo $name;?>'s Rating:</h4>
    			<h4>View Componemt Analysus: </h4>
    				 <h4>Rate this Professor: </h4>
    		</td>
    		
    	</tr>
    	
    	
    				
    </table>
    
  
    	 <br>
       	<br>
 		 <br>
  		<br>
 		 <br>  
   

  </div> <!-- portraint-container -->


 
 	
 	 <br>
 	 <br>
 	 <br>

	


</div>
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
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
</body>
</html>