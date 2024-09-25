<html>

<head>
    <meta charset="utf-8" />
    <title>Page CreerUnCompte</title>
    <link rel="stylesheet" href="../style/css/creeruncompte.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Créer un compte</h1>
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
    </main>
</body>

</html>