

<!-- lesannonces.php-->

<?php
// Inclure les fonctions pour interagir avec la base de données
require("fonctions.php");

// Connexion à la base de données
$mysqli = openBase();

// Requête pour récupérer toutes les annonces
$requete = "SELECT * FROM Annonce ORDER BY date_creation_annonce DESC";
$resultat = $mysqli->query($requete);

// Ferme la connexion à la base de données
closeBase($mysqli);
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Les Annonces</title>
    <link rel="stylesheet" href="../style/css/lesannonces.css" />
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css"/>
    <script src="https://js.arcgis.com/4.28/"></script>
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <div id="form">

            <form method="post" action="mesannonces.php">
                <table class="search-table">
                    <tr class="dropdown">
                        <td class="dropdown-cell">
                            <button class="dropdown-button">Location <span>▼</span></button>
                        </td>
                        <td class="input-cell">
                            <input type="text" placeholder="Dans quel ville, un code postal ?">
                        </td>
                    </tr>
                    <tr class="inputs">
                        <td class="case-blanche"></td>
                        <td class="input-cell">
                            <input type="number" placeholder="Votre budget max ?">
                        </td>
                    </tr>
                </table>
                <div class="champs">
                    <div class="buttons">
                        <p>
                            <span>▼</span>  Afficher plus de critères
                        </p>
                        <button type="submit">
                            Modifier ma recherche
                        </button>
                    </div>          
                    <div class = "bande-indicative">
                        <b>XXX XXX Annonces trouvées</b>
                    </div>
                    
                    <div class = "bleu">
                    <!--Afficher les cartes -->

                        <div class="card">
                            <div class="image">Image</div>
                                <div class="info">
                                    <p>Maison 3 pièces 100 m²<br>58000 Nevers à L’Epine Guyon</p>
                                    <div class="price-favorite">
                                        <p>xxx xxx €</p>
                                        <div class="favorite">
                                            <span>6</span>
                                            <img src="../image/heart.png" alt="Icône coeur">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card">
                            <div class="image">Image</div>
                                <div class="info">
                                    <p>Maison 3 pièces 100 m²<br>58000 Nevers à L’Epine Guyon</p>
                                    <div class="price-favorite">
                                        <p>xxx xxx €</p>
                                        <div class="favorite">
                                            <span>6</span>
                                            <img src="../image/heart.png" alt="Icône coeur">
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <!--Affichage Itératif-->
                        <?php
                            if ($resultat->num_rows > 0) {
                                // Parcourir les annonces récupérées
                                while ($annonce = $resultat->fetch_assoc()) {
                                    ?>
                                    <div class="card">
                                        <a href="annonce.php?id=<?php echo $annonce['id_annonce']; ?>"> 
                                            <div class="image">
                                                <img src="../image/<?php echo $annonce['image']; ?>" alt="Image de l'annonce">
                                            </div>
                                            <div class="info">
                                                <p>
                                                    <?php echo $annonce['titre']; ?><br>
                                                    <?php echo $annonce['adresse']; ?>
                                                </p>
                                                <div class="price-favorite">
                                                    <p><?php echo number_format($annonce['prix'], 0, ',', ' '); ?> €</p>
                                                    <div class="favorite">
                                                        <span>♥</span> <!-- Vous pouvez ajouter une vraie fonctionnalité de favoris plus tard -->
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                            }
                            } else {
                                // Si aucune annonce n'est trouvée
                                echo "<p>Aucune annonce disponible pour le moment.</p>";
                            }
                        ?>
    
                        <!--Fin de l'affichage-->



                    <!--Au moins 6 (2 par 2 sur chaque ligne)-->
                    </div>
                </div>

            </form>
        </div>
        <div id="map">
            <div id="viewDiv"></div>
        </div>
        <script>
        require([
            "esri/Map",
            "esri/views/MapView",
            "esri/Graphic",
        ], function(Map, MapView, Graphic) {
            const map = new Map({
                basemap: "streets-navigation-vector"
            });

            const view = new MapView({
                container: "viewDiv",
                map: map,
                center: [-118.805, 34.027], // Coordonnées de l'adresse
                zoom: 15
            });

            // Ajouter un point sur la carte
            const point = {
                type: "point",
                longitude: -118.805,
                latitude: 34.027
            };

            const markerSymbol = {
                type: "simple-marker",
                color: "red",
                size: "8px"
            };

            const pointGraphic = new Graphic({
                geometry: point,
                symbol: markerSymbol
            });

            view.graphics.add(pointGraphic);
        });
    </script>

    </main>
</body>

</html>
