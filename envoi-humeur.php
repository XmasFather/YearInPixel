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

    $aujourdhui = date('Y-m-d');

    if($_GET['date-du-jour'] <= $aujourdhui){
        $del = $bdd->prepare("DELETE FROM pixel WHERE jour = :jour AND utilisateur_id = :id");
        $del->execute(array(
            'jour' => $_GET['date-du-jour'],
            'id' => $id
        ));
        $req = $bdd->prepare("INSERT INTO pixel(jour, utilisateur_id, humeur_id, symbole) VALUES(:jour, :id, :humeur, :emoji) ");
        $req->execute(array(
            'jour' => $_GET['date-du-jour'],
            'id' => $id,
            'humeur' => $_POST['humeur'],
            'emoji' => $_POST['emoji']
        ));
    }    
    header('location:accueil.php');
    exit();