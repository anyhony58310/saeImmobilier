<style>
    header {
        width: 100%;
        height: 15vh;
        background-color: #007198;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        box-sizing: border-box;
    }

    #logo {
        height: 15vh;
        border-radius: 25px;
    }

    #add {
        height: 8vh;
        width: 15%;
        background-color: #04BBFF;
        border: none;
        border-radius: 25px;
        font-size: 2.5vh;
    }

    #imgbutton {
        height: 5vh;
    }
</style>

<script>
    function linkLike() {
        window.location.href="like.php";
    }

    function ajouterAnnonce() {
        window.location.href="ajouteAnnonce.php";
    }

    function bavarder() {
        window.location.href="bavarder.php";
    }

    function connexion() {
        window.location.href="profile.php";
    }
</script>

<header>
    <img id="logo" src="style/lecoin.png" alt="logo"/>
    <button onclick="ajouterAnnonce()" id="add">+ Ajouter</button>
    <img onclick="linkLike()" id="imgbutton" src="style/like.png" alt="like"/>
    <img onclick="bavarder()" id="imgbutton" src="style/bavarder.png" alt="bavarder"/>
    <img onclick="connexion()" id="imgbutton" src="style/connexion.png" alt="connexion"/>
</header>