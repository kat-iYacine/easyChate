
<?php
              session_start(); 
                 $id=$_SESSION['id'];
      $con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
     $query=mysqli_query($con,"SELECT id,username,photo_profil FROM accounts WHERE id 
                               in (SELECT id_res FROM frends WHERE (id_emtr='$id' or id_res='$id') and statu='1' 
                               UNION SELECT id_emtr FROM frends WHERE (id_emtr='$id' or 
                               id_res='$id') and statu='1') and online ='1'");
                                  echo'<div>';
                        while ($row=mysqli_fetch_array($query)) {
                             if ($row['id']!=$id)  {
                      echo '<div style="background:white;" id="'.$row['id'].'">&nbsp;&nbsp;<img style="width:32px;height:32px;" src='.$row['photo_profil'].'>'.'&nbsp;&nbsp'.$row['username'].'</div>';  
                    }         
              }
echo'</div>'; 
                   ?> 
