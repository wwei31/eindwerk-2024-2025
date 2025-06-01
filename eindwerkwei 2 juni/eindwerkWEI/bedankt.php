<?php
session_start();
if (!isset($_SESSION["gebruikersnaam"])) {
    header("Location: loginform.php");
    exit();
}

$description = htmlspecialchars($_POST['description']);
$amount = floatval($_POST['amount']);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bedankt</title>
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
    <h2>Bedankt voor je aankoop!</h2>
    <p>Je hebt succesvol het volgende account gekocht:</p>
    <ul>
      <li><strong>Account:</strong> <?php echo $description; ?></li>
      <li><strong>Prijs:</strong> €<?php echo number_format($amount, 2, ',', '.'); ?></li>
    </ul>
  </div>
</body>
</html>
