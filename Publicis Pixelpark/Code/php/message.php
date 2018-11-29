<?php

$type = $_GET['t'];

$success = false;

if($type == 'c')
{
	$name = $_GET['n'];
	$email = $_GET['e'];
	$message = $_GET['m'];

	$pdo = new PDO('mysql:host=localhost;dbname={ username }', '{ dbname }', '{ dbpass }');
	 
	$statement = $pdo->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
	$statement->execute(array($name, $email, $message));   
	$success = true;
}
else if($type == 'r')
{
	$star = $_GET['s'];
	$message2 = $_GET['m'];

	$pdo = new PDO('mysql:host=localhost;dbname={ username }', '{ dbname }', '{ dbpass }');
	 
	$statement = $pdo->prepare("INSERT INTO rating (star, message) VALUES (?, ?)");
	$statement->execute(array($star, $message2));   
	$success = true;
}

/*if($_GET['d'] == 'm')
{
	header('Location: ../html/contact_mobile.html?success=' . $success);
}
else
{
	header('Location: ../html/index.html?success=' . $success);
}*/

echo '<script>close();</script>'

?>

<script type="text/javascript">
	function close()
	{
		window.self.close();
	}
</script>