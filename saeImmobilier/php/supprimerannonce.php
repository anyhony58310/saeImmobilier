<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page SupprimerAnnonce</title>
    <link rel="stylesheet" href="../style/css/supprimerannonce.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Supprimer l'annonce</h1>
        <form method="post" action="mesannonces.php">
            <label>Êtes vous sure de supprimer l'annonce ?</label>
            <br></br>

            <div className="buttons">
                <button type="button" onclick="location.href='mesannonces.php'">
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