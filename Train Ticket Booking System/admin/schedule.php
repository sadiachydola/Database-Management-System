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
  <a href="update.php">Update</a>
  <a href="schedule.php">Schedule</a>
  <a href="train_bogie.php">Train Bogie</a>
  <a href="bookinginfo.php">Booking Information</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>

<div class="row">
<div class="container">
<div class="row">
<?php
include("../connection.php");
 
    $sql="select * from train_details";
	$r=mysqli_query($con,$sql);
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

  <form action="schedule.php" method="post">
  <div class="row">
  <h2 align='center'>Schedule for New Train Details</h2>
    <div class="col-25">
      <label for="name">Train ID</label>
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
  <label for="time"> Departure Time</label>
  </div>
  <div class="col-75">
  <input type="text" id="atime" name="atime" placeholder="Your arrival time..">
  </div>
  </div>
  
  <div class="row">
  <div class="col-25">
  <label for="time"> Arrival Time</label>
  </div>
  <div class="col-75">
  <input type="text" id="dtime" name="dtime" placeholder="Your departure time..">
  </div>
  </div>
  
  <div class="row">
  <div class="col-25">
  <label for="ds">Destination</label>
  </div>
  <div class="col-75">
  <select id="ds" name="ds">    
  <option value="chattogram to dhaka">Chattogram to Dhaka</option>
  <option value="dhaka to chattogram">Dhaka to Chattogram</option>
  </select>
  </div>
  </div>
  
  <div class="row">
  <div class="col-25">
  <label for="day">OFF Day</label>
  </div>
  <div class="col-75">
  <select id="day" name="day">
  <option value="saturday">Saturday</option>
  <option value="sunday">Sunday</option>
  <option value="monday">Monday</option>
  <option value="tuesday">Tuesday</option>
  <option value="wednesday">Wednesday</option>
  <option value="thursday">Thursday</option>
  <option value="no">No</option>
  </select>
  </div>
  </div>

  <div class="row">
  <input type="submit" value="ADD" name="submit">
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
	$tid=$_POST['tid'];
	$atime=$_POST['atime'];
	$dtime=$_POST['dtime'];
	$ds=$_POST['ds'];
	$day=$_POST['day'];
	
	$query="insert into schedule values('$tid','$atime','$dtime','$ds','$day')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		}
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>