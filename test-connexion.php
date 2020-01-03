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
    $valeurUtilisateur = 2;

    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

?>
<style>
    <?php 
        miseEnPlaceCouleur($bdd, $valeurUtilisateur);
    ?>
</style>
<body>
    <header class="header-principal">
        <h1>Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
        </h1>
    </header>
    <main>
        <?php 
            $nomUtilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $valeurUtilisateur");
            foreach($nomUtilisateur as $pseudo){
                echo $pseudo[pseudo];
            }
        ?>
        <section class="humeur">
            <?php 
                affichageHumeur($bdd, $valeurUtilisateur); 
            ?>
        </section>
    </main>
    <footer>
    <ul class="container-pixel">
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
    </ul>
    <p>Proudly designed by Philaé, Myrial & Quentin in California</p>
    <ul class="container-pixel">
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
        <li class="pixel"></li>
    </ul>
  </footer>
    
</body>
</html>