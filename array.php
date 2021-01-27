<?php
require_once('connection.php');

$select="SELECT * FROM `user` WHERE `userid`='1'";
$re=mysqli_query($conn,$select);
$row=mysqli_fetch_array($re);


$array=explode(' ',$row['hobbies']);


echo "<pre>";
print_r($array);
echo "</pre>";
?>