<?php
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="color.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" />
    <title>Year in Pixel | Création de compte</title>
</head>
<body>
    <header class="header-principal">
        <h1>Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
        </h1>
    </header> 
    <main class="main-compte">
        <h2 class="titre-compte">créer un compte</h2>
        <form class="formulaire-compte" name="formulaire-creation-compte" action="envoi-creation-compte.php" method="post">
            <p>adresse mail</p>
            <input type="text" name="email"/>
            <p>identifiant</p>
            <input type="text" name="pseudo"/>
            <p>mot de passe</p>
            <input type="password" name="motdepasse"/>
            <p>confirmation du mot de passe</p>
            <input type="password" name="confirmation-mot-de-passe"/>
            <input class="bouton" type="submit" value="créer mon compte"/>
        </form>
   </main>
   <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
</body>
</html>
