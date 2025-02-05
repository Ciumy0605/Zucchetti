<?php

include 'database.php';
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['ID_utente'];
$user = $_POST['User'];
$newPassword = $_POST['newPassword'];

// Recupera la password esistente dal database
$query = "SELECT Password FROM utente WHERE ID_utente = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$passwordRow = $result->fetch_assoc();
$password = $passwordRow['Password'];

// Aggiorna la password u ser nel database

if($username != $user) {
    /* $updateUser = "UPDATE `utente` SET `Username` = ? WHERE `utente`.`ID_utente` = ?";
    $updateStmt2 = $conn->prepare($updateUser);
    $updateStmt2->bind_param("si", $user, $id);
    $updateStmt2->execute();
     */
    $sql = "UPDATE utente SET Username='$user' WHERE ID_utente=$id";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    $_SESSION['username'] = $user;
    } else {
    echo "Error updating record: " . $conn->error;
    }
} 

if($newPassword != $password) {
    
    /* $updatePass = "UPDATE `utente` SET `Password` = ? WHERE `utente`.`ID_utente` = ?";
    $updateStmt = $conn->prepare($updatePass);
    $updateStmt->bind_param("si", $newPassword, $id);
    $updateStmt->execute(); */
    $sql2 = "UPDATE utente SET Password='$newPassword' WHERE ID_utente=$id";

    if ($conn->query($sql2) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }
    header("Location: profilo_page.php"); 
}

// da sistemare



