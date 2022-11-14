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
<h2 align='center'> Booking </h2>
  <div class="container">
  <form action="booking.php" method="post" enctype="multipart/form-data">

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
      <label for="sp">Number of Ticket</label>
    </div>
    <div class="col-75">
      <input type="text" id="sp" name="sp" placeholder="Number of Ticket..">
    </div>
  </div>
  
      <div class="row">
    <div class="col-25">
      <label for="date">Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="date" name="date" placeholder="Date..">
    </div>
  </div>
  
        <div class="row">
    <div class="col-25">
      <label for="time">Time</label>
    </div>
    <div class="col-75">
      <input type="text" id="time" name="time" placeholder="Time..">
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
	$user_id=$_SESSION['user_id'];
	$seat_type=$_POST['type'];
	$bogie_name=$_POST['bogie'];
	$train_id=$_POST['tid'];
	$no_of_ticket=$_POST['sp'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	//ticket id generation
	$num=rand(10,100);
	$ticket_id="ticket-".$num;
	
	$query="insert into booking values('$ticket_id','$user_id','$seat_type','$bogie_name','$train_id','$no_of_ticket' ,'$date','$time')";
	if(mysqli_query($con,$query))
	{
		echo "Successfully inserted!";
		$_SESSION['ticketid']= $ticket_id;
		header("Location:ticket.php");
		}
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>