<?php
session_start();
include 'connection.php';

// Voeg item toe aan winkelmandje
if (isset($_GET['accountID'])) {
    $id = intval($_GET['accountID']);

    // Haal accountgegevens op
    $sql = "SELECT * FROM tblAccounts WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($row = $result->fetch_assoc()) {
        // Winkelmandje aanmaken als deze nog niet bestaat
        if (!isset($_SESSION['winkelmandje'])) {
            $_SESSION['winkelmandje'] = [];
        }

        // Account toevoegen aan winkelmandje
        $_SESSION['winkelmandje'][$id] = $row;
    }
}

// Verwijder item
if (isset($_GET['verwijderID'])) {
    $verwijderID = intval($_GET['verwijderID']);
    unset($_SESSION['winkelmandje'][$verwijderID]);
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Winkelmandje</title>
  <link rel="stylesheet" href="style11.css">
</head>
<body>
  <h1>Jouw Winkelmandje</h1>
  <a href="shop.php">← Terug naar de shop</a>
<div class="producten">
  <?php
if (!empty($_SESSION['winkelmandje'])) { // Controleer of het winkelmandje niet leeg is
    $totaal = 0; // Variabele om totaalprijs op te tellen
    foreach ($_SESSION['winkelmandje'] as $item) { // Loop door elk item in het winkelmandje
        echo "<div class='account'>"; // Begin HTML-div voor een productkaart
        echo "<h4>{$item['naam']}</h4>"; // Toon de naam van het account
        echo "<img src='{$item['afbeelding']}' alt='account'>"; // Toon afbeelding van het account
        echo "<p>{$item['beschrijving']}</p>"; // Toon beschrijving
        echo "<p><b>Prijs: </b>€ {$item['prijs']}</p>"; // Toon prijs van het account
        echo "<a href='winkelmandje.php?verwijderID={$item['id']}'>Verwijderen</a>"; // Verwijder-link
        echo "</div>"; // Einde van de productkaart-div
        $totaal += $item['prijs']; // Tel prijs op bij het totaal
    }
    echo "<h3>Totaalprijs: € $totaal</h3>"; // Toon totaalprijs
} else {
    echo "<p>Je winkelmandje is leeg.</p>"; // Toon melding als winkelmandje leeg is
}
?>

</div>
<?php if (!empty($_SESSION['winkelmandje'])): ?>
  <form method="post" action="betaling.php">
  <a href="betaling.php">← Betalen</a>
  </form>
<?php endif; ?>


</body>
</html>

