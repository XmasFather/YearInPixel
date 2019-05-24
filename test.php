<?php

   error_reporting(E_ALL);   // Activer le rapport d'erreurs PHP

   // A partir de PHP 5.6, sinon les caractères accentués seront mal affichés

   ini_set('default_charset', 'iso8859-1');

function getmicrotime()

   {

   list($usec, $sec) = explode(" ",microtime());

   return ((float)$usec + (float)$sec);

   }



   $Date_start = getmicrotime();





// ******  Exemples de configuration selon les hébergements mutualisés ******



//      $DBhost  = "<Nom_de_la_Base>.mysql.db";

//      $DBowner = "<Nom_de_la_Base>";  // Ton login SQL

//      $DBName  = $DBowner;





// ******  Fin des exemples de configuration





// ******  Configuration - Debut ******

   $DBhost  = "<Nom_de_la_Base>.mysql.db";   // Par exemple

   $DBowner = "<Nom_de_la_Base>";  // ton login SQL

   $DBpw    = "";  // ton password SQL

   $DBName  = $DBowner;

// ******  Configuration - Fin ******





/*   Hébergement mutualisé :



Serveur SQL de base : port Vide ou 3306



Serveur SQL privé :

   Extrait de https://www.ovh.com/fr/g2023.tout_sur_le_sql_prive







*/



   //  Version de PHP



   echo "Version de PHP : <b>".phpversion()."</b><br><br> \n";



   $Table_SQL = "Tab_test_DB";



   If ($DBPort == "")   $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;

   Else

      {

      // Serveur SQL PRIVE de OVH

      $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost.";port=".$DBPort;

      }



   echo " \$DBconnect = '<b>" .$DBconnect. "</b>' <br>";

   echo "<br> \n";



   $user = 'nomdelabase';

   $password = 'motdepasse';



   try

      {



      // *************************************************************

      // *   Connexion à une base ODBC avec l'invocation de pilote   *

      // *************************************************************



      echo " <font color=blue><b> Etablissement de la connexion SQL en mode PDO </b></font> <br>  <br>";



      $pdo = new PDO($DBconnect, $DBowner, $DBpw);



      echo " new PDO = <b>OK</b> <br> \n";



      // *******************************

      // *   Traitement des requêtes   *

      // *******************************



      // BONUS: On fait quelque chose d'utile avec ....

      // foreach($pdo->query('SHOW TABLES') as $row)

      //    {

      //    echo"<pre>"; print_r($row); echo "/<pre>";

      //    }



      echo " Test de DROP/CREATE de la table '<b>" .$Table_SQL. "</b>' dans la base '<b>" .$DBName. "</b>' sur le serveur '<b>" .$DBhost. "</b>' <br>  <br>";



      //  Supression de la table Tab_test_DB



      $sql_query="DROP TABLE IF EXISTS `Tab_test_DB` ";    // Requê

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      echo "Supression de la table '<b>" .$Table_SQL. "</b>' - \$sql_query=<b>$sql_query</b><br> \n";



      //  Création de la table Tab_test_DB



      $sql_query="CREATE TABLE `Tab_test_DB` (  `Id` int(11) NOT NULL auto_increment,  `NOM` varchar(32) NOT NULL default '',  `PRENOM` varchar(32) NOT NULL default '', PRIMARY KEY  (`Id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 ";    // Requête

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      echo "Création de la table '<b>" .$Table_SQL. "</b>' - \$sql_query=<b>$sql_query</b><br> \n";



      echo "<br>";  // Ligne de séparation



      //  Ajout d'un Premier enregistrement



      $sql_query="INSERT INTO `Tab_test_DB`  values ('','DURANDAL','Michel')  ";    // Requête

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      echo "Ajout d'un enregistrement - \$sql_query=<b>$sql_query</b><br> \n";



      //  Ajout d'un Deuxième enregistrement



      $sql_query="INSERT INTO `$Table_SQL`  values ('','DURANDAL','Pierre')  ";    // Requête

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      echo "Ajout d'un enregistrement - \$sql_query=<b>$sql_query</b><br> \n";



      //  Ajout d'un Troisième enregistrement



      $sql_query="INSERT INTO `Tab_test_DB`  values ('','accents-éèàâ','Jean-Noël')  ";    // Requête

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      echo "Ajout d'un enregistrement - \$sql_query=<b>$sql_query</b><br> \n";



      echo "<br>";  // Ligne de séparation



      //  SELECT dans la table Tab_test_DB : NOM='DURANDAL' et  PRENOM = 'Pierre'



      $sql_query="SELECT Id, NOM, PRENOM FROM `Tab_test_DB` WHERE NOM = 'DURANDAL' AND PRENOM = 'Pierre'";    // Requête

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      $Count = 0;

      echo "SELECT dans la table '<b>" .$Table_SQL. "</b>' - \$sql_query=<b>$sql_query</b><br> \n";

      while($row = $result_query->fetch())

         {

         $Count     = $Count + 1;

         $NOM       = $row['NOM'];

         $PRENOM    = $row['PRENOM'];

         echo " Table  '<b>" .$Table_SQL. "</b>' : <b>".$Count."</b> - \$NOM=<b>".$NOM."</b> - \$PRENOM=<b>".$PRENOM."</b> <br> \n";

         }

      $result_query->closeCursor();



      echo "<br>";  // Ligne de séparation



      //  SELECT dans la table Tab_test_DB : tous les enregistrements



      $sql_query="SELECT Id, NOM, PRENOM FROM `Tab_test_DB` ";    // Requête

      $result_query = $pdo->query($sql_query);       // Exécution de la requête

      $Count = 0;

      echo "SELECT dans la table '<b>" .$Table_SQL. "</b>' - \$sql_query=<b>$sql_query</b><br> \n";

      while($row = $result_query->fetch())

         {

         $Count     = $Count + 1;

         $NOM       = $row['NOM'];

         $PRENOM    = $row['PRENOM'];

         echo " Table  '<b>" .$Table_SQL. "</b>' : <b>".$Count."</b> - \$NOM=<b>".$NOM."</b> - \$PRENOM=<b>".$PRENOM."</b> <br> \n";

         }

      $result_query->closeCursor();



      echo "<br>";  // Ligne de séparation



      // Fermeture de la connexion



      echo " <b> Fermeture de la connexion SQL en mode PDO </b> <br>  <br>";

      $pdo = null;



      }

   catch (PDOException $e)

      {

      echo "Connexion échouée : <font color=red><b>" . $e->getMessage()."</b></font> <br> \n";

      echo "<br>";  // Ligne de séparation

      }





   $Date_end = getmicrotime();

   $Duree = $Date_end - $Date_start;

   $Duree = sprintf("%01.2f", $Duree);

   echo " Durée du traitement = <b>$Duree</b> secondes <br> \n";



?>
