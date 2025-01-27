<?php
session_start();
$poropk = 5784232;

$popcdlkdls =8984895;
$opopkepo =090859;
$oidojijfidojdioerho = 909093;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page SupprimerLeCompte</title>
    <link rel="stylesheet" href="../style/css/supprimerlecompte.css" /> <!-- Lien vers le fichier CSS -->
</head>

<body>
    <header>
        <Navbar /> <!-- Éventuel composant pour une barre de navigation -->
    </header>
    <main>
        <h1>Supprimer le compte</h1>

        <?php
        // Vérifie si un message d'erreur lié au mot de passe existe dans la session
        if (isset($_SESSION["message"]["erreurMotDePasse"])) {
            // Affiche le message d'erreur
            echo $_SESSION["message"]["erreurMotDePasse"];

            // Supprime le message d'erreur après l'avoir affiché
            unset($_SESSION["message"]["erreurMotDePasse"]);
        }
        ?>

<form method="post" action="compteaccueil.php"> <!-- Envoie les données vers la page "compteaccueil.php" -->

<!-- Champ pour entrer le mot de passe -->
<input type="text" name="mot_de_passe" placeholder='    Mot de passe :'></input>

<!-- Champ pour confirmer le mot de passe -->
<input type="text" name="confirm" placeholder='    Reconfirmer le Mot de passe :'></input>

<!-- Boutons d'annulation et de confirmation -->
<div class="buttons">
    <!-- Bouton pour annuler la suppression et revenir à la page compte -->
    <button type="button" onclick="location.href='compte.php'">
        Annuler
    </button>

    <!-- Bouton pour confirmer la suppression -->
    <button type="submit" name="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le compte ?')">
        Confirmer
    </button>
</div>
</form>
</main>
</body>

</html>


