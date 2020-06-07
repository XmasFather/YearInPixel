<?php 
     require('connexion-bdd.php');

    // Vérification de la validité des informations

    // Hachage du mot de passe
    $pass_hache = crypt($_POST['motdepasse']);

    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];

    // Insertion
    $req = $bdd->prepare('INSERT INTO utilisateur(email, pseudo, motdepasse) VALUES(:email, :pseudo, :motdepasse)');
    $req->execute(array(
        'email' => $email,
        'pseudo' => $pseudo,
        'motdepasse' => $pass_hache,));

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

    