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
<h2 align='center'>Change Train Name</h2>
  <div class="container">
  <form action="update.php" method="post">
    <div class="row">
    <div class="col-25">
      <label for="tid">Old Name<label>
    </div>
    <div class="col-75">
      <input type="text" id="tid" name="oid" placeholder="Your old name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="tid">New Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="tid" name="nid" placeholder="Your new Name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="tid">Confirm Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="tid" name="cid" placeholder="Retype Your Name..">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Change Name" name="submit">
  </div>
  </form>
</div>

<?php
if(isset($_POST['submit']))
{
	include("../connection.php");
    $id=$_SESSION['train_id'];
    $oid=$_POST['oid'];
    $nid=$_POST['nid'];
	$cid=$_POST['cid'];
	if($nid==$cid)
	{
	$sql="select train_name from train_details where train_name='$oid' and train_id='$id'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>=0)
    {
       $sql1="update train_details set train_name='$nid' where train_id_id='$id'"; 
       if(mysqli_query($con,$sql1))
       {
         echo "Name Changed Successfully!";
       }  
    }
	else
	{
		echo "Old Name does not match";
	}
	}
    else
    {
        echo "New Name does not match with Confirm Name ";
    }
}

?>
</div>
<div class="footer">
  <h2>End</h2>
</div>

</body>
</html>