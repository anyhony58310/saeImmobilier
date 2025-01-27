

<!--deposeruneannonce.php-->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déposer une annonce</title>
    <link rel="stylesheet" href="../style/css/deposeruneannonce.css"> <!-- Lien vers ton fichier CSS -->
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

                    if(isset($_SESSION["message"]["erreurFormulaire"])){
                        echo $_SESSION["message"]["erreurFormulaire"];
                        unset($_SESSION["message"]["erreurFormulaire"]);
                    }
                    
                    if(isset($_SESSION["message"]["erreurBaseDeDonnees"])){
                        echo $_SESSION["message"]["erreurBaseDeDonnees"];
                        unset($_SESSION["message"]["erreurBaseDeDonnees"]);
                    }
                ?>
                <h2>Type de bien</h2>
                <div class="type-bien">
                    <div class="option"><input type="radio" name="type_bien" value="maison" required> Maisons</div>
                    <div class="option"><input type="radio" name="type_bien" value="appartement"> Appartement</div>
                    <div class="option"><input type="radio" name="type_bien" value="terrain"> Terrain</div>
                    <div class="option"><input type="radio" name="type_bien" value="loft"> Loft</div>
                    <div class="option"><input type="radio" name="type_bien" value="chateau"> Château</div>
                    <div class="option"><input type="radio" name="type_bien" value="batiment"> Bâtiment</div>
                    <div class="option"><input type="radio" name="type_bien" value="immeuble"> Immeuble</div>
                    <div class="option"><input type="radio" name="type_bien" value="boutique"> Boutique</div>
                    <div class="option"><input type="radio" name="type_bien" value="divers"> Divers</div>
                </div>
                
                <h2>Vente</h2>
                <div class="vente">
                    <div class="option"><input type="radio" name="vente" value="Oui" required> En vente </div>
                    <div class="option"><input type="radio" name="vente" value="Non"> Pas en vente</div>
                </div>

                
                <h2>Etat</h2>
                <div class = "etat">
                    <div class="option"><input type="radio" name="etat" value="ancien" required> Ancien </div>
                    <div class = "option"><input type="radio" name="etat" value="neuf"> Neuf</div>
                </div>
                

                <h2><label for="localisation">Où êtes-vous situé ?</label></h2>
                <input type="text" id="localisation" name="localisation" placeholder="Dans quelle ville, un code postal ou un quartier ?" required>

                <h2><label for="prix">Pour quel montant ?</label></h2>
                <input type="number" id="prix" name="prix" placeholder="€" required>

                <h2><label for="surface_habitable">Quelle est la surface habitable ?</label></h2>
                <input type="number" id="surface_habitable" name="surface_habitable" placeholder="m²" required>

                <h2><label for="surface_terrain">Surface du terrain</label></h2>
                <input type="number" id="surface_terrain" name="surface_terrain" placeholder="m²" required>
                
                <div class="pieces-chambres">
                    <p><h2><label for="pieces">Combien de pièces ?</label></h2></p>
                    <input type="number" id="pieces" name="pieces" required>
                    
                    <p><h2><label for="chambres">Combien de chambres ?</label></h2></p>
                    <input type="number" id="chambres" name="chambres" required>
                </div>

            <!-- PARTIE 2 : Options supplémentaires -->
            
                <h2>Options supplémentaires</h2>

                <h3>Meublé / Non Meublé</h3>
                <div class = "meuble">
                    <div class="option"><input type="radio" name="meuble" value="Meublé" required> Meublé</div>
                    <div class="option"><input type="radio" name="meuble" value="Non meublé"> Non Meublé</div>
                </div>
                <h3>Extérieur</h3>
                <div class = "exterieur">
                    <div class="option"><input type="radio" name="exterieur" value="jardin" required> Jardin</div>
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
                    <div class="option"><input type="radio" name="exposition" value="Sans vis-à-vis" required>Sans vis-à-vis</div>
                    <div class="option"><input type="radio" name="exposition" value="Belle vue">Belle vue</div>
                </div>
                <h3>Orientation </h3>
                <div class = "orientation">
                    <div class="option"><input type="radio" name="orientation" value="orientation_nord">Orientation Nord</div>
                    <div class="option"><input type="radio" name="orientation" value="orientation_sud"> Orientation Sud</div>
                    <div class="option"><input type="radio" name="orientation" value="orientation_suest"> Orientation Ouest</div>
                    <div class="option"><input type="radio" name="orientation" value="orientation_est"> Orientation Est</div>
                </div>
                <h3>Etage</h3>
                <label for="etage"></label>
                <input type="number" id = "etage" name="etage"  required> 
                
                <h3>Accessibilité</h3>
                <div class="accessibilite">
                    <div class="option"><input type="radio" name="accessibilite" value="Ascenseur" required> Ascenseur</div>
                    <div class="option"><input type="radio" name="accessibilite" value="Accès handicapé"> Accès handicapé</div>
                </div>
                <h3><label for="mot-cle">Critères par mot-clés</label></h3>
                <input type="text" id="mot-cle" name="mot-cle" placeholder="Essayez 'Proche Métro, Proche Transport en commun'" required>    
            




            <!-- PARTIE 3 : Description et validation -->
            
                <h2><label for="description">Description</label></h2>
                <textarea id="description" name="description" placeholder="Ajoutez une description pour tout éventuel détail." required></textarea>

                <h3>Diagnostic de Performance Énergétique (DPE)</h3>
                <div class="option" >Consommation en mètres cubes par an:</div>
                <div class="option" ><input type="radio" name="dpe" value="A" required> A (moins de 70 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="B"> B (71 à 110 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="C"> C (111 à 180 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="D"> D (181 à 250 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="E"> E (251 à 330 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="F"> F (331 à 420 kWh/m²)</div>
                <div class="option"><input type="radio" name="dpe" value="G"> G (+ de 421 kWh/m²)</div> 
            

            <div class="actions">
                <button type="reset">Annuler</button>
                <button type="submit" name="deposer">Confirmer</button>
            </div>
        </form>
    </main>
</body>
</html>
