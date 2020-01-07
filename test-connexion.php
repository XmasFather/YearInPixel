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
    $utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id = $valeurUtilisateur");
    $utilisateur = $utilisateur->fetch();
    

?>
<?php 
        include('head.php');
?>
<!-- Récupération des couleurs personnalisées en fonction des humeurs de l'utilisateur  -->
<style>
    <?php 
        miseEnPlaceCouleur($bdd, $utilisateur[id]);
    ?>
</style>
<body>
    <!-- On appelle le header qui sera commun à toutes nos pages  -->
    <?php 
        include('header.php');
    ?>
    <main>
        <!-- Affichage des humeurs personnalisées de chaque utilisateur  -->
        <section class="humeur">
            <?php 
                affichageHumeur($bdd, $utilisateur[id]); 
            ?>
        </section>
    </main>
    <!-- On appelle le footer qui sera commun à toutes nos pages  -->
    <?php 
        include('footer.php');
    ?>

    <script>
        function affichageMenuUtilisateur(){
            var menuUtilisateur = document.querySelector(".menu-utilisateur");
            var affichage = menuUtilisateur.classList;

            if(affichage == "menu-utilisateur hide"){
                menuUtilisateur.classList.remove("hide");
            }
            else{
                menuUtilisateur.classList.add("hide");
            }
        }

        document.querySelector(".infos-utilisateur img").addEventListener('click', affichageMenuUtilisateur);
    </script>
    
</body>
</html>