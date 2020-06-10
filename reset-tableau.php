<?php
    
    $id = $_COOKIE['id'];
    $pseudo = $_COOKIE['pseudo'];
    /* Si on a pas d'utilisateur on est redirigé sur la page de connexion */
    if($id == NULL){
        header('location:connexion.php');
        exit();
    }
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    require('connexion-bdd.php');

    $req = $bdd->prepare("DELETE FROM pixel WHERE utilisateur_id = :id");
    $req->execute(array(
        'id' => $id)); 

    header('location:index.php');
    exit();