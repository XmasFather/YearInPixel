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
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));

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

    sleep(0.5);
    header('location:accueil.php');
    exit();