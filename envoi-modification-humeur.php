<?php
    session_start();
    $id = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
    /* Si on a pas d'utilisateur on est redirigé sur la page de connexion */
    if($id == NULL){
        header('location:connexion.php');
        exit();
    }
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));s

    $humeursutilisateur = $bdd->query("SELECT id FROM humeur WHERE utilisateur_id = $id");
    $humeursutilisateur = $humeursutilisateur->fetch();
    echo $humeursutilisateur;
    echo "id humeur 1 =".$humeursutilisateur[0]."\n";
    echo "id humeur 2 =".$humeursutilisateur[1]."\n";
    echo "id humeur 3 =".$humeursutilisateur[2]."\n";
    echo "id humeur 4 =".$humeursutilisateur[3]."\n";
    echo "id humeur 5 =".$humeursutilisateur[4]."\n";
    echo "id humeur 6 =".$humeursutilisateur[5]."\n";

    echo $_POST['humeur-1']." ".$_POST['couleur-1']."\n";
    echo $_POST['humeur-2']." ".$_POST['couleur-2']."\n";
    echo $_POST['humeur-3']." ".$_POST['couleur-3']."\n";
    echo $_POST['humeur-4']." ".$_POST['couleur-4']."\n";
    echo $_POST['humeur-5']." ".$_POST['couleur-5']."\n";
    echo $_POST['humeur-6']." ".$_POST['couleur-6']."\n";

?>
    
    