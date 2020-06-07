<?php 
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    require('connexion-bdd.php');

$pseudo = $_POST['pseudo'];

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare("SELECT id, motdepasse FROM utilisateur WHERE pseudo = :pseudo");
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
//En attendant d'avoir les mdps hashés dans la BDD on utilisera un comparateur booleen



if (!$resultat)
{
    echo 'Identifiant ou mot de passe incorrect 1';
}
else
$isPasswordCorrect = password_verify($_POST['motdepasse'], $resultat['motdepasse']);
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('location:accueil.php');
        exit();
        echo 'Vous êtes connecté !';
        
    }
    else {
        echo 'Identifiant ou mot de passe incorrect 2';
    }
}