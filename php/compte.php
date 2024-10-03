
<?php sessi ?>

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
            <input type="text" placeholder='Mr.test'></input>
            <br></br>
            <label>Prénom : </label>
            <input type="text" placeholder='test'></input>
            <br></br>
            <label>Email : </label>
            <input type="text" placeholder='test.test@gmail.com'></input>
            <br></br>
            <label>Mot de passe : </label>
            <input type="text" placeholder='test123'></input>
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