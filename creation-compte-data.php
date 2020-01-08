<?php 
// Vérification de la validité des informations

// Hachage du mot de passe
//$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO utilisateur(email, pseudo, motdepasse) VALUES(:email, :pseudo, :motdepasse)');
$req->execute(array(
    'email' => $email,
    'pseudo' => $pseudo,
    'motdepasse' => $mdp,));