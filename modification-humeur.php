<?php
    session_start();
    $id = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');    
     /* Connexion à la BDD */
     require('connexion-bdd.php');
     /* Récupération de l'utilisateur  à modifier à terme */
     if($id == NULL){
         header('location:connexion.php');
         exit();
     }
     /* */
     $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $id");
     /* Change l'état de $utilisateur pour le rendre manipulable */
     $utilisateur = $utilisateur->fetch();
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
                <h2>Envie de changer vos humeurs ?<span class="sous-titre">(Cliquez pour modifier vos humeurs)</span></h2>
            </header>
            <form action="envoi-modification-humeur.php" method="post">
            <?php
                affichageModificationHumeur($bdd, $id);
            ?>
            <input class="bouton-modification bouton-humeur" type="submit" value="Enregistrer vos humeurs"/>
            </form>

            <a href="reset-humeurs.php" class="bouton-modification bouton-lien-modification">Remise à zéro des couleurs</a>
            
        </main>
        <?php 
            /* On appelle le footer qui sera commun à toutes nos pages */
            include('footer.php');
        ?>
    </div>

<script type="text/javascript" src="script.js"></script>
    
</body>
</html>