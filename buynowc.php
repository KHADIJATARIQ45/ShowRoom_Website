<?php
include("include/db.php");
include("function/function.php");
@session_start();
//getting customer id
if(isset($_GET['buyc']))
{
$buyc_id=$_GET['buyc'];
$user_email=$_SESSION['u_email'];
$get_customer="select u_id from user where u_email='$user_email'";
$run_customer=mysqli_query($con,$get_customer);
$customer=mysqli_fetch_array($run_customer);
$us_id=$customer['u_id'];
$buy_insert="insert into buynow (car_id,u_id) VALUES ('$buyc_id','$us_id')";
$run_buy=mysqli_query($con,$buy_insert);
echo "<script>window.open('order.php?u_id=$us_id','_self')</script>";
}


?>