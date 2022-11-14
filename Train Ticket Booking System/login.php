<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
    <link rel="stylesheet" href="signup.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<div class="header">
  <h1>Login Form</h1>
  <p>No Account? Please <a href="signup.php"> Signup</a></p> 
</div>

<div class="row">
<div class="container">
<form action="login.php" method="post">
<div class="row">
<div class="col-25">
      <label for="userid">User id</label>
</div>
<div class="col-75">
      <input type="text" id="uid" name="id" placeholder="User ID...">
</div>
</div>
<div class="row">
<div class="col-25">
      <label for="password">Password</label>
</div>
<div class="col-75">
      <input type="password" id="password" name="password" placeholder="Password">
</div>
</div>
  
<div class="row">
    <input type="submit" value="Login" name="login">
</div>
</form>
</div>
</div>

<div class="footer">
  <h2>End</h2>
</div>
</body>
</html>

<?php
include("connection.php");
if(isset($_POST['login']))
{
	$id=$_POST['id'];
	$password=$_POST['password'];
	$sql="select admin_id,password from admin where admin_id='$id' and password='$password'";
    $sql1="select user_id,password from  user where user_id='$id' and password='$password'";
            $r=mysqli_query($con,$sql);
            $r1=mysqli_query($con,$sql1);
              if(mysqli_num_rows($r)>0)
            {
                $_SESSION['admin_id']=$id;
                $_SESSION['admin_login_status']="loged in";
                header("Location: admin/home.php");
            }
            
            else if(mysqli_num_rows($r1)>=0)
            {
                $_SESSION['user_id']=$id;
                $_SESSION['user_login_status']="loged in";
                header("Location:user/home.php");
            }
            else
            {
                echo "<p style='color: blue;'>Incorrect UserId or Password</p>";
            }
	
}
?>