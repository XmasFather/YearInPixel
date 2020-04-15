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
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));
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
<style>
    <?php 
        /* Récupération des couleurs personnalisées en fonction des humeurs de l'utilisateur */
        miseEnPlaceCouleur($bdd, $utilisateur[id]);
    ?>
</style>
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