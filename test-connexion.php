<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="master.css">
    <title>Year in Pixel</title>
</head>
<?php
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $valeurUtilisateur = $_GET['user'];
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

    /* Récupération de l'utilisateur */
    if($valeurUtilisateur == NULL){
        $valeurUtilisateur = 1;
    }
    $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $valeurUtilisateur");
    $utilisateur = $utilisateur->fetch();
    

?>
<!-- Récupération des couleurs personnalisées en fonction des humeurs de l'utilisateur  -->
<style>
    <?php 
        miseEnPlaceCouleur($bdd, $utilisateur[id]);
    ?>
</style>
<body>
    <!-- On appelle le header qui sera commun à toutes nos pages  -->
    <?php 
        include('header.php');
    ?>
    <main>
        <!-- Affichage des humeurs personnalisées de chaque utilisateur  -->
        <section class="humeur">
            <?php 
                affichageHumeur($bdd, $utilisateur[id]); 
            ?>
        </section>
    </main>
    <!-- On appelle le footer qui sera commun à toutes nos pages  -->
    <?php 
        include('footer.php');
    ?>
    
</body>
</html>