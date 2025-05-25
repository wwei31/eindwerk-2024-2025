<?php
session_start();
include 'connection.php';

// Simpele controles
if (!isset($_SESSION['gebruikersnaam'])) {
    die("Fout: niet ingelogd");
}

if (empty($_SESSION['winkelmandje'])) {
    die("Fout: winkelmandje leeg");
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Fout: geen geldige betaling");
}

$gebruiker = $_SESSION['gebruikersnaam'];

// Opslaan in database
$success = true;
foreach ($_SESSION['winkelmandje'] as $item) {
    $stmt = $conn->prepare("INSERT INTO tblBestellingen (gebruikersnaam, accountID, prijs) VALUES (?, ?, ?)");
    if (!$stmt->execute([$gebruiker, $item['id'], $item['prijs']])) {
        $success = false;
        break;
    }
}

if ($success) {
    // Leeg winkelmandje
    $_SESSION['winkelmandje'] = [];
    $message = "Bestelling succesvol geplaatst!";
} else {
    $message = "Er ging iets mis. Probeer opnieuw.";
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestelling voltooid</title>
</head>
<body>
    <h1><?php echo $message; ?></h1>
    
    <?php if ($success): ?>
        <p>Bedankt voor je bestelling, <?php echo htmlspecialchars($gebruiker); ?>!</p>
        <p>Je bestelling wordt verwerkt.</p>
    <?php endif; ?>
    
    <a href="shop.php">← Terug naar shop</a>
</body>
</html>
