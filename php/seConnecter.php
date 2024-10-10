
<?php
session_start();
include("fonctions.php");
$valid = false;
$errors = []; 

if(isset($_POST["envoi"])){

    
    $mysqli = openMaBase(); //On se connecte à la base de données  
    $infosUtilisateur = ChoisirUtilisateur($_POST["mail"], $mysqli); //On cherche l'utilisateur dans la base ayant pour email $_POST["mail"]
    
    //Si aucun utilisateur dans la base n'a pour email $_POST["mail"](e-mail entré par l'utilisateur)
    if((count($infosUtilisateur)<0) || (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["mail"]))) {
        $errors[] = "e-mail non trouvé ou incorrect. Ecrivez-le correctement ou veuillez créer un compte";
    }
    elseif($infosUtilisateur["mot_de_passe"]!=$_POST["mdp"]){
        $errors[] = "Mot de passe incorrect";
    }
    else{
        $valid = true; 
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page SeConnecter</title>
    <link rel="stylesheet" href="../style/css/seconnecter.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <h1>Se connecter</h1>

    <?php 
    if(!$valid)
    {
        echo '<div class="errors">';
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        echo '</div>';
    }
    else{
        $_SESSION["nom"] = $infosUtilisateur["nom"];
        $_SESSION["prenom"] = $infosUtilisateur["prenom"];
        $_SESSION["mail"] = $infosUtilisateur["prenom"];
        $_SESSION["mdp"] =  $infosUtilisateur["mot_de_passe"];
        $_SESSION["connect"] = 1;

        $nom = $_SESSION["nom"];
        $prenom = $_SESSION["prenom"];
        $mail = $_SESSION["mail"];
        $mdp = $_SESSION["mdp"];
        $connecte = $_SESSION["connect"]
        echo "Vous êtes connecté monsieur ou madame";
    }

        
    

    ?>

    <form method="post" action="seConnecter.php">
        

        <input type="email" name="mail" placeholder="Email:" required value = "<?php if(isset($_POST["mail"])){echo $_POST["mail"];}  ?>" />
        <input type="password"  name="mdp"  placeholder="Mot de passe:" required value = "<?php if(isset($_POST["mdp"])){echo $_POST["mdp"];}  ?>" />

        <button type="button" onclick="location.href='compteaccueil.php'">
            Annuler
        </button>
        <button type="button" onclick="location.href='motdepasseoublie.php'" >
            Mot de passe oublié
        </button>
        <button type="submit" name = "envoi" >
            Confirmer
        </button>

    </form>
</body>

</html>