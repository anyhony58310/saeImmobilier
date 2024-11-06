<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page ModifierAnnonce</title>
    <link rel="stylesheet" href="../style/css/modifierannonce.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <h1>Modification en Cours</h1>
        <div>
            <form method="post" action="mesannonces.php">
                <div className="buttons">
                    <button type="button" onclick="location.href='mesannonces.php'">
                        Annuler
                    </button>
                    <button type="submit">
                        Confirmer
                    </button>
                </div>
            </form>
        </div>

    </main>
</body>

</html>