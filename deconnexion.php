<?php 
    setcookie('id', $resultat['id'], time(), null, null, false, true);
    setcookie('username', $username, time(), null, null, false, true);
    header('location:connexion.php');
    exit();
