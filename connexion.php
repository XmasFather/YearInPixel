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
    <title>Year in Pixel | Connexion</title>
</head>
<body>
    <header class="header-principal">
        <h1>Year In <span class="couleur-1">P</span><span class="couleur-2">i</span><span class="couleur-3">x</span><span class="couleur-4">e</span><span class="couleur-5">l</span><span class="couleur-6">s</span>
        </h1>
    </header> 
   <main class="main-compte">
        <h2 class="titre-compte">s'identifier</h2>
        <form class="formulaire-compte" name="formulaire-connexion" action="" method="post">
            <p>identifiant</p>
            <input type="text" name="pseudo"/>
            <p>mot de passe</p>
            <input type="password" name="motdepasse"/>
            <input class="bouton-submit" type="submit" value="connexion"/>
            <div>
                <p>Pas encore inscrit ? clique <a href="creation-compte.php">ici</a></p>
            </div>
        </form>
        
   </main>
   <footer>
    <p>Proudly designed by Philaé, Myrial & Quentin in California</p>
  </footer>
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

$pseudo = $_POST['pseudo'];

//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare("SELECT id, motdepasse FROM utilisateur WHERE pseudo = :pseudo");
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
//En attendant d'avoir les mdps hashés dans la BDD on utilisera un comparateur booleen
/*$isPasswordCorrect = password_verify($_POST['motdepasse'], $resultat['motdepasse']);*/

if($_POST['motdepasse'] == $resultat['motdepasse']){
    $isPasswordCorrect = true;
}

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
        header('location:test-connexion.php');
        exit();
    }
    else {
        echo "ID :".$resultat['id']."\n";
        echo $pseudo."\n";
        echo $_POST['motdepasse']."\n";
        echo $resultat['motdepasse']."\n";
        echo 'Identifiant ou mot de passe incorrect 2';
    }
}

?>