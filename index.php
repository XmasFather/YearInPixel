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
            <h2>Mois <--> Année</h2>
            <a href="index.php?mois=<?=$mois_precedent?>&amp;annee=<?=$annee_precedente?>">Mois prédécent</a>
            <a href="index.php?mois=<?=$mois_suivant?>&amp;annee=<?=$annee_suivante?>">Mois suivant</a>
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