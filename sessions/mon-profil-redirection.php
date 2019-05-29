<?php
    session_start();
    if (isset($_SESSION['identifiant'])) {
?>
        Mon profil :
        Nom : Test<br>
        Prénom : Test<br>
        Date de naissance : 01/02/1991<br>

<?php
    }
    else {
        // rediriger vers la page de connexion
        header("Location: ../php8-sessions.php");
        exit;
    }
?>