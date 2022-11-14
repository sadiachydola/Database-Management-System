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
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>

<div class="header">
  <h1>User Home Page</h1>
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  <a href="train.php">All Train Details</a>
  <a href="booking.php">Booking</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
<h2 align='left'> Train details </h2>
<?php
include("../connection.php");
	$query="select * from train_details";
	$r=mysqli_query($con,$query);
	echo "<table id='users'>";
 echo "<tr>
            <th>Train ID</th>
		    <th>Train Name</th>
			<th>Total Seat</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
	    $id=$row['train_id'];
	    $name=$row['train_name'];
	    $ts=$row['total_seat'];
    echo "<tr>
    <td>$id</td><td>$name</td><td>$ts</td>
    </tr>";
    }
	echo "</table>";
?>
</div>
<div class="row">
<h2 align='left'> Schedule </h2>
<?php
include("../connection.php");
 
    $sql="select * from schedule";
	$r=mysqli_query($con,$sql);
	 echo "<table id='users'>";
	 echo "<tr>
	            <th>Train ID</th>
				<th>Departure Time</th>
				<th>Arrival Time</th>
				<th>Destination</th>
				<th> OFF Day</th>
			</tr>";
    while($row=mysqli_fetch_array($r))
    {
	    $id=$row['train_id'];
	    $at=$row['departure_time'];
	    $dt=$row['arrival_time'];
	    $ds=$row['destination'];
	    $day=$row['off_day'];
		
    echo "<tr>
    <td>$id</td><td>$at</td><td>$dt</td><td>$ds</td><td>$day</td>
    </tr>";
    }
	echo "</table>";

?>
</div>
<div class="row">
<h2 align='left'> Train Bogie </h2>
<?php
include("../connection.php");
 
    $sql="select * from train_bogie";
	$r=mysqli_query($con,$sql);
	 echo "<table id='users'>";
	 echo "<tr>
	            <th>Train ID</th>
				<th>Bogie Name</th>
				<th>Seat Type</th>
				<th>Price</th>
				<th>Number of Seat</th>
			</tr>";
    while($row=mysqli_fetch_array($r))
    {
	    $id=$row['train_id'];
	    $bogie=$row['bogie_name'];
	    $type=$row['seat_type'];
	    $price=$row['price'];
	    $sp=$row['no_of_seat'];
    echo "<tr>
    <td>$id</td><td>$bogie</td><td>$type</td><td>$price</td><td>$sp</td>
    </tr>";
    }
	echo "</table>";
	echo "<br><br>";
?>
</div>
   <div class="footer">
       <h2>End</h2>
</div>
</body>
</html>