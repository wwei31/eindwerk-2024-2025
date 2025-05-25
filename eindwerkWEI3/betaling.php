<?php 
session_start(); 

// Simpele controles
if (!isset($_SESSION['gebruikersnaam'])) {
    die("Je moet ingelogd zijn. <a href='login.php'>Login hier</a>");
}

if (empty($_SESSION['winkelmandje'])) {
    die("Je winkelmandje is leeg. <a href='shop.php'>Ga naar shop</a>");
}

// Bereken totaal
$totaal = 0;
foreach ($_SESSION['winkelmandje'] as $item) {
    $totaal += $item['prijs'];
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Betalen</title>
</head>
<body>
    <h1>Betaling</h1>
    <p>Totaalbedrag: €<?php echo number_format($totaal, 2); ?></p>
    
    <!-- Simpele vorm zonder echte PayPal -->
    <form method="POST" action="betaling_succes.php">
        <input type="hidden" name="totaal" value="<?php echo $totaal; ?>">
        <button type="submit" style="background: #0070ba; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Betaal €<?php echo number_format($totaal, 2); ?>
        </button>
    </form>
    
    <p><a href="shop.php">← Terug naar shop</a></p>
</body>
</html>
