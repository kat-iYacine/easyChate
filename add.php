<?php
session_start();
	$id = $_SESSION['id'];
	if(isset($_POST['add']))
	{
		$idf = $_POST['add_id'];
		$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
		$sql = "INSERT INTO frends (id_emtr,id_res,statu) VALUES ('$id','$idf','0')";

		if (mysqli_query($con, $sql)) {
		    header("location:home.php");
		} 
		else 
		{
			echo "error !!";
		}

		mysqli_close($con);		
	}

	if (isset($_POST['IDtoDelete'])) {
	
		$IDtoDelete = $_POST['IDtoDelete'];
		echo $IDtoDelete;
		$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
		$qq = "DELETE FROM frends WHERE id_emtr = '$id' OR id_res = '$id'";

		if (mysqli_query($con, $qq)) {
		    $qqq = "DELETE FROM accounts WHERE id = '$id'";
		    if (mysqli_query($con, $qqq)) {
		    	echo'Success';
		    	session_destroy();
		    }
		    else
		    {
		    	echo mysqli_error($con);
		    }
		    
		} 
		else 
		{
			echo mysqli_error($con);
		}

		mysqli_close($con);			
	}

	if (isset($_POST['reportID'])) {
		$reportID = $_POST['reportID'];
		$date="20".date("y")."-".date("m")."-".date("d");

		$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
		$query = "DELETE FROM frends WHERE id_emtr = '$reportID' OR id_res = '$reportID'";

		if (mysqli_query($con,$query)) 
		{
			echo "string";
			$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
			$query1 = "INSERT INTO Reports (from_who,to_who,report_date) VALUES ('$id','$reportID','$date') ";

			if (mysqli_query($con,$query1)) 
			{
				header("location:profil_settings.php");
			}		
		}
	}
?>