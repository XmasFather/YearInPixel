<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="master.css">
    <link rel="icon" href="favicon.ico" />
    <title>Year in Pixels | <?=$pseudo?></title>
    <style>
    <?php 
        /* Récupération des couleurs personnalisées en fonction des humeurs de l'utilisateur */
        miseEnPlaceCouleur($bdd, $utilisateur[id]);
    ?>
</style>    
</head>
