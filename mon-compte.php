<?php
    
    $id = $_COOKIE['id'];
    $pseudo = $_COOKIE['pseudo'];
    /* Si on a pas d'utilisateur on est redirigé sur la page de connexion */
    if($id == NULL){
        header('location:connexion.php');
        exit();
    }
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    require('connexion-bdd.php');
    require('utilisateur.php'); 
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
            <h2>Mon compte</h2>
        </header>
        <section class="info-compte">
            <h3>Mes informations</h3>
            <ul>
                <li>Pseudo : <?=$utilisateur['pseudo']?></li>
                <li>Mail : <?=$utilisateur['email']?></li>
                <li>Credit : <?=$utilisateur['monnaie']?></li>
            </ul>
    
        </section>
        <section class="modification-info-compte">
            <h3>Changer mes informations</h3>
        
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