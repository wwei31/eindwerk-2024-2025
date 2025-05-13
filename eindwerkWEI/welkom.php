<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION["gebruikersnaam"])) {
    header("Location: login.php"); // Als niet ingelogd, doorverwijzen naar loginpagina
    exit();
}

$gebruikersnaam = $_SESSION["gebruikersnaam"];
echo "Welkom, $gebruikersnaam!";
?>

<!-- Voeg hier een knop toe om uit te loggen -->
<a href="logout.php">Uitloggen</a>
