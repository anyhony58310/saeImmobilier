
<?php 
session_start(); // Démarre une session PHP pour conserver les données utilisateur
include("fonctions.php"); // Inclut un fichier contenant des fonctions réutilisables
date_default_timezone_set("Europe/Paris"); // Définit le fuseau horaire sur "Europe/Paris"
$date = date("y-m-d"); // Récupère la date actuelle sous le format "année-mois-jour"
$valid = false; // Cette variable détermine si les données du formulaire sont valides
$errors = []; // Tableau contenant les messages d'erreurs

// Vérifie si le formulaire a été soumis
if (isset($_POST["envoi"])) {
    $valid = true; // Par défaut, on considère que le formulaire est valide

    // Validation du champ "nom" (le nom ne doit pas contenir de chiffres ou de caractères spéciaux)
    if (preg_match('/(\d)|(\W)/', $_POST["nom"])) {
        $errors[] = "Le nom doit seulement contenir des lettres."; // Ajoute une erreur si invalide
        $valid = false; // Le formulaire est invalide
    }

    // Validation du champ "prénom" (idem au nom)
    if (preg_match('/(\d)|(\W)/', $_POST["prenom"])) {
        $errors[] = "Le prénom doit seulement contenir des lettres."; // Ajoute une erreur si invalide
        $valid = false;
    }

    // Validation de l'email
    // Vérifie que l'email a un format valide et qu'il n'est pas déjà utilisé dans la base de données
    $mysqli = openBase(); // Connexion à la base de données
    if ((!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["mai"])) || (count(selectUser($_POST["mai"], $mysqli)) > 0)) {
        $errors[] = "E-mail invalide ou déjà utilisé."; // Ajoute une erreur si l'email est invalide ou existant
        $valid = false;
    }
    closeBase($mysqli); // Fermeture de la connexion à la base de données

    // Validation du mot de passe (au moins 8 caractères)
    if (strlen($_POST["mdp"]) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères."; // Ajoute une erreur si le mot de passe est trop court
        $valid = false;
    }

    // Validation de la confirmation du mot de passe (les deux doivent correspondre)
    if ($_POST["conf"] !== $_POST["mdp"]) {
        $errors[] = "Le mot de passe doit être reconfirmé."; // Ajoute une erreur si les mots de passe ne correspondent pas
        $valid = false;
    }
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>Page CreerUnCompte</title>
    <link rel="stylesheet" href="../style/css/creeruncompte.css" /> <!-- Lien vers le fichier CSS -->
</head>

<body>
    <main>
        <h1>Créer un compte</h1>
        <?php
        
        // Si le formulaire est invalide, affiche les erreurs
        if (!$valid) {
            echo '<div class="errors">'; // Conteneur des messages d'erreurs
            foreach ($errors as $error) {
                echo "<p>$error</p>"; // Affiche chaque erreur
            }
            echo '</div>';
        } else {
            // Si le formulaire est valide, enregistre les données dans la base de données
            $nom = $_POST["nom"]; // Récupère le nom depuis le formulaire
            $prenom = $_POST["prenom"]; // Récupère le prénom
            $m = $_POST["mai"]; // Récupère l'email
            $mdp = $_POST["mdp"]; // Récupère le mot de passe
            
            $mysqli = openBase(); // Connexion à la base de données

            // Insère les données utilisateur dans la table "Utilisateur"
            $requete = "INSERT INTO Utilisateur(nom,prenom, email, mot_de_passe, date_creation_compte) 
                        VALUES('$nom','$prenom','$m','$mdp', '$date');";
            $enregistrer = $mysqli->query($requete); // Exécute la requête SQL

            closeBase($mysqli); // Ferme la connexion à la base de données

            // Stocke un message de succès dans la session
            $_SESSION['message']['inscriptionOk'] = true;

            sleep(5); // Attend 5 secondes avant la redirection
            header("Location: seConnecter.php"); // Redirige l'utilisateur vers la page de connexion
        }
        ?>
        <form method="post" action="creerUnCompte.php">
            <!-- Champs de formulaire avec valeurs persistantes -->
            <input type="text" placeholder="Nom" name="nom" required value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" />
            <input type="text" placeholder="Prénom" name="prenom" required value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" />
            <input type="email" placeholder="Email" name="mai" required value="<?php if(isset($_POST['mai'])){echo $_POST['mai'];} ?>" />
            <input type="password" placeholder="Mot de passe" name="mdp" required value="<?php if(isset($_POST['mdp'])){echo $_POST['mdp'];} ?>" />
            <input type="password" placeholder="Reconfirmer le Mot de passe" name="conf" required value="<?php if(isset($_POST['conf'])){echo $_POST['conf'];} ?>" />
            
            <!-- Boutons d'annulation et de confirmation -->
            <div class="buttons">
                <button type="button" onclick="location.href='compteaccueil.php'">Annuler</button>
                <button type="submit" name="envoi">Confirmer</button>
            </div>
        </form>
    </main>
</body>

</html>




