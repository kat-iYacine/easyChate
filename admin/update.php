<?php
session_start();
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$opsw=$_GET['opsw'];
$npsw=$_GET['npsw'];
$sql=mysqli_query($con,"SELECT password FROM admin WHERE password='$opsw'");
$num=mysqli_num_rows($sql);
if ($num==1) {
$sql=mysqli_query($con,"UPDATE admin SET admin_password='$npsw'");
echo'<script> alert("DONE");</script>';
} 
else{
	echo'<script> alert("PASSWORD IS WORNG");</script>';
}

$username = $_POST['admin_name'];
$pass = $_POST['admin_pass'];
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$sql2=mysqli_query($con,"SELECT id FROM admin WHERE admin_username = '$username' AND admin_password = '$pass'");
while ($row=mysqli_fetch_array($sql2)) {
	$id=$row['id'];
}
$num=mysqli_num_rows($sql2);   
if ($num == 1) {
	$_SESSION['admin_id'] = $id;
	header("location:..\adminPage.php");
}

else
{
	header("location:admin_login.html");
}
?>
