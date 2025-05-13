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
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <h1>Clash 2 Clash</h1>
    <nav>
      <span>Welkom, <?php echo htmlspecialchars($_SESSION["gebruikersnaam"]); ?></span> |
      <a href="logout.php">Uitloggen</a>
    </nav>
  </header>

  <div class="container">
    <div class="filters">
      <input type="text" placeholder="Zoek TH niveau..." id="searchInput" />
      <select id="sortSelect">
        <option>Prijs (laag-hoog)</option>
        <option>Prijs (hoog-laag)</option>
        <option>Nieuwste eerst</option>
      </select>
    </div>

    <div class="grid" id="accountGrid">
      <div class="card">
        <img src="images/th14.jpg" alt="TH14 Max Account" class="card-img" />
        <h3>TH14 Max</h3>
        <p>Inclusief helden op max, 3000+ gems</p>
        <p class="price">€199</p>
        <form action="betaling.php" method="post">
          <input type="hidden" name="description" value="TH14 Max" />
          <input type="hidden" name="amount" value="199.00" />
          <button class="buy-btn" type="submit">Koop nu</button>
        </form>
      </div>
      <div class="card">
        <img src="images/th12.jpg" alt="TH14 Max Account" class="card-img" />
        <h3>TH12 Goedkoop</h3>
        <p>Prima basis, troepen lvl 6+</p>
        <p class="price">€59</p>
        <form action="betaling.php" method="post">
          <input type="hidden" name="description" value="TH12 Goedkoop" />
          <input type="hidden" name="amount" value="59.00" />
          <button class="buy-btn" type="submit">Koop nu</button>
        </form>
      </div>
      <div class="card">
        <img src="images/th9.jpg" alt="TH14 Max Account" class="card-img" />
        <h3>TH9 Old School</h3>
        <p>Klassiek dorpje, veel upgrades</p>
        <p class="price">€29</p>
        <form action="betaling.php" method="post">
          <input type="hidden" name="description" value="TH9 Old School" />
          <input type="hidden" name="amount" value="29.00" />
          <button class="buy-btn" type="submit">Koop nu</button>
        </form>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
