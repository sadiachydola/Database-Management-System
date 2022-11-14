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
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>

<div class="header">
  <h1>Admin Home Page</h1>
</div>

<div class="topnav">
<div class="topnav">
  <a href="home.php">Home</a>
  <a href="train_details.php">Train details</a>
  <a href="schedule.php">Schedule</a>
  <a href="train_bogie.php">Train Bogie</a>
  <a href="bookinginfo.php">Booking Information</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>

<div class="row">

  <div class="container">

  <form action="bookinginfo.php" method="post">
    <div class="row">
    <div class="col-25">
    </div>
    <div class="col-75">
	<label for="catg">Select a DATE</label>
	<select name="catg">
<?php
 include("../connection.php");
 $sql="select distinct date from booking";
 $r=mysqli_query($con,$sql);
 
 
    while($row=mysqli_fetch_array($r))
    {
        $date=$row['date'];
        echo "<option value='$date'>$date</option>";
    }
?>
</select>
  </div>
  </div> 
  <div class="row">
    <input type="submit" value="OK" name="ok">
  </div>
  </form>
</div>

<?php
include("../connection.php");
if(isset($_POST['ok']))
{
	$c=$_POST['catg'];
	
	$query="select * from train_details,booking where train_details.train_id = booking.train_id and booking.date='$c'";
	$r=mysqli_query($con,$query);
	echo "<table id='users'>";
 echo "<tr>
 <th>Ticket ID</th>
 <th>User ID</th>
 <th>Seat Type</th>
 <th>Train ID</th>
 <th>Number of Ticket</th>
 <th>Time</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
		$ticid=$row['ticket_id'];
        $uid=$row['user_id'];
		$type=$row['seat_type'];
		$tid=$row['train_id'];
		$np=$row['no_of_ticket'];
		$time=$row['time'];

echo "<tr>
    <td>$ticid</td><td>$uid</td><td>$type</td><td>$tid</td><td>$np</td><td>$time</td>
    </tr>";
    }
	echo "</table>";
}
?>

<div>
<div class="row">
<h2 align='left'> Booking Information </h2>
<?php
include("../connection.php");
	$query="select * from booking";
	$r=mysqli_query($con,$query);
	echo "<table id='users'>";
 echo "<tr>
            <th>Ticket ID</th>
			<th>User ID</th>
			<th>Seat Type</th>
			<th>Train ID</th>
			<th>Number of Ticket</th>
		    <th>Date</th>
			<th>Time</th>
  </tr>";
    while($row=mysqli_fetch_array($r))
    {
	    $ticid=$row['ticket_id'];
	    $uid=$row['user_id'];
		$type=$row['seat_type'];
		$id=$row['train_id'];
		$np=$row['no_of_ticket'];
        $date=$row['date'];
        $time=$row['time'];
    echo "<tr>
    <td>$ticid</td><td>$uid</td><td>$type</td><td>$id</td><td>$np</td><td>$date</td><td>$time</td>
    </tr>";
    }
	echo "</table>";
?>