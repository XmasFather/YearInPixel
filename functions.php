<?php
    /* Affiche les humeurs de l'utilisateur - Disponnible sur la vue Mois et Années*/
    function affichageHumeur($bdd, $idUtilisateur){
        $couleurs = $bdd->query("SELECT * FROM humeur WHERE utilisateur_id = $idUtilisateur");
        echo "<ul class=\"liste-humeur\"> \n";
        $compteur = 0;
        foreach($couleurs as $humeur){
            $compteur ++;
            echo "  <li><div class=\"carre-couleur-humeur couleur-humeur-".$compteur."\"></div> ".$humeur['intitule']."</li> \n";
        }
        echo "</ul> \n";
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

        $aujourdhui = date('Y-m-d');

        for($compteur_affichage_mois = 1; $compteur_affichage_mois <= $nombreJoursdansMois; $compteur_affichage_mois++){
            $contenu = $test;
            $datedujour = $date_objet->format('Y-m-d');
            $jourActuel = $date_objet->format('d');
            $moisdujour = $date_objet->format('m');

            if ($moisdujour == $mois_actuel){
                if($datedujour <= $aujourdhui){
                    $case = "<li data-date=\"".$contenu."\" class=\"mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><a href=\"selection-humeur.php?date-du-jour=$datedujour\" class=\"lien-modif-humeur\" > <span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> <span class=\"numero-jour mois-actuel\">".$jourActuel."</span> </a></li>";
                }else{
                    $case = "<li data-date=\"".$contenu."\" class=\"jour-ulterieur mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> <span class=\"numero-jour mois-actuel\">".$jourActuel."</span></li>";
                }
            }
            else{
                if($datedujour <= $aujourdhui){
                    $case = "<li data-date=\"".$contenu."\" class=\"mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><a href=\"selection-humeur.php?date-du-jour=$datedujour\" class=\"lien-modif-humeur\" > <span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> <span class=\"numero-jour\">".$jourActuel."</span> </a></li>";
                }else{
                    $case = "<li data-date=\"".$contenu."\" class=\"jour-ulterieur mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"> <span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> <span class=\"numero-jour\">".$jourActuel."</span></li>";
                }
                
            }
            
          
          echo $case;

          //$debut = date('l d/m/Y', strtotime($debut . ' +1 day'));
          $date_objet->modify('+1 day');
          $test=$date_objet->format('l d/m/Y');
        }               
      }


      ///////////////////////////////////////////////////////////////////////////////////////////////////////////

      function genererAnnee($annee_actuelle, $bdd, $idUtilisateur){

        date_default_timezone_set('Europe/Paris');

        $debutAnnee = $annee_actuelle."-01-01";
        $anneeSuivante = $annee_actuelle+1;
        $finAnnee = $anneeSuivante."-01-01";

        $debut = date("l d/m/Y", strtotime($debutAnnee));
        $date_objet = DateTime::createFromFormat('l d/m/Y', $debut);
        $test = $date_objet->format('l d/m/Y');

        $dureeAnnee = (strtotime($finAnnee) - strtotime($debutAnnee));

        $nombreJourAnnee = number_format($dureeAnnee/86400 ,0);

        /* Récupération des pixels liés à l'utilisateur entre la date de début et la date de fin */

        $pixels = $bdd->prepare("SELECT * FROM pixel WHERE jour BETWEEN :dateDebut AND :dateFin AND utilisateur_id = :idUtilisateur");
        $pixels->execute(array(
            'dateDebut' => $debutAnnee,
            'dateFin' => $finAnnee,
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

        $aujourdhui = date('Y-m-d');

        for ($mois=1; $mois <=12 ; $mois++) { 
            for ($jours=1; $jours <= 31 ; $jours++) { 
                $contenu = $test;
                $datedujour = $date_objet->format('Y-m-d');
                $datedujourComparaison = $date_objet->format('Y-n-j');
                $jourAInserer = $annee_actuelle."-".$mois."-".$jours;

                if($datedujourComparaison == $jourAInserer){
                    if($datedujour <= $aujourdhui){
                        $case = "<li data-date=\"".$datedujour."\" class=\"mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><a href=\"selection-humeur.php?date-du-jour=$datedujour\" class=\"lien-modif-humeur\" > <span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span> </a></li>";
                    }else{
                        $case = "<li data-date=\"".$datedujour."\" class=\"jour-ulterieur mois ".$idVersCouleur[$dateVersId[$datedujour]]."\"><span class=\"emoji\">".$dateVersEmoji[$datedujour]."</span></li>";
                    }
                    
                    $date_objet->modify('+1 day');
                    $test=$date_objet->format('l d/m/Y');
                }else{
                    $case = "<li class=\"jour-inexistant\"></li>";
                }    
                echo $case; 
            }
        }

        
      }