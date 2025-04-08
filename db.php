<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Mjenjacnica";

// Povezivanje na bazu
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera konekcije
if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}
?>
