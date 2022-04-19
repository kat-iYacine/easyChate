<?php
session_start();
$id=$_SESSION['id'];
$x=$_GET['term'];
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$sql="SELECT id,photo_profil,username FROM accounts WHERE username LIKE '".$x."%'";
 $query=mysqli_query($con,$sql);
 
   while ($row=mysqli_fetch_array($query)) {
       echo '<div id="'.$row['id'].'"><img src="'.$row['photo_profil'].'">'.$row['username'];
   }
?>