
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['gebruikersnaam']) && isset($_POST['paswoord'])) {
        $gebruikersnaam = $_POST['gebruikersnaam'];
        $paswoord = $_POST['paswoord'];

        require_once("connection.php");

        // VEILIGE MANIER: Prepared Statement gebruiken
        $stmt = $conn->prepare("SELECT * FROM tblgebruiker WHERE gebruikersnaam = ?");
        $stmt->bind_param("s", $gebruikersnaam);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Vergelijk wachtwoord direct 
            if ($paswoord === $row['wachtwoord']) {
                $_SESSION["gebruikersnaam"] = $gebruikersnaam;
                $_SESSION['rol'] = $row['rol'];
                header("Location: shop.php");
                exit();
            } else {
                header("Location: loginform.php?melding=Foutieve gegevens");
                exit();
            }
        } else {
            header("Location: loginform.php?melding=Foutieve gegevens");
            exit();
        }
        
        $stmt->close();
    }
}
?>