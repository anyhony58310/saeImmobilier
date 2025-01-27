<?php

//fonctions.php

// Fonction pour fermer une connexion à la base de données
function closeBase($mysqli) {
    $mysqli->close(); // Ferme la connexion à la base de données
}

// Fonction pour ouvrir une connexion à la base de données
function openBase() {
    // Création d'un nouvel objet mysqli avec les informations de connexion
    $mysqli = new mysqli('localhost', 'root', 'root', 'immobilier'); 

    // Vérifie si une erreur de connexion est survenue
    if (mysqli_connect_errno()) {
        // Affiche un message d'erreur et quitte le script en cas de problème
        printf("Echec de la connexion: %s\n", mysqli_connect_error());
        exit();
    }

    // Retourne l'objet mysqli pour permettre l'interaction avec la base de données
    return $mysqli;
}

// Fonction pour sélectionner un utilisateur dans la base de données à partir de son email
function selectUser($email, $mysqli) {
    // Exécute une requête SQL pour récupérer les informations de l'utilisateur
    $req = $mysqli->query("SELECT id_utilisateur, nom, prenom, email, mot_de_passe FROM Utilisateur WHERE email='$email'");

    // Récupère la première ligne du résultat sous forme de tableau associatif
    $row = $req->fetch_assoc();

    // Libère les ressources utilisées pour le résultat
    $req->free_result();

    // Retourne les données de l'utilisateur
    return $row;
}

// Fonction pour valider que le nom est bien écrit (aucun chiffre ou caractère spécial)
function nomBienEcrit($nom) {
    // Vérifie si le nom contient des chiffres ou des caractères spéciaux
    if (preg_match('/(\d)|(\W)/', $_POST["nom"])) {
        return false; // Retourne false si le nom est mal écrit
    }
    return true; // Retourne true si le nom est valide
}

// Fonction pour valider que l'email est bien écrit (format email valide)
function emailBienEcrit($mail) {
    // Utilise une expression régulière pour vérifier le format de l'email
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $mail)) {
        return false; // Retourne false si l'email est mal écrit
    }
    return true; // Retourne true si l'email est valide
}

?>


