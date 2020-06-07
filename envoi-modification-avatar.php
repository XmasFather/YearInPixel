<?php
    session_start();
    $id = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
    /* Si on a pas d'utilisateur on est redirigé sur la page de connexion */
    if($id == NULL){
        header('location:connexion.php');
        exit();
    }
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    require('connexion-bdd.php');
    $req = $bdd->prepare("UPDATE utilisateur SET avatar = :avatar WHERE id = :id");
    $req->execute(array(
        'avatar' => $_POST['avatar'],
        'id' => $id));
        
    header('location:accueil.php');
    exit();
