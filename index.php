
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>chatLink.com</title>
      <link rel="stylesheet" href="css/style.css">
      <style>
      	body
      	{
      		background-image: url('img/Images29.jpg');
      	}



      	#logo
      	{
      		position: absolute;
      		left: 700px;
      		bottom: 500px;
      		top: -3px;
      	}
      </style>
</head>

<body style="background-image: url('img/Images29.jpg');" >



  <div class="login-wrap" style="margin-right: 1000px;">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">

			             
			        				<div class="group">
			        				<form action= "check.php"  method="POST">
					<label for="user" class="label"><h2>email</h2></label>
					<input required id="user" type="text" class="input" name="email">			
					<label for="pass" class="label"><h2>Password</h2></label>
					<input required id="pass" type="password" class="input" data-type="password" name="pass">
						<br><br><input style="margin-top: 50px;" type="submit" class="button" value="Sign In"></br></br>
						</form>
				</div>

				<div class="hr"> </div>

				<div class="foot-lnk">
					
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
				<form action="config.php" method="POST">
					<label for="user" class="label">Username</label>
					<input required id="user" type="text" class="input" name="name">
					<label for="pass" class="label">Password</label>
					<input required id="pass" type="password" class="input" data-type="password" name="pass">
					<label for="pass" class="label">Repeat Password</label>
					<input required id="pass" type="password" class="input" data-type="password" name="pass1">
					<label required for="pass" class="label">Email Address</label>
					<input required id="pass" type="text" class="input" name="email">
					<input required name="sex" value="Female" id="sex" type="radio">
					<label class="_58mt" for="u_0_k">Female</label></span>
					<span class="_5k_2 _5dba">
					<input required name="sex" value="Male" id="u_0_l" type="radio">
					<label class="_58mt" for="u_0_l">Male</label>
					     </span>
					     </span>
					     <h3>Birthday</h3>
					     <div id="Birthday"><span><select required name="month"><option value="" selected="selected">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select><select required name="day"><option value="" selected="selected">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><select required name="year"><option value="" selected="selected">Year</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option></select></span></div>

					<br><input  type="submit" class="button" value="Sign Up"></br>
					</form>
				</div>
				<div class="hr"></div>	
			</div>
		</div>
	</div>

</div>
<img id="logo" src="img/chatlogo.png">
  
  
</body>
</html>
