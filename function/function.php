<?php
$db=mysqli_connect("localhost","root","","showroom");

/*cat ki id milay ghi idhr se */
function getcat()
{
	global $db;
	$get_cat="Select * from category";
	$run_cat=mysqli_query($db,$get_cat);
    while($row_cat=mysqli_fetch_array($run_cat))
	{
	$cat_id=$row_cat['cat_id'];
	$cat_name=$row_cat['cat_name'];
	echo "<li> <a href='buy.php?category=$cat_id'>
	<span class='glyphicon glyphicon-hand-right' style='color:#666600;'></span> $cat_name</a></li>";
	} 
}
/*company ki id milay ghi */
function getcompany()
{
	            global $db;
	            $get_cmp="Select * from company";
				$run_cmp=mysqli_query($db,$get_cmp);
         	   while($row_cmp=mysqli_fetch_array($run_cmp))
			{
				$comp_id=$row_cmp['comp_id'];
				$comp_name=$row_cmp['comp_name'];
				echo "<li ><a href='buy.php?company=$comp_id' >
				<span class='glyphicon glyphicon-hand-right' style='color:#666600;'></span> $comp_name</a></li>";
			} 
}
/* company pr click kren to wo vehicle display hn gay */
function getcompanycar()
{               
	            global $db;
                if(isset($_GET['company']))
	            {
                $comp_id=$_GET['company']; 
                $get_comp_car="select * from car where comp_id='$comp_id'";
				$run_comp_car=mysqli_query($db,$get_comp_car);
				$count=mysqli_num_rows($run_comp_car);
				if($count==0)
				{
					echo "<h2 style='text-align:center; margin-top:50px; color:#862d86; font-weight:bold; font-family:Verdana serif;'>No product found this category!</h2>";
				}
				 while($row_comp_car=mysqli_fetch_array($run_comp_car))
				 {
					$car_id=$row_comp_car['car_id'];
					$car_name=$row_comp_car['car_name'];
			        $car_cat=$row_comp_car['cat_id'];
					$car_comp=$row_comp_car['comp_id'];
					$car_desc=$row_comp_car['car_desc'];
					$car_price=$row_comp_car['car_price'];
					$car_image=$row_comp_car['car_image'];
					 
					echo "
                     <div class='col-md-3' style='margin-left:120px; margin-bottom:30px; margin-right:-10px;'>
                     <div class='polaroid' style='margin-top:25px; '>
                     <img src='admin_area/product_image/$car_image' alt='$car_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
                     width='278px' />
                     <div class='caption'>
                     <h2 style='font-weight:bold;color:black; text-align:left;'>$car_name</h2> 
                     <h4>Starting from</h4>
                     <h4>$car_price/-</h4><br />
                     <a href='explore.php?car_id=$car_id' type='button' class='btn btn-dark' role='button' >Explore</a>
                     </div>
                     </div>
                     </div>
                     ";
						
				 }
				}
			    
}

function getcatcar()
{
	            global $db;
                if(isset($_GET['category']))
	            {
                $cate_id=$_GET['category']; 
                $get_cat_car="select * from car where cat_id='$cate_id'";
				$run_cat_car=mysqli_query($db,$get_cat_car);
				$count=mysqli_num_rows($run_cat_car);
				if($count==0)
				{
					echo "<h2 style='text-align:center; margin-top:50px; color:#862d86; font-weight:bold; font-family:Verdana serif;'>No product found this category!</h2>";
				}
				 while($row_cat_car=mysqli_fetch_array($run_cat_car))
				 {
					$car_id=$row_cat_car['car_id'];
					$car_name=$row_cat_car['car_name'];
			        $car_cat=$row_cat_car['cat_id'];
					$car_comp=$row_cat_car['comp_id'];
					$car_desc=$row_cat_car['car_desc'];
					$car_price=$row_cat_car['car_price'];
					$car_image=$row_cat_car['car_image'];
					 
					echo "
                     <div class='col-md-3' style='margin-left:120px; margin-bottom:30px; margin-right:-10px;'>
                     <div class='polaroid' style='margin-top:25px; '>
                     <img src='admin_area/product_image/$car_image' alt='$car_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
                     width='278px' />
                     <div class='caption'>
                     <h2 style='font-weight:bold;color:black; text-align:left;'>$car_name</h2> 
                     <h4>Starting from</h4>
                     <h4>$car_price/-</h4><br />
                     <a href='explore.php?car_id=$car_id' type='button' class='btn btn-dark' role='button' >Explore</a>
                     </div>
                     </div>
                     </div>
                     ";
						
				 }
				}
}

/*all vehicle display hn gay buy k */

function getcar()
{               
	            global $db;
                if(!isset($_GET['company']))
	            {
	            if(!isset($_GET['category']))	
	            {	
                $get_car="select * from car order by rand()";
				$run_car=mysqli_query($db,$get_car);
				$count=mysqli_num_rows($run_car);
				if($count==0)
				{
					echo "<h2 style='text-align:center; margin-top:50px; color:#862d86; font-weight:bold; font-family:Verdana serif;'>No product found this category!</h2>";
				}
				 while($row_car=mysqli_fetch_array($run_car))
				 {
					$car_id=$row_car['car_id'];
					$car_name=$row_car['car_name'];
			        $car_cat=$row_car['cat_id'];
					$car_comp=$row_car['comp_id'];
					$car_desc=$row_car['car_desc'];
					$car_price=$row_car['car_price'];
					$car_image=$row_car['car_image'];
					 
					echo "
                     <div class='col-md-3' style='margin-left:60px; margin-bottom:30px; margin-right:-10px;'>
                     <div class='polaroid' style='margin-top:25px; '>
                     <img src='admin_area/product_image/$car_image' alt='$car_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
                     width='278px' />
                     <div class='caption'>
                      <h2 style='font-weight:bold;color:black; text-align:left;'>$car_name</h2> 
                     <h4>Starting from</h4>
                     <h4>$car_price/-</h4><br />
                     <a href='explore.php?car_id=$car_id' type='button' class='btn btn-dark' role='button' >Explore</a>
                     </div>
                     </div>
                     </div>
                     ";
						
				 }
				}
			    
}

}


function getrent()
{               
	            global $db;
                if(!isset($_GET['company']))
	            {
	            if(!isset($_GET['category']))	
	            {	
                $get_rent="select * from rent order by rand()";
				$run_rent=mysqli_query($db,$get_rent);
				$count=mysqli_num_rows($run_rent);
				if($count==0)
				{
					echo "<h2 style='text-align:center; margin-top:50px; color:#862d86; font-weight:bold; font-family:Verdana serif;'>No Vehicle found this category!</h2>";
				}
				 while($row_rent=mysqli_fetch_array($run_rent))
				 {
					$rent_id=$row_rent['rent_id'];
					$rent_name=$row_rent['r_name'];
			        $rent_cat=$row_rent['cat_id'];
					$rent_comp=$row_rent['comp_id'];
					$rent_desc=$row_rent['r_desc'];
					$rent_price=$row_rent['r_price'];
					$rent_image=$row_rent['r_image'];
					 
					echo "
                     <div class='col-md-3' style='margin-left:60px; margin-bottom:30px; margin-right:-10px;'>
                     <div class='polaroid' style='margin-top:25px; '>
                     <img src='admin_area/rent_car_image/$rent_image' alt='$rent_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
                     width='278px' />
                     <div class='caption'>
                      <h2 style='font-weight:bold;color:black; text-align:left;'>$rent_name</h2> 
                     <h4>Price per day</h4>
                     <h4>$rent_price/-</h4><br />
                     <a href='explore_rent.php?rent_id=$rent_id' type='button' class='btn btn-dark' role='button' >Details</a>
                     </div>
                     </div>
                     </div>
                     ";
						
				 }
				}
			    
}

}


function getcatrent()
{
	            global $db;
                if(isset($_GET['category']))
	            {
                $cate_id=$_GET['category']; 
                $get_cat_rent="select * from car where cat_id='$cate_id'";
				$run_cat_rent=mysqli_query($db,$get_cat_rent);
				$count=mysqli_num_rows($run_cat_rent);
				if($count==0)
				{
					echo "<h2 style='text-align:center; margin-top:50px; color:#862d86; font-weight:bold; font-family:Verdana serif;'>No Vehicle found this category!</h2>";
				}
				 while($row_cat_rent=mysqli_fetch_array($run_cat_rent))
				 {
					
					 $rent_id=$row_cat_rent['rent_id'];
					$rent_name=$row_cat_rent['r_name'];
			        $rent_cat=$row_cat_rent['cat_id'];
					$rent_comp=$row_cat_rent['comp_id'];
					$rent_desc=$row_cat_rent['r_desc'];
					$rent_price=$row_cat_rent['r_price'];
					$rent_image=$row_cat_rent['r_image'];
					 
					echo "
                     <div class='col-md-3' style='margin-left:60px; margin-bottom:30px; margin-right:-10px;'>
                     <div class='polaroid' style='margin-top:25px; '>
                     <img src='admin_area/rent_car_image/$rent_image' alt='$rent_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
                     width='278px' />
                     <div class='caption'>
                      <h2 style='font-weight:bold;color:black; text-align:left;'>$rent_name</h2> 
                     <h4>Price per day</h4>
                     <h4>$rent_price/-</h4><br />
                     <a href='explore_rent.php?rent_id=$rent_id' type='button' class='btn btn-dark' role='button' >Details</a>
                     </div>
                     </div>
                     </div>
                     ";
					
						
				 }
				}
}


function getcompanyrent()
{               
	            global $db;
                if(isset($_GET['company']))
	            {
                $comp_id=$_GET['company']; 
                $get_comp_rent="select * from car where comp_id='$comp_id'";
				$run_comp_rent=mysqli_query($db,$get_comp_car);
				$count=mysqli_num_rows($run_comp_car);
				if($count==0)
				{
					echo "<h2 style='text-align:center; margin-top:50px; color:#862d86; font-weight:bold; font-family:Verdana serif;'>No Vehicle found this category!</h2>";
				}
				 while($row_comp_rent=mysqli_fetch_array($run_comp_rent))
				 {
					 $rent_id=$row_comp_rent['rent_id'];
					$rent_name=$row_comp_rent['r_name'];
			        $rent_cat=$row_comp_rent['cat_id'];
					$rent_comp=$row_comp_rent['comp_id'];
					$rent_desc=$row_comp_rent['r_desc'];
					$rent_price=$row_comp_rent['r_price'];
					$rent_image=$row_comp_rent['r_image'];
					 
					echo "
                     <div class='col-md-3' style='margin-left:60px; margin-bottom:30px; margin-right:-10px;'>
                     <div class='polaroid' style='margin-top:25px; '>
                     <img src='admin_area/rent_car_image/$rent_image' alt='$rent_name' class='img-responsive' style='backgroud-size:cover; height:208px; 
                     width='278px' />
                     <div class='caption'>
                      <h2 style='font-weight:bold;color:black; text-align:left;'>$rent_name</h2> 
                     <h4>Price per day</h4>
                     <h4>$rent_price/-</h4><br />
                     <a href='explore_rent.php?rent_id=$rent_id' type='button' class='btn btn-dark' role='button' >Details</a>
                     </div>
                     </div>
                     </div>
                     ";
						
				 }
				}
			    
}

?>