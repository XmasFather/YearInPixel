<?php
    
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');    
    require('connexion-bdd.php');
    require('utilisateur.php'); 
 
     /* Récupération de l'utilisateur  à modifier à terme */
     if($id == NULL){
         header('location:connexion.php');
         exit();
     }

     $datedujour = $_GET['date-du-jour'];
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
                <h2>Comment vous sentez-vous aujourd'hui ?</h2>
            </header>
            <form action="envoi-humeur.php?date-du-jour=<?=$datedujour?>" method="post">
                <ul class="selection-humeur-du-jour">
                    <?php
                        $couleurs = $bdd->prepare("SELECT * FROM humeur WHERE utilisateur_id = :idutilisateur");
                        $couleurs->execute(array(
                            ':idutilisateur' => $id));
                        $compteur = 0;
                        foreach($couleurs as $humeur){
                            $compteur ++;
                            echo "<li> \n";
                            echo "<input type=\"radio\" id=\"".$humeur[intitule]."\" name=\"humeur\" value=\"".$humeur['id']."\">\n";
                            echo "<label for=\"".$humeur[intitule]."\"> \n";
                            echo "  <div class=\"carre-couleur-humeur couleur-humeur-".$compteur."\"></div> ".$humeur[intitule]."\n";
                            echo "</label>";
                            echo "</li> \n"; 
                        }
                    ?>
                </ul>
                <h3>Quel emoji représente le mieux votre journée ?</h3>


<?php

    function genererPackEmoji($bdd){

        $packs = $bdd->query("SELECT * FROM packemojis");
        $packs = $packs->fetchAll();
        foreach($packs as $pack){
            echo '<li>
                    <span onclick="changerPackEmoji(this)">'.$pack['emoji_categorie'].'</span>
                    <ul class="hide">';
                    $liste_emojis = explode(" ", $pack['liste_emojis']);
                foreach($liste_emojis as $affichage_final){
                    echo "<li>".$affichage_final."</li>";
                }
                echo "</ul></li>";
        }
        
    }
?> 

                    <ul class="emoji-picker">
                    <?php
                    
                    genererPackEmoji($bdd);

                    ?>
                        
                        <li>
                            <a href="obtenir-packs-emojis.php">+</a>
                        </li>
                    </ul>

                <input readonly type="text" id="emoji-selectionne-affichage" name="emoji" maxlength="1">

                <input class="bouton bouton-humeur" type="submit" value="Valider"/>
            </form>
            
        </main>
        <?php 
            /* On appelle le footer qui sera commun à toutes nos pages */
            include('footer.php');
        ?>
    </div>

<script type="text/javascript" src="script.js"></script>
<script>

    document.querySelector(".emoji-picker li ul").classList.remove("hide");

</script>
    
</body>
</html>