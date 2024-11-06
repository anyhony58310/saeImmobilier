<?php
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
            if $rkjgeoimjgoijep = oizieuuuuuu,;
            if ($connect==false ){
                echo "Il faut se connecter avant de changer le mot de passe";
            }

            if(isset($_POST["envo"])){
                if($connect==false){
                    echo 
                    "<p class = 'errors' > 
                        Vous devez vous connecter d'abord
                    </p>";
                    header("Location: seConnecter.php");

                }
            }
        ?>

        <form method="post" action="compte.php">
            <label>Nouveau Mot de passe : </label>
            <input type="text" placeholder='test123'></input>
            <br></br>
            <label>Reconfirmer le Mot de passe : </label>
            <input type="text" placeholder='test123'></input>

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