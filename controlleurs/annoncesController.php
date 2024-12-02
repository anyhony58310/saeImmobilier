<?php
    session_start();
    include 'database.php';

    $db = new DatabaseConnexion();
    $conn = $db->connect();

    $query = "SELECT a.*, i.chemin 
            FROM annonce a
            LEFT JOIN images i ON a.id = i.idAnnonce";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $annonces = [];
    foreach ($resultats as $row) {
        $idAnnonce = $row['id'];
        if (!isset($annonces[$idAnnonce])) {

            $annonces[$idAnnonce] = [
                'id' => $row['id'],
                'titre' => $row['titre'],
                'prix' => $row['prix'],
                'description' => $row['description'],
                'complementAdresse' => $row['complementAdresse'],
                'codePostal' => $row['codePostal'],
                'ville' => $row['ville'],
                'idUtilisateur' => $row['idUtilisateur'],
                'images' => []
            ];
        }

        if ($row['chemin']) {
            $annonces[$idAnnonce]['images'][] = $row['chemin'];
        }
    }

    $annonces = array_values($annonces);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($annonces, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>