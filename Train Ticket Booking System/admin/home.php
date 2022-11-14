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
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h1>Admin Home Page</h1>
</div>

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

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Online Booking for Train Ticket</h2>
      <img src="train1.jpg" width="800" height="400">
      <p>Checkout available seats,fare information on real time basis.</p>
      <p>Welcom to online train ticket.Good luck for your travel.</p>
    </div>
    <div class="card">
      <h2>Travel for enjoy</h2>
      <img src="train2.jpg" width="800" height="400">
      <p>Get Train Tickets from the comfort of your home.</p>
      <p>Book train tickets from anywhere the robust ticketing platform exclusively built to provide the passengers with pleasant ticketing exprience.</p>
    </div>
  </div>
      <div class="card">
      <h3>Collections</h3>
      <div class="fakeimg"><img src="train7.jpg" width="300" height="200"></div>
      <div class="fakeimg"><img src="train8.jpg" width="300" height="200"></div>
      <div class="fakeimg"><img src="train9.jpg" width="300" height="200"></div>
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