<?php



    include 'database.php';

    // Recupera la password esistente dal database
    session_start();
    $id = $_SESSION['ID_utente'];

    $usernameQuery = "SELECT Username FROM utente WHERE ID_utente = ?";
    $usernameStmt = $conn->prepare($usernameQuery);
    $usernameStmt->bind_param("i", $id);
    $usernameStmt->execute();
    $usernameResult = $usernameStmt->get_result();
    $usernameRow = $usernameResult->fetch_assoc();
    $username = $usernameRow['Username'];


    $NomeQuery = "SELECT Nome, Cognome FROM utente WHERE ID_utente = ?";
    $usernameStmt2 = $conn->prepare($NomeQuery);
    $usernameStmt2->bind_param("i", $id);
    $usernameStmt2->execute();
    $usernameResult2 = $usernameStmt2->get_result();
    $usernameRow2 = $usernameResult2->fetch_assoc();
    $Nome = $usernameRow2['Nome'];
    $Cognome = $usernameRow2['Cognome'];

    $query = "SELECT Password FROM utente WHERE ID_utente = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $passwordRow = $result->fetch_assoc();
    $password = $passwordRow['Password'];

    // Recupera il coordinatore esistente dal database
    $coordinatoreQuery = "SELECT Username FROM coordinatore WHERE ID_coordinatore = (SELECT ID_coordinatore FROM utente WHERE ID_utente = ?)";
    $coordinatoreStmt = $conn->prepare($coordinatoreQuery);

    if ($coordinatoreStmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $coordinatoreStmt->bind_param("s", $id);
    $coordinatoreStmt->execute();
    $coordinatoreResult = $coordinatoreStmt->get_result();
    $coordinatoreRow = $coordinatoreResult->fetch_assoc();

    $coordinatoreNome = $coordinatoreRow['Username'];

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Page</title>
    <link rel="stylesheet" href="profilo_css.css">
    <link rel="stylesheet" href="dipendenti.css">
</head>
<body>
        <nav class="navbar">
            <div class="logo">
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/Logo_blu.png" alt="Logo">
            </div>
            <div class="nav-links" id="nav-links">
                <ul>
                    <li><a href="dipendenti_page.php">Home</a></li>
                    <li><a href="profilo_page.php">Profilo</a></li>                    
                    <li><a href="#">Impostazioni</a></li>
                    <li><a href="#">Scelta 4</a></li>
                    <li class="logout-mobile"><a href="#">Logout</a></li>
                </ul>
            </div>
            <div class="user-info" id="user-info">
                <?php
                    echo "<span class='username'>Bentornato, " . htmlspecialchars($username) . "</span>";
                ?>
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/logout.png" alt="Logout" class="logout-icon" />
            </div>
            <div class="burger" id="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>


    <div class="main-container">
        <div class="card" id="profileCard">
            <div class="profile-img"><img src="https://tse2.mm.bing.net/th?id=OIP.jUthah3A_2D00ZaPUNPTYAHaHe&pid=Api&P=0&h=180" class="profile-img"  alt=""></div>
            <h2><?php echo htmlspecialchars($Nome);?> <?php echo htmlspecialchars($Cognome);?></h2>
            <h2><?php echo htmlspecialchars($coordinatoreNome); ?></h2>
            <input class= "input" type="text" id="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
            <input class= "input" type="password" id="passwordDisplay" value="<?php echo htmlspecialchars($password); ?>" readonly>
            <button class="button" id="editBtn">Modifica</button>
        </div>
        <form action="changeUser_pass.php" method="post" id="editForm">
            <div class="card hidden" id="editCard">
                <div class="profile-img"><img src="https://tse2.mm.bing.net/th?id=OIP.jUthah3A_2D00ZaPUNPTYAHaHe&pid=Api&P=0&h=180" class="profile-img"  alt=""></div>
                    <input class= "input" type="text" id="editUsername" name="User" value="<?php echo htmlspecialchars($username); ?>">
                    <div class="input-container">
                        <input class= "input" type="password" id="oldPassword" placeholder="Vecchia password" required>
                        <span class="toggle-password" onclick="togglePassword('oldPassword', this)">&#128065;</span>
                    </div>
                    <p class="requirement" id="password_errata" style="display: none;color: red;margin-bottom: 0;margin-top: -2px;">Password errata</p>
                    <p class="requirement" id="password_corretta" style="display: none;color: green;margin-bottom: 0;margin-top: -2px;">Password corretta</p>
                    <div class="input-container">
                        <input class= "input" type="password" id="newPassword" placeholder="Nuova password" required>
                        <span class="toggle-password" onclick="togglePassword('newPassword', this)">&#128065;</span>
                    </div>
                    <p class="requirement" id="req-length" >Minimo 8 caratteri</p>
                    <p class="requirement" id="req-uppercase">Almeno 1 maiuscola</p>
                    <p class="requirement" id="req-lowercase">Almeno 1 minuscola</p>
                    <p class="requirement" id="req-number">Almeno 1 numero</p>
                    <p class="requirement" id="req-special">Almeno 1 carattere speciale</p>
                    <div class="input-container">
                        <input class= "input" type="password" id="confirmPassword" name="newPassword" placeholder="Ripeti password" required>
                        <span class="toggle-password" onclick="togglePassword('confirmPassword', this)">&#128065;</span>
                    </div>
                    <p class="error" id="confirmPasswordError"></p>
                    <input class= "button" id="confirmBtn" value="Conferma" type="submit">
                    <button class= "button" id="cancelBtn">Annulla</button>
            </div>
        </form>
        <?php


                    

        ?>

    </div>
    <script src="app.js">
        
    </script>
</body>
</html>