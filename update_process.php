<?php
	session_start();
	$id = $_SESSION['id'];

	
	if (isset($_POST['action'])) 
	{
		if($_POST['action'] == 'Upload')
		{
			//Updating profile image

			if(isset($_FILES['photo_profil']) && $_FILES['photo_profil']['error'] == 0)//test if there was no error while uploading the image
			{
				if($_FILES['photo_profil']['size'] <= 2000000)// test if the size of the image doesn't exceed 2Mo
				{
					$fileinfo = pathinfo($_FILES['photo_profil']['name']);
					$extension_upload = $fileinfo['extension'];
					$authorized_extensions = array('png','jpg','jpeg');
					if(in_array($extension_upload, $authorized_extensions))
					{
						move_uploaded_file($_FILES['photo_profil']['tmp_name'], 'Uploads/'.basename($_FILES['photo_profil']['name']));
						$photo_path = 'Uploads/'.basename($_FILES['photo_profil']['name']);
						$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
						$query = "UPDATE accounts SET photo_profil='$photo_path' WHERE id='$id'";
						if(mysqli_query($con, $query))
						{
							echo 'Profile photo saved to '.$photo_path;
						}
						else
						{
							echo "Error updating record: " . mysqli_error($con);
						}
						
					}
				}
				
			}	
		}
	

	if($_POST['action'] == 'send')
	{
		$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
		$name = $_POST['name'];
		$password = $_POST['password'];
		$sex = $_POST['sex'];
		$new_email = $_POST['email'];
		$birthdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$id=$_SESSION['id'];
		$query="UPDATE accounts SET username ='$name',password ='$password',sex='$sex',email='$new_email',birth_date='$birthdate' WHERE id='$id'";
		if (mysqli_query($con, $query)) 
		{
    		echo "Updates saved successfully";
		}
 		else 
 		{
    		echo "Error updating record: " . mysqli_error($con);
   		}
	}
}

	if (isset($_GET['name_button'])) {
		if ($_GET['name_button'] == 'delete') {
			
			$name_button = $_GET['name_button'];
			$idf = $_GET['idf'];
			$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));

			$sql = "DELETE FROM frends WHERE id_emtr='$idf' OR id_res ='$idf'";

			if (mysqli_query($con, $sql)) {
			    echo "Record deleted successfully";
			} 
			else 
			{
			    echo "Error deleting record: " . mysqli_error($con);
			}

			mysqli_close($con);
		}
	}	



	if(isset($_POST['add']))
	{
		echo "string";
		$idf = $_POST['add_id'];
		$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
		$sql = "INSERT INTO frends (id_emtr,id_res,statu) VALUES ('$id','$idf','0')";

		if (mysqli_query($con, $sql)) {
		    echo "Friend request sent";
		} 
		else 
		{
			echo "error !!";
		}

		mysqli_close($con);		
	}
	
			if(isset($_POST['toID']) && isset($_POST['msg_offline']))
			{
				$idf = $_POST['toID'];
		
				$msg_offline = $_POST['msg_offline'];
				$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
				$time="20".date("y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
				$sql = "INSERT INTO masseg (from_id,to_id,msg,date_time) VALUES ('$id','$idf','$msg_offline','$time')";

				if (mysqli_query($con, $sql)) {
				    echo "message sent";
				} 
				else 
				{
					echo "There was a problem while sending your message!! ";
				    mysqli_error($con);
				}
			}
			header("location:profil_settings.php");
?>				
				

	