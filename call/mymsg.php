<?php
session_start();
 $id=$_SESSION['id'];
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
     
 $query=mysqli_query($con,"SELECT msg,username,photo_profil FROM accounts,masseg where accounts.id=masseg.from_id AND to_id='$id' ORDER BY date_time DESC LIMIT 5 ");
 ;

 						if($num=mysqli_num_rows($query)>0){
          	              while ($row=mysqli_fetch_array($query)) {
          	              	echo '<div id="frd"><img style="width:32px;height:32px;" src='.$row['photo_profil' ].'>'.'&nbsp;&nbsp'.$row['username'].':'.$row['msg'].'</div>';  

 						}
          
                        	}
                        else 
                        {
                        	echo'<div id="frd"><p>No messages</p></div>';
                        }	

                          
              



?>

