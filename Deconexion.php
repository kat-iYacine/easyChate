<?php
session_start();
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$id=$_SESSION['id'];
$query=mysqli_query($con,"UPDATE accounts SET online = '0' WHERE id = '$id'");
session_destroy();
header("location:index.php");
?>