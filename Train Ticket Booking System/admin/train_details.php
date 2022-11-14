<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h1>Admin Home Page</h1>
</div>

<div class="topnav">
  <div class="topnav">
  <a href="home.php">Home</a>
  <a href="train_details.php">Train details</a>
  <a href="update.php">Update</a>
  <a href="schedule.php">Schedule</a>
  <a href="train_bogie.php">Train Bogie</a>
  <a href="bookinginfo.php">Booking Information</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>

<div class="row">
<h2 align='center'> Add New Train details</h2>
  <div class="container">
  <form action="train_details.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-25">
      <label for="tid">Train ID</label>
    </div>
    <div class="col-75">
      <input type="text" id="tid" name="tid" placeholder="Train id..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="name">Train Name</label>
    </div>
    <div class="col-75">
      <select id="name" name="name">
	    <option value="sonar bangla express">Sonar Bangla Express</option>
        <option value="mohanagar provati">Mohanagar Provati</option>
		<option value="karnaphuli express">Karnaphuli Express</option>
		<option value="subarna express">Subarna Express</option>
		<option value="chittagong mail">Chittagong Mail</option>
		<option value="turna express">Turna Express</option>
		<option value="dhaka mail">Dhaka Mail</option>
      </select>
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="ts">Total Seat</label>
    </div>
    <div class="col-75">
      <input type="text" id="ts" name="ts" placeholder="Total Seat..">
    </div>
  </div>

  <div class="row">
    <input type="submit" value="Submit" name="submit">
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
include("../connection.php");
if(isset($_POST['submit']))
{
	$train_id=$_POST['tid'];
	$train_name=$_POST['name'];
	$total_seat=$_POST['ts'];
	 	
	$query="insert into train_details values('$train_id','$train_name','$total_seat')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		$_SESSION['tid']= $train_id;
		}
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>