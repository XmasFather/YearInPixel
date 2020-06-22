<?php

    require('connexion-bdd.php'); 

    /* Test : Si j'ai un cookie sur la machine*/
    if(isset($_COOKIE['SUID'])){
        $req = $bdd->prepare("SELECT id, username FROM utilisateur WHERE SUID = :SUID");
        $req->execute(array(
            'SUID' => $_COOKIE['SUID']));
        $resultat = $req->fetch();
        var_dump($resultat);
    }
    else{
        echo "Je n'ai pas de cookie qui est SET"
        //header("location: connexion.php");
        //exit();
    } 