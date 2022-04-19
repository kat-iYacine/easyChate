<?php
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$idf=$_GET['idf'];
$ope=$_GET['operation'];
$n;
if ($ope=="del") {
	$sql=mysqli_query($con,"DELETE FROM frends WHERE id_emtr = '$idf' OR id_res = '$idf'");
	$sql2 = mysqli_query($con,"DELETE FROM accounts WHERE id = '$idf'");
	$sql3=mysqli_query($con,"DELETE FROM Reports WHERE from_who = '$idf' OR to_who = '$idf'");
}
if ($ope=="block") {
	$date="20".date("y")."-".date("m")."-".date("d");
	echo $date;
	$sql=mysqli_query($con,"UPDATE accounts SET is_blocked=1,last_time='$date' WHERE id='$idf'");
	$sql2=mysqli_query($con,"DELETE FROM Reports WHERE from_who = '$idf' OR to_who = '$idf'");
	$sql3=mysqli_query($con,"UPDATE accounts SET warning='0' WHERE id='$idf'");
}
if ($ope=="aver") {
	$sql=mysqli_query($con,"SELECT warning FROM accounts WHERE id='$idf'");
	while ($row=mysqli_fetch_array($sql)) { 
              $n=$row['warning'];
                   }
                   $n=$n+1;
    $sql=mysqli_query($con,"UPDATE accounts SET warning='$n' WHERE id='$idf'");
    $sql2=mysqli_query($con,"DELETE FROM Reports WHERE from_who = '$idf' OR to_who = '$idf'");
}

if($ope=="Unlock")
{
	$date='0000-00-00';
	$sql=mysqli_query($con,"UPDATE accounts SET is_blocked=0,last_time='$date' WHERE id='$idf'");
	header("location:XDLHM1020.php");
}
?>