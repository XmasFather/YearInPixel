<?php
    session_start();
    $id = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');    
    require('connexion-bdd.php');
     /* Récupération de l'utilisateur  à modifier à terme */
     if($id == NULL){
         header('location:connexion.php');
         exit();
     }
?>
<?php   
    /* On appelle le head qui gère toutes infos relative à la page */
    include('head.php');
?>
 
<body>
    <div class="conteneur">
    <?php 
        /* On appelle le header qui sera commun à toutes nos pages */
        include('header.php');
    ?>
    <main>
        <header class="header-main">
                <h2>Que choisir comme avatar ?</h2>
        </header>
        <form class="liste-avatars" action="envoi-modification-avatar.php" method="post">
            <?php
                affichageAvatar("avatars", $utilisateur);
            ?>
            <input class="bouton-modification bouton-avatar" type="submit" value="Modifier votre Avatar"/>
        </form >
    </main>
    <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
    </div>

<script type="text/javascript" src="script.js"></script>
    
</body>
</html>