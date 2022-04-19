<?php
session_start();
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$name=$_POST['name'];
$pss=$_POST['pass'];
$pss1=$_POST['pass1'];
$email=$_POST['email'];
$sex=$_POST['sex'];
$birthdate=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
$name=stripslashes($name);
$pss=stripslashes($pss);
$pss1=stripslashes($pss1);
$name=mysqli_real_escape_string($con,$name);
$pass=mysqli_real_escape_string($con,$pss);
$pss1=mysqli_real_escape_string($con,$pss1);
$f=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
if(!$f){echo "not email";}
   else if($pss!=$pss1){header("location:index.php");}
       else {
$sql="INSERT INTO accounts (username,email,password,sex,birth_date,photo_profil) VALUES ('$name','$email','$pss','$sex','$birthdate','img/user.png')";
$query=mysqli_query($con,$sql)or die(mysqli_error($con));
$sql1="UPDATE accounts SET online = '1' WHERE email = '$email'";
$query=mysqli_query($con,$sql1);
$sql2="SELECT id FROM accounts WHERE email='$email' AND password='$pss'";
$query=mysqli_query($con,$sql2)or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)) {
                    	
                $id=$row['id'];
                  }
$_SESSION['email']=$email;
$_SESSION['id']=$id;
mysqli_close($con);
header("location:home.php");}
?>
