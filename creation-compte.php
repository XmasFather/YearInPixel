<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="color.css">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="compte-utilisateur.css">
    <link rel="icon" href="favicon.ico" />
    <title>Year in Pixel | Création de compte</title>
</head>
<body>
    <?php 
        /* On appelle le header qui sera commun à toutes nos pages */
        include('header.php');
    ?>
    <main class="main-compte">
        <h2 class="titre-compte">créer un compte</h2>
        <form class="formulaire-compte" name="formulaire-creation-compte" action="" method="post">
            <p>adresse mail</p>
            <input type="text" name="email"/>
            <p>identifiant</p>
            <input type="text" name="pseudo"/>
            <p>mot de passe</p>
            <input type="password" name="motdepasse"/>
            <p>confirmation du mot de passe</p>
            <input type="password" name="confirmation-mot-de-passe"/>
            <input class="bouton-submit" type="submit" value="créer mon compte"/>
        </form>
   </main>
   <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
</body>
</html>

<?php 
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

// Vérification de la validité des informations

// Hachage du mot de passe
//$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$email = $_POST['email'];
$pseudo = $_POST['pseudo'];
$mdp = $_POST['motdepasse'];

// Insertion
$req = $bdd->prepare('INSERT INTO utilisateur(email, pseudo, motdepasse) VALUES(:email, :pseudo, :motdepasse)');
$req->execute(array(
    'email' => $email,
    'pseudo' => $pseudo,
    'motdepasse' => $mdp,));
$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Identifiant ou mot de passe incorrect 1';
}
else
{
    echo "compte créé";
}

?>
