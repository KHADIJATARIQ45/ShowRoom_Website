<?php
include("include/db.php");
include("function/function.php");
session_start();
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/login1.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                <span class="right">
                    
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
               
            </header>
            <section>               
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" enctype="multipart/form-data" action="account.php"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Enter Email </label>
                                    <input id="username" name="u_email" required="required" type="text" placeholder="Enter Email"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Enter Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Enter Password" /> 
                                </p>
                            
                                <p class="login button"> 
                                    <input type="submit" name="login" value="Login" /> 
                                </p>
                                <p class="change_link">
                                    Not a member yet ?
                                    <a href="#toregister" class="to_register">Sign Up</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form method="post" enctype="multipart/form-data" action="account.php"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Username:*</label>
                                    <input id="usernamesignup" name="c_name" required="required" type="text" placeholder="Enter Username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail">Email:*</label>
                                    <input id="emailsignup" name="c_email" required="required" type="email" placeholder="Enter Email"/> 
                                </p>
                                <p> 
                                    <label for="pass" class="youpasswd" >Password:*</label>
                                    <input id="pass" name="c_pass" required="required" type="password" placeholder="Enter Password"/>
                                </p>
                                <p> 
                                    <label for="cmob" class="youpasswd" >Mob No.:*
                                     </label>
                                    <input id="cpmob" name="c_mob" required="required" type="tel" pattern="^\d{4}-\d{7}$" maxlength="12" placeholder="Enter Mobile No.(e.g xxxx-xxxxxxx)"/>
                                </p>

                            
                                <p class="signin button"> 
                                    <input type="submit"  name="signup" value="Sign up"/> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
<?php

if(isset($_POST['signup']))
{
  $c_name=$_POST['c_name'];
  echo $c_name;
  $c_email=$_POST['c_email'];
  echo $c_email;
  $c_pass=$_POST['c_pass'];
  echo $c_pass;
  $c_mob=$_POST['c_mob'];
  echo $c_mob;
  
  $insert_customer="insert into user (u_name,u_email,u_pass,u_mob) 
  values ('$c_name','$c_email','$c_pass','$c_mob')";

  $run_customer=mysqli_query($con,$insert_customer);
 {
   $_SESSION['c_email']=$c_email;
    echo "<script>alert('Account Created Sucessfully!')</script>";
   echo "<script>window.open('account.php#tologin','_self')</script>";
 }
}

?>

<?php
if(isset($_POST['login']))
{
$customer_email=$_POST['u_email'];
$customer_pass=$_POST['password'];
$sel_customer="select * from user where u_email='$customer_email' AND u_pass='$customer_pass'";
$run_customer=mysqli_query($con,$sel_customer);
$check_customer=mysqli_num_rows($run_customer);

if($check_customer==0)
{
echo "<script>alert('Email or Password incorrect!! Try again!');</script>";
exit();
}

else
{
$_SESSION['u_email']=$customer_email;
echo "<script>alert('Yoou have succesfully logged in');</script>";
echo "<script>window.open('index.php','_self');</script>";
}
}
?>