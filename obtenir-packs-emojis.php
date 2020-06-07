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
     require('connexion-bdd.php');
    /* */
    $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id=$id");
    /* Change l'état de $utilisateur pour le rendre manipulable */
    $utilisateur = $utilisateur->fetch();
    $affichageEmoji = $utilisateur['affichageemoji'];
    

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
            <h2>Obtenir des nouveaux packs d'émojis</h2>
        </header>
        <section class="class-404">
            <p>Votre pixel se trouve dans un autre chateau</p>
            <p>👸➡️🏰</p>
        </section>
    </main>

    
    
    <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
    </div>

<script type="text/javascript" src="script.js"></script>
<?php
    if($affichageEmoji == 0){
        echo "<script>modificationAffichageEmoji();</script>";
    }
?>
    
</body>
</html>