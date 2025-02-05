
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipendenti Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="dipendenti.css">
</head>
<body>
    <?php
        include 'database.php';
        session_start();
        $userna = $_SESSION['username'];

        $query = "SELECT ID_utente FROM utente WHERE Username = ?";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("s", $userna);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $id_utente = $row['ID_utente'];
        
        // Salva l'ID utente nella sessione
        $_SESSION['ID_utente'] = $id_utente;
        
        $query = "SELECT Username FROM utente WHERE ID_utente = ?";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("i", $id_utente);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $username = $row['Username'];

        $_SESSION['username'] = $username;

    ?>
    
        <nav class="navbar">
            <div class="logo">
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/Logo_blu.png" alt="Logo">
            </div>
            <div class="nav-links" id="nav-links">
                <ul>
                    <li><a href="dipendenti_page.php">Home</a></li>
                    <li><a href="profilo_page.php">Profilo</a></li>                    
                    <li><a href="assets.php">Assets</a></li>
                    <li><a href="#">Impostazioni</a></li>
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
        

        <button id="toggleSidebar">&#9654;</button>
        <div id="sidebar" class="sidebar">
            <h2>Prenotazione</h2>
                <div class="booking-section">
                    <div class="booking-box">
                        <p><strong>Nome:</strong> Mario Rossi</p>
                    <p><strong>Data:</strong> 10 Febbraio 2025</p>
                    <p><strong>Orario:</strong> 14:30</p>
                    <div class="buttons">
                        <button class="modify">Modifica</button>
                        <button class="delete">Elimina</button>
                    </div>
                </div>
                <div class="booking-box">
                    <p><strong>Nome:</strong> Mario Rossi</p>
                    <p><strong>Data:</strong> 10 Febbraio 2025</p>
                    <p><strong>Orario:</strong> 14:30</p>
                    <div class="buttons">
                        <button class="modify">Modifica</button>
                        <button class="delete">Elimina</button>
                    </div>
                </div>
                <div class="booking-box">
                    <p><strong>Nome:</strong> Mario Rossi</p>
                    <p><strong>Data:</strong> 10 Febbraio 2025</p>
                    <p><strong>Orario:</strong> 14:30</p>
                    <div class="buttons">
                        <button class="modify">Modifica</button>
                        <button class="delete">Elimina</button>
                    </div>
                </div>
            </div>
            <h2>Ricerche Recenti</h2>
            <div class="recent-searches-section">
                <ul class="recent-searches">
                    <li>RICERCA</li>
                    <li>RICERCA</li>
                    <li>RICERCA</li>
                    <li>RICERCA</li>
                    <li>RICERCA</li>
                    <li>RICERCA</li>
                    <li>RICERCA</li>
                </ul>
            </div>
        </div>

    
    



    <!-- <footer class="footer">
        <p>&copy; 2025 La tua azienda. Tutti i diritti riservati.</p>
    </footer> -->

    <script src= "app.js"></script>
</body>
</html>