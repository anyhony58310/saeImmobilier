
<!--compteaccueil.php-->
<?php
session_start(); // Démarre une session pour conserver les données utilisateur
require("fonctions.php"); // Inclut un fichier contenant des fonctions réutilisables

// Nettoyage des messages d'erreur persistants dans la session
if (isset($_SESSION["message"]["erreurConnexion"])) {
    unset($_SESSION["message"]["erreurConnexion"]); // Supprime le message d'erreur de connexion
}
if (isset($_SESSION["message"]["erreurMotDePasse"])) {
    unset($_SESSION["message"]["erreurMotDePasse"]); // Supprime le message d'erreur de mot de passe
}

// Vérifie si le formulaire de suppression de compte a été soumis
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (isset($_POST["supprimer"]))) {
    // Si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['id'])) {
        $_SESSION["message"]["erreurConnexion"] = "Vous devez être connecté pour supprimer le compte";
        header("Location: seConnecter.php"); // Redirige vers la page de connexion
    } 
    // Si le mot de passe est invalide ou ne correspond pas à la confirmation
    else if ((strlen($_POST["mot_de_passe"]) < 8) || ($_POST["mot_de_passe"] != $_POST["confirm"])) {
        $_SESSION["message"]["erreurMotDePasse"] = "<p class='errors'>Le mot de passe doit contenir au moins 8 caractères et être réécrit correctement</p>";
        header("Location: supprimerlecompte.php"); // Redirige vers la page de suppression de compte
    } 
    else {
        $user_id = $_SESSION["id"]; // Récupère l'ID utilisateur depuis la session
        $mysqli = openBase(); // Connexion à la base de données

        // Requêtes SQL pour supprimer l'utilisateur et ses données associées
        $requete1 = "DELETE FROM utilisateur WHERE id_utilisateur = '$user_id'"; // Supprime l'utilisateur
        $requete2 = "DELETE FROM critere WHERE id_cree_par_utilisateur = '$user_id'"; // Supprime les critères associés
        $requete3 = "DELETE FROM annonce_critere JOIN annonce ON (annonce_critere.id_annonce = annonce.id_annonce) 
            WHERE annonce.id_cree_par_utilisateur = '$user_id'"; // Supprime les relations annonce-critère
        $requete4 = "DELETE FROM annonce WHERE id_cree_par_utilisateur='$user_id'"; // Supprime les annonces créées par l'utilisateur

        // Exécution des requêtes
        $suppr = $mysqli->query($requete1); // Suppression de l'utilisateur (et des données associées via les autres requêtes)
        closeBase($mysqli); // Ferme la connexion à la base de données

        // Détruit la session après suppression
        session_destroy();
        session_start(); // Redémarre une session pour afficher un message de confirmation
        $_SESSION["message"]["compte_supprime"] = "<p>Votre compte a été supprimé avec succès.</p>";
        header("Location: seConnecter.php"); // Redirige vers la page de connexion
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page CompteAccueil</title>
    <link rel="stylesheet" href="../style/css/compteaccueil.css" /> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <main>
        <h1>Connectez-vous à votre Compte</h1>
        <div class="buttons">
            <!-- Bouton pour créer un nouveau compte -->
            <button type="button" onclick="location.href='creeruncompte.php'">
                Créer un compte
            </button>
            <!-- Bouton pour se connecter -->
            <button type="button" onclick="location.href='seconnecter.php'">
                Se connecter
            </button>
        </div>
    </main>
</body>
</html>



