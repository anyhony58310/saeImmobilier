
<?php
session_start(); // Démarre une session PHP pour stocker des données utilisateur
//require("header.php"); // Peut être utilisé pour inclure un header si nécessaire
include("fonctions.php"); // Fichier contenant les fonctions réutilisables
$valid = false; // Indique si la connexion est valide ou non

// Vérifie si le formulaire a été soumis
if (isset($_POST["envoi"])) {
   
    $mysqli = openBase(); // Connexion à la base de données
    // Recherche dans la base l'utilisateur ayant l'email fourni
    $infosUtilisateur = selectUser($_POST["mail"], $mysqli); 
    
    // Si l'email n'existe pas ou est incorrect (selon une expression régulière)
    if ((count($infosUtilisateur) < 0) || (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["mail"]))) {
        // Stocke un message d'erreur dans la session
        $_SESSION["message"]["erreurConnexion"] = "e-mail non trouvé ou incorrect. Ecrivez-le correctement ou veuillez créer un compte";
    } 
    // Si le mot de passe ne correspond pas à celui stocké dans la base de données
    elseif ($infosUtilisateur["mot_de_passe"] != $_POST["mdp"]) {
        // Stocke un message d'erreur indiquant que le mot de passe est incorrect
        $_SESSION["message"]["erreurMotDePasse"] = "<p class = 'errors'>Le mot de passe est incorrect</p>";
    } 
    else {
        $valid = true; // La connexion est valide
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page SeConnecter</title>
    <link rel="stylesheet" href="../style/css/seconnecter.css" /> <!-- Lien vers le fichier CSS -->
</head>

<body>
    <main>
    <h1>Se connecter</h1>

    <?php
    // Message de succès affiché après une inscription réussie
    if ((isset($_SESSION["message"])) && (isset($_SESSION["message"]["inscriptionOk"])) && ($_SESSION["message"]["inscriptionOk"] == true)) {
        echo "Merci pour votre inscription, vous pouvez à présent vous connecter !";
        unset($_SESSION["message"]["inscriptionOk"]); // Supprime le message après affichage
    }
    
    // Si la connexion est valide, initialise la session avec les données utilisateur
    if ($valid) {
        $_SESSION["id"] = $infosUtilisateur["id_utilisateur"]; // ID utilisateur
        $_SESSION["nom"] = $infosUtilisateur["nom"]; // Nom utilisateur
        $_SESSION["prenom"] = $infosUtilisateur["prenom"]; // Prénom utilisateur
        $_SESSION["mail"] = $infosUtilisateur["email"]; // Email utilisateur
        $_SESSION["mdp"] =  $infosUtilisateur["mot_de_passe"]; // Mot de passe utilisateur
        $_SESSION["connect"] = 1; // Indique que l'utilisateur est connecté

        // Stocke les données utilisateur dans des variables
        $nom = $_SESSION["nom"];
        $prenom = $_SESSION["prenom"];
        $mail = $_SESSION["mail"];
        $mdp = $_SESSION["mdp"];
        $connecte = $_SESSION["connect"];

        // Message de bienvenue
        echo "Vous êtes connecté monsieur ou madame $nom $prenom";
    }

    // Affiche les messages d'erreur en cas de problème de connexion
    if (isset($_SESSION["message"]["erreurConnexion"])) {
        echo $_SESSION["message"]["erreurConnexion"];
        unset($_SESSION["message"]["erreurConnexion"]); // Supprime le message après affichage
    }
    
    if (isset($_SESSION["message"]["erreurMotDePasse"])) {
        echo $_SESSION["message"]["erreurMotDePasse"];
        unset($_SESSION["message"]["erreurMotDePasse"]); // Supprime le message après affichage
    }
    
    // Message affiché après la suppression d'un compte
    if (isset($_SESSION["message"]["compte_supprime"])) {
        echo $_SESSION["message"]["compte_supprime"];
        unset($_SESSION["message"]["compte_supprime"]); // Supprime le message après affichage
    }
    ?>

    <form method="post" action="seConnecter.php">
        <!-- Champ pour l'email -->
        <input type="email" name="mail" placeholder="Email:" required value="<?php if(isset($_POST["mail"])){echo $_POST["mail"];} ?>" />
        
        <!-- Champ pour le mot de passe -->
        <input type="password" name="mdp" placeholder="Mot de passe:" required value="<?php if(isset($_POST["mdp"])){echo $_POST["mdp"];} ?>" />

        <!-- Boutons -->
        <div class="buttons">
            <!-- Bouton pour annuler et retourner à l'accueil -->
            <button type="button" onclick="location.href='compteaccueil.php'">Annuler</button>
            
            <!-- Bouton pour rediriger vers la page "Mot de passe oublié" -->
            <button type="button" onclick="location.href='motdepasseoublie.php'">Mot de passe oublié</button>
            
            <!-- Bouton pour soumettre le formulaire -->
            <button type="submit" name="envoi">Confirmer</button>
        </div>
    </form>
    </main>
</body>
</html>



