
<?php 
    session_start(); 
    $_SESSION["title"] = "header"; 
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style/css/header.css" />
    <link rel="stylesheet" href="../style/css/creeruncompte.css" />
    <title> <?php echo $_SESSION["title"]; ?> </title>
</head>

<body>
    <header>
        <div class = "menu" >
            <image class="image" src="../image/logo.png"></image>
            <button type="button" onclick="location.href='deposeruneannonce.php'">
                + Déposer une annonce
            </button>
        </div>
        <div class = "menu">
            <div class = "icone-with-name">
                <image class="icons" src="../image/contour-en-forme-de-coeur.png"></image>
                <label>Mes Favoris</label>
            </div>

            <div class = "icone-with-name">
                <image class="icons" src="../image/haut-parleur.png"></image>
                <label>Mes Annonces</label>
            </div>
            

            <div class = "icone-with-name">
                <image class="icons" src="../image/bavarder.png"></image>
                <label>Mes Messages</label>
            </div>

            <div class = "icone-with-name">
                <image class="icons" src="../image/connexion.png"></image>
                <label>Compte</label>
            </div>
            
            
        </div>
    </header>
    <main>