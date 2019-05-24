<?php

// ******  Configuration - Debut ******

   $DBhost  = "marolleaznyip1.mysql.db:3306";
   $DBowner = "marolleaznyip1";
   $DBpw    = "YearInPixel1";
   $DBName  = "marolleaznyip1";

// ******  Configuration - Fin ******

  $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;


   try{
      echo " <font color=blue><b> Etablissement de la connexion SQL en mode PDO </b></font> <br>  <br>";
      $pdo = new PDO($DBconnect, $DBowner, $DBpw);
      echo " new PDO = <b>OK</b> <br> \n";
      echo " <b> Fermeture de la connexion SQL en mode PDO </b> <br>  <br>";

      $pdo = null;
      }

   catch (PDOException $e)

      {

      echo "Connexion échouée : <font color=red><b>" . $e->getMessage()."</b></font> <br> \n";

      echo "<br>";  // Ligne de séparation
      echo "Essaie de nouvelle connexion en local";
      $DBhost  = "localhost";
      $DBowner = "root";
      $DBpw    = "";
      $DBName  = "test";
      $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;
      try {
        echo " <font color=blue><b> Etablissement de la connexion SQL en mode PDO </b></font> <br>  <br>";
        $pdo = new PDO($DBconnect, $DBowner, $DBpw);
        echo " new PDO = <b>OK</b> <br> \n";
        echo " <b> Fermeture de la connexion SQL en mode PDO </b> <br>  <br>";

        $pdo = null;

      } catch (PDOException $e) {
        echo "Connexion échouée : <font color=green><b>" . $e->getMessage()."</b></font> <br> \n";

        echo "<br>";  // Ligne de séparation
      }


      }


?>
