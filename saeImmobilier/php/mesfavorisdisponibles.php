<!-- Code HTML-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mes Favoris</title>
    <link rel="stylesheet" href="../style/css/mesfavorisdisponibles.css" />
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
                <div class="champs">         
                    <div class = "bande-indicative">
                        <b>Mes Favoris</b>
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
