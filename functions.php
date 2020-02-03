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
            echo "<div class=\"humeur-a-modifier\">\n";
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

    /* Affichage le contenu du dossier des avatars sous forme de liste*/ 
    function affichageAvatar($nomDossier, $utilisateur){
        $dir = $nomDossier;
        $avatars = scandir($dir);
        for($i=2; $i<count($avatars); $i++){
            if ($utilisateur[avatar] == $avatars[$i]){
                echo "<label>";
                echo "<input type=\"radio\" checked=\"checked\" name=\"avatar\" value=\"".$avatars[$i]."\">\n";
                echo "<img src=\"avatars/".$avatars[$i]."\" alt=\"".$avatars[$i]."\">\n";
                echo "</label>";
            }
            else{
                echo "<label>";
                echo "<input type=\"radio\" name=\"avatar\" value=\"".$avatars[$i]."\">\n";
                echo "<img src=\"avatars/".$avatars[$i]."\" alt=\"".$avatars[$i]."\">\n";
                echo "</label>";
            }            
        }
    }
    
    /* Affichage d'un bonjour aléatoire */

    function bonjourAleatoire($utilisateur){
        $listeBonjour = array("Hey", "Salut", "Bonjour", "Ouh", "Wesh");
        $bonjour = array_rand($listeBonjour, 1);
        echo "<h3 class=\"bonjour\">".$listeBonjour[$bonjour]." ".$utilisateur[pseudo]." !"."</h3>";
    }