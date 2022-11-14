<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h1>User Registration Form</h1>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="signup.php">SignUp</a>
  <a href="login.php" style="float:right">Login</a>
</div>
<div class="row">
<h1 align="center"> Sign Up</h1>
<div class="container">
  <form action="signup.php" method="post" enctype="multipart/form-data">
   
<div class="row">
    <div class="col-0">
      <label for="uid">User ID</label>
    </div>
    <div class="col-100">
      <input type="text" id="uid" name="uid" placeholder="User id..">
    </div>
  </div>   
  <div class="row">
    <div class="col-0">
      <label for="name">Name</label>
    </div>
    <div class="col-100">
      <input type="text" id="name" name="name" placeholder=" Your Name..">
    </div>
  </div>
<div class="row">
    <div class="col-0">
	<label for="gender">Gender</label>
	  </div>
    <div class="col-100">
      <input type="radio" name="gender" value="male" checked="checked"> Male<br>
	 
	  <input type="radio" name="gender" value="female" > Female<br>
	  </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="dob">Date of Birth</label>
    </div>
    <div class="col-100">
      <input type="date" id="dob" name="dob" >
	  </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="mobile">Mobile No.</label>
    </div>
    <div class="col-100">
      <input type="text" id="mobile" name="mobile" placeholder="Your mobile no..">
	  </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="email">Email</label>
    </div>
    <div class="col-100">
      <input type="text" id="email" name="email" placeholder="Your email..">
    </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="country">City</label>
    </div>
    <div class="col-100">
      <select id="country" name="loc">
        <option value="dhaka">Dhaka</option>
        <option value="chittagong">Chittagong</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="num">Pin code</label>
    </div>
    <div class="col-100">
      <input type="text" id="num" name="num" placeholder="Your pin code..">
    </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="pass">Password</label>
    </div>
    <div class="col-100">
      <input type="password" id="pass" name="pass" placeholder="Your password..">
    </div>
  </div>
  <div class="row">
    <div class="col-0">
      <label for="image">Image</label>
    </div>
    <div class="col-100">
      <input type="file" id="image" name="pic">
	  </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit" name="submit">
  </div>
  </form>
</div>
</div>

<div class="footer">
  <h4>End</h4>
</div>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$user_id=$_POST['uid'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$city=$_POST['loc'];
	$mobile_no=$_POST['mobile'];
	$date_of_birth=$_POST['dob'];
	$gender=$_POST['gender'];
	$pin_code=$_POST['num'];
	$password=$_POST['pass'];
	//user id generation
	//$num=rand(1,100);
	//$user_id="u-".$num;
	
	//image upload code
	$ext= explode(".",$_FILES['pic']['name']);
    $u=count($ext);
    $ext=$ext[$u-1];
    $date=date("D:M:Y");
    $time=date("h:i:s");
    $image_name=md5($date.$time.$user_id);
    $image=$image_name.".".$ext;
	
	$query="insert into user values('$user_id','$name','$gender','$date_of_birth','$mobile_no','$email','$city','$pin_code','$password','$image')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		if($image !=null){
	                move_uploaded_file($_FILES['pic']['tmp_name'],"uploadedimage/$image");
                    }
	}
		else
	{
		echo mysqli_error($con);
	}
}
?>