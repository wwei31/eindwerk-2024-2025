<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Inloggen</title>
  <link rel="stylesheet" href="style.css"> <!-- optioneel -->
</head>
<body>
  <h1>Inloggen</h1>
  <form action="login.php" method="post">
    <label for="gebruikersnaam">Gebruikersnaam:</label><br>
    <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br><br>

    <label for="paswoord">Wachtwoord:</label><br>
    <input type="password" id="paswoord" name="paswoord" required><br><br>

    <button type="submit">Inloggen</button>
  </form>

  <p>Nog geen account? <a href="signupform.php">Registreer hier</a></p>
</body>
</html>
