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

    $valeurHumeurs = ['FF9FBB','E1C4FF','8BF9D0','FF8181','FFC84A','98FFFF'];
    $nomHumeurs = ['Heureux','Enthousiaste','Normal','Enervé','Stressé','Triste'];
    $humeursutilisateur = $bdd->query("SELECT id FROM humeur WHERE utilisateur_id = $id");
    $humeursutilisateur = $humeursutilisateur->fetchAll();
    
    $req = $bdd->prepare("UPDATE humeur SET intitule = :intitule, couleur = :couleur WHERE id = :id");
    for($i=0; $i<6; $i++){ 
        $req->execute(array(
            'intitule' => $nomHumeurs[$i],
            'couleur' => $valeurHumeurs[$i],
            'id' => $humeursutilisateur[$i]['id'])); 
    }

    header('location:accueil.php');
    exit();