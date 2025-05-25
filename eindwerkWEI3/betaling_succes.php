<?php
session_start();
include 'connection.php';

// Controle: is het winkelmandje leeg?
if (empty($_SESSION['winkelmandje'])) {
    echo "Je winkelmandje is leeg. <a href='shop.php'>Terug naar shop</a>";
    exit();
}

// Bestellingen opslaan in database
foreach ($_SESSION['winkelmandje'] as $item) {
    $gebruiker = $_SESSION['gebruikersnaam'];
    $accountID = intval($item['id']);
    $prijs = floatval($item['prijs']);

    $stmt = $conn->prepare("INSERT INTO tblBestellingen (gebruikersnaam, accountID, prijs) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $gebruiker, $accountID, $prijs);
    $stmt->execute();
}

// Leeg winkelmandje
$_SESSION['winkelmandje'] = [];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Betaling gelukt</title>
</head>
<body>
  <h1>Bedankt voor je bestelling, <?php echo htmlspecialchars($gebruiker); ?>!</h1>
  <p>De betaling is succesvol voltooid via PayPal.</p>
  <a href="shop.php">← Terug naar de shop</a>
</body>
</html>

