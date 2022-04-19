<?php
session_start();
$id;
$email=$_POST['email'];
$pss=$_POST['pass'];
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$sql="SELECT id,is_blocked FROM accounts WHERE email='$email' AND password='$pss'";
$sql1="UPDATE accounts SET online = '1' WHERE email = '$email'";
$query=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($query)) {
                    	
                $id=$row['id'];
                $blck = $row['is_blocked'];
                  }
$num=mysqli_num_rows($query);   
if($num==1){
$query1=mysqli_query($con,$sql1);
$_SESSION['email']=$email;
$_SESSION['id']=$id;
if($blck == 0)
{
	header("location:home.php");
}
else
{
	header("location:blocked.html");
}


}
else{header("location:worng.php");}
?>
