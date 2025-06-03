<?php
session_start();

// Controleer of gebruiker ingelogd is
if (!isset($_SESSION["gebruikersnaam"])) {
    header("Location: loginform.php?melding=Log eerst in om toegang te krijgen tot de shop");
    exit();
}

if (!isset($_GET['accountID'])) {
    echo "Geen account geselecteerd.";
    exit();
}

$accountID = intval($_GET['accountID']);

include 'connection.php';

// Veiligheidscheck en data ophalen
$sql = "SELECT * FROM tblAccounts WHERE id = $accountID";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Dit account bestaat niet.";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Account Details - <?php echo htmlspecialchars($row['naam']); ?></title>
    <link rel="stylesheet" href="account.css" />
</head>
<body>
<header>
    <h1>Clash 2 Clash - Account Details</h1>
    <nav>
      <span>Welkom, <?php echo htmlspecialchars($_SESSION["gebruikersnaam"]); ?></span> |
      <a href="logout.php">Uitloggen</a>
    </nav>
</header>

<div class="container">
    <div class="account-detail">
        <h2><?php echo htmlspecialchars($row['naam']); ?></h2>
        <img src="<?php echo htmlspecialchars($row['afbeelding']); ?>" alt="Account afbeelding" style="max-width: 300px; border-radius: 8px;" />
        <p><strong>Omschrijving:</strong> <?php echo htmlspecialchars($row['beschrijving']); ?></p>
        <p><strong>Level:</strong> <?php echo htmlspecialchars($row['levels']); ?></p>
        <p class="prijs"><strong>Prijs:</strong> € <?php echo htmlspecialchars($row['prijs']); ?></p>
        
        <a href="winkelmandje.php?accountID=<?php echo $row['id']; ?>" class="buy-btn">Toevoegen aan winkelmandje</a>
        <p><a href="shop.php" class="back-btn">Terug naar de shop</a></p>
    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
