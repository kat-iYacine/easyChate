<?php
session_start();
$id=$_SESSION['id'];


$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$term = mysqli_real_escape_string($con, $_REQUEST['term']);
$sql = "SELECT id,username,photo_profil FROM accounts WHERE username LIKE '" . $term . "%'";



$query=mysqli_query($con,$sql);
$num=mysqli_num_rows($query);
      
        	
                if ($num>0) {
                   
           while ($row=mysqli_fetch_array($query)) {
	          $a=$row['id'];
                   if ($row['id']==$id) {

           echo '<div class="add"><img style="width:32px;height:32px;" src="'.$row['photo_profil'].'"><p>' . $row['username'] . '</p><p style="position:absolute;left:230px;">(Me)</p></div>'; 
               }   else {
                   $sql1="SELECT * FROM frends WHERE (id_emtr='$id' and id_res='$a') or(id_emtr='$a' and id_res='$id')";

                   $query1=mysqli_query($con,$sql1);

                   if (mysqli_num_rows($query1)>0) {

                       while ($row1=mysqli_fetch_array($query1)) {

         if ($row1['statu']==1)echo '<div class="add"><img style="width:32px;height:32px;" src="'.$row['photo_profil'].'"><p>' . $row['username'] . '</p><p style="position:absolute;left:230px;"></p></div>'; 
    else if ($row1['statu']==0) echo '<div class="add"><img style="width:32px;height:32px;" src="'.$row['photo_profil'].'"><p>' . $row['username'] . '</p><p style="position:absolute;left:170px;">(Pending Request)</p></div>'; 
        
                       }

                   } else echo '<div class="add"><img style="width:32px;height:32px;" src="'.$row['photo_profil'].'"><p>' . $row['username'] . '</p><form action="add.php" method="POST"><button id="opener" type="submit" name="add" class="btn">Add</button><input type="hidden" name="add_id" value ="'.$row['id'].'" ></form></div>';

               }
            }
        }else
        echo '<p id="nofound">No user found</p>';

          

?>