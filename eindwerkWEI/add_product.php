<?php
session_start();
if (!isset($_SESSION['gebruikersnaam']) || $_SESSION['rol'] !== 'admin') {
    // Niet ingelogd of geen admin
    header("Location: loginform.php?melding=Geen toegang");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Product Toevoegen</title>
  <link rel="stylesheet" href="stijl.css">
</head>
<body>
  <h1>Voeg een nieuw account toe</h1>
  <form action="add_account.php" method="POST" enctype="multipart/form-data">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required /><br><br>

    <label for="beschrijving">Omschrijving:</label>
    <textarea id="beschrijving" name="beschrijving" required></textarea><br><br>

    <label for="levels">Level:</label>
    <input type="number" id="level" name="level" required /><br><br>

    <label for="prijs">Prijs (€):</label>
    <input type="number" id="prijs" name="prijs" step="0.01" required /><br><br>

    <label for="afbeelding">Afbeelding (images/):</label>
    <input type="text" id="afbeelding" name="afbeelding" required /><br><br>

    <button type="submit">Product toevoegen</button>
    <button type="reset">Formulier wissen</button>

  <p><a href="shop.php">Terug naar de shop</a></p>
  <p><a href="logout.php">Uitloggen</a></p>
  <p><a href="profiel.php">Mijn Profiel</a></p>

  </form>
</body>
</html>
