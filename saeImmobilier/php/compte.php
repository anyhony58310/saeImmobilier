


<?php 
session_start(); // Démarre une session pour conserver les données utilisateur
$connect = false; // Indique si l'utilisateur est connecté ou non
require("fonctions.php"); // Inclut un fichier contenant des fonctions réutilisables

// Vérifie si une action de déconnexion a été envoyée via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_destroy(); // Détruit toutes les données de la session
    echo "Tu es déconnecté"; // Message de confirmation
    $connect = false; // L'utilisateur n'est plus connecté
}

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION["connect"])) {
    $nom = $_SESSION["nom"]; // Récupère le nom depuis la session
    $prenom = $_SESSION["prenom"]; // Récupère le prénom
    $mail = $_SESSION["mail"]; // Récupère l'email
    $mot_de_passe = $_SESSION["mdp"]; // Récupère le mot de passe
    $connect = true; // Indique que l'utilisateur est connecté
}

// Si le formulaire pour changer le mot de passe a été soumis
if (isset($_POST["envoi"])) {
    $mdp = $_POST["mot_de_passe"]; // Nouveau mot de passe
    $confirm = $_POST["confirm"]; // Confirmation du mot de passe

    // Si l'utilisateur n'est pas connecté
    if ($connect == false) {
        $_SESSION["message"]["erreurConnexion"] = "<p class='errors'>Vous devez vous connecter avant de changer le mot de passe</p>";
        sleep(5); // Pause de 5 secondes pour que l'utilisateur voie le message
        header("Location: seConnecter.php"); // Redirige vers la page de connexion
    } 
    // Si l'utilisateur est connecté
    else {
        // Vérifie que le mot de passe est valide (au moins 8 caractères et confirmation correcte)
        if ((strlen($mdp) < 8) || ($mdp != $confirm)) {
            $_SESSION["message"]["erreurMotDePasse"] = "<p class='errors'>Le mot de passe doit contenir au moins 8 caractères et être réécrit correctement</p>";
            sleep(5); // Pause pour que l'utilisateur voie le message
            header("Location: changermotdepasse.php"); // Redirige vers la page pour changer le mot de passe
        } 
        else {
            // Met à jour le mot de passe de l'utilisateur dans la base de données
            $mysqli = openBase(); // Connexion à la base de données
            $requete = "UPDATE utilisateur SET mot_de_passe = '$mdp' WHERE email='$mail'"; // Requête SQL pour modifier le mot de passe
            $modif = $mysqli->query($requete); // Exécute la requête
            $_SESSION["message"]["modificationMotDePasse"] = "Votre mot de passe a bien été modifié"; // Message de succès
            $_SESSION["mdp"] = $mdp; // Met à jour le mot de passe dans la session
            sleep(10); // Pause de 10 secondes
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page Compte</title>
    <link rel="stylesheet" href="../style/css/compte.css" /> <!-- Fichier CSS pour styliser la page -->
</head>

<body>
    <header>
        <Navbar /> <!-- Barre de navigation, probablement une inclusion dynamique -->
    </header>
    <main>
        <h1>Votre compte</h1>
        <div>
            <p>
                <?php 
                // Affiche un message de succès après la modification du mot de passe
                if (isset($_SESSION["message"]["modificationMotDePasse"])) {
                    echo $_SESSION["message"]["modificationMotDePasse"];
                    unset($_SESSION["message"]["modificationMotDePasse"]); // Supprime le message après affichage
                } 
                ?>  
            </p>
            
            <!-- Champs contenant les informations utilisateur -->
            <input type="text" placeholder="Nom" name="nom" value="<?php if($connect){echo $nom; }; ?>" />
            <br><br>
            
            <input type="text" placeholder="Prénom" name="prenom" value="<?php if($connect){echo $prenom;}; ?>" />
            <br><br>
            
            <input type="email" placeholder="test.test@gmail.com" name="mail" value="<?php if($connect){echo $mail;}; ?>" />
            <br><br>
            
            <input type="password" placeholder="test1235" name="mdp" value="<?php if($connect){echo $mot_de_passe;}; ?>" />
            <br><br>
        </div>
        
        <!-- Boutons d'action -->
        <div class="buttons">
            <!-- Bouton pour supprimer le compte -->
            <button name="suppr" type="button" onclick="location.href='supprimerlecompte.php'">
                Supprimer le Compte
            </button>

            <!-- Bouton pour modifier le mot de passe -->
            <button name="modifier" type="button" onclick="location.href='changermotdepasse.php'">
                Changer de Mot de passe
            </button>

            <!-- Bouton pour se déconnecter -->
            <button name="deconnecter" type="button" onclick="logout()">
                Se Déconnecter
            </button>

            <!-- Script JavaScript pour gérer la déconnexion -->
            <script>
                function logout() {
                    // Crée dynamiquement un formulaire
                    const form = document.createElement('form');
                    form.method = 'POST'; // Envoie le formulaire en méthode POST
                    form.action = 'compte.php'; // Soumet le formulaire à cette même page

                    // Ajoute un champ caché pour spécifier l'action "logout"
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = 'action';
                    hiddenField.value = 'logout';
                    form.appendChild(hiddenField); // Ajoute le champ au formulaire

                    document.body.appendChild(form); // Ajoute le formulaire au corps de la page
                    form.submit(); // Soumet le formulaire
                }
            </script>
        </div>
    </main>
</body>

</html>



