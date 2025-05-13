<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['gebruikersnaam']) && isset($_POST['paswoord'])) {
        $gebruikersnaam = $_POST['gebruikersnaam'];
        $paswoord = $_POST['paswoord'];

        require_once("connection.php");

        // Zoek gebruiker op
        $sql = "SELECT * FROM tblgebruiker WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$paswoord'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $_SESSION["gebruikersnaam"] = $gebruikersnaam;
            header("Location: shop.php"); // <-- stuur naar shop
            exit();
        } else {
            header("Location: loginform.php?melding=Foutieve gegevens");
            exit();
        }
    }
}
?>
