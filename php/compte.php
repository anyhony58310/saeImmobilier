
<?php 
session_start(); 
require('header.php');
$est_connect = false

if(isset($_SESSION["connect"] )){
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $mail = $_SESSION["mail"];
    $mot_de_passe = $_SESSION["mdp"];
    $est_connect = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page Compte</title>
    <link rel="stylesheet" href="../style/css/compte.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Votre compte</h1>
        <div>
            <label>Nom : </label>
            <input type="text" placeholder='Nom' name="nom"  />
            <br></br>
            <label>Prénom : </label>
            <input type="text" placeholder='Prénom' name = "prenom" />
            <br></br>
            <label>Email : </label>
            <input type="email" placeholder='test.test@gmail.com' name = "mail" />
            <br></br>
            <label>Mot de passe : </label>
            <input type="password" placeholder='test1235' name = "mdp" />
            <br></br>
        </div>
        <div className="buttons">
            <button type="button" onclick="location.href='supprimerlecompte.php'">
                Supprimer le Compte
            </button>
            <button type="button" onclick="location.href='changermotdepasse.php'">
                Changer de Mot de passe
            </button>
            <button type="button" onclick="location.href='compteaccueil.php'">
                Se Déconnecter
            </button>
        </div>
    </main>
</body>

</html>