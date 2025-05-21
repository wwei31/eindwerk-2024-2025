<?php
include 'connection.php'; // Zorg ervoor dat je verbinding maakt met je database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Haal de gegevens op uit het formulier
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $levels = $_POST['levels'];
    $prijs = $_POST['prijs'];
    $afbeelding = $_POST['afbeelding'];

    // Bereid de query voor om het account toe te voegen
    $sql = "INSERT INTO tblAccounts (naam, beschrijving, levels, prijs, afbeelding) VALUES (?, ?, ?, ?, ?)";

    // Maak een prepared statement en voer het uit
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssdis", $naam, $beschrijving, $level, $prijs, $afbeelding); // Bind de parameters
        if ($stmt->execute()) {
            echo "Account succesvol toegevoegd!";
        } else {
            echo "Fout bij het toevoegen van account: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Fout bij de voorbereiden van de query: " . $conn->error;
    }

    // Sluit de verbinding
    $conn->close();
}
?>