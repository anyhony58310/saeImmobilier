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
        <h2>Supprimer le compte</h2>
        <form>
            <label>Mot de passe : </label>
            <input type="text" placeholder='test123'></input>
            <br></br>
            <label>Reconfirmer le Mot de passe : </label>
            <input type="text" placeholder='test123'></input>
        </form>
        <div className="buttons">
            <button>
                <link to="/">Annuler</link>
            </button>
            <button>
                Confirmer
            </button>
        </div>
    </main>
</body>

</html>