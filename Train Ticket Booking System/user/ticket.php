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
<div class="topnav">

  <a href="home.php">Home</a>
  <a href="ticket.php">Ticket</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>
</div>

 <div class="rightcolumn">
 <div class="card">
    <h2>My Details</h2>
<?php
 include("../connection.php");
 $userid=$_SESSION['user_id'];
 $sql="select user_id,name,mobile_no,email,image from user where user_id='$userid'";
 $r=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($r);
 $name=$row['name'];
 $uid=$row['user_id'];
 $mobile=$row['mobile_no'];
 $email=$row['email'];
 $image=$row['image'];
 
 echo "<h3>Hello I am $name.</h3>";
 echo "<p><b>User ID.:</b> $uid</br><b>Mobile No.:</b> $mobile</br><b>Email:</b> $email</br></p>";
 echo "<div class='fakeimg' style='height:200px;'><img src='../uploadedimage/$image' height='200px' width='350px'></div>";
 ?>
 
 <?php
 include("../connection.php");
 $ticketid=$_SESSION['ticketid'];
 $sql="select ticket_id,seat_type,bogie_name,train_id,no_of_ticket,date,time from booking where ticket_id='$ticketid'";
 $r=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($r);
 $ticketid=$row['ticket_id'];
 $st=$row['seat_type'];
 $bogie=$row['bogie_name'];
 $tid=$row['train_id'];
 $np=$row['no_of_ticket'];
 $date=$row['date'];
 $time=$row['time'];

 $sql = "select seat_type,price*'$np' as total_price from train_details,train_bogie where train_details.train_id= '$tid' and train_bogie.seat_type='$st'";
 $r = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($r);
 $price = $row['total_price'];
 $type = $row['seat_type'];
 

 echo "<p><b>Ticket ID.:</b> $ticketid</br><b>Seat Type.:</b> $st</br><b>Bogie Name.:</b> $bogie</br><b>Train ID.:</b> $tid</br><b>No of Ticket.:</b> $np</br><b>Date:</b> $date</br><b>Time:</b> $time</br><b> Total Price:</b> $price</br></p>";
 ?> 

