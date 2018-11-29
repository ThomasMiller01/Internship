<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

$content = "";
$content2 = "";

$servername = "localhost";
$username = "{ username }";
$password = "{ password }";
$dbname = "{ dbname }";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, time, name, email, message FROM contact";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $content =  $content . "" . $row["id"] . "<br>" . $row["time"] . "<br>" . $row["name"] . "<br>" . $row["email"] . "<br>" . $row["message"] . "<br><br>";
    }
} else {
    echo "0 results";
}

$sql2 = "SELECT id, time, star, message FROM rating";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $content2 =  $content2 . "" . $row["id"] . "<br>" . $row["time"] . "<br>" . $row["star"] . " Sterne<br>" . $row["message"] . "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Secure Login: NxtGenDevs - Message </title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
			<div class="forminv"><form action="register.php" id="logformid"><input type="submit" value="Register" class="loginbutton" id="loginnavigation"></input></form><script>loginnav = document.getElementById("loginnavigation");
				loginnav.value = "<?php echo "Logout" ?>";
				loginnavform = document.getElementById("logformid");
				loginnavform.action = "<?php echo "logout.php" ?>";</script></div>
				<br><br><b>Contact:</b><br><br>
				<div id="commands"><?php echo $content; ?></div>
                <br><b>Rating:</b><br><br>
                <div id="commands"><?php echo $content2; ?></div>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="login.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>