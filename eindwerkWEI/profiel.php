<?php
session_start();
require_once("connection.php");

// Alleen ingelogde gebruikers kunnen deze pagina bekijken
if (!isset($_SESSION["gebruikersnaam"])) {
    header("Location: loginform.php?melding=Log eerst in");
    exit();
}

$gebruikersnaam = $_SESSION["gebruikersnaam"];

// Ophalen van gegevens uit tblgebruiker
$sql = "SELECT * FROM tblgebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $gebruiker = $result->fetch_assoc();
} else {
    echo "Gebruiker niet gevonden.";
    exit();
}

// Verwerking van formulier
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['wijzig'])) {
        $nieuwe_naam = $_POST['nieuwe_naam'];
        $nieuwe_email = $_POST['nieuwe_email'];

        // Check of de nieuwe gebruikersnaam al bestaat (behalve bij jezelf)
        $check_sql = "SELECT * FROM tblgebruiker WHERE gebruikersnaam = '$nieuwe_naam' AND gebruikersnaam != '$gebruikersnaam'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            $melding = "Gebruikersnaam is al in gebruik.";
        } else {
            $update_sql = "UPDATE tblgebruiker SET gebruikersnaam = '$nieuwe_naam', email = '$nieuwe_email' WHERE gebruikersnaam = '$gebruikersnaam'";
            if ($conn->query($update_sql)) {
                $_SESSION["gebruikersnaam"] = $nieuwe_naam;
                header("Location: profiel.php?status=gewijzigd");
                exit();
            } else {
                $melding = "Fout bij bijwerken van gegevens.";
            }
        }
    }

    if (isset($_POST['verwijder'])) {
        $delete_sql = "DELETE FROM tblgebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
        $conn->query($delete_sql);
        session_destroy();
        header("Location: loginform.php?melding=Account is verwijderd");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Mijn Profiel</title>
  <link rel="stylesheet" href="style11.css">
</head>
<body>
  <header>
    <h1>Mijn Profiel</h1>
    <nav>
      <a href="shop.php">🏠 Shop</a> |
      <a href="logout.php">Uitloggen</a>
    </nav>
  </header>

  <main>
    <h2>Gebruikersgegevens</h2>

    <?php if (isset($melding)): ?>
      <p style="color: red;"><?php echo $melding; ?></p>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'gewijzigd'): ?>
      <p style="color: green;">Je profiel is succesvol gewijzigd!</p>
    <?php endif; ?>

    <form method="post">
      <label>Gebruikersnaam:<br>
        <input type="text" name="nieuwe_naam" value="<?php echo htmlspecialchars($gebruiker['gebruikersnaam']); ?>" required>
      </label><br><br>
      <label>Emailadres:<br>
        <input type="email" name="nieuwe_email" value="<?php echo htmlspecialchars($gebruiker['email']); ?>" required>
      </label><br><br>
      <button type="submit" name="wijzig">💾 Wijzig gegevens</button>
      <button type="submit" name="verwijder" onclick="return confirm('Weet je zeker dat je je account wilt verwijderen?');">🗑️ Verwijder account</button>
    </form>
  </main>
</body>
</html>


