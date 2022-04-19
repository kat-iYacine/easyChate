<?php
session_start();
 $id=$_SESSION['id'];
                $frd;
                $con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));      
                $query1=mysqli_query($con,"SELECT id,username,photo_profil FROM accounts WHERE id in(SELECT id_emtr FROM frends WHERE NOT (id_emtr='$id') AND id_res='$id' and statu='0') ");
                         if (mysqli_num_rows($query1)>0) {
                 
                         while ($row=mysqli_fetch_array($query1)){
                        
                    echo '<div id="newfrd" style=" background-color:white; display:flex;flex-direction:row;align-items:center;" ><img style="height:32px;width:32px;" src='.$row['photo_profil' ].'>&nbsp;&nbsp;'.$row['username'].'&nbsp;&nbsp;<form method="POST" action="call/AcceptOrDelet.php"><input type="hidden" name="idf" value="'. $row['id'].'"><button style="margin-left:2px;" name="chose" value="yes">accept</button></form>&nbsp;&nbsp<form method="POST" action="call/AcceptOrDelet.php"><input type="hidden" name="idf" value="'. $row['id'].'"><button value="no" id="'. $row['id'].'" name="chose">delete</button></div>';
                    
                     }
                 }
                 else echo " NO INVITATIONS FOR YOU";
       ?> 
