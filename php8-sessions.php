<?php
    // on démarre la session en tout premier, avant tout code HTML.
    // obligatoire dans toutes les pages où vous souhaitez
    // utiliser les sessions
    session_start();

    /** LES SESSIONS **/
    // créer une variable de session
    $_SESSION['email'] = "fab@mail.fr";
    //echo $_SESSION['email'];

    // récupérer les données envoyées via le formulaire d'identification
    if (isset($_POST['btn_connect'])) {
        $username = filter_input(INPUT_POST, 'username');
        $pass = filter_input(INPUT_POST, 'password');

        // SELECT * FROM _user WHERE username=:username && password=:password
        // if ($statement->rowCount() == 0) : aucun compte correspond
        // if ($statement->rowCount() == 1) : ok il y a un compte qui correspond
        if ($username == "toto" && $pass == "123") {
            // le compte existe : on connecte en session
            $_SESSION['identifiant'] = $username;
            header('Location: sessions/mon-profil.php');
        }
        else {
            echo "Identifiants / mot de passe incorrect";
        }
    }
?>

<a href="sessions/accueil.php">Accueil</a>
<a href="sessions/mon-profil.php">Mon profil</a>
<a href="sessions/mon-profil-redirection.php">Mon profil avec redirection</a>

<br><br>

<?php
    if (!isset($_SESSION['identifiant'])) {
?>
        <form method="post" action="">
            <input type="text" name="username"/>
            <input type="password" name="password"/>
            <input type="submit" name="btn_connect"/>
        </form>
<?php
    }
    else {
        echo "<a href='sessions/logout.php'>Se déconnecter</a>";
    }
?>