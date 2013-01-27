<?php
	session_start();
	$email = $_SESSION['email'];
	echo "Welcome, you are here as ".$email;
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Search &middot; By Automata</title>
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

    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit2">
        <h1>Search Your Potential Grad School Professor!</h1>
        <p>This is a seach engine that can help you track down the right professor to contact with. Give us your insterest and preference, and be ready for the results</p>
      </div>

      <!-- Example row of columns -->
          <h2>How to Search? </h2>
          <p>Choose your target school,field,and other preferences. We will give your the most accurate results based on the your background and interests. </p>
         <form name="searchProfessorA" method="post" action="searchProfessorProcess.php">
  <p>
    <label for="pname" class=" label label-success">Professor Name:</label>
    <input name="pnameA" type="text" class="input" placeholder="First Name Last Name">
  <p/>
  
  
  <p>
    <label for="School" class="label label-success" width = "10p%">University:</label>
      <select id = "SchoolA" name = "SchoolA">
        <option selected="selected" value="">Choose...</option>
        <option value = "UIUC">Univeristy of Illinois at Urbana Champain </option>
        <option value = "Stanford">Stanford University</option>
        <option value = "UCB">University of California, Berkeley </option>        
      </select>
  <p/>
  
  <p>
    <label for="FieldA" class="label label-success  ">     Field:</label>
      <select id="FieldA"  name="FieldA">
        <option selected="selected" value="">Choose....</option>
        <option value="Algorithms & Theory">Algorithms & Theory</option>
        <option value="Architecture">Architecture</option>
        <option value="Artificial Intelligence">Artificial Intelligence</option>
        <option value="Bioinformatics">Bioinformatics</option>
        <option value="Compilers">Compilers</option>
        <option value="Computer Vision">Computer Vision</option>
        <option value="Database">Database</option>
        <option value="Data Mining">Data Mining</option>
        <option value="Graphics">Graphics</option>
        <option value="HCI">HCI</option>
        <option value="Info Retrieval">Info Retrieval</option>
        <option value="Languages">Languages</option>
        <option value="Machine Learning">Machine Learning</option>
        <option value="Multimedia">Multimedia</option>
        <option value="Networking & Operating Systems">Networking & Operating Systems</option>
        <option value="Security & Trust">Security & Trust</option>
        <option value="Software Engineering">Software Engineering</option>
        
      </select>
  <p/>

  
  	   <p>
   			 <label for="Comment" class="label label-success  "> Keywords in Research Statement:</label>
           <input name="kw_dec" type="text" class="input" placeholder="Anything you want">
  	 <p/>
  
    <p>
   			 <label for="Comment" class="label label-success  "> Keywords in Comment:</label>
           <input name="kw_com" type="text" class="input" placeholder="Anything you want">
   <p/>
  
  
    <label><input class="btn btn-large btn-primary" type="submit" name="searchs" value="  Search this ! " /></label>
  
  </form>



      
      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

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
