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
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    /* */
    $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id=$id");
    /* Change l'état de $utilisateur pour le rendre manipulable */
    $utilisateur = $utilisateur->fetch();

    /* Récupération du mois et de l'année */

    $mois_actuel = isset($_GET["mois"]) ? $_GET['mois'] : date("m");
    $annee_actuelle = isset($_GET["annee"]) ? $_GET['annee'] : date("Y");

    /* Set des valeurs à envoyer */

    $mois_precedent = $mois_actuel-1;
    if ( $mois_precedent == 0 ){
    $annee_precedente = $annee_actuelle-1;
    $mois_precedent = 12;
    }
    else {
    $annee_precedente = $annee_actuelle;
    }

    $mois_suivant = $mois_actuel+1;
    if ( $mois_suivant == 13 ){
    $annee_suivante = $annee_actuelle+1;
    $mois_suivant = 1;
    }
    else{
    $annee_suivante = $annee_actuelle;
}
    

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
            

            


            <a href="accueil.php?mois=<?=$mois_precedent?>&amp;annee=<?=$annee_precedente?>" class="centrer-elmt largeur-icone">
                <svg xmlns="http://www.w3.org/2000/svg" width="43.612" height="35.504" viewBox="0 0 43.612 35.504">
                    <rect id="Rectangle_2" data-name="Rectangle 2" width="11.311" height="11.311" transform="translate(12.91 11.899)" class="fill-1"/>
                    <rect id="Rectangle_3" data-name="Rectangle 3" width="11.311" height="11.311" transform="translate(22.606 11.899)" class="fill-2"/>
                    <rect id="Rectangle_4" data-name="Rectangle 4" width="11.311" height="11.311" transform="translate(32.301 11.899)" class="fill-3"/>
                    <path id="Tracé_2" data-name="Tracé 2" d="M58.023,134.283l-14.57,14.57,14.57,14.57" transform="translate(-37.09 -131.101)" fill="none" class="stroke-1" stroke-width="9"/>
                </svg>

            </a>

            <?php
                $mois_fr = array(
                    "01" => "Janvier",
                    "1" => "Janvier",
                    "02" => "Février",
                    "2" => "Février",
                    "03" => "Mars",
                    "3" => "Mars",
                    "04" => "Avril",
                    "4" => "Avril",
                    "05" => "Mai",
                    "5" => "Mai",
                    "06" => "Juin",
                    "6" => "Juin",
                    "07" => "Juillet",
                    "7" => "Juillet",
                    "08" => "Août",
                    "8" => "Août",
                    "09" => "Septembre",
                    "9" => "Septembre",
                    "10" => "Octobre",
                    "11" => "Novembre",
                    "12" => "Décembre",
                );
            ?>

            <h2 class="centrer-txt"><?=$mois_fr[$mois_actuel]?> <?=$annee_actuelle?></h2>

            <a href="accueil.php?mois=<?=$mois_suivant?>&amp;annee=<?=$annee_suivante?>"  class="centrer-elmt largeur-icone">
                <svg xmlns="http://www.w3.org/2000/svg" width="44.319" height="36.211" viewBox="0 0 44.319 36.211">
                    <rect id="Rectangle_5" data-name="Rectangle 5" width="11.311" height="11.311" transform="translate(30.702 23.958) rotate(180)" class="fill-1"/>
                    <rect id="Rectangle_6" data-name="Rectangle 6" width="11.311" height="11.311" transform="translate(21.006 23.958) rotate(180)" class="fill-2"/>
                    <rect id="Rectangle_7" data-name="Rectangle 7" width="11.311" height="11.311" transform="translate(11.311 23.958) rotate(180)" class="fill-3"/>
                    <path id="Tracé_3" data-name="Tracé 3" d="M58.023,134.283l-14.57,14.57,14.57,14.57" transform="translate(80.702 166.958) rotate(180)" fill="none" class="stroke-1" stroke-width="10"/>
                </svg>
            </a>
        </header>
        <section class="calendrier">
        <ul id="nom-jours" class="">
            <li>L</li>
            <li>M</li>
            <li>M</li>
            <li>J</li>
            <li>V</li>
            <li>S</li>
            <li>D</li>
        </ul>
        
        <ul id="nom-mois" class="hide">
            <li>J</li>
            <li>F</li>
            <li>M</li>
            <li>A</li>
            <li>M</li>
            <li>J</li>
            <li>J</li>
            <li>A</li>
            <li>S</li>
            <li>O</li>
            <li>N</li>
            <li>D</li>
        </ul>
        
        <ul id="numero-jours" class="hide">
            <li></li>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
            <li>10</li>
            <li>11</li>
            <li>12</li>
            <li>13</li>
            <li>14</li>
            <li>15</li>
            <li>16</li>
            <li>17</li>
            <li>18</li>
            <li>19</li>
            <li>20</li>
            <li>21</li>
            <li>22</li>
            <li>23</li>
            <li>24</li>
            <li>25</li>
            <li>26</li>
            <li>27</li>
            <li>28</li>
            <li>29</li>
            <li>30</li>
            <li>31</li>
        </ul>
        
        <ul id="liste-jours" class="mois">
            <?=genererMois($mois_actuel,$annee_actuelle);?>
        </ul>
        
        </section>
        <section class="humeur">
            <?php 
                /* Affichage des humeurs personnalisées de chaque utilisateur */
                affichageHumeur($bdd, $utilisateur[id]); 
            ?>
        </section>
    </main>
    
    <?php 
        /* On appelle le footer qui sera commun à toutes nos pages */
        include('footer.php');
    ?>
    </div>

<script type="text/javascript" src="script.js"></script>
    
</body>
</html>