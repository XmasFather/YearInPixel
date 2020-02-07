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

    function choixHumeur($bdd, $idUtilisateur){
        $couleurs = $bdd->query("SELECT * FROM humeur WHERE utilisateur_id = $idUtilisateur");
        $compteur = 0;
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "<li> \n";
            echo "<input type=\"radio\" id=\"".$humeur[intitule]."\" name=\"humeur\" value=\"".$humeur['id']."\">\n";
            echo "<label for=\"".$humeur[intitule]."\"> \n";
            echo "  <div class=\"carre-couleur-humeur couleur-humeur-".$compteur."\"></div> ".$humeur[intitule]."\n";
            echo "</label>";
            echo "</li> \n"; 
        }
    }
    
    /* Affichage d'un bonjour aléatoire */

    function bonjourAleatoire($utilisateur){
        $listeBonjour = array("Hey", "Salut", "Bonjour", "Ouh", "Wesh");
        $bonjour = array_rand($listeBonjour, 1);
        echo "<h3 class=\"bonjour\">".$listeBonjour[$bonjour]." ".$utilisateur[pseudo]." !"."</h3>";
    }
/*
    function genererMois2($mois_actuel, $annee_actuelle){


        date_default_timezone_set('Europe/Paris');

        $compteur_affichage_mois = 0;
        
        $premier_jour = $annee_actuelle."-".$mois_actuel."-01";
        $bon_format=strtotime ($premier_jour);
        $numero_semaine = date('W',$bon_format);
        $debut = date("l d/m/Y", strtotime($annee_actuelle."W".$numero_semaine));
        $date_objet = DateTime::createFromFormat('l d/m/Y', $debut);
        $test = $date_objet->format('l d/m/Y');
        

        for($compteur_affichage_mois = 1; $compteur_affichage_mois <= 35; $compteur_affichage_mois++){
            $contenu = $test;
            $datedujour = $date_objet->format('Y-m-d');
          $case = "<li data-date=\"".$contenu."\" class=\"mois\"><a href=\"selection-humeur.php?date-du-jour=$datedujour\" class=\"lien-modif-humeur\"></a></li>";
          echo $case;

          //$debut = date('l d/m/Y', strtotime($debut . ' +1 day'));
          $date_objet->modify('+1 day');
          $test=$date_objet->format('l d/m/Y');
        }   
      } */ 

      function genererMois($mois_actuel, $annee_actuelle, $bdd, $idUtilisateur){


        date_default_timezone_set('Europe/Paris');

        $compteur_affichage_mois = 0;
        
        $premier_jour = $annee_actuelle."-".$mois_actuel."-01";
        $bon_format=strtotime ($premier_jour);
        $numero_semaine = date('W',$bon_format);
        $debut = date("l d/m/Y", strtotime($annee_actuelle."W".$numero_semaine));
        $date_objet = DateTime::createFromFormat('l d/m/Y', $debut);
        $test = $date_objet->format('l d/m/Y');

        /* Test si le nombre de jours va déborder  */

        $calculNombreJour = DateTime::createFromFormat('l d/m/Y', $debut);
        $calculNombreJour->modify('+34 day');
        $jourFin = $calculNombreJour->format('m');
        
        if ($jourFin == $mois_actuel){
            /* Cas ou a besoin de 42 cases */
            $nombreJoursdansMois = 42;
            $nombreJoursdansMoisBDD = '+41 day';
        }
        else{
            /* Cas ou on a besoin de 35 cases */
            $nombreJoursdansMois = 35;
            $nombreJoursdansMoisBDD = '+34 day';
        }

        /* Création du premier jour et dernier jour du mois pour récupération BDD */
        $dateDebutMoisBDDobjet = DateTime::createFromFormat('l d/m/Y', $debut);
        $dateDebutMoisBDD = $dateDebutMoisBDDobjet->format('Y-m-d');
        $dateDebutMoisBDDobjet->modify($nombreJoursdansMoisBDD);
        $dateFinMoisBDD = $dateDebutMoisBDDobjet->format('Y-m-d');

        /* Récupération des pixels liés à l'utilisateur entre la date de début et la date de fin */

        $pixels = $bdd->prepare("SELECT * FROM pixel WHERE jour BETWEEN :dateDebut AND :dateFin AND utilisateur_id = :idUtilisateur");
        $pixels->execute(array(
            'dateDebut' => $dateDebutMoisBDD,
            'dateFin' => $dateFinMoisBDD,
            'idUtilisateur' => $idUtilisateur
        ));

        $humeurs = $bdd->prepare("SELECT id FROM humeur WHERE utilisateur_id = :idUtilisateur");
        $humeurs->execute(array(
            'idUtilisateur' => $idUtilisateur
        ));

        /* Création des tableaux associatifs pour faire le lien entre le jour et l'humeur liée au jour */

        $dateVersId = array();
        $dateVersEmoji = array();
        foreach($pixels as $pixel){
            $dateVersId[$pixel['jour']] = $pixel['humeur_id'];
            $dateVersEmoji[$pixel['jour']] = $pixel['symbole'];
        }

        $idVersCouleur = array();
        $compteur = 0;
        foreach($humeurs as $humeur){
            $compteur++;
           $idVersCouleur[ $humeur['id']] = "couleur-humeur-".$compteur;
        }  
        
        /* Affichage de la liste du jour en fonction du mois sur lequel on est  */

        for($compteur_affichage_mois = 1; $compteur_affichage_mois <= $nombreJoursdansMois; $compteur_affichage_mois++){
            $contenu = $test;
            $datedujour = $date_objet->format('Y-m-d');
            $jourActuel = $date_objet->format('d');
            $moisdujour = $date_objet->format('m');

            if ($moisdujour == $mois_actuel){
                $case = "<li data-date=\"".$contenu."\" class=\"mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><a href=\"selection-humeur.php?date-du-jour=$datedujour\" class=\"lien-modif-humeur\" > <span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> <span class=\"numero-jour mois-actuel\">".$jourActuel."</span> </a></li>";
            }
            else{
                $case = "<li data-date=\"".$contenu."\" class=\"mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><a href=\"selection-humeur.php?date-du-jour=$datedujour\" class=\"lien-modif-humeur\" > <span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> <span class=\"numero-jour\">".$jourActuel."</span> </a></li>";
            }
            
          
          echo $case;

          //$debut = date('l d/m/Y', strtotime($debut . ' +1 day'));
          $date_objet->modify('+1 day');
          $test=$date_objet->format('l d/m/Y');
        }               
      }

      function genererAnnee($annee_actuelle, $bdd, $idUtilisateur){

        date_default_timezone_set('Europe/Paris');
    
      }