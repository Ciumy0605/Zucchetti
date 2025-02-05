<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizza l'input dell'utente
    $username = $_POST['Username'];
    $_SESSION['username'] = $username;
    $password = $_POST['Password'];
    
} 
include 'database.php';

$sql = "SELECT Ruolo FROM utente WHERE username = ? UNION SELECT 'Gestore' AS Ruolo FROM gestore WHERE username = ? UNION SELECT 'Coordinatore' AS Ruolo FROM coordinatore WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $username, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ruolo = $row['Ruolo'];
    $_SESSION['ruolo'] = $ruolo;

    switch ($ruolo) {
        case 'Dipendente':
            header("Location: dipendenti_page.php");
            exit();
        case 'Gestore':
            header("Location: gestore_page.php");
            exit();
        case 'Coordinatore':
            header("Location: coordinatore_page.php");
            exit();
        default:
            echo "Ruolo non riconosciuto.";
            exit();
    }
} else {
    echo "Username o password errati.";
    exit();
}

?>