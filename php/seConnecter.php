<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
</head>

<body>
    Se connecter
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