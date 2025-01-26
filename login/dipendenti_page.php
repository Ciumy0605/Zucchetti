<!-- filepath: /c:/Program Files (x86)/EasyPHP-Devserver-17/eds-www/Zucchetti/login/dipendenti_page.php -->
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
        $Username = $_POST['username'];
    ?>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="logo_bianco.png" alt="Logo" class="logo">
            <?php
                echo "<span class='username'>Bentornato, $Username</span>";
            ?>
        </div>
        <div class="navbar-right">
            <a href="#" class="nav-link">
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/home2.png" alt="Home" class="nav-icon">
                <span class="tooltip">Home</span>
                <span class="nav-text">Home</span>
            </a>
            <a href="#" class="nav-link">
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/user2.png" alt="Profilo" class="nav-icon">
                <span class="tooltip">Profilo</span>
                <span class="nav-text">Profilo</span>
            </a>
            <a href="#" class="nav-link">
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/settings2.png" alt="Impostazioni" class="nav-icon">
                <span class="tooltip">Impostazioni</span>
                <span class="nav-text">Impostazioni</span>
            </a>
            <a href="#" class="nav-link">
                <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/logout.png" alt="Logout" class="nav-icon">
                <span class="tooltip">Logout</span>
                <span class="nav-text">Logout</span>
            </a>
        </div>
        <div class="navbar-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    <!-- sidebar -->
    <!-- <div class="sidebar">
        <ul>
            <li><a href="#"><img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 1"></a></li>
            <li><a href="#"><img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 2"></a></li>
            <li><a href="#"><img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 3"></a></li>
            <li><a href="#"><img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Icona 4"></a></li>
        </ul>
    </div> -->
    
<div class="content">
    <div class="hero">
        <h2>Prenota i tuoi asset</h2>
        <p>Seleziona e prenota facilmente scrivanie, sale riunioni e altro.</p>
    </div>
    <div class="assets">
        <div class="asset-card">
            <img src="https://www.austoni.it/wp-content/uploads/2023/02/sala-riunioni-design.jpg" alt="Scrivania con Monitor">
            <h3>Scrivania con Monitor</h3>
            <p>Prenota una scrivania con monitor per lavorare comodamente.</p>
            <button>Prenota Ora</button>
        </div>
        <div class="asset-card">
            <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Sala Riunioni">
            <h3>Sala Riunioni</h3>
            <p>Riserva una sala riunioni per i tuoi incontri di lavoro.</p>
            <button>Prenota Ora</button>
        </div>
        <div class="asset-card">
            <img src="https://raw.githubusercontent.com/Ciumy0605/Zucchetti/refs/heads/main/icone/desk.png" alt="Scrivania senza Monitor">
            <h3>Scrivania senza Monitor</h3>
            <p>Prenota una scrivania senza monitor per le tue esigenze.</p>
            <button>Prenota Ora</button>
        </div>
    </div>
    <div class="testimonials">
    <h2>Cosa dicono di noi i nostri utenti</h2>
    <div class="testimonial-card">
        <p>"Prenotare una scrivania non è mai stato così facile! Il sistema è intuitivo e veloce."</p>
        <span>- Mario Rossi</span>
    </div>
    <div class="testimonial-card">
        <p>"La possibilità di riservare una sala riunioni in pochi clic ha migliorato la nostra produttività."</p>
        <span>- Laura Bianchi</span>
    </div>
</div>
</div>

<footer class="footer">
    <p>&copy; 2023 La tua azienda. Tutti i diritti riservati.</p>
</footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.navbar-toggle');
            const navbarRight = document.querySelector('.navbar-right');

            toggleButton.addEventListener('click', function() {
                navbarRight.classList.toggle('active');
            });
        });
    </script>
</body>
</html>