<!DOCTYPE html>
<link rel="stylesheet" href="stijl.css">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stijl.css">

</head>
<body>
    <h1>Vul je gegevens in</h1>
    <form action="signup.php" method="post">
    <label for="naam">Naam:</label>
    <input type="text" name="naam" id="naam" required><br><br>

    <label for="voornaam">Voornaam:</label>
    <input type="text" name="voornaam" id="voornaam" required><br><br>

    <label for="gebruikersnaam">Gebruikersnaam:</label>
    <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br><br>

    <label for="email">E-mailadres:</label>
    <input type="email" name="email" id="email" required>

    <label for="paswoord">Paswoord:</label>
    <input type="password" name="paswoord" id="paswoord" required><br><br>

    <input type="submit" value="Verzenden">
    <input type="reset" value="Wissen">


    </form>
</body>
</html>
