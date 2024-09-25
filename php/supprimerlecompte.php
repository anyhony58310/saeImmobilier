<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page SupprimerLeCompte</title>
    <link rel="stylesheet" href="../style/css/supprimerlecompte.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Supprimer le compte</h1>
        <form method="post" action="compteaccueil.php">
            <label>Mot de passe : </label>
            <input type="text" placeholder='test123'></input>
            <br></br>
            <label>Reconfirmer le Mot de passe : </label>
            <input type="text" placeholder='test123'></input>

            <div className="buttons">
                <button type="button" onclick="location.href='compte.php'">
                    Annuler
                </button>
                <button type="submit">
                    Confirmer
                </button>
            </div>
        </form>
    </main>
</body>

</html>