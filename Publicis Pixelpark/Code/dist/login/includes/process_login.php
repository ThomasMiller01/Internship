<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Unsere selbstgemachte sichere Funktion um eine PHP-Sitzung zu starten.
 
if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // Das gehashte Passwort.
 
    if (login($username, $password, $mysqli) == true) {
		header('Location: ../protected_page.php');
    } else {
        // Login fehlgeschlagen 
        header('Location: ../login.php?error=1');
    }
} else {
    // Die korrekten POST-Variablen wurden nicht zu dieser Seite geschickt. 
    echo 'Invalid Request';
}
?>