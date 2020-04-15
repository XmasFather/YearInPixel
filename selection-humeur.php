<?php
    session_start();
    $id = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');    
     /* Connexion à la BDD */
     $hostname = "localhost";
     $database = "mwe20_qmarolle_yip";
     $username = "mwe20_qmarolle";
     $password = 'AjnfDIoiJC8vLNA';
     $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8MB4'"));
 
     /* Récupération de l'utilisateur  à modifier à terme */
     if($id == NULL){
         header('location:connexion.php');
         exit();
     }
     /* */
     $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $id");
     /* Change l'état de $utilisateur pour le rendre manipulable */
     $utilisateur = $utilisateur->fetch();

     $datedujour = $_GET['date-du-jour'];
?>
<?php   
    /* On appelle le head qui gère toutes infos relative à la page */
    include('head.php');
?>
<style>
    <?php 
        /* Récupération des couleurs personnalisées en fonction des humeurs de l'utilisateur */
        miseEnPlaceCouleur($bdd, $utilisateur[id]);
    ?>
</style>
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
                        choixHumeur($bdd, $id);
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

                <input class="bouton-modification bouton-humeur" type="submit" value="Valider"/>
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