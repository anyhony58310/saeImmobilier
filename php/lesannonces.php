<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page LesAnnonces</title>
    <link rel="stylesheet" href="../style/css/lesannonces.css" />
</head>

<body>
    <header>
        <Navbar />
    </header>
    <main>
        <form>
            <select>
                <option value="" selected></option>
                <option value="location">Location</option>
                <option value="achat">Achat</option>
            </select>
            <input type="search" placeholder='Dans quel ville, un code postal ?'></input>
            <br></br>

            <input type="button" onClick=""></input>
            <label>Affichez plus de critères</label>
            <label>Cachez plus de critères</label>
            <div id="">
                <div>
                    <input type="checkbox" name="Maison" id="Maison"></input>
                    <label for="Maison">Maison</label>
                    <br></br>
                    <input type="checkbox" name="Appartement" id="Appartement"></input>
                    <label for="Appartement">Appartement</label>
                    <br></br>
                    <input type="checkbox" name="Terrain" id="Terrain"></input>
                    <label for="Terrain">Terrain</label>
                    <br></br>
                    <input type="checkbox" name="Loft" id="Loft"></input>
                    <label for="Loft">Loft</label>
                    <br></br>
                    <input type="checkbox" name="Château" id="Château"></input>
                    <label for="Château">Château</label>
                    <br></br>
                    <input type="checkbox" name="Bâtiment" id="Bâtiment"></input>
                    <label for="Bâtiment">Bâtiment</label>
                    <br></br>
                    <input type="checkbox" name="Immeuble" id="Immeuble"></input>
                    <label for="Immeuble">Immeuble</label>
                    <br></br>
                    <input type="checkbox" name="Boutique" id="Boutique"></input>
                    <label for="Boutique">Boutique</label>
                    <br></br>
                    <input type="checkbox" name="Divers" id="Divers"></input>
                    <label for="Divers">Divers</label>
                    <br></br>
                </div>
                <label>Où recherchez-vous ?</label>
                <input type="text" placeholder='Dans quel ville, un code postal ou un quartier ?'></input>
                <br></br>
                <label>Pour quel budget ?</label>
                <br></br>
                <label>Min :</label>
                <br></br>
                <input type="text" placeholder='0'></input>
                <image></image>
                <label>Max :</label>
                <br></br>
                <input type="text" placeholder='0'></input>
                <image></image>

                <br></br>
                <label>Pour quelle surface habitable ?</label>
                <br></br>
                <label>Min :</label>
                <br></br>
                <input type="text" placeholder='0'></input>
                <image></image>
                <label>Max :</label>
                <br></br>
                <input type="text" placeholder='0'></input>
                <image></image>

                <br></br>
                <label>Surface du terrain ?</label>
                <br></br>
                <label>Min :</label>
                <br></br>
                <input type="text" placeholder='0'></input>
                <image></image>
                <label>Max :</label>
                <br></br>
                <input type="text" placeholder='0'></input>
                <image></image>

                <div>
                    <br></br>
                    <label>Combien de pièce ?</label>
                    <br></br>
                    <input type="radio" name="piece" id="Studio"></input>
                    <label for="Studio">MStudio</label>
                    <br></br>
                    <input type="radio" name="piece" id="p2"></input>
                    <label for="p2">2</label>
                    <br></br>
                    <input type="radio" name="piece" id="p3"></input>
                    <label for="p3">3</label>
                    <br></br>
                    <input type="radio" name="piece" id="p4"></input>
                    <label for="p4">4</label>
                    <br></br>
                    <input type="radio" name="piece" id="p+5"></input>
                    <label for="Château">+5</label>
                    <br></br>
                </div>

                <div>
                    <br></br>
                    <label>Combien de chambre ?</label>
                    <br></br>
                    <input type="radio" name="chambre" id="c1"></input>
                    <label for="c1">1</label>
                    <br></br>
                    <input type="radio" name="chambre" id="c2"></input>
                    <label for="c2">2</label>
                    <br></br>
                    <input type="radio" name="chambre" id="c3"></input>
                    <label for="c3">3</label>
                    <br></br>
                    <input type="radio" name="chambre" id="c4"></input>
                    <label for="c4">4</label>
                    <br></br>
                    <input type="radio" name="chambre" id="c+5"></input>
                    <label for="c+5">+5</label>
                    <br></br>
                </div>

                <div>
                    <br></br>
                    <label>Meublé / Non Meublé</label>
                    <br></br>
                    <input type="radio" name="meuble" id="meublee"></input>
                    <label for="meublee">Meublé</label>
                    <br></br>
                    <input type="radio" name="meuble" id="nonmeublee"></input>
                    <label for="nonmeublee">Non Meublé</label>
                </div>

                <div>
                    <br></br>
                    <label>Extérieur</label>
                    <br></br>
                    <input type="checkbox" name="Jardin" id="Jardin"></input>
                    <label for="Jardin">Jardin</label>
                    <br></br>
                    <input type="checkbox" name="Piscine" id="Piscine"></input>
                    <label for="Piscine">Piscine</label>
                    <br></br>
                    <input type="checkbox" name="Terrasse" id="Terrasse"></input>
                    <label for="Terrasse">Terrasse</label>
                    <br></br>
                    <input type="checkbox" name="Balcon" id="Balcon"></input>
                    <label for="Balcon">Balcon</label>
                    <br></br>
                </div>

                <div>
                    <br></br>
                    <label>Surface annexes</label>
                    <br></br>
                    <input type="checkbox" name="Parking" id="Parking"></input>
                    <label for="Parking">Parking</label>
                    <br></br>
                    <input type="checkbox" name="Box" id="Box"></input>
                    <label for="Box">Box</label>
                    <br></br>
                    <input type="checkbox" name="Garage" id="Garage"></input>
                    <label for="Garage">Garage</label>
                    <br></br>
                    <input type="checkbox" name="Cave" id="Cave"></input>
                    <label for="Cave">Cave</label>
                    <br></br>
                    <input type="checkbox" name="Sous-sol" id="Sous-sol"></input>
                    <label for="Sous-sol">Sous-sol</label>
                    <br></br>
                </div>

                <div>
                    <br></br>
                    <label>Exposition</label>
                    <br></br>
                    <input type="checkbox" name="Sans vis-à-vis" id="Sans vis-à-vis"></input>
                    <label for="Sans vis-à-vis">Sans vis-à-vis</label>
                    <br></br>
                    <input type="checkbox" name="Belle vue" id="Belle vue"></input>
                    <label for="Belle vue">Belle vue</label>
                    <br></br>
                    <input type="checkbox" name="Orientation Nord" id="Orientation Nord"></input>
                    <label for="Orientation Nord">Orientation Nord</label>
                    <br></br>
                    <input type="checkbox" name="Orientation Sud" id="Orientation Sud"></input>
                    <label for="Orientation Sud">Orientation Sud</label>
                    <br></br>
                    <input type="checkbox" name="Orientation Ouest" id="Orientation Ouest"></input>
                    <label for="Orientation Ouest">Orientation Ouest</label>
                    <br></br>
                    <input type="checkbox" name="Orientation Est" id="Orientation Est"></input>
                    <label for="Orientation Est">Orientation Est</label>
                    <br></br>
                </div>

                <div>
                    <br></br>
                    <label>Etage</label>
                    <br></br>
                    <input type="checkbox" name="Rez-de chaussée" id="Rez-de chaussée"></input>
                    <label for="Rez-de chaussée">Rez-de chaussée</label>
                    <br></br>
                    <input type="checkbox" name="Dernier étage" id="Dernier étage"></input>
                    <label for="Dernier étage">Dernier étage</label>
                    <br></br>
                    <input type="checkbox" name="1ère étage" id="1ère étage"></input>
                    <label for="1ère étage">1ère étage</label>
                    <br></br>
                    <input type="checkbox" name="2ème étage" id="2ème étage"></input>
                    <label for="2ème étage">2ème étage</label>
                    <br></br>
                    <input type="checkbox" name="3ème étage" id="3ème étage"></input>
                    <label for="3ème étage">3ème étage</label>
                    <br></br>
                    <input type="checkbox" name="+4ème étage" id="+4ème étage"></input>
                    <label for="+4ème étage">+4ème étage</label>
                    <br></br>
                </div>

                <div>
                    <br></br>
                    <label>Accessibilité</label>
                    <br></br>
                    <input type="checkbox" name="Escalier" id="Escalier"></input>
                    <label for="Escalier">Escalier</label>
                    <br></br>
                    <input type="checkbox" name="Ascenseur" id="Ascenseur"></input>
                    <label for="Ascenseur">Ascenseur</label>
                    <br></br>
                    <input type="checkbox" name="Accès handicapé" id="Accès handicapé"></input>
                    <label for="Accès handicapé">Accès handicapé</label>
                    <br></br>
                    <input type="checkbox" name="Pas d’accès handicapé" id="Pas d’accès handicapé"></input>
                    <label for="Pas d’accès handicapé">Pas d’accès handicapé</label>
                    <br></br>
                </div>

                <div>
                    <label>Critères par mot-clés</label>
                    <input type="text" placeholder='Essayez “Proche Métro, Proche Transport en commun”'></input>
                </div>

                <div>
                    <br></br>
                    <label>Diagnostic de Performance Energétique</label>
                    <br></br>
                    <input type="radio" name="energie" id="A"></input>
                    <label for="A">A</label>
                    <label>moins de 70 kWh</label>
                    <br></br>
                    <input type="radio" name="energie" id="B"></input>
                    <label for="B">B</label>
                    <label>71 kWh à 110 kWh</label>
                    <br></br>
                    <input type="radio" name="energie" id="C"></input>
                    <label for="C">C</label>
                    <label>111 kWh à 180 kWh</label>
                    <br></br>
                    <input type="radio" name="energie" id="D"></input>
                    <label for="D">D</label>
                    <label>181 kWh à 250 kWh</label>
                    <br></br>
                    <input type="radio" name="energie" id="E"></input>
                    <label for="E">E</label>
                    <label>251 kWh à 330 kWh</label>
                    <br></br>
                    <input type="radio" name="energie" id="F"></input>
                    <label for="F">F</label>
                    <label>331 kWh à 420 kWh</label>
                    <br></br>
                    <input type="radio" name="energie" id="G"></input>
                    <label for="G">G</label>
                    <label>+ de 421 kWh</label>
                    <br></br>

                </div>
            </div>
        </form>
        <div className="buttons">
            <button>
                Modifier ma recherche
            </button>
        </div>
    </main>
</body>

</html>