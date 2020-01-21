<?php
    /* Permet de récupérer les couleurs personnalisées de chacun */
    function miseEnPlaceCouleur($bdd, $idUtilisateur){
        $couleurs = $bdd->query("SELECT * FROM humeur WHERE utilisateur_id = $idUtilisateur");
        $compteur = 0;
        echo ":root{ \n     --color-background: #fff8ed; \n     --color-text: #333333; \n     --color-0: #ffffff; \n";
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "     --color-".$compteur.": #".$humeur[couleur]."; \n";
        }
        echo "} \n";
    }

    function affichageModificationHumeur($bdd, $idUtilisateur){
        $couleurs = $bdd->query("SELECT * FROM humeur WHERE utilisateur_id = $idUtilisateur");
        $compteur = 0;
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "<div class=\"humeur-a-modifiee\">\n";
            echo "<input type=\"color\" class=\"input-couleur\" id=\"couleur-".$compteur."\" name=\"couleur-".$compteur."\" value=\"#".$humeur[couleur]."\">\n";
            echo "<input type=\"text\" class=\"input-humeur\" id=\"humeur-".$compteur."\" name=\"humeur-".$compteur."\" value=\"".$humeur[intitule]."\">\n";
            echo "</div>\n";
        }
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

    /* Affichage contenu dossier sous forme de liste*/ 
    function contenuDossier($nomDossier, $nomListe){
        $dir = $nomDossier;
        $dossier = scandir($dir);
        for($i=2; $i<=count($dossier); $i++){
            echo "<label>";
            echo "<input type=\"radio\" name=\"avatar\" value=\"".$dossier[$i]."\">\n";
            echo "<img src=\"avatars/".$dossier[$i]."\" alt=\"".$dossier[$i]."\">\n";
            echo "</label>";
        }
    } 