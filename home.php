<?php

require_once('connection.php');
session_start();
if ($_SESSION['userid']) {
	



$uid=$_SESSION['userid'];


$select="SELECT * FROM `user` WHERE `userid`='".$uid."'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_array($result);

echo 'Welcome '.$row['firstname'];

?>

<a href="logout.php">Log Out</a>

<?php
}
else{
	header('location:login.php');
}
?>