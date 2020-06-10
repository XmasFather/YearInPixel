<?php
    $id = $_COOKIE['id'];
    $pseudo = $_COOKIE['pseudo'];
    /* Si on a pas d'utilisateur on est redirigé sur la page de connexion */
    if($id == NULL){
        header('location:connexion.php');
        exit();
    }
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    require('connexion-bdd.php');
    require('utilisateur.php'); 

    /* Récupération du mois et de l'année */
    $annee_actuelle = isset($_GET["annee"]) ? $_GET['annee'] : date("Y");

    /* Set des valeurs à envoyer */

    $annee_precedente = $annee_actuelle-1;
    $annee_suivante = $annee_actuelle+1;
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
            
            <a href="annee.php?annee=<?=$annee_precedente?>" class="centrer-elmt largeur-icone">
                <svg xmlns="http://www.w3.org/2000/svg" width="43.612" height="35.504" viewBox="0 0 43.612 35.504">
                    <rect id="Rectangle_2" data-name="Rectangle 2" width="11.311" height="11.311" transform="translate(12.91 11.899)" class="fill-1"/>
                    <rect id="Rectangle_3" data-name="Rectangle 3" width="11.311" height="11.311" transform="translate(22.606 11.899)" class="fill-2"/>
                    <rect id="Rectangle_4" data-name="Rectangle 4" width="11.311" height="11.311" transform="translate(32.301 11.899)" class="fill-3"/>
                    <path id="Tracé_2" data-name="Tracé 2" d="M58.023,134.283l-14.57,14.57,14.57,14.57" transform="translate(-37.09 -131.101)" fill="none" class="stroke-1" stroke-width="9"/>
                </svg>

            </a>

            <h2 class="centrer-txt">Année <?=$annee_actuelle?></h2>

            <a href="annee.php?annee=<?=$annee_suivante?>"  class="centrer-elmt largeur-icone">
                <svg xmlns="http://www.w3.org/2000/svg" width="44.319" height="36.211" viewBox="0 0 44.319 36.211">
                    <rect id="Rectangle_5" data-name="Rectangle 5" width="11.311" height="11.311" transform="translate(30.702 23.958) rotate(180)" class="fill-1"/>
                    <rect id="Rectangle_6" data-name="Rectangle 6" width="11.311" height="11.311" transform="translate(21.006 23.958) rotate(180)" class="fill-2"/>
                    <rect id="Rectangle_7" data-name="Rectangle 7" width="11.311" height="11.311" transform="translate(11.311 23.958) rotate(180)" class="fill-3"/>
                    <path id="Tracé_3" data-name="Tracé 3" d="M58.023,134.283l-14.57,14.57,14.57,14.57" transform="translate(80.702 166.958) rotate(180)" fill="none" class="stroke-1" stroke-width="10"/>
                </svg>
            </a>
        </header>

        <section class="calendrier affichage-annee">
        <ul id="nom-mois">
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
        
        <ul id="numero-jours">
            <li>.</li>
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

        <ul id="liste-jours" class="annee">
            <?=genererAnnee($annee_actuelle, $bdd ,$id);?>
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
<?php
    if($affichageEmoji == 0){
        echo "<script>modificationAffichageEmoji();</script>";
    }
?>
    
</body>
</html>