<?php
session_start();

// Beveiliging: alleen ingelogde gebruikers kunnen kopen
if (!isset($_SESSION["gebruikersnaam"])) {
    header("Location: loginform.php?melding=Log eerst in om iets te kopen.");
    exit();
}

// Haal gegevens op van formulier
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : 'Onbekend product';
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.0;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Betaling</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Clash 2 Clash</h1>
    <nav>
      <a href="shop.php">Terug naar Shop</a> |
      <a href="logout.php">Uitloggen</a>
    </nav>
  </header>

  <div class="container">
    <h2>Betalingsoverzicht hier komt de api</h2>
   
    <form action="bedankt.php" method="post">
        <input type="hidden" name="description" value="<?php echo $description; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <button type="submit">Bevestig betaling</button>
    </form>
  </div>
</body>
</html>
