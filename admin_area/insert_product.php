<?php
include("include/db.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert Product</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/2068589c33.js"></script>

 <!-- Custom styles for this template -->
<link href="css/st.css" rel="stylesheet">

</head>

<body>
<div class="col-md-12 col-md-3"> 
</div> 
<div class="col-md-12 col-md-9"> 
<div class="container">

<h1 class="page-header" style="color:yellow;">ADD PRODUCTS</h1>
<br/>

<div class="row">
<div class="col-md-6">  
<form class="form-horizontal" method="post" action="insert_product.php" enctype="multipart/form-data" >

<div class="form-group row">  
  <label for="c_name" >Car Name:</label>
  <input type="text" class="form-control" id="c_name" name="c_name" required>  
</div>

<div class="form-group">
  <label for="comp_name">Company Name:</label>
  <select class="form-control" name="comp_name" required>
  <option>Select Company Name</option>
  <?php
  $get_comp="select * from company";
  $run_comp=mysqli_query($con,$get_comp);
  while($row_comp=mysqli_fetch_array($run_comp))
      {
        $comp_id=$row_comp['comp_id'];
        $comp_name=$row_comp['comp_name'];
        echo "<option value='$comp_id' AND '$comp_name'>$comp_name</option>";
      } 
  ?>
  </select>
</div>

<div class="form-group">
  <label for="c_cat">Category:</label>
  <select class="form-control" name="c_cat" required>
  <option>Select Category</option>
  <?php
  $get_cat="select * from category";
  $run_cat=mysqli_query($con,$get_cat);
  while($row_cat=mysqli_fetch_array($run_cat))
      {
        $cat_id=$row_cat['cat_id'];
        $cat_name=$row_cat['cat_name'];
        echo "<option value='$cat_id' AND '$cat_name'>$cat_name</option>";
      } 
  ?>
  </select>
</div>

<div class="form-group">
  <label for="c_image">Car Image:</label>
  <input type="file" class="form-control-file" id="c_image" name="c_image" required>
</div>


<div class="form-group">
  <label for="year">Year:</label>
  <select class="form-control" id="year" name="year" required>
    <option>Select year</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
  </select>
</div>

<div class="form-group">
  <label for="trans">Transmission:</label>
  <select class="form-control" id="trans" name="trans" required>
   <option>Select Transmission</option>
   <option value="Automatic">Automatic</option>
   <option value="Manual">Manual</option>
  </select>
</div>


<div class="form-group">
  <label for="fuel">Fuel Type:</label>
  <select class="form-control" id="fuel" name="fuel" required>
   <option>Select Fuel Type</option>
   <option value="Diesel">Diesel</option>
   <option value="Gas">Gas</option>
  </select>
</div>


<div class="form-group">
  <label for="eng">Engine:</label>
  <input type="text" class="form-control" id="eng" name="eng" required>
</div>


<div class="form-group">
  <label for="c_price">Car Price:</label>
  <input type="text" class="form-control" id="c_price" name="c_price" required>
</div>

<div class="form-group">
  <label for="c_desc">Car Description:</label>
  <textarea name="c_desc" rows="5" class="form-control" id="c_desc"></textarea>
</div>

<div class="form-group">
  <label for="c_keyword">keyword:</label>
  <input type="text" class="form-control" id="c_keyword" name="c_keyword" required>
</div>




<div class="form-group">
<button type="submit" class="btn btn-warning" name="insert_product"><b>Insert Product!<b></button>
</div>
</form>

</div>
</div>
</div>
</div> 
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>



</body>
</html>

<?php
if(isset($_POST['insert_product']))
{
   //text data variable
  $car_name=$_POST['c_name'];
  $car_cat=$_POST['c_cat'];
  $car_comp=$_POST['comp_name'];
  $car_price=$_POST['c_price'];
  $car_desc=$_POST['c_desc'];
  $status='on';
  $car_keyword=$_POST['c_keyword'];
  $car_year=$_POST['year'];
  $car_trans=$_POST['trans'];
  $car_fuel=$_POST['fuel'];
  $car_eng=$_POST['eng'];


$comp="select comp_name from company where comp_id='$car_comp'";
$compname=mysqli_query($con,$comp);
while($row_comp=mysqli_fetch_array($compname))
{
   $c_comp=$row_comp['comp_name'];
}


$category="select cat_name from category where cat_id='$car_cat'";
$cat_name=mysqli_query($con,$category);
while($row_cat=mysqli_fetch_array($cat_name))
{
   $c_cat=$row_cat['cat_name'];
}

  //img name
  $car_img=$_FILES['c_image']['name'];
  
  //img temp name
  $temp_name1=$_FILES['c_image']['tmp_name'];  
  
  move_uploaded_file($temp_name1,"product_image/$car_img");
 
    
  $insert_prod="insert into car (cat_id,comp_id,comp_name,cat_name,car_name,date,car_image,
    car_price,car_desc,car_keyword,status,year,transmission,fuel,engine) 
  values('$car_cat','$car_comp','$c_comp','$c_cat','$car_name',NOW(),'$car_img','$car_price',
    '$car_desc','$car_keyword','$status','$car_year','$car_trans',
    '$car_fuel','$car_eng')";
    
  $run_prod=mysqli_query($con,$insert_prod);


    
  if($run_prod)
  {
    echo "<script>alert('Product Inserted Sucessfully')</script>";
     echo "<script>window.open('insert_product.php','_self')</script>";
  }
  
}
?>