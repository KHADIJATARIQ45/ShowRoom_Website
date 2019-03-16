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
  <link rel="stylesheet" type="text/css" href="css/explore1.css">
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
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span>LOG IN</a></li>
      
      </ul>
    </div>
  </div>
</nav> 


<!--explore-->
<div id="exp">
<?php
  
            if(isset($_GET['car_id']))
            {
            
            $car_id=$_GET['car_id'];
            $get_det="select * from car where car_id='$car_id'";
            $run_det=mysqli_query($con,$get_det);
            while($row_car=mysqli_fetch_array($run_det))
           {
          $car_id=$row_car['car_id'];
          $car_name=$row_car['car_name'];
          $car_cat=$row_car['cat_id'];
          $car_comp=$row_car['comp_id'];
          $car_desc=$row_car['car_desc'];
          $car_price=$row_car['car_price'];
          $car_image=$row_car['car_image'];
          $year=$row_car['year'];
          $trans=$row_car['transmission'];
          $comp=$row_car['comp_name'];
          $fuel=$row_car['fuel'];
          $engine=$row_car['engine'];
            
            
        echo "
        <div id='single'>
        <div class='page-header' >
        <div class='clearfix'>
       <h1 style='  font-size:45px; color:black; font-style: Arial; font-weight:bold;'>$car_name</h1><br/>
       &nbsp;
       <span  class='round' style='float:right; '>Starting from PKR. $car_price/-</span>
        </div>
        </div>
        <br>
        <div class='row'>
        <div class='col-md-12 col-md-8'>
        <img src='admin_area/product_image/$car_image' id='myImg' class='img-responsive' height='70%' width='100%'>
        <br />
        <div id='myModal' class='modal'>
       <span class='close'>&times;</span>
       <img class='modal-content' id='img01'>
        <div id='caption'></div>
        </div>
        <h2 style='font-weight:bold; font-size:35px; color:black; margin-top:-40PX;'>PRICE: $car_price/-</h2>
        <br>
        <div class='well well-large'>
        <p  id='desc'>$car_desc</p>
        </div>
        <br>
        </div>
        <div class='col-md-4' style='padding-top:60px;'>
         <div class='sidebar-widget widget'>
        <ul class='list-group'>
        <li class='list-group-item'> <span class='badge'>Year</span>$year</li>
        <li class='list-group-item'> <span class='badge'>Make</span>$comp</li>
        <li class='list-group-item'> <span class='badge'>Model</span>$car_name</li>
        <li class='list-group-item'> <span class='badge'>Transmission</span>$trans</li>
        <li class='list-group-item'> <span class='badge'>Fuel type</span> $fuel</li>
        <li class='list-group-item'> <span class='badge'>Engine Type</span> $engine</li>
       </ul>
       &nbsp;
       <a href='buynow.php?buy=$car_id' type='button' id='buy' role='button' class='btn btn-secondary btn-lg btn-block'>BUY NOW</a>
           <br>
        </div>

        </div>
        </div>
        <script>
        var modal = document.getElementById('myModal');
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById('img01');
        var captionText = document.getElementById('caption');
         img.onclick = function(){
         modal.style.display = 'block';
         modalImg.src = this.src;
         captionText.innerHTML = this.alt;
         }
      var span = document.getElementsByClassName('close')[0];
     span.onclick = function() { 
     modal.style.display = 'none';
     }
    </script>

        
        ";



}
}
?>

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
