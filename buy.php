<?php
include("function/function.php");
include("include/db.php");
?>
<!doctype html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="icon" href="../../favicon.ico">
  <title>SPEEVO</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> 
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/2068589c33.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color:black;
  color: yellow;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color:black;
}

  </style>
</head>
<body>
<div id="main">  
 <!--header--> 
  <div class="jumbotron"><!--jumbtron used for header-->
    <h1>SPEEVOPARKER</h1> 
</div>
<!--navbar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" >
        <li ><a href="index.php">HOME</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="pro" >PRODUCT </a>
        <ul class="dropdown-menu" id="dropdown">
           <li><a href="buy.php">BUY</a></li><hr>
          <li><a href="#">RENT</a></li>
        </ul>
      </li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="ContactUs.php">CONTACT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
          <form class="navbar-form navbar-right" role="search" id="search" method="get" enctype="multipart/form-data" action="search.php">
    <div class="input-group add-on">
      <input class="form-control" name="user_query" placeholder="Search a Product" id="srch-term" type="text" required>
      <div class="input-group-btn">
        <button class="btn btn-dark" name="search" type="submit"><i class="glyphicon glyphicon-search" style="color:yellow;"></i></button>
      </div>
    </div>
  </form></li>
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span>ACCOUNT</a></li>
      
      </ul>
    </div>
  </div>
</nav> 



<!--product-->
<!--sidebar-->
<div class="row" id="pro">
<nav class="col-md-2" id="sidebar" >
&nbsp;  
<h2 class="round3">CATEGORIES</h2>
&nbsp;
<ul class="nav nav-pills nav-stacked" id="cats" >
<?php getcat(); ?>
</ul> 
&nbsp;
<h2 class="round3">VEHICLES</h2>
&nbsp;
<ul class="nav nav-pills nav-stacked" id="cats">
<?php getcompany(); ?>
</ul> 
</nav><!--end sidebar-->

<div class="col-md-10" style="width:80%;"><!--vehicle-->
  
    

<?php 
getcompanycar();
getcatcar();
getcar();
?>  

</div>
</div>
<div id="top">
  <button onclick="topFunction()" id="myBtn" title="Go to top"><span class="glyphicon glyphicon-chevron-up"></span></button>
  </div>

  <script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<!--footer-->
<footer id="footer">
<div class="row">
<div class="col-md-12 col-md-4" style="text-align:left; padding:10px; margin:5px; font-size:17px; margin-left:100px;">
<h3>Contact Us!</h3> <br>
<p><span class="glyphicon glyphicon-map-marker"></span>Karachi,Pakistan</p>
<p><span class="glyphicon glyphicon-phone"></span>0321 5678543</p>
<p><span class="glyphicon glyphicon-envelope"></span>myemail@something.com</p>
</div>
<div class="col-md-12 col-md-4" style="margin-top:110px; margin-left:-20px;"> 
<h3>&copy;2014 by www.speevoparker.com</h3>
</div>
<div class="col-md-12 col-md-6" style="text-align:right; margin-top:-120px; margin-right:150px; color:white; text-decoration:none; float:right;">
<h3>Follow US!</h3>
<br>
<a href="https://www.facebook.com/"><i class="fa  fa-facebook fa-3x" aria-hidden="true"></i></a>
<a href="https://www.twitter.com/"><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
<a href="https://www.linkedin.com/"><i class="fa fa-linkedin fa-3x" aria-hidden="true"></i></a>
<a href="https://plus.google.com/"><i class="fa fa-google-plus-circle fa-3x" aria-hidden="true"></i></a>
</div> 
</div>
</footer>
</div><!--main id-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
