<?php

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    include 'database.php';

    $sql = "SELECT Ruolo FROM utente WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ruolo = $row['Ruolo'];

        switch ($ruolo) {
            case 'Dipendente':
                echo "<form id='redirectForm' method='post' action='dipendenti_page.php'>
                        <input type='hidden' name='username' value='$username'>
                      </form>
                      <script>document.getElementById('redirectForm').submit();</script>";
                exit();
            case 'Gestore':
                echo "<form id='redirectForm' method='post' action='gestore_page.php'>
                        <input type='hidden' name='username' value='$username'>
                      </form>
                      <script>document.getElementById('redirectForm').submit();</script>";
                exit();
            case 'Coordinatore':
                echo "<form id='redirectForm' method='post' action='coordinatore_page.php'>
                        <input type='hidden' name='username' value='$username'>
                      </form>
                      <script>document.getElementById('redirectForm').submit();</script>";
                exit();
            default:
                echo "Ruolo non riconosciuto.";
                exit();
        }
    } else {
        echo "Username o password errati.";
        exit();
    }

    $conn->close();
?>