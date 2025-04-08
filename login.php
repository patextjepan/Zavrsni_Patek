<?php
session_start();
include 'db.php'; // Datoteka s konekcijom na bazu

// Dobivanje podataka iz forme
$username = $_POST['username'];
$password = $_POST['password'];

// Provjera korisničkog imena i lozinke
$sql = "SELECT * FROM Radnici WHERE KorisnickoIme = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_array();
    // Provjera lozinke (pretpostavlja se da su lozinke hashirane)
    if ($password== $row['Lozinka']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['KorisnickoIme'];
        header("Location: prikaz.php"); // Preusmjeravanje na stranicu za pregled podataka
        exit;
    } else {
        echo "Pogrešna lozinka.";
    }
} else {
    echo "Korisnik ne postoji.";
}
?>
