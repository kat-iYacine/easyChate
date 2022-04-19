<!DOCTYPE html>
<html>
<head>
	<title>forgate my password</title>
	<style>
		
		body{
	margin:0;
	color:#6a6f8c;
	background-image: url('img/Images29.jpg');
	font:600 16px/18px 'Open Sans',sans-serif;
}
#relogin{

	width:50%;
	margin:auto;
	max-width:400px;
	min-height:300px;
	position:absolute;
	top: 90px;
	right:20px;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);

    width:50%;
	height:50%;
	position:relative;
	top: 200px;
	right:20px;
	padding:40px 40px 40px 40px;
	background:rgba(40,59,101,.9);

}
#title{
	display: inline-block;
	position: absolute;
	top: 100px;
	left: 450px;
	font-size: 30px;
}
‫‪#user:focus‬‬ ‫{‬ ‫‪border:3px‬‬ ‫‪solid‬‬ ‫‪#333‬‬;
	‪           background-color:#ff0‬‬ ‫}‬
#wrong
{

}	

	</style>



</head>
<body>
<div id="title"><br><span id="wrong">Password Or e-Mail incorrect</span></br></div>
                               <div id="relogin">
                             
			        				<form action= "check.php"  method="POST">
					<br><label for="user" class="label">email</label></br>
					<br><input id="user" type="text" class="input" name="email"></br>		
					<br><label for="pass" class="label">Password</label></br>
					<br><input id="pass" type="password" class="input" data-type="password" name="pass"></br>
				    <br><input type="submit" class="button" value="Sign In"></br>
						</form>
                                
                                     </div>
</body>
</html>