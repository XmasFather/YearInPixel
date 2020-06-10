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

    $humeursutilisateur = $bdd->query("SELECT id FROM humeur WHERE utilisateur_id = $id");
    $humeursutilisateur = $humeursutilisateur->fetchAll();
    
    for($i=0; $i<=count($humeursutilisateur); $i++){
        $req = $bdd->prepare("UPDATE humeur SET intitule = :intitule, couleur = :couleur WHERE id = :id");
        $req->execute(array(
            'intitule' => $_POST['humeur-'.$i],
            'couleur' => substr($_POST['couleur-'.$i], 1, 6),
            'id' => $humeursutilisateur[$i-1]['id'])); 
    }
    
    header('location:modification-humeur.php');
    exit();