<?php 
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));

$pseudo = $_POST['pseudo'];

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare("SELECT id, motdepasse FROM utilisateur WHERE pseudo = :pseudo");
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
//En attendant d'avoir les mdps hashés dans la BDD on utilisera un comparateur booleen
$isPasswordCorrect = password_verify($_POST['motdepasse'], $resultat['motdepasse']);


if (!$resultat)
{
    echo 'Identifiant ou mot de passe incorrect 1';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        sleep(1);
        header('location:accueil.php');
        exit();
    }
    else {
        echo "ID :".$resultat['id']."\n";
        echo $pseudo."\n";
        echo 'Identifiant ou mot de passe incorrect 2';
    }
}