<?php
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$idf=$_GET['idf'];
$sql=mysqli_query($con,"SELECT * FROM accounts WHERE id='$idf'");
$num=mysqli_num_rows($sql);
 if ($num==1) {
  	while ($row=mysqli_fetch_array($sql)) { 
              echo '<br><h3>ID:</h3>'.$row['id'].'</br>'; 
              echo '<br><h3>Username:</h3>'.$row['username'].'</br>';
              echo '<br><h3>Email:</h3>'.$row['email'].'</br>';
              echo '<br><h3>Sex:</h3>'.$row['sex'].'</br>';
              echo '<br><h3>Password:</h3>'.$row['password'].'</br>';
              echo '<br><h3>Birth Date:</h3>'.$row['birth_date'].'</br>';
               echo '<br><h3>Warnings:</h3>'.$row['warning'].'</br>';
                echo '<br><h3>Blocked:</h3>'.$row['is_blocked'].'</br>';
                echo '<br><h3>LAST_TIME:</h3>'.$row['last_time'].'</br>';
                                  }
                                  echo '<br><h3>Friends:</h3>';
$sql1=mysqli_query($con,"SELECT id,username FROM accounts WHERE id 
                               in (SELECT id_res FROM frends WHERE (id_emtr='$idf' or id_res='$idf') and statu='1' 
                               UNION SELECT id_emtr FROM frends WHERE (id_emtr='$idf' or 
                               id_res='$idf') and statu='1')");

 while ($row=mysqli_fetch_array($sql1)) { 
       echo '<br>'.$row['id'].'&nbsp; &nbsp;'.$row['username'].'</br>';
 }

  echo '<div id="adminbtn"><br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<a href="adminPage.php"><button id="'.$idf.'" name="del">Delete</button></a>&nbsp; &nbsp;<a href="adminPage.php"><button id="'.$idf.'" name="block">Block</button></a>&nbsp; &nbsp;<a href="adminPage.php"><button id="'.$idf.'" name="aver">Warn</button></a></br><a href="adminPage.php"><button id="'.$idf.'" name="Unlock">Unlock</button></a></div>';
  } 
 else{echo "this id not exist";}
?>