<?php
function calendrier(){
  echo '<table id="calendrier" \n> ';
    /*affichage des mois*/
    echo "<tr> \n";
    echo "<td></td>\n";
    echo "<td>J</td>\n";
    echo "<td>F</td>\n";
    echo "<td>M</td>\n";
    echo "<td>A</td>\n";
    echo "<td>M</td>\n";
    echo "<td>J</td>\n";
    echo "<td>J</td>\n";
    echo "<td>A</td>\n";
    echo "<td>S</td>\n";
    echo "<td>O</td>\n";
    echo "<td>N</td>\n";
    echo "<td>D</td>\n";
    echo "</tr>\n";
    /*affichage des différents jours*/
    for($i = 1; $i <= 31; $i++){
      echo "<tr> \n";
      echo '<td>'. $i ."</td>\n";
      for($j = 1; $j <= 12; $j++){
        /*Savoir si on est en février*/
        if($i>=29 && $j==2){
          echo '<td>'."</td>\n";
        }else{
          /*Savoir si on est bien sur un mois a 31 jours ou non*/
          if ($i == 31) {
            switch ($j) {
              case '1':
              case '3':
              case '5':
              case '7':
              case '8':
              case '10':
              case '12':
                echo '<td class="case">'."</td>\n";
                break;

              default:
                echo '<td>'."</td>\n";
                break;
            }
          }else {
            echo '<td class="case">'."</td>\n";
          }
        }
      }
      echo "</tr>\n";
    }
  echo "</table>\n";
}

function infoCouleurs(){
  echo '<ul class="liste-couleurs">'."\n";
  for ($i=1; $i <= 6; $i++) {
    echo '<li><div class="color_'.$i.'"></div>Humeur '.$i.'</li>'."\n";
  }
  echo "</ul> \n";
}

function connexionBDD(){
  $DBhost  = "marolleaznyip1.mysql.db:3306";
  $DBowner = "marolleaznyip1";
  $DBpw    = "YearInPixel1";
  $DBName  = "marolleaznyip1";

// ******  Configuration - Fin ******

 $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;


  try{
     $pdo = new PDO($DBconnect, $DBowner, $DBpw);
     }

  catch (PDOException $e)

     {
     $DBhost  = "localhost";
     $DBowner = "root";
     $DBpw    = "";
     $DBName  = "test";
     $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;
     try {
       $pdo = new PDO($DBconnect, $DBowner, $DBpw);

     } catch (PDOException $e) {
       echo "Connexion échouée : <font color=green><b>" . $e->getMessage()."</b></font> <br> \n";
     }


     }
}
 ?>
