<?php

function closeMaBase($mysqli){
    $mysqli->close();
}

function openMaBase(){
    $mysqli = new mysqli('localhost', 'root', 'root', 'immobilier');
    if (mysqli_connect_errno()){
        printf("Echec de la connexion: %s\n", mysqli_connect_error());
        exit();
    }
    //printf("Informations sur le serveur : %s\n", $mysqli->host_info);
    
    return $mysqli;


}

function ChoisirUtilisateur($email,$mysqli){
    $req = $mysqli->query("SELECT nom, prenom, email, mot_de_passe FROM Utilisateur WHERE email='$email' ");
    $row = $req->fetch_assoc();
    $req->free_result();
    return $row;
}