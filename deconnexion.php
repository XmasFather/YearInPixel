<?php 
    setcookie('id', $resultat['id'], time(), null, null, false, true);
    setcookie('pseudo', $pseudo, time(), null, null, false, true);
    header('location:connexion.php');
    exit();
