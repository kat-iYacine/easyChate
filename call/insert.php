<?php
session_start();
 $id=$_SESSION['id'];
 $idfnd=$_GET['idfnd'];
 $msg=$_GET['msg'];
 $time="20".date("y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
 $con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
     
 $query=mysqli_query($con," INSERT INTO masseg (from_id,to_id,msg,date_time) VALUES ('$id','$idfnd','$msg','$time')")or die(mysqli_error($con));
 
?>