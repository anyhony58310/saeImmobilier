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
        <h2>Changer de Mot de passse</h2>
        <form>
            <label>Nouveau Mot de passe : </label>
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