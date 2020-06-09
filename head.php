<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" />
    <title>Year in Pixels | <?=$pseudo?></title>
    <style>
    <?php 

        /* Permet de récupérer les couleurs personnalisées de chacun */
        $couleurs = $bdd->prepare("SELECT * FROM humeur WHERE utilisateur_id = :idutilisateur");
        $couleurs->execute(array(
            ':idutilisateur' => $id));
        $compteur = 0;
        echo ":root{ \n     --color-background: #fff8ed; \n     --color-text: #333333; \n     --color-0: #ffffff; \n";
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "     --color-".$compteur.": #".$humeur[couleur]."; \n";
        }
        echo "} \n";
    ?>
</style>    
</head>
