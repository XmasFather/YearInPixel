<?php

    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));

    $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id=$id");
    /* Change l'état de $utilisateur pour le rendre manipulable */
    $utilisateur = $utilisateur->fetch();

    $affichageEmoji = $utilisateur['affichageemoji'];