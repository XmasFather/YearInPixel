<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Year in Pixel | Quentin Marolleau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php require("functions.php");?>

    <p>Salut on va ajouter des données dans la BDD</p>
    <?php
      $bdd = connexionBDD();
      $pass_hash = password_hash('JeanDidier', PASSWORD_DEFAULT);
      echo $pass_hash;

     ?>

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
           $req = $bdd->prepare('INSERT INTO utilisateur(pseudo, password, email, date_inscription) VALUES(:pseudo, :password, :email, CURDATE())');
           $req->execute(array(
             'pseudo' => "Quentin",
             'pass' => "Salut les amis",
             'email' => "test@test.test"
           ));

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

             $bdd = 'INSERT INTO utilisateur(pseudo, password, email, date_inscription) VALUES("Quentin", "Mot de passe", "unmail@mail.com", CURDATE())';

             echo " <b> Fermeture de la connexion SQL en mode PDO </b> <br>  <br>";
             $pdo = null;

           } catch (PDOException $e) {
             echo "Connexion échouée : <font color=green><b>" . $e->getMessage()."</b></font> <br> \n";
           }


           }


     ?>

  </body>
</html>
