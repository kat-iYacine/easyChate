<?php
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$id1=$_GET['id1'];
$id2=$_GET['id2'];
$sql=mysqli_query($con,"SELECT * FROM masseg WHERE (from_id='$id1' and to_id='$id2')  or (from_id='$id2' and to_id='$id1')ORDER BY date_time DESC ");


              while ($row=mysqli_fetch_array($sql)) {

                echo '<br>'.$row['from_id']."-";
                  echo $row['to_id']."-";
                    echo $row['msg']."-";
                      echo $row['date_time'].'</br>';
                        }
?>