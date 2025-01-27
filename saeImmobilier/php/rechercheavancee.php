<?php session_start(); ?>

<!--Question à poser: dans le formulaire de recherche (fichier rechercheavancee.php) lorsqu'on appuye sur le boutton ça doit nous ramener sur la page listeannonces.php et filtrer les annonces selon ce qui a été mis dans le formulaire  -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher une annonce</title>
    <link rel="stylesheet" href="../style/css/rechercheavancee.css"> <!-- Lien vers ton fichier CSS -->
</head>
<body>
    <header>
        Déposer une annonce
    </header>
    <main>
        <form method="post" action="traiterannonce.php">
            <!-- PARTIE 1 : Type de bien et informations principales -->
                <?php
                    if(isset($_SESSION["message"]["depot"])){
                        echo $_SESSION["message"]["depot"];
                        echo "Annonce prise en compte";
                        unset($_SESSION["message"]["depot"]) ;
                    }
                    
                ?>
                <a href="./lesannonces.php"><span>▲</span>Cachez plus de critères</a>
                <h2>Type de bien</h2>
                <div class="type-bien">
                    <div class="option"><input type="radio" name="type_bien" value="maison" > Maisons</div>
                    <div class="option"><input type="radio" name="type_bien" value="appartement"> Appartement</div>
                    <div class="option"><input type="radio" name="type_bien" value="terrain"> Terrain</div>
                    <div class="option"><input type="radio" name="type_bien" value="loft"> Loft</div>
                    <div class="option"><input type="radio" name="type_bien" value="chateau"> Château</div>
                    <div class="option"><input type="radio" name="type_bien" value="batiment"> Bâtiment</div>
                    <div class="option"><input type="radio" name="type_bien" value="immeuble"> Immeuble</div>
                    <div class="option"><input type="radio" name="type_bien" value="boutique"> Boutique</div>
                    <div class="option"><input type="radio" name="type_bien" value="divers"> Divers</div>
                </div>
                
                
                

                <h2><label for="localisation">Où recherchez-vous ?</label></h2>
                <input type="text" id="localisation" name="localisation" placeholder="Dans quelle ville, un code postal ou un quartier ?" >
                
                <div class="champ">
                    <label>Pour quel budget ?</label>
                    <div class="ligne">
                        <div class="groupe">
                            <label for="budget-min">Min :</label>
                            <input type="number" id="budget-min" placeholder="Min">
                            <span>€</span>
                        </div>
                        <div class="groupe">
                            <label for="budget-max">Max :</label>
                            <input type="number" id="budget-max" placeholder="Max">
                            <span>€</span>
                        </div>
                    </div>
                </div>

                <div class="champ">
                    <label>Pour quelle surface habitable ?</label>
                    <div class="ligne">
                        <div class="groupe">
                            <label for="surface-min">Min :</label>
                            <input type="number" id="surface-min" placeholder="Min">
                            <span>m²</span>
                        </div>
                        <div class="groupe">
                            <label for="surface-max">Max :</label>
                            <input type="number" id="surface-max" placeholder="Max">
                            <span>m²</span>
                        </div>
                    </div>
                </div>

                <div class="champ">
                    <label>Surface du terrain ?</label>
                    <div class="ligne">
                        <div class="groupe">
                            <label for="terrain-min">Min :</label>
                            <input type="number" id="terrain-min" placeholder="Min">
                            <span>m²</span>
                        </div>
                        <div class="groupe">
                            <label for="terrain-max">Max :</label>
                            <input type="number" id="terrain-max" placeholder="Max">
                            <span>m²</span>
                        </div>
                    </div>
                </div>
                <h3>Etage</h3>
                <label for="etage"></label>
                <input type="number" id = "etage" name="etage"  >
                
                <h3>Chambre</h3>
                <label for="etage"></label>
                <input type="number" id = "chambre" name="chambre"  > 

            <!-- PARTIE 2 : Options supplémentaires -->
            
                <h2>Options supplémentaires</h2>

                <h3>Meublé / Non Meublé</h3>
                <div class = "meuble">
                    <div class="option"><input type="radio" name="meuble" value="Meublé" > Meublé</div>
                    <div class="option"><input type="radio" name="meuble" value="Non meublé"> Non Meublé</div>
                </div>
                <h3>Extérieur</h3>
                <div class = "exterieur">
                    <div class="option"><input type="radio" name="exterieur" value="jardin" > Jardin</div>
                    <div class="option"><input type="radio" name="exterieur" value="piscine"> Piscine</div>
                    <div class="option"><input type="radio" name="exterieur" value="terrasse"> Terrasse</div>
                    <div class="option"><input type="radio" name="exterieur" value="balcon"> Balcon</div>
                    <div class="option"><input type="radio" name="exterieur" value="parking" > Parking</div>
                    <div class="option"><input type="radio" name="exterieur" value="box"> Box</div>
                    <div class="option"><input type="radio" name="exterieur" value="garage"> Garage</div>
                    <div class="option"><input type="radio" name="exterieur" value="cave"> Cave</div>
                    <div class="option"><input type="radio" name="exterieur" value="sous_sol"> Sous-sol</div>
                </div>
                <h3>Exposition</h3>
                <div class= "exposition">
                    <div class="option"><input type="radio" name="exposition" value="Sans vis-à-vis" >Sans vis-à-vis</div>
                    <div class="option"><input type="radio" name="exposition" value="Belle vue">Belle vue</div>
                </div>
                <h3>Orientation </h3>
                <div class = "orientation">
                    <div class="option"><input type="radio" name="orientation" value="orientation_nord">Orientation Nord</div>
                    <div class="option"><input type="radio" name="orientation" value="orientation_sud"> Orientation Sud</div>
                    <div class="option"><input type="radio" name="orientation" value="orientation_suest"> Orientation Ouest</div>
                    <div class="option"><input type="radio" name="orientation" value="orientation_est"> Orientation Est</div>
                </div>
                
                
                <h3>Accessibilité</h3>
                <div class="accessibilite">
                    <div class="option"><input type="radio" name="accessibilite" value="Ascenseur" > Ascenseur</div>
                    <div class="option"><input type="radio" name="accessibilite" value="Accès handicapé"> Accès handicapé</div>
                </div>
                <h3><label for="mot-cle">Critères par mot-clés</label></h3>
                <input type="text" id="mot-cle" name="mot-cle" placeholder="Essayez 'Proche Métro, Proche Transport en commun'" >    
            




            <!-- PARTIE 3 : Description et validation -->
            
                <h2><label for="description">Description</label></h2>
                <textarea id="description" name="description" placeholder="Ajoutez une description pour tout éventuel détail." ></textarea>

                <h3>Diagnostic de Performance Énergétique (DPE)</h3>
                <div class="option" >Consommation en mètres cubes par an:</div>
                <div class="option" ><input type="radio" name="dpe" value="A" > A (moins de 70 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="B"> B (71 à 110 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="C"> C (111 à 180 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="D"> D (181 à 250 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="E"> E (251 à 330 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="F"> F (331 à 420 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="G"> G (+ de 421 kWh/m²)</div>
                <div class="action">
                    <button type="submit" name="recherche">Rechercher</button>
                </div> 
        </form>
    </main>
</body>
</html>
