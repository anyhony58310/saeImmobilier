<?php
    session_start();

    if (!isset($_SESSION['utilisateur_connecte'])) {
        header('Location: connexion.php');
        exit();
    } else {
        echo "Bienvenue, utilisateur connecté !" . $_SESSION['utilisateur_connecte'];
    }
?>

<form action="controlleurs/deconnexion.php" method="POST">
    <button>DECONNEXION</button>
</form>