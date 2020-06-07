<?php
    session_start();
    $id = $_SESSION['id'];
    require('functions.php');
    require('connexion-bdd.php');
    require('utilisateur.php'); 

    if($affichageEmoji == 1){
        $req = $bdd->prepare("UPDATE utilisateur SET affichageemoji = :booleenemoji WHERE id = :id");
        $req->execute(array(
            'booleenemoji' => 0,
            'id' => $id)); 
    }else{
        $req = $bdd->prepare("UPDATE utilisateur SET affichageemoji = :booleenemoji WHERE id = :id");
        $req->execute(array(
            'booleenemoji' => 1,
            'id' => $id)); 
    }