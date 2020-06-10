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
                <h2>Envie de changer vos humeurs ?<span class="sous-titre">(Cliquez pour modifier vos humeurs)</span></h2>
            </header>
            <form action="envoi-modification-humeur.php" method="post">
            <?php
                /* Récupération des humeurs de l'utilisateur afin de pouvoir la modifier */
                $couleurs = $bdd->prepare("SELECT * FROM humeur WHERE utilisateur_id = :idutilisateur");
                $couleurs->execute(array(
                    ':idutilisateur' => $id));
                $compteur = 0;
                foreach($couleurs as $humeur){
                    $compteur ++;
                    echo "<div class=\"humeur-a-modifier\">\n";
                    echo "<input type=\"color\" class=\"input-couleur\" id=\"couleur-".$compteur."\" name=\"couleur-".$compteur."\" value=\"#".$humeur[couleur]."\">\n";
                    echo "<input type=\"text\" class=\"input-humeur\" id=\"humeur-".$compteur."\" name=\"humeur-".$compteur."\" value=\"".$humeur[intitule]."\"   maxlength=\"20\" >\n";
                    echo "</div>\n";
                }
            ?>
            <input class="bouton bouton-humeur" type="submit" value="Enregistrer vos humeurs"/>
            </form>

            <a href="reset-humeurs.php" class="bouton bouton-reset-humeurs" onclick="return confirm('&Ecirc;tes-vous sûr de vouloir réinitialiser vos humeurs ?')">Remise à zéro des couleurs</a>
            
        </main>
        <?php 
            /* On appelle le footer qui sera commun à toutes nos pages */
            include('footer.php');
        ?>
    </div>

<script type="text/javascript" src="script.js"></script>
    
</body>
</html>