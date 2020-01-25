<?php 
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

    $recuperationIdUtilisateur = $bdd->prepare("SELECT id FROM utilisateur WHERE pseudo = :pseudo");
    $recuperationIdUtilisateur->execute(array(
        'pseudo' => $pseudo));
    $idUtilisateur = $recuperationIdUtilisateur->fetch();

    $valeurHumeurs = ['FF9FBB','E1C4FF','8BF9D0','FF8181','FFC84A','98FFFF'];
    $nomHumeurs = ['Heureux','Enthousiaste','Normal','Enervé','Stressé','Triste'];

    for($i=0; $i<6; $i++){
        $req = $bdd->prepare('INSERT INTO humeur(couleur, intitule, utilisateur_id) VALUES(:couleur, :intitule, :idutilisateur)');
        $req->execute(array(
            'couleur' => $valeurHumeurs[$i],
            'intitule' => $nomHumeurs[$i],
            'idutilisateur' => $idUtilisateur[0],));
    }

    header('location:connexion.php');
    exit();

    