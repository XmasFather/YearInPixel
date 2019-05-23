<?php
  try{
    $bdd= new PDO('mysql:host=marolleaznyip1.mysql.db;dbname=marolleaznyip1;charset=utf8', 'marolleaznyip1 ', 'YearInPixel1');
    echo '<p>Connection effectuée</p>';
  }
  catch (Exception $e){
    die('Erreur : '. $e->getMessage());
    echo '<p>NOPE</p>';
  }

$pseudo = $bdd->query('SELECT pseudo FROM user');

while ($donnees = $pseudo->fetch()){
  echo $donnees['pseudo'] . '<br/>';
}

$pseudo->closeCursor();

 ?>
