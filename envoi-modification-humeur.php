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
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

    $humeursutilisateur = $bdd->query("SELECT id FROM humeur WHERE utilisateur_id = $id");
    $humeursutilisateur = $humeursutilisateur->fetchAll();
    
    for($i=0; $i<=count($humeursutilisateur); $i++){
        $req = $bdd->prepare("UPDATE humeur SET intitule = :intitule, couleur = :couleur WHERE id = :id");
        $req->execute(array(
            'intitule' => $_POST['humeur-'.$i],
            'couleur' => substr($_POST['couleur-'.$i], 1, 6),
            'id' => $humeursutilisateur[$i-1]['id'])); 
    }
    

    sleep(0.5);
    header('location:modification-humeur.php');
    exit();


   


    
    