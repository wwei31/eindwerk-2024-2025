<?php
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $naam = isset($_POST["naam"])? $_POST["naam"] :"";
    print "Naam: ".htmlspecialchars($naam)."<br>";

    $voornaam = isset($_POST["voornaam"])? $_POST["voornaam"] :"";
    print "Voornaam: ".htmlspecialchars($voornaam)."<br>";

    $gebruikersnaam = isset($_POST["gebruikersnaam"])? $_POST["gebruikersnaam"] :"";
    print "Gebruikersnaam: ".htmlspecialchars($gebruikersnaam)."<br>";

    $email = isset($_POST["email"])? $_POST["email"] :"";
    print "E-mailadres: ".htmlspecialchars($email)."<br>";

    $wachtwoord = isset($_POST["paswoord"])? $_POST["paswoord"] :"";
    password_hash($_POST["paswoord"], PASSWORD_DEFAULT);
    print "Wachtwoord: ".htmlspecialchars($wachtwoord)."<br>";
    include_once("connection.php");

    // $wachtwoord = password_hash($_POST["paswoord"], PASSWORD_DEFAULT);


    $sql = "INSERT INTO tblgebruiker (Naam, Voornaam, Gebruikersnaam ,email, wachtwoord)
    VALUES ('$naam', '$voornaam', '$gebruikersnaam', '$email', '$wachtwoord')";

    if ($conn->query($sql) === TRUE) {
        // Succesvolle registratie
        $conn->close();
        header("Location: index.php?melding=Account succesvol aangemaakt. Je kunt nu inloggen.");
        exit();
    } else {
        // Foutmelding
        $fout = $conn->error;
        $conn->close();
        header("Location: index.php?melding=Fout bij registratie: $fout");
        exit();
    }

}
// print "<a href='signupForm.php'><button>Terug</button></a>";
print "<button onclick='window.history.go(-1)'>Terug</button><br>";

//$vorige=$_SERVER["HTTP_REFERER"];
//print $vorige;


?>