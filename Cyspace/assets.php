<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dipendenti.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $username = $_SESSION['username'];

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

        <!-- sidebar -->
        <button id="toggleSidebar">▶</button>
        <div class="sidebar2">
            <ul>
                <li>
                    <a href="#">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.1w0hphYYQsT_aFyToL9-jgHaFj&pid=Api&P=0&h=180" alt="Icona 1">
                        <span class="tooltip">Terzo Piano</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 2">
                        <span class="tooltip">Secondo Piano</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 3">
                        <span class="tooltip">Primo Piano</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 4">
                        <span class="tooltip">Parcheggio</span>
                    </a>
                </li>
            </ul>
        </div>

        <button id="toggleSidebar">&#9654;</button>
        <div class="container">
            <div class="date-picker">
                <label for="booking-date">Seleziona Data: </label>
                <input type="date" id="booking-date">
            </div>
            <div class="planimetria">
                <div class="asset" style="top: 20%; left: 30%;" data-asset="Scrivania con Monitor">
                    <img src="working.png" alt="Scrivania con Monitor">
                    <div class="tooltip2">Scrivania con Monitor</div>
                </div>
                <div class="asset" style="top: 50%; left: 60%;" data-asset="Sala Riunioni">
                    <img src="working.png" alt="Sala Riunioni">
                    <div class="tooltip2">Sala Riunioni</div>
                </div>
                <!-- Aggiungi altri asset qui -->
            </div>
            <div class="overlay"></div>
            <div class="booking-form">
                <h3>Prenota Asset</h3>
                <p id="selected-asset"></p>
                <input type="time" id="booking-time" required>
                <button id="confirm-booking">Prenota</button>
            </div>
        </div>


    <script>
    document.querySelectorAll('.asset').forEach(asset => {
        asset.addEventListener('click', function() {
            const assetName = this.getAttribute('data-asset');
            document.getElementById('selected-asset').innerText = assetName;
            document.querySelector('.booking-form').style.display = 'block';
            document.querySelector('.overlay').style.display = 'block';
        });
    });

    document.querySelector('.overlay').addEventListener('click', function() {
        document.querySelector('.booking-form').style.display = 'none';
        this.style.display = 'none';
    });

    document.getElementById('confirm-booking').addEventListener('click', function() {
        const date = document.getElementById('booking-date').value;
        const time = document.getElementById('booking-time').value;
        if (date && time) {
            alert(`Prenotazione confermata per il ${date} alle ${time}`);
            document.querySelector('.booking-form').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
        } else {
            alert('Seleziona una data e un orario validi.');
        }
    });
    </script>
        <script src="app.js">
        
        </script>
</body> 
</html>