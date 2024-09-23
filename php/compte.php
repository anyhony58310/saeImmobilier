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
        <h2>Votre compte</h2>
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
            <label>Reconfirmer le Mot de passe : </label>
            <input type="text" placeholder='test123'></input>
        </div>
        <div className="buttons">
            <button>
                <link to="/">Supprimer le Compte</link>
            </button>
            <button>
                <link to="/">Changer de Mot de passe</link>
            </button>
            <button>
                Se Déconnecter
            </button>
        </div>
    </main>
</body>

</html>