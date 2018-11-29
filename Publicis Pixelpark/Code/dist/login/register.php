<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
	 
	sec_session_start();
	
	if (login_check($mysqli) == true) 
	{
		/*echo 'Logged in';*/
		$LoggedText = "Logout";
		$loggedaction = "logout.php";
	}
	else 
	{
		/*echo 'Logged Out';*/
		$LoggedText = "Login";
		$loggedaction = "login.php";
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
		<title>Craftmans Projects - Dein Computerforum!</title>
	</head>

	<header>
	</header>
    <body><br><br><br>
        <!-- Anmeldeformular für die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <!--<ul>
            <li>Benutzernamen dürfen nur Ziffern, Groß- und Kleinbuchstaben und Unterstriche enthalten.</li>
            <li>E-Mail-Adressen müssen ein gültiges Format haben.</li>
            <li>Passwörter müssen mindest sechs Zeichen lang sein.</li>
            <li>Passwörter müssen enthalten
                <ul>
                    <li>mindestens einen Großbuchstaben (A..Z)</li>
                    <li>mindestens einen Kleinbuchstabenr (a..z)</li>
                    <li>mindestens eine Ziffer (0..9)</li>
                </ul>
            </li>
            <li>Das Passwort und die Bestätigung müssen exakt übereinstimmen.</li>
        </ul>-->
		<center>
			<div class="login-page">
				<div class="form">
					<form class="register-form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
						<input type='text' name='username' id='username' placeholder="username" />
						<input type="text" name="email" id="email" placeholder="email" />
						<input type="password" name="password" id="password" placeholder="password" />
						<input type="password" name="confirmpwd" id="confirmpwd" placeholder="confirm password" />
						<input type='text' name="code" id="code" placeholder="Your Code" />
						<button type="button" value="Register" onclick="return regformhash(this.form,this.form.username,this.form.email,this.form.password,this.form.confirmpwd,this.form.code);">Register</button> 
						<p class="message">Already registered? <a href="login.php">Sign In</a></p>
					</form>
				</div>
			</div>
		</center>
    </body>
</html>