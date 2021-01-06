<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="color.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" />
    <title>Year in Pixel | Connexion</title>
</head>
<body>
    <header class="header-principal">
        <h1>
            <a href="./index.php">
                Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
            </a>
        </h1>  
    </header> 
   <main class="main-compte">
        <h2 class="titre-compte">s'identifier</h2>
        <form class="formulaire-compte" name="formulaire-connexion" action="envoi-connexion.php" method="post">
            <p>identifiant</p>
            <input type="text" name="username" placeholder="Identifiant"/>
            <p>mot de passe</p>
            <input type="password" name="motdepasse" placeholder="Mot de passe"/>
            <input class="bouton" type="submit" value="connexion"/>
            <div>
                <p>Pas encore inscrit ? clique <a href="creation-compte.php">ici</a></p>
            </div>
        </form>
        
   </main>
   <?php 
            /* On appelle le footer qui sera commun à toutes nos pages */
            include('footer.php');
    ?>
</body>
</html>