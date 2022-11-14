<?php
   session_start();
   if($_SESSION['user_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['user_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h1>User Home Page</h1>
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  <a href="update.php">Update</a>
  <a href="train.php">All Train Details</a>
  <a href="booking.php">Booking</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Online Booking for Train Ticket</h2>
      <img src="train5.jpg" width="800" height="400">
      <p>Checkout available seats,fare information on real time basis.</p>
      <p>Welcom to online train ticket.Good luck for your travel.</p>
    </div>
    <div class="card">
      <h2>Travel for enjoy</h2>
      <img src="train6.jpg" width="800" height="400">
      <p>Get Train Tickets from the comfort of your home.</p>
      <p>Book train tickets from anywhere the robust ticketing platform exclusively built to provide the passengers with pleasant ticketing exprience.</p>
    </div>
  </div>
 <div class="rightcolumn">
 <div class="card">
    <h2>About Me</h2>
<?php
 include("../connection.php");
 $userid=$_SESSION['user_id'];
 $sql="select name,mobile_no,email,image from user where user_id='$userid'";
 $r=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($r);
 $name=$row['name'];
 $mobile=$row['mobile_no'];
 $email=$row['email'];
 $image=$row['image'];
 echo "<h3>Hello I am $name.</h3>";
 echo "<p><b>Mobile No.:</b> $mobile</br><b>Email:</b> $email</br></p>";
 echo "<div class='fakeimg' style='height:200px;'><img src='../uploadedimage/$image' height='200px' width='350px'></div>";
?>  
</div>
<div class="card">
      <h3>Pay securely</h3>
 <div><img src="bkash.jpg" width="300" height="200">
	  <img src="dbbl.jpg" width="300" height="200">
	  <img src="visa.jpg" width="300" height="200">
</div>
</div>
</div>
</div>

<div class="footer">
<h2>End</h2>
</div>
</body>
</html>