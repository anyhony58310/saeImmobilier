
<!--traiterannonce.php-->


<?php
// Démarre une session pour conserver les données utilisateur
session_start();

// Inclut un fichier contenant des fonctions réutilisables
require("fonctions.php");

// Définit le fuseau horaire sur celui de Paris
date_default_timezone_set("Europe/Paris");

// Vérifie si le formulaire de dépôt d'annonce a été soumis
if (isset($_POST["deposer"])) {
    // Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion
    if (!isset($_SESSION["nom"])) {
        $_SESSION["message"]["erreurConnexion"] = "<p>Se connecter avant de déposer une annonce</p>";
        header("Location: seConnecter.php");
    } 
    // Si l'utilisateur est connecté
    else {
        

        // Traitement des champs du formulaire

        // Détermine si l'annonce concerne une vente ou une location
        $vente = ($_POST["vente"] == "Oui");

        // Récupère les informations générales de l'annonce
        $etat = $_POST["etat"];
        $habitation = $_POST["type_bien"]; // Type de bien (maison, appartement, etc.)
        $localisation = $_POST["localisation"]; // Ville ou localisation
        $prix = $_POST["prix"]; // Prix de l'annonce
        $surface_habitable = $_POST["surface_habitable"]; // Surface habitable
        $surface_terrain = $_POST["surface_terrain"]; // Surface du terrain (si applicable)
        $nb_pieces = $_POST["pieces"]; // Nombre de pièces
        $nb_chambres = $_POST["chambres"]; // Nombre de chambres

        // Détermine si le bien est meublé ou non
        $est_meuble = ($_POST["meuble"] == "Meublé");

        // Vérifie si le bien dispose d'un jardin ou d'autres caractéristiques extérieures
        if ($_POST["exterieur"] == "jardin") {
            $jardin = true;
            $caracteristique = null; // Aucune caractéristique supplémentaire
        } else {
            $jardin = false;
            $caracteristique = $_POST["exterieur"]; // Exemple : balcon, terrasse, etc.
        }

        // Détermine l'exposition du bien (sans vis-à-vis ou belle vue)
        if ($_POST["exposition"] == "Sans vis-à-vis") {
            $sans_vis_a_vis = true;
            $belle_vue = false;
        } else {
            $sans_vis_a_vis = false;
            $belle_vue = true;
        }

        // Autres détails de l'annonce
        $orientation = $_POST["orientation"]; // Orientation (Nord, Sud, etc.)
        $etage = $_POST["etage"]; // Étage (si applicable)
        $accessibilite = $_POST["accessibilite"]; // Accessibilité (ascenseur ou accès handicapé)

        // Vérifie le type d'accessibilité
        if ($_POST["accessibilite"] == "Ascenseur") {
            $ascenseur = true;
            $acces_handicape = false;
        } else {
            $ascenseur = false;
            $acces_handicape = true;
        }

        // Champs supplémentaires
        $mot_cle = $_POST["mot-cle"]; // Mots-clés pour décrire l'annonce
        $description = $_POST["description"]; // Description de l'annonce
        $energetique = $_POST["dpe"]; // Classe énergétique (DPE)

        // Dates de création et mise à jour de l'annonce
        $date_creation = date("y-m-d");
        $date_mise_a_jour = date("y-m-d");

        // Identifiant de l'utilisateur connecté (depuis la session)
        $id_utilisateur = $_SESSION["id"];

        // Validation supplémentaire
        if (!is_numeric($prix) || $prix <= 0) {
            $_SESSION["message"]["erreurFormulaire"] = "Le prix doit être un nombre positif.";
            header("Location: deposeruneannonce.php");
            exit();
        }
        if (!is_numeric($surface_habitable) || $surface_habitable <= 0) {
            $_SESSION["message"]["erreurFormulaire"] = "La surface habitable doit être un nombre positif.";
            header("Location: deposeruneannonce.php");
            exit();
        }
        if (!is_numeric($surface_terrain) || $surface_terrain <= 0) {
            $_SESSION["message"]["erreurFormulaire"] = "La surface du terrain doit être un nombre positif.";
            header("Location: deposeruneannonce.php");
            exit();
        }
        if (!is_numeric($nb_chambres) || $nb_chambres <= 0) {
            $_SESSION["message"]["erreurFormulaire"] = "La surface du terrain doit être un nombre positif.";
            header("Location: deposeruneannonce.php");
            exit();
        }
        if (!is_numeric($nb_pieces) || $nb_pieces <= 0) {
            $_SESSION["message"]["erreurFormulaire"] = "La surface du terrain doit être un nombre positif.";
            header("Location: deposeruneannonce.php");
            exit();
        }

        // Connexion à la base de données
        $mysqli = openBase();

        // Insérer dans la table Annonce
        $requete_annonce = "INSERT INTO Annonce (titre, image, categorie, taille, adresse, description, prix, 
        date_creation_annonce, date_derniere_mise_a_jour_annonce, id_cree_par_utilisateur)
        VALUES ('$habitation', 'default.jpg', '$habitation', '$surface_habitable', '$localisation', '$description', 
        '$prix', '$date_creation', '$date_mise_a_jour', '$id_utilisateur');";

        $enregistrer_annonce = $mysqli->query($requete_annonce);

        // Récupérer l'ID de l'annonce récemment ajoutée
        $id_annonce = $mysqli->insert_id;


        // Prépare la requête SQL pour insérer les données dans la table `Critere`
        $requete_critere = "INSERT INTO Critere(vente, etat, habitation, ville, prix, 
        surface, surface_terrain, piece, chambre, meuble, jardin, 
        caracteristique, sans_vis_a_vis, belle_vue, orientation, etage,
        ascenseur, acces_handicape, mot_cles, energetique, 
        date_creation_criteres, date_derniere_mise_a_jour_criteres, id_cree_par_utilisateur) 
        VALUES('$vente', '$etat', '$habitation', '$localisation', '$prix', '$surface_habitable', 
        '$surface_terrain', '$nb_pieces', '$nb_chambres', '$est_meuble', '$jardin', 
        '$caracteristique', '$sans_vis_a_vis', '$belle_vue', '$orientation', '$etage', 
        '$ascenseur', '$acces_handicape', '$mot_cle', '$energetique', '$date_creation', 
        '$date_mise_a_jour', '$id_utilisateur');";

        // Exécute la requête d'insertion
        $enregistrer_critere = $mysqli->query($requete_critere);

        // Récupérer l'ID du critère récemment ajouté
        $id_critere = $mysqli->insert_id;

        // Insérer dans la table Annonce_Critere
        $requete_relation = "INSERT INTO Annonce_Critere (id_annonce, id_criteres) VALUES ('$id_annonce', '$id_critere');";
        $enregistrer_relation = $mysqli->query($requete_relation);

        //Messages d'erreurs
        if (!$enregistrer_annonce) {
            $_SESSION["message"]["erreurBaseDeDonnees"] = "Erreur lors de l'enregistrement de l'annonce.";
            header("Location: deposeruneannonce.php");
            exit();
        }
        if (!$enregistrer_critere) {
            $_SESSION["message"]["erreurBaseDeDonnees"] = "Erreur lors de l'enregistrement des critères.";
            header("Location: deposeruneannonce.php");
            exit();
        }
        if (!$enregistrer_relation) {
            $_SESSION["message"]["erreurBaseDeDonnees"] = "Erreur lors de la création de la relation annonce-critère.";
            header("Location: deposeruneannonce.php");
            exit();
        }

        if (isset($_SESSION["message"]["erreurFormulaire"])) {
            echo "<p class='error'>" . $_SESSION["message"]["erreurFormulaire"] . "</p>";
            unset($_SESSION["message"]["erreurFormulaire"]);
        }
        if (isset($_SESSION["message"]["erreurBaseDeDonnees"])) {
            echo "<p class='error'>" . $_SESSION["message"]["erreurBaseDeDonnees"] . "</p>";
            unset($_SESSION["message"]["erreurBaseDeDonnees"]);
        }

        // Message de confirmation
        $_SESSION["message"]["depot"] = "Votre annonce est déposée";

        // Ferme la connexion à la base de données
        closeBase($mysqli);

        // Redirige l'utilisateur vers la page de dépôt d'annonce
        header("Location: deposeruneannonce.php");
    }
}
?>













