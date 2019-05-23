<?php
  try{
    $bdd= new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
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
