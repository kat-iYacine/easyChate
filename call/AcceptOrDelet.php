<?php
 session_start();
 $id=$_SESSION['id'];
 $idf= $_POST['idf'];
 $ichose=$_POST['chose'];
 
 $con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
 if($ichose=="yes"){
 mysqli_query($con,"UPDATE frends SET statu = '1' WHERE id_emtr = '$idf' and id_res='$id'")or die(mysqli_error($con));
 }
 if($ichose=="no"){
 	mysqli_query($con,"DELETE FROM frends WHERE id_emtr = '$idf' and id_res='$id'")or die(mysqli_error($con));
 }
 header("location:../home.php");
?>