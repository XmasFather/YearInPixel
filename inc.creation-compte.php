<?php
/* Test : Savoir si l'on arrive bien de la page creation de compte et non d'une page extérieure en faisant un check sur le bouton d'envoi */
if (isset($_POST['creation-compte-envoi'])){

  require('connexion-bdd.php');  

  /* Récupération des valeurs envoyées sur des variables internes à la page */
  $email = $_POST['email'];
  $username = $_POST['username'];
  $mdp = $_POST['motdepasse'];
  $mdprepeat = $_POST['motdepasse-reapeat'];

  /* On commence la série de test pour savoir si les infos à rentrer dans la BDD sont valides */
  /* Test : Valeurs vide */
  if(empty($email) || empty($username) || empty($mdp) || empty($mdprepeat)){
      header("location: creation-compte.php?error=emptyfields&mail=".$email."&username=".$username);
      exit();
  }
  /* Test : email ET nom d'utilisateur non valides */
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$", $username)){
    header("location: creation-compte.php?error=invalidemailandusername");
      exit();
  }
  /* Test : email non valide */
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location: creation-compte.php?error=invalidemail&username=".$username);
      exit();
  }
  /* Test : username non valide !!! A VERIFIER !!! */
  else if(!true/*!preg_match("/^[a-zA-Z0-9]*$", $username)*/){
    header("location: creation-compte.php?error=invalidusername&email=".$email); /* Je ne sais pas pourquoi ça ne marche pas */
      exit();
  }
  /* Test : Mots de passes identiques */
  else if($mdp !== $mdprepeat){
    header("location: creation-compte.php?error=passwordcheck&mail=".$email."&username=".$username);
      exit();
  }
  /* Début des requêtes vers la base pour vérifier si les informations sont déjà prises ou non */
}
else{
    echo "NOT Ok";
}