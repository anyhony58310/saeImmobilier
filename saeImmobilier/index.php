

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page Accueil</title>
    <link rel="stylesheet" href="./style/css/accueil.css" />
</head>

<body>
    <main> 
        <form method = "post">
            <div class="blanc">
                <div class="question">
                    Quel est votre projet ?
                </div>                
                <div class="options">
                    <div class="option active" id="location">Location</div>
                    <div class="option" id="achat">Achat</div>
                </div>
            </div>
            <div class = "bleu">
                <p>Vous retrouverez ici toutes nos annonces</p>
                <button type="button" onclick="location.href='mesannonces.php'">
                    Voir les annonces
                </button>
            </div>
        </form>
        
    </main>
    <script>
        // Sélection des options
        const options = document.querySelectorAll('.option');

        // Ajout d'un gestionnaire d'événement de clic
        options.forEach(option => {
            option.addEventListener('click', () => {
                // Supprime la classe "active" de toutes les options
                options.forEach(opt => opt.classList.remove('active'));
                
                // Ajoute la classe "active" à l'option cliquée
                option.classList.add('active');
            });
        });
    </script>
</body>

</html>