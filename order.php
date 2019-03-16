<?php
include("include/db.php");
include("function/function.php");
@session_start();
//getting customer id
if($_GET['u_id'])
{
$customer_id=$_GET['u_id'];
$c_email="select * from user where u_id='$customer_id'";
$run_email=mysqli_query($con,$c_email);
$row_email=mysqli_fetch_array($run_email);
$customer_email=$row_email['u_email'];
$customer_name=$row_email['u_name'];
}	


   $sel_price="select * from buynow where u_id='$customer_id'";
   $run_price=mysqli_query($con,$sel_price);
   $status='pending';
   $invoice_no=mt_rand();
   while ($record=mysqli_fetch_array($run_price)) 
   {
   	 $c_id=$record['car_id'];
   	 $c_price="select * from car where car_id='$c_id'";
   	 $run_c_price=mysqli_query($con,$c_price);
     while ($price=mysqli_fetch_array($run_c_price)) 
     {

       $car_name=$price['car_name'];
       $car_price=$price['car_price'];
     }
     
   }

   $insert="insert into customer_order (u_id,car_id,car_name,car_price,invoice_no,order_date,status) 
values ('$customer_id','$c_id','$car_name','$car_price','$invoice_no',NOW(),'$status')";

  $run_order=mysqli_query($con,$insert);

  $insert_pending="insert into pending_order (u_id,car_id,car_name,invoice_no,car_price,status) 
   values ('$customer_id','$c_id','$car_name','$invoice_no','$car_price','$status') ";
  $run_pending_orders=mysqli_query($con,$insert_pending);

	echo "<script>alert('0rder Sucessfully Submitted!Thank You...')</script>";
	echo "<script>window.open('detail.php?u_id=$customer_id','_self')</script>";

	$empty_cart="delete from buynow where u_id='$customer_id'";
	$run_empty=mysqli_query($con,$empty_cart);





?>