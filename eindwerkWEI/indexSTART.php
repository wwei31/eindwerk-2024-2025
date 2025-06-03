<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Clash of Clans Account Shop</title>
  <link rel="stylesheet" href="style11.css" />
</head>
<body>
  <header>
    <h1>Clash 2 Clash</h1>
    <nav>
      <a href="loginform.php">Inloggen</a> |
      <a href="signupform.php">Registreren</a>
    </nav>
  </header>
<div class="container">
  <div class="producten">
    <?php
    include 'connection.php';  // verbindingedatabase

    // Selecteer alle Clash of Clans-accounts uit de tabel tblAccounts
    $sql = "SELECT * FROM tblAccounts";  // Haal alle accounts op
    $result = $conn->query($sql);

    // Loop door alle rijen in de database
    while($row = $result->fetch_assoc()) {
    ?>

    <!-- Toon per account de inhoud uit de databank -->
    <div class="account">
      <h4><?php echo $row['naam']; ?></h4>
      <a href="shop.php?accountID=<?php echo $row['id']; ?>">
        <img id="imgAccount" alt="account" src="<?php echo $row['afbeelding']; ?>" />
      </a>
      <p><b>Omschrijving: </b><?php echo $row['beschrijving']; ?></p>
      <p><b>Level: </b><?php echo $row['levels']; ?></p><br>
      <p class="prijs"><b>Prijs: </b>€ <?php echo $row['prijs']; ?></p>
      <a href="shop.php?accountID=<?php echo $row['id']; ?>">Toevoegen</a>
    </div>

    <?php 
    };
    $conn->close();
    ?>
  </div>
</div>
 <footer>
    <p>&copy;2025 Clash 2 Clash | Eindwerk Wei</p>
  </footer>
</body>
</html>


