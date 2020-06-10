<?php

    /* Connexion à la BDD */
    $hostname = "marolleaznyip.mysql.db";
    $database = "marolleaznyip";
    $username = "marolleaznyip";
    $password = 'ZfnnUYuC7qW2wHH';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));