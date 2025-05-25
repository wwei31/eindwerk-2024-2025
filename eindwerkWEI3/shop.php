<?php
session_start();

// Beveiliging: alleen ingelogde gebruikers mogen deze pagina zien
if (!isset($_SESSION["gebruikersnaam"])) {
    header("Location: loginform.php?melding=Log eerst in om toegang te krijgen tot de shop");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Clash of Clans Account Shop</title>
  <link rel="stylesheet" href="style11.css" />
</head>
<body>
  <header>
    <h1>Clash 2 Clash</h1>
  <!-- ?php print_r($_SESSION);  -->
    <nav>
      <span>Welkom, <?php echo htmlspecialchars($_SESSION["gebruikersnaam"]); ?></span> |
      <a href="logout.php">Uitloggen</a>
      <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
        <a href="add_product.php">Product Toevoegen</a>
      <?php endif; ?>
      <a href="winkelmandje.php">🛒 Winkelmandje</a>


    </nav>


  </header>

<div class="container">
  <div class="producten"> 
    <?php
    include 'connection.php';  // verbinding maakt met je database

    // Selecteer alle Clash of Clans-accounts uit de tabel tblAccounts
    $sql = "SELECT * FROM tblAccounts";  // Haal alle accounts op
    $result = $conn->query($sql);

    // Loop door alle rijen in de database
    while($row = $result->fetch_assoc()) {
    ?>

    <!-- Toon per account de inhoud uit de databank -->
    <div class="account">
      <h4><?php echo $row['naam']; ?></h4>
      <a href="account.php?accountID=<?php echo $row['id']; ?>">
        <img id="imgAccount" alt="account" src="<?php echo $row['afbeelding']; ?>" />
      </a>
      <p><b>Omschrijving: </b><?php echo $row['beschrijving']; ?></p>
      <p><b>Level: </b><?php echo $row['levels']; ?></p><br>
      <p class="prijs"><b>Prijs: </b>€ <?php echo $row['prijs']; ?></p>
      <a href="winkelmandje.php?accountID=<?php echo $row['id']; ?>">Toevoegen</a>
    </div>

    <?php 
    };
    $conn->close();
    ?>
  </div>
</div>

  <script src="script.js"></script>
</body>
</html>

