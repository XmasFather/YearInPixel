<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="color.css">
  <link rel="stylesheet" href="master.css">
  <title>Year in Pixel</title>
</head>
<body>
<?php

$mois_actuel = isset($_GET["mois"]) ? $_GET['mois'] : date("m");
echo $mois_actuel; 
$annee_actuelle = isset($_GET["annee"]) ? $_GET['annee'] : date("Y");
echo $annee_actuelle;

$mois_precedent = $mois_actuel-1;
echo $mois_precedent;
if ( $mois_precedent == 0 ){
  $annee_precedente = $annee_actuelle-1;
  $mois_precedent = 12;
}
else {
  $annee_precedente = $annee_actuelle;
}

$mois_suivant = $mois_actuel+1;
if ( $mois_suivant == 13 ){
  $annee_suivante = $annee_actuelle+1;
  $mois_suivant = 1;
}
else{
  $annee_suivante = $annee_actuelle;
}

?>



  <header class="header-principal">
    <h1>Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
    </h1>
  </header>
  <main>
    <header class="header-main">
      <nav role="navigation">
        
      </nav>
      <a href="yearinpixel.php?mois=<?=$mois_precedent?>&amp;?annee=<?=$annee_precedente?>">Mois prédécent</a>
      <a href="yearinpixel.php?mois=<?=$mois_suivant?>&amp;?annee=<?=$annee_suivante?>">Mois suivant</a>
      <h2>Mois <--> Année</h2>
    </header>
    <!--Mois ou année géneré à partir du changement -->
    <section class="calendrier">
      <ul id="nom-jours" class="">
        <li>L</li>
        <li>M</li>
        <li>M</li>
        <li>J</li>
        <li>V</li>
        <li>S</li>
        <li>D</li>
      </ul>
    
      <ul id="nom-mois" class="hide">
        <li>J</li>
        <li>F</li>
        <li>M</li>
        <li>A</li>
        <li>M</li>
        <li>J</li>
        <li>J</li>
        <li>A</li>
        <li>S</li>
        <li>O</li>
        <li>N</li>
        <li>D</li>
      </ul>
    
      <ul id="numero-jours" class="hide">
        <li>rien</li>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <li>7</li>
        <li>8</li>
        <li>9</li>
        <li>10</li>
        <li>11</li>
        <li>12</li>
        <li>13</li>
        <li>14</li>
        <li>15</li>
        <li>16</li>
        <li>17</li>
        <li>18</li>
        <li>19</li>
        <li>20</li>
        <li>21</li>
        <li>22</li>
        <li>23</li>
        <li>24</li>
        <li>25</li>
        <li>26</li>
        <li>27</li>
        <li>28</li>
        <li>29</li>
        <li>30</li>
        <li>31</li>
      </ul>
    
      <?php

        echo "<ul id=\"liste-jours\" class=\"mois\">";

          function genererMois($mois_actuel, $annee_actuelle){


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
              $case = "<li data-date=\"".$contenu."\" class=\"mois\">".$contenu."</li>";
              echo $case;

              //$debut = date('l d/m/Y', strtotime($debut . ' +1 day'));
              $date_objet->modify('+1 day');
              $test=$date_objet->format('l d/m/Y');
            }
            
            
          }

          genererMois($mois_actuel,$annee_actuelle);






/*
          // TROUVER LE NUMÉRO DE SEMAINE DU 1ER JOUR DU MOIS
        $date_test = "2020-01-16";
        $bon_format=strtotime ($date_test);
        $numero_semaine = date('W',$bon_format);
          
          //GÉNÉRER LES JOURS D'UNE SEMAINE A PARTIR DE SON NUMÉRO

          $w = $numero_semaine;
          $i = 1;
          $d = 1;
          $test = date("l d/m/Y", mktime(0, 0, 0, 1, $i+$d, 2020));
          $case = "<li data-date=\"".$test."\" class=\"mois\"></li>";
          // A voir pour l'année pour les numéros de semaines antérieures à la date
          // courante
           
          for($i = 1; $i <= 365; $i++) {
            $week = date("W", mktime(0, 0, 0, 1, $i, 2020));
            if($week == $w) {
              //echo "Le jour " . $i . " est le premier jour de la semaine numéro : " . $w . "<br />";
              // Ensuite pour afficher tous les jours de la semaine
           
              for($d = 0; $d < 7; $d++) {
                echo $case;
              }
              break;
            }
          }


          */
          echo "</ul>";
      ?>
    
    </section>

    <section class="humeur">
      <ul class="liste-humeur">
        <li><div class="carre-couleur-humeur couleur-humeur-1"></div> Heureux</li>
        <li><div class="carre-couleur-humeur couleur-humeur-2"></div> Excité</li>
        <li><div class="carre-couleur-humeur couleur-humeur-3"></div> Normal</li>
        <li><div class="carre-couleur-humeur couleur-humeur-4"></div> Enervé</li>
        <li><div class="carre-couleur-humeur couleur-humeur-5"></div> Stressé</li>
        <li><div class="carre-couleur-humeur couleur-humeur-6"></div> Triste</li>
      </ul>
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
  <script>

    function swap(){
      var nomJours = document.getElementById("nom-jours");
      var nomMois = document.getElementById("nom-mois");
      var numeroJours = document.getElementById("numero-jours");
      var listeJours = document.getElementById("liste-jours");
      var affichage = listeJours.classList;

      if(affichage=="mois"){
        affichage = "annee";
        nomJours.classList.add("hide");
        nomMois.classList.remove("hide");
        numeroJours.classList.remove("hide");
        listeJours.classList.remove("mois");
        listeJours.classList.add("annee");
      }else{
        affichage = "mois";
        nomJours.classList.remove("hide");
        nomMois.classList.add("hide");
        numeroJours.classList.add("hide");
        listeJours.classList.remove("annee");
        listeJours.classList.add("mois");
      }

    }

    document.querySelector("h2").addEventListener('click', swap);  
  </script>
</body>
</html>