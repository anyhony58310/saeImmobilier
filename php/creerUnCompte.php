<?php 
session_start();
include("fonctions.php");

date_default_timezone_set("Europe/Paris"); 

$date = date("y-m-d");//C'est la date à laquelle l'utilisateur s'est inscrit
$valid = false;// $valid vérifie si les entrées de l'utilisateur sont correctes
$errors = [];// messages d'erreurs

if (isset($_POST["envoi"])) {
    
    // Validation du nom (pas de chiffres ni de caractères spéci)
    if (preg_match('/(\d)|(\W)/', $_POST["nom"])) {
        $errors[] = "Le nom doit seulement contenir des lettres.";
        $valid = false;
    }

    // Validation du prénom (pas de chiffres ni de caractères spéciaux)
    if (preg_match('/(\d)|(\W)/', $_POST["prenom"])) {
        $errors[] = "Le prénom doit seulement contenir des lettres.";
        $valid = false;
    }

    // Validation de l'email avec une expression régulière et si l'email n'est pas déjà utilisé
    // La fonction ChoisirUtilisateur($_POST["mai"], $mysqli) renvoi un tableau contenant les
    // utilisateurs enregistrés dans la base ayant pour email $_POST["mail"]

    $mysqli = openMaBase();//On se connecte à la base
    if ((!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["mai"])) || (count(ChoisirUtilisateur($_POST["mai"], $mysqli))>0)) {
        $errors[] = "E-mail invalide ou déjà utilisé.";
        $valid = false;
    }
    closeMaBase($mysqli); //On ferme la connexion

    // Validation du mot de passe (au moins 8 caractères)
    if (strlen($_POST["mdp"]) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
        $valid = false;
    }

    // Confirmation du mot de passe
    if ($_POST["conf"] !== $_POST["mdp"]) {
        $errors[] = "Le mot de passe doit être reconfirmé.";
        $valid = false;
    }

    
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>Page CreerUnCompte</title>
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Créer un compte</h1>
        <?php
        
        //vérifier qu'il n'y a pas d'erreur au niveau des entrées et que le bouton d'envoi      
        if((count($errors)==0) and (isset($_POST["envoi"]))){
            $valid = true;
        }

        //Si il y a au moins 1 erreur dans le formulaire 
        if (!$valid) {
            echo '<div class="errors">';
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
            echo '</div>';
        } else {


            // Traitement supplémentaire en cas de succès (ex: sauvegarde en base de données)
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $m = $_POST["mai"];  
            $mdp = $_POST["mdp"]; 
             
            $mysqli = openMaBase();//Se connecter à la base 

            //insérer les données du formulaire dans la base
            $requete = "INSERT INTO Utilisateur(nom,prenom, email, mot_de_passe, date_creation_compte) VALUES('$nom','$prenom','$m','$mdp', '$date') ; " ;
            $enregistrer = $mysqli->query($requete);

            closeMaBase($mysqli);

            echo "<p>Inscription réussie !</p>";
           

        }
        
        
        ?>
        <form method="post" action="compteCreerUnCompte.php">

            <input type="text" placeholder="Nom" name="nom" required value = "<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" />
            <input type="text" placeholder="Prénom" name="prenom" required value = "<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"  />
            <input type="email" placeholder="Email" name="mai" required value = "<?php if(isset($_POST['mai'])){echo $_POST['mai'];} ?>" />
            <input type="password" placeholder="Mot de passe" name="mdp" required value = "<?php if(isset($_POST['mdp'])){echo $_POST['mdp'];} ?>" />
            <input type="password" placeholder="Reconfirmer le Mot de passe" name="conf" required value = "<?php if(isset($_POST['conf'])){echo $_POST['conf'];} ?>"/>

            <button type="button" onclick="location.href='compteaccueil.php'">
                Annuler
            </button>

            <button type="submit" name="envoi" >
                Confirmer
            </button>


        </form>
    </main>
</body>

</html>