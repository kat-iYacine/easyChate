
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();
$link = mysqli_connect("localhost","root","","users");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
$sql = "SELECT * FROM accounts WHERE username LIKE '" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

                echo '<div class="add"><img style="width:32px;height:32px;" src="'.$row['photo_profil'].'"><p>' . $row['username'] . '</p><form action="add.php" method="POST"><button type="submit" name="add" class="btn">Add</button><input type="hidden" name="add_id" value ="'.$row['id'].'" ></form></div>';
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo '<p id="nofound">No user found</p>';
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// close connection
mysqli_close($link);
?>