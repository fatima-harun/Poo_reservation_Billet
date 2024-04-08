<?php
error_reporting(E_ALL);
include_once "billet.php";
require_once "classe.php";
require_once "pays.php";
require_once "dateDepart.php";
require_once "heureDepart.php";
require_once "statut.php";


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
// define('DB_PASSWORD', 'Juin1706-*2000');
define('DB_NAME', 'reservationbillet');

try {
    // Connexion à la base de données en utilisant PDO
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    die("Erreur : Impossible de se connecter à la base de données " . $e->getMessage());
}
//instanciation de la classe billet
$billet = new Billet ($connexion,"150000","2024-04-03","14:59:22",1,2,1,2,1);
$resultats = $billet->readBillet();


//instanciation de classe
$class=new Classe($connexion,"première classe");
$classes = $class ->AfficheClasse();

//instanciaion de trajet
$traj =new Trajet($connexion,"Dakar-New York");
$trajets=$traj->AfficheTrajet();

//instanciaion de depart
$departs =new Depart($connexion,"2024-02-11");
$depart=$departs->AfficheDepart();

//instanciaion de heure
$hour =new Heure($connexion,"10:12:07");
$heures=$hour->AfficheHeure();

//instanciaion de statut
$status =new Statut($connexion,"Dakar-New York");
$statu=$status->AfficheStatut();
?>