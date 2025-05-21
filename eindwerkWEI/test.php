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
      <p><b>Level: </b><?php echo $row['level']; ?></p><br>
      <p class="prijs"><b>Prijs: </b>€ <?php echo $row['prijs']; ?></p>
      <a href="winkelmandje.php?accountID=<?php echo $row['id']; ?>">Toevoegen</a>
    </div>

    <?php 
    };
    $conn->close();
    ?>
  </div>
</div>
