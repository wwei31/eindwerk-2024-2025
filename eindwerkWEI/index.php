<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Homepagina</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(74, 74, 227, 0.3); /* blauwe schaduw */
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        strong {
            color: #777;
        }

        .button {
            display: inline-block;
            margin: 20px 10px;
            padding: 10px 20px;
            background-color:rgb(222, 72, 8);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color:rgb(0, 116, 240);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welkom op onze website!</h1>

        <?php
        $bestand = "home.txt";
        if (file_exists($bestand)) {
            $inhoud = file_get_contents($bestand);
            echo "<p>" . nl2br(htmlspecialchars($inhoud)) . "</p>";
        } else {
            echo "<p><strong>Fout:</strong> Bestand 'home.txt' bestaat niet of is niet toegankelijk.</p>";
        }
        ?>

        <a href="loginform.php" class="button">Inloggen</a>
        <a href="signupform.php" class="button">Registreren</a>
    </div>

</body>
</html>
