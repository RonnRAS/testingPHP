<?php 

	include('conn.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>MRSCI SIGN UP</title>
</head>
<body id="con-sign">
<div class="main-sign">
		<div class="signup">
		<form method="POST" action="add.php">
		<h2 id="sign-regi">REGISTER NOW</h2>

		<label for="firsname"></label>
		<input class="fname" type="for-user" placeholder="FIRSTNAME" name="firstname" required><br>

		<label for="lastname"></label>
		<input class="lname" type="for-user" placeholder="LASTNAME" name="lastname" required><br>

		

		<label for="USERNAME"></label>
		<input class="uname" type="for-user" placeholder="USERNAME" name="uname" required><br>

		<label for="pword"></label>
		<input class="pword" type="Password" placeholder="PASSWORD" name="pword" required><br>

		
			<button id="sub-sign" type="submit">SIGN UP</button>

			<a id="ch-login" href="login.php">Log In</a>


		</div>
		</form>
	</div>
</body>
</html>