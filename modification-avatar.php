<?php
    session_start();
    $id = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');    
     /* Connexion à la BDD */
     $hostname = "localhost";
     $database = "mwe20_qmarolle_yip";
     $username = "mwe20_qmarolle";
     $password = 'AjnfDIoiJC8vLNA';
     $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));
 
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