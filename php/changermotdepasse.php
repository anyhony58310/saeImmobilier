<?php
session_start();
require("header.php");
require("fonctions.php");
if(isset($_SESSION["nom"])){
    $connect = true;
}
else{
    $connect = false;
}

?>

<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8" />
    <title>Page ChangerMotDePasse</title>
    <link rel="stylesheet" href="../style/css/changermotdepasse.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Changer de Mot de passse</h1>
        <?php 
            //Cas ou l'utilisateur n'est pas connecté et n'a pas envoyé le formulaire 
            if ($connect==false ){
                echo "Il faut se connecter avant de changer le mot de passe";
            }

            //Cas ou l'utilisateur a envoyé le formulaire
            if(isset($_POST["envo"])){
                //Cas ou l'utilisateur n'est pas connecté
                if($connect==false){
                    echo 
                    "<p class = 'errors' > 
                        Vous devez vous connecter d'abord
                    </p>";
                    header("Location: seConnecter.php");

                }

                // cas ou l'utilisateur est connecté
                else{
                    if()
                    $mysqli = openMaBase();
                }
            }
        ?>

        <form method="post" action="compte.php">
            <label>Nouveau Mot de passe : </label>
            <input type="text" name = "mot_de_passe" value = "<?php if(isset($_POST['mot_de_passe'])){echo $_POST['mot_de_passe'];} ?>" placeholder='test123'></input>
            <br></br>
            <label>Reconfirmer le Mot de passe : </label>
            <input type="text" name = "conf" placeholder='test123' value = "<?php if(isset($_POST['conf'])){echo $_POST['conf'];} ?>" ></input>

            <div className="buttons">
                <button type="button" onclick="location.href='compte.php'">
                    Annuler
                </button>
                <button type="submit" name = "envo" >
                    Confirmer
                </button>
            </div>
        </form>
    </main>
</body>

</html>