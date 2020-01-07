<?php
    /* Importation des fonctions nécessaires à la page */
    require('functions.php');
    /* Connexion à la BDD */
    $hostname = "localhost";
    $database = "mwe20_qmarolle_yip";
    $username = "mwe20_qmarolle";
    $password = 'AjnfDIoiJC8vLNA';
    $valeurUtilisateur = $_GET['user'];
    $bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

    /* Récupération de l'utilisateur  à modifier à terme */
    if($valeurUtilisateur == NULL){
        $valeurUtilisateur = 1;
        /*header('location:connexion.html');
        exit();*/
    }
    /* */
    $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $valeurUtilisateur");
    /* Change l'état de $utilisateur pour le rendre manipulable */
    $utilisateur = $utilisateur->fetch();
    

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
    <?php 
        /* On appelle le header qui sera commun à toutes nos pages */
        include('header.php');
    ?>
    <main>
        <header class="header-main">
        <nav role="navigation">
            
        </nav>
        <h2>Mois <--> Année</h2>
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
            <li>rien</li>
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
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
                </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li>
            <ul class="modif-humeur">
                <li><div class="couleur-humeur-1"></div><p>Heureux</p></li>
                <li><div class="couleur-humeur-2"></div> <p>Excité</p></li>
                <li><div class="couleur-humeur-3"></div><p>Normal</p></li>
                <li><div class="couleur-humeur-4"></div><p>Enervé</p></li>
                <li><div class="couleur-humeur-5"></div><p>Stressé</p></li>
                <li><div class="couleur-humeur-6"></div><p>Triste</p></li>
            </ul>
            </li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
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

<script type="text/javascript" src="script.js"></script>
    
</body>
</html>