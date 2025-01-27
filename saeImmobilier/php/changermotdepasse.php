<?php
session_start(); // Démarre une session PHP pour conserver les données utilisateur
require("fonctions.php"); // Inclut un fichier contenant des fonctions réutilisables

// Vérifie si l'utilisateur est connecté en regardant si son nom est dans la session
if (isset($_SESSION["nom"])) {
    $nom = $_SESSION['nom']; // Récupère le nom de l'utilisateur
    $prenom = $_SESSION['prenom']; // Récupère le prénom de l'utilisateur
    $mail = $_SESSION["mail"]; // Récupère l'email de l'utilisateur
    $connect = true; // Indique que l'utilisateur est connecté
    echo "Vous êtes bien connecté, $nom $prenom avec le email $mail"; // Message de confirmation pour l'utilisateur
} else {
    $connect = false; // Si l'utilisateur n'est pas connecté
}
?>

<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8" />
    <title>Page ChangerMotDePasse</title>
    <link rel="stylesheet" href="../style/css/changermotdepasse.css" /> <!-- Lien vers le fichier CSS -->
</head>

<body>
    <header>
        <Navbar /> <!-- Éventuel composant pour la barre de navigation -->
    </header>
    <main>
        <h1>Changer de Mot de passe</h1>
        <?php 
        // Si l'utilisateur n'est pas connecté, affiche un message d'erreur
        if ($connect == false) {
            echo "<p class='errors'>Il faut se connecter avant de changer le mot de passe</p>";
        }

        // Affiche un message d'erreur spécifique si un problème de mot de passe existe
        if (isset($_SESSION["message"]["erreurMotDePasse"])) {
            echo "<p class='errors'>".$_SESSION["message"]["erreurMotDePasse"]."</p>";
        }
        ?>

<form method="post" action="compte.php"> <!-- Formulaire pour changer le mot de passe -->
            <!-- Champ pour entrer le nouveau mot de passe -->
            <input type="text" name="mot_de_passe" 
                   value="<?php if(isset($_POST['mot_de_passe'])){echo $_POST['mot_de_passe'];}; ?>" 
                   placeholder='     Nouveau Mot de Passe: '>
            </input>

            <!-- Champ pour confirmer le nouveau mot de passe -->
            <input type="text" name="confirm" 
                   placeholder='      Reconfirmer Le Mot de Passe' 
                   value="<?php if(isset($_POST['conf'])){echo $_POST['conf'];}; ?>" >
            </input>

            <!-- Boutons d'annulation et de confirmation -->
            <div class="buttons">
                <!-- Bouton pour annuler et revenir à la page "compte.php" -->
                <button type="button" onclick="location.href='compte.php'">
                    Annuler
                </button>

                <!-- Bouton pour soumettre le formulaire -->
                <button type="submit" name="envoi">
                    Confirmer
                </button>
            </div>
        </form>
    </main>
</body>

</html>



