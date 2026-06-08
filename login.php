
<?php 
    session_start();

    include("conn.php");

    if ($_SERVER ['REQUEST_METHOD'] == "POST") 
    {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        if (!empty($uname) && !empty($pword) && !is_numeric($uname))
        {
            
            $query = "SELECT * FROM mrsci_info WHERE uname ='$uname' LIMIT 1";
            $result = mysqli_query($conn, $query); 

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pword'] == $pword)
                    {
                        header("location: \qr-code-attendance-system\index.php");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('INVALID GAGO')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('invalid pa rin')</script>";
        } 
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>MRSCI SIGN UP</title>
</head>
<body id="con-login">
<div class="main-login">
	<div class="login">
		<h2 id="sign-log">Log In</h2>
		<form method="POST">
		
		<label for="USERNAME"></label>
		<input class="uname" type="for-user" placeholder="USERNAME" name="uname" required><br>

		<label for="pword"></label>
		<input class="pword" type="Password" placeholder="PASSWORD" name="pword" required><br>

		
			<button id="log-sign" type="submit">Login</button>

			<a id="ch-signup" href="sign-up.php">Sign Up </a>
		</form>
	</div>
</div>
</body>
</html>