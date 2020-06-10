<?php
    
    $id = $_COOKIE['id'];
    $pseudo = $_COOKIE['pseudo'];
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');    
    require('connexion-bdd.php');
    require('utilisateur.php'); 
     if($id == NULL){
         header('location:connexion.php');
         exit();
     }
?>
<?php   
    /* On appelle le head qui gère toutes infos relative à la page */
    include('head.php');
?>
 
<body>
    <div class="conteneur">
    <?php 
        /* On appelle le header qui sera commun à toutes nos pages */
        include('header.php');
    ?>
    <main>
        <header class="header-main">
                <h2>Que choisir comme avatar ?</h2>
        </header>
        <form class="liste-avatars" action="envoi-modification-avatar.php" method="post">
            <?php
                /* Affichage le contenu du dossier des avatars sous forme de liste*/ 
                $avatars = scandir("avatars");
                for($i=2; $i<count($avatars); $i++){
                    if ($utilisateur[avatar] == $avatars[$i]){
                        echo "<label>";
                        echo "<input type=\"radio\" checked=\"checked\" name=\"avatar\" value=\"".$avatars[$i]."\">\n";
                        echo "<img src=\"avatars/".$avatars[$i]."\" alt=\"".$avatars[$i]."\">\n";
                        echo "</label>";
                    }
                    else{
                        echo "<label>";
                        echo "<input type=\"radio\" name=\"avatar\" value=\"".$avatars[$i]."\">\n";
                        echo "<img src=\"avatars/".$avatars[$i]."\" alt=\"".$avatars[$i]."\">\n";
                        echo "</label>";
                    }            
                }
            ?>
            <input class="bouton bouton-avatar" type="submit" value="Modifier votre Avatar"/>
        </form >
    </main>
    <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
    </div>

<script type="text/javascript" src="script.js"></script>
    
</body>
</html>