<?php
session_start();
 $id=$_SESSION['id'];
 $idfnd=$_GET['idfnd'];
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
     
 $query=mysqli_query($con,	"SELECT msg,from_id,to_id FROM masseg where (from_id='$idfnd' and to_id='$id') or (from_id='$id' and to_id='$idfnd')");
                            echo '<div id="content">';
                        while ($row=mysqli_fetch_array($query)) {
                        	 
                        	if($row['to_id']==$idfnd){ echo'<br><div id="msg_from_me">'.$row['msg'].'</div></br>';}
                            
                             	else echo'<br><div id="msg_for_me"><span style="color:black;">'.$row['msg'].'</span></div></br>'; }
                             	                                                                    
                             	                          echo'</div>';  
            
                             	                                                                 ?>
