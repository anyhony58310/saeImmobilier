

<?php
// Inclure les fonctions pour interagir avec la base de données
require("fonctions.php");

// Vérifie si l'ID de l'annonce est passé en paramètre
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_annonce = intval($_GET['id']); // Assure que l'ID est un entier

    // Connexion à la base de données
    $mysqli = openBase();

    // Requête pour récupérer les détails de l'annonce
    $requete = "SELECT * FROM Annonce WHERE id_annonce = $id_annonce";
    $resultat = $mysqli->query($requete);

    // Vérifie si une annonce correspond à cet ID
    if ($resultat->num_rows > 0) {
        $annonce = $resultat->fetch_assoc(); // Récupère les détails de l'annonce
    } else {
        echo "<p>Annonce introuvable.</p>";
        exit;
    }

    // Ferme la connexion à la base de données
    closeBase($mysqli);
} else {
    echo "<p>Aucun identifiant d'annonce fourni.</p>";
    exit;
}
?>

<!-- annonce.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo htmlspecialchars($annonce['titre']); ?></title>
    <link rel="stylesheet" href="../style/css/annonce.css" />
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
                    <div class="button-annuler">
                        <button type="button" name="retour" onclick="history.back()">
                            Retour
                        </button>
                    </div>
                    <div class = "bleu">

                        
                        <p><h2>
                            <?php echo htmlspecialchars($annonce['titre']); ?>
                            <?php echo htmlspecialchars($annonce['adresse']); ?>
                            </h2>
                        </p>
                        <div class = "icons">
                            <p><?php echo number_format($annonce['prix'], 0, ',', ' '); ?> €</p>
                            <button class="ajouter"><image src = "../image/contour-en-forme-de-coeur.png" class="icon"></image>Ajouter aux favoris</button>
                        </div>
                        <div class="image">
                            <img src="../image/<?php echo $annonce['image']; ?>" alt="Image de l'annonce">
                        </div>
                        <p class = "decription">
                            <?php echo htmlspecialchars($annonce['description']); ?>
                        </p>
                        <?php
                            if(isset($_SESSION["nom"])){
                                echo 
                                "
                                    <div class='buttons'>
                                        <button type='button'>
                                            Supprimer Annonce
                                        </button>
                                        <button type='submit'>
                                            Modifier
                                        </button>
                                    </div>
                                ";
                            }
                        ?>            
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


