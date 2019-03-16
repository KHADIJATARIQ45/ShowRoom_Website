<?php
include("function/function.php");
include("include/db.php");
@session_start();
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
.badge
{
  background-color: black;
  color: yellow;

}
#confirm
{
  background-color: black;
  color: yellow;
  font-weight: bold
}
#confirm:hover
{
   background-color:yellow;
  color: black;
  font-weight: bold;
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


 <div class="container">
<?php 
if(!isset($_SESSION['u_email']))
{
  echo "<h2 Style='margin:10% 30% 30% 20%;'>PLEASE login Or signUp your account!</h2>" ;
}

else
{
echo"
<a href='buy.php' role='button' class='btn btn-lg btn-dark' style='float:right; margin-left:-170px;'><span class='glyphicon glyphicon-menu-left'></span>BACK</a>
<br>
<h1 style='font-weight:bold; color:black;'>ORDER</h1><br/>
<hr>";
if(isset($_GET['buy']))
{
 $buy_id=$_GET['buy'];
$buy_car="select * from car where car_id='$buy_id'";
$run_buy=mysqli_query($con,$buy_car);
while($row_buy=mysqli_fetch_array($run_buy))
{
$buy_id=$row_buy['car_id'];
$buy_name=$row_buy['car_name'];
$buy_comp=$row_buy['comp_name'];
$buy_cat=$row_buy['cat_name'];
$buy_price=$row_buy['car_price'];
$buy_image=$row_buy['car_image'];
$year=$row_buy['year'];
$trans=$row_buy['transmission'];
$fuel=$row_buy['fuel'];
$engine=$row_buy['engine'];
}
}






echo "
 <div class='row'>
        <div class='col-md-12 col-md-8'>
        <img src='admin_area/product_image/$buy_image' class='img-responsive' height='50%' width='70%'>
        <br />
        </div>
        <div class='col-md-4' style='padding-top:20px;'>
        <h2 style='font-weight:bold;font-size:25px; font-family:Arial;'>SPECIFICATION</h2>
         <div class='sidebar-widget widget'>
        <ul class='list-group'>
         <li class='list-group-item'> <span class='badge'>MOdel</span>$buy_name</li>
        <li class='list-group-item'> <span class='badge'>Category</span>$buy_cat</li>
        <li class='list-group-item'> <span class='badge'>Make</span>$buy_comp</li>
        <li class='list-group-item'> <span class='badge'>Year</span>$year</li>
        <li class='list-group-item'> <span class='badge'>Transmission</span>$trans</li>
        <li class='list-group-item'> <span class='badge'>Fuel type</span>$fuel </li>
        <li class='list-group-item'> <span class='badge'>Engine Type</span>$engine</li>
        <li class='list-group-item'> <span class='badge'>Price</span>$buy_price/-</li>
       </ul>
       &nbsp;
      <br>
   </div>
 <a href='buynowc.php?buyc=$buy_id' type='button' id='confirm' role='button' class='btn btn-secondary btn-lg btn-block'>CONFIRM ORDER</a>
  <a href='buynow.php?remove=<?php echo $buy_id; ?>' type='button'  role='button' class='btn btn-secondary btn-lg btn-block btn-danger' style='font-weight: bold'>REMOVE ORDER</a>
  <br>
        </div>

        </div>";




}
?>

<?php
if(isset($_GET['remove']))
{
  $remove_id=$_GET['remove'];
  $delete_product="delete from buynow where car_id='$remove_id'";
  $run_delete=mysqli_query($con,$delete_product);
  if($run_delete)
  {
  echo "<script>window.open('buy.php','_self')</script>";
  }

}
?>

</div>


<!--footer-->
<footer id="footer" >
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
