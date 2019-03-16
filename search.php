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
  <link rel="stylesheet" type="text/css" href="css/style1.css">
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
           <li><a href="buy.php">BUY</a></li>
          <li><a href="#">RENT</a></li>
        </ul>
      </li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="margin-right:-10px;">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>CART</a></li>
      </ul>
    </div>
  </div>
</nav> 



<!--product-->
<!--sidebar-->
<div class="row">
<div class="col-md-2" id="sidebar" >
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
</div><!--end sidebar-->

<div class=" col-md-10"><!--vehicle-->

  <form class="form" role="search" id="search" method="get" enctype="multipart/form-data" action="search.php">
    <div class="input-group add-on">
      <input class="form-control" name="user_query" placeholder="Search a Product" id="srch-term" type="text" required>
      <div class="input-group-btn">
        <button class="btn btn-dark" name="search" type="submit"><i class="glyphicon glyphicon-search" style="color:yellow;"></i></button>
      </div>
    </div>
  </form>

  <br/>
  <?php 
         if(isset($_GET['search']))
         {
         $user_keyword=$_GET['user_query'];
         $get_product="select * from car where car_keyword like '%$user_keyword%'";
         $run_product=mysqli_query($con,$get_product);
         while($row_car=mysqli_fetch_array($run_product))
         {

          $car_id=$row_car['car_id'];
          $car_name=$row_car['car_name'];
          $car_cat=$row_car['cat_id'];
          $car_comp=$row_car['comp_id'];
          $car_desc=$row_car['car_desc'];
          $car_price=$row_car['car_price'];
          $car_image=$row_car['car_image'];
           
          echo "
          <div class='col-md-3' style='margin-left:120px; margin-bottom:30px; margin-right:-40px;'>
          <div class='polaroid' style='margin-top:25px; '>
          <img src='admin_area/product_image/$car_image' alt='$car_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
          width='278px' />
          <div class='caption'>
          <h2 style='font-weight:bold;color:black; text-align:left;'>$car_name</h2> 
          <h4>Starting from</h4>
          <h4>$car_price/-</h4><br />
          <a href='explore.php' type='button' class='btn btn-dark' role='button' >Explore</a>
          </div>
          </div>
          </div>
          ";
            
            
         }
         }
             ?> 
</div>
</div>

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
