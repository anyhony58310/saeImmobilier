<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page ModifierAnnonce</title>
    <link rel="stylesheet" href="../style/css/modifierannonce.css" />
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
                        <b>Modification en cours</b>
                    </div>
                    <div class="buttons">
                        <button type="button" onclick="location.href='mesannonces.php'">
                            Annuler
                        </button>
                        <button type="submit">
                            Confirmer
                        </button>
                    </div>
                    <p><input type="text" name="adresse" placeholder="Adresse Postale" /></p>
                    <p class = "label-prix">Prix:<br/>
                    <input type="number" name="prix"  placeholder="XXX XXX €"></p>
                    <div class="image">
                        Image
                    </div>
                    <p class = "decription">Description:<br/>
                    <textarea name="description" placeholder = "    Ajoutez une description pour tout éventuel détail."></textarea></p>
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