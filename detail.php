<?php
@session_start();
include("function/function.php");
include("include/db.php");
if($_GET['u_id'])
{
$customer_id=$_GET['u_id'];
$c_email="select * from user where u_id='$customer_id'";
$run_email=mysqli_query($con,$c_email);
$row_email=mysqli_fetch_array($run_email);
$customer_email=$row_email['u_email'];
$customer_name=$row_email['u_name'];
} 
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
  body{
    background-color: #a6a6a6;
  }
   #detail{
    color: black;
    font-size: 25px;
   }
   #confirm
{
  background-color: black;
  color: yellow;
  font-weight: bold
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

<div id="detail">
  <div class="row">
      <div class="col-md-12 col-md-3">
      </div>

      <div class="col-md-12 col-md-9" >

        

      <div class="container" >
        <h1 style="font-size:38px; font-weight:bold;">YOUR ADDRESS</h1>
        
        <br /> 
        <div class="row">
        <div class="col-md-6">
        
        <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group" >
        <label for="name">Name:*</label>
          <input type="text" class="form-control" name="name" placeholder="" id="name" value="<?php echo $customer_name; ?>">
          </div>

                     
          <div class="form-group" >
        <label for="emailc">Email:*</label>
          <input type="email" class="form-control" name="emailc" placeholder="" id="emailc" value="<?php echo $customer_email; ?>" required>
          </div>

          <div class="form-group" >
        <label for="Add">Address:*</label>
          <input type="text" class="form-control" name="add" placeholder="" id="add" required>
          </div>

    <div class="form-group" >
        <label for="num">Mobile No.:*</label>
          <input type="number" class="form-control" name="num" placeholder="hint(03214567895)" id="num" required>
          </div>


          <div class="form-group">
  <label for="city">City:*</label>
  <select class="form-control" id="city" name="city" required>
    <option>Select City</option>
<option value="KARACHI">KARACHI</option>
<option value="LAHORE">LAHORE</option>
<option value="ISLAMABAD">ISLAMABAD</option>
<option value="RAWALPINDI">RAWALPINDI</option>
<option value="RAHIM YAR KHAN">RAHIM YAR KHAN</option>
<option value="BHAWALPUR">BHAWALPUR</option>
<option value="FAISALABAD">FAISALABAD</option>
<option value="HYDERABAD">HYDERABAD</option>
<option value="MULTAN">MULTAN</option>
<option value="QUETTA">QUETTA</option>

  </select>
</div>

<div class="form-group">
<button type="submit" name="confirm"  autofocus  type='button' id='confirm' role='button' class='btn btn-secondary'>CONFIRM</button>
</div>
</form>
</div>
         </div>
         </div>
      </div>

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
<?php
if(isset($_POST['confirm']))
{
$customer_add=$_POST['add'];
$customer_num=$_POST['num'];
$customer_city=$_POST['city'];
$comp='complete';

$insert_address="insert into address (cname,cemail,cadd,cnum,ccity,status) values ('$customer_name','$customer_email','$customer_add','$customer_num','$customer_city','$comp')";

$run_address=mysqli_query($con,$insert_address);
if($run_address)
{
  echo "<script>window.open('complete.php','_self')</script>";
$update_order="update customer_order set status='$comp' where u_id='$customer_id'";
$run_update=mysqli_query($con,$update_order);

$delete_order="delete from pending_order where u_id='$customer_id'";
$run_delete=mysqli_query($con,$delete_order);


}
/*echo "<h2 style='text-align:center; color:white;'>Payment Recieved!!Your order will be arrived within 24hours!</h2>";*/

}

?>