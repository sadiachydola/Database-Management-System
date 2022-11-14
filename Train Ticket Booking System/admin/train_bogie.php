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
<h2 align='center'>Train Bogie</h2>
  <div class="container">
  <form action="train_bogie.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-25">
      <label for="tid">Train ID</label>
    </div>
    <div class="col-75">
		<select name="tid">
      <?php
 include("../connection.php");
 $sql="select train_id from train_details";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['train_id'];
        echo "<option value='$id'>$id</option>";
    }
?>
</select>
    </div>
  </div>
  
    <div class="row">
    <div class="col-25">
      <label for="bogie">Bogie Name</label>
    </div>
    <div class="col-75">
      <select id="bogie" name="bogie">
	    <option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
      </select>
    </div>
  </div>
  
    <div class="row">
    <div class="col-25">
      <label for="type">Seat Type</label>
    </div>
    <div class="col-75">
      <select id="type" name="type">
	    <option value="shovon">Shovon</option>
		<option value="first seat ac">First Class AC</option>
		<option value="second seat non-ac">Second Class Non-AC</option>
		<option value="cabin">Cabin</option>Cabin
      </select>
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="price">Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="price" name="price" placeholder="Price..">
    </div>
  </div>
  
      <div class="row">
    <div class="col-25">
      <label for="sp">Number of Seat</label>
    </div>
    <div class="col-75">
      <input type="text" id="sp" name="sp" placeholder="Number of Seat..">
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
	$bogie_name=$_POST['bogie'];
	$seat_type=$_POST['type'];
	$price=$_POST['price'];
	$no_of_seat=$_POST['sp'];
	 
	
	
	$query="insert into train_bogie values('$train_id','$bogie_name','$seat_type','$price','$no_of_seat')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		$_SESSION['price']= $price;

		}
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>