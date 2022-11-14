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
</head>
<body>

<div class="header">
  <h1>Admin Home Page</h1>
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
<h2 align='center'>Change Your Name</h2>
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
    <div class="col-25">
      <label for="num">Old Pin Code<label>
    </div>
    <div class="col-75">
      <input type="text" id="num" name="onum" placeholder="Your old pin code..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="num">New Pin Code</label>
    </div>
    <div class="col-75">
      <input type="text" id="num" name="nnum" placeholder="Your new pin code..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="num">Confirm Pin Code</label>
    </div>
    <div class="col-75">
      <input type="text" id="num" name="cnum" placeholder="Retype pin code..">
    </div>
  </div>
  
  <div class="row">
    <input type="submit" value="Change" name="submit">
  </div>
  </form>
</div>

<?php
if(isset($_POST['submit']))
{
	include("../connection.php");
    $id=$_SESSION['user_id'];
    $oid=$_POST['oid'];
    $nid=$_POST['nid'];
	$cid=$_POST['cid'];
	$onum=$_POST['onum'];
	$nnum=$_POST['nnum'];
	$cnum=$_POST['cnum'];
	
	if($nid==$cid)
	{
	$sql="select name from user where name='$oid' and user_id='$id'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>=0)
    {
       $sql1="update user set name='$nid' where user_id='$id'";  
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
	if($nnum==$cnum)
	{
	$sql="select pin_code from user where pin_code='$onum' and user_id='$id'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>=0)
    {
       $sql1="update user set pin_code='$nnum' where user_id='$id'";  
       if(mysqli_query($con,$sql1))
       {
         echo "Pin code Changed Successfully!";
       }  
    }
	else
	{
		echo "Old pin code does not match";
	}
	}
    else
    {
        echo "New pin code does not match with Confirm Pin code ";
    }
}

?>
</div>
<div class="footer">
  <h2>End</h2>
</div>

</body>
</html>