<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>annonces</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style/annonces.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    </head>

    <body>
        <?php
            include 'navigation.php';
        ?>

        <main>
            <div class="annonces">
                <div class="grille"></div>
            </div>
            <div class="map" id="map">
                <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            </div>
        </main>
        <script>
            // Initialisation de la carte après le chargement de la page
            document.addEventListener('DOMContentLoaded', () => {
                // Création de la carte dans l'élément avec l'ID "map"
                const map = L.map('map').setView([48.8566, 2.3522], 10); // Coordonnées de Paris

                // Ajouter des tuiles OpenStreetMap à la carte
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            });
            </script>
    </body>
</html>
<script>
    function detailAnnonce() {
        window.location.href= "detailAnnonce.php";
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('controlleurs/annoncesController.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur lors de la récupération des données');
                }
                return response.json();
            })
            .then(data => {
                const annoncesContainer = document.querySelector('.grille');
                
                data.forEach(annonce => {
                    const container = document.createElement('div');
                    container.classList.add('annonce-item');

                    const premiereImage = annonce.images && annonce.images.length > 0
                    ? annonce.images[0]
                    : 'noImage.jpg';

                    container.innerHTML = `
                        <img class="image" src="style/${premiereImage}" alt="Image de ${annonce.titre}">
                        <h2>${annonce.titre}</h2>
                        <div class="informations">
                            <p>${annonce.prix} €</p>
                            <p id="ville">${annonce.ville}</p>
                        </div>
                    `;
                    annoncesContainer.appendChild(container);
                });
            })
            .catch(error => console.error('Erreur:', error));
    });
</script>