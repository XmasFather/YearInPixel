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

    require('functions.php');

    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $valeurUtilisateur = $_GET['user'];
    if($valeurUtilisateur == NULL){
        $valeurUtilisateur = 0;
    }

    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

?>
<!-- Récupération des couleurs personnalisées en fonction des humeurs de l'utilisateur  -->
<style>
    <?php 
        miseEnPlaceCouleur($bdd, $valeurUtilisateur);
    ?>
</style>
<body>
    <!-- On appelle le header qui sera commun à toutes nos pages  -->
    <?php 
        include('header.php');
    ?>
    <main>
        <?php 
            $nomUtilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $valeurUtilisateur");
            foreach($nomUtilisateur as $pseudo){
                echo $pseudo[pseudo];
            }
        ?>
        <!-- Affichage des humeurs personnalisées de chaque utilisateur  -->
        <section class="humeur">
            <?php 
                affichageHumeur($bdd, $valeurUtilisateur); 
            ?>
        </section>
    </main>
    <!-- On appelle le footer qui sera commun à toutes nos pages  -->
    <?php 
        include('footer.php');
    ?>
    
</body>
</html>