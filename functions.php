<?php
    /* Permet de récupérer les couleurs personnalisées de chacun */
    function miseEnPlaceCouleur($bdd, $idUtilisateur){
        $couleurs = $bdd->query("SELECT * FROM humeur WHERE utilisateur_id = $idUtilisateur");
        $compteur = 0;
        echo ":root{ \n     --color-background: #fff8ed; \n     --color-0: #ffffff; \n";
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "     --color-".$compteur.": #".$humeur[couleur]."; \n";
        }
        echo "}";
    }

    /**/
    function affichageHumeur($bdd, $idUtilisateur){
        $couleurs = $bdd->query("SELECT * FROM humeur WHERE utilisateur_id = $idUtilisateur");
        echo "<ul class=\"liste-humeur\"> \n";
        $compteur = 0;
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "  <li><div class=\"carre-couleur-humeur couleur-humeur-".$compteur."\"></div> ".$humeur[intitule]."</li> \n";
        }
        echo "</ul> \n";
    }

    
?>