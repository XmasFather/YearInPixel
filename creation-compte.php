<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="color.css">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="compte-utilisateur.css">
    <link rel="icon" href="favicon.ico" />
    <title>Year in Pixel | Création de compte</title>
</head>
<body>
    <?php 
        /* On appelle le header qui sera commun à toutes nos pages */
        include('header.php');
    ?>
    <main class="main-compte">
        <h2 class="titre-compte">créer un compte</h2>
        <form class="formulaire-compte" name="formulaire-creation-compte" action="creation-compte.php" method="post">
            <p>adresse mail</p>
            <input type="text" name="adresse-mail"/>
            <p>identifiant</p>
            <input type="text" name="identifiant"/>
            <p>mot de passe</p>
            <input type="password" name="mot-de-passe"/>
            <p>confirmation du mot de passe</p>
            <input type="password" name="confirmation-mot-de-passe"/>
            <input class="bouton-submit" type="submit" value="créer mon compte"/>
        </form>
   </main>
   <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
</body>
</html>