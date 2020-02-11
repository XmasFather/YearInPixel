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
     $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
 
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
    /*$chaine_emoji = "😂 🤣 🤣 😃 😃 🤗 🤗 😚";

    function genererPackEmoji($chaine_emoji){
        echo '<li>
            <span onclick="changerPackEmoji(this)">😀</span>
            <ul>';
            $liste_emojis = str_split($chaine_emoji);
        foreach($liste_emojis as $affichage_final){
            echo "<li onclick=\"add('".$affichage_final."')\">".$affichage_final."</li>";
        }
        echo "</ul></li>";
    }*/
?>
                    <ul class="emoji-picker">
                    <?php
                    
                    /*genererPackEmoji($chaine_emoji);*/

                    ?>
                        <li>
                            <span onclick="changerPackEmoji(this)">😀</span>
                            <ul>
                                <li onclick="add('😀')">😀</li>
                                <li onclick="add('😁')">😁</li>
                                <li onclick="add('😂')">😂</li>
                                <li onclick="add('🤣')">🤣</li>
                                <li onclick="add('😃')">😃</li>
                                <li onclick="add('😄')">😄</li>
                                <li onclick="add('😅')">😅</li>
                                <li onclick="add('😊')">😊</li>
                                <li onclick="add('😎')">😎</li>
                                <li onclick="add('😍')">😍</li>
                                <li onclick="add('😘')">😘</li>
                                <li onclick="add('🥰')">🥰</li>
                                <li onclick="add('🤗')">🤗</li>
                                <li onclick="add('😑')">😑</li>
                                <li onclick="add('🙄')">🙄</li>
                                <li onclick="add('😏')">😏</li>
                                <li onclick="add('😥')">😥</li>
                                <li onclick="add('😮')">😮</li>
                                
                                <li onclick="add('😪')">😪</li>
                                <li onclick="add('😴')">😴</li>
                                <li onclick="add('😌')">😌</li>
                                <li onclick="add('😜')">😜</li>
                                <li onclick="add('🤤')">🤤</li>
                                <li onclick="add('😒')">😒</li>
                                <li onclick="add('😔')">😔</li>
                                <li onclick="add('🙃')">🙃</li>
                                <li onclick="add('😤')">😤</li>
                                <li onclick="add('😭')">😭</li>
                                
                                <li onclick="add('🤮')">🤮</li>
                                <li onclick="add('🤒')">🤒</li>
                                <li onclick="add('🥳')">🥳</li>
                                <li onclick="add('🥴')">🥴</li>
                                
                                <li onclick="add('🥵')">🥵</li>
                                <li onclick="add('🥶')">🥶</li>
                                <li onclick="add('🤯')">🤯</li>
                                <li onclick="add('🥴')">🥴</li>
                            </ul>
                        </li>
                        <li>
                            <span onclick="changerPackEmoji(this)">☎️</span>
                            <ul class="hide">
                            <li onclick="add('💸')">💸</li>
                            <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('💸')">💸</li>
                                
                            </ul>
                        </li>
                        <li>
                            <span onclick="changerPackEmoji(this)">🎁</span>
                            <ul class="hide">
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                            </ul>
                        </li>
                        <li>
                            <span onclick="changerPackEmoji(this)">🎉</span>
                            <ul class="hide">
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                            </ul>
                        </li>
                        <li>
                            <span onclick="changerPackEmoji(this)">💸</span>
                            <ul class="hide">
                                <li onclick="add('💸')">💸</li>
                                <li onclick="add('🎉')">🎉</li>
                                <li onclick="add('🎁')">🎁</li>
                                <li onclick="add('☎️')">☎️</li>
                            </ul>
                        </li>
                        <li>
                            <a href="packs-emojis">+</a>
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
<script>const add = emoji => document.querySelector('#emoji-selectionne-affichage').value=emoji;</script>
<script>

     function changerPackEmoji(monBouton){
        var sibling = monBouton.nextElementSibling;
        var tousBoutons = document.querySelectorAll('.emoji-picker ul');

        for (var i = 0; i < tousBoutons.length; i++) {
            tousBoutons[i].classList.add('hide');
        }
        
        sibling.classList.remove('hide');
     }
</script>
    
</body>
</html>