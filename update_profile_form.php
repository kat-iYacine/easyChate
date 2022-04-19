<?php 
	//session_start();
	$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
	$id=$_SESSION['id'];
	$query=mysqli_query($con,"SELECT *,YEAR(birth_date),MONTH(birth_date),DAY(birth_date) FROM accounts WHERE id='$id'");

	while ($row=mysqli_fetch_array($query)) 
	{
		$photo_profil = $row['photo_profil'];
	    $user = $row['username'];
	    $status = $row['online'];
		$email = $row['email'];
		$sex = $row['sex'];
		$dob_year = $row['YEAR(birth_date)'];
		$dob_month = $row['MONTH(birth_date)'];
		$dob_day = $row['DAY(birth_date)'];
		$password = $row['password'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user.' > Update profile';?></title>
		<style> 
		input[type=text] {
		    width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		    border: 3px solid #ccc;
		    -webkit-transition: 0.5s;
		    transition: 0.5s;
		    outline: none;
		}

		input[type=password] {
		    width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		    border: 3px solid #ccc;
		    -webkit-transition: 0.5s;
		    transition: 0.5s;
		    outline: none;
		}

		input[type=text]:focus {
		    border: 3px solid #555;
		}

		input[type=password]:focus {
		    border: 3px solid #555;
		}		
	</style>
</head>
	<body>
		<form action="update_process.php" method="POST" enctype="multipart/form-data">
		<div id="field">
		<fieldset style="background-color: rgb(245,245,245);">
			<legend>Edit profile</legend>
				<img style="width: 100px; height: 100px;" src=<?php echo '"'.$photo_profil.'"' ?>>
				<input type="file" name="photo_profil">
				<input type="submit" name="action" value="Upload">
			</form>	
			<form action="update_process.php" method="POST">
				<p><label>Username</label>
					<input type="text" name="name" value=<?php echo '"'.$user.'"';?>></p>
				<p><label>E-mail</label>
					<input type="text" name="email" value=<?php echo '"'.$email.'"';?>></p>	
				<p><label>Password</label>
					<input type="password" name="password" value=<?php echo '"'.$password.'"';?>></p>
				<p><label>Sex: </label>
					<input type="radio" name="sex" value="Male" <?php if($sex == 'Male'){echo'checked';} ?>><label>Male</label>
					<input type="radio" name="sex" value="Female" <?php if($sex == 'Female'){echo'checked';} ?>><label>Female</label></p>
				<p><label>Birth date: </label>
					<select name="day">
						<option value="0" <?php $i=0;?>>Day</option><option value="1" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?> >1</option><option value="2" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>2</option><option value="3" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>3</option><option value="4" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>4</option>
						<option value="5" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>5</option><option value="6" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>6</option><option value="7" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>7</option><option value="8" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>8</option>
						<option value="9" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>9</option><option value="10" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>10</option><option value="11" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>11</option>
						<option value="12" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>12</option><option value="13" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>13</option>
						<option value="14" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>14</option><option value="15" <?php $i++; if($dob_day == $i) echo'selected="selected"'; ?>>15</option>
						<option value="16" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>16</option>
						<option value="17" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>17</option>
						<option value="18" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>18</option><option value="19" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>19</option>
						<option value="20" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>20</option><option value="21" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>21</option>
						<option value="22" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>22</option><option value="23" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>23</option><option value="24" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>24</option>
						<option value="25" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>25</option><option value="26" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>26</option><option value="27" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>27</option>
						<option value="28" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>28</option>
						<option value="29" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>29</option><option value="30" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>30</option><option value="31" <?php $i++; if($dob_day == $i) echo'selected="selected"' ?>>31</option>
					</select>
					<select name="month">
					<option value="0">Month</option><option value="1" <?php if($dob_month == 1) echo'selected="selected"' ?>>Jan</option><option value="2" <?php if($dob_month == 2) echo'selected="selected"' ?>>Feb</option><option value="3" <?php if($dob_month == 3) echo'selected="selected"' ?>>Mar</option><option value="4" <?php if($dob_month ==4 ) echo'selected="selected"' ?>>Apr</option><option value="5" <?php if($dob_month == 5) echo'selected="selected"' ?>>May</option><option value="6" <?php if($dob_month == 6) echo'selected="selected"' ?>>Jun</option><option value="7" <?php if($dob_month == 7) echo'selected="selected"' ?>>Jul</option><option value="8" <?php if($dob_month == 8) echo'selected="selected"' ?>>Aug</option><option value="9" <?php if($dob_month == 9) echo'selected="selected"' ?>>Sep</option><option value="10" <?php if($dob_month == 10) echo'selected="selected"' ?>>Oct</option><option value="11" <?php if($dob_month == 11) echo'selected="selected"' ?>>Nov</option><option value="12" <?php if($dob_month ==12 ) echo'selected="selected"' ?>>Dec</option>
					</select>
					<select name="year">
						<option value="0">Month</option><option value="2017" <?php if($dob_year == 2017) echo'selected="selected"' ?>>2017</option><option value="2016" <?php if($dob_year == 2016) echo'selected="selected"' ?>>2016</option><option value="2015" <?php if($dob_year == 2015) echo'selected="selected"' ?>>2015</option><option value="2014" <?php if($dob_year == 2014) echo'selected="selected"' ?>>2014</option><option value="2013" <?php if($dob_year == 2013) echo'selected="selected"' ?>>2013</option><option value="2012" <?php if($dob_year == 2012) echo'selected="selected"' ?>>2012</option><option value="2011" <?php if($dob_year == 2011) echo'selected="selected"' ?>>2011</option><option value="2010" <?php if($dob_year == 2010) echo'selected="selected"' ?>>2010</option><option value="2009" <?php if($dob_year == 2009) echo'selected="selected"' ?>>2009</option><option value="2008" <?php if($dob_year == 2008) echo'selected="selected"' ?>>2008</option><option value="2007" <?php if($dob_year == 2007) echo'selected="selected"' ?>>2007</option><option value="2006" <?php if($dob_year == 2006) echo'selected="selected"' ?>>2006</option><option value="2005" <?php if($dob_year == 2005) echo'selected="selected"' ?>>2005</option><option value="2004" <?php if($dob_year == 2004) echo'selected="selected"' ?>>2004</option><option value="2003" <?php if($dob_year == 2003) echo'selected="selected"' ?>>2003</option><option value="2002" <?php if($dob_year == 2002) echo'selected="selected"' ?>>2002</option><option value="2001" <?php if($dob_year == 2001) echo'selected="selected"' ?>>2001</option><option value="2000" <?php if($dob_year == 2000) echo'selected="selected"' ?>>2000</option><option value="1999" <?php if($dob_year == 1999) echo'selected="selected"' ?>>1999</option><option value="1998" <?php if($dob_year == 1998) echo'selected="selected"' ?>>1998</option><option value="1997" <?php if($dob_year == 1997) echo'selected="selected"' ?>>1997</option><option value="1996" <?php if($dob_year == 1996) echo'selected="selected"' ?>>1996</option><option value="1995" <?php if($dob_year == 1995) echo'selected="selected"' ?>>1995</option><option value="1994" <?php if($dob_year == 1994) echo'selected="selected"' ?>>1994</option><option value="1993" <?php if($dob_year == 1993) echo'selected="selected"' ?>>1993</option><option value="1992" <?php if($dob_year == 1992) echo'selected="selected"' ?>>1992</option><option value="1991" <?php if($dob_year == 1991) echo'selected="selected"' ?>>1991</option><option value="1990" <?php if($dob_year == 1990) echo'selected="selected"' ?>>1990</option><option value="1989" <?php if($dob_year == 1989) echo'selected="selected"' ?>>1989</option><option value="1988" <?php if($dob_year == 1988) echo'selected="selected"' ?>>1988</option><option value="1987" <?php if($dob_year == 1987) echo'selected="selected"' ?>>1987</option><option value="1986" <?php if($dob_year == 1986) echo'selected="selected"' ?>>1986</option><option value="1985" <?php if($dob_year == 1985) echo'selected="selected"' ?>>1985</option><option value="1984" <?php if($dob_year == 1984) echo'selected="selected"' ?>>1984</option><option value="1983" <?php if($dob_year == 1983) echo'selected="selected"' ?>>1983</option><option value="1982" <?php if($dob_year == 1982) echo'selected="selected"' ?>>1982</option><option value="1981" <?php if($dob_year == 1981) echo'selected="selected"' ?>>1981</option><option value="1980" <?php if($dob_year == 1980) echo'selected="selected"' ?>>1980</option><option value="1979" <?php if($dob_year == 1979) echo'selected="selected"' ?>>1979</option><option value="1978" <?php if($dob_year == 1978) echo'selected="selected"' ?>>1978</option><option value="1977" <?php if($dob_year == 1977) echo'selected="selected"' ?>>1977</option><option value="1976" <?php if($dob_year == 1976) echo'selected="selected"' ?>>1976</option><option value="1975" <?php if($dob_year == 1975) echo'selected="selected"' ?>>1975</option><option value="1974" <?php if($dob_year == 1974) echo'selected="selected"' ?>>1974</option><option value="1973" <?php if($dob_year == 1973) echo'selected="selected"' ?>>1973</option><option value="1972" <?php if($dob_year == 1972) echo'selected="selected"' ?>>1972</option><option value="1971" <?php if($dob_year == 1971) echo'selected="selected"' ?>>1971</option><option value="1970" <?php if($dob_year == 1970) echo'selected="selected"' ?>>1970</option><option value="1969" <?php if($dob_year == 1969) echo'selected="selected"' ?>>1969</option><option value="1968" <?php if($dob_year == 1968) echo'selected="selected"' ?>>1968</option><option value="1967" <?php if($dob_year == 1967) echo'selected="selected"' ?>>1967</option><option value="1966" <?php if($dob_year == 1966) echo'selected="selected"' ?>>1966</option><option value="1965" <?php if($dob_year == 1965) echo'selected="selected"' ?>>1965</option><option value="1964" <?php if($dob_year == 1964) echo'selected="selected"' ?>>1964</option><option value="1963" <?php if($dob_year == 1963) echo'selected="selected"' ?>>1963</option><option value="1962" <?php if($dob_year == 1962) echo'selected="selected"' ?>>1962</option><option value="1961" <?php if($dob_year == 1961) echo'selected="selected"' ?>>1961</option><option value="1960" <?php if($dob_year == 1960) echo'selected="selected"' ?>>1960</option><option value="1959" <?php if($dob_year == 1959) echo'selected="selected"' ?>>1959</option><option value="1958" <?php if($dob_year == 1958) echo'selected="selected"' ?>>1958</option><option value="1957" <?php if($dob_year == 1957) echo'selected="selected"' ?>>1957</option><option value="1956" <?php if($dob_year == 1956) echo'selected="selected"' ?>>1956</option><option value="1955" <?php if($dob_year == 1955) echo'selected="selected"' ?>>1955</option><option value="1954" <?php if($dob_year == 1954) echo'selected="selected"' ?>>1954</option><option value="1953" <?php if($dob_year == 1953) echo'selected="selected"' ?>>1953</option><option value="1952" <?php if($dob_year == 1952) echo'selected="selected"' ?>>1952</option><option value="1951" <?php if($dob_year == 1951) echo'selected="selected"' ?>>1951</option><option value="1950"<?php if($dob_year == 1950) echo'selected="selected"' ?>>1950</option>
					</select>
				</p>	
				<center><button type="submit" name="action" value="send">Save Changes</button></center>
			</fieldset>
			</div>
		</form>

		

	</body>
</html>