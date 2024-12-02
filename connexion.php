<?php
session_start();
?>
<script>
    function accueil() {
        window.location.href="./index.php";
    }

    function inscription() {
        window.location.href="./inscription.php";
    }
</script>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="style/connexion.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="containFormulaire">
        <div id="img">
            <h1>CONNEXION</h1>

            <button id="inscription">Vous n'avez pas de compte ?</button>

            <button id="accueil" onclick="accueil()" >ACCUEIL</button>
        </div>
        <div id="formulaire">
            <form id="loginForm" method="POST">
                <p id="result"></p>
                <label for="email">Adresse mail</label>
                <input type="email" id="email" name="email" required>
                <br><br>
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
                <br><br>
                <button type="submit" id="boutonConnexion">CONNEXION</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const email = document.getElementById('email').value;
                const mdp = document.getElementById('mdp').value;

                // Envoi de la requête avec fetch
                fetch('controlleurs/loginController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `email=${encodeURIComponent(email)}&mdp=${encodeURIComponent(mdp)}`
                })
                .then(response => response.json()) // Convertir la réponse en JSON
                .then(data => {
                    console.log(data); // Affiche la réponse dans la console
                    if (data.success) {
                        // Rediriger l'utilisateur si la connexion est réussie
                        window.location.href = data.redirect;
                    } else {
                        // Afficher le message d'erreur
                        document.getElementById('result').innerHTML = data.message;
                    }
                })
                .catch(error => {
                    console.error('Erreur :', error); // Log de l'erreur
                    document.getElementById('result').innerHTML = "Une erreur est survenue lors de la connexion.";
                });
            });
        });
    </script>
</body>
</html>
