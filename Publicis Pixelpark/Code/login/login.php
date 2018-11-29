<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	 
	sec_session_start();
	 
	$r = $_GET['r'];
	
	if($_GET['user'] == "zeus")
	{
		$userv = $_GET['user'];
		$passv = $_GET['pass'];
		$btnclick = true;
	}
	else{
		$userv = "";
		$passv = "";
	}
?>

<html>
	<head>
		<link href="stylesheet.css" rel="stylesheet">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<script type="text/JavaScript" src="js/sha512.js"></script> 
		<script type="text/JavaScript" src="js/forms.js"></script>
		<!-- Meta-Daten -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> NxtGenDevs - Messages </title>
	</head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo "<center><div style=\"border: 1px solid;margin-top: 6.5%;background-repeat: no-repeat;background-position: 10px center;color: #9C0000;background-color: #FF4545; font-family: Arial, Helvetica, sans-serif;font-size: 17px;width:50%; padding: 15px 10px 15px 50px;\">Incorrect password or Username. Please try again.</div></center>";
        }
		if ($r == 1) {
			echo "<center><div style=\"border: 1px solid;margin-top: 6.5%;background-repeat: no-repeat;background-position: 10px center;color: #FFAB00;background-color: #FFFA80;font-family: Arial, Helvetica, sans-serif;font-size: 17px;width:50%;padding: 15px 10px 15px 50px;\">Now you're registered and you can login!</div></center>";
		}
        ?> 
		
		<!--
		<script type="text/javascript" language="Javascript"> 
			alert("Error message") 
		</script>
		-->
		
		<br>
		<center>
			<div class="login-page">
				<div class="form">
					<form class="login-form" action="includes/process_login.php" method="post" name="login_form">
						<input type="text" name="username" id="username" placeholder="username" value="<?php echo $userv; ?>"/>
						<input type="password" name="password" id="password" placeholder="password" value="<?php echo $passv; ?>"/>
						<button value="Login" onclick="formhash(this.form, this.form.password);" id="btn">Login</button>
					</form>
				</div>
				<a href="register.php">Register here!</a>
			</div>
		</center>
		<?php
		
			if($btnclick)
			{
				echo("<script text/JavaScript> document.getElementById(\"btn\").click(); </script>");
			}
		
		?>
    </body>
</html>