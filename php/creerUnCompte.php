<html>

<head>
    <meta charset="utf-8" />
    <title>inscription</title>
</head>

<body>
    <h3>Créer un compte</h3>
    <form method="post" action="compte.php">

        <input type="text" placeholder="Nom:" />
        <input type="text" placeholder="Prenom:" />
        <input type="text" placeholder="Email:" />
        <input type="text" placeholder="Mot de passe:" />
        <input type="text" placeholder="Reconfirmer le Mot de passe:" />

        <button type="button" onclick="location.href='compteaccueil.php'">
            Annuler
        </button>

        <button type="submit">
            Confirmer
        </button>


    </form>

</body>

</html>