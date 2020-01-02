<?php

$hostname = "localhost";
$database = "mwe20_qmarolle_yip";
$username = "mwe20_qmarolle";
$password = 'AjnfDIoiJC8vLNA';

$bdd = new PDO("mysql:host=$hostname;dbname=$database",	$username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
$resultat = $bdd->query('SELECT * FROM `humeur` ');
echo "<ul> \n";
foreach($resultat as $ligne) {
    echo $ligne[intitule]."<br/> \n";
    echo
}
echo "</ul> \n";
?>