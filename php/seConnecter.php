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
    <form method="post" action="compte.php">

        <input type="text" placeholder="Email:" />
        <input type="text" placeholder="Mot de passe:" />

        <button type="button" onclick="location.href='compteaccueil.php'">
            Annuler
        </button>
        <button type="button" onclick="location.href='motdepasseoublie.php'">
            Mot de passe oublié
        </button>
        <button type="submit">
            Confirmer
        </button>

    </form>
</body>

</html>